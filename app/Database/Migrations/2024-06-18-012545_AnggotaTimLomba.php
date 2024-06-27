<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AnggotaTimLomba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'anggota_tim_lomba_id' => [
                'type'           => 'CHAR',
                'constraint'     => 36,
            ],
            'tim_lomba_id' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'NIM' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],

        ]);

        $this->forge->addKey('anggota_tim_lomba_id', TRUE);
        $this->forge->addForeignKey('tim_lomba_id', 'tim_lomba', 'tim_lomba_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('anggota_tim_lomba');
    }

    public function down()
    {
        $this->forge->dropTable('anggota_tim_lomba');
    }
}
