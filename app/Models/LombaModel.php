<?php

namespace App\Models;

use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class LombaModel extends Model
{
    protected $table = 'lomba';
    protected $primaryKey = 'lomba_id';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
        $data['data']['lomba_id'] = Uuid::uuid4()->toString();
        return $data;
    }

    protected function beforeUpdate(array $data): array
    {
        $data['data']['lomba_id'] = Uuid::uuid4()->toString();
        return $data;
    }
    protected $allowedFields = [
        'kategori_lomba',
        'nama_lomba',
        'poster_lomba',
        'link_lomba',
        'keterangan_lomba',
        'tenggat_pendaftaran',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'pengguna_pengaju',
    ];
    
}
