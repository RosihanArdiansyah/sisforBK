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
            'JadwalID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'GuruBK' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'PelanggaranID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'Permasalahan' => [
                'type' => 'TEXT',
            ],
            'Tindakan' => [
                'type' => 'TEXT',
            ],
            'Sanksi' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addForeignKey('JadwalID', 'jadwal', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('PelanggaranID', 'pelanggaran', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('konseling');
    }

    public function down()
    {
        $this->forge->dropTable('konseling');
    }
}
