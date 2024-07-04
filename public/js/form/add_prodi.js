$(document).ready(function() {
    var maxProdi = 3;
    var prodiCount = 1;

    $('#add-prodi').click(function() {
        if (prodiCount < maxProdi) {
            var newProdi = $('#prodi-container .input-group').first().clone();
            newProdi.find('select').val('');
            $('#prodi-container').append(newProdi);
            prodiCount++;
        } else {
            alert('You can only add up to 3 Prodi.');
        }
    });
});