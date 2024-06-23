@extends('layouts.app')
@section('title', 'Grafik')
@section('content')

          <div class="row">
          <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Grafik</h2>
        <nav class="breadcrumbs">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" style="margin-bottom: 20px;">Grafik</li>
          </ol>
        </nav>
      </div>
      <div class="container d-lg-flex justify-content-between align-items-center">
      <canvas id="metakognisiChart" width="400" height="400" ></canvas>
      </div>
      </div>

    <script>
        // Data KM dan RM
        const dataKM = [75, 80, 85, 90]; // Contoh data Knowledge of Metacognition
        const dataRM = [70, 75, 80, 85]; // Contoh data Regulation of Metacognition

        // Nama label pada sumbu X
        const labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];

        // Konfigurasi grafik
        const config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Knowledge of Metacognition (KM)',
                    data: dataKM,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna untuk KM
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Regulation of Metacognition (RM)',
                    data: dataRM,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Warna untuk RM
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Menggambar grafik
        var ctx = document.getElementById('metakognisiChart').getContext('2d');
        new Chart(ctx, config);
    </script>
          

@endsection