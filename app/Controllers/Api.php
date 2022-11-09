<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Code;
use App\Models\CodeModel;

class Api extends BaseController
{
    public function __construct()
    {
        // $this->Kupon_model = new CodeModel();
    }
    public function index()
    {
        //
    }
    public function verify_kupon($kupon = null)
    {
        // Batch 1
        $initial_price = "80.000";


        $db = db_connect();
        $qres = $db->query("SELECT * FROM code WHERE code='{$kupon}' limit 1");
        if (!$qres->getRow()) {
            $status = false;
            $data = [$status, $initial_price];
            http_response_code(200);
            echo json_encode($data);
        } else {
            $status = true;
            // $res = $qres->getResult();
            $new_nom = "60.000";
            $data = [$status, $new_nom];
            http_response_code(200);
            echo json_encode($data);
        }
    }
}
