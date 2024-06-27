<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'NIM';
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['NIM', 'prodi_id', 'nama_lengkap', 'email', 'password', 'photo', 'ipk', 'created_at'];

    protected array $casts = ['created_at' => 'datetime'];
    protected array $castHandlers = [];

    // Dates
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    protected $beforeInsert = ['castCreatedAt'];

    protected function castCreatedAt(array $data): array
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}
