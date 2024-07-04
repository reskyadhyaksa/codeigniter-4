<?php

namespace App\Models;

use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class NotifModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'notif_id';
    
    // Disable automatic timestamp handling
    protected $useTimestamps = false;

    protected $allowedFields = ['NIM_terkait', 'title_notif', 'deskripsi_notif', 'mark_readed', 'created_at'];

    protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert(array $data): array
    {
        $data['data']['notif_id'] = Uuid::uuid4()->toString();
        $data['data']['created_at'] = date('Y-m-d H:i:s'); // Manually set the created_at field
        return $data;
    }
}
