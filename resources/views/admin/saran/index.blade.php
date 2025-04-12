@extends('layouts.app')
@section('title', 'Saran Metakognisi')
@section('content')

<div class="row">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Saran Metakognisi</h2>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <form method="GET" action="{{ route('saran.tampil') }}" class="d-flex w-auto">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Kode Angket / Kategori..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary ms-2" type="submit"><i class="mdi mdi-magnify"></i></button>
                    </form>
                </div>
                <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
    
    

</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th style="width: 10%;">Kode Angket</th>
                            <th style="width: 15%;">Kategori</th>
                            <th style="width: 50%;">Saran</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saranmetakognisi as $index => $saran)
                            <tr>
                                <td>{{ ($saranmetakognisi->currentPage() - 1) * $saranmetakognisi->perPage() + $index + 1 }}</td>
                                <td>{{ $saran->kode_angket }}</td>
                                <td><span class="badge bg-info">{{ $saran->kategori }}</span></td>
                                <td>
                                {!! $saran->saran !!}
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSaranModal{{ $saran->id }}">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </button>

                                
                                </td>
                            </tr>

                            <!-- Modal Edit Saran -->
                            <div class="modal fade" id="editSaranModal{{ $saran->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Saran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('saran.update', $saran->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="kodeAngketEdit" class="form-label">Kode Angket</label>
                                                    <input type="text" class="form-control" name="kode_angket" value="{{ $saran->kode_angket }}" readonly disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategoriEdit" class="form-label">Kategori</label>
                                                    <select class="form-control" name="kategori" readonly disabled>
                                                        <option value="Rendah" {{ $saran->kategori == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                                                        <option value="Sedang" {{ $saran->kategori == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                        <option value="Tinggi" {{ $saran->kategori == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="saranEdit" class="form-label">Saran</label>
                                                                <textarea type="text" class="form-control" id="editSaran{{ $saran->id }}" name="saran" required>{{ $saran->saran }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.config.removePlugins = 'update-notification';
                            CKEDITOR.replace('editSaran{{ $saran->id }}');
                        </script>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $saranmetakognisi->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>


@endsection
