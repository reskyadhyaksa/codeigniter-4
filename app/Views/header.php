<!-- app/Views/header.php -->

<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?= base_url('home') ?>">
                        <img src="<?= base_url('img/logo.png') ?>" alt="logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('home') ?>">Halaman Utama</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Kategori
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="<?= base_url('home/kategori_akademik') ?>">Akademik</a>
                                    <a class="dropdown-item" href="<?= base_url('home/kategori_nonakademik') ?>">Non-Akademik</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('home/berita') ?>">Berita</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Form Pengajuan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="<?= base_url('form/form_lomba') ?>">Info Lomba</a>
                                    <a class="dropdown-item" href="<?= base_url('form/form_tim') ?>">Tim Lomba</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">

                        <!-- Bell Notif -->
                        <section class="position-relative">
                            <a href="#" id="notification-toggle">
                                <i class="ti-bell"></i>
                                <?php if (count($notifikasi) > 0): ?>
                                    <div class="notification-count"><?= count($notifikasi) ?></div>
                                <?php endif; ?>
                            </a>
                            <div class="position-absolute notif-pop" id="notification-popup">
                                <p class="notif-title">Notifikasi Kamu</p>
                                <div id="notification-content"></div>
                            </div>
                        </section>

                        <a href="<?= base_url('mahasiswa/profile') ?>" class="icon-link">
                            <i class="ti-user"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
