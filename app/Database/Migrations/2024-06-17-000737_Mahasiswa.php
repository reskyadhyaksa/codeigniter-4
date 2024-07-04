<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NIM' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'prodi_id' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => TRUE
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'ipk' => [
                'type' => 'FLOAT',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],

        ]);

        $this->forge->addKey('NIM', TRUE);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
