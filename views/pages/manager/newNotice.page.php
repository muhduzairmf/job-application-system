<!-- localhost/manager.php?tab=job&section=new-notice -->
<?php
include './views/components/BasicHeader.php';
basicHeader("New Recruitment Notice");

$newNotice_page = [
    "createNoticeStatus"=>"",
    "errorMsg"=>"",
    "designation"=>"",
    "department"=>"",
    "min_monthly_salary"=>"",
    "max_monthly_salary"=>"",
    "max_monthly_salary"=>"",
    "candidate_nationality"=>"",
    "candidate_min_edu_level"=>"",
    "candidate_min_of_exp"=>"",
    "candidate_lang_req"=>"",
    "candidate_other_req"=>"",
    "job_responsible"=>"",
    "other_info"=>"",
    "status_recruitment"=>""
];

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) && $_POST['submit'] == "Create_New_Notice") {

    include './controllers/ManagerController.php';
    $managerContr = new ManagerController();
    $newNotice_page = $managerContr->newNotice($newNotice_page);

}

?>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6">
            <br>
            <?php
            if (!empty($newNotice_page['createNoticeStatus'])) {
                ?>
                <div class="ms-alert ms-fullwidth ms-light ms-primary" x-data="{
                    displayError: true,
                    close() {
                        this.displayError = false;
                    }
                }" x-show="displayError">
                    <span class="ms-close" x-on:click="close()"></span>
                    <p>
                        <i class="bi bi-check2-square">&nbsp;&nbsp;</i><?php echo $newNotice_page['createNoticeStatus']; ?>
                    </p>
                </div><br><br>
                <div class="ms-form-group">
                    <a href="./manager.php?tab=job&section=new-notice" class="ms-btn ms-secondary">Create a new other notice</a>
                    <br><br>
                    <a href="./manager.php?tab=hiring-status&section=all-notices" class="ms-btn ms-primary">View the list of all job recruitment</a>
                </div>
                <?php
            } else {

                if (!empty($newNotice_page['errorMsg'])) {
                ?>
                <div class="ms-alert ms-fullwidth ms-light ms-primary" x-data="{
                    displayError: true,
                    close() {
                        this.displayError = false;
                    }
                }" x-show="displayError" x-transition.duration.500ms>
                    <span class="ms-close" x-on:click="close()"></span>
                    <p>
                        <i class="bi bi-exclamation-square">&nbsp;&nbsp;</i><?php echo $newNotice_page['errorMsg']; ?>
                    </p>
                </div>
                <?php
                }
                ?>
                <br>
                <form action="./manager.php?tab=job&section=new-notice" method="post" autocomplete="off">
                <div class="ms-form-group">
                    <label for="designation">Designation&nbsp;<span class="ms-text-action2">*</span></label>
                    <input type="text" name="designation" id="designation" value="<?php echo $newNotice_page['designation']; ?>">
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="department">Department&nbsp;<span class="ms-text-action2">*</span></label>
                    <input type="text" name="department" id="department" value="<?php echo $newNotice_page['department']; ?>">
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="min_monthly_salary">Minimum of monthly salary&nbsp;<span class="ms-text-action2">*</span></label>
                    <input type="number" name="min_monthly_salary" id="min_monthly_salary" max="50000" value="<?php echo $newNotice_page['min_monthly_salary']; ?>">
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="max_monthly_salary">Maximum of monthly salary&nbsp;<span class="ms-text-action2">*</span></label>
                    <input type="number" name="max_monthly_salary" id="max_monthly_salary" max="50000" value="<?php echo $newNotice_page['max_monthly_salary']; ?>">
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="candidate_nationality">Candidate Nationality&nbsp;<span class="ms-text-action2">*</span></label>
                    <input type="text" name="candidate_nationality" id="candidate_nationality" value="<?php echo $newNotice_page['candidate_nationality']; ?>">
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="candidate_min_edu_level">Minimum education level of candidate&nbsp;<span class="ms-text-action2">*</span></label>
                    <input type="text" name="candidate_min_edu_level" id="candidate_min_edu_level" value="<?php echo $newNotice_page['candidate_min_edu_level']; ?>">
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="candidate_min_of_exp">Minimum working experience of candidate&nbsp;<span class="ms-text-action2">*</span></label>
                    <select name="candidate_min_of_exp" id="candidate_min_of_exp">
                        <option value="">Choose an option</option>
                        <option value="0 year/Fresh Graduate">0 years/Fresh Graduate</option>
                        <option value="1 year">1 years</option>
                        <option value="2 years">2 years</option>
                        <option value="3 years">3 years</option>
                        <option value="4 years">4 years</option>
                        <option value="5 years">5 years</option>
                        <option value="10 years">10 years</option>
                    </select>
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="candidate_lang_req">Candidate language required&nbsp;<span class="ms-text-action2">*</span></label>
                    <textarea name="candidate_lang_req" id="candidate_lang_req" rows="5" style="resize: none;"><?php echo $newNotice_page['candidate_lang_req']; ?></textarea>
                </div>
                <br>
                <div class="ms-form-group">
                    <label for="candidate_other_req">Other requirement(s) for candidate</label>
                    <textarea name="candidate_other_req" id="candidate_other_req" rows="10" style="resize: none;"><?php echo $newNotice_page['candidate_other_req']; ?></textarea>
                </div>
                <div class="ms-form-group">
                    <label for="job_responsible">Job Resposibilities&nbsp;<span class="ms-text-action2">*</span></label>
                    <textarea name="job_responsible" id="job_responsible" rows="10" style="resize: none;"><?php echo $newNotice_page['job_responsible']; ?></textarea>
                </div>
                <div class="ms-form-group">
                    <label for="other_info">Other information</label>
                    <textarea name="other_info" id="other_info" rows="10" style="resize: none;"><?php echo $newNotice_page['other_info']; ?></textarea>
                </div>
                <div class="ms-form-group">
                    <label for="status_recruitment">Status of recruitment&nbsp;<span class="ms-text-action2">*</span></label>
                    <select name="status_recruitment" id="status_recruitment">
                        <option value="">Choose an option</option>
                        <option value="5">Save recruitment notice later.</option>
                        <option value="1">Submit to HR to proceed approval from HQ</option>
                    </select>
                </div>
                <br>
                <div class="ms-form-group ms-float-right">
                    <button type="submit" name="submit" value="Create_New_Notice" class="ms-btn ms-primary ">Proceed</button>
                    <a href="./manager.php?tab=job&section=main" class="ms-btn ms-secondary">Cancel</a>
                </div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</section><br><br>