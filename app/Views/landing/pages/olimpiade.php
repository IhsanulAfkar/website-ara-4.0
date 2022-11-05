<?= $this->extend('landing/template/default') ?>
<?= $this->section('custom-css') ?>
<!-- Local tailwindcss -->
<link rel="stylesheet" href="src/css/template/template.css">
<?= $this->endSection('custom-css') ?>
<?= $this->section('content') ?>

<?= $this->include("landing/component/header_event"); ?>

<?= $this->include("landing/component/countdown"); ?>

<?= $this->include("landing/component/who_can_join"); ?>

<?= $this->include("landing/component/timeline"); ?>

<?= $this->include("landing/component/prize"); ?>

<?= $this->include("landing/component/faq"); ?>

<?= $this->include("landing/component/contact-person"); ?>

<?= $this->include("landing/component/sponsor"); ?>

<?= $this->include("landing/component/media-partner"); ?>

<?= $this->endSection('content') ?>

<?= $this->section('custom-js') ?>
<script src="src/js/navbar/menu-initiator.js"></script>
<script src="src/js/navbar/countdown.js"></script>
<?= $this->endSection('custom-js') ?>