<?php
include_once './views/components/Forbidden.php';

class ProtectRoute {
    private $rand_uuid;
    private $email;
    private $role;

    public function __construct() {
        session_start();
        
        // Check if the cookie (access_token and user_token) exist
        if (isset($_COOKIE['access_token']) && isset($_COOKIE['user_token'])) {

            // Split the access_token strings
            $arr_access_token = explode(":", $_COOKIE['access_token']);

            // Return login page, if the access_token is broken
            if (count($arr_access_token) < 3) {
                header("Location: ./login.php");
            }
            
            // Get the rand_uuid from access_token
            $this->rand_uuid = $arr_access_token[0];

            // Check if the session (user_email and user_role) exist
            if (isset($_SESSION['user_email']) && isset($_SESSION['user_role'])) {
            
                // Get the email and role
                $this->email = $_SESSION['user_email'];
                $this->role = $_SESSION['user_role'];

            // If the session is not exist,
            } else {

                // Split the user_token strings
                $arr_user_token = explode(":", $_COOKIE['user_token']);

                // Return login page, if the user_token is broken
                if (count($arr_user_token) < 2) {
                    $_SESSION['redirect_login'] = 'no_access_token';
                    header("Location: ./login.php");
                }
            
                // Get email and role from user_token
                $this->email = hex2bin($arr_user_token[0]);
                $this->role = hex2bin($arr_user_token[1]);

                $access_token_cpy = $this->rand_uuid . ":" . hash('crc32', $this->rand_uuid . $this->email) . ":" . hash('crc32', $this->rand_uuid . $this->role);

                // Validate email and role with access_token existed in cookie
                // If not valid, return login page
                if ($_COOKIE['access_token'] != $access_token_cpy) {
                    $_SESSION['redirect_login'] = 'no_access_token';
                    header("Location: ./login.page");
                }

                // If valid, create session (user_email and user_role) based on user_token
                $_SESSION['user_email'] = $this->email;
                $_SESSION['user_role'] = $this->role;
            }
            
            
        // If cookie not exist, return login page
        } else {
            $_SESSION['redirect_login'] = 'no_access_token';
            header("Location: ./login.php");
        }

    }

    public function validateApplicant() {

        if ($_SESSION['user_role'] != "Applicant") {
            $homeurl = "./" . strtolower($_SESSION['user_role']) . ".php?tab=home&section=main";
            forbidden($homeurl);
            return false;
        }

        return true;

    }

    public function validateHr() {

        if ($_SESSION['user_role'] != "HR") {
            $homeurl = "./" . strtolower($_SESSION['user_role']) . ".php?tab=home&section=main";
            forbidden($homeurl);
            return false;
        }

        return true;

    }

    public function validateManager() {

        if ($_SESSION['user_role'] != "Manager") {
            $homeurl = "./" . strtolower($_SESSION['user_role']) . ".php?tab=home&section=main";
            forbidden($homeurl);
            return false;
        }

        return true;
        
    }
}
