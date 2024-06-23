@extends('layouts.app')
@section('title', 'Mahasiswa')
@section('content')

<div class="row">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Mahasiswa</h2>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
    <label for="show" class="text-dark" >show:</label>
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
</div>

</div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Nama</th>
                                <th>Level KM</th>
                                <th>Level RM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">1.</td>
                                <td>Risma Dewi Septiani</td>
                                <td>Tinggi</td>
                                <td>Sedang</td>
                                <td>
                                <button type="button" class="btn btn-primary btn-sm"><i class="mdi mdi-arrow-right"></i> Detail</button>

                                </td>
                            </tr>
                            <!-- Tambahkan baris data lainnya di sini -->
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
