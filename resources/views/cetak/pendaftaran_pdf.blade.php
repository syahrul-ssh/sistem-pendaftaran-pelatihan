<!DOCTYPE html>
<html>

<head>
    <title>Kartu Pelatihan</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
            font-family: Verdana, sans-serif;
            background-image: url('https://i.ibb.co/h7XC90w/White-and-gray-geometric-pattern-background-vector.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .center {
            margin-left: 3rem;
            margin-top: 5px;
            width: 50px;
        }

    </style>
</head>

<body>
    <div>
        <table class="table table-sm table-borderless">
            <tr style="background-color: #37517E;">
                <td scope="col"><img class="center" src="https://i.ibb.co/fdMVxsX/apple-touch-icon.png"
                        alt="apple-touch-icon"></td>
                <td colspan="3" class="text-center">
                    <h5 class=" text-lg-center my-3 text-white">Kartu Pelatihan DevSchool</h5>
                </td>
                <td>
                    <h5 class="text-center my-3"></h5>
                </td>
                <td>
                    <h5 class="text-center my-3"></h5>
                </td>
            </tr>
            <tr>
                <th scope="col" class="h6 mt-3 mb-1 ml-3">
                </th>
                <td class="h6" colspan="2">
                </td>
                <td class="h6">
                    <p class="mb-1"></p>
                </td>
                <td class="h6" rowspan="2">
                    <p class="mt-3 mb-1" style="font-size: 10px;">Nomor Pendaftaran :</p>
                    <p class="h4 mb-1 py-1 px-3 text-white" style="display: inline-block; background-color: #37517E;">
                        {{ $daftar->kode_unik }}</p>
                </td>
            </tr>
            <tr>
                <th scope="col" class="h6">
                    <p class="my-1 ml-3">Nama</p>
                    <p class="my-1 ml-3" style="font-size: 15px;">Jenis Pelatihan</p>
                </th>
                <td class="h6 text-left text-truncate" colspan="3">
                    <p class="my-1 text-left">: {{ $daftar->nama }}</p>
                    <p class="my-1 text-left" style="font-size: 15px;">: {{ $daftar->jenis_pelatihan }}</p>
                </td>
                <td class="h6">
                </td>
            </tr>
            <tr>
                <th scope="col">
                    <hr style="width:100%;border-width:0;color:gray;background-color:gray">
                </th>
                <th scope="col">
                    <hr style="width:100%;border-width:0;color:gray;background-color:gray">
                </th>
                <th scope="col">
                    <hr style="width:100%;border-width:0;color:gray;background-color:gray">
                </th>
                <th scope="col">
                    <hr style="width:100%;border-width:0;color:gray;background-color:gray">
                </th>
                <th scope="col">
                    <hr style="width:100%;border-width:0;color:gray;background-color:gray">
                </th>
                <th scope="col">
                    <hr style="width:100%;border-width:0;color:gray;background-color:gray">
                </th>
            </tr>

            <tr>
                <th scope="col" class="h6">
                    <p class="ml-3 my-1 text-left" style="font-size: 10px;">Tanggal Pelaksanaan :</p>
                    <p class="ml-3 h4 my-1 text-left" style="border-right: #37517E" ;">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_pelatihan)->format('d-m-Y') }}
                    </p>
                </th>
                <td class="h6" colspan="2">
                    <p class="my-1"></p>
                </td>
                <td class="h6" style="">
                    <p class="my-1 mb-0 text-right" style="font-size: 10px;">Sesi</p>
                    <p class="h4 my-1 text-right" style="border-right: #37517E;">{{ $daftar->sesi }}</p>
                </td>
                <td class="h6">
                    <p class="my-1" style="">Dari : {{ $daftar->jam_mulai }}</p>
                    <p class="my-1" style="">Sampai : {{ $daftar->jam_selesai }}</p>
                </td>
            </tr>

        </table>
    </div>
</body>

</html>
