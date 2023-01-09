<?php

namespace App\Controllers\dashboard;

use App\Controllers\BaseController;

use App\Models\OlimModel;
use App\Models\CTFModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->Olim_Model = new OlimModel();
        $this->CTF_Model = new CTFModel();
        $this->User_Model = new UserModel();
    }
    public function olim()
    {
        if ($this->session->get('is_admin')) {
            return redirect()->to('/auth/login');
        }
        if (!$this->session->get('username')) {
            return redirect()->to('/auth/login');
        }
        $data =
            [
                'title' => 'Dashboard',
                'nama_tim' => $this->session->get('tim'),
                'event' => 'Olimpiade',

            ];
        return view('landing/pages/dashboard/user/olim', $data);
    }
    public function ctf()
    {
        if ($this->session->get('is_admin')) {
            return redirect()->to('/auth/login');
        }
        if (!$this->session->get('username')) {
            return redirect()->to('/auth/login');
        }
        $data =
            [
                'title' => 'Dashboard',
                'nama_tim' => $this->session->get('tim'),
                'event' => 'CTF',

            ];
        return view('landing/pages/dashboard/user/ctf', $data);
    }
}
