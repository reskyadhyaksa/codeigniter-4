<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdiModel;
use App\Models\LombaModel;
use App\Models\MahasiswaModel;
use App\Models\TimLombaModel;
use App\Models\AnggotaTimLombaModel;
use App\Models\NotifModel;
use Ramsey\Uuid\Uuid;

class MahasiswaController extends BaseController
{
    protected $prodi;
    protected $lomba;
    protected $mahasiswa;
    protected $timLomba;
    protected $notifikasi;

    public function __construct()
    {
        $this->prodi = new ProdiModel();
        $this->lomba = new LombaModel();
        $this->notifikasi = new NotifModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->timLomba = new TimLombaModel();
    }

    public function profile()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        // Retrieve user data from session
        $dataMahasiswa = [
            'user_id' => session()->get('user_id'),
            'user_type' => session()->get('user_type'),
            'mahasiswa' => session()->get('mahasiswa'),
        ];

        $prodi = $this->prodi->find($dataMahasiswa['mahasiswa']['prodi_id']);

        $data = [
            'mahasiswa' => $dataMahasiswa,
            'prodi' => $prodi,
            'notifikasi' => $notifikasi,
        ];

        return view('mahasiswa/profile', $data);
    }

    public function editProfile()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        // Retrieve user data from session
        $dataMahasiswa = [
            'user_id' => session()->get('user_id'),
            'user_type' => session()->get('user_type'),
            'mahasiswa' => $this->mahasiswa->find(session()->get('mahasiswa')['NIM']),
        ];

        $prodi = $this->prodi->find($dataMahasiswa['mahasiswa']['prodi_id']);

        $data = [
            'mahasiswa' => $dataMahasiswa,
            'prodi' => $prodi,
            'notifikasi' => $notifikasi,
        ];
        return view('mahasiswa/edit_profile_mahasiswa', $data);
    }

    public function profileInfoLomba()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $lomba = $this->lomba->where('pengguna_pengaju', $user_id)->findAll();
        $data = [
            'lomba' => $lomba,
            'notifikasi' => $notifikasi,
        ];
        return view('mahasiswa/profile_info_lomba', $data);
    }

    public function profileTimLomba()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $ketuaLomba = $this->timLomba->where('NIM_ketua', $user_id)->findAll();
        $anggotaLomba = $this->timLomba->like('anggota_tim', $user_id)->findAll();

        $timLomba = array_merge($ketuaLomba, $anggotaLomba);

        $timLomba = array_unique($timLomba, SORT_REGULAR);

        foreach ($timLomba as &$team) {
            $lomba = $this->lomba->find($team['lomba_id']);
            $team['nama_lomba'] = $lomba ? $lomba['nama_lomba'] : 'Unknown';

            // Fetch the name of the ketua
            $ketua = $this->mahasiswa->find($team['NIM_ketua']);
            $team['nama_ketua'] = $ketua ? $ketua['nama_lengkap'] : 'Unknown';

            // Fetch the names of the anggota
            $anggota_tim = json_decode($team['anggota_tim'], true);
            $anggota_nama = [];
            if (is_array($anggota_tim)) {
                foreach ($anggota_tim as $nim) {
                    $anggota = $this->mahasiswa->find($nim);
                    if ($anggota) {
                        $anggota_nama[] = $anggota['nama_lengkap'];
                    }
                }
            }
            $team['anggota_nama'] = $anggota_nama;
        }
        
        $data = [
            'timLomba' => $timLomba,
            'notifikasi' => $notifikasi,
        ];

        // return response()->setJSON($data);  
        return view('mahasiswa/profile_tim_lomba', $data);
    }



    /* back end */
    public function updateProfile()
    {

        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $email = $this->request->getPost('email');

        $validation = $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
        ]);

        if (!$validation) {
            return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('errors', 'Isi semua kolom!');
        }

        $dataMahasiswa = session()->get('mahasiswa');
        $mahasiswa = $this->mahasiswa->find($dataMahasiswa['NIM']);

        $img = $this->request->getFile('upload-photo');

        if ($img->isValid() && !$img->hasMoved()) {
            $file_ext = $img->getClientExtension();
            $validImageExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array($file_ext, $validImageExtensions)) {
                return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('errors', 'Format Gambar Tidak Sesuai!');
            } else {
                $newImageName = $img->getRandomName();
                $file_destination = ROOTPATH . 'public/uploads/mahasiswa';

                if ($img->move($file_destination, $newImageName)) { // Correctly move the file
                    $data = [
                        'nama_lengkap' => $nama_lengkap,
                        'email' => $email,
                        'photo' => $newImageName,
                    ];

                    $mahasiswa = $this->mahasiswa->update($mahasiswa['NIM'], $data);

                    return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('success', 'Profil berhasil diubah!');
                } else {
                    return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('errors', 'Gagal menyimpan foto profil!');
                }
            }
        }

        $mahasiswa = [
            'NIM' => $this->request->getPost('NIM'),
            'prodi_id' => $this->request->getPost('prodi_id'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'photo' => $this->request->getPost('photo'),
            'ipk' => $this->request->getPost('ipk'),
            'created_at' => $this->request->getPost('created_at'),
        ];

        // Add Notifikasi Ke dalam Perubahan Profil
        $nim_pengguna = $this->request->getPost('NIM');
        $db = \Config\Database::connect();
        $currentDate = date('Y-m-d H:i:s');
        $notifModel = new \App\Models\NotifModel();

        $notifData = [
            'NIM_terkait' => session()->get('user_id'),
            'title_notif' => 'Data Pengguna',
            'deskripsi_notif' => 'Anda telah melakukan perubahan data',
            'mark_readed' => 0,
            'created_at' => $currentDate,
        ];

        $notifModel->insert($notifData);
        $this->mahasiswa->update($mahasiswa['NIM'], $mahasiswa);
        return redirect()->to(base_url('/mahasiswa/profile'));
    }

    public function updatePassword()
    {
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        $validation = $this->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if (!$validation) {
            // return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('errors', 'Isi semua kolom!');
            return response()->setJSON([
                'status' => 400,
                'message' => 'Isi semua kolom!',
                'error' => \Config\Services::validation()->getErrors(),
            ]);
        }

        $dataMahasiswa = session()->get('mahasiswa');
        $mahasiswa = $this->mahasiswa->find($dataMahasiswa['NIM']);

        if ($new_password != $confirm_password) {
            return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('errors', 'Password baru tidak sama!');
        }

        if (!password_verify($old_password, $mahasiswa['password'])) {
            return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('errors', 'Password lama salah!');
        }

        $data = [
            'password' => password_hash($new_password, PASSWORD_DEFAULT),
        ];

        // Add Notifikasi Ke dalam Perubahan Profil
        $nim_pengguna = $this->request->getPost('NIM');
        $db = \Config\Database::connect();
        $currentDate = date('Y-m-d H:i:s');
        $notifModel = new \App\Models\NotifModel();

        $notifData = [
            'NIM_terkait' => session()->get('user_id'),
            'title_notif' => 'Data Pengguna',
            'deskripsi_notif' => 'Anda telah melakukan perubahan data',
            'mark_readed' => 0,
            'created_at' => $currentDate,
        ];

        $notifModel->insert($notifData);
        $mahasiswa = $this->mahasiswa->update($mahasiswa['NIM'], $data);

        return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('success', 'Password berhasil diubah!');
    }

    
}
