<!DOCTYPE html>
<html lang="id">

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
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="service-details-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Tes Kemampuan Metakognisi</h1>
      </a>

      <nav id="navmenu" class="navmenu d-none d-lg-block">
        <ul>
          <!-- Add navigation items here if needed -->
        </ul>
      </nav>
      
      <a class="btn btn-primary" href="/hasil">Finish</a>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title py-3 bg-light" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h4 class="mb-2 mb-lg-0">Angket Metacognitive Awareness Inventory (MAI)</h4>
        <nav class="breadcrumbs">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Angket MAI</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <form>
    <div class="mb-4">
    <?php
for ($i = 1; $i <= 10; $i++) {
    echo '<label for="q' . $i . '" class="form-label"><strong>' . $i . '. Pertanyaan</strong></label>
        <div class="options d-flex flex-wrap gap-3">
            <label class="rounded-pill">
                <input type="radio" name="q' . $i . '" value="selalu"> Selalu
            </label>
            <label class="rounded-pill">
                <input type="radio" name="q' . $i . '" value="sering"> Sering
            </label>
            <label class=" rounded-pill">
                <input type="radio" name="q' . $i . '" value="kadang-kadang"> Kadang-kadang
            </label>
            <label class="rounded-pill">
                <input type="radio" name="q' . $i . '" value="jarang"> Jarang
            </label>
            <label class="rounded-pill">
                <input type="radio" name="q' . $i . '" value="tidak pernah"> Tidak pernah
            </label>
        </div>
        <br>';
}
?>

    </div>

    <div class="d-flex justify-content-between">
    <button type="button" class="btn btn-primary" id="btnPrevious" style="width: 100px;">Previous</button>
    <button type="button" class="btn btn-primary" id="btnNext" style="width: 100px; margin-right: 100px;">Next</button>

    </div>
</form>

          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="help-box d-flex flex-column justify-content align-items-center mt-4 p-3 rounded shadow">
    <span id="nama" class="fw-bold">Risma Dewi Septiani</span>

    <span id="nim" class="fw-bold">E41232549</span>

</div><br>


            <div class="service-box p-3 bg-light rounded">
              <h4 class="text-center">Navigasi Angket MAI</h4>
              <div class="d-flex flex-wrap"  style="margin-left: 20px;">
    <?php
    $jumlah_tombol = 52;
    $lebar_tombol_px = 50; // Misalnya, tentukan lebar tombol dalam piksel
    for ($i = 1; $i <= $jumlah_tombol; $i++) {
        echo '<button type="button" class="btn btn-outline-primary m-1" style="width: ' . $lebar_tombol_px . 'px;">' . $i . '</button>';
    }
    ?>



                <!-- Repeat for all questions as needed -->
              </div>
            </div>

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Have a Question?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+62 8155 3021 636</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">rsmdewis2409@gmail.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Service Details Section -->

  </main>

  <footer id="footer" class="footer position-relative">
    <div class="container text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

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
