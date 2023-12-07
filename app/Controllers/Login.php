<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Login extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form', 'Form']);
    }

    public function index()
    {
        $data = [
            'title' =>  lang('Text.login_title'),
        ];
        echo view('templates/header', $data);
        echo view('auth/login');
        echo view('templates/footer');
    }

    public function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[person.email]',
                'errors' => [
                    'required' => lang('Text.email_required'),
                    'valid_email' => lang('Text.email_not_valid'),
                    'is_not_unique' => lang('Text.email_not_unique'),
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => lang('Text.password_required'),
                    'min_length' => lang('Text.password_too_short'),
                    'max_length' => lang('Text.password_too_long'),
                ]
            ],

        ]);

        if (!$validation) {
            log_message(
                'error',
                "Logowanie nie przeszło walidacji. "
            );
            $data = [
                'title' =>  lang('Text.log_in'),
                'validation' => $this->validator
            ];
            echo view('templates/header', $data);
            echo view('auth/login', $data);
            echo view('templates/footer');
        } else {
            $email = $this->request->getPost('email');
            $password = (string) $this->request->getPost('password');

            $personModel = new  \App\Models\PersonModel();
            $person_info = $personModel->where('email', $email)->first();
            $check_password = Hash::check($password, $person_info['password']);

            if (!$check_password) {
                session()->setFlashdata('fail', lang('Text.wrong_password'));

                return redirect()->to('/login')->withInput();
            } else {
                $person_id = $person_info['person_id'];
                session()->set('person', $person_id);
                session()->set('person_info', $person_info);
                return redirect()->to('/home');
            }
        }
    }

    public function logout()
    {
        if (session()->has('person')) {
            session()->destroy();
            return redirect()->to('login?access=out')->with('fail', lang('Text.log_out_success'));
        } else
            return redirect()->to('login');
    }
}
