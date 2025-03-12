document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.querySelector(".log-in-form");
    const emailInput = loginForm.querySelector("input[type='text']");
    const passwordInput = loginForm.querySelector("input[type='password']");

    emailInput.addEventListener("input", function(event) {
        console.log("Email input changed:", event.target.value);
    });

    passwordInput.addEventListener("input", function(event) {
        console.log("Password input changed:", event.target.value);
    });

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
        console.log("Form submitted with email:", emailInput.value, "and password:", passwordInput.value);
    });
});