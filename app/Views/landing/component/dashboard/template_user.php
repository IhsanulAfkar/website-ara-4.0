<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mendorong Inovasi dan Pembangunan Infrastruktur Teknologi untuk Indonesia">
    <meta name="keywords" content="ARA, A Renewal Agent, Teknologi Informasi, Institut Teknologi Sepuluh Nopember">
    <meta name="author" content="Divisi Website ARA 2022">

    <title><?= $title ?> | ARA HMIT ITS 2022</title>
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>/src/css/dashboard/style.css"> -->


    <!-- Ganti CDN ke local -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<!-- for active header -->

<body class="font-poppins">
    <img src="<?= base_url(); ?>/dashboard/message.svg" class="absolute top-0 right-0">

    <div class="border-solid border-r-[1px] border-black h-full  py-5 px-10 w-[300px] overflow-hidden fixed top-0 left-0 z-10">
        <div class="">
            <img src="<?= base_url(); ?>/dashboard/star.svg" class="absolute top-0 right-0">
            <img src="<?= base_url(); ?>/dashboard/Watch.svg" class="absolute top-[65%] left-0">
            <div class="mt-4 w-full items-center py-[30px]">
                <img src="<?= base_url(); ?>/dashboard/pic.svg" class="mx-auto">
            </div>
            <p class="text-3xl text-center">A Renewal Agent 4.0</p>
            <p class="font-bold text-3xl text-center my-[60px]">Olimpiade</p>
            <div class="mt-[40px] flex flex-col gap-5 font-bold">
                <a href="#" class="text-2xl text-yellow-500">List Team</a>
                <a href="#" class="text-2xl">Konfirmasi Team</a>
            </div>
            <div class="flex">
                <a href="<?= base_url(); ?>/verify/logout" class="text-center bg-yellow-500 font-bold text-xl py-1 px-5 border-2 border-black absolute inset-x-10 bottom-[10%]">Keluar</a>
            </div>
        </div>
    </div>
    <div class="p-5 mt-6 ml-[300px]">
        <div class="text-4xl font-bold">List Team 😁</div>
        <div class="mt-[40px] h-[180px] bg-[#4C1FAD] text-white rounded-xl p-10 relative overflow-hidden border-black drop-shadow-[0_4px_0_rgba(0,0,0,1)]">
            <div class="flex items-center h-full">
                <p class=" font-bold text-5xl ">Halo, Nama</p>
            </div>
            <img src="<?= base_url(); ?>/dashboard/icon.svg" class="absolute right-0 top-0">
        </div>
        <div class="mt-4 flex gap-40 mx-auto text-2xl">
            <div class="flex text-center bg-red-500 font-bold text-white w-full py-4 px-6 rounded-xl border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)] items-center">
                <p class="w-full text-left">Jumlah Peserta</p>
                <p class="w-full text-6xl">85</p>
            </div>
            <div class="flex text-center bg-green-500 font-bold text-white w-full py-4 px-6 rounded-xl border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)] items-center">
                <p class="w-full text-left">Peserta Terkonfirmasi</p>
                <p class="w-full text-6xl">85</p>
            </div>
            <div class="flex text-center bg-yellow-500 font-bold text-white w-full py-4 px-6 rounded-xl border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)] items-center">
                <p class="w-full text-left">Peserta Pending</p>
                <p class="w-full text-6xl">85</p>
            </div>
        </div>
        <?= $this->renderSection('content') ?>
    </div>


    <?= $this->renderSection('custom-js') ?>
</body>

</html>