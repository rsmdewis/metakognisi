@extends('layouts.app')
@section('title', 'Laporan')
@section('content')

<div class="row">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Laporan</h2>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <label for="show" class="text-black">show:</label>
                            <select id="show" class="form-select form-select-sm">
                                <option selected>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </div>
                        <div class="input-group w-auto">
    <input type="text" class="form-control form-control-sm" placeholder="Search...">
    <button class="btn btn-outline-primary" type="button"><i class="mdi mdi-magnify"></i></button>
    <button type="button" class="btn btn-warning" style="margin-left: 10px;"><i class="mdi mdi-printer" ></i> Cetak</button> 
    <button type="button" class="btn btn-danger" style="margin-left: 10px;"><i class="mdi mdi-download"></i> Unduh</button>
</div>

                        
                    </div>

                    <table class="table table-striped">
                    <thead>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th colspan="2">Knowledge of Metacognition (KM)</th>
        <th colspan="2">Regulation of Metacognition (RM)</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th>Nilai</th>
        <th>Level</th>
        <th>Nilai</th>
        <th>Level</th>
    </tr>
</thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>85</td>
                                <td>Advanced</td>
                                <td>90</td>
                                <td>Expert</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>78</td>
                                <td>Intermediate</td>
                                <td>88</td>
                                <td>Advanced</td>
                            </tr>
                            <!-- Tambahkan baris data sesuai kebutuhan -->
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="dataTables_info">Showing 1 to 1 of 1 entries</div>
                        <div class="dataTables_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled"><a href="#" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="paginate_button page-item next disabled"><a href="#" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
