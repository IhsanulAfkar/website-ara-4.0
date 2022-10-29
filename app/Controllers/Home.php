<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        return view('coming_soon');
    }

    // Event Page
    public function olimpiade()
    {
        $data['title'] = "Olimpiade";
        return view('landing/pages/olimpiade', $data);
    }
    public function coba()
    {
        return view('testing');
    }
}
