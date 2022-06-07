<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/minstyle.io.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="./static/js/alpine.min.js" defer></script>
    <title>Applicant | HIS Job Application System</title>
</head>
<body>
    <?php
    include './views/components/NavApplicant.php';
    include './views/components/NotFound.php';
    include './views/ApplicantUI.php';
    include './auth/ProtectRoute.auth.php';

    // error_reporting(0);

    $protectApplicant = new ProtectRoute();
    $protectApplicant->validateApplicant();

    // Render Navbar for applicant.php
    navApplicant();



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
    // For example: localhost/applicant.php
    if (empty($_GET['tab']) || empty($_GET['section'])) {
        notFound();
        return;
    }

    // URL: localhost/applicant.php?tab=home&section=main
    if ($_GET['tab'] == 'home' && $_GET['section'] == 'main') {
        $applicantUI = new ApplicantUI();
        $applicantUI->homePage();

    // URL: localhost/applicant.php?tab=job&section=main
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'main') {
        $applicantUI = new ApplicantUI();
        $applicantUI->jobMainPage();

    // URL: localhost/applicant.php?tab=job&section=job-posting
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'job-posting') {
        $applicantUI = new ApplicantUI();
        $applicantUI->jobPostingPage();

    // URL: localhost/applicant.php?tab=job-posting&section={job_id}
    } else if ($_GET['tab'] == 'job-posting' && !empty($_GET['section'])) {
        $applicantUI = new ApplicantUI();
        $applicantUI->postingJobIdPage();

    // URL: localhost/applicant.php?tab=job&section=applied-job
    } else if ($_GET['tab'] == 'job' && $_GET['section'] == 'applied-job') {
        $applicantUI = new ApplicantUI();
        $applicantUI->appliedJobPage();
    
    // URL: localhost/applicant.php?tab=applied-job&section={job_id}
    } else if ($_GET['tab'] == 'applied-job' && !empty($_GET['section'])) {
        $applicantUI = new ApplicantUI();
        $applicantUI->appliedJobIdPage();

    // URL: localhost/applicant.php?tab=message&section=main
    } else if ($_GET['tab'] == 'message' && $_GET['section'] == 'main') {
        $applicantUI = new ApplicantUI();
        $applicantUI->messageMainPage();

    // URL: localhost/applicant.php?tab=message&section={user_id}
    } else if ($_GET['tab'] == 'message' && !empty($_GET['section'])) {
        $applicantUI = new ApplicantUI();
        $applicantUI->messageUserId();

    // URL: localhost/applicant.php?tab=profile&section=user-detail
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'user-detail') {
        $applicantUI = new ApplicantUI();
        $applicantUI->profileUserDetailPage();

    // URL: localhost/applicant.php?tab=profile&section=education
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'education') {
        $applicantUI = new ApplicantUI();
        $applicantUI->profileEducationPage();

    // URL: localhost/applicant.php?tab=profile&section=experience
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'experience') {
        $applicantUI = new ApplicantUI();
        $applicantUI->profileExperiencePage();

    // URL: localhost/applicant.php?tab=profile&section=language
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'language') {
        $applicantUI = new ApplicantUI();
        $applicantUI->profileLanguagePage();

    // URL: localhost/applicant.php?tab=profile&section=resume
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'resume') {
        $applicantUI = new ApplicantUI();
        $applicantUI->profileResumePage();
    
    // URL: localhost/applicant.php?tab=profile&section=skill
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'skill') {
        $applicantUI = new ApplicantUI();
        $applicantUI->profileSkillPage();

    // URL: localhost/applicant.php?tab=profile&section=change-password
    } else if ($_GET['tab'] == 'profile' && $_GET['section'] == 'change-password') {
        $applicantUI = new ApplicantUI();
        $applicantUI->changePasswordPage();

    // If user try to access invalid URL
    } else {
        notFound();
    }
    ?>

    <br>
</body>
</html>