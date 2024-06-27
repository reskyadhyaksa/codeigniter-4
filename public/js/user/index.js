$(document).ready(function () {
  $("#mahasiswa-login-form").on("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    // AJAX post request
    $.ajax({
      url: $(this).attr("action"),
      method: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          // Redirect to the dashboard on successful login
          window.location.href = response.redirect_url;
        } else {
          // Display error message
          $("#error-message").text(response.message);
          console.log(response);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
        if (error === "Unauthorized") {
          const message = "Username atau password salah!";
          $("#error-message").text(message);
        }
      },
    });
  });

  $("#formadmin").on("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    // AJAX post request
    $.ajax({
      url: $(this).attr("action"),
      method: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          // Redirect to the dashboard on successful login
          window.location.href = response.redirect_url;
        } else {
          // Display error message
          $("#error-message-admin").text(response.message);
          console.log(response);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
        if (error === "Unauthorized") {
          const message = "Username atau password salah!";
          $("#error-message-admin").text(message);
        }
      },
    });
  });
});
