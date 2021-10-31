@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jadwal Pelatihan</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <a type="button" class="btn btn-primary" href="{{ route('jadwal.create') }}">Tambah Jadwal</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Pelatihan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">jam</th>
                        <th scope="col">Sesi ke</th>
                        <th scope="col">Limit Peserta</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $jadwal->jenis_pelatihan }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $jadwal->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $jadwal->jam }}</td>
                            <td>{{ $jadwal->sesi }}</td>
                            <td>{{ $jadwal->limit_peserta }}</td>
                            <td>
                                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                    <a type="button" class="btn btn-warning btn-sm"
                                        href="{{ route('jadwal.edit', $jadwal->id) }}" title="edit"><i
                                            class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        title="delete"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $jadwals->links() !!}

        </div>

        <!-- Content Row -->
    </div>
@endsection
