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
                        placeholder="Masukan Nomor Pendaftaran Anda!" required>
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
        </div>
    @endsection
