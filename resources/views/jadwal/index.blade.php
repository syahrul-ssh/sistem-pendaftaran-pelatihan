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
                        <th scope="col" class="text-center">Tanggal</th>
                        <th scope="col" class="text-center">Jam Mulai</th>
                        <th scope="col" class="text-center">Jam Selesai</th>
                        <th scope="col" class="text-center">Sesi ke</th>
                        <th scope="col" class="text-center">Limit Peserta</th>
                        <th scope="col" class="text-center">Publish</th>
                        <th scope="col" class="text-right">Action</th>
                        <th scope="col" class="text-left">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                        <tr class="text-truncate">
                            <td>{{ ++$i }}</td>
                            <td>{{ $jadwal->jenis_pelatihan }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $jadwal->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $jadwal->jam_mulai }}</td>
                            <td class="text-center">{{ $jadwal->jam_selesai }}</td>
                            <td class="text-center">{{ $jadwal->sesi }}</td>
                            <td class="text-center">{{ $jadwal->limit_peserta }}</td>
                            <td class="text-center">{{ $jadwal->publish }}</td>
                            <td class="text-center" colspan="2">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Action">
                                    <form method="POST" action="{{ route('jadwal.publish', $jadwal->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm mr-1" title="publish"><i
                                                class="far fa-share-square"></i></button>
                                    </form>
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
                                </div>
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
