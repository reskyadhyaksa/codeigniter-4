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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="/admin/dashboard#">
                <img src="<?= base_url('img/deskapp-logo.svg') ?>" alt="" class="dark-logo" />
                <img src="<?= base_url('img/deskapp-logo-white.svg') ?>" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="#" id="user-management" class="dropdown-toggle no-arrow">
                            <span class="mtext">Manajemen Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="approval-info-lomba" class="dropdown-toggle no-arrow">
                            <span class="mtext">Persetujuan Info Lomba</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="update-info-lomba" class="dropdown-toggle no-arrow">
                            <span class="mtext">Pembaruan Info Lomba</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="approval-tim-lomba" class="dropdown-toggle no-arrow">
                            <span class="mtext">Persetujuan Tim Lomba</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="create-news" class="dropdown-toggle no-arrow">
                            <span class="mtext">Pembuatan Berita</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

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

    <!-- Konten tersembunyi untuk manajemen pengguna -->
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
                                    <button class="edit-user"">Edit</button>
                                </form>
                                <form action="<?= base_url('admin/delete_mahasiswa'); ?>" method="post" style="display: inline;">
                                    <input type="hidden" name="NIM" value="<?= $row['NIM']; ?>">
                                    <button class="delete-user"">Delete</button>
                                </form>
                            </td>
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
                        <th>Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        <th>Poster</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($approvalCompetitions as $competition) : ?>
                        <tr>
                            <td><?= $competition['nama_lomba']; ?></td>
                            <td><?= $competition['kategori_lomba']; ?></td>
                            <td><?= $competition['tanggal_mulai']; ?></td>
                            <td><?= $competition['tanggal_selesai']; ?></td>
                            <td><?= $competition['keterangan_lomba']; ?></td>
                            <td><img src="<?= base_url('uploads/poster/' . $competition['poster_lomba']) ?>" alt="Poster Lomba" width="100" /></td>
                            <td><a href="<?= $competition['link_lomba'] ?>">Link</a></td>
                            <td>
                                <button class="approve-competition">Approve</button>
                                <button class="reject-competition">Reject</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
                        <th>Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        <th>Poster</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($updateCompetitions) > 0) : ?>
                        <?php foreach ($updateCompetitions as $competition) : ?>
                            <tr>
                                <td><?= esc($competition['nama_lomba']); ?></td>
                                <td><?= esc($competition['kategori_lomba']); ?></td>
                                <td><?= esc($competition['tanggal_mulai']); ?></td>
                                <td><?= esc($competition['tanggal_selesai']); ?></td>
                                <td><?= esc($competition['keterangan_lomba']); ?></td>
                                <td><img src="<?= base_url('uploads/poster/' . esc($competition['poster_lomba'])); ?>" alt="Poster Lomba" width="100"></td>
                                <td><a href="<?= esc($competition['link_lomba']); ?>">Link</a></td>
                                <td>
                                    <button class="edit-update-info-lomba">Edit</button>
                                    <button class="delete-update-info-lomba">Delete</button>
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
                        <th>Anggota 1</th>
                        <th>Anggota 2</th>
                        <th>Anggota 3</th>
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
                                <td>
                                    <form action="<?= site_url('persetujuantim.php'); ?>" method="post" style="display: inline-block;">
                                        <input type="hidden" name="tim_lomba_id" value="<?= esc($team['tim_lomba_id']); ?>">
                                        <button type="submit" name="setujui" class="accept-approval-tim-lomba">Setujui</button>
                                    </form>
                                    <form action="<?= site_url('persetujuantim.php'); ?>" method="post" style="display: inline-block;">
                                        <input type="hidden" name="tim_lomba_id" value="<?= esc($team['tim_lomba_id']); ?>">
                                        <button type="submit" name="tidak_setujui" class="decline-approval-tim-lomba">Tidak Disetujui</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">Tidak ada data tim lomba yang menunggu persetujuan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Konten tersembunyi untuk pembuatan berita -->
    <div id="create-news-content" style="display: none;">
        <div class="action-buttons">
            <button id="add-create-news">Add News</button>
        </div>
        <div class="table-responsive">
            <table id="createNewsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Berita</th>
                        <th>Tanggal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Berita A</td>
                        <td>2023-05-12</td>
                        <td>
                            <button class="edit-create-news">Edit</button>
                            <button class="delete-create-news">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows if needed -->
                </tbody>
            </table>
        </div>
    </div>


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
</body>

</html>