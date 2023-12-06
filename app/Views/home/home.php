<section id="main">
    <article class="row col-12">
        <div class="content_home col-12 justify-content-center align-items-center">
            <div class="title_home col-8">
                Wybierz do kogo i co wysłać
            </div>
            <div class="col-10 form_inside">
                <form action="<?= base_url('home/sendEmail') ?>" method="post">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Wyślij maila do wszystkich użytkowników</label>
                        </div>
                    </div>
                    <div class="form-group checks hidden">
                        <h5>Wybierz kryteria, według których chcesz wybrać odbiorców</h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="skills" value="skills">
                            <label class="form-check-label" for="skills">Umiejętności</label>
                        </div>
                        <br />
                        <?php
                        foreach ($categoriesTraining as $category) {
                            $no_space_category = str_replace(' ', '_', $category);
                        ?>
                            <div class="form-check form-check-inline hidden checkSkills">
                                <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> value=<?php echo $category ?>>
                                <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="trainings" value="trainings">
                            <label class="form-check-label" for="trainings">Odbyte szkolenia</label>
                        </div>
                        <br />
                        <?php
                        foreach ($categoriesSkill as $category) {
                            $no_space_category = str_replace(' ', '_', $category);
                        ?>
                            <div class="form-check form-check-inline hidden checkTrainings">
                                <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> value=<?php echo $category ?>>
                                <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="companies" value="companies">
                            <label class="form-check-label" for="companies">Firma</label>
                        </div>
                        <br />
                        <?php
                        foreach ($categoriesCompany as $category) {
                            $no_space_category = str_replace(' ', '_', $category);
                        ?>
                            <div class="form-check form-check-inline hidden checkCompanies">
                                <input class="form-check-input" type="checkbox" id=<?php echo $no_space_category ?> value=<?php echo $category ?>>
                                <label class="form-check-label" for=<?php echo $no_space_category ?>><?php echo $category ?></label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <h5><label for="subject" class="form-label" placeholder=<?php echo lang('Text.mail_subject_placeholder') ?>><?php echo lang('Text.mail_subject_label') ?> </label></h5>
                        <input type="text" class="form-control" name="subject">
                    </div>
                    <div class="form-group">
                        <h5><label for="notes" placeholder=<?php echo lang('Text.mail_content_placeholder') ?>><?php echo lang('Text.mail_content_label') ?></label></h5>
                        <textarea name="content" class="form-control" name="notes" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo lang('Text.mail_button_submit') ?></button>
                </form>
            </div>
        </div>
    </article>
</section>


<script>
    $(document).ready(function() {
        $('#flexSwitchCheckDefault').change(function() {
            if ($(this).is(':checked')) {
                $('.checks').slideUp();
            } else {
                $('.checks').slideDown();
            }
        });

        $('#skills').change(function() {
            if ($(this).is(':checked')) {
                $('.checkSkills').slideDown();
            } else {
                $('.checkSkills').slideUp();
            }
        });

        $('#trainings').change(function() {
            if ($(this).is(':checked')) {
                $('.checkTrainings').slideDown();
            } else {
                $('.checkTrainings').slideUp();
            }
        });

        $('#companies').change(function() {
            if ($(this).is(':checked')) {
                $('.checkCompanies').slideDown();
            } else {
                $('.checkCompanies').slideUp();
            }
        });
    });
</script>