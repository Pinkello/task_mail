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
    <title><?= esc($title) ?></title>

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
                <a href=<?= base_url('/startingPage') ?>>Strona Domowa</a>
                <a href="https://github.com/Pinkello">Github</a>
                <a href="https://www.linkedin.com/in/piotr-pindel-a0358b187/">LinkedIn</a>
                <a href="https://www.cyfronet.com/">Link</a>
                <a href=<?= base_url('/logout') ?>>Wyloguj się</a>
            <?php } else { ?>
                <a href=<?= base_url('/startingPage') ?>>Strona Domowa</a>
                <a class="soloLogin" href=<?= base_url('/login') ?>>Zaloguj się</a>
            <?php } ?>

        </div>