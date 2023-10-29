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
            'Jadwal' => [
                'type' => 'DATE',
            ],
            'UserID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'Permasalahan' => [
                'type' => 'TEXT',
            ],
            'Status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addForeignKey('UserID', 'user', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
