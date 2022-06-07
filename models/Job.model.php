<?php
include_once 'DbConfig.php';

/**
 * A model class for Job table
 */
class Job extends DbConfig {

    private $id; // Primary Key
    private $designation; 
    private $department;
    private $min_monthly_salary;
    private $max_monthly_salary;
    private $candidate_nationality;
    private $candidate_min_edu_level;
    private $candidate_min_of_exp;
    private $candidate_lang_req;
    private $candidate_other_req;
    private $job_responsibilities;
    private $other_info;
    private $created_date;
    private $last_modified_date;
    private $recruitment_status_id; // Foreign Key
    private $officer_id; // Foreign Key

    public function insertJob($designation, $department, $min_monthly_salary, $max_monthly_salary, $candidate_nationality, $candidate_min_edu_level,$candidate_min_of_exp, $candidate_lang_req, $candidate_other_req, $job_responsibilities, $other_info, $created_date, $last_modified_date, $recruitment_status_id, $officer_id) {

        $conn = $this->createConnection();

        $this->designation = $designation;
        $this->department = $department;
        $this->min_monthly_salary = $min_monthly_salary;
        $this->max_monthly_salary = $max_monthly_salary;
        $this->candidate_nationality = $candidate_nationality;
        $this->candidate_min_edu_level = $candidate_min_edu_level;
        $this->candidate_min_of_exp = $candidate_min_of_exp;
        $this->candidate_lang_req = $candidate_lang_req;
        $this->candidate_other_req = $candidate_other_req;
        $this->job_responsibilities = $job_responsibilities;
        $this->other_info = $other_info;
        $this->created_date = $created_date;
        $this->last_modified_date = $last_modified_date;
        $this->recruitment_status_id = $recruitment_status_id;
        $this->officer_id = $officer_id;

        $sql = "INSERT INTO job (designation, department, min_monthly_salary, max_monthly_salary, candidate_nationality, candidate_min_edu_level, candidate_min_of_exp, candidate_lang_req, candidate_other_req, job_responsibilities, other_info, created_date, last_modified_date, recruitment_status_id, officer_id) VALUES ('$this->designation', '$this->department', '$this->min_monthly_salary', '$this->max_monthly_salary', '$this->candidate_nationality', '$this->candidate_min_edu_level', '$this->candidate_min_of_exp', '$this->candidate_lang_req', '$this->candidate_other_req', '$this->job_responsibilities', '$this->other_info', '$this->created_date', '$this->last_modified_date', '$this->recruitment_status_id', '$this->officer_id')";

        if ($conn->query($sql) === FALSE) {
            $this->closeConnection($conn);
            return "Error";
        }

        $this->closeConnection($conn);
        return "Success";
    
    }

    public function retrieveAllJob() {

        $conn = $this->createConnection();

        $sql = "SELECT * FROM job";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }

    public function retrieveAllJob_whereStatusIdOfficerId($recruitment_status_id, $officer_id) {

        $conn = $this->createConnection();

        $this->recruitment_status_id = $recruitment_status_id;
        $this->officer_id = $officer_id;

        $sql = "SELECT * FROM job WHERE recruitment_status_id = '$this->recruitment_status_id' AND officer_id = '$this->officer_id'";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }

    public function retrieveAllJob_whereId($id) {

        $conn = $this->createConnection();

        $this->id = $id;

        $sql = "SELECT * FROM job WHERE id = '$this->id'";
        $result = $conn->query($sql);

        $this->closeConnection($conn);
        return $result;

    }

    public function modifyOneJob($id, $designation, $department, $min_monthly_salary, $max_monthly_salary, $candidate_nationality, $candidate_min_edu_level,$candidate_min_of_exp, $candidate_lang_req, $candidate_other_req, $job_responsibilities, $other_info, $last_modified_date, $recruitment_status_id) {

        $conn = $this->createConnection();

        $this->id = $id;
        $this->designation = $designation;
        $this->department = $department;
        $this->min_monthly_salary = $min_monthly_salary;
        $this->max_monthly_salary = $max_monthly_salary;
        $this->candidate_nationality = $candidate_nationality;
        $this->candidate_min_edu_level = $candidate_min_edu_level;
        $this->candidate_min_of_exp = $candidate_min_of_exp;
        $this->candidate_lang_req = $candidate_lang_req;
        $this->candidate_other_req = $candidate_other_req;
        $this->job_responsibilities = $job_responsibilities;
        $this->other_info = $other_info;
        $this->last_modified_date = $last_modified_date;
        $this->recruitment_status_id = $recruitment_status_id;

        $sql = "UPDATE job SET designation = '$this->designation', department = '$this->department', min_monthly_salary = '$this->min_monthly_salary', max_monthly_salary = '$this->max_monthly_salary', candidate_nationality = '$this->candidate_nationality', candidate_min_edu_level = '$this->candidate_min_edu_level', candidate_min_of_exp = '$this->candidate_min_of_exp', candidate_lang_req = '$this->candidate_lang_req', candidate_other_req = '$this->candidate_other_req', job_responsibilities = '$this->job_responsibilities', other_info = '$this->other_info', last_modified_date = '$this->last_modified_date', recruitment_status_id = '$this->recruitment_status_id' WHERE id = '$this->id'";

        if ($conn->query($sql) === FALSE) {
            $this->closeConnection($conn);
            return "Error";
        }

        $this->closeConnection($conn);
        return "Success";

    }

    public function deleteOneJob($id) {
        
        $conn = $this->createConnection();

        $this->id = $id;

        $sql = "DELETE FROM job WHERE id = '$this->id'";

        if ($conn->query($sql) === FALSE) {
            $this->closeConnection($conn);
            return "Error";
        }

        $this->closeConnection($conn);
        return "Success";

    }

}