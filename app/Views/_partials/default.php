<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Database</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap-5/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/DataTables/css/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/select2/css/select2-bootstrap-5-theme.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/style.css') ?>">
    <!-- JS -->
    <script src="https://kit.fontawesome.com/7cb7403d65.js" crossorigin="anonymous"></script>
    <script data-navigate-once src="<?= base_url('vendor/jquery/js/jquery-3.7.1.min.js') ?>"></script>
    <script data-navigate-once src="<?= base_url('vendor/bootstrap-5/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('vendor/moment/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('vendor/DataTables/js/datatables.min.js') ?>"></script>
    <script src="<?= base_url('vendor/select2/js/select2.min.js') ?>"></script>
</head>
<body>
    <?= $this->include('_partials/navbar') ?>
    <main class="container-fluid">
        <?= $this->renderSection('content'); ?>
    </main>
</body>
</html>