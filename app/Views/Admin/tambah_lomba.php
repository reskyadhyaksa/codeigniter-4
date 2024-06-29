<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DeskApp - Form Info Lomba Baru</title>
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
  <link rel="stylesheet" href="<?= base_url('css/admin/lomba.css') ?>">
</head>

<body>
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

            <form action="<?= base_url('admin/tambah_info_lomba') ?>" method="post" enctype="multipart/form-data" class="form_lomba">
                <div class="input-box">
                    <label>Nama Lomba</label>
                    <input type="text" name="nama_lomba" id="nama_lomba" placeholder="Cantumkan Nama Lomba">
                </div>
                <div class="kategori_lomba-box">
                    <h3>Kategori Lomba</h3>
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
                    <label>Link Resmi Lomba</label>
                    <input type="text" name="link_lomba" id="link_lomba" placeholder="">
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
  <script src="<?= base_url('js/form/form_lomba.js') ?>"></script>
</body>

</html>