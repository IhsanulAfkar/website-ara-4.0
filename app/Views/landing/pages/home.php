<?= $this->extend('landing/template/default'); ?>

<?= $this->section('custom-css'); ?>
<link rel="stylesheet" href="src/css/home/home.css">
<?= $this->endSection('custom-css'); ?>

<?= $this->section('content') ?>

<?= $this->include("landing/component/home/about_ara"); ?>
<?= $this->include("landing/component/home/activities"); ?>
<?= $this->include("landing/component/home/hmit"); ?>
<?= $this->include("landing/component/sponsor"); ?>
<?= $this->include("landing/component/media-partner"); ?>

<?= $this->endSection('content') ?>
<?= $this->section('custom-js') ?>
<script src="src/js/navbar/menu-initiator.js"></script>
<?= $this->endSection('custom-js') ?>