@extends('layouts.app')
@section('title', 'Angket KM')
@section('content')

<div class="row">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Angket Metacognitive Awarness inventory (MAI)</h2>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Angket / KM</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                <form method="GET" action="{{ route('angket.tampil') }}" class="d-flex w-auto">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary ms-2" type="submit"><i class="mdi mdi-magnify"></i></button>
                </form>
                    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addAngketModal">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Angket
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No.</th>
                                <th style="width: 10%;">Kode</th>
                                <th style="width: 10%;">Sub Kode</th>
                                <th style="width: 50%;">Pertanyaan</th>
                                <th style="width: 25%;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                    @foreach($angketmetakognisi as $index => $angket)
                            <tr>
                                
                            <td>{{ ($angketmetakognisi->currentPage() - 1) * $angketmetakognisi->perPage() + $index + 1 }}</td>
                        <td>{{ $angket->kode_angket }}</td>
                        <td>{{ $angket->kode_subangket }}</td>
                        <td>{{ $angket->pertanyaan }}</td>
                        <td>
                            <!-- Tombol edit -->
                            <button class="btn btn-sm btn-warning btn-icon-text" type="button"  data-toggle="modal" data-target="#ubahBiodataModal{{ $angket->id }}">
                                <i class="mdi mdi-pencil btn-icon-prepend"></i>
                                Edit
                            </button>
                            <!-- Tombol hapus -->
                            <form action="{{ route('angket.delete', $angket->id) }}" method="POST" style="display: inline-block;">
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
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    
                    <div class="dataTables_paginate ms-auto">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <div class="d-flex justify-content-center mt-4">
                                {{ $angketmetakognisi->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </div>
                            </ul>
                        </nav>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addAngketModal" tabindex="-1" role="dialog" aria-labelledby="addAngketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAngketModalLabel">Tambah Angket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 0.75rem;"></button>

            </div>
            <div class="modal-body">
            <form id="angketForm" action="{{ route('tambah.angket') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="no" class="form-label">Nomor</label>
                        <input type="number" class="form-control" id="no" name="no" placeholder="Masukkan nomor angket" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodeAngket" class="form-label">Kode Angket</label>
                        <select class="form-control" id="kodeAngket" name="kode_angket" required>
                            <option value="">Pilih Kode Angket</option>
                            <!-- Pilihan Kode Angket akan diisi menggunakan AJAX -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kodeSubAngket" class="form-label">Kode Sub Angket</label>
                        <select class="form-control" id="kodeSubAngket" name="kode_subangket" disabled required>
                            <option value="">Pilih Kode Sub Angket</option>
                            <!-- Pilihan Kode Sub Angket akan diisi setelah memilih Kode Angket -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pertanyaanAngket" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaanAngket" name="pertanyaan" placeholder="Masukkan pertanyaan angket" required>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
// Mengambil data Kode Angket dari server menggunakan AJAX
fetch('/kode-angket')
    .then(response => response.json())
    .then(data => {
        const kodeAngketSelect = document.getElementById('kodeAngket');
        data.forEach(kode => {
            const option = document.createElement('option');
            option.value = kode.kode_angket;
            option.textContent = kode.nama;
            kodeAngketSelect.appendChild(option);
        });
    });

// Menangani perubahan pilihan Kode Angket dan mengambil Sub Angket sesuai Kode Angket yang dipilih
document.getElementById('kodeAngket').addEventListener('change', function() {
    const kodeSubAngketSelect = document.getElementById('kodeSubAngket');
    const selectedKodeAngket = this.value;

    if (selectedKodeAngket) {
        fetch(`/sub-angket/${selectedKodeAngket}`)
            .then(response => response.json())
            .then(subAngkets => {
                kodeSubAngketSelect.innerHTML = '<option value="">Pilih Kode Sub Angket</option>';
                subAngkets.forEach(subAngket => {
                    const option = document.createElement('option');
                    option.value = subAngket.kode_subangket;
                    option.textContent = subAngket.nama;
                    kodeSubAngketSelect.appendChild(option);
                });
                kodeSubAngketSelect.disabled = false;
            });
    } else {
        kodeSubAngketSelect.innerHTML = '<option value="">Pilih Kode Sub Angket</option>';
        kodeSubAngketSelect.disabled = true;
    }
});

// Simpan data Angket
document.getElementById('saveAngketButton').addEventListener('click', function() {
    const form = document.getElementById('angketForm');
    if (form.checkValidity()) {
        const nomor = document.getElementById('no').value;
        const kodeAngket = document.getElementById('kodeAngket').value;
        const kodeSubAngket = document.getElementById('kodeSubAngket').value;
        const pertanyaan = document.getElementById('pertanyaanAngket').value;

        // Simpan data ke server atau lakukan aksi lainnya
        console.log('Nomor:', nomor);
        console.log('Kode Angket:', kodeAngket);
        console.log('Kode Sub Angket:', kodeSubAngket);
        console.log('Pertanyaan:', pertanyaan);

        // Tutup modal setelah data disimpan
        $('#addAngketModal').modal('hide');
    } else {
        form.reportValidity(); // Menampilkan pesan validasi jika form tidak lengkap
    }
});
</script>
@endsection
