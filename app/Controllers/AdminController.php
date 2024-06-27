<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\MahasiswaModel;

class AdminController extends BaseController
{
    protected $prodi;
    protected $mahasiswa;
    public function __construct()
    {
        $this->prodi = new ProdiModel();
        $this->mahasiswa = new MahasiswaModel();
    }

    public function dashboard()
    {
        $db = \Config\Database::connect();

        // Query builder untuk mengambil data lomba yang menunggu persetujuan
        $approvalCompetitions = $db->table('lomba')
            ->where('status', 1)
            ->get()
            ->getResultArray();

        // Query builder untuk mengambil data lomba yang telah disetujui
        $updateCompetitions = $db->table('lomba')
            ->where('status', 2)
            ->get()
            ->getResultArray();

        // Query builder untuk mengambil data tim lomba yang menunggu persetujuan
        $approvalTeams = $db->table('tim_lomba')
            ->select('tim_lomba.*, lomba.nama_lomba, lomba.tenggat_pendaftaran')
            ->join('lomba', 'tim_lomba.lomba_id = lomba.lomba_id')
            ->where('tim_lomba.status', 0)
            ->get()
            ->getResultArray();


        // Query builder untuk mengambil data akun mahasiswa
        $mahasiswa = $this->mahasiswa->findAll();

        return view('admin/dashboard', [
            'approvalCompetitions' => $approvalCompetitions,
            'updateCompetitions' => $updateCompetitions,
            'approvalTeams' => $approvalTeams,
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function registerUserForm()
    {
        $prodi = $this->prodi->findAll();
        return view('admin/register_user_form', ['prodi' => $prodi]);
    }
    public function addBeritaForm()
    {
        $prodi = $this->prodi->findAll();
        return view('admin/tambah_lomba', ['prodi' => $prodi]);
    }
}
