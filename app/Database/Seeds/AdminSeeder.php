<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'admin_event' => 'ctf',
                'admin_username' => 'ctfadmin',
                'admin_password' => password_hash('iN)kEQCaCE&3', PASSWORD_BCRYPT),
            ],
            [
                'admin_event' => 'olim',
                'admin_username' => 'olimadmin',
                'admin_password' => password_hash('wn%x4&So%hbe', PASSWORD_BCRYPT),
            ],
            [
                'admin_event' => 'exploit',
                'admin_username' => 'exploitadmin',
                'admin_password' => password_hash('PiPA4lGE]XV^', PASSWORD_BCRYPT),
            ],
        ];
        $this->db->table('admin')->insertBatch($data);
    }
}