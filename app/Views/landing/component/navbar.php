<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="py-4 bg-white border-b-2 border-black sm:px-16 fixed inset-x-0 top-0 z-50">
  <div class="container px-2 mx-auto flex justify-between items-center">
    <div class="flex items-center gap-16">
      <a href="<?= base_url(); ?>" class="w-8">
        <img class="w-full" src="<?= base_url(); ?>/global/icon/logo_ara.svg" alt="">
      </a>
      <div class="hidden lg:flex gap-8 font-bold text-lg">
        <a id="home_nav" class="block" href="<?= base_url(); ?>">Home</a>
        <a id="about_nav" class="block" href="<?= base_url(); ?>/ara">About</a>
        <a id="olimpiade_nav" class="block " href="<?= base_url(); ?>/olimpiade">Olimpiade</a>
        <a id="ctf_nav" class="block" href="<?= base_url(); ?>/ctf">CTF</a>
        <a id="exploit_nav" class="block" href="<?= base_url(); ?>/exploit">ExploIT</a>
        <!-- <a id="hmit_nav" class="block" href="<?= base_url(); ?>/hmit">HMIT</a> -->
      </div>
    </div>
    <div class="hidden lg:flex gap-8 font-bold text-lg items-center">
      <a class="block" href="<?= base_url(); ?>/auth/login">Login</a>
      <div class="group relative pb-1">
        <a href="#" class="block text-center bg-yellow-500 font-bold py-1 px-4 border-4 border-black">Daftar</a>
        <div class="hidden group-hover:block absolute right-0 top-12 bg-yellow-500 rounded-lg">
          <a class="block hover:text-white py-2 px-4" href="<?= base_url(); ?>/register/olimpiade">Olimpiade</a>
          <!-- <a class="block hover:text-white py-2 px-4" href="#">CTF</a>
          <a class="block hover:text-white py-2 px-4" href="#">ExploIT</a> -->
        </div>
      </div>
    </div>
    <div id="open-menu-button" class="block lg:hidden text-3xl px-2 py-1 bg-yellow-500 border-2 border-black">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</nav>

<!-- Menu Navbar -->
<div id="menu-list" class="hidden relative">
  <div class="fixed inset-0 bg-white z-50 p-4">
    <div class="flex items-center justify-between">
      <div class="w-10">
        <img class="w-full" src="<?= base_url(); ?>/global/icon/fire.svg" alt="">
      </div>
      <div id="close-menu-button" class="w-12">
        <img class="w-full" src="<?= base_url(); ?>/navbar/cross.svg" alt="">
      </div>
    </div>
    <div class="flex flex-col font-bold text-lg text-center">
      <a id="res_home_nav" class="block text-2xl py-2" href="<?= base_url(); ?>">Home</a>
      <a id="res_about_nav" class="block text-2xl py-2" href="<?= base_url(); ?>/ara">About</a>
      <a id="res_olimpiade_nav" class="block text-2xl py-2" href="<?= base_url(); ?>/olimpiade">Olimpiade</a>
      <a id="res_ctf_nav" class="block text-2xl py-2" href="<?= base_url(); ?>/ctf">CTF</a>
      <a id="res_exploit_nav" class="block text-2xl py-2" href="<?= base_url(); ?>/exploit">ExploIT</a>
      <a id="res_login_nav" class="block text-2xl py-2" href="<?= base_url(); ?>/auth/login">login</a>
    </div>
    <hr class="my-2">
    <div class="flex flex-col font-bold text-lg text-center">
      <a class="block text-2xl py-2" href="<?= base_url(); ?>/register/olimpiade">Daftar Olimpiade</a>
      <!-- <a class="block text-2xl py-2" href="<?= base_url(); ?>/olimpiade">Daftar CTF</a>
      <a class="block text-2xl py-2" href="<?= base_url(); ?>/olimpiade">Daftar ExploIT</a> -->
    </div>
    <div class="absolute bottom-8 left-[50%] -translate-x-1/2 w-full px-2">
      <p class="text-center text-lg mt-16">Follow <span class="font-bold">ARA 4.0</span></p>
      <div class="flex justify-around items-center gap-2 mt-4 max-w-xl mx-auto">
        <a class="block flex-1" href="https://www.instagram.com/ara_its/"><img class="w-full" src="<?= base_url(); ?>/coming_soon/sosmed/ig.png" alt="instagram"></a>
        <a class="block flex-1" href="https://www.youtube.com/channel/UC0jutwJdiQ_MRNSJG0CRYGA"><img class="w-full" src="<?= base_url(); ?>/coming_soon/sosmed/yt.png" alt="youtube"></a>
        <a class="block flex-1" href="https://twitter.com/ara__its"><img class="w-full" src="<?= base_url(); ?>/coming_soon/sosmed/twitter.png" alt="twitter"></a>
        <a class="block flex-1" href="https://web.facebook.com/profile.php?id=100086878021327&is_tour_completed=true"><img class="w-full" src="<?= base_url(); ?>/coming_soon/sosmed/fb.png" alt="facebook"></a>
        <a class="block flex-1" href="https://www.tiktok.com/@ara_its"><img class="w-full" src="<?= base_url(); ?>/coming_soon/sosmed/tiktok.png" alt="tiktok"></a>
      </div>
    </div>
  </div>
</div>
<div></div>