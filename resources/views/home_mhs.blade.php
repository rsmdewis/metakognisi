@extends('layouts.sidebar_mhs')
@section('content')
<div class="content">  
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Home</h1>
      </a>

      <nav id="navmenu" class="navmenu d-none d-lg-block">
        <ul>
          <!-- Add navigation items here if needed -->
        </ul>
      </nav>
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
          <div class="help-box d-flex flex-column justify-content align-items-center mt-4 p-3 rounded shadow">
          @if($mahasiswa)
    <span id="nama" class="fw-bold"> Halo Selamat Datang, {{ $mahasiswa->nama }}</span>
@else
    <span>Data mahasiswa tidak ditemukan.</span>
@endif
            <br>
            <br>


    

          </div>

     

  </main>
  </div>
  @endsection

