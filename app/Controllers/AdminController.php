<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\MahasiswaModel;
use App\Models\LombaModel;
use App\Models\BeritaModel;
use App\Models\NonAkademik;

class AdminController extends BaseController
{
    protected $prodi;
    protected $mahasiswa;
    public function __construct()
    {
        $this->prodi = new ProdiModel();
        $this->nonakademik = new NonAkademik();
        $this->lomba = new LombaModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->berita = new BeritaModel();
    }

    public function dashboard()
    {
        $db = \Config\Database::connect();

        // Fetch all prodi and nonakademik to create mappings
        $prodiData = $this->prodi->findAll();
        $nonData = $this->nonakademik->findAll();

        $prodiMap = [];
        foreach ($prodiData as $p) {
            $prodiMap[$p['prodi_id']] = $p['nama_prodi'];
        }

        $nonMap = [];
        foreach ($nonData as $n) {
            $nonMap[$n['non_id']] = $n['nama_non'];
        }

        // Query builder untuk mengambil data lomba yang menunggu persetujuan
        $approvalCompetitions = $db->table('lomba')
            ->where('status', 0)
            ->get()
            ->getResultArray();

        foreach ($approvalCompetitions as &$competition) {
            $competition['kategori_lomba'] = strtolower($competition['kategori_lomba']);
            if ($competition['kategori_lomba'] == 'akademik') {
                if (!empty($competition['prodi_lomba'])) {
                    $prodiLombaArray = json_decode($competition['prodi_lomba'], true);
                    $namaProdiArray = array_map(function($prodi_id) use ($prodiMap) {
                        return $prodiMap[$prodi_id] ?? 'Unknown';
                    }, $prodiLombaArray);
                    $competition['nama_prodi'] = implode(', ', $namaProdiArray);
                } else {
                    $competition['nama_prodi'] = 'Unknown';
                }
            } else if ($competition['kategori_lomba'] == 'non-akademik') {
                if (!empty($competition['prodi_lomba'])) {
                    $nonLombaArray = json_decode($competition['prodi_lomba'], true);
                    $namaNonArray = array_map(function($non_id) use ($nonMap) {
                        return $nonMap[$non_id] ?? 'Unknown';
                    }, $nonLombaArray);
                    $competition['nama_prodi'] = implode(', ', $namaNonArray);
                } else {
                    $competition['nama_prodi'] = 'Unknown';
                }
            }
        }

        // Query builder untuk mengambil data lomba yang telah disetujui
        $updateCompetitions = $db->table('lomba')
            ->where('status', 1)
            ->get()
            ->getResultArray();

        foreach ($updateCompetitions as &$competition) {
            if ($competition['kategori_lomba'] == 'akademik') {
                if (!empty($competition['prodi_lomba'])) {
                    $prodiLombaArray = json_decode($competition['prodi_lomba'], true);
                    $namaProdiArray = array_map(function($prodi_id) use ($prodiMap) {
                        return $prodiMap[$prodi_id] ?? 'Unknown';
                    }, $prodiLombaArray);
                    $competition['nama_prodi'] = implode(', ', $namaProdiArray);
                } else {
                    $competition['nama_prodi'] = 'Unknown';
                }
            } else if ($competition['kategori_lomba'] == 'non-akademik') {
                if (!empty($competition['prodi_lomba'])) {
                    $nonLombaArray = json_decode($competition['prodi_lomba'], true);
                    $namaNonArray = array_map(function($non_id) use ($nonMap) {
                        return $nonMap[$non_id] ?? 'Unknown';
                    }, $nonLombaArray);
                    $competition['nama_prodi'] = implode(', ', $namaNonArray);
                } else {
                    $competition['nama_prodi'] = 'Unknown';
                }
            }
        }

        // Query builder untuk mengambil data tim lomba yang menunggu persetujuan
        $approvalTeams = $db->table('tim_lomba')
            ->select('tim_lomba.*, lomba.nama_lomba, lomba.tenggat_pendaftaran')
            ->join('lomba', 'tim_lomba.lomba_id = lomba.lomba_id')
            ->get()
            ->getResultArray(); 

        foreach ($approvalTeams as &$teams) {
            if (!empty($teams['anggota_tim'])) {
                $teams['anggota_tim'] = json_decode($teams['anggota_tim'], true);
            }
        }

        foreach ($approvalTeams as &$teams) {
            if (isset($teams['status'])) {
                switch ($teams['status']) {
                    case 0:
                        $teams['status'] = 'Menunggu Persetujuan';
                        break;
                    case 1:
                        $teams['status'] = 'Approved';
                        break;
                    case 2:
                        $teams['status'] = 'Rejected';
                        break;
                    default:
                        // Handle other cases if needed
                        break;
                }
            }
        }

        // Query builder untuk mengambil data akun mahasiswa
        $mahasiswa = $this->mahasiswa->findAll();
        $prodi = $this->prodi->findAll();
        $berita = $this->berita->findAll();
        $nonakademik = $this->nonakademik->findAll();

        return view('admin/dashboard', [
            'approvalCompetitions' => $approvalCompetitions,
            'updateCompetitions' => $updateCompetitions,
            'approvalTeams' => $approvalTeams,
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'nonakademik' => $nonakademik,
            'berita' => $berita,
        ]);
    }


    public function registerUserForm()
    {
        $prodi = $this->prodi->findAll();
        return view('admin/register_user_form', ['prodi' => $prodi]);
    }
    
    public function editUserView()
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

    public function approveLomba()
    {
        $lomba_id = $this->request->getPost('lomba_id');
        $db = \Config\Database::connect();
        $query = $db->table('lomba')->where('lomba_id', $lomba_id)->get();
        $lombaData = $query->getRowArray();

        if ($lombaData) {
            $updatedStatus = [
                'nama_lomba' => $lombaData['nama_lomba'],
                'pengguna_pengaju' => $lombaData['pengguna_pengaju'],
                'kategori_lomba' => $lombaData['kategori_lomba'],
                'tanggal_mulai' => $lombaData['tanggal_mulai'],
                'tanggal_selesai' => $lombaData['tanggal_selesai'],
                'keterangan_lomba' => $lombaData['keterangan_lomba'],
                'penyelenggara_lomba' => $lombaData['penyelenggara_lomba'],
                'poster_lomba' => $lombaData['poster_lomba'],
                'status' => 1,
            ];

            // Add Notifikasi Ke dalam Perubahan Profil
            $db = \Config\Database::connect();
            $currentDate = date('Y-m-d H:i:s');
            $notifModel = new \App\Models\NotifModel();

            $notifData = [
                'NIM_terkait' => $lombaData['pengguna_pengaju'],
                'title_notif' => 'Pengajuan Tim',
                'deskripsi_notif' => 'Pengajuan tim anda ditolak.',
                'mark_readed' => 0,
                'created_at' => $currentDate,
            ];

            $notifModel->insert($notifData);

            $db->table('lomba')->where('lomba_id', $lomba_id)->update($updatedStatus);
            
            return redirect()->to('/admin/dashboard#')->with('success', 'Pengajuan Lomba berhasil diterima.');
        } else {
            return redirect()->to('/admin/dashboard#')->with('error', 'Gagal memperbarui lomba, silahkan coba lagi.');
        }        
    }

    public function rejectLomba()
    {
        $lomba_id = $this->request->getPost('lomba_id');
        $db = \Config\Database::connect();
        $query = $db->table('lomba')->where('lomba_id', $lomba_id)->get();
        $lombaData = $query->getRowArray();

        if ($lombaData) {
            $updatedStatus = [
                'nama_lomba' => $lombaData['nama_lomba'],
                'pengguna_pengaju' => $lombaData['pengguna_pengaju'],
                'kategori_lomba' => $lombaData['kategori_lomba'],
                'tanggal_mulai' => $lombaData['tanggal_mulai'],
                'tanggal_selesai' => $lombaData['tanggal_selesai'],
                'keterangan_lomba' => $lombaData['keterangan_lomba'],
                'penyelenggara_lomba' => $lombaData['penyelenggara_lomba'],
                'poster_lomba' => $lombaData['poster_lomba'],
                'status' => 2,
            ];

            // Add Notifikasi Ke dalam Perubahan Profil
            $db = \Config\Database::connect();
            $currentDate = date('Y-m-d H:i:s');
            $notifModel = new \App\Models\NotifModel();

            $notifData = [
                'NIM_terkait' => $lombaData['pengguna_pengaju'],
                'title_notif' => 'Pengajuan Lomba',
                'deskripsi_notif' => 'Pengajuan lomba anda ditolak.',
                'mark_readed' => 0,
                'created_at' => $currentDate,
            ];

            $notifModel->insert($notifData);

            $db->table('lomba')->where('lomba_id', $lomba_id)->update($updatedStatus);
            
            return redirect()->to('/admin/dashboard#')->with('success', 'Pengajuan Lomba berhasil ditolak.');
        } else {
            return redirect()->to('/admin/dashboard#')->with('error', 'Gagal memperbarui lomba, silahkan coba lagi.');
        }
    }

    public function addLombaForm()
    {
        $prodi = $this->prodi->findAll();
        $nonakademik = $this->nonakademik->findAll();

        $data = [
            'prodi' => $prodi,
            'nonakademik' => $nonakademik,
        ];

        return view('admin/tambah_lomba', $data);
    }

    public function tambahLombaAdmin()
    {

        $db = \Config\Database::connect();

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
            return redirect()->to(base_url('/admin/tambah_lomba'))->with('errors', 'Isi semua kolom!');
        }

        $nama_lomba = $this->request->getPost('nama_lomba');
        $kategori_lomba = $this->request->getPost('kategori_lomba');
        $penyelenggara_lomba = $this->request->getPost('penyelenggara_lomba');
        $keterangan_lomba = $this->request->getPost('keterangan_lomba');
        $tenggat_pendaftaran = $this->request->getPost('tenggat_pendaftaran');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = 0;

        // Retrieve the array of selected "Prodi" values
        $final_prodi = [];
        
        if ($kategori_lomba === 'akademik'){
            $prodi_id = $this->request->getPost('prodi_id');
            if (isset($prodi_id[0]) && !empty($prodi_id[0]) && isset($prodi_id[1]) && !empty($prodi_id[1]) && isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika indeks 0, 1, dan 2 ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[1];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && !empty($prodi_id[0]) && isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika indeks 0 dan 2 ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && !empty($prodi_id[0]) && isset($prodi_id[1]) && !empty($prodi_id[1])) {
                // Jika indeks 0 dan 1 ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[1];
            } elseif (isset($prodi_id[1]) && !empty($prodi_id[1]) && isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika indeks 1 dan 2 ada dan tidak kosong
                $final_prodi[] = $prodi_id[1];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && !empty($prodi_id[0])) {
                // Jika hanya indeks 0 yang ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
            } elseif (isset($prodi_id[1]) && !empty($prodi_id[1])) {
                // Jika hanya indeks 1 yang ada dan tidak kosong
                $final_prodi[] = $prodi_id[1];
            } elseif (isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika hanya indeks 2 yang ada dan tidak kosong
                $final_prodi[] = $prodi_id[2];
            }
        } else {
            $non_id = $this->request->getPost('non_id');
            if (isset($non_id[0]) && !empty($non_id[0]) && isset($non_id[1]) && !empty($non_id[1]) && isset($non_id[2]) && !empty($non_id[2])) {
                // Jika indeks 0, 1, dan 2 ada dan tidak kosong
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[1];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && !empty($non_id[0]) && isset($non_id[2]) && !empty($non_id[2])) {
                // Jika indeks 0 dan 2 ada dan tidak kosong
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && !empty($non_id[0]) && isset($non_id[1]) && !empty($non_id[1])) {
                // Jika indeks 0 dan 1 ada dan tidak kosong
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[1];
            } elseif (isset($non_id[1]) && !empty($non_id[1]) && isset($non_id[2]) && !empty($non_id[2])) {
                // Jika indeks 1 dan 2 ada dan tidak kosong
                $final_prodi[] = $non_id[1];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && !empty($non_id[0])) {
                // Jika hanya indeks 0 yang ada dan tidak kosong
                $final_prodi[] = $non_id[0];
            } elseif (isset($non_id[1]) && !empty($non_id[1])) {
                // Jika hanya indeks 1 yang ada dan tidak kosong
                $final_prodi[] = $non_id[1];
            } elseif (isset($non_id[2]) && !empty($non_id[2])) {
                // Jika hanya indeks 2 yang ada dan tidak kosong
                $final_prodi[] = $non_id[2];
            }
        }

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
                            'pengguna_pengaju' => '100000000001',
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

    public function editLombaView()
    {
        $lomba_id = $this->request->getGet('lomba_id');
        $prodi = $this->prodi->findAll();
        $nonakademik = $this->nonakademik->findAll();
        
        $db = \Config\Database::connect();
        $query = $db->table('lomba')->where('lomba_id', $lomba_id)->get();
        $lomba = $query->getRowArray();

        $lombaArr = json_decode($lomba['prodi_lomba']);
        $lomba['prodi_lomba'] = $lombaArr;

        if ($lomba) {
            $data = [
                'lomba' => $lomba,
                'prodi' => $prodi,
                'nonakademik' => $nonakademik,
            ];
            return view('admin/edit_lomba_form', $data);
        } else {
            return redirect()->to('/admin/dashboard#');
        }
    }

    public function editLombaAdmin()
    {
        $lomba_id = $this->request->getPost('lomba_id');
        $nama_lomba = $this->request->getPost('nama_lomba');
        $kategori_lomba = $this->request->getPost('kategori_lomba');
        $tenggat_pendaftaran = $this->request->getPost('tenggat_pendaftaran');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $penyelenggara_lomba = $this->request->getPost('penyelenggara_lomba');
        $keterangan_lomba = $this->request->getPost('keterangan_lomba');
        $poster = $this->request->getFile('poster');


        $final_prodi = [];
        
        if ($kategori_lomba === 'akademik'){
            $prodi_id = $this->request->getPost('prodi_id');
            if (isset($prodi_id[0]) && !empty($prodi_id[0]) && isset($prodi_id[1]) && !empty($prodi_id[1]) && isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika indeks 0, 1, dan 2 ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[1];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && !empty($prodi_id[0]) && isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika indeks 0 dan 2 ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && !empty($prodi_id[0]) && isset($prodi_id[1]) && !empty($prodi_id[1])) {
                // Jika indeks 0 dan 1 ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
                $final_prodi[] = $prodi_id[1];
            } elseif (isset($prodi_id[1]) && !empty($prodi_id[1]) && isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika indeks 1 dan 2 ada dan tidak kosong
                $final_prodi[] = $prodi_id[1];
                $final_prodi[] = $prodi_id[2];
            } elseif (isset($prodi_id[0]) && !empty($prodi_id[0])) {
                // Jika hanya indeks 0 yang ada dan tidak kosong
                $final_prodi[] = $prodi_id[0];
            } elseif (isset($prodi_id[1]) && !empty($prodi_id[1])) {
                // Jika hanya indeks 1 yang ada dan tidak kosong
                $final_prodi[] = $prodi_id[1];
            } elseif (isset($prodi_id[2]) && !empty($prodi_id[2])) {
                // Jika hanya indeks 2 yang ada dan tidak kosong
                $final_prodi[] = $prodi_id[2];
            }
        } else {
            $non_id = $this->request->getPost('non_id');
            if (isset($non_id[0]) && !empty($non_id[0]) && isset($non_id[1]) && !empty($non_id[1]) && isset($non_id[2]) && !empty($non_id[2])) {
                // Jika indeks 0, 1, dan 2 ada dan tidak kosong
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[1];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && !empty($non_id[0]) && isset($non_id[2]) && !empty($non_id[2])) {
                // Jika indeks 0 dan 2 ada dan tidak kosong
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && !empty($non_id[0]) && isset($non_id[1]) && !empty($non_id[1])) {
                // Jika indeks 0 dan 1 ada dan tidak kosong
                $final_prodi[] = $non_id[0];
                $final_prodi[] = $non_id[1];
            } elseif (isset($non_id[1]) && !empty($non_id[1]) && isset($non_id[2]) && !empty($non_id[2])) {
                // Jika indeks 1 dan 2 ada dan tidak kosong
                $final_prodi[] = $non_id[1];
                $final_prodi[] = $non_id[2];
            } elseif (isset($non_id[0]) && !empty($non_id[0])) {
                // Jika hanya indeks 0 yang ada dan tidak kosong
                $final_prodi[] = $non_id[0];
            } elseif (isset($non_id[1]) && !empty($non_id[1])) {
                // Jika hanya indeks 1 yang ada dan tidak kosong
                $final_prodi[] = $non_id[1];
            } elseif (isset($non_id[2]) && !empty($non_id[2])) {
                // Jika hanya indeks 2 yang ada dan tidak kosong
                $final_prodi[] = $non_id[2];
            }
        }

        $lombaModel = new lombaModel();
        $lomba = $lombaModel->where('lomba_id', $lomba_id)->first();
        
        $updateData = [];
        $updateData['prodi_lomba'] = json_encode($final_prodi);

        // Bandingkan data yang baru dengan data yang ada di database
        if ($kategori_lomba != $lomba['kategori_lomba']) {
            $updateData['kategori_lomba'] = $kategori_lomba;
        }
        if ($nama_lomba != $lomba['nama_lomba']) {
            $updateData['nama_lomba'] = $nama_lomba;
        }
        if ($tenggat_pendaftaran != $lomba['tenggat_pendaftaran']) {
            $updateData['tenggat_pendaftaran'] = $tenggat_pendaftaran;
        }
        if ($tanggal_mulai != $lomba['tanggal_mulai']) {
            $updateData['tanggal_mulai'] = $tanggal_mulai;
        }
        if ($tanggal_selesai != $lomba['tanggal_selesai']) {
            $updateData['tanggal_selesai'] = $tanggal_selesai;
        }
        if ($penyelenggara_lomba != $lomba['penyelenggara_lomba']) {
            $updateData['penyelenggara_lomba'] = $penyelenggara_lomba;
        }
        if ($keterangan_lomba != $lomba['keterangan_lomba']) {
            $updateData['keterangan_lomba'] = $keterangan_lomba;
        }
        if ($poster->isValid()) {
            // Jika ada file poster baru diupload            
            $file_ext = $poster->getClientExtension();
            $validImageExtensions = ['jpg', 'jpeg', 'png'];
            
            $newImageName = $poster->getRandomName();
            $file_destination = ROOTPATH . 'public/uploads/poster';
            
            if ($poster->move($file_destination, $newImageName)){
                $updateData['poster_lomba'] = $newImageName;
            }
        }

        // Lakukan update hanya jika ada perubahan data
        if (!empty($updateData)) {
            // Lakukan update menggunakan model
            $lombaModel->update($lomba['lomba_id'], $updateData);

            // Redirect dengan pesan sukses
            return redirect()->to('/admin/dashboard')->with('success', 'Data Info Lomba diperbarui.');
        } else {
            // Tidak ada perubahan data yang perlu diupdate
            return redirect()->to('/admin/dashboard')->with('info', 'Tidak ada perubahan yang dilakukan.');
        }

    }

    public function hapusLombaAdmin()
    {
        $db = \Config\Database::connect();
        $lomba_id = $this->request->getPost('lomba_id');
        
        try {
            $lomba = $db->table('lomba')->where('lomba_id', $lomba_id)->get()->getRow();
            if ($lomba) {
                $db->table('lomba')->where('lomba_id', $lomba_id)->delete();
                return redirect()->to(base_url('admin/dashboard'))->with('success', 'Lomba berhasil dihapus');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus Lomba: Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/dashboard'))->with('error', $e->getMessage());
        }
    }

    public function approveTim()
    {
        $tim_lomba_id = $this->request->getPost('tim_lomba_id');
        $db = \Config\Database::connect();
        $query = $db->table('tim_lomba')->where('tim_lomba_id', $tim_lomba_id)->get();
        $timData = $query->getRowArray();

        if ($timData) {
            $updatedStatus = [
                'tim_lomba_id' => $timData['tim_lomba_id'],
                'lomba_id' => $timData['lomba_id'],
                'nama_tim' => $timData['nama_tim'],
                'NIM_ketua' => $timData['NIM_ketua'],
                'anggota_tim' => $timData['anggota_tim'],
                'status' => 1,
            ];
            $db->table('tim_lomba')->where('tim_lomba_id', $tim_lomba_id)->update($updatedStatus);
            
            // Add Notifikasi Ke dalam Perubahan Profil
            $db = \Config\Database::connect();
            $currentDate = date('Y-m-d H:i:s');
            $notifModel = new \App\Models\NotifModel();

            $notifData = [
                'NIM_terkait' => $timData['NIM_ketua'],
                'title_notif' => 'Pengajuan Tim',
                'deskripsi_notif' => 'Pengajuan tim anda diterima.',
                'mark_readed' => 0,
                'created_at' => $currentDate,
            ];

            $notifModel->insert($notifData);

            return redirect()->to('/admin/dashboard#')->with('success', 'Pengajuan tim berhasil disetujui.');
        } else {
            return redirect()->to('/admin/dashboard#')->with('error', 'Error saat ingin memperbarui');
        }
    }

    public function rejectTim(){
        $tim_lomba_id = $this->request->getPost('tim_lomba_id');
        $db = \Config\Database::connect();
        $query = $db->table('tim_lomba')->where('tim_lomba_id', $tim_lomba_id)->get();
        $timData = $query->getRowArray();

        if ($timData) {
            $updatedStatus = [
                'tim_lomba_id' => $timData['tim_lomba_id'],
                'lomba_id' => $timData['lomba_id'],
                'nama_tim' => $timData['nama_tim'],
                'NIM_ketua' => $timData['NIM_ketua'],
                'anggota_tim' => $timData['anggota_tim'],
                'status' => 2,
            ];

            // Add Notifikasi Ke dalam Perubahan Profil
            $db = \Config\Database::connect();
            $currentDate = date('Y-m-d H:i:s');
            $notifModel = new \App\Models\NotifModel();

            $notifData = [
                'NIM_terkait' => $timData['NIM_ketua'],
                'title_notif' => 'Pengajuan Tim',
                'deskripsi_notif' => 'Pengajuan tim anda ditolak.',
                'mark_readed' => 0,
                'created_at' => $currentDate,
            ];

            $notifModel->insert($notifData);
            $db->table('tim_lomba')->where('tim_lomba_id', $tim_lomba_id)->update($updatedStatus);
            
            return redirect()->to('/admin/dashboard#')->with('success', 'Pengajuan Tim berhasil ditolak.');
        } else {
            return redirect()->to('/admin/dashboard#')->with('error', 'Error saat ingin memperbarui');
        }
    }

    public function addBeritaView(){
        $prodi = $this->prodi->findAll();
        return view('admin/tambah_berita', ['prodi' => $prodi]);
    }
    
    public function tambahBeritaAdmin(){
        $db = \Config\Database::connect();

        $validation = $this->validate([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
        ]);

        if (!$validation) {
            return redirect()->to(base_url('/admin/tambah_berita_form'))->with('errors', 'Isi semua kolom!');
        }

        $judul_berita = $this->request->getPost('judul_berita');
        $isi_berita = $this->request->getPost('isi_berita');
        $prodi_berita = $this->request->getPost('prodi_berita');

        $lowercase_judul_berita = strtolower($judul_berita);

        $query = $this->berita->where('LOWER(judul_berita)', $lowercase_judul_berita);
        $final_prodi = [];

        // Memeriksa berbagai kondisi untuk menentukan elemen-elemen yang ada di final_prodi
        if (isset($prodi_berita[0]) && isset($prodi_berita[1]) && isset($prodi_berita[2])) {
            // Jika indeks 0, 1, dan 2 ada
            $final_prodi[] = $prodi_berita[0];
            $final_prodi[] = $prodi_berita[1];
            $final_prodi[] = $prodi_berita[2];
        } elseif (isset($prodi_berita[0]) && isset($prodi_berita[2])) {
            // Jika indeks 0 dan 2 ada
            $final_prodi[] = $prodi_berita[0];
            $final_prodi[] = $prodi_berita[2];
        } elseif (isset($prodi_berita[0]) && isset($prodi_berita[1])) {
            // Jika indeks 0 dan 1 ada
            $final_prodi[] = $prodi_berita[0];
            $final_prodi[] = $prodi_berita[1];
        } elseif (isset($prodi_berita[1]) && isset($prodi_berita[2])) {
            // Jika indeks 1 dan 2 ada
            $final_prodi[] = $prodi_berita[1];
            $final_prodi[] = $prodi_berita[2];
        } elseif (isset($prodi_berita[0])) {
            // Jika hanya indeks 0 yang ada
            $final_prodi[] = $prodi_berita[0];
        } elseif (isset($prodi_berita[1])) {
            // Jika hanya indeks 1 yang ada
            $final_prodi[] = $prodi_berita[1];
        } elseif (isset($prodi_berita[2])) {
            // Jika hanya indeks 2 yang ada
            $final_prodi[] = $prodi_berita[2];
        }

        if ($query->countAllResults() > 0) {
            return redirect()->to(base_url('/admin/tambah_berita_form'))->with('errors', 'Berita yang sama sudah pernah ditambahkan.');
        } else {
            $img = $this->request->getFile('foto_berita');

            if ($img->isValid() && !$img->hasMoved()) {
                $file_ext = $img->getClientExtension();
                $validImageExtensions = ['jpg', 'jpeg', 'png'];

                if (!in_array($file_ext, $validImageExtensions)) {
                    return redirect()->to('/admin/tambah_berita_form')->with('errors', 'Format Gambar Tidak Sesuai');
                } else {
                    $newImageName = $img->getRandomName();
                    $file_destination = ROOTPATH . 'public/uploads/berita';

                    if ($img->move($file_destination, $newImageName)) { // Correctly move the file
                        $data = [
                            'judul_berita' => $judul_berita,
                            'isi_berita' => $isi_berita,
                            'prodi_berita' => json_encode($final_prodi),
                            'foto_berita' => $newImageName,
                        ];

                        $this->berita->insert($data);

                        return redirect()->to(base_url('/admin/dashboard#'))->with('success', 'Berita Berhasil Ditambahkan.');
                    } else {
                        return redirect()->to(base_url('/admin/tambah_berita_form'))->with('errors', 'Gagal menyimpan file');
                    }
                }
            } else {
                return redirect()->to(base_url('/admin/tambah_berita_form'))->with('errors', 'Tidak ada gambar yang diunggah');
            }
        }
    }

    public function editBeritaView(){
        $berita_id = $this->request->getGet('berita_id');
        $prodi = $this->prodi->findAll();
        
        $db = \Config\Database::connect();
        $query = $db->table('berita')->where('berita_id', $berita_id)->get();
        $berita = $query->getRowArray();

        $beritaArr = json_decode($berita['prodi_berita']);
        $berita['prodi_berita'] = $beritaArr;
        

        if ($berita) {
            $data = [
                'berita' => $berita,
                'prodi' => $prodi,
            ];
            return view('admin/edit_berita_form', $data);
        } else {
            return redirect()->to('/admin/dashboard#');
        }
    }

    public function editBeritaAdmin(){
        $berita_id = $this->request->getPost('berita_id');
        $judul_berita = $this->request->getPost('judul_berita');
        $prodi_berita = $this->request->getPost('prodi_berita');
        $isi_berita = $this->request->getPost('isi_berita');
        $poster = $this->request->getFile('foto_berita');

        $prodi_berita = $this->request->getPost('prodi_berita');
        $final_prodi = [];

        // Memeriksa berbagai kondisi untuk menentukan elemen-elemen yang ada di final_prodi
        if (isset($prodi_berita[0]) && !empty($prodi_berita[0]) && isset($prodi_berita[1]) && !empty($prodi_berita[1]) && isset($prodi_berita[2]) && !empty($prodi_berita[2])) {
            // Jika indeks 0, 1, dan 2 ada dan tidak kosong
            $final_prodi[] = $prodi_berita[0];
            $final_prodi[] = $prodi_berita[1];
            $final_prodi[] = $prodi_berita[2];
        } elseif (isset($prodi_berita[0]) && !empty($prodi_berita[0]) && isset($prodi_berita[2]) && !empty($prodi_berita[2])) {
            // Jika indeks 0 dan 2 ada dan tidak kosong
            $final_prodi[] = $prodi_berita[0];
            $final_prodi[] = $prodi_berita[2];
        } elseif (isset($prodi_berita[0]) && !empty($prodi_berita[0]) && isset($prodi_berita[1]) && !empty($prodi_berita[1])) {
            // Jika indeks 0 dan 1 ada dan tidak kosong
            $final_prodi[] = $prodi_berita[0];
            $final_prodi[] = $prodi_berita[1];
        } elseif (isset($prodi_berita[1]) && !empty($prodi_berita[1]) && isset($prodi_berita[2]) && !empty($prodi_berita[2])) {
            // Jika indeks 1 dan 2 ada dan tidak kosong
            $final_prodi[] = $prodi_berita[1];
            $final_prodi[] = $prodi_berita[2];
        } elseif (isset($prodi_berita[0]) && !empty($prodi_berita[0])) {
            // Jika hanya indeks 0 yang ada dan tidak kosong
            $final_prodi[] = $prodi_berita[0];
        } elseif (isset($prodi_berita[1]) && !empty($prodi_berita[1])) {
            // Jika hanya indeks 1 yang ada dan tidak kosong
            $final_prodi[] = $prodi_berita[1];
        } elseif (isset($prodi_berita[2]) && !empty($prodi_berita[2])) {
            // Jika hanya indeks 2 yang ada dan tidak kosong
            $final_prodi[] = $prodi_berita[2];
        }

        $beritaModel = new BeritaModel();
        $berita = $beritaModel->where('berita_id', $berita_id)->first();

        $updateData = [];

        // Bandingkan data yang baru dengan data yang ada di database
        if ($judul_berita != $berita['judul_berita']) {
            $updateData['judul_berita'] = $judul_berita;
        }
        if ($isi_berita != $berita['isi_berita']) {
            $updateData['isi_berita'] = $isi_berita;
        }
        if ($poster->isValid()) {
            // Jika ada file poster baru diupload            
            $file_ext = $poster->getClientExtension();
            $validImageExtensions = ['jpg', 'jpeg', 'png'];
            
            $newImageName = $poster->getRandomName();
            $file_destination = ROOTPATH . 'public/uploads/poster';
            
            if ($poster->move($file_destination, $newImageName)){
                $updateData['foto_berita'] = $newImageName;
            }
        }

        // Lakukan update hanya jika ada perubahan data
        if (!empty($updateData)) {
            // Lakukan update menggunakan model
            $beritaModel->update($berita['berita_id'], $updateData);

            // Redirect dengan pesan sukses
            return redirect()->to('/admin/dashboard')->with('success', 'Data Info berita diperbarui.');
        } else {
            // Tidak ada perubahan data yang perlu diupdate
            return redirect()->to('/admin/dashboard')->with('info', 'Tidak ada perubahan yang dilakukan.');
        }
    }

    public function hapusBeritaAdmin()
    {
        $db = \Config\Database::connect();
        $berita_id = $this->request->getPost('berita_id');
        
        try {
            $berita = $db->table('berita')->where('berita_id', $berita_id)->get()->getRow();
            if ($berita) {
                $db->table('berita')->where('berita_id', $berita_id)->delete();
                return redirect()->to(base_url('admin/dashboard'))->with('success', 'Berita berhasil dihapus');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus berita: Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/dashboard'))->with('error', $e->getMessage());
        }
    }
}
