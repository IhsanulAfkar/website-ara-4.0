<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = "Home";
        return view('landing/pages/home', $data);
        // return view('soon');
    }
    // public function about_hmit()
    // {
    //     $data['title'] = "HMIT";
    //     return view('landing/pages/abouthmit', $data);
    //     // return view('coming_soon');
    // }
    public function about_ara()
    {
        $data['title'] = "About";
        return view('landing/pages/aboutara', $data);
        // return view('coming_soon');
    }

    public function login()
    {
        session();
        $data =
            [
                'title' => 'Login',
                'validation' => \Config\Services::validation()
            ];
        return view('landing/pages/login', $data);
        // return view('coming_soon');
    }
    // Event Page
    public function olimpiade()
    {
        $data['title'] = "Olimpiade";
        $data['event_time'] = "Nov 27, 2022 00:00:00";
        return view('landing/pages/olimpiade', $data);
    }
    public function ctf()
    {
        $data['title'] = "CTF";
        $data['event_time'] = "Nov 20, 2022 00:00:00";
        return view('landing/pages/ctf', $data);
    }
    public function exploit()
    {
        $data['title'] = "ExploIT";
        $data['event_time'] = "Nov 20, 2022 00:00:00";
        return view('landing/pages/exploit', $data);
    }

    // Register
    public function registerOlimpiade()
    {
        session();
        $data =
            [
                'title' => 'Olimpiade',
                // 'validation' => \Config\Services::validation()
            ];
        return view('landing/pages/close_olim', $data);
    }
    public function registerCtf()
    {
        session();
        $data =
            [
                'title' => 'CTF',
                'validation' => \Config\Services::validation()
            ];
        return view('landing/pages/register-ctf', $data);
    }

    public function coba()
    {
        $data['title'] = 'Dashboard';
        return view('landing/pages/dashboard/user/olim', $data);
    }

    public function registerExploit()
    {
        session();
        $data =
            [
                'title' => 'ExploIT',
                'validation' => \Config\Services::validation()
            ];
        return view('landing/pages/register-exploIT', $data);
    }
}