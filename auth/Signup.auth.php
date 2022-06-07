<?php
include_once './models/User.model.php';

class Signup {
    private $id;
    private $fullName;
    private $email;
    private $password;
    private $confirmPassword;
    private $role;

    public function __construct($fullName, $email, $password, $confirmPassword) {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->role = "Applicant";
    }

    public function isFieldEmpty() {
        if (empty($this->fullName) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
            return true;
        }
        return false;
    }

    public function isUserExist() {

        $users = new User();
        $result = $users->retrieveOneUsers_whereEmail($this->email);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function isPasswSame() {
        if ($this->confirmPassword == $this->password) {
            return true;
        }
        return false;
    }

    public function isPasswFollowRole() {
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";    
        // Must have a uppercase letter.
        // Must have a lowercase letter.
        // Must have a number
        // At least 8 minimum characters.

        $is_match = preg_match($password_regex, $this->password);
        if ($is_match == 1) {
            return true;
        }

        return false;
    }

    public function proceedSignup() {

        // Generate new salt
        $default_salt = bin2hex(random_bytes(32)); 

        // Hash the password with sha256 algorithm
        // and mix with salt
        // * sha256 better for returning long hashed string
        $hashed_passwd = hash('sha256', $default_salt . $this->password);

        // Concatenate the salt with the hashed password with salt
        $salt_and_hashed_passwd = "${default_salt}:${hashed_passwd}";

        // Store the latest concatenation as a password in database
        // Insert a new user into database
        $newUser = new User();
        $msg = $newUser->insertNewUser($this->fullName, $this->email, $salt_and_hashed_passwd, $this->role);

        if ($msg == "Error") {
            return;
        }

        // Generate random uuid for session id
        $rand_uuid = uniqid();

        // Get the user email 
        // Get the user role
        // Hash the email with crc32 algorithm 
        // and user role and mix with random uuid as a salt
        // * crc32 is faster algorithm
        $hashed_email = hash('crc32', $rand_uuid . $this->email);
        $hashed_role = hash('crc32', $rand_uuid . $this->role);

        // Create an access token = "${random_uuid}:${hashed_email}:${hashed_role}"
        $access_token = "${rand_uuid}:${hashed_email}:${hashed_role}";

        // Create user token = bin2hex($email)
        $user_token = bin2hex($this->email);

        // Store the access token and user token 
        // inside cookie with expiry in 24 hours
        // The cookie is available in entire website
        setcookie("access_token", $access_token, time() + 86400, "/");
        setcookie("user_token", $user_token, time() + 86400, "/");

        // Get user id
        $result = $newUser->retrieveOneUsers_whereEmail($this->email);
        while ($user = $result->fetch_assoc()) {
            $this->id = $user['id'];
        }

        // Store the user id, email and role inside session
        session_start();
        $_SESSION['user_id'] = $this->id;
        $_SESSION['user_email'] = $this->email;
        $_SESSION['user_role'] = $this->role;

        // Go to applicant home page, since sign up is for new applicant only
        header("Location: applicant.php?tab=home&section=main");
    }

}
