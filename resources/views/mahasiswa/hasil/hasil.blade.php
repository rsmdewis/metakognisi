@extends('layouts.sidebar_mhs')
@section('content')
<div class="content">  
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">Hasil Kemampuan Metakognisi</h1>
        </a>
        <nav id="navmenu" class="navmenu d-none d-lg-block">
            <ul></ul>
        </nav>
        <a class="btn btn-danger d-flex align-items-center" href="{{ route('hasil.pdf') }}">
    <i class="bi bi-save me-2"></i> Download PDF
</a>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </div>
</header>

<main class="main">
    <div class="page-title py-3 bg-light" data-aos="fade"></div>

    <section id="service-details" class="service-details section" style="margin-bottom: 20px; padding-bottom: 10px;padding-top: 15px;">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <br>

                    @if ($hasilAngket)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Metakognisi</th>
                                    <th>Skor</th>
                                    <th>Level</th>
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
                            </tbody>
                        </table>

                         

                    @else
                        <div class="alert alert-warning text-center">
                            <h4>🚀 Tes Metakognisi Belum Dilakukan! 🚀</h4>
                            <p>Silakan lakukan tes metakognisi terlebih dahulu untuk melihat hasil dan mendapatkan saran.</p>
                            <a href="{{ route('angket.show') }}" class="btn btn-primary">Mulai Tes Sekarang</a>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-box p-3 bg-light rounded">
                        <h4 class="text-center">Catatan</h4>
                        @if ($hasilAngket)
                            <p><strong>Hi, {{ Auth::guard('mahasiswa')->user()->nama }}!</strong></p>
                            <p>Kemampuan metakognisimu berada pada kategori <strong>{{ ucfirst($hasil_akhir) }}</strong></p>
                        @endif
                    </div>

                    <!-- <div class="help-box d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-headset help-icon"></i>
                        <h4>Have a Question?</h4>
                        <p><i class="bi bi-telephone me-2"></i> <span>+62 8155 3021 636</span></p>
                        <p><i class="bi bi-envelope me-2"></i> <a href="mailto:rsmdewis2409@gmail.com">rsmdewis2409@gmail.com</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Kotak Saran KM -->
    <div class="card p-3 shadow-sm mb-3">
                            <h5 class="fw-semibold" style="color : #2b6d82;">Saran Knowledge of Metacognition (KM)</h5>
                            
                                    {!! $saran_km !!}
                            
                        </div>

                        <!-- Kotak Saran RM -->
                        <div class="card p-3 shadow-sm">
                            <h5 class="fw-semibold" style="color : #2b6d82;">Saran Regulation of Metacognition (RM)</h5>
                                {!!$saran_rm !!}
                                
                        </div>
</main>
</div>
@endsection
