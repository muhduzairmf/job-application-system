<?php
include_once './models/User.model.php';

class Login {
    private $id;
    private $email;
    private $password;
    private $role;
    
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function isFieldEmpty() {
        if(empty($this->email) || empty($this->password)) {
            return true;
        }
        return false;
    }

    public function isPasswMatch() {
        // Get the user detail based on email from user input
        $theUser = new User();
        $result = $theUser->retrieveOneUsers_whereEmail($this->email);

        // Return false if there is no matched email
        if ($result->num_rows == 0) {
            return false;
        }

        // Get the stored password based on the email
        while ($user = $result->fetch_assoc()) {
            $stored_passwd = $user['password'];
            $this->role = $user['role'];
            $this->id = $user['id'];
        }

        // Get the salt from stored password
        $arr_salt_hashed_passwd = explode(":", $stored_passwd);
        $salt = $arr_salt_hashed_passwd[0];

        // Get the password from user input
        // Hash the password with sha256 algorithm
        // and mix with obtained salt
        $hashed_passwd = hash('sha256', $salt . $this->password);

        // Compare the hashed password
        if ($hashed_passwd != $arr_salt_hashed_passwd[1]) {
            return false;
        }

        return true;

    }

    public function proceedLogin() {
        // Generate randomuuid for unique session id
        $rand_uuid = uniqid();

        // Get the user email
        // Get the user role
        // Hash the email with crc32 algorithm
        // and user role and mix with random uuid as a salt
        $hashed_email = hash('crc32', $rand_uuid . $this->email);
        $hashed_role = hash('crc32', $rand_uuid . $this->role);

        // Create an access token = "${random_uuid}:${hashed_email}:${hashed_role}"
        $access_token = "${rand_uuid}:${hashed_email}:${hashed_role}";

        // Create user token = bin2hex($email)+bin2hex($role)
        $user_token = bin2hex($this->email) . ":" . bin2hex($this->role);

        // Store the access token and user token 
        // inside cookie with expiry in 24 hours
        // The cookie is available in entire website
        setcookie("access_token", $access_token, time() + 86400, "/");
        setcookie("user_token", $user_token, time() + 86400, "/");

        // Store the user id, email and role inside session
        session_start();
        $_SESSION['user_id'] = $this->id;
        $_SESSION['user_email'] = $this->email;
        $_SESSION['user_role'] = $this->role;

        // Go to related home page for appropriate user
        $homepage = strtolower($this->role) . ".php?tab=home&section=main";
        header("Location: ${homepage}");
    }

}
