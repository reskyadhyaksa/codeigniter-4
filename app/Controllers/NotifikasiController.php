<?php

namespace App\Controllers;
use App\Models\MahasiswaModel;
use App\Models\NotifModel;

class NotifikasiController extends BaseController{
    protected $mahasiswa;
    protected $notifikasi;
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->mahasiswa = new MahasiswaModel();
        $this->notifikasi = new NotifModel();
    }

    public function getNotif(){
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        }
    
        $user_id = session()->get('user_id');
    
        $notifikasi = $this->notifikasi
                    ->where('NIM_terkait', $user_id)
                    ->where('mark_readed', 0)
                    ->findAll();
    
        foreach ($notifikasi as &$notif) {
            $notif['created_at'] = date('d-m-Y', strtotime($notif['created_at']));
        }
    
        $data = [
            'notifications' => $notifikasi,
        ];
    
        return $this->response->setJSON($data);
    }

    public function markRead(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('/home')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('/home')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadAkademik(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('home/kategori_akademik')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('home/kategori_akademik')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadNonAkademik(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('home/kategori_nonakademik')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('home/kategori_nonakademik')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadBerita(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('home/berita')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('home/berita')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadLomba(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('form/form_lomba')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('form/form_lomba')->with('error', 'No notification ID provided');
        }
    }

    public function markReadTim(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('form/form_tim')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('form/form_tim')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadProfil(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('mahasiswa/profile')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('mahasiswa/profile')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadDetail(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('home/detail_lomba')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('home/detail_lomba')->with('error', 'No notification ID provided');
        }
    }
    
    public function markReadBeritaDetail(){
        $notif_id = $this->request->getPost('notif_id');
        $mark_readed = $this->request->getPost('mark_readed');
        $query = $this->db->table('notifikasi')->where('notif_id', $notif_id)->get();
        $notifData = $query->getRowArray();
        
        print_r($mark_readed);

        $updateNotif = [
            'mark_readed' => $mark_readed,
        ];
        
        if ($notifData) {
            $this->db->table('notifikasi')->where('notif_id', $notif_id)->update($updateNotif);
            return redirect()->to('home/detail_lomba')->with('success', 'Marked as Read');
        } else {
            return redirect()->to('home/detail_lomba')->with('error', 'No notification ID provided');
        }
    }
}