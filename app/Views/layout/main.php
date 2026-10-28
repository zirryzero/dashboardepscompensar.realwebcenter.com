<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('/assets/img/favicon.ico') ?>">

</head>

<?php $sidebar = session('sidebar') ? '' : 'sidenav-toggled'; ?>

<body class="nav-fixed <?= $sidebar ?>">

    <?php
    if (true) {
        echo $this->include('layout/header');
    }
    ?>
    <?= $this->include($content); ?>
    <?= $this->include('layout/footer'); ?>

    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- prueba -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>

</body>

</html>