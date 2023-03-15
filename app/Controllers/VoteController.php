<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TokenModel;
use App\Models\ExploitModel;


class VoteController extends BaseController
{
    protected $tokenModel;
    protected $exploitModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->tokenModel = new TokenModel();
        $this->exploitModel = new ExploitModel();
    }

    public function voteExploit()
    {
        $id = $this->request->getVar('id_tenant');
        $token = $this->request->getVar('token');

        $query = $this->tokenModel->getToken($token);
        if (empty($id) || empty($token)) {
            $this->session->setFlashdata('error', 'Vote gagal, data tidak terpenuhi :(');
            return redirect()->to('/exploit/vote')->withInput();
        } else if (!$query) {
            $this->session->setFlashdata('error', 'Vote gagal, token salah :(');
            return redirect()->to('/exploit/vote')->withInput();
        } else {
            $voteCount = $this->exploitModel->select('exploit_vote')->where('exploit_tim_id', $id)->first();
            $voteCount = intval($voteCount['exploit_vote']);
            $this->exploitModel->update($id, ['exploit_vote' => ($voteCount + 1)]); //nambah voteCount
            $this->session->setFlashdata('msg', 'Vote berhasil!😊');
            return redirect()->to('/exploit/vote')->withInput();
        }
    }
    public function generateToken()
    {
        helper('text');
        for ($i = 0; $i < 110; $i++) {
            # code...
            $token = random_string('alpha', 5);
            echo $token;
            $data = [
                "token" => $token
            ];
            $this->tokenModel->save($data);
        }
        return;
    }
}
