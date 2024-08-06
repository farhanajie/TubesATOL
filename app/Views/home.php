<?= $this->extend('_partials/default') ?>

<?= $this->section('content') ?>
<?php echo session()->get('username') ?>
<?= $this->endSection() ?>