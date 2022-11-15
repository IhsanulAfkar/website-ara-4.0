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
                'admin_password' => password_hash('2nN2$X9d', PASSWORD_BCRYPT),
            ],
            [
                'admin_event' => 'olim',
                'admin_username' => 'olimadmin',
                'admin_password' => password_hash('4m6K8*z3', PASSWORD_BCRYPT),
            ],
            [
                'admin_event' => 'exploit',
                'admin_username' => 'exploitadmin',
                'admin_password' => password_hash('6tC45A$N', PASSWORD_BCRYPT),
            ],
        ];
        $this->db->table('admin')->insertBatch($data);
    }
}