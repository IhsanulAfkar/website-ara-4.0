<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = "Home";
        return view('landing/pages/home', $data);
        // return view('coming_soon');
    }
    // Event Page
    public function olimpiade()
    {
        $data['title'] = "Olimpiade";
        return view('landing/pages/olimpiade', $data);
    }

    // Register
    public function registerOlimpiade()
    {
        session();
        $data = 
        [
            'title' => 'Olimpiade',
            'validation' => \Config\Services::validation()
        ];
        return view('landing/pages/register-olimpiade', $data);
    }

    public function coba()
    {
        return view('testing');
    }
}
