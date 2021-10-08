@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pendaftar</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Content Row -->
        <!-- Start kode untuk form pencarian -->
        <form class="form" method="get" action="{{ route('daftar.filter') }}">
            {{ csrf_field() }}
            <div class="form-group w-50 mb-3">
                <strong>Filter berdasarkan Tanggal untuk Membuat Absensi:</strong>
                <select class="custom-select mb-3" id="inputGroupSelect01" name="filter">
                    <option selected>pilih tanggal..</option>
                    @foreach ($jadwals as $jadwal)
                        <option value="{{ $jadwal->tanggal }}" id="filter">
                            {{ $jadwal->tanggal }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mb-1">Filter</button>
                <a href="{{ route('cetak.absen', $daftars) }}" class="btn btn-secondary mb-1">Cetak Data</a>
            </div>
        </form>
        <div class="row table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="text-sm-center text-truncate">
                        <th scope="col">Tanggal Pelatihan</th>
                        <th scope="col">Jenis Pelatihan</th>
                        <th scope="col">Sesi</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tempat, Tgl Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Kode Pendaftaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftars as $daftar)
                        <tr>
                            <td class="text-sm-center">{{ $daftar->tanggal_pelatihan }}</td>
                            <td class="text-sm-center">{{ $daftar->jenis_pelatihan }}</td>
                            <td class="text-sm-center">{{ $daftar->sesi }}</td>
                            <td>{{ $daftar->nama }}</td>
                            <td class="text-sm-center">{{ $daftar->jenis_kelamin }}</td>
                            <td class="text-sm-center">{{ $daftar->nomor_hp }}</td>
                            <td>{{ $daftar->email }}</td>
                            <td>{{ $daftar->tempat_lahir }}, {{ $daftar->tanggal_lahir }}</td>
                            <td>{{ $daftar->alamat }}</td>
                            <td class="text-sm-center">{{ $daftar->status }}</td>
                            <td class="text-sm-center">{{ $daftar->instansi }}</td>
                            <td class="text-sm-center">{{ $daftar->kode_unik }}</td>
                            <td class="text-sm-center">
                                <form action="{{ route('daftar.destroy', $daftar->id) }}" method="POST">
                                    <a type="button" class="btn btn-warning btn-sm"
                                        href="{{ route('selesai', $daftar->id) }}">Complete</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $daftars->links() !!}

        </div>

        <!-- Content Row -->
    </div>
@endsection
