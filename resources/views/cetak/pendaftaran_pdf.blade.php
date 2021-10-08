<!DOCTYPE html>
<html>

<head>
    <title>Kartu Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        div {
            background: linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), ;
            background-image: url('https://i.ibb.co/WsHfz4v/skills.png');
            opacity: 0.5;
            background-size: cover;
        }

    </style>
</head>

<body>
    <div class="col-sm-6 pl-3 pr-lg-5 py-3">
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
                <td class="h6">: {{ $daftar->tempat_lahir }}, {{ $daftar->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th scope="col" class="h6">Jenis Pelatihan :</th>
                <td class="h6">: {{ $daftar->jenis_pelatihan }}</td>
            </tr>
            <tr>
                <th scope="col" class="h6">Email</th>
                <td class="h6">: {{ $daftar->email }}</td>
            </tr>
        </table>

    </div>

</html>
