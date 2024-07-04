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
            <h1 class="pb-3">FORM PENGAJUAN INFO LOMBA</h1>
    
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
    
            <form action="<?= base_url('admin/tambah_info_lomba') ?>" class="py-3" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nama_lomba">Nama Lomba</label>
                    <input type="text" id="nama_lomba" name="nama_lomba" class="form-control" placeholder="Cantumkan Nama Lomba" aria-label="nama_lomba" required>
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
                <div class="input-box mb-10 mt-3">
                    <label>Deadline Pendaftaran</label>
                    <input type="date" name="tenggat_pendaftaran" id="tenggat_pendaftaran" class="form-control">
                </div>
                <div class="input-box mb-10">
                    <label>Tanggal Lomba Dimulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
                </div>
                <div class="input-box mb-10">
                    <label>Tanggal Lomba Berakhir</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control">
                </div>
                <div class="input-box mb-10">
                    <label>Penyelenggara Lomba</label>
                    <input type="text" name="penyelenggara_lomba" id="penyelenggara_lomba" placeholder="" class="form-control">
                </div>
                <div class="input-box mb-10">
                    <label>Keterangan Lomba</label>
                    <textarea name="keterangan_lomba" id="keterangan_lomba" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group mb-10">
                    <label>Poster Lomba</label>
                    <input class="form-control" type="file" class="form-control-file" id="poster" name="poster" accept=".jpg,.jpeg,.png">
                </div>
                <div class="pt-3 w-100">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
            </form>
        </div>
        
        <script>
            $(document).ready(function() {
                var maxProdi = 3;
                var prodiCount = 1;
    
                function updateButtons() {
                    if (prodiCount === maxProdi) {
                        $('.add-prodi').prop('disabled', true);
                    } else {
                        $('.add-prodi').prop('disabled', false);
                    }
                    if (prodiCount === 1) {
                        $('.remove-prodi').prop('disabled', true);
                    } else {
                        $('.remove-prodi').prop('disabled', false);
                    }
                }
    
                $('#prodi-container').on('click', '.add-prodi', function() {
                    if (prodiCount < maxProdi) {
                        var newProdi = $(this).closest('.prodi-group').clone();
                        newProdi.find('select').val('');
                        $('#prodi-container').append(newProdi);
                        prodiCount++;
                        updateButtons();
                    }
                });
    
                $('#prodi-container').on('click', '.remove-prodi', function() {
                    if (prodiCount > 1) {
                        $(this).closest('.prodi-group').remove();
                        prodiCount--;
                        updateButtons();
                    }
                });
    
                updateButtons();
            });
        </script>

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
        <script src="<?= base_url('js/form/form_lomba.js') ?>"></script>
    
    </section>
</body>

</html>
