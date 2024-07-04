<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\TimLombaModel;

class TimLombaSeeder extends Seeder
{
    protected $tim_lomba;

    public function __construct()
    {
        $this->tim_lomba = new TimLombaModel();
    }

    public function run()
    {
        $tim_lomba = $this->tim_lomba->findAll();

        $data = [
            [
                'tim_lomba_id' => 'TLM1',
                'lomba_id' => '123ab40f-6cc5-5abc-962f-8bf7c845eb0b',
                'nama_tim' => 'Beruang Kutub',
                'NIM_ketua' => '01102170312',
                'anggota_tim' => json_encode(['01102170312', '01102170313', '01102170314']),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tim_lomba_id' => 'TLM2',
                'lomba_id' => '123ab40f-6cc5-5abc-962f-8bf7c845eb0b',
                'nama_tim' => 'Beruang Asoy',
                'NIM_ketua' => '01102170314',
                'anggota_tim' => json_encode(['01102170315', '01102170314', '01102170312']),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tim_lomba_id' => 'TLM3',
                'lomba_id' => '123ab40f-6cc5-5abc-962f-8bf7c845eb0b',
                'nama_tim' => 'Asoy Kutub',
                'NIM_ketua' => '01102170315',
                'anggota_tim' => json_encode(['01102170312', '01102170313', '01102170314']),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Using the Model to insert data
        $db = \Config\Database::connect();
        $db->table('tim_lomba')->emptyTable();
        $db->table('tim_lomba')->insertBatch($data);
    }
}
