<!DOCTYPE html>
<html>

<head>
    <title>Kartu Pendaftaran Vaksinasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center mb-3">Absensi Pelatihan</h2>
    <div class="row table-responsive table-bordered">
        <table class="table">
            <thead>
                <tr class="text-sm-center text-truncate">
                    <th scope="col">Tanggal Pelatihan</th>
                    <th scope="col">Jenis Pelatihan</th>
                    <th scope="col">Sesi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $daftar)
                    <tr>
                        <td class="text-sm-center">{{ $daftar->tanggal_pelatihan }}</td>
                        <td class="text-sm-center">{{ $daftar->jenis_pelatihan }}</td>
                        <td class="text-sm-center">{{ $daftar->sesi }}</td>
                        <td class="text-sm-center">{{ $daftar->nama }}</td>
                        <td class="text-sm-center"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
