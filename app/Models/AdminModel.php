<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    protected $allowedFields =  [
        'admin_event',
        'admin_username',
        'admin_password',
    ];
    protected $admin_username = 'admin_username';

    protected $admin_password = 'admin_password';

    protected $useTimestamps = true;

    public function getAdmin($username, $password)
    {
        $query = $this->where($this->admin_username, $username)->first();
        if($query){
            if(password_verify($password, $query[$this->admin_password])){
                return $query;
            }
        }else{
            return false;
        }
    }
}