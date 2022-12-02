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
    <div id="menu-list" class="hidden fixed inset-0 bg-white z-50 p-4 h-full overflow-auto">
        <div class="relative h-full ">
            <div class="flex items-center justify-between">
                <div class="w-10">
                    <img class="w-full" src="<?= base_url(); ?>/global/icon/ara.png" alt="">
                </div>
                <div id="close-menu-button" class="w-12">
                    <img class="w-full" src="<?= base_url(); ?>/navbar/cross.svg" alt="">
                </div>
            </div>
            <div class="w-full text-center">
                <img src="<?= base_url(); ?>/dashboard/pic.svg" class="mx-auto mt-20">
                <p class="text-2xl mt-8">A Renewal Agent 4.0</p>
                <p class="text-4xl font-bold mt-14"><?= $event; ?></p>
            </div>
            <div class="absolute bottom-4 w-full">
                <div class="flex w-full justify-center">
                    <a href="<?= base_url(); ?>/verify/logout" class="text-center bg-yellow-500 font-bold text-xl py-1 px-5 border-2 border-black">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <img src="<?= base_url(); ?>/dashboard/message.svg" class="absolute top-0 right-0 hidden md:block">
    <nav class="py-4 bg-white border-b-2 border-black sm:px-16 fixed inset-x-0 top-0 z-10 md:hidden">
        <div class="container px-2 mx-auto flex justify-between items-center">
            <div class="flex items-center gap-16">
                <a href="<?= base_url(); ?>" class="w-8">
                    <img class="w-full" src="<?= base_url(); ?>/global/icon/logo_ara.svg" alt="">
                </a>
            </div>

            <div id="open-menu-button" class="block lg:hidden text-3xl px-2 py-1 bg-yellow-500 border-2 border-black">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </nav>
    <div id="menu-list" class="hidden fixed inset-0 bg-white z-50 p-4 h-full overflow-auto">
        <div class="">
            <div class="flex items-center justify-between">
                <div class="w-10">
                    <img class="w-full" src="<?= base_url(); ?>/global/icon/ara.png" alt="">
                </div>
                <div id="close-menu-button" class="w-12">
                    <img class="w-full" src="<?= base_url(); ?>/navbar/cross.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="border-solid border-r-[1px] border-black h-full  py-5 px-10 xl:w-[300px] w-[250px] overflow-hidden hidden fixed top-0 left-0 z-10 md:block">
        <div class="">
            <img src="<?= base_url(); ?>/dashboard/star.svg" class="absolute top-0 right-0">
            <img src="<?= base_url(); ?>/dashboard/Watch.svg" class="absolute top-[65%] left-0">
            <div class="mt-4 w-full items-center py-[30px]">
                <img src="<?= base_url(); ?>/dashboard/pic.svg" class="mx-auto">
            </div>
            <p class="text-3xl text-center">A Renewal Agent 4.0</p>
            <p class="font-bold text-3xl text-center my-[60px]"><?= $event; ?></p>
            <div class="flex">
                <a href="<?= base_url(); ?>/verify/logout" class="text-center bg-yellow-500 font-bold text-xl py-1 px-5 border-2 border-black absolute inset-x-10 bottom-[10%]">Keluar</a>
            </div>
        </div>
    </div>
    <div class="p-5 mt-20 md:ml-[250px] xl:ml-[300px] md:mt-6">
        <div class="text-4xl font-bold mb-4">Pengumuman 😁</div>
        <div class="md:mt-[40px] h-[140px] md:h-[180px] bg-[#4C1FAD] text-white rounded-xl p-10 relative overflow-hidden border-black drop-shadow-[0_4px_0_rgba(0,0,0,1)]">
            <div class="flex items-center h-full justify-center lg:justify-start">
                <p class="font-bold text-5xl ">Halo, <?= $nama_tim; ?></p>
            </div>
            <img src="<?= base_url(); ?>/dashboard/icon.svg" class="absolute right-0 top-0 hidden lg:block">
        </div>
        <?= $this->renderSection('content') ?>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url(); ?>/src/js/navbar/menu-initiator.js"></script>
    <?= $this->renderSection('custom-js') ?>
</body>

</html>