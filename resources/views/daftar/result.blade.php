@extends('daftar.layout.app')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Cari Data Pendaftaran Anda</h2>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <!-- Start kode untuk form pencarian -->
            <form class="form" method="get" action="{{ route('cari_pendaftar') }}">
                {{ csrf_field() }}
                <div class="form-group w-100 mb-3">
                    <label for="search" class="d-block mr-2">Pencarian</label>
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                        placeholder="Masukan Nomor Pendaftaran Anda!">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
        </div>
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <a class="btn btn-secondary" href="{{ route('cetak', $daftar->id) }}">Cetak Kartu
                    Pendaftaran</a>
                <a class="btn btn-secondary" href="https://api.whatsapp.com/send?phone=6281939123456">Kirim Bukti
                    Bayar</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3>Nomor Pendaftaran:</h3>
                    <h4><b>{{ $daftar->kode_unik }}</b></h4>
                    <p>Harap ingat Nomor Pendaftaran Kamu!</p>
                    <p>Anda bisa melakukan Pembayaran melalui Tranfer bank dibawah ini</p>
                    <p>Bank BCA</p>
                    <p>Rekening : xxx.xxx.xxxx </p>
                    <p>a/n : Codepolitan</p>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th scope="col">Tanggal Pelatihan</th>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_pelatihan)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th scope="col">Jenis Pelatihan</th>
                    <td>{{ $daftar->jenis_pelatihan }}</td>
                </tr>
                <tr>
                    <th scope="col">Sesi Ke</th>
                    <td>{{ $daftar->sesi }}</td>
                </tr>
                <tr>
                    <th scope="col">Nama</th>
                    <td>{{ $daftar->nama }}</td>
                </tr>
                <tr>
                    <th scope="col">Jenis Kelamin</th>
                    <td>{{ $daftar->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th scope="col">Nomor Telepon/WA</th>
                    <td>{{ $daftar->nomor_hp }}</td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td>{{ $daftar->email }}</td>
                </tr>
                <tr>
                    <th scope="col">Tempat, Tgl Lahir</th>
                    <td>{{ $daftar->tempat_lahir }},
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_lahir)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th scope="col">Alamat</th>
                    <td>{{ $daftar->alamat }}</td>
                </tr>
                <tr>
                    <th scope="col">Status & Instansi</th>
                    <td>{{ $daftar->status }} di {{ $daftar->instansi }}</td>
                </tr>
            </table>
        </div>
    @endsection
