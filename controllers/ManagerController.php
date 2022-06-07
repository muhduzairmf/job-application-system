<?php
include_once './models/Job.model.php';
include_once './models/RecruitmentStatus.model.php';
include_once './models/Officer.model.php';

/**
 * A controller class for manager.php
 */
class ManagerController {
    
    public function newNotice($newNotice_page) {
        
        $newNotice_page['designation'] = htmlspecialchars($_POST['designation']);
        $newNotice_page['department'] = htmlspecialchars($_POST['department']);
        $newNotice_page['min_monthly_salary'] = htmlspecialchars($_POST['min_monthly_salary']);
        $newNotice_page['max_monthly_salary'] = htmlspecialchars($_POST['max_monthly_salary']);
        $newNotice_page['candidate_nationality'] = htmlspecialchars($_POST['candidate_nationality']);
        $newNotice_page['candidate_min_edu_level'] = htmlspecialchars($_POST['candidate_min_edu_level']);
        $newNotice_page['candidate_min_of_exp'] = htmlspecialchars($_POST['candidate_min_of_exp']);
        $newNotice_page['candidate_lang_req'] = htmlspecialchars($_POST['candidate_lang_req']);
        $newNotice_page['candidate_other_req'] = htmlspecialchars($_POST['candidate_other_req']);
        $newNotice_page['job_responsible'] = htmlspecialchars($_POST['job_responsible']);
        $newNotice_page['other_info'] = htmlspecialchars($_POST['other_info']);
        $newNotice_page['status_recruitment'] = htmlspecialchars($_POST['status_recruitment']);
        
        if (empty($newNotice_page['designation']) || empty($newNotice_page['department']) || empty($newNotice_page['min_monthly_salary']) || empty($newNotice_page['max_monthly_salary']) || empty($newNotice_page['candidate_nationality']) || empty($newNotice_page['candidate_min_edu_level']) || empty($newNotice_page['candidate_min_of_exp']) || empty($newNotice_page['candidate_lang_req']) || empty($newNotice_page['job_responsible']) || empty($newNotice_page['status_recruitment'])) {
            
            $newNotice_page['errorMsg'] = "The field with * is required";
            return $newNotice_page;
        }
        
        $created_date = date("Y-m-d");
        $last_modified_date = date("Y-m-d");
        
        $officer = new Officer();
        $result = $officer->retrieveAllOfficer_whereUserId($_SESSION['user_id']);
        $officer_id = "";
        while ($officer = $result->fetch_assoc()) {
            $officer_id = $officer['id'];
        }
        
        $job = new Job();
        $result = $job->insertJob($newNotice_page['designation'], $newNotice_page['department'], $newNotice_page['min_monthly_salary'], $newNotice_page['max_monthly_salary'], $newNotice_page['candidate_nationality'], $newNotice_page['candidate_min_edu_level'], $newNotice_page['candidate_min_of_exp'], $newNotice_page['candidate_lang_req'], $newNotice_page['candidate_other_req'], $newNotice_page['job_responsible'], $newNotice_page['other_info'], $created_date, $last_modified_date, (int)$newNotice_page['status_recruitment'], (int)$officer_id);
        
        if ($result == "Error") {
            
            $newNotice_page['createNoticeStatus'] = "Error occured when create new notice";
            $newNotice_page['designation'] = $newNotice_page['department'] = $newNotice_page['min_monthly_salary'] = $newNotice_page['max_monthly_salary'] = $newNotice_page['candidate_nationality'] = $newNotice_page['candidate_min_edu_level'] = $newNotice_page['candidate_min_of_exp'] = $newNotice_page['candidate_lang_req'] = $newNotice_page['candidate_other_req'] = $newNotice_page['job_responsible'] = $newNotice_page['other_info'] = "";
            return $newNotice_page; 
            
        }
        
        $newNotice_page['createNoticeStatus'] = "New notice successfully created";
        $newNotice_page['designation'] = $newNotice_page['department'] = $newNotice_page['min_monthly_salary'] = $newNotice_page['max_monthly_salary'] = $newNotice_page['candidate_nationality'] = $newNotice_page['candidate_min_edu_level'] = $newNotice_page['candidate_min_of_exp'] = $newNotice_page['candidate_lang_req'] = $newNotice_page['candidate_other_req'] = $newNotice_page['job_responsible'] = $newNotice_page['other_info'] = ""; 
        
        return $newNotice_page;
        
    }
    
    public function savedLater() {

        $officer = new Officer();
        $result = $officer->retrieveAllOfficer_whereUserId($_SESSION['user_id']);
        $officer_id = "";
        while ($officer = $result->fetch_assoc()) {
            $officer_id = $officer['id'];
        }
        
        $job = new Job();
        $result = $job->retrieveAllJob_whereStatusIdOfficerId(1, (int)$officer_id);
        return $result;
        
    }
    
    public function savedLater_recruitStatus($id) {
        
        $recruit_status = new RecruimentStatus();
        $result = $recruit_status->retrieveAllStatus_where($id);
        $recruit_status = "";
        while ($status = $result->fetch_assoc()) {
            $recruit_status = $status['status'];
        }
        return $recruit_status;
    }
    
    public function update_savedLater() {
        
        $last_modified_date = date("Y-m-d");
        
        $job = new Job();
        $result = $job->modifyOneJob((int)$_POST['Update_Current_Notice_Id'], htmlspecialchars($_POST['designation']), htmlspecialchars($_POST['department']), htmlspecialchars($_POST['min_monthly_salary']), htmlspecialchars($_POST['max_monthly_salary']), htmlspecialchars($_POST['candidate_nationality']), htmlspecialchars($_POST['candidate_min_edu_level']), htmlspecialchars($_POST['candidate_min_of_exp']), htmlspecialchars($_POST['candidate_lang_req']), htmlspecialchars($_POST['candidate_other_req']), htmlspecialchars($_POST['job_responsible']), htmlspecialchars($_POST['other_info']), $last_modified_date, (int)$_POST['status_recruitment']);

        if ($result == "Error") {
            return "Error occured when update the notice";
        }
        
        return "The notice successfully updated";

    }

    public function delete_savedLater() {
        
        $job = new Job();
        $result = $job->deleteOneJob((int)$_POST['Delete_Notice_Id']);

        if ($result == "Error") {
            return "Error occured when delete the notice";
        }

        return "The notice successfully deleted";

    }
}