<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ProdiModel;

class MahasiswaSeeder extends Seeder
{
    protected $prodi;

    public function __construct()
    {
        $this->prodi = new ProdiModel();
    }

    public function run()
    {
        // Fetch the first major_id from the major table
        $prodi = $this->prodi->findAll();

        $data = [
            [
                // SET ADMIN MAHASISWA TO VIEW MAHASISWA POV
                'NIM' => '100000000001',
                'prodi_id' => $prodi[0]['prodi_id'],
                'nama_lengkap' => 'Admin Mahasiswa',
                'email' => 'admin@example.com',
                'password' => password_hash('adminpassword', PASSWORD_DEFAULT),
                'photo' => '1718643474_e08440f5a29c07f53791.jpg',
                'ipk' => 3.5,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'NIM' => '01102170312',
                'prodi_id' => $prodi[0]['prodi_id'],
                'nama_lengkap' => 'Fulan',
                'email' => 'fulan@example.com',
                'password' => password_hash('fulanpassword', PASSWORD_DEFAULT),
                'photo' => '1718643474_e08440f5a29c07f53791.jpg',
                'ipk' => 3.5,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'NIM' => '01102170313',
                'prodi_id' => $prodi[1]['prodi_id'],
                'nama_lengkap' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => password_hash('budipassword', PASSWORD_DEFAULT),
                'photo' => '1718643474_e08440f5a29c07f53791.jpg',
                'ipk' => 3.4,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'NIM' => '01102170314',
                'prodi_id' => $prodi[2]['prodi_id'],
                'nama_lengkap' => 'Citra Dewi',
                'email' => 'citra@example.com',
                'password' => password_hash('citrapassword', PASSWORD_DEFAULT),
                'photo' => '1718643474_e08440f5a29c07f53791.jpg',
                'ipk' => 3.3,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'NIM' => '01102170315',
                'prodi_id' => $prodi[0]['prodi_id'],
                'nama_lengkap' => 'Eka Sari',
                'email' => 'eka@example.com',
                'password' => password_hash('ekapassword', PASSWORD_DEFAULT),
                'photo' => '1718643474_e08440f5a29c07f53791.jpg',
                'ipk' => 3.2,
                'created_at' => date('Y-m-d H:i:s'),
            ],

        ];
        
        // Using the Model to insert data
        $db = \Config\Database::connect();
        $db->table('mahasiswa')->emptyTable();
        $db->table('mahasiswa')->insertBatch($data);
    }
}
