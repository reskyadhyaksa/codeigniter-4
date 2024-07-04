<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'berita_id' => [
                'type'           => 'CHAR',
                'constraint'     => 36,
            ],
            'judul_berita' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
                
            ],
            'isi_berita' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'prodi_berita' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'foto_berita' => [
                'type' => 'TEXT',
                'null' => true
            ],
        ]);

        $this->forge->addKey('berita_id', TRUE);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        //
    }
}
