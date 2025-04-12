@extends('layouts.sidebar_mhs')
@section('content')
  <!-- Page content -->
  <div class="content">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
      </a>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </div>
  </header>

  <main class="main">
  

      <div class="container">
      <div class="container section-title" data-aos="fade-up">
        <h2>Kenali Kemampuan Metakognisi Anda</h2>
        <!-- <p>Dengan Mengikuti Tes Metakognisi dengan Angket Metacognitive Awareness inventory</p> -->
        <div class="row gy">
        <div class="col-lg" data-aos="zoom-in" data-aos-delay="100">
          <div class="card shadow-sm border rounded-3 p-3 " style="font-family: 'Times New Roman', serif; text-align: left;">
            {!!$skenario->skenario !!}
          </div>
        </div>
      </div>
      </div><!-- End Section Title -->
      <div class="row gy-4">
        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card shadow-sm border rounded-3 p-3 text-center" style="font-family: 'Times New Roman', serif;">
            <i class="bi bi-card-list fs-3 mb-2"></i>
            <p>Angket Metacognitive Awareness Inventory (MAI) terdiri dari 52 pernyataan, di mana Anda diminta mengukur posisi Anda dalam menjawab pertanyaan dengan pilihan "Selalu", "Sering", "Kadang-kadang", "Jarang", "Tidak Pernah".</p>
          </div>
        </div>

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="card shadow-sm border rounded-3 p-3 text-center " style="font-family: 'Times New Roman', serif;">
            <i class="bi bi-clock fs-3 mb-2"></i>
            <p>Waktu pengerjaan tes sekitar 15 menit. Baca dengan seksama dan pahami setiap pernyataan yang tersedia.</p>
          </div>
        </div>

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="card shadow-sm border rounded-3 p-3 text-center" style="font-family: 'Times New Roman', serif;">
            <i class="bi bi-check-circle fs-3 mb-2"></i>
            <p>Baca dengan cermat setiap skala dan berikan respon kesesuaian kondisi yang sedang Anda alami. Selamat mengerjakan!</p>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="button-container">
      <button class="custom-btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#startTestModal">Mulai Tes</button>
    </div>
  </main>
  </div>
<!-- Modal -->
<div class="modal fade" id="startTestModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center w-100">
          <h5 class="modal-title fw-bold w-100" id="modalLabel" style="font-family: 'Times New Roman', serif;">Mohon Perhatikan</h5>
        </div>
        <div class="modal-body" style="font-family: 'Times New Roman', serif;">
          <p>Ini bukanlah sebuah tes seperti tes pada umumnya yang harus memutar otak. Jawaban kamu tidak dinilai benar atau salah, tetapi penilaian tergantung kejujuran dan ketepatan Anda menjawab soal.</p>
          <ul>
            <li>Pilih salah satu pernyataan yang paling sesuai dengan diri Anda.</li>
            <li>Tes ini terdiri dari 52 pernyataan yang perlu Anda jawab dengan jujur sesuai dengan kondisi yang Anda alami, Anda yakini atau Anda rasakan.</li>
            <li>Setelah membaca setiap pernyataan dengan cermat, pilihlah jawaban yang paling menggambarkan diri Anda.</li>
            <li>Tidak ada jawaban benar atau salah, jadi pilih yang paling mendekati diri Anda.</li>
            <li>Harap pastikan untuk membaca semua pernyataan dengan cermat dan jujur sebelum menentukan pilihan Anda.</li>
          </ul>
        </div>
        <div class="button-container">
          <a href="{{ route('angketmai.show') }}" class="custom-btn btn-primary-custom">Mulai Mengerjakan</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endsection
