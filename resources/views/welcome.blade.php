<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DevSchool - Welcome</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('landing/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('landing/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="#">DevSchool</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="#">Home</a></li>
                    <li><a class="nav-link" href="{{ route('cari') }}">Cek Pendaftaran</a></li>
                    <li><a class="getstarted" href="{{ route('pendaftaran') }}">Daftar Sekarang!</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Ayo Kembangkan Skill Kalian Bersama Kami!</h1>
                    <h2>Dengan berpartisipasi dalam program Pelatihan Devschool yang diselenggarakan di Codepolitan</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ route('pendaftaran') }}" class="btn-get-started scrollto">Daftar
                            Sekarang!</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('landing/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>List Pelatihan yang ada saat ini</h2>
                </div>
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
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $jadwal->tanggal)->format('d-m-Y') }}
                                                    </p>
                                                    <p class="mb-0 font-weight-bold text-gray-800">Jam :
                                                        {{ $jadwal->jam }}
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
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $jadwal->tanggal)->format('d-m-Y') }}
                                                    </p>
                                                    <p class="mb-0 font-weight-bold text-gray-800">Jam :
                                                        {{ $jadwal->jam }}
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
                        <h2 class="alert alert-danger text-center">Saat ini tidak ada pelatihan yang tersedia!</h2>
                    @endif
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Ayo buruan tunggu apa lagi segera lakukan pendaftaran segeran dan bergabung bersama kami!
                        </h3>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle text-small" href="{{ route('pendaftaran') }}">Daftar
                            Sekarang!</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container footer-bottom clearfix">
            <div class="copyright text-center">
                &copy; Copyright <strong><span>2021</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>
