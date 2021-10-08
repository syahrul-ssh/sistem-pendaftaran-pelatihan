@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pelatihan</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <a type="button" class="btn btn-primary" href="{{ route('pelatihan.create') }}">Tambah Pelatihan</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Pelatihan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelatihans as $pelatihan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $pelatihan->jenis_pelatihan }}</td>
                            <td>
                                <form action="{{ route('pelatihan.destroy', $pelatihan->id) }}" method="POST">
                                    <a type="button" class="btn btn-warning btn-sm"
                                        href="{{ route('pelatihan.edit', $pelatihan->id) }}">Edit</a>
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
            {!! $pelatihans->links() !!}

        </div>

        <!-- Content Row -->
    </div>
@endsection
