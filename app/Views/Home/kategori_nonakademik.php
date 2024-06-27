<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>aranoz</title>
  <link rel="icon" href="<?= base_url('img/favicon.png') ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
  <!-- animate CSS -->
  <link rel="stylesheet" href="<?= base_url('css/animate.css') ?>">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css') ?>">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="<?= base_url('css/all.css') ?>">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="<?= base_url('css/flaticon.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/themify-icons.css') ?>">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="<?= base_url('css/magnific-popup.css') ?>">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="<?= base_url('css/slick.css') ?>">
  <!-- style CSS -->
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?= base_url('home')?>">
              <img src="img/logo.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu_icon"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('home')?>">Halaman Utama</a>
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
                  <a class="nav-link" href="<?= base_url('home/berita')?>">Berita</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Form Pengajuan
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <a class="dropdown-item" href="<?= base_url('form/form_lomba')?>">Info Lomba</a>
                    <a class="dropdown-item" href="<?= base_url('form/form_tim')?>">Tim Lomba</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="hearer_icon d-flex">
              <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
              <a href=""><i class="ti-bell"></i></a>
              <div class="dropdown cart">
                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <a href="<? base_url('mahasiswa/profile') ?>" class="icon-link">
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

  <h1 class="text-center font-weight-bolder" style="padding-top: 10rem; padding-bottom: 6rem">AKADEMIK</h1>

  <!-- filter part start -->
  <section>
    <div class="container">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header d-flex justify-content-between" id="headingOne">
            <h3 class="d-flex align-items-center mb-0">Filter Kategori Prodi</h2>
              <div class="card-tools">
                <button type="button" class="btn font-weight-bold justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-plus"></i>
                </button>
              </div>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Kedokteran
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Farmasi
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Biologi
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Kimia
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Fisika
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Matematika
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Informatika
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Teknik Elektro
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Teknik Sipil
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Teknik Mesin
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Strategi Perang Semesta
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Peperangan Asimetris
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Diplomasi Pertahanan
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Manajemen Pertahanan
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Ekonomi Pertahanan
                    </label>
                  </div>
                  <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Ketahanan Energi
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
          </div>
        </div>
      </div>
  </section>
  <!-- filter part end -->

  <!-- lomba_list part start -->
  <div class="lomba_list container">
    <h2 class="text-center mb-5 pt-5" style="margin: 4rem 0">List Lomba Akademik</h2>

    <div class="card" style="margin: 3rem 0">
      <div class="card-body">
        <h5 class="card-title">Judul Lomba 1</h5>
        <h6 class="card-subtitle mb-2 text-muted">23 Maret 2024</h6>
        <h6 class="card-subtitle mb-2 text-muted">Kategori: Informatika, Kedokteran</h6>
        <h6 class="card-subtitle mb-2 text-muted">Penyelenggara: Universitas Gajah Mada</h6>
        <h6 class="card-subtitle mb-2 pt-3 pb-3">DETAIL : Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem hic, libero itaque nam maiores tenetur cum voluptatibus repudiandae neque odit sint omnis delectus magnam. Cupiditate, expedita? Tempore fugiat, magnam itaque dolores voluptatum porro ullam sapiente quasi magni eligendi perspiciatis error voluptas nostrum, laboriosam id consequatur architecto vel dolore maiores perferendis, ab excepturi quibusdam. Excepturi hic totam aliquid magnam! Porro laborum aperiam voluptatum debitis sapiente non, at fuga incidunt corporis saepe, rem dicta expedita rerum iusto unde odio? Libero illo asperiores, quae facilis rerum suscipit architecto beatae quasi maxime, quia, nesciunt voluptatum accusantium possimus exercitationem quos? Ipsum ad explicabo magnam debitis....</h6>
        <a href="https://www.google.com" target="_blank">
          <button class="btn btn-primary mr-2 ">Detail Lainnya</button>
        </a>
      </div>
    </div>
    <div class="card" style="margin: 3rem 0">
      <div class="card-body">
        <h5 class="card-title">Judul Lomba 1</h5>
        <h6 class="card-subtitle mb-2 text-muted">23 Maret 2024</h6>
        <h6 class="card-subtitle mb-2 text-muted">Kategori: Informatika, Kedokteran</h6>
        <h6 class="card-subtitle mb-2 text-muted">Penyelenggara: Universitas Gajah Mada</h6>
        <h6 class="card-subtitle mb-2 pt-3 pb-3">DETAIL : Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem hic, libero itaque nam maiores tenetur cum voluptatibus repudiandae neque odit sint omnis delectus magnam. Cupiditate, expedita? Tempore fugiat, magnam itaque dolores voluptatum porro ullam sapiente quasi magni eligendi perspiciatis error voluptas nostrum, laboriosam id consequatur architecto vel dolore maiores perferendis, ab excepturi quibusdam. Excepturi hic totam aliquid magnam! Porro laborum aperiam voluptatum debitis sapiente non, at fuga incidunt corporis saepe, rem dicta expedita rerum iusto unde odio? Libero illo asperiores, quae facilis rerum suscipit architecto beatae quasi maxime, quia, nesciunt voluptatum accusantium possimus exercitationem quos? Ipsum ad explicabo magnam debitis....</h6>
        <a href="https://www.google.com" target="_blank">
          <button class="btn btn-primary mr-2 ">Detail Lainnya</button>
        </a>
      </div>
    </div>
    <div class="card" style="margin: 3rem 0">
      <div class="card-body">
        <h5 class="card-title">Judul Lomba 1</h5>
        <h6 class="card-subtitle mb-2 text-muted">23 Maret 2024</h6>
        <h6 class="card-subtitle mb-2 text-muted">Kategori: Informatika, Kedokteran</h6>
        <h6 class="card-subtitle mb-2 text-muted">Penyelenggara: Universitas Gajah Mada</h6>
        <h6 class="card-subtitle mb-2 pt-3 pb-3">DETAIL : Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem hic, libero itaque nam maiores tenetur cum voluptatibus repudiandae neque odit sint omnis delectus magnam. Cupiditate, expedita? Tempore fugiat, magnam itaque dolores voluptatum porro ullam sapiente quasi magni eligendi perspiciatis error voluptas nostrum, laboriosam id consequatur architecto vel dolore maiores perferendis, ab excepturi quibusdam. Excepturi hic totam aliquid magnam! Porro laborum aperiam voluptatum debitis sapiente non, at fuga incidunt corporis saepe, rem dicta expedita rerum iusto unde odio? Libero illo asperiores, quae facilis rerum suscipit architecto beatae quasi maxime, quia, nesciunt voluptatum accusantium possimus exercitationem quos? Ipsum ad explicabo magnam debitis....</h6>
        <a href="https://www.google.com" target="_blank">
          <button class="btn btn-primary mr-2 ">Detail Lainnya</button>
        </a>
      </div>
    </div>
    <div class="card" style="margin: 3rem 0">
      <div class="card-body">
        <h5 class="card-title">Judul Lomba 1</h5>
        <h6 class="card-subtitle mb-2 text-muted">23 Maret 2024</h6>
        <h6 class="card-subtitle mb-2 text-muted">Kategori: Informatika, Kedokteran</h6>
        <h6 class="card-subtitle mb-2 text-muted">Penyelenggara: Universitas Gajah Mada</h6>
        <h6 class="card-subtitle mb-2 pt-3 pb-3">DETAIL : Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem hic, libero itaque nam maiores tenetur cum voluptatibus repudiandae neque odit sint omnis delectus magnam. Cupiditate, expedita? Tempore fugiat, magnam itaque dolores voluptatum porro ullam sapiente quasi magni eligendi perspiciatis error voluptas nostrum, laboriosam id consequatur architecto vel dolore maiores perferendis, ab excepturi quibusdam. Excepturi hic totam aliquid magnam! Porro laborum aperiam voluptatum debitis sapiente non, at fuga incidunt corporis saepe, rem dicta expedita rerum iusto unde odio? Libero illo asperiores, quae facilis rerum suscipit architecto beatae quasi maxime, quia, nesciunt voluptatum accusantium possimus exercitationem quos? Ipsum ad explicabo magnam debitis....</h6>
        <a href="https://www.google.com" target="_blank">
          <button class="btn btn-primary mr-2 ">Detail Lainnya</button>
        </a>
      </div>
    </div>
    <div class="card" style="margin: 3rem 0">
      <div class="card-body">
        <h5 class="card-title">Judul Lomba 1</h5>
        <h6 class="card-subtitle mb-2 text-muted">23 Maret 2024</h6>
        <h6 class="card-subtitle mb-2 text-muted">Kategori: Informatika, Kedokteran</h6>
        <h6 class="card-subtitle mb-2 text-muted">Penyelenggara: Universitas Gajah Mada</h6>
        <h6 class="card-subtitle mb-2 pt-3 pb-3">DETAIL : Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem hic, libero itaque nam maiores tenetur cum voluptatibus repudiandae neque odit sint omnis delectus magnam. Cupiditate, expedita? Tempore fugiat, magnam itaque dolores voluptatum porro ullam sapiente quasi magni eligendi perspiciatis error voluptas nostrum, laboriosam id consequatur architecto vel dolore maiores perferendis, ab excepturi quibusdam. Excepturi hic totam aliquid magnam! Porro laborum aperiam voluptatum debitis sapiente non, at fuga incidunt corporis saepe, rem dicta expedita rerum iusto unde odio? Libero illo asperiores, quae facilis rerum suscipit architecto beatae quasi maxime, quia, nesciunt voluptatum accusantium possimus exercitationem quos? Ipsum ad explicabo magnam debitis....</h6>
        <a href="https://www.google.com" target="_blank">
          <button class="btn btn-primary mr-2 ">Detail Lainnya</button>
        </a>
      </div>
    </div>

    <!-- Tombol navigasi -->
    <div class="pagination">
      <button class="btn1" onclick="backBtn()"><i class="ti-arrow-left" aria-hidden="true"></i></button>
      <ul style="margin: 20px 30px;">
        <li class="link active" value="1" onclick="activeLink()">1</li>
        <li class="link" value="2" onclick="activeLink()">2</li>
        <li class="link" value="3" onclick="activeLink()">3</li>
        <li class="link" value="4" onclick="activeLink()">4</li>
        <li class="link" value="5" onclick="activeLink()">5</li>
      </ul>
      <button class="btn2" onclick="nextBtn()"><i class="ti-arrow-right" aria-hidden="true"></i></button>
    </div>
  </div>

  <script>
    let link = document.getElementsByClassName("link");

    let currentValue = 1;

    function activeLink() {
      for (l of link) {
        l.classList.remove("active");
      }
      event.target.classList.add("active");
      currentValue = event.target.value;
    }

    function backBtn() {
      if (currentValue > 1) {
        for (l of link) {
          l.classList.remove("active");
        }
      }
      currentValue--;
      link[currentValue - 1].classList.add("active");
    }

    function nextBtn() {
      if (currentValue < 5) {
        for (l of link) {
          l.classList.remove("active");
        }
      }
      currentValue++;
      link[currentValue - 1].classList.add("active");
    }
  </script>
  <!-- lomba_list part end -->



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