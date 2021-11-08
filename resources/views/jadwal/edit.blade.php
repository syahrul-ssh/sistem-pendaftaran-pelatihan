@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Jadwal Pelatihan</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pilih Pelatihan:</strong>
                            <select class="custom-select" id="inputGroupSelect01" name="jenis_pelatihan">
                                <option selected value="{{ $jadwal->jenis_pelatihan }}">
                                    {{ $jadwal->jenis_pelatihan }}</option>
                                @foreach ($pelatihans as $pelatihans)
                                    <option value="{{ $pelatihans->jenis_pelatihan }}">
                                        {{ $pelatihans->jenis_pelatihan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tanggal:</strong>
                            <input type="date" name="tanggal" class="form-control" value="{{ $jadwal->tanggal }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jam Mulai:</strong>
                            <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jam Selesai:</strong>
                            <input type="time" name="jam_selesai" class="form-control"
                                value="{{ $jadwal->jam_selesai }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Sesi ke :</strong>
                            <input type="text" name="sesi" class="form-control" value="{{ $jadwal->sesi }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Limit Peserta :</strong>
                            <input type="number" name="limit_peserta" class="form-control"
                                value="{{ $jadwal->limit_peserta }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

        </div>

        <!-- Content Row -->
    </div>
@endsection
