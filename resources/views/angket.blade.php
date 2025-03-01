@extends('layouts.sidebar_mhs')
@section('content')
  <!-- Page content -->
  <div class="content">
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
       
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          
            <form id="questionForm">
              <div id="question-container"></div>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary" id="btnPrevious">Previous</button>
                <button type="button" class="btn btn-primary" id="btnNext">Next</button>
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
  const totalQuestions = {{ $angket->count() }};  // Jumlah total pertanyaan dari database
    const questionsPerPage = 5;
    let currentPage = 0;
    const answers = {};
    const angketData = @json($angket); // Data dari Blade ke JavaScript

    function renderQuestions() {
        $("#question-container").empty();
        let start = currentPage * questionsPerPage;
        let end = Math.min(start + questionsPerPage, totalQuestions);

        for (let i = start; i < end; i++) {
            let item = angketData[i]; // Ambil data pertanyaan sesuai index

            let questionHTML = `
                <div class="mb-4">
                    <label class="form-label">
                        <strong>${item.no}. ${item.pertanyaan}</strong>
                    </label>
                    <div class="options d-flex flex-wrap gap-3">
                        ${[4, 3, 2, 1, 0].map(value => `
                            <label class="rounded-pill">
                                <input type="radio" name="q${item.no}" value="${value}" ${answers[item.no] == value ? "checked" : ""}>
                                ${["Selalu", "Sering", "Kadang-kadang", "Jarang", "Tidak pernah"][4 - value]}
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
  }

  $("#questionForm").on("change", "input[type=radio]", function () {
    let name = $(this).attr("name");
    let questionNumber = parseInt(name.replace("q", ""));
    answers[questionNumber] = $(this).val();
    renderNavigation();
  });

  $("#btnPrevious").click(function () {
    if (currentPage > 0) {
      currentPage--;
      renderQuestions();
      renderNavigation();
    }
  });

  $("#btnNext").click(function () {
    if ((currentPage + 1) * questionsPerPage < totalQuestions) {
      currentPage++;
      renderQuestions();
      renderNavigation();
    }
  });

  $("#navigation-buttons").on("click", "button", function () {
    let selectedPage = parseInt($(this).data("page"));
    currentPage = selectedPage;
    renderQuestions();
    renderNavigation();
  });

  $(document).ready(function () {
    renderQuestions();
    renderNavigation();
  });
</script>

@endsection
