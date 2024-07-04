<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeskApp - Form Tambah Info Lomba</title>
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

<body>
    <section class="container d-flex justify-content-center align-items-center">
        <div class="container p-5 bg-white rounded-lg shadow-lg">
            <div class="pb-2">
                <a class="" href="<?= base_url('/admin/dashboard') ?>">
                    <button class="border bg-secondary px-5">
                        <p class="text-light fw-bold pt-3" style="text-align: center;">Back</p>
                    </button>
                </a>
            </div>
            <h1 class="pb-3">FORM PENAMBAHAN BERITA</h1>
    
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
    
            <form action="<?= base_url('admin/edit_berita_form') ?>" class="py-3" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="hidden" value="<?= esc($berita['berita_id']) ?>" id="berita_id" name="berita_id">
                    <input type="text" value="<?= esc($berita['judul_berita']) ?>" id="judul_berita" name="judul_berita" class="form-control" placeholder="Cantumkan Judul Berita" aria-label="judul_berita" required>
                </div>
                <div class="input-box mb-10">
                    <label>Isi Berita</label>
                    <textarea name="isi_berita" id="isi_berita" cols="30" rows="20" class="form-control h-25"><?= isset($berita['isi_berita']) ? $berita['isi_berita'] : '' ?></textarea>
                </div>
                <div id="prodi-container">
                    <label for="prodi_berita">Prodi Terkait Berita</label>
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                        <div class="input-group prodi-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><?= 'Prodi ' . ($i + 1) ?></label>
                            </div>
                            <select class="custom-select mt-1 rounded-left rounded-left-bottom" name="prodi_berita[]" id="inputGroupSelect01">
                                <option selected disabled>Choose...</option>
                                <?php foreach ($prodi as $row) : ?>
                                    <option value="<?= $row['prodi_id'] ?>" <?= (isset($berita['prodi_berita'][$i]) && $row['prodi_id'] == $berita['prodi_berita'][$i]) ? 'selected' : '' ?>>
                                        <?= $row['nama_prodi'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="form-group mb-10">
                    <label>Foto Berita</label>
                    <input class="form-control" type="file" class="form-control-file" id="foto_berita" name="foto_berita" accept=".jpg,.jpeg,.png">
                    <?php if (isset($berita['foto_berita']) && !empty($berita['foto_berita'])): ?>
                        <p class="file_sebelumnya">File yang diunggah sebelumnya: <a href="<?= $berita['foto_berita'] ?>" target="_blank"><?= $berita['foto_berita'] ?></a></p>
                    <?php endif; ?>
                </div>
                <div class="pt-3 w-100">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
            </form>
        </div>
        
        <script src="<?= base_url('js/form/form_lomba.js') ?>"></script>
    </section>
</body>

</html>
