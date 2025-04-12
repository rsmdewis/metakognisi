<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Metacognitive Test</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/m.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .active-page { background-color: #388da8; color: white; }
    .answered { background-color: green; color: white; }


    /* Button navigasi pada halaman soal */
    .active-page {
      background-color: blue;
      color: white;
    }
    .menu-icon {
    margin-right: 10px; /* Space between icon and text */
  }

  .menu-title {
    font-size: 16px;
  }

  /* Profile section styles */
  .profile-section {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding: 10px;
    border-bottom: 2px solid #ccc;
  }

  .profile-image {
    width: 60px; /* Adjust profile picture size */
    height: 60px;
    border-radius: 50%; /* Circular image */
    margin-right: 10px;
  }
  .mdi-account-circle.profile-image {
    font-size: 40px; /* Adjust this size as needed */
  }
  .profile-info {
    color: white;
    justify-content: center;
  }

  .profile-name {
    font-weight: bold;
    justify-content: center;
    font-size: 16px;
  }

  .profile-role {
    font-size: 12px;
    color:rgb(211, 208, 208);
  }
  </style>

  <!-- =======================================================
  * Template Name: Metakognisi
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Jun 14 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  

<!-- Page content -->
<div class="content">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      
      <!-- <a class="btn btn-primary" href="/hasil">Finish</a> -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </div>
  </header>

  <main class="main">

  <div class="d-flex justify-content-center align-items-center vh-100 bg-light text-center" data-aos="fade">
    <div>
        <h3 class="fw-bold" style=" font-size: 28px;">
            Anda telah menyelesaikan tes <br> <span style="color: #388da8;">Metacognitive Awareness Inventory</span>
        </h3>
        <p style=" font-size: 18px;">
            Silakan lihat hasil dari kemampuan metakognisi Anda!
        </p>
        <a href="{{ route('angket.hasil') }}" class="btn btn-primary btn-lg mt-3 px-4 py-2 shadow-lg rounded-pill" 
           style="font-size: 20px; transition: 0.3s;">
            <i class="fas fa-chart-line"></i> Lihat Hasil
        </a>
    </div>
</div>

    

  </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
  
