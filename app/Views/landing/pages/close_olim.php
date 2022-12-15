<?= $this->extend('landing/template/default') ?>

<?= $this->section('custom-css'); ?>
<link rel="stylesheet" href="../src/css/template/template.min.css">
<?= $this->endSection('custom-css'); ?>

<?= $this->section('content') ?>

<section class="relative container mx-auto pt-36 px-2 sm:px-16 mb-20">
  <img class="hidden lg:block absolute ml-auto bottom-0 -left-8" src="<?= base_url(); ?>/register/smoothcorner.png" alt="">
  <img class="absolute hidden lg:block top-[6%] left-[47%]" src="<?= base_url(); ?>/register/circle-star.png">

  <div class="flex justify-between gap-24">
    <div class="flex-1">
      <img class="w-full" src="<?= base_url(); ?>/register/time.png" alt="">
      <div class="font-bold text-3xl text-center mb-20">
        <p>Yah....</p>
        <p>Pendaftaran ditutup</p>
      </div>
    </div>
    <div class="hidden lg:block flex-1">
      <img class="w-full" src="<?= base_url(); ?>/register/hero-image.png" alt="">
    </div>
  </div>
</section>

<?= $this->endSection('content') ?>

<?= $this->section('custom-js') ?>
<script src="<?= base_url(); ?>/src/js/navbar/menu-initiator.js"></script>
<?= $this->endSection('custom-js') ?>