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
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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


  </header>
  <!-- Header part end-->

  <section class="form">
    <div class="container">
      <div class="judul_form_lomba">
        <!-- Bagian judul form lainnya di sini -->
        <div class="section-title text-center">
          <h2>FORM PENGAJUAN TIM LOMBA</h2>
        </div>
      </div>
      <!-- ALERT -->
      <section id="message">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('errors'); ?>
          </div>
        <?php endif; ?>
      </section>

      <form action="<?= base_url('form/insert_tim') ?>" method="POST" class="form_lomba">
        <section id="lomba" class="pb-3">
          <div class="input-box">
            <label>Nama Lomba</label>
            <select class="custom-select" id="nama_lomba" name="lomba_id" data-live-search="true">
              <option value="null" disabled selected>Cantumkan Nama Lomba</option>
              <?php foreach ($lomba as $row) : ?>
                <option value="<?= $row['lomba_id'] ?>" id="nama_lomba" name="lomba_id" data-tokens="<?= $row['lomba_id'] ?>"><?= $row['nama_lomba'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <section>
            <div class="input-box">
              <label>Nama Tim</label>
              <input type="text" name="nama_tim" placeholder="Cantumkan Nama Tim">
            </div>
          </section>

          <section id="ketua" class="pb-3">
            <div class="input-box">
              <label>Nama Ketua</label>
              <select class="custom-select" id="nama_ketua" name="NIM_ketua" data-live-search="true">
                <option value="null" disabled selected>Cantumkan Nama Ketua</option>
                <?php foreach ($mahasiswa as $row) : ?>
                  <option value="<?= $row['NIM'] ?>" data-prodi-id-ketua="<?= $row['prodi_id'] ?>" data-tokens="<?= $row['prodi_id'] ?>"><?= $row['nama_lengkap'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="d-flex flex-column input-box">
              <label>Prodi Ketua</label>
              <p id="prodi-ketua" class="border rounded w-100 px-3 py-2">Pilih Ketua terlebih dahulu</p>
            </div>
          </section>

          <button type="button" class="btn btn-secondary" id="tambahAnggota">Tambah Anggota</button>
            <br><br>
          <div id="anggotaArea"></div>
          <button type="submit" class="btn btn-primary">Kirim</button>
      </form>
    </div>
  </section>
  <!-- Form part end -->

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
              <li><a hhref="<?= base_url('home/kategori_akademik') ?>">Akademik</a></li>
              <li><a href="<?= base_url('home/kategori_nonakademik') ?>">Non-Akademik</a></li>
              <li><a href="<?= base_url('home/berita') ?>">Berita</a></li>
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
  <!-- jquery -->
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
  <!-- slick js -->
  <script src="<?= base_url('js/jquery.counterup.min.js') ?>"></script>
  <script src="<?= base_url('js/waypoints.min.js') ?>"></script>
  <script src="<?= base_url('js/contact.js') ?>"></script>
  <script src="<?= base_url('js/jquery.ajaxchimp.min.js') ?>"></script>
  <script src="<?= base_url('js/jquery.form.js') ?>"></script>
  <script src="<?= base_url('js/jquery.validate.min.js') ?>"></script>
  <script src="<?= base_url('js/mail-script.js') ?>"></script>

  <script>
      $(document).ready(function() {
          var anggotaCount = 0; // Anggota awal yang sudah ada

          $('#tambahAnggota').click(function() {
              anggotaCount++; // Increment count untuk nama unik

              var newAnggotaSection = `
                  <section id="anggota${anggotaCount}" class="pb-3">
                      <div class="input-box">
                          <label>Nama Anggota ${anggotaCount}</label>
                          <select id="nama_anggota${anggotaCount}" class="custom-select" name="NIM_anggota${anggotaCount}">
                              <option value="null" disabled selected>Cantumkan Nama Anggota ${anggotaCount}</option>
                              <?php foreach ($mahasiswa as $row) : ?>
                                  <option value="<?= $row['NIM'] ?>" data-prodi-id-anggota="<?= $row['prodi_id'] ?>"><?= $row['nama_lengkap'] ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>

                      <div class="d-flex flex-column input-box">
                          <label>Prodi Anggota ${anggotaCount}</label>
                          <p id="prodi-anggota${anggotaCount}" class="border rounded w-100 px-3 py-2">Pilih Anggota ${anggotaCount} terlebih dahulu</p>
                      </div>
                  </section>
              `;

              $('#anggotaArea').append(newAnggotaSection);
          });

          // Fungsi untuk mengubah teks pada prodi anggota
          function updateProdiText(anggotaNumber, prodiId) {
              var prodiAnggotaElement = $(`#prodi-anggota${anggotaNumber}`);
              var prodiList = <?= json_encode($prodi); ?>; // Ambil data prodi dari PHP

              if (prodiId) {
                  var prodi = prodiList.find(prodi => prodi.prodi_id === prodiId);
                  prodiAnggotaElement.text(prodi ? prodi.nama_prodi : 'Prodi tidak ditemukan');
              } else {
                  prodiAnggotaElement.text(`Pilih nama anggota ${anggotaNumber} terlebih dahulu`);
              }
          }

          // Event listener untuk setiap perubahan pada select nama anggota
          $(document).on('change', '[id^=nama_anggota]', function() {
              var anggotaNumber = $(this).attr('id').replace('nama_anggota', '');
              var prodiId = $(this).find(':selected').data('prodi-id-anggota');
              updateProdiText(anggotaNumber, prodiId);
          });
      });
  </script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const selectKetua = document.querySelector('select[id="nama_ketua"]');
      const selectAnggota1 = document.getElementById('nama_anggota1');
      const selectAnggota2 = document.getElementById('nama_anggota2');
      const prodiKetuaElement = document.getElementById('prodi-ketua');
      const prodiAnggota1Element = document.getElementById('prodi-anggota1');
      const prodiAnggota2Element = document.getElementById('prodi-anggota2');

      const prodiList = <?= json_encode($prodi) ?>;
      const mahasiswaList = <?= json_encode($mahasiswa) ?>;

      // Update Prodi Ketua on selection change
      selectKetua.addEventListener('change', function() {
        const selectedOption = selectKetua.options[selectKetua.selectedIndex];
        const prodiId = selectedOption.getAttribute('data-prodi-id-ketua');
        const selectedNIMKetua = selectedOption.value;

        if (prodiId) {
          prodiKetuaElement.textContent = prodiList.find(prodi => prodi.prodi_id === prodiId).nama_prodi || 'Prodi tidak ditemukan';
        } else {
          prodiKetuaElement.textContent = 'Pilih nama ketua terlebih dahulu';
        }

        updateAnggotaOptions(selectedNIMKetua);
      });

      // Update Prodi Anggota 1 on selection change
      selectAnggota1.addEventListener('change', function() {
        const selectedOption = selectAnggota1.options[selectAnggota1.selectedIndex];
        const prodiId = selectedOption.getAttribute('data-prodi-id-anggota');

        if (prodiId) {
          prodiAnggota1Element.textContent = prodiList.find(prodi => prodi.prodi_id === prodiId).nama_prodi || 'Prodi tidak ditemukan';
        } else {
          prodiAnggota1Element.textContent = 'Pilih nama anggota 1 terlebih dahulu';
        }

        updateAnggota2Options();
      });

      // Update Prodi Anggota 2 on selection change
      selectAnggota2.addEventListener('change', function() {
        const selectedOption = selectAnggota2.options[selectAnggota2.selectedIndex];
        const prodiId = selectedOption.getAttribute('data-prodi-id-anggota');

        if (prodiId) {
          prodiAnggota2Element.textContent = prodiList.find(prodi => prodi.prodi_id === prodiId).nama_prodi || 'Prodi tidak ditemukan';
        } else {
          prodiAnggota2Element.textContent = 'Pilih nama anggota 2 terlebih dahulu';
        }
      });

      function updateAnggotaOptions(selectedNIMKetua) {
        // Clear current options for both anggotas
        selectAnggota1.innerHTML = '<option value="null" disabled selected>Cantumkan Nama Anggota 1</option>';
        selectAnggota2.innerHTML = '<option value="null" disabled selected>Cantumkan Nama Anggota 2</option>';

        // Populate anggota options excluding the selected ketua
        mahasiswaList.forEach(mahasiswa => {
          if (mahasiswa.NIM !== selectedNIMKetua) {
            const option1 = document.createElement('option');
            option1.value = mahasiswa.NIM;
            option1.textContent = mahasiswa.nama_lengkap;
            option1.setAttribute('data-prodi-id-anggota', mahasiswa.prodi_id);
            selectAnggota1.appendChild(option1);

            const option2 = document.createElement('option');
            option2.value = mahasiswa.NIM;
            option2.textContent = mahasiswa.nama_lengkap;
            option2.setAttribute('data-prodi-id-anggota', mahasiswa.prodi_id);
            selectAnggota2.appendChild(option2);
          }
        });

        // Call updateAnggota2Options to ensure correct initial state
        updateAnggota2Options();
      }

      function updateAnggota2Options() {
        const selectedNIMKetua = selectKetua.value;
        const selectedNIMAnggota1 = selectAnggota1.value;

        // Clear current options for anggota 2
        selectAnggota2.innerHTML = '<option value="null" disabled selected>Cantumkan Nama Anggota 2</option>';

        // Populate anggota 2 options excluding the selected ketua and anggota 1
        mahasiswaList.forEach(mahasiswa => {
          if (mahasiswa.NIM !== selectedNIMKetua && mahasiswa.NIM !== selectedNIMAnggota1) {
            const option = document.createElement('option');
            option.value = mahasiswa.NIM;
            option.textContent = mahasiswa.nama_lengkap;
            option.setAttribute('data-prodi-id-anggota', mahasiswa.prodi_id);
            selectAnggota2.appendChild(option);
          }
        });
      }

      // Initial call to populate anggota options
      updateAnggotaOptions(selectKetua.value);
    });
  </script>

</body>

</html>