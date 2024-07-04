<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NonAkademik extends Seeder
{
    public function run()
    {
        $activities = [
            ['non_id' => 'FB', 'nama_non' => 'Football'],
            ['non_id' => 'BK', 'nama_non' => 'Basketball'],
            ['non_id' => 'VB', 'nama_non' => 'Volleyball'],
            ['non_id' => 'BD', 'nama_non' => 'Badminton'],
            ['non_id' => 'TN', 'nama_non' => 'Tennis'],
            ['non_id' => 'TT', 'nama_non' => 'Table Tennis'],
            ['non_id' => 'SW', 'nama_non' => 'Swimming'],
            ['non_id' => 'RK', 'nama_non' => 'Running'],
            ['non_id' => 'CY', 'nama_non' => 'Cycling'],
            ['non_id' => 'CR', 'nama_non' => 'Cricket'],
            ['non_id' => 'BB', 'nama_non' => 'Baseball'],
            ['non_id' => 'SO', 'nama_non' => 'Soccer'],
            ['non_id' => 'HK', 'nama_non' => 'Hockey'],
            ['non_id' => 'GL', 'nama_non' => 'Golf'],
            ['non_id' => 'RF', 'nama_non' => 'Rugby Football'],
            ['non_id' => 'WT', 'nama_non' => 'Weightlifting'],
            ['non_id' => 'AR', 'nama_non' => 'Archery'],
            ['non_id' => 'BS', 'nama_non' => 'Boxing'],
            ['non_id' => 'WR', 'nama_non' => 'Wrestling'],
            ['non_id' => 'KF', 'nama_non' => 'Karate']
        ];

        $timestamp = date('Y-m-d H:i:s');

        foreach ($activities as &$activity) {
            $activity['created_at'] = $timestamp;
        }

        $this->db->table('nonakademik')->emptyTable();
        $this->db->table('nonakademik')->insertBatch($activities);

    }
}
