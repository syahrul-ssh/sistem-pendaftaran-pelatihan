<!DOCTYPE html>
<html>

<head>
    <title>Data Pendaftaran Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center mb-3">Data Pelatihan</h2>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
