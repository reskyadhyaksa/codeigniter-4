<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NonAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'non_id' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'nama_non' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('non_id', TRUE);
        $this->forge->createTable('nonakademik');
    }

    public function down()
    {
        $this->forge->dropTable('nonakademik');
    }
}
