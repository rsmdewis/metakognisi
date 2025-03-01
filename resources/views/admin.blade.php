@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="row">

<div class="container d-lg-flex justify-content-between align-items-center">
    <h2 class="mb-2 mb-lg-0">Dashboard</h2>
    <nav class="breadcrumbs">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<div class="row g-4" style="margin-top: 20px;"> <!-- Added g-3 for grid gap -->
    <div class="col-md-6 col-lg-4"> <!-- Adjusted grid columns -->
        <a href="{{ route('angket.tampil') }}" style="text-decoration: none; display: block;">
            <div class="card" style="background: #f0f4f7; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 100%;">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <p class="card-title" style="font-size: 1.25rem; font-weight: bold; color: #333;">Angket MAI</p>
                    </div>
                    <div class="d-flex align-items-center flex-wrap mb-3">
                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3" style="color: #007bff;">{{ $jumlahAngket }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-4"> <!-- Adjusted grid columns -->
        <a href="{{ route('tampil-mahasiswa') }}" style="text-decoration: none; display: block;">
            <div class="card" style="background: #f0f4f7; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 100%;">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <p class="card-title" style="font-size: 1.25rem; font-weight: bold; color: #333;">Mahasiswa</p>
                    </div>
                    <div class="d-flex align-items-center flex-wrap mb-3">
                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3" style="color: #007bff;">{{ $jumlahMahasiswa }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
          
@endsection