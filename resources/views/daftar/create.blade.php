@extends('daftar.layout.app')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pelatihan</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            @if ($jadwal->count())
                <form action="{{ route('daftar.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Pilih Tanggal:</strong>
                                <select class="custom-select" id="inputGroupSelect01" name="tanggal_pelatihan" readonly>
                                    <option selected value="{{ $jadwal->tanggal }}">
                                        {{ $jadwal->tanggal }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jenis Pelatihan:</strong>
                                <input type="text" name="jenis_pelatihan" class="form-control"
                                    value="{{ $jadwal->jenis_pelatihan }}" readonly>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sesi Ke:</strong>
                                <input type="number" name="sesi" class="form-control" value="{{ $jadwal->sesi }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama:</strong>
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jenis Kelamin:</strong>
                                <select class="custom-select" id="inputGroupSelect02" name="jenis_kelamin">
                                    <option selected>
                                        Pilih Disini ...</option>
                                    <option value="Laki-Laki">
                                        Laki-Laki</option>
                                    <option value="Perempuan">
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nomor Telepon yang bisa dihubungi/WA:</strong>
                                <input type="number" name="nomor_hp" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tempat Lahir:</strong>
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tanggal Lahir:</strong>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Alamat:</strong>
                                <textarea class="form-control" style="height:150px" name="alamat"
                                    placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                <select class="custom-select" id="inputGroupSelect03" name="status">
                                    <option selected>
                                        Pilih Disini ...</option>
                                    <option value="Mahasiswa">
                                        Mahasiswa</option>
                                    <option value="Pelajar">
                                        Pelajar</option>
                                    <option value="Bekerja">
                                        Bekerja</option>
                                    <option value="Fresh Graduate">
                                        Fresh Graduate</option>
                                    <option value="Pengangguran">
                                        Pengangguran</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Instansi:</strong>
                                <input type="text" name="instansi" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="kode_unik" value="{{ random_int(100000, 999999) }}">
                        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            @else
                <h2 class="alert alert-danger text-center">Periode Pendaftaran Telah Brakhir</h2>
            @endif
        </div>

        <!-- Content Row -->
    </div>
@endsection
