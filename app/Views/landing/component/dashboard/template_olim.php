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
    
    <!-- Flowbite CDN -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
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
            <p class="font-bold text-3xl text-center my-[60px]"><?= $event ?></p>
            <?php if($step !== 'Konfirmasi'): ?>
            <div class="mt-[40px] flex flex-col gap-5 font-bold">
                <a href="<?= base_url() ?>/dashboard/admin-olim/list-team" class="text-2xl text-yellow-500">List Team</a>
                <a href="<?= base_url() ?>/dashboard/admin-olim/konfirmasi-team" class="text-2xl">Konfirmasi Team</a>
            </div>
            <?php else: ?>
            <div class="mt-[40px] flex flex-col gap-5 font-bold">
                <a href="<?= base_url() ?>/dashboard/admin-olim/list-team" class="text-2xl">List Team</a>
                <a href="<?= base_url() ?>/dashboard/admin-olim/konfirmasi-team" class="text-2xl text-yellow-500">Konfirmasi Team</a>
            </div>
            <?php endif;?>
            <div class="flex">
                <a href="#logout" class="text-center bg-yellow-500 font-bold text-xl py-1 px-5 border-2 border-black absolute inset-x-10 bottom-[10%]">Keluar</a>
            </div>
        </div>
    </div>
    <div class="p-5 mt-6 ml-[300px]">
        <div class="text-4xl font-bold"><?= $step ?> Team 😁</div>
        <div class="mt-[40px] h-[180px] bg-[#4C1FAD] text-white rounded-xl p-10 relative overflow-hidden border-black drop-shadow-[0_4px_0_rgba(0,0,0,1)]">
            <div class="flex items-center h-full">
                <p class=" font-bold text-5xl ">Halo, <?= $nama ?></p>
            </div>
            <img src="<?= base_url(); ?>/dashboard/icon.svg" class="absolute right-0 top-0">
        </div>
        <div class="mt-4 flex gap-40 mx-auto text-2xl">
            <div class="flex text-center bg-red-500 font-bold text-white w-full py-4 px-6 rounded-xl border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)] items-center">
                <p class="w-full text-left">Jumlah Peserta <?= $event ?></p>
                <p class="w-full text-6xl"><?= $total_team; ?></p>
            </div>
            <div class="flex text-center bg-green-500 font-bold text-white w-full py-4 px-6 rounded-xl border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)] items-center">
                <p class="w-full text-left">Peserta Terkonfirmasi <?= $event ?></p>
                <p class="w-full text-6xl"><?= $terkonfirmasi ?></p>
            </div>
            <div class="flex text-center bg-yellow-500 font-bold text-white w-full py-4 px-6 rounded-xl border-2 border-black drop-shadow-[0_2px_0_rgba(0,0,0,1)] items-center">
                <p class="w-full text-left">Peserta Pending <?= $event ?></p>
                <p class="w-full text-6xl"><?= $belum_terkonfirmasi ?></p>
            </div>
        </div>
        <?= $this->renderSection('content') ?>
    </div>


    <?= $this->renderSection('custom-js') ?>

    <!-- Modal -->
    <!-- Accept -->
    <div id="modal-accept" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-white-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modal-accept">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Setelah menekan tombol Accept, peserta akan segera dikirimkan username dan password melalui email.</h3>
                <button type="button" data-modal-toggle="modal-accept" id="buttonAccept" onclick="document.getElementById('buttonAccept').classList.add('disabled');" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Accept
                </button>
                <button data-modal-toggle="modal-accept" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

    <!-- Reject -->
    <div id="modal-reject" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modal-reject">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Setelah menekan tombol Reject, peserta akan diberitahu via email bahwa data yang mereka kirimkan belum sesuai.</h3>
                <button type="button" data-modal-toggle="modal-reject" id="buttonReject" onclick="document.getElementById('buttonReject').classList.add('disabled');" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Reject
                </button>
                <button data-modal-toggle="modal-reject" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

</body>

</html>