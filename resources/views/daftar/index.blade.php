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
            <div class="form-row mb-3">
                <div class="container">
                    <strong>Filter Data:</strong>
                </div>
                <div class="form-group col-md-6">
                    <select class="custom-select" id="inputGroupSelect01" name="filter1">
                        <option value="" selected>pilih tanggal..</option>
                        @foreach ($tanggals as $tanggal)
                            <option value="{{ $tanggal->tanggal }}" id="filter1">
                                {{ $tanggal->tanggal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <select class="custom-select" id="inputGroupSelect01" name="filter2">
                        <option value="" selected>pilih status bayar..</option>
                        <option value="bayar" id="filter2">bayar</option>
                        <option value="belum" id="filter2">belum</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="filter3" id="filter3" placeholder="sesi">
                </div>
                <div class="form-group col-md-6">
                    <select class="custom-select" id="inputGroupSelect01" name="filter4">
                        <option value="" selected>pilih pelatihan..</option>
                        @foreach ($pelatihans as $pelatihan)
                            <option value="{{ $pelatihan->jenis_pelatihan }}" id="filter4">
                                {{ $pelatihan->jenis_pelatihan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="filter5" id="filter5" placeholder="nomor pendaftaran">
                </div>
                <button type="submit" class="btn btn-primary mb-1 mr-1">Filter</button>
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
                        <th scope="col">Status Bayar</th>
                        <th scope="col">Action</th>
                        <th scope="col">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftars as $daftar)
                        <tr>
                            <td class="text-sm-center">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_pelatihan)->format('d-m-Y') }}
                            </td>
                            <td class="text-sm-center">{{ $daftar->jenis_pelatihan }}</td>
                            <td class="text-sm-center">{{ $daftar->sesi }}</td>
                            <td>{{ $daftar->nama }}</td>
                            <td class="text-sm-center">{{ $daftar->jenis_kelamin }}</td>
                            <td class="text-sm-center">{{ $daftar->nomor_hp }}</td>
                            <td>{{ $daftar->email }}</td>
                            <td>{{ $daftar->tempat_lahir }},
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $daftar->tanggal_lahir)->format('d-m-Y') }}
                            </td>
                            <td>{{ $daftar->alamat }}</td>
                            <td class="text-sm-center">{{ $daftar->status }}</td>
                            <td class="text-sm-center">{{ $daftar->instansi }}</td>
                            <td class="text-sm-center">{{ $daftar->kode_unik }}</td>
                            <td class="text-sm-center">{{ $daftar->is_payed }}</td>
                            <td class="text-sm-center" colspan="2">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Action">
                                    <form method="POST" action="{{ route('daftar.payed', $daftar->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm mr-1" title="payed"><i
                                                class="fas fa-dollar-sign"></i></button>
                                    </form>
                                    <form action="{{ route('daftar.destroy', $daftar->id) }}" method="POST">
                                        <a type="button" class="btn btn-warning btn-sm"
                                            href="{{ route('selesai', $daftar->id) }}" title="complete"><i
                                                class="fas fa-check"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                            title="delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
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
