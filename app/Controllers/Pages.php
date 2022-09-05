<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'PDAM Tirta Perwitasari'
        ];
        $data['title'] = 'Dashboard';
        $data['activeMenu'] = 'dashboard';

        echo view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        $data['title'] = 'About';
        $data['activeMenu'] = 'about';
        echo view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact US'
        ];
        $data['title'] = 'Contact';
        $data['activeMenu'] = 'contact';
        return view('pages/contact', $data);
    }
}
