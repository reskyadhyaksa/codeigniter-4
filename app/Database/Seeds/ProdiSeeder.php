<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'prodi_id' => 'TI',
                'nama_prodi' => 'Teknik Informatika',
                'fakultas' => 'Teknik',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'SI',
                'nama_prodi' => 'Sistem Informasi',
                'fakultas' => 'Teknik',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'MI',
                'nama_prodi' => 'Manajemen',
                'fakultas' => 'Ekonomi',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'KD',
                'nama_prodi' => 'Kedokteran',
                'fakultas' => 'Kedokteran',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'FD',
                'nama_prodi' => 'Farmasi',
                'fakultas' => 'Kedokteran',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'MT',
                'nama_prodi' => 'Matematika',
                'fakultas' => 'Saintek',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'FS',
                'nama_prodi' => 'Fisika',
                'fakultas' => 'Saintek',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'KIM',
                'nama_prodi' => 'Kimia',
                'fakultas' => 'Saintek',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'BL',
                'nama_prodi' => 'Biologi',
                'fakultas' => 'Saintek',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TS',
                'nama_prodi' => 'Teknik Sipil',
                'fakultas' => 'Teknik',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TE',
                'nama_prodi' => 'Teknik Elektro',
                'fakultas' => 'Teknik',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TM',
                'nama_prodi' => 'Teknik Mesin',
                'fakultas' => 'Teknik',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'SPS',
                'nama_prodi' => 'Strategi Perang Semesta',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'PA',
                'nama_prodi' => 'Peperangan Asimetris',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'DP',
                'nama_prodi' => 'Diplomasi Pertahanan',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'SKM',
                'nama_prodi' => 'Strategi Kampanye Militer',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'SPD',
                'nama_prodi' => 'Strategi Pertahanan Darat',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'SPL',
                'nama_prodi' => 'Strategi Pertahanan Laut',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'SPU',
                'nama_prodi' => 'Strategi Pertahanan Udara',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'MP',
                'nama_prodi' => 'Manajemen Pertahanan',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'KE',
                'nama_prodi' => 'Ketahanan Energi',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'EP',
                'nama_prodi' => 'Ekonomi Pertahanan',
                'fakultas' => 'Ekonomi',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'MB',
                'nama_prodi' => 'Manajemen Bencana',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'KM',
                'nama_prodi' => 'Keamanan Maritim',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'DRK',
                'nama_prodi' => 'Damai dan Resolusi Konflik',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'HKD',
                'nama_prodi' => 'Hukum Keadaan Darurat',
                'fakultas' => 'Hukum',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'IP',
                'nama_prodi' => 'Industri Pertahanan',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TP',
                'nama_prodi' => 'Teknologi Penginderaan',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TSN',
                'nama_prodi' => 'Teknologi Persenjataan',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TDG',
                'nama_prodi' => 'Teknologi Daya Gerak',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'prodi_id' => 'TRPS',
                'nama_prodi' => 'Terapan Rekayasa Pertahanan Siber',
                'fakultas' => 'Pertahanan',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using the Model to insert data
        $db = \Config\Database::connect();
        $db->table('prodi')->emptyTable();
        $this->db->table('prodi')->insertBatch($data);
    }
}
