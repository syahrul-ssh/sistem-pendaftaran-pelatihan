@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data yang sudah Melakukan Pelatihan</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Content Row -->
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
                    @foreach ($selesais as $selesai)
                        <tr>
                            <td class="text-sm-center">{{ $selesai->tanggal_pelatihan }}</td>
                            <td class="text-sm-center">{{ $selesai->jenis_pelatihan }}</td>
                            <td class="text-sm-center">{{ $selesai->sesi }}</td>
                            <td>{{ $selesai->nama }}</td>
                            <td class="text-sm-center">{{ $selesai->jenis_kelamin }}</td>
                            <td class="text-sm-center">{{ $selesai->nomor_hp }}</td>
                            <td>{{ $selesai->email }}</td>
                            <td>{{ $selesai->tempat_lahir }}, {{ $selesai->tanggal_lahir }}</td>
                            <td>{{ $selesai->alamat }}</td>
                            <td class="text-sm-center">{{ $selesai->status }}</td>
                            <td class="text-sm-center">{{ $selesai->instansi }}</td>
                            <td class="text-sm-center">{{ $selesai->kode_unik }}</td>
                            <td class="text-sm-center">
                                <form action="{{ route('selesai.destroy', $selesai->id) }}" method="POST">
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
            {!! $selesais->links() !!}

        </div>

        <!-- Content Row -->
    </div>
@endsection
