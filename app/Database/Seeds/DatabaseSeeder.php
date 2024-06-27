<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('ProdiSeeder');
        $this->call('MahasiswaSeeder');
        $this->call('AdminSeeder');
    }
}
