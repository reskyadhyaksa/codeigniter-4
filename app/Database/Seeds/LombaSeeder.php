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
                'lomba_id' => '234bc51g-7dd6-6bcd-073g-9cg8d956fc1c',
                'kategori_lomba' => 'Akademik',
                'prodi_lomba' => json_encode(['TI', 'SI', 'MI']),
                'nama_lomba' => 'Lomba Pertama',
                'poster_lomba' => 'poster_lomba1.jpg',
                'penyelenggara_lomba' => 'Universitas Gajah Mada',
                'keterangan_lomba' => 'Deskripsi singkat lomba pertama.',
                'tenggat_pendaftaran' => '2024-07-01',
                'tanggal_mulai' => '2024-07-10',
                'tanggal_selesai' => '2024-07-15',
                'pengguna_pengaju' => '01102170312',
                'status' => 0,
            ],
            [
                'lomba_id' => '123ab40f-6cc5-5abc-962f-8bf7c845eb0b',
                'kategori_lomba' => 'Non-Akademik',
                'prodi_lomba' => json_encode(['TI', 'FD', 'KD']),
                'nama_lomba' => 'Lomba Kedua',
                'poster_lomba' => 'poster_lomba2.jpg',
                'penyelenggara_lomba' => 'Universitas Indonesia',
                'keterangan_lomba' => 'Deskripsi singkat lomba kedua.',
                'tenggat_pendaftaran' => '2024-08-01',
                'tanggal_mulai' => '2024-08-10',
                'tanggal_selesai' => '2024-08-15',
                'pengguna_pengaju' => '01102170312',
                'status' => 0,
            ],
            [
                'lomba_id' => '345cd62h-8ee7-7cde-184h-adg9e067fd2d',
                'kategori_lomba' => 'Akademik',
                'prodi_lomba' => json_encode(['FS', 'SI', 'KD']),
                'nama_lomba' => 'Lomba Ketiga',
                'poster_lomba' => 'poster_lomba3.jpg',
                'penyelenggara_lomba' => 'Universitas Komputer',
                'keterangan_lomba' => 'Deskripsi singkat lomba ketiga.',
                'tenggat_pendaftaran' => '2024-09-01',
                'tanggal_mulai' => '2024-09-10',
                'tanggal_selesai' => '2024-09-15',
                'pengguna_pengaju' => '01102170313',
                'status' => 0,
            ],
            [
                'lomba_id' => '456de73i-9ff8-8def-295i-bfh0f178ge3e',
                'kategori_lomba' => 'Non-Akademik',
                'prodi_lomba' => json_encode(['TI', 'KIM', 'KD']),
                'nama_lomba' => 'Lomba Keempat',
                'poster_lomba' => 'poster_lomba4.jpg',
                'penyelenggara_lomba' => 'Universitas Bapao Jajah',
                'keterangan_lomba' => 'Deskripsi singkat lomba keempat.',
                'tenggat_pendaftaran' => '2024-10-01',
                'tanggal_mulai' => '2024-10-10',
                'tanggal_selesai' => '2024-10-15',
                'pengguna_pengaju' => '01102170314',
                'status' => 0,
            ],
            [
                'lomba_id' => '567ef84j-0gg9-9efg-3a6j-cgi1g289hf4f',
                'kategori_lomba' => 'Akademik',
                'prodi_lomba' => json_encode(['BL', 'SI', 'KD']),
                'nama_lomba' => 'Lomba Kelima',
                'poster_lomba' => 'poster_lomba5.jpg',
                'penyelenggara_lomba' => 'Telkom University',
                'keterangan_lomba' => 'Deskripsi singkat lomba kelima.',
                'tenggat_pendaftaran' => '2024-11-01',
                'tanggal_mulai' => '2024-11-10',
                'tanggal_selesai' => '2024-11-15',
                'pengguna_pengaju' => '01102170315',
                'status' => 0,
            ],
        ];

        // Using the Model to insert data
        $db = \Config\Database::connect();
        $db->table('lomba')->emptyTable();
        $db->table('lomba')->insertBatch($data);
    }
}
