<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\NotifModel;

class NotifikasiSeeder extends Seeder
{
    protected $notifikasi;
    public function __construct()
    {
        $this->notifikasi = new NotifModel();
    }
    public function run()
    {
        $data = [
            [
                'notif_id' => '012jk39o-5ll4-4jkl-8f1o-hln6l734mk9k',
                'NIM_terkait' => '01102170312',
                'title_notif' => 'Info Lomba',
                'deskripsi_notif' => 'Pengajuan Lomba Kamu diterima',
                'mark_readed' => 0,
                'created_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'notif_id' => '901ij28n-4kk3-3ijk-7e0n-gkm5k623lj8j',
                'NIM_terkait' => '01102170312',
                'title_notif' => 'Info Lomba',
                'deskripsi_notif' => 'Pengajuan Lomba Kamu ditolak',
                'mark_readed' => 0,
                'created_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'notif_id' => '890hi17m-3jj2-2hij-6d9m-fjl4j512ki7i',
                'NIM_terkait' => '01102170312',
                'title_notif' => 'Pengajuan Lomba',
                'deskripsi_notif' => 'Pengajuan Tim Kamu diterima',
                'mark_readed' => 1,
                'created_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'notif_id' => '789gh06l-2ii1-1ghi-5c8l-eik3i401jh6h',
                'NIM_terkait' => '01102170312',
                'title_notif' => 'Data pengguna',
                'deskripsi_notif' => 'Anda telah melakukan perubahan data',
                'mark_readed' => 0,
                'created_at'=> date('Y-m-d H:i:s'),
            ],
        ];

        $db = \Config\Database::connect();
        $db->table('notifikasi')->emptyTable();
        $db->table('notifikasi')->insertBatch($data);
    }
}
