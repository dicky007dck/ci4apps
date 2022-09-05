<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['activeMenu'] = 'dashboard';
    }
}
