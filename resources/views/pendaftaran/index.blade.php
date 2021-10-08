@extends('daftar.layout.app')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pelatihan</h1>
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
                                        <a type="button" class="btn" href="#">
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
                                                <p class="mb-0 font-weight-bold text-gray-800">{{ $daftars }} /
                                                    {{ $jadwal->limit_peserta }} peserta</p>
                                                <p class="mb-0 font-weight-bold text-danger">Peserta telah penuh!</p>
                                            </div>
                                        </a>
                                    @else
                                        <a type="button" class="btn"
                                            href="{{ route('pendaftaran.create', $jadwal->id) }}">
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
                                                <p class="mb-0 font-weight-bold text-gray-800">{{ $daftars }} /
                                                    {{ $jadwal->limit_peserta }} peserta</p>
                                                <p class="mb-0 font-weight-bold text-success">Pelatihan masih tersedia!</p>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {!! $jadwals->links() !!}
            @else
                <h2 class="alert alert-danger text-center">Saat ini tidak ada pelatihan yang tersedia!</h2>
            @endif
        </div>

        <!-- Content Row -->
    </div>
@endsection
