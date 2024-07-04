<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/core.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/icon-font.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/dataTables.bootstrap4.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/responsive.bootstrap4.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style1.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/dashboard.css'); ?>">
    <!-- Custom CSS for Layout -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="alert-notification">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan error -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>
    
    <?= $this->include('navigation_admin') ?>

    <div class="content-wrapper">
        <div class="content-area">
            <div id="main-content">
                <!-- Konten dari setiap menu akan dimuat di sini -->
                <div id="default-content">
                    <h2>Selamat Datang di Dashboard</h2>
                    <p>Pilih menu dari sidebar untuk mulai.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten tersembunyi untuk list prodi -->
    <div id="user-management-content" style="display: none;">
        <div class="action-buttons">
            <a href="<?= base_url('admin/register_user_form'); ?>" class="btn btn-primary">Add User</a>
        </div>
        <div class="table-responsive">
            <table id="userDataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $row) : ?>
                        <tr>
                            <td><?= $row['NIM']; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td>
                                <form action="<?= base_url('admin/edit_user_form'); ?>" method="get" style="display: inline;">
                                    <input type="hidden" name="NIM" value="<?= $row['NIM']; ?>">
                                    <button class="edit-user">Edit</button>
                                </form>
                                <form action="<?= base_url('admin/delete_mahasiswa'); ?>" method="post" style="display: inline;">
                                    <input type="hidden" name="NIM" value="<?= $row['NIM']; ?>">
                                    <button class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Add more user rows if needed -->
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="list-prodi-content" style="display: none;">
        <div class="table-responsive">
            <table id="userDataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Prodi ID</th>
                        <th>Nama Prodi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prodi as $row) : ?>
                        <tr>
                            <td><?= $row['prodi_id']; ?></td>
                            <td><?= $row['nama_prodi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Add more user rows if needed -->
                </tbody>
            </table>
        </div>
    </div>

    
    <!-- Konten tersembunyi untuk persetujuan info lomba -->
    <div id="approval-info-lomba-content" style="display: none;">
        <div class="action-buttons">
            <a href="<?= base_url('admin/tambah_lomba'); ?>" class="btn btn-primary">Tambah Info Lomba</a>
        </div>
        <div class="table-responsive">
            <table id="infoLombaTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lomba</th>
                        <th>NIM Pengaju</th>
                        <th>Prodi Lomba</th>
                        <th>Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Penyelenggara</th>
                        <th>Poster</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($approvalCompetitions)) : ?>
                        <?php foreach ($approvalCompetitions as $competition) : ?>
                            <tr>
                                <td><?= $competition['nama_lomba']; ?></td>
                                <td><?= $competition['pengguna_pengaju']; ?></td>
                                <td style="width: 150px; max-height: 200px;"><?= esc($competition['nama_prodi']); ?></td>
                                <td><?= $competition['kategori_lomba']; ?></td>
                                <td><?= $competition['tanggal_mulai']; ?></td>
                                <td><?= $competition['tanggal_selesai']; ?></td>
                                <td style="width: 150px; max-height: 200px;"><?= esc($competition['penyelenggara_lomba']); ?></td>
                                <td style="width: 300px; max-height: 200px;">
                                    <div id="keteranganLomba" class="more">
                                        <?php
                                            $keterangan = esc($competition['keterangan_lomba']);
                                            $sentences = explode('.', $keterangan);
                                            $short_keterangan = implode('.', array_slice($sentences, 0, 4)) . (count($sentences) > 4 ? '...' : '');
                                        ?>
                                        <div id="keteranganLomba">
                                            <span class="short-text"><?= $short_keterangan; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><img src="<?= base_url('uploads/poster/' . $competition['poster_lomba']) ?>" alt="Poster Lomba" width="100" /></td>
                                <td>
                                    <form action="<?= base_url('admin/approveLomba'); ?>" method="post" style="display: inline;">
                                        <input type="hidden" name="lomba_id" value="<?= $competition['lomba_id']; ?>">
                                        <button class="accept-approval-tim-lomba">Approve</button>
                                    </form>
                                    <form action="<?= base_url('admin/rejectLomba'); ?>" method="post" style="display: inline;">
                                        <input type="hidden" name="lomba_id" value="<?= $competition['lomba_id']; ?>">
                                        <button class="decline-approval-tim-lomba">Reject</button>
                                    </form>
                                    <form action="<?= base_url('admin/edit_lomba_form'); ?>" method="get" style="display: inline;">
                                        <input type="hidden" name="lomba_id" value="<?= $competition['lomba_id']; ?>">
                                        <button class="edit-user">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10" style="text-align: center;">Tidak ada lomba yang menunggu aksi selanjutnya.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Konten tersembunyi untuk pembaruan info lomba -->
    <div id="update-info-lomba-content" style="display: none;">
        <div class="table-responsive">
            <table id="updateInfoLombaTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lomba</th>
                        <th>NIM Pengaju</th>
                        <th>Prodi Lomba</th>
                        <th>Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Penyelenggara</th>
                        <th>Poster</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($updateCompetitions) > 0) : ?>
                        <?php foreach ($updateCompetitions as $competition) : ?>
                            <tr>
                                <td><?= esc($competition['nama_lomba']); ?></td>
                                <td><?= $competition['pengguna_pengaju']; ?></td>
                                <td style="width: 150px; max-height: 200px;"><?= esc($competition['nama_prodi']); ?></td>
                                <td><?= esc($competition['kategori_lomba']); ?></td>
                                <td><?= esc($competition['tanggal_mulai']); ?></td>
                                <td><?= esc($competition['tanggal_selesai']); ?></td>
                                <td style="width: 150px; max-height: 200px;"><?= esc($competition['penyelenggara_lomba']); ?></td>
                                <td style="width: 300px; max-height: 200px;">
                                    <div id="keteranganLomba" class="more">
                                        <?php
                                            $keterangan = esc($competition['keterangan_lomba']);
                                            $sentences = explode('.', $keterangan);
                                            $short_keterangan = implode('.', array_slice($sentences, 0, 4)) . (count($sentences) > 4 ? '...' : '');
                                        ?>
                                        <div id="keteranganLomba">
                                            <span class="short-text"><?= $short_keterangan; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><img src="<?= base_url('uploads/poster/' . esc($competition['poster_lomba'])); ?>" alt="Poster Lomba" width="100"></td>
                                <td>
                                    <form action="<?= base_url('admin/edit_lomba_form'); ?>" method="get" style="display: inline;">
                                        <input type="hidden" name="lomba_id" value="<?= $competition['lomba_id']; ?>">
                                        <button class="edit-user">Edit</button>
                                    </form>
                                    <form action="<?= base_url('admin/delete_lomba_form'); ?>" method="post" style="display: inline;">
                                        <input type="hidden" name="lomba_id" value="<?= $competition['lomba_id']; ?>">
                                        <button class="delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="8">Tidak ada data lomba yang perlu diperbarui.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Konten tersembunyi untuk persetujuan tim lomba -->
    <div id="approval-tim-lomba-content" style="display: none;">
        <div class="table-responsive">
            <table id="approvalTimLombaTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lomba</th>
                        <th>Tenggat Pendaftaran</th>
                        <th>Nama Tim</th>
                        <th>Ketua</th>
                        <th>Anggota</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($approvalTeams) > 0) : ?>
                        <?php foreach ($approvalTeams as $team) : ?>
                            <tr>
                                <td><?= $team['nama_lomba'] ?></td>
                                <td><?= $team['tenggat_pendaftaran'] ?></td>
                                <td><?= $team['nama_tim'] ?></td>
                                <td><?= $team['NIM_ketua'] ?></td>
                                <td><?= implode('<br/> ', $team['anggota_tim']); ?></td>
                                <td><?= $team['status'] ?></td>
                                <td>
                                    <form action="<?= site_url('admin/approveTim'); ?>" method="post" style="display: inline-block;">
                                        <input type="hidden" name="tim_lomba_id" value="<?= esc($team['tim_lomba_id']); ?>">
                                        <button type="submit" name="setujui" class="accept-approval-tim-lomba">Setujui</button>
                                    </form>
                                    <form action="<?= site_url('admin/rejectTim'); ?>" method="post" style="display: inline-block;">
                                        <input type="hidden" name="tim_lomba_id" value="<?= esc($team['tim_lomba_id']); ?>">
                                        <button type="submit" name="tidak_setujui" class="decline-approval-tim-lomba">Tidak Disetujui</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Tidak ada data tim lomba yang menunggu persetujuan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Konten tersembunyi untuk pembuatan berita -->
    <div id="create-news-content" style="display: none;">
        <div class="action-buttons">
            <a href="<?= base_url('admin/tambah_berita_form'); ?>" class="btn btn-primary">Buat Berita</a>
        </div>
        <div class="table-responsive">
            <table id="createNewsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Judul Berita</th>
                        <th>Prodi Berita</th>
                        <th>Tanggal</th>
                        <th>Foto Berita</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($berita) > 0) : ?>
                        <?php foreach ($berita as $b) : ?>
                            <tr>
                            <td style="width: 100px"><?= $b['judul_berita'] ?></td>
                                <td style="width: 100px"><?= implode(', ', json_decode($b['prodi_berita'], true)) ?></td>
                                <td style="width: 100px"><?= date('d/m/Y', strtotime($b['created_at'])) ?></td>
                                <td><img src="<?= base_url('uploads/berita/' . esc($b['foto_berita'])); ?>" alt="Poster Lomba" width="100"></td>
                                <td style="width: 1000px; max-height: 200px;">
                                    <div id="keteranganLomba" class="more">
                                        <?php
                                            $keterangan = esc($b['isi_berita']);
                                            $sentences = explode('.', $keterangan);
                                            $short_keterangan = implode('.', array_slice($sentences, 0, 10)) . (count($sentences) > 4 ? '...' : '');
                                        ?>
                                        <div id="keteranganLomba">
                                            <span class="short-text"><?= $short_keterangan; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="<?= site_url('admin/edit_berita'); ?>" method="get" style="display: inline-block;">
                                        <input type="hidden" name="berita_id" value="<?= esc($b['berita_id']); ?>">
                                        <button type="submit" name="setujui" class="accept-approval-tim-lomba">Edit</button>
                                    </form>
                                    <form action="<?= site_url('admin/delete_berita_form'); ?>" method="post" style="display: inline-block;">
                                        <input type="hidden" name="berita_id" value="<?= esc($b['berita_id']); ?>">
                                        <button type="submit" name="tidak_setujui" class="decline-approval-tim-lomba">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">Tidak ada data tim lomba yang menunggu persetujuan.</td>
                        </tr>
                    <?php endif; ?>
                    <!-- Add more rows if needed -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {   
            function confirmDelete() {
                if (confirm('Are you sure you want to delete this user?')) {
                    // Submit the form
                    document.forms[0].submit(); // Assuming there's only one form, adjust if needed
                } else {
                    // Do nothing or handle cancellation
                }
            }

            // Default content
            $('#main-content').html($('#default-content').html());

            $('#user-management').click(function() {
                $('#main-content').html($('#user-management-content').html());
            });
            
            $('#list-prodi').click(function() {
                $('#main-content').html($('#list-prodi-content').html());
            });

            $('#approval-info-lomba').click(function() {
                $('#main-content').html($('#approval-info-lomba-content').html());
                $('#infoLombaTable').DataTable();
            });

            $('#update-info-lomba').click(function() {
                $('#main-content').html($('#update-info-lomba-content').html());
            });

            $('#approval-tim-lomba').click(function() {
                $('#main-content').html($('#approval-tim-lomba-content').html());
            });

            $('#create-news').click(function() {
                $('#main-content').html($('#create-news-content').html());
            });
        });
    </script>
    
    <script>
        $(document).ready(function(){
            $(".read-more").click(function(){
                var $this = $(this);
                var $shortText = $this.siblings(".short-text");
                var $fullText = $this.siblings(".full-text");

                if ($shortText.is(":visible")) {
                    $shortText.hide();
                    $fullText.show();
                    $this.text("Read Less");
                } else {
                    $shortText.show();
                    $fullText.hide();
                    $this.text("Read More");
                }
            });
        });
    </script>


    <script>
        $(document).ready(function(){
            $(".close").click(function(){
                $(this).closest('.alert').hide();
            });
            setTimeout(function() {
                $(".alert").fadeOut('slow');
            }, 1000);
        });
        
    </script>

</body>

</html>