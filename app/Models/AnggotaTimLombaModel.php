<?php

namespace App\Models;

use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;
class AnggotaTimLombaModel extends Model
{
    protected $table            = 'anggota_tim_lomba';
    protected $primaryKey       = 'anggota_tim_lomba_id';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
        $data['data']['anggota_tim_lomba_id'] = Uuid::uuid4()->toString();
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }
    
    protected $allowedFields    = ['tim_lomba_id', 'NIM', 'created_at'];

    protected array $casts = ['created_at' => 'datetime'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
}
