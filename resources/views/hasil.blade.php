@extends('layouts.sidebar_mhs')
@section('content')
<div class="content">  
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Hasil Kemampuan Metakognisi</h1>
      </a>

      <nav id="navmenu" class="navmenu d-none d-lg-block">
        <ul>
          <!-- Add navigation items here if needed -->
        </ul>
      </nav>
      
      <a class="btn btn-primary" href="#">Download</a>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title py-3 bg-light" data-aos="fade">
      
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Metakognisi</th>
                <th scope="col">Skor</th>
                <th scope="col">Level</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                            <th>1</th>
                            <td>Knowledge of Metacognition (KM)</td>
                            <td>{{ $hasilAngket->nilai_km }}</td>
                            <td>{{ ucfirst($kategori_km) }}</td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Regulation of Metacognition (RM)</td>
                            <td>{{ $hasilAngket->nilai_rm }}</td>
                            <td>{{ ucfirst($kategori_rm) }}</td>
                        </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table><br><br>
    <div class="info-box">
    <!-- <p><strong>Apa itu Knowledge of Metacognition (KM)?</strong></p>
    
        <p>Knowledge of Metacognition (KM) merujuk pada pemahaman individu tentang proses berpikir dan belajar mereka sendiri. Ini mencakup pengetahuan tentang bagaimana mereka belajar, berpikir, dan memecahkan masalah. Dengan memahami KM, seseorang dapat mengenali kekuatan dan kelemahan dalam cara mereka memproses informasi, serta memilih dan mengimplementasikan strategi belajar yang lebih efektif.</p>
    


    <p><strong>Apa itu Regulation of Metacognition (RM)?</strong></p>
        <p>Regulation of Metacognition (RM) adalah kemampuan individu untuk mengontrol dan mengelola proses berpikir mereka sendiri. Ini mencakup perencanaan, pemantauan, evaluasi, debugging, dan manajemen informasi. Dengan RM, seseorang dapat memilih, menerapkan, dan menyesuaikan strategi belajar mereka dengan lebih efektif untuk mencapai hasil yang optimal.</p>
     -->
    <p><strong>Saran Knowledge of Metacognition (KM)?</strong></p>
    <p>{{ $saran_km }}</p>
    <p><strong>Saran Knowledge of Metacognition (KM)?</strong></p>
    <p>{{ $saran_rm }}</p>
      </div>


          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service-box p-3 bg-light rounded">
              <h4 class="text-center">Catatan</h4>
              <p><strong>Hi, {{ Auth::guard('mahasiswa')->user()->nama }}!</strong></p>
                    <p>Kemampuan metakognisimu berada pada kategori <strong>{{ ucfirst($hasil_akhir) }}</strong></p>
              <p><br><br><br></p>
              <div class="d-flex flex-wrap"  style="margin-left: 20px;">
    



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
  </div>
  @endsection

