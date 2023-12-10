<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwal extends Migration
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
            'jadwal' => [
                'type' => 'DATE',
            ],
            'waktu' => [
                'type' => 'TIME',
            ],
            'userID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'guruBK' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'permasalahan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'INT',
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addForeignKey('userID', 'user', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('guruBK', 'user', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
