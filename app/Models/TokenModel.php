<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = 'token';
    protected $primaryKey = 'id';

    protected $allowedFields =  [
        'token',
        'is_used'
    ];

    protected $token = 'token';

    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getToken($token) {
        $query = $this->where($this->token, $token)->first();
        // dd($query);

        if($query) {
            return true;
        }
        
        else {
            return false;
        }
    }
}
