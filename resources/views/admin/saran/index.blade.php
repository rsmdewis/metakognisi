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
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary ms-2" type="submit"><i class="mdi mdi-magnify"></i></button>
                </form>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSaranModal">
            <i class="mdi mdi-plus"></i> Tambah Saran
        </button>
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
                                    <ul>
                                        @foreach(explode('; ', $saran->saran) as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSaranModal{{ $saran->id }}">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('saran.delete', $saran->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus saran ini?');">
                                            <i class="mdi mdi-delete"></i> Hapus
                                        </button>
                                    </form>
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
                                                    <input type="text" class="form-control" name="kode_angket" value="{{ $saran->kode_angket }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategoriEdit" class="form-label">Kategori</label>
                                                    <select class="form-control" name="kategori" required>
                                                        <option value="Rendah" {{ $saran->kategori == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                                                        <option value="Sedang" {{ $saran->kategori == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                        <option value="Tinggi" {{ $saran->kategori == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="saranEdit" class="form-label">Saran</label>
                                                    <div id="editSaranContainer{{ $saran->id }}">
                                                        @foreach(explode('; ', $saran->saran) as $item)
                                                            <div class="input-group mb-2 saran-item">
                                                                <input type="text" class="form-control" name="saran[]" value="{{ trim($item) }}" required>
                                                                <button type="button" class="btn btn-danger remove-saran">
                                                                    <i class="mdi mdi-trash-can"></i>
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button type="button" class="btn btn-success" onclick="addEditSaranInput({{ $saran->id }})">
                                                        + Tambah Saran
                                                    </button>
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

<!-- Modal Tambah Saran -->
<div class="modal fade" id="addSaranModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Saran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('tambah.saran') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kodeAngket" class="form-label">Kode Angket</label>
                        <select class="form-control" id="kodeAngket" name="kode_angket" required>
                            <option value="">Pilih Kode Angket</option>
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                </div>
                <div class="mb-3">
                <!-- Tempat Input Saran -->
                <div id="inputSaranContainer">
                    <div class="input-group mb-2 saran-item">
                        <input type="text" class="form-control" name="saran[]" placeholder="Masukkan saran..." required>
                        <button type="button" class="btn btn-danger remove-saran">
                            <i class="mdi mdi-trash-can"></i> 
                        </button>
                    </div>
                </div>
                <button type="button" class="btn btn-success mb-3" id="addSaranButton">
                    + Tambah Input Saran
                </button>
                    
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
    document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("inputSaranContainer");
    const addButton = document.getElementById("addSaranButton");

    // Tambah input saran baru
    addButton.addEventListener("click", function () {
        const newInput = document.createElement("div");
        newInput.classList.add("input-group", "mb-2", "saran-item");
        newInput.innerHTML = `
            <input type="text" class="form-control" name="saran[]" placeholder="Masukkan saran..." required>
            <button type="button" class="btn btn-danger remove-saran">
                <i class="mdi mdi-trash-can"></i> <!-- Ikon Delete -->
            </button>
        `;
        container.appendChild(newInput);
    });

    // Hapus input saran
    container.addEventListener("click", function (event) {
        if (event.target.closest(".remove-saran")) {
            event.target.closest(".saran-item").remove();
        }
    });
});
function addEditSaranInput(id) {
    const container = document.getElementById(`editSaranContainer${id}`);
    if (!container) return;

    const newInput = document.createElement("div");
    newInput.classList.add("input-group", "mb-2", "saran-item");
    newInput.innerHTML = `
        <input type="text" class="form-control" name="saran[]" placeholder="Masukkan saran..." required>
        <button type="button" class="btn btn-danger remove-saran">
            <i class="mdi mdi-trash-can"></i>
        </button>
    `;
    container.appendChild(newInput);
}

// Hapus input saran di modal edit
document.addEventListener("click", function (event) {
    if (event.target.closest(".remove-saran")) {
        const saranItems = event.target.closest(".saran-item").parentElement.querySelectorAll(".saran-item");
        if (saranItems.length > 1) {
            event.target.closest(".saran-item").remove();
        } else {
            alert("Minimal harus ada satu saran!");
        }
    }
});
</script>

@endsection
