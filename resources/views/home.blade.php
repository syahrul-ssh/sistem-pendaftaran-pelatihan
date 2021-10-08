@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            @if ($jadwals->count())
                @foreach ($jadwals as $jadwal)
                    @php
                        $daftars = App\Models\Daftar::where('is_payed', 'like', 'bayar')
                            ->where('id_jadwal', 'like', $jadwal->id)
                            ->count();
                    @endphp
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    @if ($daftars == $jadwal->limit_peserta)
                                        <div class="col mr-2 text-center">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                                                {{ $jadwal->jenis_pelatihan }}</div>
                                            <p class="mb-0 font-weight-bold text-gray-800">Sesi ke :
                                                {{ $jadwal->sesi }}
                                            </p>
                                            <p class="mb-0 font-weight-bold text-gray-800">Tanggal :
                                                {{ $jadwal->tanggal }}</p>
                                            <p class="mb-0 font-weight-bold text-gray-800">Jam : {{ $jadwal->jam }}
                                            </p>
                                            <p class="mb-0 font-weight-bold text-danger">{{ $daftars }} /
                                                {{ $jadwal->limit_peserta }} peserta</p>
                                        </div>
                                    @else
                                        <div class="col mr-2 text-center">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                                                {{ $jadwal->jenis_pelatihan }}</div>
                                            <p class="mb-0 font-weight-bold text-gray-800">Sesi ke :
                                                {{ $jadwal->sesi }}
                                            </p>
                                            <p class="mb-0 font-weight-bold text-gray-800">Tanggal :
                                                {{ $jadwal->tanggal }}</p>
                                            <p class="mb-0 font-weight-bold text-gray-800">Jam : {{ $jadwal->jam }}
                                            </p>
                                            <p class="mb-0 font-weight-bold text-success">{{ $daftars }} /
                                                {{ $jadwal->limit_peserta }} peserta</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {!! $jadwals->links() !!}
            @else
                <div class="col-lg-12">
                    <h2 class="alert alert-danger text-center">Saat ini tidak ada pelatihan yang tersedia!</h2>
                </div>
            @endif

        </div>

        <!-- Content Row -->
    </div>
@endsection
