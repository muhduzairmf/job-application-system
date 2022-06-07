<?php

/**
 * A view class for the applicant route (applicant.php)
 */
class ApplicantUI {
    /**
     * An instance method for the view of localhost/applicant.php?tab=home&section=main
     */
    public function homePage() {
        include './views/pages/applicant/home.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=job&section=main
     */
    public function jobMainPage() {
        include './views/pages/applicant/jobMain.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=job&section=job-posting
     */
    public function jobPostingPage() {
        include './views/pages/applicant/jobPosting.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=job-posting&section={job_id}
     */
    public function postingJobIdPage() {
        include './views/pages/applicant/postingJobId.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=job&section=applied-job
     */
    public function appliedJobPage() {
        include './views/pages/applicant/appliedJob.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=applied-job&section={job_id}
     */
    public function appliedJobIdPage() {
        include './views/pages/applicant/appliedJob.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=message&section=main
     */
    public function messageMainPage() {
        include './views/pages/applicant/messageMain.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=message&section={user_id}
     */
    public function messageUserId() {
        include './views/pages/applicant/messageUserId.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=user-detail
     */
    public function profileUserDetailPage() {
        include './views/pages/applicant/profileUserDetail.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=education
     */
    public function profileEducationPage() {
        include './views/pages/applicant/profileEducation.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=experience
     */
    public function profileExperiencePage() {
        include './views/pages/applicant/profileExperience.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=language
     */
    public function profileLanguagePage() {
        include './views/pages/applicant/profileLanguage.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=resume
     */
    public function profileResumePage() {
        include './views/pages/applicant/profileResume.page.php';      
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=skill
     */
    public function profileSkillPage() {
        include './views/pages/applicant/profileSkill.page.php';
    }

    /**
     * An instance method for the view of localhost/applicant.php?tab=profile&section=change-password
     */
    public function changePasswordPage() {
        include './views/pages/applicant/changePassword.page.php';
    }
}