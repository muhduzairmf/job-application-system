<?php
$errMsg = "";
$fullName = "";
$email = "";
$password = "";
$confirmPassword = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) && $_POST['submit'] == "Sign Up") {
    
    include_once './auth/Signup.auth.php';

    $fullName = $_POST['user_fullName'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $confirmPassword = $_POST['user_confirmPassword'];

    $signup = new Signup($fullName, $email, $password, $confirmPassword);

    if ($signup->isFieldEmpty()) {
        $errMsg = "Full Name, Email, Password and Confirm Password is required field";
    } else if ($signup->isUserExist()) {
        $errMsg = "Email is already existed";
    } else if (!$signup->isPasswSame()) {
        $errMsg = "Password does not match";
    } else if (!$signup->isPasswFollowRole()) {
        $errMsg = "Please follow the password rules";
    } else {
        $signup->proceedSignup();
    }

}
    
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
    <title>Signup | HIS Job Application System</title>
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
                <li><a href="./login.php">Login</a></li>
            </ul>
        </nav>
    </div>
    <!-- /* Signup Header */ -->
    <?php
    include_once './views/components/BasicHeader.php';

    basicHeader('Sign Up');
    ?>
    <!-- /* Signup Form */ -->
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
                    <label for="fullName">Full Name</label>
                    <input type="text" placeholder="Full Name" id="fullName" name="user_fullName" value="<?php echo $fullName; ?>">
                </div>
                <div class="ms-form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" id="email" name="user_email" value="<?php echo $email; ?>">
                </div>
                <div class="ms-form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" id="password" name="user_password" autocomplete="new-password" value="<?php echo $password; ?>">
                </div>
                <div class="ms-form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" placeholder="Password" id="confirmPassword" name="user_confirmPassword" autocomplete="new-password" value="<?php echo $confirmPassword; ?>">
                </div>
                <div class="ms-card ms-fill">
                    <div class="ms-card-content">
                        <p>Password rule : </p>
                        <ul>
                            <li>Must have a uppercase letter.</li>
                            <li>Must have a lowercase letter.</li>
                            <li>Must have a number.</li>
                            <li>At least 8 minimum characters.</li>
                        </ul>
                    </div>
                </div>
                <div class="ms-form-group">
                    <input type="submit" class="ms-btn ms-primary ms-fullwidth" value="Sign Up" name="submit">
                </div>
                <div class="form-group">
                    <span class="ms-under-input">Have an account? <a href="./login.php"><u>Login</u></a> here.</span>
                </div>
            </div>
        </div>
    </form><br><br>
</body>
</html>