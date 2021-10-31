<!DOCTYPE html>
<html>

<head>
    <title>Kartu Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;

        }

        div {
            background: linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), ;
            background-image: url('https://i.ibb.co/WsHfz4v/skills.png');
            opacity: 0.5;
            background-size: cover;
        }

    </style>
</head>

<body>
    <div>
        <h5 class="text-center">Kartu Pelatihan</h5>
        <table class="table table-sm">
            <tr>
                <th scope="col" class="h6">Nomor Pendaftaran</th>
                <td class="h6">: {{ $daftar->kode_unik }}</td>
            </tr>
            <tr>
                <th scope="col" class="h6">Nama</th>
                <td class="h6">: {{ $daftar->nama }}</td>
            </tr>
            <tr>
                <th scope="col" class="h6">Tempat, Tgl Lahir</th>
                <td class="h6">: {{ $daftar->tempat_lahir }},
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th scope="col" class="h6">Jenis Pelatihan</th>
                <td class="h6">: {{ $daftar->jenis_pelatihan }}</td>
            </tr>
            <tr>
                <th scope="col" class="h6">Sesi</th>
                <td class="h6">: {{ $daftar->sesi }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
