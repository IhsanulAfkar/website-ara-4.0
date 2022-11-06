<?= $this->extend('landing/template/default'); ?>

<?= $this->section('custom-css'); ?>
<link rel="stylesheet" href="./public/src/css/error404/output.css">
<?= $this->endSection('custom-css'); ?>

<?= $this->section('content') ?>

<?= $this->include("landing/component/error404/errorpage"); ?>

<?= $this->endSection('content') ?>
<?= $this->section('custom-js') ?>
<script src="src/js/navbar/menu-initiator.js"></script>
<?= $this->endSection('custom-js') ?>
