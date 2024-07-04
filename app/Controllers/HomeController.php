<?php

namespace App\Controllers;

use App\Models\LombaModel;
use App\Models\ProdiModel;
use App\Models\BeritaModel;
use App\Models\NotifModel;
use App\Models\NonAkademik;


class HomeController extends BaseController
{
    protected $lomba;
    protected $prodi;
    protected $berita;
    protected $notifikasi;
    protected $nonakademik;

    public function __construct()
    {
        $this->prodi = new ProdiModel();
        $this->lomba = new LombaModel();
        $this->nonakademik = new NonAkademik();
        $this->notifikasi = new NotifModel();
        $this->berita = new BeritaModel();
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $lomba = $this->lomba->findAll();
        $berita = $this->berita->findAll();

        $lombaTop = $this->lomba->where('status', 1)
                            ->limit(4)
                            ->findAll();
        
        $beritaTop = $this->berita->limit(4)
                            ->findAll();

        $headLombaAK = $this->lomba->where('kategori_lomba', 'akademik')
            ->first();
        $headLombaNA = $this->lomba->where('kategori_lomba', 'non-akademik')
            ->first();

        $data = [
            'lomba'=> $lomba,
            'lombaTop' => $lombaTop,
            'beritaTop' => $beritaTop,
            'berita'=> $berita,
            'headAkademik' => $headLombaAK,
            'notifikasi' => $notifikasi,
            'headNAkademik' => $headLombaNA,
        ];
        return view('home/home', $data);
    }

    public function berita() {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $beritaTop = $this->berita->limit(4)->findAll();
        
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();
        
        $beritaModel = new BeritaModel();
        $pager = \Config\Services::pager();
        
        // Get the prodi_id and keyword from the GET request
        $prodi_id = $this->request->getGet('prodi_id');
        $non_id = $this->request->getGet('non_id');
        $keyword = $this->request->getGet('keyword');
        
        if ($prodi_id) {
            // Fetch berita related to the selected prodi
            $beritaModel->like('prodi_berita', $prodi_id);
        }
        
        if ($non_id) {
            // Fetch berita related to the selected prodi
            $beritaModel->like('prodi_berita', $prodi_id);
        }
        
        
        if ($keyword) {
            // Filter berita by the search keyword
            $beritaModel->like('judul_berita', $keyword)
                        ->orLike('isi_berita', $keyword);
        }
        
        // Fetch berita with pagination
        $berita = $beritaModel->paginate(3);
        $nonakademik = $this->nonakademik->findAll();
    
        $data = [
            'berita' => $berita,
            'beritaTop' => $beritaTop,
            'pager' => $beritaModel->pager,
            'notifikasi' => $notifikasi,
            'non' => $nonakademik,
            'prodi' => $this->prodi->findAll(),
            'selected_prodi' => $prodi_id,
            'keyword' => $keyword 
        ];
        
        return view('home/berita', $data);
    }
    
    
    public function detail_berita()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $beritaTop = $this->berita->limit(4)->findAll();
        
        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();


        $berita_id = $this->request->getGet('berita_id');
        
        if (!$berita_id) {
            // Handle the case where berita_id is not provided
            return redirect()->to(base_url('home/berita'));
        }
    
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->find($berita_id);
        $keyword = $this->request->getGet('keyword');
        $prodi_id = $this->request->getGet('prodi_id');

        if (!$berita) {
            return redirect()->to(base_url('home/berita'));
        }
        
        if ($prodi_id) {
            // Fetch berita related to the selected prodi
            $beritaModel->like('prodi_berita', $prodi_id);
        }

        $prodi_ids = json_decode($berita['prodi_berita'], true);
        if (is_array($prodi_ids)) {
            $prodi_names = [];
            foreach ($prodi_ids as $prodi_id) {
                $prodi = $this->prodi->find($prodi_id);
                if ($prodi) {
                    $prodi_names[] = $prodi['nama_prodi'];
                }
            }
    
            $berita['nama_prodi'] = implode(', ', $prodi_names);
        } else {
            $berita['nama_prodi'] = 'Unknown';
        }

        $isi_berita = nl2br(esc($berita['isi_berita']));
        $berita['isi_berita'] = explode('<br/><br/>', $isi_berita);
        
        $nonakademik = $this->nonakademik->findAll();

        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
    
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $data = [
            'berita' => $berita,
            'days' => $days,
            'months' => $months,
            'notifikasi' => $notifikasi,
            'prodi' => $this->prodi->findAll(),
            'keyword' => $keyword,
            'non' => $nonakademik,
        ];
        
        return view('home/detail_berita', $data);
    }

    public function detail_lomba()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
        
        $keyword = $this->request->getGet('keyword');

        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();


        $lomba_id = $this->request->getGet('lomba_id');
        $lomba = $this->lomba->find($lomba_id);
        $prodi_lomba = json_decode($lomba['prodi_lomba'], true);
        
        $prodiMap = [];
        $prodi = $this->prodi->findAll();
        foreach ($prodi as $p) {
            $prodiMap[$p['prodi_id']] = $p['nama_prodi'];
        }
        
        $keterangan_lomba = nl2br(esc($lomba['keterangan_lomba']));
        $lomba['keterangan_lomba'] = explode('<br/><br/>', $keterangan_lomba);

        $lombaArr = [
            'lomba_id' => $lomba['lomba_id'],
            'status' => $lomba['status'],
            'kategori_lomba' => $lomba['kategori_lomba'],
            'nama_lomba' => $lomba['nama_lomba'],
            'poster_lomba' => $lomba['poster_lomba'],
            'penyelenggara_lomba' => $lomba['penyelenggara_lomba'],
            'keterangan_lomba' => $lomba['keterangan_lomba'],
            'tenggat_pendaftaran' => $lomba['tenggat_pendaftaran'],
            'tanggal_mulai' => $lomba['tanggal_mulai'],
            'tanggal_selesai' => $lomba['tanggal_selesai'],
        ];

        foreach ($lomba as $item) {
            $prodiNames = [];
            if (is_array($prodi_lomba)) {
                foreach ($prodi_lomba as $prodi_id) {
                    if (isset($prodiMap[$prodi_id])) {
                        $prodiNames[] = $prodiMap[$prodi_id];
                    }
                }
            }

            foreach($prodiNames as $name){
                $lombaArr['nama_prodi'] = $name;
            }

            $lombaArr['nama_prodi'] = $prodiNames;
        }

        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
    
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $nonakademik = $this->nonakademik->findAll();

        $data = [
            'lomba' => $lombaArr,
            'days' => $days,
            'months' => $months,
            'prodi' => $prodi,
            'non' => $nonakademik,
            'notifikasi' => $notifikasi,
            'keyword' => $keyword,
        ];

        return view('home/detail_lomba', $data);
    }

    public function kategori_akademik()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $prodi = $this->prodi->findAll();
        $non = $this->nonakademik->findAll();
        $prodiArray = [];
        $keyword = $this->request->getGet('keyword');
        $prodi_id = $this->request->getGet('prodi_id');
        $non_id = $this->request->getGet('non_id');

        $prodiMap = [];
        foreach ($prodi as $p) {
            $prodiMap[$p['prodi_id']] = $p['nama_prodi'];
        }

        $lombaModel = new \App\Models\LombaModel();
        $pager = \Config\Services::pager();

        // Apply keyword filter if provided
        if ($keyword) {
            $lombaModel->groupStart()
                    ->like('nama_lomba', $keyword)
                    ->orLike('keterangan_lomba', $keyword)
                    ->groupEnd();
        }

        // Apply prodi_id filter if provided
        if ($prodi_id) {
            $lombaModel->like('prodi_lomba', $prodi_id);
        }

        // Apply non_id filter if provided
        if ($non_id) {
            $lombaModel->like('prodi_lomba', $non_id);
        }

        // Fetch lomba with pagination, filtered by category 'akademik'
        $lomba = $lombaModel->where('status', 1)
                            ->where('kategori_lomba', 'akademik') // Assuming 'kategori' is the column name
                            ->paginate(5);

        // Fetch prodi names for each lomba
        foreach ($lomba as &$l) {
            $prodi_lomba = json_decode($l['prodi_lomba'], true);
            if (is_array($prodi_lomba)) {
                $prodi_names = array_map(function($id) use ($prodiMap) {
                    return $prodiMap[$id] ?? 'Unknown';
                }, $prodi_lomba);
                $l['nama_prodi'] = implode(', ', $prodi_names);
            } else {
                $l['nama_prodi'] = 'Unknown';
            }
        }

        $data = [
            'prodi' => $prodi,
            'non' => $non,
            'lomba' => $lomba,
            'pager' => $lombaModel->pager,
            'prodiMap' => $prodiMap,
            'notifikasi' => $notifikasi,
            'selectedProdi' => $prodiArray ?? [],
            'keyword' => $keyword,
        ];

        return view('home/kategori_akademik', $data);
    }


    public function kategori_nonakademik()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $non = $this->nonakademik->findAll();
        $prodi = $this->prodi->findAll();
        $nonArray = [];
        $keyword = $this->request->getGet('keyword');
        $prodi_id = $this->request->getGet('prodi_id');
        $non_id = $this->request->getGet('non_id');

        $nonMap = [];
        foreach ($non as $p) {
            $nonMap[$p['non_id']] = $p['nama_non'];
        }

        $prodiMap = [];
        foreach ($prodi as $p) {
            $prodiMap[$p['prodi_id']] = $p['nama_prodi'];
        }

        $lombaModel = new \App\Models\LombaModel();
        $pager = \Config\Services::pager();

        // Apply keyword filter if provided
        if ($keyword) {
            $lombaModel->groupStart()
                    ->like('nama_lomba', $keyword)
                    ->orLike('keterangan_lomba', $keyword)
                    ->groupEnd();
        }

        // Apply prodi_id filter if provided
        if ($prodi_id) {
            $lombaModel->like('prodi_lomba', $prodi_id);
        }

        // Apply non_id filter if provided
        if ($non_id) {
            $lombaModel->like('prodi_lomba', $non_id);
        }

        // Fetch lomba with pagination, filtered by category 'non-akademik'
        $lomba = $lombaModel->where('status', 1)
                            ->where('kategori_lomba', 'non-akademik') // Assuming 'kategori' is the column name
                            ->paginate(5);

        // Fetch prodi/non-akademik names for each lomba
        foreach ($lomba as &$l) {
            $prodi_lomba = json_decode($l['prodi_lomba'], true);
            if (is_array($prodi_lomba)) {
                $prodi_names = array_map(function($id) use ($prodiMap, $nonMap) {
                    return $prodiMap[$id] ?? $nonMap[$id] ?? 'Unknown';
                }, $prodi_lomba);
                $l['nama_prodi_non'] = implode(', ', $prodi_names);
            } else {
                $l['nama_prodi_non'] = 'Unknown';
            }
        }

        $data = [
            'non' => $non,
            'prodi' => $prodi,
            'lomba' => $lomba,
            'pager' => $lombaModel->pager,
            'nonMap' => $nonMap,
            'prodiMap' => $prodiMap,
            'notifikasi' => $notifikasi,
            'selectednon' => $nonArray ?? [],
            'keyword' => $keyword,
        ];

        return view('home/kategori_nonakademik', $data);
    }


    public function filterAkademik()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $prodi = $this->prodi->findAll();
        $prodiArr = $this->request->getGet('prodi');

        $prodiMap = [];
        foreach ($prodi as $p) {
            $prodiMap[$p['prodi_id']] = $p['nama_prodi'];
        }

        $lombaModel = new \App\Models\LombaModel();
        $pager = \Config\Services::pager();

        // Apply filters and paginate results
        $lombaModel->where('status', 1)->where('kategori_lomba', 'akademik');

        if ($prodiArr) {
            // Use group start and group end to combine multiple orLike clauses
            $lombaModel->groupStart();
            foreach ($prodiArr as $prodi_id) {
                $lombaModel->orLike('prodi_lomba', $prodi_id);
            }
            $lombaModel->groupEnd();
        }

        // Fetch lomba with pagination
        $lomba = $lombaModel->paginate(5); // Adjust the number of items per page as needed

        // Fetch prodi names for each lomba
        foreach ($lomba as &$l) {
            $prodi_lomba = json_decode($l['prodi_lomba'], true);
            if (is_array($prodi_lomba)) {
                $prodi_names = array_map(function($id) use ($prodiMap) {
                    return $prodiMap[$id] ?? 'Unknown';
                }, $prodi_lomba);
                $l['nama_prodi'] = implode(', ', $prodi_names);
            } else {
                $l['nama_prodi'] = 'Unknown';
            }
        }

        $data = [
            'prodi' => $prodi,
            'lomba' => $lomba,
            'pager' => $lombaModel->pager,
            'prodiMap' => $prodiMap,
            'notifikasi' => $notifikasi,
            'selectedProdi' => $prodiArr,
        ];

        return view('home/kategori_akademik', $data);
    }

    public function filterNonAkademik()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }

        $user_id = session()->get('user_id');
        $notifikasi = $this->notifikasi
                        ->where('NIM_terkait', $user_id)
                        ->where('mark_readed', 0)->findAll();

        $non = $this->nonakademik->findAll();
        $nonArr = $this->request->getGet('non');

        $nonMap = [];
        foreach ($non as $p) {
            $nonMap[$p['non_id']] = $p['nama_non'];
        }

        $lombaModel = new \App\Models\LombaModel();
        $pager = \Config\Services::pager();

        // Apply filters and paginate results
        $lombaModel->where('status', 1)->where('kategori_lomba', 'non-akademik');

        if ($nonArr) {
            // Decode JSON field and check if it contains any of the selected nonArr IDs
            $lombaModel->groupStart();
            foreach ($nonArr as $non_id) {
                $lombaModel->orLike('prodi_lomba', $non_id);
            }
            $lombaModel->groupEnd();
        }

        // Fetch lomba with pagination
        $lomba = $lombaModel->paginate(5); // Adjust the number of items per page as needed

        // Fetch non-akademik names for each lomba
        foreach ($lomba as &$l) {
            $non_lomba = json_decode($l['prodi_lomba'], true);
            if (is_array($non_lomba)) {
                $non_names = array_map(function($id) use ($nonMap) {
                    return $nonMap[$id] ?? 'Unknown';
                }, $non_lomba);
                $l['nama_non'] = implode(', ', $non_names);
            } else {
                $l['nama_non'] = 'Unknown';
            }
        }

        $data = [
            'non' => $non,
            'lomba' => $lomba,
            'pager' => $lombaModel->pager,
            'nonMap' => $nonMap,
            'notifikasi' => $notifikasi,
            'selectednon' => $nonArr,
        ];

        return view('home/kategori_nonakademik', $data);
    }

    
}
