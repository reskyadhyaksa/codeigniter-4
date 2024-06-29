<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MahasiswaModel;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    protected $db; // Declare a protected property to hold the db instance
    protected $session;
    protected $mahasiswa;
    public function __construct()
    {
        // Load the database service via the CodeIgniter controller constructor
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->mahasiswa = new MahasiswaModel();
    }

    public function mahasiswaLogin()
    {
        $model = new MahasiswaModel();
        $nim = $this->request->getPost('NIM');
        $password = $this->request->getPost('password');

        $mahasiswa = $model->where('nim', $nim)->first();
        $lastQuery = $this->db->getLastQuery();
        if ($mahasiswa && password_verify($password, $mahasiswa['password'])) {
            session()->set([
                'user_id' => $mahasiswa['NIM'], // Assuming 'NIM' is your primary key
                'mahasiswa' => $mahasiswa,
                'user_type' => 'mahasiswa',
                'isLoggedIn' => true,
            ]);

            return $this->response->setJSON([
                'status' => 'success',
                'redirect_url' => '/home', // Redirect URL on successful login
            ])->setStatusCode(ResponseInterface::HTTP_OK);
        } else {
            $this->session->setFlashData('error', 'Invalid login credentials');
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid login credentials',
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }


    public function adminLogin()
    {
        $model = new AdminModel();
        $admin_id = $this->request->getPost('admin_id');
        $password = $this->request->getPost('password');

        $admin = $model->where('admin_id', $admin_id)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'user_id' => $admin['admin_id'],
                'username' => $admin['nama_lengkap'],
                'user_type' => 'admin',
                'isLoggedIn' => true,
            ]);
            return $this->response->setJSON([
                'status' => 'success',
                'redirect_url' => '/admin/dashboard', // Redirect URL on successful login
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid login credentials',
            ]);
        }
    }

    public function mahasiswaRegister()
    {
        $NIM = $this->request->getPost('NIM');
        $prodi_id = $this->request->getPost('prodi_id');
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $ipk = $this->request->getPost('ipk');

        $validation = $this->validate([
            'NIM' => 'required|min_length[5]',
            'prodi_id' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'ipk' => 'required',
        ]);

        if (!$validation) {
            // return $this->response->setJSON([
            //     'status' => 'error',
            //     'message' => 'Isi semua kolom!',
            //     'errors' => $this->validator->getErrors(),
            // ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
            return redirect()->to(base_url('admin/register_user_form'))->with('errors', 'Isi semua kolom!');
        }

        $img = $this->request->getFile('photo');

        if ($img->isValid() && !$img->hasMoved()) {
            $file_ext = $img->getClientExtension();
            $validImageExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array($file_ext, $validImageExtensions)) {
                return redirect()->to(base_url('admin/register_user_form'))->with('errors', 'Format Gambar Tidak Sesuai');
            } else {
                $newImageName = $img->getRandomName();
                $file_destination = ROOTPATH . 'public/uploads/mahasiswa';

                if ($img->move($file_destination, $newImageName)) { // Correctly move the file
                    $data = [
                        'NIM' => $this->request->getPost('NIM'),
                        'prodi_id' => $prodi_id,
                        'nama_lengkap' => $nama_lengkap,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'photo' => $newImageName,
                        'ipk' => $ipk,
                    ];

                    $this->mahasiswa->insert($data);

                    return redirect()->to(base_url('admin/dashboard#'))->with('success', 'Mahasiswa berhasil didaftarkan!');
                } else {
                    return redirect()->to(base_url('admin/register_user_form'))->with('errors', 'Gagal menyimpan file');
                }
            }
        } else {
            return redirect()->to(base_url('admin/register_user_form'))->with('errors', 'Tidak ada gambar yang diunggah');
        }
    }

    public function mahasiswaEdit()
    {
        // Ambil NIM dari form
        $nim = $this->request->getPost('NIM');

        // Load model MahasiswaModel jika sudah dibuat
        $mahasiswaModel = new MahasiswaModel();

        // Query untuk mengambil data mahasiswa berdasarkan NIM
        $mahasiswa = $mahasiswaModel->where('NIM', $nim)->first();

        // Cek apakah data mahasiswa ditemukan
        if (!$mahasiswa) {
            return redirect()->to('/admin/dashboard')->with('error', 'Mahasiswa tidak ditemukan.');
        }

        // Ambil data dari form
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $prodi_id = $this->request->getPost('prodi_id');
        $ipk = $this->request->getPost('ipk');
        $photo = $this->request->getFile('photo');
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Buat array untuk menyimpan data yang akan diupdate
        $updateData = [];

        // Bandingkan data yang baru dengan data yang ada di database
        if ($nama_lengkap != $mahasiswa['nama_lengkap']) {
            $updateData['nama_lengkap'] = $nama_lengkap;
        }
        if ($email != $mahasiswa['email']) {
            $updateData['email'] = $email;
        }
        if ($password != $mahasiswa['password']) {
            $updateData['password'] = $password;
        }
        if ($prodi_id != $mahasiswa['prodi_id']) {
            $updateData['prodi_id'] = $prodi_id;
        }
        if ($ipk != $mahasiswa['ipk']) {
            $updateData['ipk'] = $ipk;
        }
        if ($photo->isValid()) {
            // Jika ada file photo baru diupload
            $newPhotoName = $photo->getRandomName();
            $photo->move('./path/to/upload/directory', $newPhotoName);
            $updateData['photo'] = $newPhotoName;
        }

        // Lakukan update hanya jika ada perubahan data
        if (!empty($updateData)) {
            // Lakukan update menggunakan model
            $mahasiswaModel->update($mahasiswa['NIM'], $updateData);

            // Redirect dengan pesan sukses
            return redirect()->to('/admin/dashboard')->with('success', 'Data mahasiswa berhasil diperbarui.');
        } else {
            // Tidak ada perubahan data yang perlu diupdate
            return redirect()->to('/admin/dashboard')->with('info', 'Tidak ada perubahan yang dilakukan.');
        }
    }

    public function delete()
    {
        $nim = $this->request->getPost('NIM');

        try {
            $mahasiswa = $this->db->table('mahasiswa')->where('NIM', $nim)->get()->getRow();

            if ($mahasiswa) {
                $this->db->table('mahasiswa')->where('NIM', $nim)->delete();
                return redirect()->to(base_url('admin/dashboard'))->with('success', 'Mahasiswa berhasil dihapus');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus mahasiswa: Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/dashboard'))->with('error', $e->getMessage());
        }
    }

    public function mahasiswaLogout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
