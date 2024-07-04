<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lomba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'lomba_id' => [
                'type'           => 'CHAR',
                'constraint'     => 36,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
            'prodi_lomba' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'kategori_lomba' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_lomba' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'poster_lomba' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'penyelenggara_lomba' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_lomba' => [
                'type' => 'TEXT',
            ],
            'tenggat_pendaftaran' => [
                'type' => 'DATE',
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
            ],
            'pengguna_pengaju' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],

        ]);

        $this->forge->addKey('lomba_id', TRUE);
        $this->forge->createTable('lomba');
    }
    public function down()
    {
        $this->forge->dropTable('lomba');
    }
}
