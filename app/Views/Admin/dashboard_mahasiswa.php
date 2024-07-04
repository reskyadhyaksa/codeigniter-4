<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNION - Manajemen Pengguna</title>
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
</head>

<body class="body-container">
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

    <div class="navigation-panel">
        <?= $this->include('navigation_admin') ?>
    </div>
    
    <div class="container-right">
        <div id="user-management-content">
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
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>