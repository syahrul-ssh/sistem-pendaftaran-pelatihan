@extends('daftar.layout.app')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Data Pendaftaran Anda</h2>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center mb-0">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                    <a class="btn btn-secondary" href="{{ route('cetak', $daftar->id) }}">Cetak Kartu
                        Pendaftaran</a>
                    <a class="btn btn-secondary" href="https://api.whatsapp.com/send?phone=6281939123456">Kirim Bukti
                        Bayar</a>
                </div>
            </div>
        @endif
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3>Nomor Pendaftaran:</h3>
                    <h4><b>{{ $daftar->kode_unik }}</b></h4>
                    <p>Harap ingat Nomor Pendaftaran Kamu! dan Harap untuk melakukan Pembayaran untuk Dapat Mengikuti
                        Pelatihan ini!</p>
                    <p>Anda bisa melakukan Pembayaran melalui Tranfer bank dibawah ini</p>
                    <p>Bank BCA</p>
                    <p>Rekening : xxx.xxx.xxxx </p>
                    <p>a/n : Codepolitan</p>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="row text-center">
                <table class="table">
                    <tr>
                        <th scope="col">Tanggal Pelatihan</th>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_pelatihan)->format('d-m-Y') }}
                        </td>
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

                <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                    <a class="btn btn-primary" href="{{ route('daftar.edit', $daftar->id) }}">Edit Data</a>
                </div>
            </div>
        @endif
        <p class="text-center">untuk melihat data anda kembali bisa di copy nomor pendaftaran ini dan paste kan di
            cek pendaftaran!
        </p>
    </div>
@endsection
