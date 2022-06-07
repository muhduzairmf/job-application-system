<?php

/**
 * A view class for the hr route (hr.php)
 */
class HrUI {
    /**
     * An instance method for the view of localhost/hr.php?tab=home&section=main
     */
    public function homePage() {
        include './views/pages/hr/home.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=job&section=main 
     */
    public function jobMainPage() {
        include './views/pages/hr/jobMain.page.php';
    }
     
    /**
     * An instance method for the view of localhost/hr.php?tab=job&section=hiring-notice
     */
    public function hiringNoticePage() {
        include './views/pages/hr/hiringNotice.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=hiring-notice&section={job_id}
     */
    public function hireNoticeJobIdPage() {
        include './views/pages/hr/hireNoticeJobId.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=job&section=advertise-job
     */
    public function advertiseJobPage() {
        include './views/pages/hr/advertiseJob.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=advertise-job&section={job_id}
     */
    public function advertiseJobIdPage() {
        include './views/pages/hr/advertiseJobId.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=message&section=main
     */
    public function messageMainPage() {
        include './views/pages/hr/messageMain.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=message&section={officer_id or applicant_id}
     */
    public function messageUserIdPage() {
        include './views/pages/hr/messageUserId.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=profile&section=user-detail
     */
    public function userDetailPage() {
        include './views/pages/hr/userDetail.page.php';
    }

    /**
     * An instance method for the view of localhost/hr.php?tab=profile&section=change-password
     */
    public function changePasswordPage() {
        include './views/pages/hr/changePassword.page.php';
    }
}