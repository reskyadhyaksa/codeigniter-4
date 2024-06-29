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
    
    public function editUserForm()
    {
        // Ambil NIM dari GET
        $nim = $this->request->getGet('NIM');
        $prodi = $this->prodi->findAll();

        // Load model MahasiswaModel jika sudah dibuat
        $mahasiswaModel = new MahasiswaModel();

        // Query untuk mengambil data mahasiswa berdasarkan NIM
        $mahasiswa = $mahasiswaModel->where('NIM', $nim)->first();

        // Cek apakah data ditemukan
        if ($mahasiswa) {
            // Data mahasiswa ditemukan, kirimkan ke view
            $data = [
                'mahasiswa' => $mahasiswa,
                'prodi' => $prodi
            ];
            return view('admin/edit_mahasiswa', $data);
        } else {
            // Data mahasiswa tidak ditemukan, handle kasus ini
            echo "Data mahasiswa tidak ditemukan.";
            // Atau bisa juga redirect ke halaman lain misalnya
            return redirect()->to('/admin/dashboard#');
        }
    }

    
    public function addBeritaForm()
    {
        $prodi = $this->prodi->findAll();
        return view('admin/tambah_lomba', ['prodi' => $prodi]);
    }

    public function tambahLombaAdmin()
    {
        $validation = $this->validate([
            'nama_lomba' => 'required',
            'kategori_lomba' => 'required',
            'link_lomba' => 'required',
            'keterangan_lomba' => 'required',
            'tenggat_pendaftaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        if (!$validation) {
            return redirect()->to(base_url('/admin/tambah_lomba'))->with('errors', 'Isi semua kolom!');
        }

        $nama_lomba = $this->request->getPost('nama_lomba');
        $kategori_lomba = $this->request->getPost('kategori_lomba');
        $link_lomba = $this->request->getPost('link_lomba');
        $keterangan_lomba = $this->request->getPost('keterangan_lomba');
        $tenggat_pendaftaran = $this->request->getPost('tenggat_pendaftaran');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = 1;

        $lowercase_nama_lomba = strtolower($nama_lomba);

        $query = $this->lomba->where('LOWER(nama_lomba)', $lowercase_nama_lomba);

        if ($query->countAllResults() > 0) {
            return redirect()->to(base_url('/admin/tambah_lomba'))->with('errors', 'Lomba yang sama sudah pernah diajukan.');
        } else {
            $img = $this->request->getFile('poster');

            if ($img->isValid() && !$img->hasMoved()) {
                $file_ext = $img->getClientExtension();
                $validImageExtensions = ['jpg', 'jpeg', 'png'];

                if (!in_array($file_ext, $validImageExtensions)) {
                    return redirect()->to('/admin/tambah_lomba')->with('errors', 'Format Gambar Tidak Sesuai');
                } else {
                    $newImageName = $img->getRandomName();
                    $file_destination = ROOTPATH . 'public/uploads/poster';

                    if ($img->move($file_destination, $newImageName)) { // Correctly move the file
                        $data = [
                            'kategori_lomba' => $kategori_lomba,
                            'nama_lomba' => $nama_lomba,
                            'poster_lomba' => $newImageName, // Store the new file name
                            'link_lomba' => $link_lomba,
                            'keterangan_lomba' => $keterangan_lomba,
                            'tenggat_pendaftaran' => $tenggat_pendaftaran,
                            'tanggal_mulai' => $tanggal_mulai,
                            'tanggal_selesai' => $tanggal_selesai,
                            'status' => $status
                        ];

                        $this->lomba->insert($data);

                        return redirect()->to(base_url('/admin/dashboard#'))->with('success', 'Lomba Berhasil Ditambahkan.');
                    } else {
                        return redirect()->to(base_url('/admin/tambah_lomba'))->with('errors', 'Gagal menyimpan file');
                    }
                }
            } else {
                return redirect()->to(base_url('/admin/tambah_lomba'))->with('errors', 'Tidak ada gambar yang diunggah');
            }
        }
    }
}
