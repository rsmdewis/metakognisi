<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kemampuan Metakognisi</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 40px;
            padding: 40px;
            max-width: 800px;
            margin: auto;
            line-height: 1.3; /* Mengurangi jarak antar baris */
            font-size: 12pt; /* Ukuran default untuk paragraf */
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        h2, h3, h4 {
            font-size: 14pt;
            text-align: center;
            margin: 3px 0;
        }
        h2 {
            font-weight: bold;
        }
        .content {
            text-align: justify;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>POLITEKNIK NEGERI JEMBER</h2>
        <h3>JURUSAN TEKNOLOGI INFORMASI</h3>
        <h4>PROGRAM STUDI TEKNIK INFORMATIKA</h4>
        <p style="font-size: 12pt; font-style: italic;padding: 0 20px; margin-top: 0; margin-bottom: 5px;">
    Alamat: Jl. Mastrip No.164, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121
</p>    </div>
<hr>
    <h2 style="text-align: center; font-size: 14pt; font-weight: bold;padding-top: 15px;">HASIL KEMAMPUAN METAKOGNISI</h2>

    <div class="content">
        <p>Kepada Yth.<br>
        <strong>{{ $mahasiswa->nama }}</strong><br>
        <strong>{{ $mahasiswa->nim }}</strong><br>
        {{ $mahasiswa->email }}</p>

        <p>Dengan hormat,</p>

        <p>Berdasarkan hasil pengisian angket <i>Metacognitive Awareness Inventory (MAI)</i> yang telah Anda selesaikan, berikut adalah hasil analisis kemampuan metakognisi Anda:</p>

        <table>
            <tr>
                <th>No</th>
                <th>Kemampuan Metakognisi</th>
                <th>Skor</th>
                <th>Kategori</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Knowledge of Cognition (KM)</td>
                <td>{{ $hasilAngket->nilai_km }}</td>
                <td><strong>{{ ucfirst($kategori_km) }}</strong></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Regulation of Cognition (RM)</td>
                <td>{{ $hasilAngket->nilai_rm }}</td>
                <td><strong>{{ ucfirst($kategori_rm) }}</strong></td>
            </tr>
        </table>

        <p><strong>Kategori Kemampuan Metakognisi Anda: </strong><strong>{{ ucfirst($hasil_akhir) }}</strong></p>

        <p><strong>Knowledge of Cognition (KM):</strong> {!! $saran_km !!}</p>
        <p><strong>Regulation of Cognition (RM):</strong> {!! $saran_rm !!}</p>

        <p>Demikian surat hasil kemampuan metakognisi ini kami lampirkan. Semoga dapat menjadi acuan bagi Anda dalam meningkatkan strategi belajar dan berpikir secara lebih efektif.</p>
        <p>Atas perhatian dan kerja sama Anda, kami ucapkan terima kasih.</p>
        
    </div>

    
      

</body>
</html>
