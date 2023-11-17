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
                'null' => true,
            ],
            'NIS' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'TTL' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'Bapak' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'Ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kelas' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'Role' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],
            'Password' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'default' => md5('123456'),
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
