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

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Angket Metacognitive Awareness Inventory (MAI)</h1>
      </a>

      <nav id="navmenu" class="navmenu d-none d-lg-block">
        <ul>
          <!-- Add navigation items here if needed -->
        </ul>
      </nav>
      
      <!-- <a class="btn btn-primary" href="/hasil">Finish</a> -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </div>
  </header>

  <main class="main">

  <div class="page-title py-3 bg-light" data-aos="fade">
  <div class="container"><br>
    <p style="font-family: 'Times New Roman', serif;">
      Ini bukanlah sebuah tes seperti tes pada umumnya yang harus memutar otak. Jawaban kamu tidak dinilai benar atau salah, tetapi penilaian tergantung kejujuran dan ketepatan Anda menjawab soal.
    </p>
    <ul style="font-family: 'Times New Roman', serif;">
      <li>Pilih salah satu pernyataan yang paling sesuai dengan diri Anda.</li>
      <li>Tes ini terdiri dari 52 pernyataan yang perlu Anda jawab dengan jujur sesuai dengan kondisi yang Anda alami, Anda yakini atau Anda rasakan.</li>
      <li>Setelah membaca setiap pernyataan dengan cermat, pilihlah jawaban yang paling menggambarkan diri Anda.</li>
      <li>Tidak ada jawaban benar atau salah, jadi pilih yang paling mendekati diri Anda.</li>
      <li>Harap pastikan untuk membaca semua pernyataan dengan cermat dan jujur sebelum menentukan pilihan Anda.</li>
    </ul><br>
  </div>
</div>

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          
            <form id="questionForm" method="POST" action="{{ route('angket.store') }}">
              @csrf 
              <div id="question-container"></div>
              <input type="hidden" name="all_jawaban" id="allJawaban">
              <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-primary btn-nav" id="btnPrevious">Previous</button>
                <button type="button" class="btn btn-primary btn-nav" id="btnNext">Next</button>
              </div>
            </form>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            

            <div class="service-box p-3 bg-light rounded">
              <h4 class="text-center">Navigasi Angket MAI</h4>
              <div id="navigation-buttons" class="d-flex flex-wrap" style="margin-left: 20px;">
                <!-- @for ($i = 1; $i <= 52; $i++)
                  <button type="button" class="btn btn-outline-primary m-1" style="width: 50px;">{{ $i }}</button>
                @endfor -->
              </div>
            </div>
<br>
<button type="submit" form="questionForm" class="btn btn-success mt-3 w-100" id="btnSubmit" disabled>Submit</button>
<br>

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Have a Question?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+62 8155 3021 636</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">rsmdewis2409@gmail.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    const totalQuestions = {{ $angket->count() }};
    const questionsPerPage = 5;
    let currentPage = 0;
    const answers = {};
    const angketData = @json($angket);

    function renderQuestions() {
        $("#question-container").empty();
        let start = currentPage * questionsPerPage;
        let end = Math.min(start + questionsPerPage, totalQuestions);

        for (let i = start; i < end; i++) {
            let item = angketData[i];
            let questionHTML = `
                <div class="card p-3 mb-3 shadow-sm border">
                    <label class="form-label">
                        <strong>${item.no}. ${item.pertanyaan}</strong>
                    </label>
                    <div class="options d-flex flex-wrap gap-3">
                        ${[5, 4, 3, 2, 1].map(value => `
                            <label class="rounded-pill">
                                <input type="radio" name="jawaban[${item.no}]" value="${value}" ${answers[item.no] == value ? "checked" : ""}>
                                ${["Selalu", "Sering", "Kadang-kadang", "Jarang", "Tidak pernah"][5 - value]}
                            </label>
                        `).join("")}
                    </div>
                </div>`;
            $("#question-container").append(questionHTML);
        }
    }

    function renderNavigation() {
      $("#navigation-buttons").empty();
      for (let i = 1; i <= totalQuestions; i++) {
        let pageIndex = Math.floor((i - 1) / questionsPerPage);
        let btnClass = pageIndex === currentPage ? "active-page" : "";
        if (answers[i] !== undefined) btnClass = "answered";

        $("#navigation-buttons").append(`
          <button class="btn btn-outline-primary m-1 ${btnClass}" data-page="${pageIndex}">${i}</button>
        `);
      }
      checkAllAnswered();
    }

    function checkAllAnswered() {
      let allAnswered = Object.keys(answers).length === totalQuestions;
    $("#btnSubmit").prop("disabled", !allAnswered);

    // Simpan semua jawaban ke input hidden
    $("#allJawaban").val(JSON.stringify(answers));
    }

    $("#questionForm").on("change", "input[type=radio]", function () {
      let questionNumber = parseInt($(this).attr("name").match(/\d+/)[0]);
      answers[questionNumber] = $(this).val();
      renderNavigation();
    });

    function updateNavButtons() {
    $("#btnPrevious").prop("disabled", currentPage === 0);
    $("#btnNext").prop("disabled", (currentPage + 1) * questionsPerPage >= totalQuestions); 
}

    $("#btnPrevious").click(function () {
      if (currentPage > 0) {
        currentPage--;
        renderQuestions();
        renderNavigation();
        updateNavButtons();
      }
    });

    $("#btnNext").click(function () {
      if ((currentPage + 1) * questionsPerPage < totalQuestions) {
        currentPage++;
        renderQuestions();
        renderNavigation();
        updateNavButtons();
      }
    });
    $(document).ready(function () {
    renderQuestions();
    renderNavigation();
    updateNavButtons(); // Pastikan tombol dinonaktifkan sesuai kondisi saat halaman pertama dimuat
});

    $("#navigation-buttons").on("click", "button", function () {
      let selectedPage = parseInt($(this).data("page"));
      currentPage = selectedPage;
      renderQuestions();
      renderNavigation();
    });
    $("#questionForm").submit(function () {
      $("#allJawaban").val(JSON.stringify(answers));
    });
    $(document).ready(function () {
      renderQuestions();
      renderNavigation();
    });
  </script>


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
  
