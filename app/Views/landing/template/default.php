<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mendorong Inovasi dan Pembangunan Infrastruktur Teknologi untuk Indonesia">
  <meta name="keywords" content="ARA, A Renewal Agent, Teknologi Informasi, Institut Teknologi Sepuluh Nopember">
  <meta name="author" content="Divisi Website ARA 2022">
  <link rel="icon" href="<?= base_url() ?>/global/icon/logo_ara.svg" type="image/svg">
  <title><?= $title ?> | ARA HMIT ITS 2022</title>
  <?= $this->renderSection('custom-css') ?>

  <!-- Ganti CDN ke local -->
  <!-- <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>

<!-- for active header -->

<body class="font-poppins" onload="activeHeader('<?= $title; ?>');">
  <?= $this->include("landing/component/navbar"); ?>

  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <?= $this->include("landing/component/footer"); ?>
  <?= $this->renderSection('custom-js') ?>
</body>

</html>