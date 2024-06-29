$(document).ready(function() {
    var anggotaCount = 1; // Anggota awal yang sudah ada

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
});