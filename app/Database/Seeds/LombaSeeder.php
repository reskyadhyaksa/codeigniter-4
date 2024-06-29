<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\LombaModel;

class LombaSeeder extends Seeder
{
    protected $lomba;

    public function __construct()
    {
        $this->lomba = new LombaModel();
    }

    public function run()
    {
        $lomba = $this->lomba->findAll();

        $data = [
            [
                'lomba_id' => 'LM1',
                'kategori_lomba' => 'Kategori Lomba 1',
                'nama_lomba' => 'Lomba Pertama',
                'poster_lomba' => 'poster_lomba1.jpg',
                'link_lomba' => 'https://www.contohlinklomba.com/lomba-pertama',
                'keterangan_lomba' => 'Deskripsi singkat lomba pertama.',
                'tenggat_pendaftaran' => '2024-07-01',
                'tanggal_mulai' => '2024-07-10',
                'tanggal_selesai' => '2024-07-15',
                'pengguna_pengaju' => '01102170312',
                'status' => 0,
            ],
            [
                'lomba_id' => 'LM2',
                'kategori_lomba' => 'Kategori Lomba 2',
                'nama_lomba' => 'Lomba Kedua',
                'poster_lomba' => 'poster_lomba2.jpg',
                'link_lomba' => 'https://www.contohlinklomba.com/lomba-kedua',
                'keterangan_lomba' => 'Deskripsi singkat lomba kedua.',
                'tenggat_pendaftaran' => '2024-08-01',
                'tanggal_mulai' => '2024-08-10',
                'tanggal_selesai' => '2024-08-15',
                'pengguna_pengaju' => '01102170312',
                'status' => 0,
            ],
        ];

        // Using the Model to insert data
        $db = \Config\Database::connect();
        $db->table('lomba')->emptyTable();
        $db->table('lomba')->insertBatch($data);
    }
}
