<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' =>  lang('Text.log_in'),
        ];
        echo view('templates/headerLoggedOut', $data);
        echo view('auth/login');
        echo view('templates/footer');
    }
}
