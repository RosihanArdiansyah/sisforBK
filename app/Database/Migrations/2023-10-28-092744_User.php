<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'fullName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'NIS' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'TTL' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'Bapak' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'Ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'Kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'Role' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'Password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addUniqueKey('username');
        $this->forge->addUniqueKey('NIS');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
