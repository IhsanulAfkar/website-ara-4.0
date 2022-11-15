<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // ...
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields  = [
        'user_lomba', 
        'user_tim_nama', 
        'user_username', 
        'user_password'
    ];
    protected $user_lomba = 'user_lomba';
    protected $user_tim_nama = 'user_tim_nama';
    protected $user_username = 'user_username';
    protected $user_password = 'user_password';
    
    protected $useTimestamps = true;
    protected $createdField = 'user_date_created';
    protected $updatedField = 'user_date_updated';

    public function getUser($username, $password)
    {
        $query = $this->where($this->user_username, $username)->first();
        if($query){
            if(password_verify($password, $query[$this->user_password])){
                return $query;
            }
        }else{
            return false;
        }
    }
}