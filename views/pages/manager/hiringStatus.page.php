<!-- localhost/manager.php?tab=job&section=hiring-status -->
<?php
include './views/components/BasicHeader.php';
basicHeader("Hiring Status");
?>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-4 ms-card ms-fill m-3">
            <div class="">
                <div class="ms-card-title">
                    <h2>Saved Later</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        Save recruitment notice to hire later
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=hiring-status&section=saved-later" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 ms-card ms-fill m-3">
            <div class="">
                <div class="ms-card-title">
                    <h2>Waiting from HQ</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        Wait the recruitment notice approved by HQ
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=hiring-status&section=waiting-from-hq" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-4 ms-card ms-fill m-3">
            <div class="">
                <div class="ms-card-title">
                    <h2>Posted Job</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        View the posted job to find a relevant candidate
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=hiring-status&section=posted-job" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 ms-card ms-fill m-3">
            <div class="">
                <div class="ms-card-title">
                    <h2>Interview Session</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        iew the posted job currently in interview session
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=hiring-status&section=interview-session" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-4 ms-card ms-fill m-3">
            <div class="">
                <div class="ms-card-title">
                    <h2>Done</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        The job that successfully hired a new employee
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=hiring-status&section=done" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 ms-card ms-fill m-3">
            <div class="">
                <div class="ms-card-title">
                    <h2>All</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        View all recruitment notice for all different statuses
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=hiring-status&section=all-notices" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section><br><br>