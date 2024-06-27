<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdiModel;
use App\Models\LombaModel;
use App\Models\MahasiswaModel;
use App\Models\TimLombaModel;
use App\Models\AnggotaTimLombaModel;

class MahasiswaController extends BaseController
{
    protected $prodi;
    protected $lomba;
    protected $mahasiswa;
    protected $timLomba;
    protected $anggotaTimLomba;

    public function __construct()
    {
        $this->prodi = new ProdiModel();
        $this->lomba = new LombaModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->timLomba = new TimLombaModel();
        $this->anggotaTimLomba = new AnggotaTimLombaModel();
    }

    public function profile()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

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
        ];

        return view('mahasiswa/profile', $data);
    }

    public function editProfile()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

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
        ];
        return view('mahasiswa/edit_profile_mahasiswa', $data);
    }

    public function profileInfoLomba()
    {
        $lomba = $this->lomba->findAll();
        $data = [
            'lomba' => $lomba,
        ];
        return view('mahasiswa/profile_info_lomba', $data);
    }

    public function profileTimLomba()
    {
        $timLomba = $this->timLomba->findAll();
        $data = array_map(function ($tim) {
            $members = $this->anggotaTimLomba->select('NIM')->where('tim_lomba_id', $tim['tim_lomba_id'])->findAll();
            return [
                'lomba' => $this->lomba->find($tim['lomba_id']),
                'ketua' => $this->mahasiswa->find($tim['NIM_ketua']),
                'tim_lomba' => $tim,
                'anggota_tim_lomba' => array_map(function ($member) {
                    return $this->mahasiswa->find($member['NIM']);
                }, $members),
            ];
        }, $timLomba);

        // return response()->setJSON($data);  
        return view('mahasiswa/profile_tim_lomba', ['data' => $data]);
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

        $mahasiswa = $this->mahasiswa->update($mahasiswa['NIM'], $data);

        return redirect()->to(base_url('/mahasiswa/edit_profile'))->with('success', 'Password berhasil diubah!');
    }
}
