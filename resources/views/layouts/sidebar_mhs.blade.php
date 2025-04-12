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
  <style>
    .active-page { background-color: #388da8; color: white; }
    .answered { background-color: #5cb85c; color: white; }

    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 230px;
      height: 100%;
      background-color: #388da8; /* Background biru */
      color: #fff; /* Teks putih */
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    #sidebar .sidebar-heading {
      font-size: 0.9rem;
      margin-bottom: 10px;
    }

    #sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 10px 15px;
      margin: 5px 0;
      border-radius: 5px;
      transition: background-color 0.3s;
      font-weight: bold;
    }

    #sidebar a:hover,
    #sidebar a.active {
      background-color: #2b6d82;
    }

    /* Content area (agar tidak tertutup oleh sidebar) */
    .content {
      margin-left: 220px;
      padding: 20px;
    }

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
  .button-container {
        display: flex;
        justify-content: center;
        gap: 15px; 
        margin-top: 10px; 
        padding-bottom: 40px;
    }
        .custom-btn {
            border: 2px solid;
            border-radius: 50px;
            padding: 10px 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary-custom {
            color: #2b6d82;
            border-color: #2b6d82;
            background-color: transparent;
        }

        .btn-success-custom {
            color: #5cb85c;
            border-color: #5cb85c;
            background-color: transparent;
        }

        /* Hover Effect */
        .btn-primary-custom:hover {
            background-color: #2b6d82;
            color: white;
        }

        .btn-success-custom:hover {
            background-color: #5cb85c;
            color: white;
        }
        .btn-nav {
    width: 120px; /* Sesuaikan lebar tombol */
    height: 45px; /* Sesuaikan tinggi tombol */
    border-radius: 25px; /* Membuat sudut lebih melengkung */
    font-size: 16px; /* Menyesuaikan ukuran font */
    font-weight: bold;
    opacity: 1; /* Default tidak transparan */
    transition: all 0.3s ease; /* Efek transisi */
}

/* Tombol disabled */
.btn-nav:disabled {
    opacity: 0.5; /* Membuat tombol redup jika tidak aktif */
    cursor: not-allowed; /* Mengubah kursor menjadi tanda larangan */
}
  </style>
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

</head>

<body class="service-details-page">
<!-- Sidebar -->
<div id="sidebar">
<!-- Profile Section with Icon -->
<div class="profile-section">
<i class="mdi mdi-account-circle profile-image"></i>
        <div class="profile-info">
        @php
        $mahasiswa = auth()->guard('mahasiswa')->user();
    @endphp
    <span class="profile-name">{{ $mahasiswa->nama }}</span>
    <br>
    <span class="profile-role">{{ $mahasiswa->nim }}</span>
      
        </div>
    </div>
    <div class="sidebar-heading">MENU</div>
    <!-- Link to home route -->
    <a href="{{ route('angket.home') }}">
        <i class="mdi mdi-home menu-icon"></i> <!-- Home icon -->
        <span class="menu-title">Home</span>
    </a>

    <!-- Link to angket route -->
    <a href="{{ route('angket.show') }}">
        <i class="mdi mdi-pencil menu-icon"></i> <!-- Pencil icon -->
        <span>Tes Metakognisi</span>
    </a>

    <!-- Link to hasil route -->
    <a href="{{ route('angket.hasil') }}">
        <i class="mdi mdi-chart-bar menu-icon"></i> <!-- Chart icon -->
        <span>Hasil</span>
    </a>
    <a href="{{ route('mahasiswa.profile') }}">
        <i class="mdi mdi-account-circle menu-icon"></i> <!-- Chart icon -->
        <span>Profile</span>
    </a>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger text-white">
    <i class="mdi mdi-logout menu-icon"></i> Logout
</a>

<form id="logout-form" action="{{ route('logout-mahasiswa') }}" method="POST" style="display: none;">
    @csrf
</form>
  </div>

  <!-- Page content -->
  
  @yield('content')
  
  <!-- <footer id="footer" class="footer position-relative">
    <div class="container text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer> -->

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
  <script>
    function confirmLogout() {
        return confirm("Apakah Anda yakin ingin logout?");
    }
</script>

</body>

</html>
