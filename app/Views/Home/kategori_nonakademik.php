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
  <link rel="stylesheet" href="<?= base_url('css/navigation.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/custom_lomba.css') ?>" />


</head>

<body>
  <!--::header part start::-->
  <?= $this->include('header') ?>
  <!-- Header part end-->

  <h1 class="text-center font-weight-bolder" style="padding-top: 10rem; padding-bottom: 6rem">NON AKADEMIK</h1>

  <!-- filter part start -->
  <section>
    <div class="container">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="search-text">
              <form action="<?= base_url('home/kategori_nonakademik') ?>" method="get" class="form-search">
                  <input type="text" name="keyword" class="search-field" placeholder="Cari Lomba di sini" />
                  <button type="submit" class="button-search">
                      <i class="ti-search"></i>
                  </button>
              </form>
          </div>
          <div class="card-header d-flex justify-content-between" id="headingOne">
            <h3 class="d-flex align-items-center mb-0">Filter Kategori Prodi</h2>
              <div class="card-tools">
                <button type="button" class="btn font-weight-bold justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-plus"></i>
                </button>
              </div>
          </div>

          <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <form action="<?php echo base_url('home/filter_nonakademik'); ?>" method="get">
                <div class="row">
                  <?php 
                  $cols = 4; // Jumlah kolom yang diinginkan
                  $chunks = array_chunk($non, ceil(count($non) / $cols)); // Membagi array menjadi beberapa bagian
                  foreach ($chunks as $chunk): ?>
                      <div class="col">
                          <?php foreach ($chunk as $p): ?>
                              <div class="form-check pb-1">
                                  <input class="form-check-input" type="checkbox" name="non[]" value="<?php echo $p['non_id']; ?>" id="nonCheck<?php echo $p['non_id']; ?>" 
                                  <?php echo in_array($p['non_id'], $selectednon) ? 'checked' : ''; ?>>
                                  <label class="form-check-label" for="nonCheck<?php echo $p['non_id']; ?>">
                                      <?php echo $p['nama_non']; ?>
                                  </label>
                              </div>
                          <?php endforeach; ?>
                      </div>
                  <?php endforeach; ?>
                </div>
                <div class="row justify-content-center">
                  <div class="tombol-filter w-25">
                    <button type="submit" class="btn btn-primary mt-4 w-100">FILTER</button>
                  </div>
                </div>
              </form>
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
    <h2 class="text-center mb-5 pt-5" style="margin: 1rem 0">List Lomba Non Akademik</h2>
    <?php if (!empty($lomba)): ?>
      <?php foreach ($lomba as $item): ?>
          <div class="card" style="margin: 3rem 0">
              <div class="card-custom">
                  <img src="<?= base_url('uploads/poster/') . $item['poster_lomba'] ?>" alt="Poster Lomba" class="poster-lomba">
                  <div class="card-child">
                    <h5 class="card-title"><?= $item['nama_lomba']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= date('d M Y', strtotime($item['tanggal_mulai'])); ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">Prodi: <?= implode(', ', array_map(function($id) use ($nonMap) {
                        return $nonMap[$id] ?? $id;
                    }, json_decode($item['prodi_lomba'], true))); ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">Penyelenggara: <?= $item['penyelenggara_lomba']; ?></h6>
                    <div class="card-bottom-area" >
                    <h6 class="card-subtitle mb-2 pt-2" id="keteranganLomba">
                      <?php
                          $keterangan = esc($item['keterangan_lomba']);
                          $sentences = explode('.', $keterangan);
                          $short_keterangan = implode('.', array_slice($sentences, 0, 4)) . (count($sentences) > 4 ? '...' : '');
                      ?>
                      <div id="keteranganLomba">
                          <span class="short-text"><?= $short_keterangan; ?></span>
                      </div>
                    </h6>
                    <form action="<?php echo base_url('home/detail_lomba');?>" method="get">
                      <input type="hidden" name="lomba_id" value="<?php echo $item['lomba_id']; ?>"/>
                      <button type="submit" class="btn btn-primary mr-2">Lihat Selengkapnya</button>
                    </form>
                    </div>
                  </div>
              </div>
          </div>
    <?php endforeach; ?>
  
    <?php else: ?>
      <div class="lomba_list container">
        <div class="card" style="margin: 3rem 0">
          <div class="none-found" style="padding: 3rem">
            <h5 class="tidak-ada">Tidak Ada Kompetisi ditemukan</h5>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <nav aria-label="Page navigation">
        <?= $pager->links() ?>                            
    </nav>
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
                                        <form action="<?= base_url('notifikasi/mark_read_non') ?>" method="post" enctype="multipart/form-data">
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