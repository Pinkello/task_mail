<section id="main" class="col-12">
    <article class="row col-12">
        <div class="content_home col-10 offset-1 align-items-center">
            <div class="title_home col-8">
                <?php echo lang('Text.homePage_title') ?>
            </div>
            </br>
            <div class="col-10 form_inside">
                <form id="myForm" action="<?= base_url('home/sendEmail') ?>" method="post">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="flexSwitchCheckDefault" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                <h5><b>
                                        <?php echo lang('Text.homePage_sendtoall') ?>
                                    </b></h5>
                            </label>
                        </div>
                    </div>

                    <div class="form-group checks hidden">
                        <h5>
                            <?php echo lang('Text.homePage_cryteria') ?>
                        </h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="skills" name="skills" value="skills">
                            <label class="form-check-label" for="skills">
                                <h6><i><strong><?php echo lang('Text.homePage_skills') ?></strong></i></h6>
                            </label>
                        </div>
                        <br />
                        <?php
                        foreach ($categoriesSkill as $category) {
                            $no_space_category = str_replace(' ', '_', $category);
                        ?>
                            <div class="form-check form-check-inline hidden checkSkills ">
                                <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> name=<?php echo $no_space_category ?> value=<?php echo $no_space_category ?>>
                                <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                            </div>
                        <?php
                        }
                        ?>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="trainings" name="trainings" value="trainings">
                            <label class="form-check-label" for="trainings">
                                <h6><i><strong><?php echo lang('Text.homePage_trainings') ?></strong></i></h6>
                            </label>
                        </div>
                        <br />
                        <?php
                        foreach ($categoriesTraining as $category) {
                            $no_space_category = str_replace(' ', '_', $category);
                        ?>
                            <div class="form-check form-check-inline hidden checkTrainings">
                                <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> name=<?php echo $no_space_category ?> value=<?php echo $no_space_category ?>>
                                <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                            </div>
                        <?php
                        }
                        ?>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="companies" name="companies" value="companies">
                            <label class="form-check-label" for="companies">
                                <h6><i><strong><?php echo lang('Text.homePage_companddep') ?></strong></i></h6>
                            </label>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <?php
                                foreach ($categoriesCompany as $category) {
                                    $no_space_category = str_replace(' ', '_', $category);
                                ?>
                                    <div class="form-check form-check-inline hidden checkCompanies">
                                        <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> name=<?php echo $no_space_category ?> value=<?php echo $no_space_category ?>>
                                        <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-6">
                                <?php
                                foreach ($categoriesDepartment as $category) {
                                    $no_space_category = str_replace(' ', '_', $category);
                                ?>
                                    <div class="form-check form-check-inline hidden checkDepartments">
                                        <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> name=<?php echo $no_space_category ?> value=<?php echo $no_space_category ?>>
                                        <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br />
                    </div>
                    <div class="form-group">
                        <h5><label for="subject" class="form-label"><?php echo lang('Text.mail_subject_label') ?> </label></h5>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="form-group">
                        <h5><label for="notes"><?php echo lang('Text.mail_content_label') ?></label></h5>
                        <textarea name="content" class="form-control" name="notes" id="notes" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="database_data" name="database_data">
                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                <h5><b> <?php echo lang('Text.homePage_databaseDataAdd') ?></b></h5>
                            </label>
                        </div>
                    </div>
                    <div class="form-group buttons_database hidden col-12">
                        <h5>
                            <?php echo lang('Text.homePage_databaseData') ?>
                        </h5>
                        <br />
                        <?php
                        if (isset($_SESSION['person_info']) && is_array($_SESSION['person_info'])) {
                            foreach ($_SESSION['person_info'] as $key => $value) {
                                if ($key != 'person_id' && $key != 'password') {
                        ?>
                                    <div class="form-check databaseButtons form-check-inline">
                                        <a href="#" class="btn css-button-rounded--blue add-to-textarea" role="button" data-value="<?php echo $value ?>">
                                            <strong><?php echo $key ?></strong>: <?php echo $value ?>
                                        </a>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <br />
                    <button type="button" id="submitBtn" class="btn btn-primary"><?php echo lang('Text.mail_button_submit') ?></button>
                </form>
            </div>
        </div>


    </article>
</section>