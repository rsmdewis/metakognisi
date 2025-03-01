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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <form method="GET" action="{{ route('tampil-mahasiswa') }}" class="d-flex w-auto">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary ms-2" type="submit"><i class="mdi mdi-magnify"></i></button>
                </form>
    
                    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addMahasiwa">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Mahasiswa
                    </button>
                </div>
                <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
    
    

</div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mahasiswa as $index => $mhs)
                            <tr>
                                
                            <td>{{ ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() + $index + 1 }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>
                            <!-- Tombol edit -->
                            <button class="btn btn-sm btn-warning btn-icon-text" type="button"  data-toggle="modal" data-target="#ubahBiodataModal{{ $mhs->nim }}">
                                <i class="mdi mdi-pencil btn-icon-prepend"></i>
                                Edit
                            </button>
                            <!-- Tombol hapus -->
                            <form action="{{ route('mahasiswa.delete', $mhs->nim) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon-text" data-toggle="tooltip" title="Hapus Admin Desa" onclick="return confirm('Apakah Kamu Yakin?');">
                            <span class="mdi mdi-delete btn-icon-prepend"></span> Hapus
                        </button>
                        </form>
                        </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="dataTables_paginate ms-auto">
                        <ul class="pagination">
                                
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $mahasiswa->appends(request()->query())->links('pagination::bootstrap-5') }}
                                </div>
                            </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addMahasiwa" tabindex="-1" role="dialog" aria-labelledby="addMahasiwaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMahasiwaLabel">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 0.75rem;"></button>

            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('tambah-mahasiswa') }}">
              @csrf
              <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda">
  </div>
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Anda">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda">
  </div>
  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="Submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
