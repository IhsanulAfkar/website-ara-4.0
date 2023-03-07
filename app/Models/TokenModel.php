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
    protected $is_used = 'is_used';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getToken($token) {
        $query = $this->where($this->token, $token)->where($this->is_used, 0)->first();
        $id = $this->getIdWithToken($token);

        if($query) {
            $this->update($query['id'], ['is_used' => 1]);
            return true;
        }
        else {
            return false;
        }
    }
}
