<?php

use App\Filters\AuthFilter;
use App\Filters\AdminAuthFilter;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'IndexController::index');

service('auth')->routes($routes);

$routes->group('', ['filter' => AdminAuthFilter::class], function ($routes) {
    $routes->group('admin', function ($routes) {
        $routes->get('dashboard', 'AdminController::dashboard');
        $routes->get('dashboard_mahasiswa', 'AdminController::dashboard_mahasiswa_view');
        $routes->get('dashboard_prodi', 'AdminController::dashboard_prodi_view');
        $routes->get('dashboard_info', 'AdminController::dashboard_info_view');
        $routes->get('dashboard_approved', 'AdminController::dashboard_approved_view');
        $routes->get('dashboard_tim', 'AdminController::dashboard_tim_view');
        $routes->get('dashboard_berita', 'AdminController::dashboard_berita_view');
        
        $routes->get('register_user_form', 'AdminController::registerUserForm');
        $routes->get('edit_user_form', 'AdminController::editUserView');
        $routes->get('edit_lomba_form', 'AdminController::editLombaView');
        $routes->get('tambah_lomba', 'AdminController::addLombaForm');
        $routes->get('edit_berita', 'AdminController::editBeritaView');
        $routes->get('tambah_berita_form', 'AdminController::addBeritaView');
        
        $routes->post('tambah_info_berita', 'AdminController::tambahBeritaAdmin');
        $routes->post('tambah_info_lomba', 'AdminController::tambahLombaAdmin');
        $routes->post('edit_lomba_form', 'AdminController::EditLombaAdmin');
        $routes->post('edit_berita_form', 'AdminController::EditBeritaAdmin');
        $routes->post('delete_lomba_form', 'AdminController::hapusLombaAdmin');
        $routes->post('delete_berita_form', 'AdminController::hapusBeritaAdmin');
        $routes->post('delete_mahasiswa', 'AuthController::delete');
        $routes->post('mahasiswa/register', 'AuthController::mahasiswaRegister');
        $routes->post('mahasiswa/edit', 'AuthController::mahasiswaEdit');
        $routes->post('approveLomba', 'AdminController::approveLomba');
        $routes->post('rejectLomba', 'AdminController::rejectLomba');
        $routes->post('approveTim', 'AdminController::approveTim');
        $routes->post('rejectTim', 'AdminController::rejectTim');
    });
});


$routes->group('', ['filter' => AuthFilter::class], function ($routes) {
    $routes->group('home', function ($routes) {
        $routes->get('', 'HomeController::index');
        $routes->get('berita', 'HomeController::berita');
        $routes->get('detail_berita', 'HomeController::detail_berita');
        $routes->get('detail_lomba', 'HomeController::detail_lomba');
        $routes->get('kategori_akademik', 'HomeController::kategori_akademik');
        $routes->get('filter_akademik', 'HomeController::filterAkademik');
        $routes->get('filter_nonakademik', 'HomeController::filterNonAkademik');
        $routes->get('kategori_nonakademik', 'HomeController::kategori_nonakademik');

    });

    $routes->group('mahasiswa', function ($routes) {
        $routes->get('profile', 'MahasiswaController::profile');
        $routes->get('edit_profile', 'MahasiswaController::editProfile');
        $routes->get('profile_info_lomba', 'MahasiswaController::profileInfoLomba');
        $routes->get('profile_tim_lomba', 'MahasiswaController::profileTimLomba');

        $routes->post('update_profile', 'MahasiswaController::updateProfile');
        $routes->post('update_password', 'MahasiswaController::updatePassword');
    });

    $routes->group('form', function ($routes) {
        $routes->get('form_lomba', 'FormController::form_lomba');
        $routes->get('form_tim', 'FormController::form_tim');

        $routes->post('insert_lomba', 'FormController::insertLomba');
        $routes->post('insert_tim', 'FormController::insertTim');
    });
    
    $routes->group('notifikasi', function ($routes) {
        $routes->get('get_notif', 'NotifikasiController::getNotif');
        $routes->post('mark_read', 'NotifikasiController::markRead');
        $routes->post('mark_read_akademik', 'NotifikasiController::markReadAkademik');
        $routes->post('mark_read_non', 'NotifikasiController::markReadNonAkademik');
        $routes->post('mark_read_berita', 'NotifikasiController::markReadBerita');
        $routes->post('mark_read_detail', 'NotifikasiController::markReadDetail');
        $routes->post('mark_read_detailberita', 'NotifikasiController::markReadBeritaDetail');
        $routes->post('mark_read_lomba', 'NotifikasiController::markReadLomba');
        $routes->post('mark_read_tim', 'NotifikasiController::markReadTim');
        $routes->post('mark_read_profil', 'NotifikasiController::markReadProfil');
    });
});


$routes->group('auth', function ($routes) {
    $routes->post('mahasiswa/login', 'AuthController::mahasiswaLogin');
    $routes->post('admin/login', 'AuthController::adminLogin');
    $routes->get('mahasiswa/logout', 'AuthController::mahasiswaLogout');    
});

