<!-- localhost/manager.php?tab=hiring-status&section=saved-later -->
<?php
include_once './views/components/BasicHeader.php';
include_once './controllers/ManagerController.php';

basicHeader("Hiring Status : Saved Later");

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    $managerContr = new ManagerController();
    $result = $managerContr->savedLater();
    
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $managerContr = new ManagerController();

    if (isset($_POST['Update_Current_Notice_Id'])) {
        $msg = $managerContr->update_savedLater();
        $result = $managerContr->savedLater();
    } else if (isset($_POST['Delete_Notice_Id'])) {
        $msg = $managerContr->delete_savedLater();
        $result = $managerContr->savedLater();
    }

}
?>
<style>
    .hover-blue:hover {
        border-color: rgb(70, 140, 180);
    }
</style>
<?php
if (!empty($msg)) {
    ?>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="ms-alert ms-fullwidth ms-light ms-primary" x-data="{
                    displayError: true,
                    close() {
                        this.displayError = false;
                    }
                }" x-show="displayError" x-transition.duration.500ms>
                    <span class="ms-close" x-on:click="close()"></span>
                    <p>
                        <i class="bi bi-exclamation-square">&nbsp;&nbsp;</i><?php echo $msg; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php
}

if ($result->num_rows > 0) {

    while ($job = $result->fetch_assoc()) {
    ?>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="ms-card ms-border ms-primary hover-blue">
                    <h3><?php echo $job['designation']; ?></h3>
                    <p><?php echo $job['last_modified_date']; ?></p>
                    <div x-data="{
                        openDetails: false,
                        classToggler: 'bi bi-chevron-down',
                        toggleDetails() {
                            this.openDetails = ! this.openDetails;
                            if (this.openDetails === true) {
                                this.classToggler = 'bi bi-chevron-up';
                            } else {
                                this.classToggler = 'bi bi-chevron-down';
                            }
                        },
                        openDesc: true,
                        openUpdateForm: false,
                        toggleUpdateForm() {
                            this.openUpdateForm = ! this.openUpdateForm;
                            this.openDesc = ! this.openDesc;
                        }
                    }">
                        <div x-show="openDetails" x-transition.duration.200ms>
                        <div class="p-4" x-show="openDesc"  x-transition.duration.200ms>
                            <h5>Designation</h5>
                            <p><?php echo $job['designation']; ?></p>
                            <h5>Department</h5>
                            <p><?php echo $job['department']; ?></p>
                            <h5>Minimum of monthly salary</h5>
                            <p><?php echo $job['min_monthly_salary']; ?></p>
                            <h5>Maximum of monthly salaary</h5>
                            <p><?php echo $job['max_monthly_salary']; ?></p>
                            <h5>Candidate nationality</h5>
                            <p><?php echo $job['candidate_nationality']; ?></p>
                            <h5>Minimum education level for candidate</h5>
                            <p><?php echo $job['candidate_min_edu_level']; ?></p>
                            <h5>Minimum year of experience for candidate</h5>
                            <p><?php echo $job['candidate_min_of_exp']; ?></p>
                            <h5>Language requirement for candidate</h5>
                            <p><?php echo $job['candidate_lang_req']; ?></p>
                            <h5>Other requirements</h5>
                            <p><?php echo (empty($job['candidate_other_req'])) ? "-" : $job['candidate_other_req']; ?></p>
                            <h5>Job responsibilities</h5>
                            <p><?php echo $job['job_responsibilities']; ?></p>
                            <h5>Other info</h5>
                            <p><?php echo (empty($job['other_info'])) ? "-" : $job['other_info']; ?></p>
                            <h5>Recruiment status</h5>
                            <p><?php echo $managerContr->savedLater_recruitStatus((int)$job['recruitment_status_id']); ?></p>
                            <div class="ms-form-group ms-float-right"><button class="ms-primary" x-on:click="toggleUpdateForm()">Update</button>&nbsp;<form method="post" action="./manager.php?tab=hiring-status&section=saved-later" style="display:inline-block;"><button class="ms-secondary" type="submit" name="Delete_Notice_Id" value="<?php echo $job['id']; ?>">Delete</button></form></div>
                            <br><br>
                        </div>
                        <div class="p-4" x-show="openUpdateForm" x-transition.duration.200ms>
                            <form action="./manager.php?tab=hiring-status&section=saved-later" method="post" autocomplete="off">
                            <div class="ms-form-group">
                                <label for="designation">Designation&nbsp;<span class="ms-text-action2">*</span></label>
                                <input type="text" name="designation" id="designation" value="<?php echo $job['designation']; ?>" required>
                            </div>
                            <br>
                            <br>
                            <div class="ms-form-group">
                                <label for="department">Department&nbsp;<span class="ms-text-action2">*</span></label>
                                <input type="text" name="department" id="department" value="<?php echo $job['department']; ?>" required>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="min_monthly_salary">Minimum of monthly salary&nbsp;<span class="ms-text-action2">*</span></label>
                                <input type="number" name="min_monthly_salary" id="min_monthly_salary" max="50000" value="<?php echo $job['min_monthly_salary']; ?>" required>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="max_monthly_salary">Maximum of monthly salary&nbsp;<span class="ms-text-action2">*</span></label>
                                <input type="number" name="max_monthly_salary" id="max_monthly_salary" max="50000" value="<?php echo $job['max_monthly_salary']; ?>" required>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="candidate_nationality">Candidate Nationality&nbsp;<span class="ms-text-action2">*</span></label>
                                <input type="text" name="candidate_nationality" id="candidate_nationality" value="<?php echo $job['candidate_nationality']; ?>" required>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="candidate_min_edu_level">Minimum education level of candidate&nbsp;<span class="ms-text-action2">*</span></label>
                                <input type="text" name="candidate_min_edu_level" id="candidate_min_edu_level" value="<?php echo $job['candidate_min_edu_level']; ?>" required>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="candidate_min_of_exp">Minimum working experience of candidate&nbsp;<span class="ms-text-action2">*</span></label>
                                <select name="candidate_min_of_exp" id="candidate_min_of_exp" required>
                                    <option value="0 year/Fresh Graduate" <?php echo ($job['candidate_min_of_exp'] == "0 year/Fresh Graduate") ? "selected" : ""; ?>>0 years/Fresh Graduate</option>
                                    <option value="1 year" <?php echo ($job['candidate_min_of_exp'] == "1 year") ? "selected" : ""; ?>>1 years</option>
                                    <option value="2 years" <?php echo ($job['candidate_min_of_exp'] == "2 years") ? "selected" : ""; ?>>2 years</option>
                                    <option value="3 years" <?php echo ($job['candidate_min_of_exp'] == "3 years") ? "selected" : ""; ?>>3 years</option>
                                    <option value="4 years" <?php echo ($job['candidate_min_of_exp'] == "4 years") ? "selected" : ""; ?>>4 years</option>
                                    <option value="5 years" <?php echo ($job['candidate_min_of_exp'] == "5 years") ? "selected" : ""; ?>>5 years</option>
                                    <option value="10 years" <?php echo ($job['candidate_min_of_exp'] == "10 years") ? "selected" : ""; ?>>10 years</option>
                                </select>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="candidate_lang_req">Candidate language required&nbsp;<span class="ms-text-action2">*</span></label>
                                <textarea name="candidate_lang_req" id="candidate_lang_req" rows="5" style="resize: none;" required><?php echo $job['candidate_lang_req']; ?></textarea>
                            </div>
                            <br>
                            <div class="ms-form-group">
                                <label for="candidate_other_req">Other requirement(s) for candidate</label>
                                <textarea name="candidate_other_req" id="candidate_other_req" rows="10" style="resize: none;"><?php echo $job['candidate_other_req']; ?></textarea>
                            </div>
                            <div class="ms-form-group">
                                <label for="job_responsible">Job Resposibilities&nbsp;<span class="ms-text-action2">*</span></label>
                                <textarea name="job_responsible" id="job_responsible" rows="10" style="resize: none;" required><?php echo $job['job_responsibilities']; ?></textarea>
                            </div>
                            <div class="ms-form-group">
                                <label for="other_info">Other information</label>
                                <textarea name="other_info" id="other_info" rows="10" style="resize: none;"><?php echo $job['other_info']; ?></textarea>
                            </div>
                            <div class="ms-form-group">
                                <label for="status_recruitment">Status of recruitment&nbsp;<span class="ms-text-action2">*</span></label>
                                <select name="status_recruitment" id="status_recruitment" required>
                                    <option value="1" <?php echo ($job['recruitment_status_id'] == "1") ? "selected" : ""; ?>>Save recruitment notice later.</option>
                                    <option value="2" <?php echo ($job['recruitment_status_id'] == "2") ? "selected" : ""; ?>>Submit to HR to proceed approval from HQ</option>
                                </select>
                            </div>
                            <br>
                            <div class="ms-form-group ms-float-right">
                                <button type="submit" name="Update_Current_Notice_Id" value="<?php echo $job['id']; ?>" class="ms-btn ms-primary ">Proceed</button>
                                <button class="ms-secondary" type="button" x-on:click="toggleUpdateForm()">Cancel</button>
                            </div><br><br>
                            </form>
                        </div>
                        </div>
                        <hr style="background-color: rgb(230,230,230); height:3px;">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <p style="cursor:pointer;" x-on:click="toggleDetails()"><i x-bind:class="classToggler"></i></p>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <?php
    }

} else {
    ?>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="ms-card ms-border ms-primary hover-blue">
                    <h3>No saved later here...</h3>
                </div>
            </div>
        </div>
    </section>
    <?php
}
