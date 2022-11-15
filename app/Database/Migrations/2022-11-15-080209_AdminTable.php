<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'admin_event' => [
                'type' => 'enum("ctf","olim", "exploit")',
                'null' => true,
            ],
            'admin_username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'admin_password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('admin_id', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
