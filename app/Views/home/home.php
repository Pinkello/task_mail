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
                    <div class="form-group checks">
                        <h5>Wybierz kryteria, według których chcesz wybrać odbiorców</h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Umiejętności</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Odbyte szkolenia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                            <label class="form-check-label" for="inlineCheckbox3">Firma</label>
                        </div>
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
    });
</script>