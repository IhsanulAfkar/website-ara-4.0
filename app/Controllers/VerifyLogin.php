<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;

class VerifyLogin extends BaseController
{
    protected $session;
    protected $userModel;
    protected $adminModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        $data['title'] = "Home";
        return view('landing/pages/home', $data);
    }
    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];
            $validate = $this->validate($rules);
            if ($validate) {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                if ($query = $this->adminModel->getAdmin($username, $password)) {
                    $data = [
                        'id' => $query['admin_id'],
                        'event' => $query['admin_event'],
                        'username' => $query['admin_username'],
                        'isLoggedIn' => true,
                        'is_admin' => true,
                    ];
                    $this->session->set($data);

                    switch ($query['admin_event']) {
                        case 'ctf':
                            return redirect()->to('/dashboard/admin-ctf/list-team');
                            break;
                        case 'olim':
                            return redirect()->to('/dashboard/admin-olim/list-team');
                            break;
                        case 'exploit':
                            return redirect()->to('/dashboard/admin-exploit/list-team');
                            break;

                        default:
                            return redirect()->to('/auth/login');
                            break;
                    }
                }

                // if ($query = $this->userModel->getUser($username, $password)) {
                //     $data = [
                //         'id' => $query['user_id'],
                //         'lomba' => $query['user_lomba'],
                //         'tim' => $query['user_tim_nama'],
                //         'username' => $query['user_username'],
                //         'isLoggedIn' => true,
                //         'is_admin' => false,
                //     ];
                //     $this->session->set($data);

                //     switch ($query['user_lomba']) {
                //         case 'ctf':
                //             return redirect()->to('/ctf');
                //             break;
                //         case 'olim':
                //             return redirect()->to('/olim');
                //             break;
                //         case 'exploit':
                //             return redirect()->to('/exploit');
                //             break;

                //         default:
                //             return redirect()->to('/auth/login');
                //             break;
                //     }
                // }

                // $admin = $this->adminModel->where('admin_username', $username)->first();
                // $user = $this->userModel->where('user_username', $username)->first();
                // if ($admin || $user) {
                //     if (!password_verify($password, $admin['admin_password']) || !password_verify($password, $user['user_password'])) {
                //         $this->session->setFlashdata('error', 'Password salah');
                //         return redirect()->to('/auth/login');
                //     }
                // } else {
                //     $this->session->setFlashdata('error', 'Username tidak ditemukan');
                //     return redirect()->to('/auth/login');
                // }

                $this->session->setFlashdata('error', 'Username atau password salah');
                return redirect()->back();
            }
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
