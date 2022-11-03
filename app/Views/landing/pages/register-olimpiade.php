<?= $this->extend('landing/template/default') ?>

<?= $this->section('content') ?>

<section class="relative container mx-auto pt-36 px-2 sm:px-16">
  <img class="hidden lg:block absolute ml-auto bottom-0 -left-8" src="register/smoothcorner.png" alt="">
  <div class="flex justify-between gap-24">
    <form class="flex-1 mt-8" action="<?= base_url() ?>/verify-regis-olim" method="POST" enctype="multipart/form-data">
      <img class="hidden lg:block  ml-auto" src="register/circle-star.png" alt="">
      <p class="text-4xl md:text-5xl lg:text-6xl font-bold text-4xl ">Register Olimpiade &#128513;</p>
      <p class="text-xl mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <label for="tim_nama" class="block mt-16">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Nama Tim</span>
        <input type="text" id="tim_nama" name="tim_nama" value="<?= old('tim_nama') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input nama tim kamu ya" />
        <span class="text-red-700"><?= $validation->getError('tim_nama') ?></span>
      </label>
      <label for="bukti_bayar" class="block mt-8">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Bukti Pembayaran</span>
        <input type="file" id="bukti_bayar" name="bukti_bayar" value="<?= old('bukti_bayar') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
        <span class="text-red-700"><?= $validation->getError('bukti_bayar') ?></span>
      </label>
  
      <p class="text-2xl font-bold mt-16">Ketua Tim</p>
      <label for="nama_ketua" class="block mt-8">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Nama Ketua</span>
        <input type="text" id="nama_ketua" name="nama_ketua" value="<?= old('nama_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input nama ketua tim kamu ya"/>
        <span class="text-red-700"><?= $validation->getError('nama_ketua') ?></span>
      </label>
      <label for="nisn_ketua" class="block mt-8">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">NISN Ketua</span>
        <input type="text" id="nisn_ketua" name="nisn_ketua" value="<?= old('nisn_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input NISN ketuanya ya"/>
        <span class="text-red-700"><?= $validation->getError('nisn_ketua') ?></span>
      </label>
      <label for="email_ketua" class="block mt-8">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Email Ketua</span>
        <input type="email" id="email_ketua" name="email_ketua" value="<?= old('email_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input juga dong emailnya"/>
        <span class="text-red-700"><?= $validation->getError('email_ketua') ?></span>
      </label>
      <button type="submit" class="mt-16 py-2 bg-[#339969] border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-2xl sm:text-lg focus:ring-1 font-bold text-white">Register</button>
    </form>
    <div class="hidden lg:block flex-1">
      <img class="w-full" src="register/hero-image.png" alt="">
    </div>
  </div>
</section>

<?= $this->endSection('content') ?>

<?= $this->section('custom-js') ?>
<script src="src/js/navbar/menu-initiator.js"></script>
<?= $this->endSection('custom-js') ?>