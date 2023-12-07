<div class="row gx-0 justify-content-center align-items-center ">
    <div class="col-5 ">
        <h4 class="titleLogin">Logowanie do systemu Mailer </h4>
        <hr />
        <br />

        <form id="form_login" action="<?= base_url('login/check') ?>" method="post" autocomplete="off">
            <?= csrf_field(); ?>
            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif ?>


            <div class="form-group">
                <h5><label for="email"><?php echo lang('Text.email_title') ?></label></h5>
                <input type="text" id="email" class="form-control" name="email" placeholder="<?php echo lang('Text.email_placeholder') ?>" value="<?= set_value('email'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : ''  ?></span>
            </div>
            <div class="form-group">
                <h5><label for="password"><?php echo lang('Text.password_title') ?></label></h5>
                <input type="password" id="password" class="form-control" name="password" placeholder="<?php echo lang('Text.password_placeholder') ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : ''  ?></span>
            </div>
            <div class="d-grid gap-2 mx-auto">
                <button class="btn btn-primary" type="submit"><?php echo lang('Text.login_button_submit') ?></button>
            </div>
        </form>
    </div>
    <div class="col-4 imgContainer offset-1">
        <img id="login" src="<?= base_url() ?>/assets/img/photo.jpg" height="400" width="500" class="hidden">
    </div>
</div>