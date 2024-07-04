<!-- todo: cek login -->

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
    <link rel="stylesheet" href="<?= base_url('css/navigation.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/responsive.css') ?>" />

    <script src="<?= base_url('js/auth.js') ?>" crossorigin="anonymous"></script>
</head>

<body>
    <!--::header part start::-->
    <?= $this->include('header') ?>
    <!-- Header part end-->

    <section class="banner_part">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach ($beritaTop as $index => $item): ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>"></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($beritaTop as $index => $item): ?>
                            <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                <img class="d-block w-100" src="<?= base_url('uploads/berita/' . $item['foto_berita']) ?>" alt="Slide <?= $index + 1 ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part stop -->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Lomba Terbaru</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- upcoming_event part start-->

    <!-- lomba_terbaru part start -->
    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <?php foreach ($lombaTop as $item): ?>
                            <form action="<?= base_url('home/detail_lomba') ?>" method="get">
                                <a href="#" onclick="this.closest('form').submit(); return false;">
                                    <div class="single_product_item">
                                        <img src="<?= base_url('uploads/poster/' . $item['poster_lomba']) ?>" alt="">
                                        <div class="single_product_text">
                                            <h4><?= esc($item['nama_lomba']) ?></h4>
                                            <h3><?= esc($item['tenggat_pendaftaran']) ?></h3>
                                        </div>
                                    </div>
                                </a>
                                <input type="hidden" name="lomba_id" value="<?= esc($item['lomba_id']) ?>">
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- product_list part end-->
    <!-- lomba_terbaru part end -->

    <!-- masukkan_lomba start-->
    <section class="feature_part padding_top">
        <div class="container" style="padding-bottom: 10%">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Ayo Ajukan Informasi Lomba yang Kamu Punya Disini!</h2>
                        <a href="<?= base_url('form/form_lomba') ?>">
                            <button class="btn">Masukkan Lomba</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- masukkan_lomba end-->

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="section_tittle text-center">
                <h1>PILIH KATEGORI LOMBA</h1>
            </div>
            <div class="pilih_kategori row align-items-center justify-content-between">
                <div class="akademik text-center">
                    <a href="<?= base_url('home/kategori_akademik') ?>">
                        <img src="<?= base_url('uploads/poster/' . $headAkademik['poster_lomba']) ?>" alt="" />
                        <h3 class="pt-4">AKADEMIK</h3>
                        <a href="<?= base_url('home/kategori_akademik') ?>" class="btn btn-primary tombol-kategori font-weight-bold">Klik Disini</a>
                    </a>
                </div>
                <div class="non-akademik text-center">
                    <a href="<?= base_url('home/kategori_nonakademik') ?>">
                        <img src="<?= base_url('uploads/poster/' . $headNAkademik['poster_lomba']) ?>" alt="" />
                        <h3 class="pt-4">NON AKADEMIK</h3>
                        <a href="<?= base_url('home/kategori_nonakademik') ?>" class="btn btn-primary tombol-kategori font-weight-bold">Klik Disini</a>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- awesome_shop part start-->
    <section class="berita_part">
        <div class="container">
            <div class="section_tittle">
                <h2 style="padding-top: 10rem" class="font-weight-bolder">BERITA TERBARU</h2>
            </div>

            <?php foreach ($beritaTop as $berita): ?>
                <div class="d-flex flex-row media pb-5">
                    <form action="<?= base_url('home/detail_berita') ?>" method="get" class="form-home-berita">
                        <a href="#" onclick="this.closest('form').submit(); return false;">
                            <img src="<?= base_url('uploads/berita/' . $berita['foto_berita']) ?>" alt="">
                        </a>
                            <div class="media-body"></div>
                            <div class="description-home">
                                <h3><?= esc($berita['judul_berita']) ?></h3>
                                <p class="card-text"><small class="text-muted"><?= esc($berita['created_at']) ?></small></p>
                                <p class="short-description">
                                    <?php
                                        $keterangan = esc($berita['isi_berita']);
                                        $sentences = explode('.', $keterangan);
                                        $short_keterangan = implode('.', array_slice($sentences, 0, 15)) . (count($sentences) > 4 ? '...' : '');
                                    ?>
                                    <div id="keteranganLomba">
                                        <span class="short-text"><?= $short_keterangan; ?></span>
                                    </div>
                                </p>
                                <p class=""><strong>Prodi:</strong> <?= implode(', ', json_decode($berita['prodi_berita'], true)) ?></p>
                                <input type="hidden" name="berita_id" value="<?= esc($berita['berita_id']) ?>">
                                <button type="submit" class="btn btn-link p-0">Read more</button>
                            </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Berita part start -->

    <!-- Berita part end -->

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <ul class="list-unstyled">
                            <li>
                                <h4>Kami Membantu Anda dalam meraih prestasi.</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Informasi</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Akademik</a></li>
                            <li><a href="">Non-Akademik</a></li>
                            <li><a href="">Berita</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Feedback</h4>
                        <p>
                            Heaven fruitful doesn't over lesser in days. Appear creeping
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Masukkan Feedback" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '" />
                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                    Kirim
                                </button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All Rights Reserved Term of use Union.
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

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
                                        <form action="<?= base_url('notifikasi/mark_read') ?>" method="post" enctype="multipart/form-data">
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