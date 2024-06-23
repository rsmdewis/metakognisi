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
    
            <div class="col-12 col-xl-6 grid-margin stretch-card" style="margin-top: 20px;">
              <div class="row w-100 flex-grow">
                
              <div class="col-md-6 stretch-card">
  <div class="card" style="background: #f0f4f7; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between flex-wrap">
        <p class="card-title" style="font-size: 1.25rem; font-weight: bold; color: #333;">Angket MAI</p>
        <p class="text-success font-weight-medium" style="color: #28a745;">20.15 %</p>
      </div>
      <div class="d-flex align-items-center flex-wrap mb-3">
        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3" style="color: #007bff;">52</h5>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 stretch-card">
  <div class="card" style="background: #f0f4f7; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between flex-wrap">
        <p class="card-title" style="font-size: 1.25rem; font-weight: bold; color: #333;">Mahasiswa</p>
        <p class="text-success font-weight-medium" style="color: #28a745;">45.39 %</p>
      </div>
      <div class="d-flex align-items-center flex-wrap mb-3">
        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3" style="color: #007bff;">48</h5>
      </div>
    </div>
  </div>
</div>

              </div>
            </div>
            
          </div>
          
@endsection