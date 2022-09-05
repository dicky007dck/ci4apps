<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['activeMenu'] = 'dashboard';
        echo view('header');
        echo view('dashboard_view');
        echo view('footer');
    }
}
