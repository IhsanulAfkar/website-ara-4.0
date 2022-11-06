<nav class="py-4 bg-white border-b-2 border-black z-10 sm:px-16 fixed inset-x-0 top-0 z-50">
  <div class="container px-2 mx-auto flex justify-between items-center">
    <div class="flex items-center gap-16">
      <div class="w-8">
        <img class="w-full" src="global/icon/logo_ara.svg" alt="">
      </div>
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
      <a class="block" href="#">Login</a>
      <a href="#" class="block text-center bg-yellow-500 font-bold py-1 px-4 border-4 border-black">Daftar</a>
    </div>
    <div id="open-menu-button" class="block lg:hidden text-3xl px-2 py-1 bg-yellow-500 border-2 border-black">
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>
</nav>

<!-- Menu Navbar -->
<div id="menu-list" class="hidden relative">
  <div class="fixed inset-0 bg-white z-50 p-4">
    <div class="flex items-center justify-between">
      <div class="w-10">
        <img class="w-full" src="global/icon/fire.svg" alt="">
      </div>
      <div id="close-menu-button" class="w-12">
        <img class="w-full" src="navbar/cross.svg" alt="">
      </div>
    </div>
    <div class="flex flex-col gap-6 font-bold text-lg text-center mt-8">
      <a id="res_home_nav" class="block text-4xl" href="<?= base_url(); ?>">Home</a>
      <a id="res_about_nav" class="block text-4xl" href="<?= base_url(); ?>/ara">About</a>
      <a id="res_olimpiade_nav" class="block text-4xl " href="<?= base_url(); ?>/olimpiade">Olimpiade</a>
      <a id="res_ctf_nav" class="block text-4xl" href="<?= base_url(); ?>/ctf">CTF</a>
      <a id="res_exploit_nav" class="block text-4xl" href="<?= base_url(); ?>/exploit">ExploIT</a>
      <!-- <a id="res_hmit_nav" class="block text-4xl" href="<?= base_url(); ?>/hmit">HMIT</a> -->
    </div>
    <div class="absolute bottom-8 left-[50%] -translate-x-1/2 w-full">
      <p class="text-center mt-8 text-lg mt-16">Follow <span class="font-bold">ARA 4.0</span></p>
      <div class="flex justify-around items-center gap-2 mt-4 max-w-xl mx-auto">
        <a class="block flex-1" href="https://www.instagram.com/ara_its/"><img class="w-full" src="coming_soon/sosmed/ig.png" alt="instagram"></a>
        <a class="block flex-1" href="https://www.youtube.com/channel/UC0jutwJdiQ_MRNSJG0CRYGA"><img class="w-full" src="coming_soon/sosmed/yt.png" alt="youtube"></a>
        <a class="block flex-1" href="https://twitter.com/ara__its"><img class="w-full" src="coming_soon/sosmed/twitter.png" alt="twitter"></a>
        <a class="block flex-1" href="https://web.facebook.com/profile.php?id=100086878021327&is_tour_completed=true"><img class="w-full" src="coming_soon/sosmed/fb.png" alt="facebook"></a>
        <a class="block flex-1" href="https://www.tiktok.com/@ara_its"><img class="w-full" src="coming_soon/sosmed/tiktok.png" alt="tiktok"></a>
      </div>
    </div>
  </div>
</div>
<div></div>