<section id="main">
    <form action="<?= base_url('home/sendEmail') ?>" method="post">
        <div class="mb-3">
            <label for="subject" class="form-label" placeholder=<?php echo lang('Text.mail_subject_placeholder') ?>><?php echo lang('Text.mail_subject_label') ?> </label>
            <input type="text" class="form-control" name="subject">
        </div>
        <h6><label for="notes" placeholder=<?php echo lang('Text.mail_content_placeholder') ?>><?php echo lang('Text.mail_content_label') ?></label></h6>
        <textarea name="content" style="color: black; font-size:20px; width:99%;" class="form-control" name="notes" rows="5"></textarea>

        <button type="submit" class="btn btn-primary"><?php echo lang('Text.mail_button_submit') ?></button>
    </form>
</section>