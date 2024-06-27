<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'admin_id' => 'admin',
            'nama_lengkap' => 'Admin',
            'email' => 'admin@example.com',
            'password' => password_hash('adminpassword', PASSWORD_DEFAULT),
            'photo' => 'admin.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Using the Model to insert data
        $this->db->table('admin')->insert($data);
    }
}
