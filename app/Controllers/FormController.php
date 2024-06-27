<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdiModel;
use App\Models\LombaModel;
use App\Models\MahasiswaModel;
use App\Models\TimLombaModel;
use App\Models\AnggotaTimLombaModel;

use Codeigniter\Files\File;
use Ramsey\Uuid\Uuid;

class FormController extends BaseController
{
    protected $prodi;
    protected $lomba;
    protected $mahasiswa;
    protected $tim_lomba;
    protected $anggota_tim_lomba;

    public function __construct()
    {

        $this->prodi = new ProdiModel();
        $this->lomba = new LombaModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->tim_lomba = new TimLombaModel();
        $this->anggota_tim_lomba = new AnggotaTimLombaModel();
    }

    // frontend
    public function form_lomba()
    {
        return view('form/form_lomba');
    }

    public function form_tim()
    {
        $prodi = $this->prodi->findAll();
        $mahasiswa = $this->mahasiswa->findAll();
        $lomba = $this->lomba->where('status', 2)->findAll();
        $data = [
            'prodi' => $prodi,
            'mahasiswa' => $mahasiswa,
            'lomba' => $lomba,
        ];
        return view('form/form_tim', $data);
    }


    // backend
    public function insertLomba()
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
            return redirect()->to(base_url('/form/form_lomba'))->with('errors', 'Isi semua kolom!');
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
        $NIM_anggota_1 = $this->request->getPost('NIM_anggota1');
        $NIM_anggota_2 = $this->request->getPost('NIM_anggota2');

        $validation = $this->validate([
            'lomba_id' => 'required',
            'nama_tim' => 'required',
            'NIM_ketua' => 'required',
            'NIM_anggota1' => 'required',
            'NIM_anggota2' => 'required'
        ]);
        if (!$validation) {
            return redirect()->to(base_url('/form/form_tim'))->with('errors', 'Isi semua kolom!')->setJSON(
                [
                    'status' => ResponseInterface::HTTP_BAD_REQUEST,
                    'message' => \Config\Services::validation()->getErrors()
                ]
            );
        }
        /*
        Status: 
        0: Tidak Disetujui
        1: Pending -- DEFAULT
        2: Disetujui
        */
        $status = 1;

        $data_tim_lomba = [
            'tim_lomba_id' => $tim_lomba_id,
            'lomba_id' => $lomba_id,
            'nama_tim' => $nama_tim,
            'NIM_ketua' => $NIM_ketua,
            'status' => $status
        ];

        $tim_lomba = $this->tim_lomba->insert($data_tim_lomba);

    
        $anggota_tim_1 = [
            'tim_lomba_id' => $tim_lomba_id,
            'NIM' => $NIM_anggota_1
        ];

        $anggota_tim_2 = [
            'tim_lomba_id' => $tim_lomba_id,
            'NIM' => $NIM_anggota_2
        ];

        $this->anggota_tim_lomba->insert($anggota_tim_1);
        $this->anggota_tim_lomba->insert($anggota_tim_2);

        return redirect()->to(base_url('/form/form_tim'))->with('success', 'Tim Berhasil Diajukan. Menunggu Verifikasi.');
    }

    public function insertAnggotaTimLomba()
    {
        $tim_lomba_id = $this->request->getPost('tim_lomba_id');
        $NIM = $this->request->getPost('NIM');

        $data = [
            'tim_lomba_id' => $tim_lomba_id,
            'NIM' => $NIM
        ];

        $this->anggota_tim_lomba->insert($data);

        return redirect()->to(base_url('/form/form_tim'))->with('success', 'Anggota Tim Berhasil Ditambahkan.');
    }
}
