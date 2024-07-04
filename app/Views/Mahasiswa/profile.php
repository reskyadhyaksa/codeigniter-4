<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Union</title>
    <link rel="icon" href="<?= base_url('img/favicon.png') ?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url('css/animate.css') ?>" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css') ?>" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url('css/all.css') ?>" />
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url('css/flaticon.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/themify-icons.css') ?>" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url('css/magnific-popup.css') ?>" />
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= base_url('css/slick.css') ?>" />
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/responsive.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/profile.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/navigation.css') ?>" />
</head>

<body>
    <!--::header part start::-->
    <?= $this->include('header') ?>
    <!-- Header part end-->

    <div class="container-fluid">
        <div class="row flex-wrap">
            <div class="bg-dark col-auto col-md-2 col-lg-2 min-vh-100 d-flex flex-column justify-content-between">
                <ul class="nav nav-pills flex-column mt-4">
                    <li class="nav-item py-2 py-sm-0 my-3 my-sm-4 my-lg-4">
                        <a href="<?= base_url('mahasiswa/profile') ?>" class="nav-link text-center text-white">
                            <img src="<?= base_url('sidebar/assets/Customer.svg') ?>" alt="" class="icon img-fluid" width="70" height="70"><br>
                            <span class="fs-4 d-none d-sm-inline">PROFIL</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0 my-4 my-sm-4 my-lg-3">
                        <a href="<?= base_url('mahasiswa/profile_info_lomba') ?>" class="nav-link text-center text-white">
                            <img src="<?= base_url('sidebar/assets/Edit Property.svg') ?>" alt="" class="icon img-fluid" width="70" height="70"><br>
                            <span class="fs-4 d-none d-sm-inline">PENGAJUAN<br>LOMBA</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0 my-4 my-sm-4 my-lg-3">
                        <a href="<?= base_url('mahasiswa/profile_tim_lomba') ?>" class="nav-link text-center text-white">
                            <img src="<?= base_url('sidebar/assets/People.svg') ?>" alt="" class="icon img-fluid" width="70" height="70"><br>
                            <span class="fs-4 d-none d-sm-inline">TIM</span>
                        </a>
                    <li class="nav-item py-2 py-sm-0 my-4 my-sm-4 my-lg-3">
                        <a href="<?= base_url('auth/mahasiswa/logout') ?>" class="nav-link text-center text-white">
                            <img src="<?= base_url('sidebar/assets/Logout.svg') ?>" alt="" class="icon img-fluid" width="70" height="70"><br>
                            <span class="fs-4 d-none d-sm-inline">KELUAR</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main-content col-auto min-vh-100 d-flex flex-column p-4 p-sm-4 p-md-5 p">
                <div class="container">
                    <h1>Profil Akun Anda</h1>
                    <div class="profile-info">
                        <div class="profile-display">
                            <img src="<?= base_url('uploads/mahasiswa/') . $mahasiswa['mahasiswa']['photo'] ?>" alt="Foto Profil" class="profile-picture">
                            <div class="profile-details">
                                <p><strong>Nama Lengkap:</strong> <?= $mahasiswa['mahasiswa']['nama_lengkap'] ?></p>
                                <p><strong>NIM:</strong> <?= $mahasiswa['mahasiswa']['NIM'] ?></p>
                                <p><strong>Prodi:</strong> <?= $prodi['nama_prodi'] ?></p>
                                <p><strong>IPK:</strong> <?= $mahasiswa['mahasiswa']['ipk'] ?></p>
                                <p><strong>Email:</strong> <?= $mahasiswa['mahasiswa']['email'] ?></p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn edit-btn" onclick="window.location.href='<?= base_url('mahasiswa/edit_profile') ?>'">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>


    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner section_bg">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-lg-3">
                        <div class="single_footer_part">
                            <h4>About Us</h4>
                            <p>
                                Heaven fruitful doesn't over for these theheaven fruitful does
                                over days appear creeping seasons sad behold beari ath of it
                                fly signs bearing be one blessed after.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="single_footer_part">
                            <h4>Contact Info</h4>
                            <p>Address :Your address goes here, your demo address.</p>
                            <p>Phone : +8880 44338899</p>
                            <p>Email : info@colorlib.com</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="single_footer_part">
                            <h4>Important Link</h4>
                            <ul class="list-unstyled">
                                <li><a href="">WHMCS-bridge</a></li>
                                <li><a href="">Search Domain</a></li>
                                <li><a href="">My Account</a></li>
                                <li><a href="">Shopping Cart</a></li>
                                <li><a href="">Our Shop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="single_footer_part">
                            <h4>Newsletter</h4>
                            <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=72f2e839d961a245c79f87a4f&amp;id=21f8c8f4de" method="get" class="subscribe_form relative mail_part">
                                    <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '" />
                                    <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                        Subscribe
                                    </button>
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with
                                <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <script src="<?= base_url('js/jquery-1.12.1.min.js') ?>"></script>
    <!-- popper js -->
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <!-- easing js -->
    <script src="<?= base_url('js/jquery.magnific-popup.js') ?>"></script>
    <!-- swiper js -->
    <script src="<?= base_url('js/swiper.min.js') ?>"></script>
    <!-- swiper js -->
    <script src="<?= base_url('js/masonry.pkgd.js') ?>"></script>
    <!-- particles js -->
    <script src="<?= base_url('js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.nice-select.min.js') ?>"></script>
    <!-- slick js -->
    <script src="<?= base_url('js/slick.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.counterup.min.js') ?>"></script>
    <script src="<?= base_url('js/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('js/contact.js') ?>"></script>
    <script src="<?= base_url('js/jquery.ajaxchimp.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.form.js') ?>"></script>
    <script src="<?= base_url('js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('js/mail-script.js') ?>"></script>
    <!-- custom js -->
    <script src="<?= base_url('js/custom.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#notification-toggle').click(function(event) {
                event.preventDefault(); // Mencegah tindakan default dari tag <a>

                $.ajax({
                    url: '<?= base_url('notifikasi/get_notif') ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var notificationContent = $('#notification-content');
                        notificationContent.empty(); // Kosongkan konten notifikasi

                        if (response.notifications && response.notifications.length > 0) {
                            // Loop melalui notifikasi dan tambahkan ke konten notifikasi
                            response.notifications.forEach(function(notif, index) {
                                var containerClass = (index % 2 === 0) ? 'container-notif even' : 'container-notif odd';
                                var notifHTML = `
                                    <div class="${containerClass}">
                                        <section class="header-title">
                                            <section class="text-title">${notif.title_notif}</section>
                                            <section class="date-title">${notif.created_at}</section>
                                        </section>
                                        <p class="isi-notif">${notif.deskripsi_notif}</p>
                                        <form action="<?= base_url('notifikasi/mark_read_profil') ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="mark_readed" value="1">
                                            <input type="hidden" name="notif_id" value="${notif.notif_id}">
                                            <button type="submit" class="mark-readed">Mark as Read</button>
                                        </form>
                                    </div>
                                `;
                                notificationContent.append(notifHTML);
                            });
                        } else {
                            var emptyHTML = `
                                <div class="container-notif">
                                    <p class="notif-kosong">Tidak ada notifikasi terbaru.</p>
                                </div>
                            `;
                            notificationContent.append(emptyHTML);
                        }

                        $('#notification-popup').fadeToggle(); // Mengubah visibilitas elemen dengan animasi fade
                    },
                    error: function() {
                        var notificationContent = $('#notification-content');
                        notificationContent.empty(); // Kosongkan konten notifikasi

                        var errorHTML = `
                            <div class="container-notif">
                                <p class="isi-notif">Terjadi kesalahan saat mengambil notifikasi.</p>
                            </div>
                        `;
                        notificationContent.append(errorHTML);

                        $('#notification-popup').fadeToggle(); // Mengubah visibilitas elemen dengan animasi fade
                    }
                });
            });

            // Menyembunyikan notifikasi saat klik di luar elemen
            $(document).click(function(event) {
                var target = $(event.target);
                if (!target.closest('#notification-popup').length && !target.closest('#notification-toggle').length) {
                    $('#notification-popup').fadeOut('slow'); // Menggunakan animasi fadeOut
                }
            });

            // Menyembunyikan notifikasi saat mouse keluar dari elemen
            $('#notification-popup').mouseleave(function() {
                $(this).fadeOut('slow'); // Menggunakan animasi fadeOut
            });
        });
    </script>
</body>

</html>