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
        $id = $this->request->getVar('vote');
        $token = $this->request->getVar('token');
        
        $query = $this->tokenModel->getToken($token);

        if (!$query) {
            return redirect()->to('/exploit/vote')->withInput();
            //Flashdata kalau perlu
        }
        else {
            $voteCount = intval($this->exploitModel->select('exploit_vote')->where('exploit_tim_id', $id)->first());

            $this->exploitModel->update($id, ['exploit_vote' => ($voteCount + 1)]); //nambah voteCount
        }
    }

}
