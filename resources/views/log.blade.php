<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template/images/favicon.png" />
  <style>
    /* Penyesuaian Tambahan */
    body {
      background-color: #f3f4f6; /* Ganti latar belakang */
    }
    .auth-form-transparent {
      background-color: #fff; /* Ganti latar belakang form */
      border-radius: 10px; /* Tambahkan border-radius */
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Tambahkan shadow */
    }
    .auth-form-btn {
      background-color: #007bff; /* Ganti warna tombol login */
    }
    .auth-form-btn:hover {
      background-color: #0056b3; /* Warna hover tombol login */
    }
    .mdi {
      font-size: 24px; /* Ukuran ikon */
    }
  </style>
</head>

<body>
<div class="container-scroller d-flex">
  <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow justify-content-center">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3 ">
            <div class="brand-logo text-center">
              <img src="template/images/m.png" alt="logo">
            </div>
            <h4 class="text-center">Welcome back Admin!</h4>
            <h6 class="font-weight-light text-center">Happy to see you again!</h6>
            <form class="pt-3">
              <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="exampleInputEmail">Username</label>
                <div class="input-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail" placeholder="Username">
                </div>
              </div>
              <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="exampleInputPassword">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password">                        
                </div>
              </div>
              <div class="my-3 text-center">
                <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="/home">LOGIN</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

  <!-- container-scroller -->
  <!-- base:js -->
  <script src="template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <script src="template/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- inject:js -->
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
