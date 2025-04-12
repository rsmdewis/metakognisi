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
                    <form method="GET" action="{{ route('laporan.hasil') }}" class="d-flex mb-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari NIM/Nama..." value="{{ request('search') }}">
                        
                        <select name="filter_km" class="form-select me-2">
                            <option value="">KM Level</option>
                            <option value="Rendah" {{ request('filter_km') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="Sedang" {{ request('filter_km') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Tinggi" {{ request('filter_km') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>

                        <select name="filter_rm" class="form-select me-2">
                            <option value="">RM Level</option>
                            <option value="Rendah" {{ request('filter_rm') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="Sedang" {{ request('filter_rm') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Tinggi" {{ request('filter_rm') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>

                        <select name="filter_metakognisi" class="form-select me-2">
                            <option value="">Metakognisi</option>
                            <option value="Rendah" {{ request('filter_metakognisi') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="Sedang" {{ request('filter_metakognisi') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Tinggi" {{ request('filter_metakognisi') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>

                            <button type="submit" class="btn btn-outline-primary me-2"><i class="mdi mdi-magnify"></i></button>
                            <a href="{{ route('laporan.download', request()->query()) }}" class="btn btn-danger"><i class="mdi mdi-download"></i> Download</a>
                        </div>
                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><strong>No.</strong></th>
                                <th><strong>Nim</strong></th>
                                <th><strong>Nama</strong></th>
                                <th colspan="2"><strong>Knowledge of Metacognition (KM)</strong></th>
                                <th colspan="2"><strong>Regulation of Metacognition (RM)</strong></th>
                                <th><strong>Metakognisi</strong></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><strong>Nilai</strong></th>
                                <th><strong>Level</strong></th>
                                <th><strong>Nilai</strong></th>
                                <th><strong>Level</strong></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['nim'] }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['nilai_km'] }}</td>
                                    <td>{{ $item['kategori_km'] }}</td>
                                    <td>{{ $item['nilai_rm'] }}</td>
                                    <td>{{ $item['kategori_rm'] }}</td>
                                    <td>{{ $item['metakognisi'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="dataTables_info">Showing {{ count($data) }} entries</div>
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
