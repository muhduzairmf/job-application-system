<?php

class Logout {
    public function proceedLogout() {
        setcookie("access_token", "", time() - 86400, "/");
        setcookie("user_token", "", time() - 86400, "/");

        session_destroy();

        header("Location: /");
    }
}

$logout = new Logout();
$logout->proceedLogout();
