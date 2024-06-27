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
