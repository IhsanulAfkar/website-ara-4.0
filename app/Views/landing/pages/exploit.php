<?= $this->extend('landing/template/default'); ?>

<?= $this->section('custom-css'); ?>
<link rel="stylesheet" href="src/css/template/template.css">
<?= $this->endSection('custom-css'); ?>

<?= $this->section('content') ?>

<?= $this->include("landing/component/countdown"); ?>

<?= $this->endSection('content') ?>
<?= $this->section('custom-js') ?>
<script src="src/js/navbar/menu-initiator.js"></script>
<?= $this->endSection('custom-js') ?>