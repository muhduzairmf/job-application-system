<?php 
include_once 'DbConfig.php';

/**
 * A model class for User table
 */
class User extends DbConfig {

    private $id; // Primary Key
    private $name;
    private $email;
    private $password;
    private $role;

    public function insertNewUser($name, $email, $password, $role) {

        $conn = $this->createConnection();

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;

        $sql = "INSERT INTO user (name, email, password, role) VALUES ('$this->name', '$this->email', '$this->password', '$this->role')";

        if ($conn->query($sql) === FALSE) {
            $this->closeConnection($conn);
            return "Error";
        }

        $this->closeConnection($conn);
        return "Success";

    }

    public function retrieveAllUsers() {

        $conn = $this->createConnection();

        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }

    public function retrieveOneUsers_whereEmail($email) {

        $conn = $this->createConnection();

        $this->email = $email;

        $sql = "SELECT * FROM user WHERE email = '$this->email'";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }
    
}