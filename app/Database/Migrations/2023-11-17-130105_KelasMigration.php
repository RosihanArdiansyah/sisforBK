<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KelasMigration extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'ID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        //
    }
}
