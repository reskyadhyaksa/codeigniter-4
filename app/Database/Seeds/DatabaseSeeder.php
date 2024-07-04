<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('ProdiSeeder');
        $this->call('NonAkademikSeeder');
        $this->call('MahasiswaSeeder');
        $this->call('AdminSeeder');
        $this->call('LombaSeeder');
        $this->call('TimLombaSeeder');
        $this->call('NotifikasiSeeder');
        $this->call('BeritaSeeder');
    }
}
