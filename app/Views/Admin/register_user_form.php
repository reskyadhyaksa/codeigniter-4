<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeskApp - Register Akun Mahasiswa Baru</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/core.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/icon-font.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/dataTables.bootstrap4.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/responsive.bootstrap4.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style1.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/dashboard.css'); ?>">
    <!-- Custom CSS for Layout -->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>

<body class="container d-flex justify-content-center align-items-center">
    <div class="container p-5 bg-white rounded-lg shadow-lg">
        <div class="pb-5">
            <a class="" href="<?= base_url('/admin/dashboard') ?>">
                <button class="border bg-secondary px-5">
                    <p class="text-light fw-bold pt-3" style="text-align: center;">Back</p>
                </button>
            </a>
        </div>
        <h1 class="pb-3">Register User</h1>

        <!-- message -->
        <section class="" id="message">
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

        <form action="<?= base_url('admin/mahasiswa/register') ?>" class="py-3" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="NIM">NIM</label>
                <input type="text" id="NIM" name="NIM" class="form-control" placeholder="NIM" aria-label="NIM" required>
            </div>
            <div class="form-group mb-3">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap Mahasiswa" aria-label="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Masukkan email mahasiswa" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Prodi</label>
                </div>
                <select class="custom-select" name="prodi_id" id="inputGroupSelect01">
                    <option selected disabled>Choose...</option>
                    <?php foreach ($prodi as $row) : ?>
                        <option value="<?= $row['prodi_id'] ?>" name="prodi_id"><?= $row['nama_prodi'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>IPK</label>
                <input class="form-control input-lg" name="ipk" min="0" max="4" step="0.01" type="number" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo" accept=".jpg,.jpeg,.png">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div class="pt-3 w-100">
                <button type="submit" class="btn btn-primary px-5">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>