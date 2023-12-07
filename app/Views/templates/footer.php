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

</body>

</html>