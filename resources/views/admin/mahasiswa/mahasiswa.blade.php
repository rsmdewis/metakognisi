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
                        <button class="btn btn-outline-primary ms-2" type="submit">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </form>

                    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addMahasiswa">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Mahasiswa
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>no</th>
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
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-warning btn-icon-text" data-bs-toggle="modal" data-bs-target="#editMahasiswa{{ $mhs->nim }}">
                                            <i class="mdi mdi-pencil btn-icon-prepend"></i> Edit
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('mahasiswa.delete', $mhs->nim) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-icon-text" onclick="return confirm('Apakah Kamu Yakin?');">
                                                <span class="mdi mdi-delete btn-icon-prepend"></span> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $mahasiswa->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="addMahasiswa" tabindex="-1" aria-labelledby="addMahasiswaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="registerForm"action="{{ route('tambah-mahasiswa') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Mahasiswa -->
@foreach($mahasiswa as $mhs)
<div class="modal fade" id="editMahasiswa{{ $mhs->nim }}" tabindex="-1" aria-labelledby="editMahasiswaLabel{{ $mhs->nim }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editMahasiswa{{ $mhs->nim }}"action="{{ route('edit-mahasiswa', $mhs->nim) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="{{ $mhs->nim }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $mhs->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $mhs->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("input[required]").forEach(input => {
        let errorMessage = document.createElement("div");
        errorMessage.classList.add("text-danger", "small", "error-message");
        errorMessage.style.display = "none"; // Sembunyikan dulu pesan error
        input.parentNode.appendChild(errorMessage);

        input.addEventListener("invalid", function(event) {
            event.preventDefault(); // Mencegah pesan default browser
            errorMessage.textContent = "Harus diisi"; 
            errorMessage.style.display = "block"; // Tampilkan pesan error
            input.classList.add("is-invalid");
        });

        input.addEventListener("input", function() {
            errorMessage.style.display = "none"; // Sembunyikan jika mulai mengetik
            input.classList.remove("is-invalid");
        });
    });
});
function isValidEmailFormat(email) {
    // Regular expression to check if email2 has @gmail.com domain
    var regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/i;
    return regex.test(email);
}
function validateRegister(event) {
    event.preventDefault(); // Mencegah form dikirim sebelum validasi

    let nim = document.getElementById("nim").value.trim();
    let email = document.getElementById("email").value.trim();
    let nimError = document.getElementById("nimError");
    let emailError = document.getElementById("emailError");
    
    nimError.style.display = "none";
    emailError.style.display = "none";

    if (!isValidEmailFormat(email)) {
            alert("Format email salah. Email harus memiliki domain @gmail.com.");
            this.style.borderColor = 'red';
            return;
        }
    fetch(`/check-nim?nim=${nim}`)
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                nimError.textContent = "NIM sudah terdaftar. Silakan gunakan NIM yang lain.";
                nimError.style.display = "block";
                return;
            }
            
            // Cek apakah email sudah terdaftar
            fetch(`/check-email?email=${email}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        emailError.textContent = "Email sudah terdaftar. Silakan gunakan email yang lain.";
                        emailError.style.display = "block";
                    } else {
                        document.getElementById("registerForm").submit();
                    }
                });
        });
}

document.getElementById("registerForm").addEventListener("submit", validateRegister);
function validateEdit(nim) {
    let emailInput = document.getElementById("edit_email" + nim);
    let emailError = document.getElementById("edit_emailError" + nim);
    let email = emailInput.value.trim();
    
    emailError.style.display = "none";

    if (!isValidEmailFormat(email)) {
        emailError.textContent = "Format email salah. Harus menggunakan @gmail.com.";
        emailError.style.display = "block";
        return false;
    }

    fetch(`/check-email?email=${email}&nim=${nim}`)
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                emailError.textContent = "Email sudah terdaftar. Silakan gunakan email yang lain.";
                emailError.style.display = "block";
                return false;
            } else {
                document.getElementById("editForm" + nim).submit();
            }
        });

    return false;
}
document.querySelectorAll("form[id^='editForm']").forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            let nim = this.getAttribute("data-nim"); // Ambil NIM dari atribut data-nim
            validateEdit(nim);
        });
    });
// document.getElementById("nim").addEventListener("blur", function() {
//     var nim = this.value;
//     if (nim.trim() !== '') {
//         fetch(`/check-nim?nim=${nim}`)
//         .then(response => response.json())
//         .then(data => {
//             if (data.exists) {
//                 alert("nim sudah terdaftar. Silakan gunakan nim yang lain.");
//                 // Optionally, you could add a visual indicator like changing the border color
//                 document.getElementById("nim").style.borderColor = 'red';
//             } else {
//                 // Reset to default style if the user changes to a valid nim
//                 document.getElementById("nim").style.borderColor = '';
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
//     }
// });

// document.getElementById("email").addEventListener("blur", function() {
//     var email = this.value.trim();
//     if (email !== '') {
//         // Validate email format
//         if (!isValidEmailFormat(email)) {
//             alert("Format email salah. Email harus memiliki domain @gmail.com.");
//             this.style.borderColor = 'red';
//             return;
//         }

//         // Check if email is already registered
//         fetch(`/check-email?email=${email}`)
//         .then(response => response.json())
//         .then(data => {
//             if (data.exists) {
//                 alert("Email sudah terdaftar. Silakan gunakan email yang lain.");
//                 this.style.borderColor = 'red';
//             } else {
//                 // Reset to default style if the user changes to a valid email
//                 this.style.borderColor = '';
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
//     }
// });

// function isValidEmailFormat(email) {
//     // Regular expression to check if email2 has @gmail.com domain
//     var regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/i;
//     return regex.test(email);
// }



// // Tambahkan event listener ke setiap input
// document.querySelectorAll("#addMahasiswa input[required]").forEach(input => {
//     input.addEventListener("input", checkFormValidity);
// });

// // Pastikan tombol submit tidak bisa diklik jika masih ada kesalahan
// document.querySelector("#addMahasiswa form").addEventListener("submit", function (event) {
//     checkFormValidity();
//     if (this.querySelector("button[type='Submit']").disabled) {
//         event.preventDefault();
//         alert("Harap isi semua bidang dengan benar sebelum mengirim.");
//     }
// });
</script>
@endsection
