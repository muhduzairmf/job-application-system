<?php
include_once 'DbConfig.php';

/**
 * A model class for Officer table
 */
class Officer extends DbConfig {
    private $id;
    private $department;
    private $position;
    private $user_id; // Foreign Key

    public function retrieveAllOfficer_whereUserId($user_id) {

        $conn = $this->createConnection();

        $this->user_id = $user_id;

        $sql = "SELECT * FROM officer WHERE user_id = '$this->user_id'";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }
}