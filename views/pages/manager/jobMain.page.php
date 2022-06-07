<!-- localhost/manager.php?tab=job&section=main -->
<?php
include './views/components/BasicHeader.php';
basicHeader("Job");
?>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-4">
            <div class="ms-card ms-fill">
                <div class="ms-card-title">
                    <h2>New Notice</h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        Create a new job recruitment notice
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=job&section=new-notice" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="ms-card ms-fill">
                <div class="ms-card-title">
                    <h2>Hiring Status </h2>
                </div>
                <div class="ms-card-content">
                    <p>
                        View hiring status of the job recruitment
                    </p>
                </div>
                <div class="ms-card-btn">
                    <a href="/manager.php?tab=job&section=hiring-status" class="ms-btn ms-primary"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>