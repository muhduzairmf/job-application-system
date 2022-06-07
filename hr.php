<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/minstyle.io.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="./static/js/alpine.min.js" defer></script>
    <title>HR | HIS Job Application System</title>
</head>
<body>
    <?php
    include './views/components/NavHR.php';
    include './views/components/NotFound.php';
    include './views/HrUI.php';
    include './auth/ProtectRoute.auth.php';

    // error_reporting(0);

    $protectHr = new ProtectRoute();
    $protectHr->validateHr();

    // Render Navbar for hr.php
    navHr();



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
    // For example: localhost/hr.php
    if (empty($_GET['tab']) || empty($_GET['section'])) {
        notFound();
        return;
    }

    // URL: localhost/hr.php?tab=home&section=main
    if ($_GET['tab'] == 'home' && $_GET['section'] == 'main') {
        $hrUI = new HrUI();
        $hrUI->homePage();

    // URL: localhost/hr.php?tab=job&section=main    
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'main') {
        $hrUI = new HrUI();
        $hrUI->jobMainPage();

    // URL: localhost/hr.php?tab=job&section=hiring-notice    
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'hiring-notice') {
        $hrUI = new HrUI();
        $hrUI->hiringNoticePage();

    // URL: localhost/hr.php?tab=hiring-notice&section={job_id}    
    } else if ($_GET['tab'] == 'hiring-notice' && !empty($_GET['section'])) {
        $hrUI = new HrUI();
        $hrUI->hireNoticeJobIdPage();

    // URL: localhost/hr.php?tab=job&section=advertise-job    
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'advertise-job') {
        $hrUI = new HrUI();
        $hrUI->advertiseJobPage();

    // URL: localhost/hr.php?tab=advertise-job&section={job_id}    
    } else if ($_GET['tab'] == 'advertise-job' && !empty($_GET['section'])) {
        $hrUI = new HrUI();
        $hrUI->advertiseJobIdPage();

    // URL: localhost/hr.php?tab=message&section=main    
    } else if ($_GET['tab'] == 'message' && $_GET['section'] == 'main') {
        $hrUI = new HrUI();
        $hrUI->messageMainPage();

    // URL: localhost/hr.php?tab=message&section={user_id}    
    } else if ($_GET['tab'] == 'message' && !empty($_GET['section'])) {
        $hrUI = new HrUI();
        $hrUI->messageUserIdPage();

    // URL: localhost/hr.php?tab=profile&section=user-detail    
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'user-detail') {
        $hrUI = new HrUI();
        $hrUI->userDetailPage();

    // URL: localhost/hr.php?tab=profile&section=change-password    
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'change-password') {
        $hrUI = new HrUI();
        $hrUI->changePasswordPage();

    // If user try to access invalid URL  
    } else {
        notFound();
    }
    ?>
</body>
</html>