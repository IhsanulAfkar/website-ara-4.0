<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TokenModel;

class VoteController extends BaseController
{
    protected $tokenModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->tokenModel = new TokenModel();
    }

    public function voteExploit()
    {
        $id = $this->request->getVar('vote');
        $token = $this->request->getVar('token');
        
        $query = $this->tokenModel->getToken($token);

        if ($query == true) {
            dd("infokan");
        }
        else {
            dd("turu");
        }
    }

}
