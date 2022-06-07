<?php
include_once 'DbConfig.php';

/**
 * A model class for Recruiment Status table
 */
class RecruimentStatus extends DbConfig {

    private $id; // Primary Key
    private $status;

    public function retrieveAllStatus_where($id) {

        $conn = $this->createConnection();

        $this->id = $id;

        $sql = "SELECT * FROM recruitment_status WHERE id = '$this->id'";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }

}