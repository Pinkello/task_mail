</section>


<footer class="footer-copyright text-center py-3">
    <?php echo lang('Text.language') ?>:
    <a class="fi fi-gb" href="<?= site_url('lang/en') ?>" role="button"></a>
    <a class="fi fi-pl" href="<?= site_url('lang/pl') ?>" role="button"></a>
    &emsp;
    © 2023 Copyright:
    <a href="https://www.linkedin.com/in/piotr-pindel-a0358b187/"> Piotr Pindel</a>
</footer>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>


</body>

</html>