<?php
$errMsg = "";
$email = "";
$passw = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) && $_POST['submit'] == "Login") {

    include_once './auth/Login.auth.php';

    $email = $_POST['user_email'];
    $passw = $_POST['user_password'];

    $login = new Login($email, $passw);

    if ($login->isFieldEmpty()) {
        $errMsg = "Email and Password is required field";
    } else if (!$login->isPasswMatch()) {
        $errMsg = "Please provide correct email and password";
    } else {
        $login->proceedLogin();
    }
    
}

session_start();
if (isset($_SESSION['redirect_login']) && $_SESSION['redirect_login'] == 'no_access_token') {
    $errMsg = "Please login to continue";
}
unset($_SESSION['redirect_login']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/minstyle.io.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="./static/js/alpine.min.js" defer></script>
    <title>Login | HIS Job Application System</title>
</head>
<body>
    <!-- /* Navbar */ -->
    <div class="ms-menu">
        <div class="ms-menu-logo">
            <a href="./"><img src="https://portalvhds11000v9mfhk0k.blob.core.windows.net/travel/HISnew.png" /></a>
        </div>
        <nav class="ms-menu-link">
            <input type="checkbox" id="ms-menu-toggle" />
            <label for="ms-menu-toggle" class="ms-menu-icon"
                ><p>&#9776;</p></label>
            <ul>
                <li><a href="./">Home</a></li>
                <li><a href="./signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </div>
    <!-- /* Login Hero */ -->
    <?php
    include_once './views/components/BasicHeader.php';

    basicHeader('Login');
    ?>
    <!-- /* Login Form */ -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="container" autocomplete="off">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <?php
                if (!empty($errMsg)) {
                    ?>
                    <div class="ms-alert ms-fullwidth ms-light ms-primary" x-data="{
                        displayError: true,
                        close() {
                            this.displayError = false;
                        }
                    }" x-show="displayError" x-transition.duration.500ms>
                        <span class="ms-close" x-on:click="close()"></span>
                        <p>
                            <i class="bi bi-exclamation-square"></i>&nbsp;&nbsp;</i><?php echo $errMsg; ?>
                        </p>
                    </div>
                    <?php
                }
                ?>
                <br><br>
                <div class="ms-form-group">
                    <label for="email_id">Email</label>
                    <input type="email" placeholder="Email" id="email_id" name="user_email" value="<?php echo $email; ?>">
                </div>
                <div class="ms-form-group">
                    <label for="password_id">Password</label>
                    <input type="password" placeholder="Password" id="password_id" name="user_password" autocomplete="current-password" value="<?php echo $passw; ?>">
                </div>
                <div class="ms-form-group">
                    <input type="submit" class="ms-btn ms-primary ms-fullwidth" value="Login" name="submit">
                </div>
                <div class="form-group">
                    <span class="ms-under-input">Don't have an account? <a href="./signup.php"><u>Sign Up</u></a> for free.</span>
                </div>
            </div>
        </div>
    </form><br><br>
</body>
</html>