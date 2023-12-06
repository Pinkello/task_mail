<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Starting extends BaseController
{
    public function index()
    {
        $data['title'] = lang('Text.startingPage_title');
        echo view('templates/header', $data);
        echo view('starting/startingPage.php', $data);
        echo view('templates/footer');
    }
}
