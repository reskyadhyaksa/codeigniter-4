document.querySelector("#show-login").addEventListener("click", function() {
    document.querySelector(".popup-content.user").classList.add("active");
});

document.querySelector(".popup-content.user .popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup-content").classList.remove("active");
})

document.querySelector("#login-admin").addEventListener("click", function () {
    document.querySelector(".popup-content.user").classList.remove("active");
    document.querySelector(".popup-content.admin").classList.add("active");
});

document.querySelector(".popup-content.admin .popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup-content.admin").classList.remove("active");
})

document.querySelector("#login-user").addEventListener("click", function () {
  document.querySelector(".popup-content.admin").classList.remove("active");
  document.querySelector(".popup-content.user").classList.add("active");
});