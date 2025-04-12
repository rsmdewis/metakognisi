@extends('layouts.sidebar_mhs')
@section('content')

  <!-- Page content -->
  <div class="content">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Profile</h1>
      </a>

      <nav id="navmenu" class="navmenu d-none d-lg-block">
        <ul>
          <!-- Add navigation items here if needed -->
        </ul>
      </nav>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </div>
  </header>

  <div class="container mt-5">
    <div class="card shadow-lg p-4">
    <div class="d-flex justify-content-end">
    <button class="btn" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="background-color: #388da8; color: #fff;">Edit Profile</button>
</div>

        @php
            $mahasiswa = auth()->guard('mahasiswa')->user();
        @endphp

        @if ($mahasiswa)
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama</th>
                        <td>{{ $mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td>{{ $mahasiswa->nim }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $mahasiswa->email }}</td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><span class="text-muted" style="font-style: italic; font-size: 12px;">Lakukan edit profil jika ingin mengubah password.</span></td>
                    </tr>
                </table>
            </div>
        @else
            <p class="text-center text-danger">Anda belum login.</p>
        @endif
    </div>
</div>

<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mahasiswa.updateProfile') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>NIM</strong></label>
                        <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" autofocus readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Nama</strong></label>
                        <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Email</strong></label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $mahasiswa->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Password Baru</strong> <span>(kosongkan jika tidak ingin mengubah)</span></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("input[required]").forEach(input => {
        let errorMessage = document.createElement("div");
        errorMessage.classList.add("text-danger", "small", "error-message");
        errorMessage.style.display = "none"; // Sembunyikan dulu pesan error
        input.parentNode.appendChild(errorMessage);

        input.addEventListener("invalid", function(event) {
            event.preventDefault(); // Mencegah pesan default browser
            errorMessage.textContent = "Wajib diisi"; 
            errorMessage.style.display = "block"; // Tampilkan pesan error
            input.classList.add("is-invalid");
        });

        input.addEventListener("input", function() {
            errorMessage.style.display = "none"; // Sembunyikan jika mulai mengetik
            input.classList.remove("is-invalid");
        });
    });
});
document.getElementById("email").addEventListener("blur", function() {
        var email = this.value.trim();
        var loggedInEmail = "{{ $mahasiswa->email }}"; // Ambil email yang sedang login

        if (email !== '' && email !== loggedInEmail) {
            if (!isValidEmailFormat(email)) {
                alert("Format email salah. Email harus memiliki domain @gmail.com.");
                this.style.borderColor = 'red';
                return;
            }

            fetch(`/check-email?email=${email}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        alert("Email sudah terdaftar. Silakan gunakan email yang lain.");
                        this.style.borderColor = 'red';
                    } else {
                        this.style.borderColor = '';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

    function isValidEmailFormat(email) {
        var regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/i;
        return regex.test(email);
    }
</script>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endsection
