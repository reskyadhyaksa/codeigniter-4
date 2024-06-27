<?php

namespace App\Models;

use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class TimLombaModel extends Model
{
    protected $table = 'tim_lomba';
    protected $primaryKey = 'tim_lomba_id';

    protected $beforeInsert = ['castCreatedAt'];

    protected function castCreatedAt(array $data): array
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected $allowedFields = [
        'tim_lomba_id',
        'lomba_id',
        'nama_tim',
        'NIM_ketua',
        'status',
    ];

    protected array $casts = ['created_at' => 'datetime'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
}
