<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Language extends BaseController
{
    public function index()
    {
        $locale = $this->request->getLocale();
        $session = session();
        $session->set('lang', $locale);

        return redirect()->back();
    }
}
