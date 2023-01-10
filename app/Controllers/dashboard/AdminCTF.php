<?php

namespace App\Controllers\dashboard;

use App\Controllers\BaseController;

use App\Models\CTFModel;
use App\Models\UserModel;
//ctf
class AdminCTF extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->CTF_Model = new CTFModel();
        $this->User_Model = new UserModel();
    }

    public function is_pass_same($pass)
    {
        $builder = $this->db->table('user');
        $builder->where('user_password', $pass);
        return !empty($builder->get()->getResult());
    }

    public function delete_file($path, $filename)
    {
        if (!empty($filename))
            unlink($path . $filename);
        return;
    }
    public function konfirmasi_team()
    {
        if (!$this->session->get('is_admin')) {
            return redirect()->to('/auth/login');
        }
        if (!$this->session->get('username')) {
            return redirect()->to('/auth/login');
        }
        $data =
            [
                'title' => 'Admin CTF',
                'nama' => 'Admin CTF',
                'event' => 'CTF',
                'step' => 'Konfirmasi',
                'team_list' => $this->CTF_Model->where('ctf_status', 0)->findAll(),
                'terkonfirmasi' => $this->CTF_Model->where('ctf_status', 1)->countAllResults(),
                'belum_terkonfirmasi' => $this->CTF_Model->where('ctf_status', 0)->countAllResults(),
                'total_team' => $this->CTF_Model->where('ctf_status', 0)->countAllResults() + $this->CTF_Model->where('ctf_status', 1)->countAllResults(),
            ];
        return view('landing/pages/dashboard/admin/ctf/konfirmasi_team', $data);
    }

    public function confirmed_team()
    {
        if (!$this->session->get('is_admin')) {
            return redirect()->to('/auth/login');
        }
        if (!$this->session->get('username')) {
            return redirect()->to('/auth/login');
        }
        $data =
            [
                'title' => 'Admin CTF',
                'nama' => 'Admin CTF',
                'event' => 'CTF',
                'step' => 'List',
                'team_list' => $this->CTF_Model->where('ctf_status', 1)->findAll(),
                'terkonfirmasi' => $this->CTF_Model->where('ctf_status', 1)->countAllResults(),
                'belum_terkonfirmasi' => $this->CTF_Model->where('ctf_status', 0)->countAllResults(),
                'total_team' => $this->CTF_Model->where('ctf_status', 0)->countAllResults() + $this->CTF_Model->where('ctf_status', 1)->countAllResults(),
            ];
        return view('landing/pages/dashboard/admin/ctf/list_team', $data);
    }

    public function verify_konfirmasi_team($id, $status)
    {
        if (!$this->session->get('is_admin')) {
            return redirect()->to('/auth/login');
        }
        if (!$this->session->get('username')) {
            return redirect()->to('/auth/login');
        }
        helper('text');
        $team = $this->CTF_Model->where('ctf_tim_id', $id)->first();
        if ($status) {
            $password = random_string('special_alnum', 12); //special_alnum nambah case sendiri dari file module text_helper.php

            if ($this->is_pass_same($password)) {
                return redirect()->to('dashboard/admin-ctf/verify-konfirmasi-team/' . $id . '/1');
            } else {

                $data = [
                    'user_lomba'       => 'ctf',
                    'user_tim_nama'  => $team['ctf_tim_nama'],
                    'user_username'    => 'CTF' . '_' . $team['ctf_tim_nama'],
                    'user_password'    => password_hash($password, PASSWORD_DEFAULT)
                ];

                $subject = "[Accepted] CTF";
                $message = "Halo {$team['ctf_tim_nama']} dari {$team['ctf_asal_institusi']},<br>
                  <br>
                  Terima kasih sudah mendaftar pada event kami, \"CTF.\"<br>
                  <br>
                  Berikut adalah Username dan Password anda: <br>
                  <br>
                  Username : {$data['user_username']}<br>
                  Password : {$password}<br><br>
                  <br>
                  --<br>
                  Salam Hormat,<br>
                  <br>
                  A Renewal Agent 4.0";
                $email = \Config\Services::email();
                $email->setTo($team['ctf_email_ketua']);
                $email->setFrom('arenewalagent@gmail.com', 'ARA 4.0');
                $email->setSubject($subject);
                $email->setMessage($message);
                if ($email->send()) {
                    $data_status = [
                        'ctf_tim_id' => $team['ctf_tim_id'],
                        'ctf_status' => 1
                    ];
                    $this->CTF_Model->save($data_status);
                    $this->User_Model->save($data);
                    $this->session->setFlashdata('msg', 'Berhasil Menerima Tim: ' . $team['ctf_tim_nama']);
                } else {
                    // $dd = $email->printDebugger(['headers']);
                    // $this->session->setFlashdata('msg', $dd);
                    $this->session->setFlashdata('msg', 'Server Error');
                }
            }
        } else {
            $kp_path = 'uploads/ctf/suket/';
            $ig_path = 'uploads/ctf/ig_ara/';
            $bukti_bayar_path = 'uploads/ctf/bukti_bayar/';

            $subject = "[Rejected] CTF";
            $message = "Halo {$team['ctf_tim_nama']} dari {$team['ctf_asal_institusi']},<br>
            <br>
            Terima kasih sudah mendaftar pada event kami, \"CTF.\"<br>
            <br>
            Mohon maaf, persyaratan yang anda kirimkan tidak cukup. Mohon mendaftar kembali di halaman registrasi.<br>
            <br>
            <br>
            --<br>
            Salam Hormat,<br>
            <br>
            A Renewal Agent 4.0";
            $email = \Config\Services::email();
            $email->setTo($team['ctf_email_ketua']);
            $email->setFrom('arenewalagent@gmail.com', 'ARA 4.0');
            $email->setSubject($subject);
            $email->setMessage($message);
            if ($email->send()) {
                $this->delete_file($kp_path, $team['ctf_kp_surket_ketua']);
                $this->delete_file($kp_path, $team['ctf_kp_surket_anggota_1']);
                $this->delete_file($kp_path, $team['ctf_kp_surket_anggota_2']);

                $this->delete_file($ig_path, $team['ctf_ig_ara_ketua']);
                $this->delete_file($ig_path, $team['ctf_ig_ara_anggota_1']);
                $this->delete_file($ig_path, $team['ctf_ig_ara_anggota_2']);

                $this->delete_file($bukti_bayar_path, $team['ctf_bukti_bayar']);

                $this->CTF_Model->where('ctf_tim_id', $id)->delete();
                $this->session->setFlashdata('msg', 'Berhasil Menolak Tim: ' . $team['ctf_tim_nama']);
            } else {
                $this->session->setFlashdata('msg', 'Server Error');
            }
        }
        return redirect()->to('dashboard/admin-ctf/konfirmasi-team');
    }
}
