<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        return view('coming_soon');
    }
    public function coba()
    {
        return view('testing');
    }
}
