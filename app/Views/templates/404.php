<?php

use CodeIgniter\Config\Services;

$session = session();

// Pobranie serwisu autentykacji
$authentication = Services::authentication(); ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Błąd</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
            <div class="container-fluid">
                <button class="nav-button" onclick="openNav()">☰</button>
                <a class=" navbar-brand" href="#">Mailer</a>

            </div>
        </nav>
    </header>

    <section class="main-content">

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <?php if ($session->has('person')) { ?>
                <a href=<?= base_url('/startingPage') ?>> <?php echo lang('Text.header_homepage') ?></a>
                <a href="https://github.com/Pinkello">Github</a>
                <a href="https://www.linkedin.com/in/piotr-pindel-a0358b187/">LinkedIn</a>
                <a href="https://www.cyfronet.com/">Link</a>
                <a href=<?= base_url('/logout') ?>><?php echo lang('Text.header_logout') ?></a>
            <?php } else { ?>
                <a href=<?= base_url('/startingPage') ?>> <?php echo lang('Text.header_homepage') ?></a>
                <a class="soloLogin" href=<?= base_url('/login') ?>><?php echo lang('Text.header_login') ?></a>
            <?php } ?>

        </div>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="main col-10 col-10 col-offset-1">
                    <br />
                    <div class="title">
                        <p> ERROR 404</p>
                        <p>
                        <h4 style="margin-bottom:40px;"><?php echo lang('Text.errorPage_notfound') ?></h4>
                        </p>

                    </div>
                    <hr>

                </div>
            </div>
        </div>

    </section>


    <footer class="footer-copyright text-center py-3">
        <?php echo lang('Text.language') ?>:
        <a class="fi fi-gb" href="<?= site_url('lang/en') ?>" role="button"></a>
        <a class="fi fi-pl" href="<?= site_url('lang/pl') ?>" role="button"></a>
        &emsp;
        © 2023 Copyright:
        <a href="https://www.linkedin.com/in/piotr-pindel-a0358b187/"> Piotr Pindel</a>
    </footer>


</body>

</html>