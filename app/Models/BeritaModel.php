<?php

namespace App\Models;

use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
        $data['data']['berita_id'] = Uuid::uuid4()->toString();
        $data['data']['created_at'] = date('Y-m-d H:i:s'); 
        return $data;
    }

    protected function beforeUpdate(array $data): array
    {
        $data['data']['berita_id'] = Uuid::uuid4()->toString();
        return $data;
    }
    protected $allowedFields = [
        'judul_berita',
        'created_at',
        'isi_berita',
        'prodi_berita',
        'foto_berita',
    ];

    public function countAllBerita() {
        return $this->db->table($this->table)->countAllResults();
    }

    public function getBerita($limit, $offset) {
        return $this->db->table($this->table)
                        ->limit($limit, $offset)
                        ->get()
                        ->getResultArray();
    }
}
