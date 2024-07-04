<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\BeritaModel;


class BeritaSeeder extends Seeder
{
    protected $berita;
    public function __construct()
    {
        $this->berita = new BeritaModel();
    }

    public function run()
    {
        $data = [
            [
                'berita_id' => '1e4d2a6b-5a6b-4a6a-9e3d-3d6b9e4d2a6b',
                'judul_berita' => 'Berita Pertama',
                'created_at' => date('Y-m-d H:i:s'),
                'isi_berita' => 'Ini adalah isi dari berita pertama.',
                'prodi_berita' => 'TI',
                'foto_berita' => '1719927339_6d9788cde9144aee0e58.jpg',
            ],
            [
                'berita_id' => '2e5d3a7c-6b7c-5b7b-9f4d-4e7b9f4d3a7c',
                'judul_berita' => 'Berita Kedua',
                'created_at' => date('Y-m-d H:i:s'),
                'isi_berita' => 'Ini adalah isi dari berita kedua.',
                'prodi_berita' => 'BL',
                'foto_berita' => '1719927339_6d9788cde9144aee0e58.jpg',
            ],
        ];

        // Using the Model to insert data
        $db = \Config\Database::connect();
        $db->table('berita')->emptyTable();
        $db->table('berita')->insertBatch($data);
    }
}
