<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifikasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'notif_id' => [
                'type'           => 'CHAR',
                'constraint'     => 36,
            ],
            'NIM_terkait' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'title_notif' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'deskripsi_notif' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'mark_readed' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
                
            ],
        ]);

        $this->forge->addKey('notif_id', TRUE);
        $this->forge->createTable('notifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('notifikasi');
    }
}
