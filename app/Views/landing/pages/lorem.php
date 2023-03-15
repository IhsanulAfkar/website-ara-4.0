<section class="relative container mx-auto pt-36 px-2 sm:px-16 mb-20">
    <img class="hidden lg:block absolute ml-auto bottom-0 -left-8" src="<?= base_url(); ?>/register/smoothcorner.png" alt="">
    <img class="absolute hidden lg:block top-[6%] left-[47%]" src="<?= base_url(); ?>/register/circle-star.png">

    <div class="flex justify-between gap-24">
        <form class="flex-1 mt-8" action="<?= base_url() ?>/verify-regis-ctf" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="bg-green-400 w-full border-[1px] rounded-xl p-2 my-2 text-xl text-center">ðŸ˜ŠRegistrasi Berhasil!ðŸ˜Š</div>
            <?php endif; ?>
            <p class="text-4xl md:text-5xl lg:text-6xl font-bold ">Register CTF &#128513;</p>
            <p class="after:content-['*'] after:ml-0.5 after:text-red-500 mt-4">Maksimal ukuran file adalah 1 mb</p>
            <label for="tim_nama" class="block mt-16">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Nama Tim</span>
                <input type="text" id="tim_nama" name="tim_nama" value="<?= old('tim_nama') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input nama tim kamu ya" />
                <span class="text-red-700"><?= $validation->getError('tim_nama') ?></span>
            </label>
            <label for="asal_institusi" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Asal Universitas/Sekolah</span>
                <input type="text" id="asal_institusi" name="asal_institusi" value="<?= old('asal_institusi') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Sekolah mana nih?" />
                <span class="text-red-700"><?= $validation->getError('asal_institusi') ?></span>
            </label>

            <!-- Ketua Tim -->
            <p class="text-2xl font-bold mt-16">Ketua Tim</p>
            <label for="nama_ketua" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Nama Ketua</span>
                <input type="text" id="nama_ketua" name="nama_ketua" value="<?= old('nama_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input nama ketua tim kamu ya" />
                <span class="text-red-700"><?= $validation->getError('nama_ketua') ?></span>
            </label>
            <label for="phone_ketua" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">No Telpon Aktif</span>
                <input type="text" id="phone_ketua" name="phone_ketua" value="<?= old('phone_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input No Telp ketuanya ya" />
                <span class="text-red-700"><?= $validation->getError('phone_ketua') ?></span>
            </label>
            <label for="email_ketua" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Email Ketua</span>
                <input type="email" id="email_ketua" name="email_ketua" value="<?= old('email_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input juga dong emailnya" />
                <span class="text-red-700"><?= $validation->getError('email_ketua') ?></span>
            </label>
            <label for="discord_ketua" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Discord Ketua</span>
                <input type="text" id="discord_ketua" name="discord_ketua" value="<?= old('discord_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input juga dong discordnya, pake # ya" />
                <span class="text-red-700"><?= $validation->getError('discord_ketua') ?></span>
            </label>
            <label for="surket_ketua" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm text-slate-700"><span class="font-bold">Kartu Pelajar </span>(Bisa diganti dengan Surat Keterangan Sekolah Aktif, file berupa .jpg atau .png)</span>
                <input type="file" id="surket_ketua" name="surket_ketua" value="<?= old('surket_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('surket_ketua') ?></span>
            </label>
            <label for="ig_ara_ketua" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm text-slate-700"><span class="font-bold">Bukti Follow Ig ARA </span>(File berupa .jpg atau .png)</span>
                <input type="file" id="ig_ara_ketua" name="ig_ara_ketua" value="<?= old('ig_ara_ketua') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('ig_ara_ketua') ?></span>
            </label>

            <!-- Anggota 1 -->
            <p class="text-2xl font-bold mt-16">Anggota 1</p>
            <label for="nama_anggota_1" class="block mt-8">
                <span class="after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Nama Anggota 1</span>
                <input type="text" id="nama_anggota_1" name="nama_anggota_1" value="<?= old('nama_anggota_1') ?>" class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input nama anggota kamu ya" />
                <span class="text-red-700"><?= $validation->getError('nama_anggota_1') ?></span>
            </label>
            <label for="surket_anggota_1" class="block mt-8">
                <span class="after:ml-0.5 after:text-red-500 block text-sm text-slate-700"><span class="font-bold">Kartu Pelajar </span>(Bisa diganti dengan Surat Keterangan Sekolah Aktif, file berupa .jpg atau .png)</span>
                <input type="file" id="surket_anggota_1" name="surket_anggota_1" value="<?= old('surket_anggota_1') ?>" class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('surket_anggota_1') ?></span>
            </label>
            <label for="ig_ara_anggota_1" class="block mt-8">
                <span class="after:ml-0.5 after:text-red-500 block text-sm text-slate-700"><span class="font-bold">Bukti Follow Ig ARA </span>(File berupa .jpg atau .png)</span>
                <input type="file" id="ig_ara_anggota_1" name="ig_ara_anggota_1" value="<?= old('ig_ara_anggota_1') ?>" class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('ig_ara_anggota_1') ?></span>
            </label>

            <!-- Anggota 2 -->
            <p class="text-2xl font-bold mt-16">Anggota 2</p>
            <label for="nama_anggota_2" class="block mt-8">
                <span class="after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Nama Anggota 2</span>
                <input type="text" id="nama_anggota_2" name="nama_anggota_2" value="<?= old('nama_anggota_2') ?>" class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Input nama anggota kamu ya" />
                <span class="text-red-700"><?= $validation->getError('nama_anggota_2') ?></span>
            </label>
            <label for="surket_anggota_2" class="block mt-8">
                <span class="after:ml-0.5 after:text-red-500 block text-sm text-slate-700"><span class="font-bold">Kartu Pelajar </span>(Bisa diganti dengan Surat Keterangan Sekolah Aktif, file berupa .jpg atau .png)</span>
                <input type="file" id="surket_anggota_2" name="surket_anggota_2" value="<?= old('surket_anggota_2') ?>" class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('surket_anggota_2') ?></span>
            </label>
            <label for="ig_ara_anggota_2" class="block mt-8">
                <span class="after:ml-0.5 after:text-red-500 block text-sm text-slate-700"><span class="font-bold">Bukti Follow Ig ARA </span>(File berupa .jpg atau .png)</span>
                <input type="file" id="ig_ara_anggota_2" name="ig_ara_anggota_2" value="<?= old('ig_ara_anggota_2') ?>" class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('ig_ara_anggota_2') ?></span>
            </label>

            <p class="mt-16">Untuk pembayaran, silahkan transfer sebesar <b>Rp. <span id="nominal">100.000</span> </b>ke bank mandiri No. Rek 1660003019957 a.n. Nathania Elirica Aliyah</p>
            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm text-slate-700">Jika memiliki kupon, silahkan submit dan membayar sesuai dengan harga pendaftaran dikurangi harga diskon pada kupon tersebut</span>

            <label for="kupon" class="block mt-8">
                <span class="block text-sm font-bold text-slate-700">Masukkan Kupon</span>
                <input type="text" id="kupon" name="kupon" class="px-3 py-2 w-full border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1 flex-none" />

            </label>
            <label for="bukti_bayar" class="block mt-8">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-bold text-slate-700">Bukti Pembayaran</span>
                <input type="file" id="bukti_bayar" name="bukti_bayar" value="<?= old('bukti_bayar') ?>" required class="mt-1 px-3 py-2 bg-white border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                <span class="text-red-700"><?= $validation->getError('bukti_bayar') ?></span>
            </label>
            <button type="submit" class="mt-16 py-2 bg-[#339969] border-2 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-2xl sm:text-lg focus:ring-1 font-bold text-white">Register</button>
        </form>
        <div class="hidden lg:block flex-1">
            <img class="w-full" src="<?= base_url(); ?>/register/hero-image.png" alt="">
        </div>
    </div>
</section>