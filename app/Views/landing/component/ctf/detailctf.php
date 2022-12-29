<!-- HEADER -->
<section class="relative container mx-auto px-2 mt-20">
  <img class="relative inset-x-1/2 -translate-x-1/2 -top-8 -z-10" src="event/half-circle.svg">
  <img class="hidden sm:block absolute top-8 right-16 w-16" src="event/play-circle.png">
  <img class="hidden sm:block absolute top-8 left-16 w-24" src="event/backhand.svg">
  <img class="hidden sm:block absolute inset-x-1/2 -bottom-20 w-12" src="event/circle.svg">
  <div class="flex items-center">
    <div class="flex-1 hidden sm:block">
      <img class="w-full" src="event/ctf_header.svg" alt="">
    </div>
    <div class="flex-1">
      <h2 class="text-center font-bold text-4xl md:text-5xl lg:text-6xl p-10">CTF</h2>
      <p class="text-center">CTF atau Capture the Flag merupakan kompetisi seputar bidang Cyber Security yang
        ditujukan bagi siswa/i SMA dan mahasiswa/i aktif PTN/PTS se-Indonesia. Para peserta kompetisi CTF dalam
        rangkaian ARA 4.0 diwajibkan untuk menemukan file tersembunyi dalam bentuk file ataupun string (teks) yang
        disebut dengan “Flag”.</p>
      <div class="mt-16 flex gap-4 mx-auto">
        <a href="<?= site_url('/register/ctf'); ?>" class="block text-center bg-blue-500 font-bold text-white w-full py-4 rounded-2xl border-4 border-black drop-shadow-[0_4px_0_rgba(0,0,0,1)]">Daftar</a>
        <a href="https://drive.google.com/file/d/1IoHv5luV8DBL2D0VuPUB9HCcLrTcOMDJ/view?usp=drivesdk" target="_blank" class="block text-center bg-yellow-500 font-bold text-black w-full py-4 rounded-2xl border-4 border-black drop-shadow-[0_4px_0_rgba(0,0,0,1)]">Rulebook</a>
      </div>
    </div>
  </div>
</section>

<!-- Countdown -->
<img class="w-full mt-24" src="event/wave.svg">
<section class="mx-auto px-2 py-72 bg-[#4C1FAD]">
  <div class="invisible" id="event-time"><?= $event_time ?></div>
  <div class="relative container mx-auto">
    <img class="hidden sm:block absolute top-16 left-8 w-24" src="event/watch.svg" alt="">
    <img class="hidden sm:block absolute -bottom-24 right-0 w-16" src="event/paint.svg" alt="">
    <p class="text-xl font-semibold text-center text-[#339969] lg:text-2xl">Countdown</p>
    <p class="text-4xl font-semibold text-center text-white mt-2 md:text-5xl lg:text-6xl"><span class="hidden sm:inline">&#129303;</span> Coming Soon <span class="hidden sm:inline">&#129303;</span></p>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 justify-around mt-24 text-white max-w-xl mx-auto">
      <div>
        <p id="hari" class="text-center text-4xl sm:text-6xl font-bold bg-[#339969] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">
          00</p>
        <p class="text-center mt-4 font-semibold text-xl">Hari</p>
      </div>
      <div>
        <p id="jam" class="text-center text-4xl sm:text-6xl font-bold bg-[#339969] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">
          00</p>
        <p class="text-center mt-4 font-semibold text-xl">Jam</p>
      </div>
      <div>
        <p id="menit" class="text-center text-4xl sm:text-6xl font-bold bg-[#339969] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">
          00</p>
        <p class="text-center mt-4 font-semibold text-xl">Menit</p>
      </div>
      <div>
        <p id="detik" class="text-center text-4xl sm:text-6xl font-bold bg-[#339969] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">
          00</p>
        <p class="text-center mt-4 font-semibold text-xl">Detik</p>
      </div>
    </div>
  </div>
</section>

<!-- Who can join -->
<section class="container mx-auto px-2 mt-24 sm:mt-48 mb-96">
  <p class="text-xl lg:text-2xl font-semibold text-[#339969] text-center">Participant</p>
  <p class="font-bold text-4xl md:text-5xl lg:text-6xl text-center"><span class="hidden sm:inline">&#129488;</span>
    Who can join CTF? &#129488;</p>

  <div class="sm:relative">
    <img class="hidden sm:block absolute left-0 top-2" src="event/girl.svg" alt="">
    <img class="hidden sm:block absolute right-0 top-2" src="event/boy.svg" alt="">
    <p class="font-bold text-2xl text-center px-4 py-8 mt-16 bg-[#EFFAFF] border-4 border-black rounded-2xl sm:max-w-[80%] mx-auto">
      Seluruh siswa/i SMA dan mahasiswa aktif seluruh Indonesia</p>
  </div>
</section>

<!-- Timeline -->
<section class="relative">
  <img class="hidden sm:block absolute right-0 inset-y-1/2 -z-10" src="event/blue-circle.svg" alt="">

  <div class="relative container mx-auto mt-24 sm:mt-48 px-2">
    <img class="hidden sm:block absolute -left-16 -top-16 -z-10" src="event/rectangle.svg" alt="">
    <img class="hidden sm:block absolute right-48 top-8 -z-10" src="event/calendar.svg" alt="">
    <!-- <p class="text-xl lg:text-2xl font-semibold text-[#339969]">Lorem Ipsum</p> -->
    <p class="md:text-5xl lg:text-6xl font-bold text-4xl ">Timeline &#129488;</p>


    <div class="relative border-2 border-black rounded-2xl mt-16 px-4 overflow-hidden bg-white z-10">
      <div class="absolute w-full h-4 border-4 border-black top-[225px]"></div>
      <div class="flex flex-nowrap overflow-auto py-16 gap-24">
        <div class="flex-1">
          <p class="text-4xl font-semibold text-center">Pendaftaran <br> Batch 1</p>
          <div class="w-12 h-12 bg-[#F3CA20] rounded-full mx-auto mt-16 border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)]">
          </div>
          <p class="mt-12 text-center font-semibold text-2xl">10 - 25 Januari 2023</p>
          <p class="text-center text-xl mt-8">Pendaftaran Batch ke-1 akan dikenanakan biaya sebesar Rp80.000/tim</p>
        </div>
        <div class="flex-1">
          <p class="text-4xl font-semibold text-center">Pendaftaran <br> Batch 2</p>
          <div class="w-12 h-12 bg-[#339969] rounded-full mx-auto mt-16 border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)]">
          </div>
          <p class="mt-12 text-center font-semibold text-2xl">26 Januari -17 Februari 2022</p>
          <p class="text-center text-xl mt-8">Pendaftaran Batch ke-2 akan dikenanakan biaya sebesar Rp100.000/tim</p>
        </div>
        <div class="flex-1">
          <p class="text-4xl font-semibold text-center">Technical <br>Meeting</p>
          <div class="w-12 h-12 bg-[#339969] rounded-full mx-auto mt-16 border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)]">
          </div>
          <p class="mt-12 text-center font-semibold text-2xl">21 Februari 2023</p>
          <p class="text-center text-xl mt-8">Pencerdasan mengenai teknis perlombaan dan pemberitahuan mengenai
            platform yang digunakan</p>
        </div>
        <div class="flex-1">
          <p class="text-4xl font-semibold text-center">Babak kompetisi <br>
            &nbsp;
          </p>
          <div class="w-12 h-12 bg-[#339969] rounded-full mx-auto mt-16 border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)]">
          </div>
          <p class="mt-12 text-center font-semibold text-2xl">25-26 Februari 2023</p>
          <p class="text-center text-xl mt-8">Pelaksaan perlombaan akan dilakukan secara online</p>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- Prize -->
<section class="py-16 mt-24 sm:mt-48 bg-[#F9FAFF] mb-40">
  <div class="relative container mx-auto px-2">
    <img class="hidden sm:block absolute -top-16 left-0" src="event/love-chat.svg" alt="">
    <img class="hidden sm:block absolute top-0 right-0" src="event/rectangle.svg" alt="">
    <img class="hidden sm:block absolute bottom-8 right-8" src="event/open-file-folder.svg" alt="">

    <div class="flex items-center">
      <div class="flex-1 hidden sm:block">
        <img class="w-[80%]" src="event/giveaway.svg" alt="">
      </div>
      <div>
        <p class="md:text-5xl lg:text-6xl font-bold text-4xl">Woow, PRIZEEE!? &#128562;</p>

        <p class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#025AF1] mt-16">Rp 4.000.000++</p>
      </div>
    </div>
  </div>

</section>

<!-- Contact Person -->
<section class="relative py-16 sm:px-16 mt-24 sm:mt-48 bg-[#FFFCEF]">
  <img class="hidden sm:block absolute inset-y-1/2 right-0" src="event/blue-circle.svg" alt="">
  <div class="relative container mx-auto px-2">

    <img class="hidden sm:block absolute -top-16 -left-4" src="event/rectangle.svg" alt="">

    <div class="flex items-center justify-center">
      <div class="grow-0">
        <p class="text-4xl md:text-5xl lg:text-6xl font-bold">Yess, Contact Person?</p>


        <div lg:block>
          <div class="mt-16">
            <p class="font-bold text-3xl mb-8 text-center	">CP 1 - Hakim Fatih</p>
            <a class="block bg-[#339969] w-full py-4 text-2xl text-center font-bold text-white rounded-2xl border-2 border-black" href="https://wa.me/6282113062251" target="_blank"><i class="fa-brands fa-whatsapp"></i> 082113062251</a>
            <a class="mt-8 block bg-[#3AABD7] w-full py-4 text-2xl text-center font-bold text-white rounded-2xl border-2 border-black" href="#"><i class="fa-brands fa-line"></i> @hakimfatih</a>
          </div>

          <div class="mt-16">
            <p class="font-bold text-3xl mb-8 text-center	">CP 2 - Wisnuyasha Faizal</p>
            <a class="block bg-[#339969] w-full py-4 text-2xl text-center font-bold text-white rounded-2xl border-2 border-black" href="https://wa.me/6281288350985" target="_blank"><i class="fa-brands fa-whatsapp"></i> 081288350985 </a>
            <a class="mt-8 block bg-[#3AABD7] w-full py-4 text-2xl text-center font-bold text-white rounded-2xl border-2 border-black" href="#"><i class="fa-brands fa-line"></i> @wisnuyasha.faiz</a>
          </div>
        </div>



      </div>

      <div class="hidden md:block grow">
        <img class="w-full" src="event/contact-me.svg" alt="">
      </div>
    </div>
  </div>
</section>