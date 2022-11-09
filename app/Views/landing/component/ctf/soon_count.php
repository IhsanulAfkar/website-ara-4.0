<section class="mx-auto px-2 py-72 bg-[#4C1FAD]">
    <div class="invisible" id="event-time"><?= $event_time ?></div>
    <div class="relative container mx-auto">
        <img class="hidden sm:block absolute top-16 left-8 w-24" src="event/watch.svg" alt="">
        <img class="hidden sm:block absolute -bottom-24 right-0 w-16" src="event/paint.svg" alt="">
        <p class="text-xl font-semibold text-center text-[#339969] lg:text-2xl">Countdown</p>
        <p class="text-4xl font-semibold text-center text-white mt-2 md:text-5xl lg:text-6xl"><span class="hidden sm:inline">&#129303;</span> Coming Soon <span class="hidden sm:inline">&#129303;</span></p>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 justify-around mt-24 text-white max-w-xl mx-auto">
            <div>
                <p id="hari" class="text-center text-4xl sm:text-6xl font-bold bg-[#3AABD7] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">00</p>
                <p class="text-center mt-4 font-semibold text-xl">Hari</p>
            </div>
            <div>
                <p id="jam" class="text-center text-4xl sm:text-6xl font-bold bg-[#3AABD7] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">00</p>
                <p class="text-center mt-4 font-semibold text-xl">Jam</p>
            </div>
            <div>
                <p id="menit" class="text-center text-4xl sm:text-6xl font-bold bg-[#3AABD7] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">00</p>
                <p class="text-center mt-4 font-semibold text-xl">Menit</p>
            </div>
            <div>
                <p id="detik" class="text-center text-4xl sm:text-6xl font-bold bg-[#3AABD7] p-4 rounded-2xl border-2 border-black drop-shadow-[0_6px_0_rgba(0,0,0,1)]">00</p>
                <p class="text-center mt-4 font-semibold text-xl">Detik</p>
            </div>
        </div>
    </div>
</section>