<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/minstyle.io.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="./static/js/alpine.min.js" defer></script>
    <title>Manager | HIS Job Application System</title>
</head>
<body>
    <?php
    include './views/components/NavManager.php';
    include './views/components/NotFound.php';
    include './views/ManagerUI.php';
    include './auth/ProtectRoute.auth.php';

    //error_reporting(0);

    $protectManager = new ProtectRoute();
    if (!$protectManager->validateManager()) {
        return;
    }

    // Render Navbar for manager.php
    navManager();



    //=====================================================================//
    //=========================   ROUTE HANDLER   =========================//
    //=====================================================================//
    //                                ****
    //                                *  *
    //                                *  *
    //                               **  **
    //                                *  *
    //                                 **

    // Render Not Found message if there is 
    // no tab and section params in the URL
    // For example: localhost/manager.php
    if (empty($_GET['tab']) || empty($_GET['section'])) {
        notFound();
        return;
    }

    // URL: localhost/manager.php?tab=home&section=main
    if ($_GET['tab'] == 'home' && $_GET['section'] == 'main') {
        $managerUI = new ManagerUI();
        $managerUI->homePage();
    
    // URL: localhost/manager.php?tab=job&section=main
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'main') {
        $managerUI = new ManagerUI();
        $managerUI->jobMainPage();
    
    // URL: localhost/manager.php?tab=job&section=new-notice
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'new-notice') {
        $managerUI = new ManagerUI();
        $managerUI->newNoticePage();
    
    // URL: localhost/manager.php?tab=job&section=hiring-status
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'hiring-status') {
        $managerUI = new ManagerUI();
        $managerUI->hiringStatusPage();
    
    // URL: localhost/manager.php?tab=hiring-status&section=saved-later
    } else if ($_GET['tab'] == 'hiring-status' && $_GET['section'] == 'saved-later') {
        $managerUI = new ManagerUI();
        $managerUI->savedLaterPage();
    
    // URL: localhost/manager.php?tab=hiring-status&section=waiting-from-hq
    } else if ($_GET['tab'] == 'hiring-status' && $_GET['section'] == 'waiting-from-hq') {
        $managerUI = new ManagerUI();
        $managerUI->waitingFromHqPage();
    
    // URL: localhost/manager.php?tab=hiring-status&section=posted-job
    } else if ($_GET['tab'] == 'hiring-status' && $_GET['section'] == 'posted-job') {
        $managerUI = new ManagerUI();
        $managerUI->postedJobPage();
    
    // URL: localhost/manager.php?tab=hiring-status&section=interview-session
    } else if ($_GET['tab'] == 'hiring-status' && $_GET['section'] == 'interview-session') {
        $managerUI = new ManagerUI();
        $managerUI->interviewSessionPage();
    
    // URL: localhost/manager.php?tab=hiring-status&section=done
    } else if ($_GET['tab'] == 'hiring-status' && $_GET['section'] == 'done') {
        $managerUI = new ManagerUI();
        $managerUI->hiringStatusDonePage();
    
    // URL: localhost/manager.php?tab=hiring-status&section=all-notices
    } else if ($_GET['tab'] == 'hiring-status' && $_GET['section'] == 'all-notices') {
        $managerUI = new ManagerUI();
        $managerUI->allNoticesPage();
    
    // URL: localhost/manager.php?tab=hiring-status&section={job_id}
    } else if ($_GET['tab'] == 'hiring-status' && !empty($_GET['section'])) {
        $managerUI = new ManagerUI();
        $managerUI->hiringStatusJobIdPage();
    
    // URL: localhost/manager.php?tab=message&section=main
    } else if ($_GET['tab'] == 'message' && $_GET['section'] == 'main') {
        $managerUI = new ManagerUI();
        $managerUI->messageMainPage();
    
    // URL: localhost/manager.php?tab=message&section={user_id}
    } else if ($_GET['tab'] == 'message' && !empty($_GET['section'])) {
        $managerUI = new ManagerUI();
        $managerUI->messageUserIdPage();
    
    // URL: localhost/manager.php?tab=profile&section=user-detail
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'user-detail') {
        $managerUI = new ManagerUI();
        $managerUI->userDetailPage();
    
    // URL: localhost/manager.php?tab=profile&section=change=password
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'change=password') {
        $managerUI = new ManagerUI();
        $managerUI->changePasswordPage();
    
    // If user try to access invalid URL
    } else {
        notFound();
    }
    ?>
</body>
</html>