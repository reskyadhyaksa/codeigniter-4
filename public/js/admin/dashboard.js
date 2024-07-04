$(document).ready(function () {
    // Default content
    $('#main-content').html($('#default-content').html());

    $('#user-management').click(function () {
        $('#main-content').html($('#user-management-content').html());
    });

    $('#approval-info-lomba').click(function () {
        $('#main-content').html($('#approval-info-lomba-content').html());
        $('#infoLombaTable').DataTable();
    });

    $('#update-info-lomba').click(function () {
        $('#main-content').html($('#update-info-lomba-content').html());
    });

    $('#approval-tim-lomba').click(function () {
        $('#main-content').html($('#approval-tim-lomba-content').html());
    });

    $('#create-news').click(function () {
        $('#main-content').html($('#create-news-content').html());
    });
});

function get_first_n_sentences($text, $num_sentences = 5) {
    // Split the text into sentences
    $sentences = preg_split('/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?)\s/', $text);
    
    // Get the first n sentences
    $first_n_sentences = array_slice($sentences, 0, $num_sentences);
    
    // Join the first n sentences back into a string
    return implode(' ', $first_n_sentences);
}
