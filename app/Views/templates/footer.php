</section>


<footer class="footer-copyright text-center py-3">
    <?php echo lang('Text.language') ?>:
    <a class="fi fi-gb" href="<?= site_url('lang/en') ?>" role="button"></a>
    <a class="fi fi-pl" href="<?= site_url('lang/pl') ?>" role="button"></a>
    &emsp;
    © 2023 Copyright:
    <a href="https://www.linkedin.com/in/piotr-pindel-a0358b187/"> Piotr Pindel</a>
</footer>


<?php if (session()->has('success_message')) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wyświetl toast po załadowaniu strony
            var toast = new bootstrap.Toast(document.getElementById('myToast'));
            toast.show();
        });
    </script>
<?php } ?>

<div class="toast-container position-fixed top-10 end-0 p-5">
    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto"><?php echo lang('Text.toast_error') ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body"></div>
    </div>
</div>
<div class="toast-container position-fixed top-10 end-0 p-5">
    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto"><?php echo lang('Text.toast_success') ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo lang('Text.toast_mailsent') ?>

        </div>
    </div>
</div>

</body>

</html>