<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdiModel;
use App\Models\LombaModel;
use App\Models\MahasiswaModel;
use App\Models\TimLombaModel;
use App\Models\NonAkademik;
use App\Models\NotifModel;

use Codeigniter\Files\File;
use Ramsey\Uuid\Uuid;

class FormController extends BaseController
{
    protected $prodi;
    protected $nonakademik;
    protected $lomba;
    protected $mahasiswa;
    protected $notifikasi;
    protected $tim_lomba;

    public function __construct()
    {

        $this->prodi = new ProdiModel();
        $this->lomba = new LombaModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->tim_lomba = new TimLombaModel();
        $this->nonakademik = new NonAkademik();
        $this->notifikasi = new NotifModel();
    }

    // frontend
    public function form_lomba()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();


        $prodi = $this->prodi->findAll();
        $nonakademik = $this->nonakademik->findAll();
        $data = [
            'prodi' => $prodi,
            'nonakademik' => $nonakademik,
            'notifikasi' => $notifikasi,

        ];
        return view('form/form_lomba', $data);
    }

    public function form_tim()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $prodi = $this->prodi->findAll();
        $mahasiswa = $this->mahasiswa->findAll();
        $lomba = $this->lomba->where('status', 1)->findAll();
        $data = [
            'prodi' => $prodi,
            'mahasiswa' => $mahasiswa,
            'lomba' => $lomba,
            'notifikasi' => $notifikasi,
        ];
        return view('form/form_tim', $data);
    }


    // backend
    public function insertLomba()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }


        $validation = $this->validate([
            'nama_lomba' => 'required',
            'kategori_lomba' => 'required',
            'penyelenggara_lomba' => 'required',
            'keterangan_lomba' => 'required',
            'tenggat_pendaftaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        if (!$validation) {
            return redirect()->to(base_url('/form/form_lomba'))->with('errors', 'Isi semua kolom!');
        }

        $nama_lomba = $this->request->getPost('nama_lomba');
        $kategori_lomba = $this->request->getPost('kategori_lomba');
        $penyelenggara_lomba = $this->request->getPost('penyelenggara_lomba');
        $keterangan_lomba = $this->request->getPost('keterangan_lomba');
        $tenggat_pendaftaran = $this->request->getPost('tenggat_pendaftaran');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = 0;

        $lowercase_nama_lomba = strtolower($nama_lomba);

        $query = $this->lomba->where('LOWER(nama_lomba)', $lowercase_nama_lomba);

        $final_prodi = [];
        
        if ($kategori_lomba === 'akademik'){
            $prodi_id = $this->request->getPost('prodi_id');
            if (isset($prodi_id[0]) && isset($prodi_id[1]) && isset($prodi_id[2])) {
                // Jika indeks 0, 1, dan 2 ada
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[1];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && isset($prodi_id[2])) {
                // Jika indeks 0 dan 2 ada
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && isset($prodi_id[1])) {
                // Jika indeks 0 dan 1 ada
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[1];
            } elseif (isset($prodi_id[1]) && isset($prodi_id[2])) {
                // Jika indeks 1 dan 2 ada
                $final_prodi[] = $prodi_id[1];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0])) {
                // Jika hanya indeks 0 yang ada
                $final_prodi[] = $prodi_id[0];
            } elseif (isset($prodi_id[1])) {
                // Jika hanya indeks 1 yang ada
                $final_prodi[] = $prodi_id[1];
            } elseif (isset($prodi_id[2])) {
                // Jika hanya indeks 2 yang ada
                $final_prodi[] = $prodi_id[2];
            }
        } else {
            $non_id = $this->request->getPost('non_id');
            if (isset($non_id[0]) && isset($non_id[1]) && isset($non_id[2])) {
                // Jika indeks 0, 1, dan 2 ada
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[1];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && isset($non_id[2])) {
                // Jika indeks 0 dan 2 ada
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && isset($non_id[1])) {
                // Jika indeks 0 dan 1 ada
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[1];
            } elseif (isset($non_id[1]) && isset($non_id[2])) {
                // Jika indeks 1 dan 2 ada
                $final_prodi[] = $non_id[1];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0])) {
                // Jika hanya indeks 0 yang ada
                $final_prodi[] = $non_id[0];
            } elseif (isset($non_id[1])) {
                // Jika hanya indeks 1 yang ada
                $final_prodi[] = $non_id[1];
            } elseif (isset($non_id[2])) {
                // Jika hanya indeks 2 yang ada
                $final_prodi[] = $non_id[2];
            }
        }

        if ($query->countAllResults() > 0) {
            return redirect()->to(base_url('/form/form_lomba'))->with('errors', 'Lomba yang sama sudah pernah diajukan.');
        } else {
            $img = $this->request->getFile('poster');

            if ($img->isValid() && !$img->hasMoved()) {
                $file_ext = $img->getClientExtension();
                $validImageExtensions = ['jpg', 'jpeg', 'png'];

                if (!in_array($file_ext, $validImageExtensions)) {
                    return redirect()->to('/form/form_lomba')->with('errors', 'Format Gambar Tidak Sesuai');
                } else {
                    $newImageName = $img->getRandomName();
                    $file_destination = ROOTPATH . 'public/uploads/poster';

                    if ($img->move($file_destination, $newImageName)) { // Correctly move the file
                        $data = [
                            'kategori_lomba' => $kategori_lomba,
                            'pengguna_pengaju' => session()->get('user_id'),
                            'nama_lomba' => $nama_lomba,
                            'poster_lomba' => $newImageName, // Store the new file name
                            'penyelenggara_lomba' => $penyelenggara_lomba,
                            'keterangan_lomba' => $keterangan_lomba,
                            'tenggat_pendaftaran' => $tenggat_pendaftaran,
                            'tanggal_mulai' => $tanggal_mulai,
                            'tanggal_selesai' => $tanggal_selesai,
                            'prodi_lomba' => json_encode($final_prodi),
                            'status' => $status
                        ];

                        // Add Notifikasi Ke dalam Perubahan Profil
                        $nim_pengguna = $this->request->getPost('NIM');
                        $db = \Config\Database::connect();
                        $currentDate = date('Y-m-d H:i:s');
                        $notifModel = new \App\Models\NotifModel();

                        $notifData = [
                            'NIM_terkait' => session()->get('user_id'),
                            'title_notif' => 'Pengajuan Lomba',
                            'deskripsi_notif' => 'Pengajuan berhasil, silahkan tunggu validasi',
                            'mark_readed' => 0,
                            'created_at' => $currentDate,
                        ];

                        $notifModel->insert($notifData);

                        $this->lomba->insert($data);

                        return redirect()->to(base_url('/form/form_lomba'))->with('success', 'Lomba Berhasil Diajukan. Menunggu Verifikasi.');
                    } else {
                        return redirect()->to(base_url('/form/form_lomba'))->with('errors', 'Gagal menyimpan file');
                    }
                }
            } else {
                return redirect()->to(base_url('/form/form_lomba'))->with('errors', 'Tidak ada gambar yang diunggah');
            }
        }
    }

    public function insertTim()
    {
        $tim_lomba_id = Uuid::uuid4()->toString();
        $lomba_id = $this->request->getPost('lomba_id');
        $nama_tim = $this->request->getPost('nama_tim');
        $NIM_ketua = $this->request->getPost('NIM_ketua');
        

        $validation = $this->validate([
            'lomba_id' => 'required',
            'nama_tim' => 'required',
            'NIM_ketua' => 'required',
        ]);

        if (!$validation) {
            return redirect()->to(base_url('/form/form_tim'))->with('errors', 'Isi semua kolom!')->setJSON(
                [
                    'status' => ResponseInterface::HTTP_BAD_REQUEST,
                    'message' => \Config\Services::validation()->getErrors()
                ]
            );
        }

        /* Status: 0: Pending -- Default; 1: Disetujui; 2: Ditolak */
        $status = 0;

        $postData = $this->request->getPost();
        $nimAnggota = [];
        foreach ($postData as $key => $value) {
            if (strpos($key, 'NIM_anggota') === 0 && !empty($value)) {
                $nimAnggota[] = $value;
            }
        }

        
        $data_tim_lomba = [
            'tim_lomba_id' => $tim_lomba_id,
            'lomba_id' => $lomba_id,
            'nama_tim' => $nama_tim,
            'NIM_ketua' => $NIM_ketua,
            'anggota_tim' => json_encode($nimAnggota),
            'status' => $status,
        ];
        
        // Add Notifikasi Ke dalam Perubahan Profil
        $db = \Config\Database::connect();
        $currentDate = date('Y-m-d H:i:s');
        $notifModel = new \App\Models\NotifModel();

        $notifData = [
            'NIM_terkait' => session()->get('user_id'),
            'title_notif' => 'Pengajuan Tim',
            'deskripsi_notif' => 'Pengajuan berhasil, silahkan tunggu validasi',
            'mark_readed' => 0,
            'created_at' => $currentDate,
        ];

        $notifModel->insert($notifData);
        $tim_lomba = $this->tim_lomba->insert($data_tim_lomba);

        return redirect()->to(base_url('/form/form_tim'))->with('success', 'Tim Berhasil Diajukan. Menunggu Verifikasi.');
    }
}
