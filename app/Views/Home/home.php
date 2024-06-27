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
    <link rel="stylesheet" href="<?= base_url('css/responsive.css') ?>" />

    <script src="<?= base_url('js/auth.js') ?>" crossorigin="anonymous"></script>
</head>

<body>
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
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href=""><i class="ti-bell"></i></a>
                            <div class="dropdown cart">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <a href="<?= base_url('mahasiswa/profile') ?>" class="icon-link">
                                        <i class="ti-user"></i>
                                    </a>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <section class="banner_part">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item align-items-center active">
                            <a href="#">
                                <img class="d-block w-100 center" src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt="First slide">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img class="d-block w-100" src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt="Second slide">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img class="d-block w-100" src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt="Third slide">
                            </a>
                        </div>
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
                        <a href="#">
                            <div class="single_product_item">
                                <img src="<?= base_url('img/poster_lomba/poster_1.png') ?>" alt="">
                                <div class="single_product_text">
                                    <h4>Lomba Karya Ilmiah UGM Festival</h4>
                                    <h3>1-4 Februari 2024</h3>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="single_product_item">
                                <img src="<?= base_url('img/poster_lomba/poster_2.png') ?>" alt="">
                                <div class="single_product_text">
                                    <h4>Olimpiade Kedokteran</h4>
                                    <h3>5-6 Februari 2024</h3>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="single_product_item">
                                <img src="<?= base_url('img/poster_lomba/poster_3.png') ?>" alt="">
                                <div class="single_product_text">
                                    <h4>Lomba Hackathon</h4>
                                    <h3>6-7 Februari</h3>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="single_product_item">
                                <img src="<?= base_url('img/poster_lomba/poster_4.png') ?>" alt="">
                                <div class="single_product_text">
                                    <h4>Lomba Farmasi</h4>
                                    <h3>11 Februari 2024</h3>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="single_product_item">
                                <img src="<?= base_url('img/poster_lomba/poster_5.png') ?>" alt="">
                                <div class="single_product_text">
                                    <h4>Lomba Kedokteran</h4>
                                    <h3>13 Februari 2024</h3>
                                </div>
                            </div>
                        </a>
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
                        <a href="form_lomba.php">
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
                    <a href="<?= base_url('kategori_akademik') ?>"></a>
                    <img src="<?= base_url('img/poster_lomba/poster_5.png') ?>" alt="" />
                    <h3 class="pt-4">Akademik</h3>
                    <a href="<?= base_url('kategori_akademik') ?>" class="btn btn-primary tombol-kategori font-weight-bold">Klik Disini</a>
                    </a>
                </div>
                <div class="non-akademik text-center">
                    <a href="<?= base_url('home/kategori_nonakademik') ?>">
                        <img src="<?= base_url('img/poster_lomba/poster_8.png') ?>" alt="" />
                        <h3 class="pt-4">Non-Akademik</h3>
                        <a href="<?= base_url('home/kategori_nonakademik') ?>" class="btn btn-primary tombol-kategori font-weight-bold ">Klik Disini</a>
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

            <div class="d-flex flex-row media pb-5">
                <a href="#"><img src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt=""></a>
                <div class="media-body">

                </div>
                <div>
                    <a href="">
                        <h3>CONTOH JUDUL BREAKING NEWS 1</h3>
                    </a>
                    <p class="card-text"><small class="text-muted">Sabtu, 10 Februari 2024</small></p>
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nostrum corporis id aut beatae voluptates voluptatem quaerat voluptas reiciendis accusamus?</p>
                </div>
            </div>

            <div class="d-flex flex-row media pb-5">
                <a href="#"><img src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt=""></a>
                <div class="media-body">

                </div>
                <div>
                    <a href="">
                        <h3>CONTOH JUDUL BREAKING NEWS 2</h3>
                    </a>
                    <p class="card-text"><small class="text-muted">Sabtu, 10 Februari 2024</small></p>
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nostrum corporis id aut beatae voluptates voluptatem quaerat voluptas reiciendis accusamus?</p>
                </div>
            </div>

            <div class="d-flex flex-row media pb-5">
                <a href="#"><img src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt=""></a>
                <div class="media-body">

                </div>
                <div>
                    <a href="">
                        <h3>CONTOH JUDUL BREAKING NEWS 3</h3>
                    </a>
                    <p class="card-text"><small class="text-muted">Sabtu, 10 Februari 2024</small></p>
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nostrum corporis id aut beatae voluptates voluptatem quaerat voluptas reiciendis accusamus?</p>
                </div>
            </div>

            <div class="d-flex flex-row media pb-5">
                <a href="#"><img src="<?= base_url('img/pemenang_lomba/thailand.png') ?>" alt=""></a>
                <div class="media-body">

                </div>
                <div>
                    <a href="">
                        <h3>CONTOH JUDUL BREAKING NEWS 4</h3>
                    </a>
                    <p class="card-text"><small class="text-muted">Sabtu, 10 Februari 2024</small></p>
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nostrum corporis id aut beatae voluptates voluptatem quaerat voluptas reiciendis accusamus?</p>
                </div>
            </div>
        </div>

        </div>
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
</body>

</html>