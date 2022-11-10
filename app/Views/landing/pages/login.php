<?= $this->extend('landing/template/default'); ?>

<?= $this->section('custom-css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/src/css/template/template.css">
<?= $this->endSection('custom-css'); ?>

<?= $this->section('content'); ?>
<!-- Login -->

<section class="relative container mx-auto pt-36 px-2 sm:px-16 mb-20">
  <img class="hidden lg:block absolute ml-auto bottom-0 -left-8" src="<?= base_url(); ?>/register/smoothcorner.png" alt="">
  <img class="absolute hidden lg:block top-[11%] left-[47%]" src="<?= base_url(); ?>/register/circle-star.png">

  <div class="flex justify-between gap-24">
    <form class="flex-1 mt-8" action="#" method="POST" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <div class="flex justify-between">
        <p class="text-4xl md:text-5xl lg:text-6xl font-bold flex-none ">Login &#128513;</p>
        <div class="flex-auto px-2 lg:px-0 lg:pl-4">
          <img src="<?= base_url(); ?>/login/arrow.png" class="mr-auto w-full">
        </div>
      </div>
      <p class="text-xl mt-4">Silahkan isi username dan password untuk login</p>
      <label for="username" class="block mt-16">
        <span class="block text-sm font-bold text-slate-700">Username</span>
        <input type="text" id="username" name="username" value="" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input username kamu ya" />
        <span class="text-red-700"><?= $validation->getError('username') ?></span>
      </label>
      <label for="password" class="block mt-8">
        <span class="block text-sm font-bold text-slate-700">Password</span>
        <input type="password" id="password" name="password" value="" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input passwordnya juga dong" />
        <span class="text-red-700"><?= $validation->getError('password') ?></span>
      </label>
      <button disabled type="submit" class="mt-16 py-2 bg-gray-400 border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-xl sm:text-lg focus:ring-1 font-bold text-white">Login</button>
    </form>
    <div class="hidden lg:block flex-1">
      <img class="w-full" src="<?= base_url(); ?>/register/hero-image.png" alt="">
    </div>
  </div>
</section>
<?= $this->endSection('content'); ?>
<?= $this->section('custom-js') ?>
<script src="<?= base_url(); ?>/src/js/navbar/menu-initiator.js"></script>
<?= $this->endSection('custom-js') ?>