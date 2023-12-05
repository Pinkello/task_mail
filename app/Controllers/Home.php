<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('Text.homepage');
        echo view('templates/header', $data);
        echo view('home/home.php', $data);
        echo view('templates/footer');
    }
}
