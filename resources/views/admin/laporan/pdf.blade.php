<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Metakognisi</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2 align="center">Laporan Metakognisi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Nilai KM</th>
                <th>Level KM</th>
                <th>Nilai RM</th>
                <th>Level RM</th>
                <th>Metakognisi</th>
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
</body>
</html>
