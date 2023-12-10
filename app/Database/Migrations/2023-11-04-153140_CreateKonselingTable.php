<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Konseling extends Migration
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
            'jadwalID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'guruBK' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'pelanggaranID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tindakan' => [
                'type' => 'TEXT',
            ],
            'sanksi' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addForeignKey('jadwalID', 'jadwal', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pelanggaranID', 'pelanggaran', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('guruBK', 'user', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('konseling');
    }

    public function down()
    {
        $this->forge->dropTable('konseling');
    }
}
