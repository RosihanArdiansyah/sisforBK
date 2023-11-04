<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggaran extends Migration
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
            'namaPelanggaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'poin' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addUniqueKey('namaPelanggaran');
        $this->forge->createTable('pelanggaran');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggaran');
    }
}