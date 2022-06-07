<?php

/**
 * A view class for the manager route (manager.php)
 */
class ManagerUI {
    /**
     * An instance method for the view of localhost/manager.php?tab=home&section=main
     */
    public function homePage() {
        include './views/pages/manager/home.page.php';
    }
     
    /**
     * An instance method for the view of localhost/manager.php?tab=job&section=main
     */
    public function jobMainPage() {
        include './views/pages/manager/jobMain.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=job&section=new-notice
     */
    public function newNoticePage() {
        include './views/pages/manager/newNotice.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=job&section=hiring-status
     */
    public function hiringStatusPage() {
        include './views/pages/manager/hiringStatus.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section=saved-later
     */
    public function savedLaterPage() {
        include './views/pages/manager/savedLater.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section=waiting-from-hq
     */
    public function waitingFromHqPage() {
        include './views/pages/manager/waitingFromHq.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section=posted-job
     */
    public function postedJobPage() {
        include './views/pages/manager/postedJob.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section=interview-session
     */
    public function interviewSessionPage() {
        include './views/pages/manager/interviewSession.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section=done
     */
    public function hiringStatusDonePage() {
        include './views/pages/manager/hiringStatusDone.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section=done
     */
    public function allNoticesPage() {
        include './views/pages/manager/allNotices.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=hiring-status&section={job_id}
     */
    public function hiringStatusJobIdPage() {
        include './views/pages/manager/hiringStatusJobId.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=message&section=main
     */
    public function messageMainPage() {
        include './views/pages/manager/messageMain.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=message&section={job_id}
     */
    public function messageUserIdPage() {
        include './views/pages/manager/messageUserId.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=profile&section=user-detail
     */
    public function userDetailPage() {
        include './views/pages/manager/userDetail.page.php';
    }

    /**
     * An instance method for the view of localhost/manager.php?tab=profile&section=change-password
     */
    public function changePasswordPage() {
        include './pages/manager/changePassword.page.php';
    }
}