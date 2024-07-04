<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Form Lomba</title>
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
  <link rel="stylesheet" href="<?= base_url('css/navigation.css') ?>" />

</head>

<body>
  <!--::header part start::-->
  <?= $this->include('header') ?>
  <!-- Header part end-->

  <section class="form">
    <div class="container">
      <div class="judul_form_lomba">
        <div class="section-title text-center">
          <h2>FORM PENGAJUAN INFO LOMBA</h2>
        </div>
      </div>

      <section class="" id="message">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="mt-5 alert alert-success">
            <?= session()->getFlashdata('success'); ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')) : ?>
          <div class="mt-5 alert alert-danger">
            <?= session()->getFlashdata('errors'); ?>
          </div>
        <?php endif; ?>
      </section>

      <form action="<?= base_url('form/insert_lomba') ?>" method="post" enctype="multipart/form-data" class="form_lomba">
        <div class="input-box">
          <label>Nama Lomba</label>
          <input type="text" name="nama_lomba" id="nama_lomba" placeholder="Cantumkan Nama Lomba">
        </div>
        <div class="kategori_lomba-box">
          <label class="label_kategori">Kategori Lomba</label>
          <div class="kategori_lomba-option">
            <div class="kategori_lomba">
              <input type="radio" id="Akademik" name="kategori_lomba" value="akademik" checked>
              <label for="Akademik">Akademik</label>
            </div>
            <div class="kategori_lomba">
              <input type="radio" id="Non-Akademik" name="kategori_lomba" value="non-akademik">
              <label for="Non-Akademik">Non-Akademik</label>
            </div>
          </div>
        </div>

        <div class="input-box">
          <label>Prodi Lomba</label>
          <p>Select 1 or More</p>
          
          <div id="akademik-options">
            <select class="custom-select mt-1 rounded-left rounded-left-bottom" name="prodi_id[]" id="inputGroupSelect01">
                <option selected disabled>Choose...</option>
                <?php foreach ($prodi as $row) : ?>
                    <option value="<?= $row['prodi_id'] ?>" name="prodi_id"><?= $row['nama_prodi'] ?></option>
                <?php endforeach; ?>
            </select>
            <select class="custom-select mt-3 rounded-left rounded-left-bottom" name="prodi_id[]" id="inputGroupSelect01">
                <option selected disabled>Optional...</option>
                <?php foreach ($prodi as $row) : ?>
                    <option value="<?= $row['prodi_id'] ?>" name="prodi_id"><?= $row['nama_prodi'] ?></option>
                <?php endforeach; ?>
            </select>
            <select class="custom-select mt-3 rounded-left rounded-left-bottom" name="prodi_id[]" id="inputGroupSelect01">
                <option selected disabled>Optional...</option>
                <?php foreach ($prodi as $row) : ?>
                    <option value="<?= $row['prodi_id'] ?>" name="prodi_id"><?= $row['nama_prodi'] ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          
          <div id="non-akademik-options" style="display: none;">
            <select class="custom-select mt-1 rounded-left rounded-left-bottom" name="non_id[]" id="inputGroupSelect02">
                <option selected disabled>Choose...</option>
                <?php foreach ($nonakademik as $row) : ?>
                    <option value="<?= $row['non_id'] ?>" name="non_id"><?= $row['nama_non'] ?></option>
                <?php endforeach; ?>
            </select>
            <select class="custom-select mt-3 rounded-left rounded-left-bottom" name="non_id[]" id="inputGroupSelect02">
                <option selected disabled>Optional...</option>
                <?php foreach ($nonakademik as $row) : ?>
                    <option value="<?= $row['non_id'] ?>" name="non_id"><?= $row['nama_non'] ?></option>
                <?php endforeach; ?>
            </select>
            <select class="custom-select mt-3 rounded-left rounded-left-bottom" name="non_id[]" id="inputGroupSelect02">
                <option selected disabled>Optional...</option>
                <?php foreach ($nonakademik as $row) : ?>
                    <option value="<?= $row['non_id'] ?>" name="non_id"><?= $row['nama_non'] ?></option>
                <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="input-box">
          <label>Deadline Pendaftaran</label>
          <input type="date" name="tenggat_pendaftaran" id="tenggat_pendaftaran">
        </div>
        <div class="input-box">
          <label>Tanggal Lomba Dimulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai">
        </div>
        <div class="input-box">
          <label>Tanggal Lomba Berakhir</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai">
        </div>
        <div class="input-box">
          <label>Penyelenggara Lomba</label>
          <input type="text" name="penyelenggara_lomba" id="penyelenggara_lomba" placeholder="">
        </div>
        <div class="input-box">
          <label>Keterangan Lomba</label>
          <textarea name="keterangan_lomba" id="keterangan_lomba" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label>Poster Lomba</label>
          <input type="file" class="form-control-file" id="poster" name="poster" accept=".jpg,.jpeg,.png">
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>

      </form>
    </div>
  </section>
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
  <script src="<?= base_url('js/jquery-1.12.1.min.js') ?>"></script>

  <script>
    document.querySelectorAll('input[name="kategori_lomba"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        var akademikOptions = document.getElementById('akademik-options');
        var nonAkademikOptions = document.getElementById('non-akademik-options');
        
        if (event.target.value === 'akademik') {
          akademikOptions.style.display = 'block';
          nonAkademikOptions.style.display = 'none';
        } else {
          akademikOptions.style.display = 'none';
          nonAkademikOptions.style.display = 'block';
        }
      });
    });

    // Trigger change event on page load to ensure correct options are displayed
    document.querySelector('input[name="kategori_lomba"]:checked').dispatchEvent(new Event('change'));
  </script>

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

  <!-- custom js -->
  <script src="<?= base_url('js/custom.js') ?>"></script>
  <script src="<?= base_url('js/form/form_lomba.js') ?>"></script>
</body>

</html>