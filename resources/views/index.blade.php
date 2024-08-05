<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Website Posyandu Anggrek 1</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('compro/assets/img/logo.png') }}" rel="icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('compro/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('compro/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('compro/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('compro/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('compro/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('compro/assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-8/assets/css/timeline-8.css">
</head>

<body>
    @include('sweetalert::alert')
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" style="background-color: #263f67">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <div class="p-2 bg-white rounded-2 text-center">
                    <img src="{{ asset('compro/assets/img/logo.png') }}" class="mx-auto" alt="logo" />
                </div>
                <!-- <span> Anggrek 1</span> -->
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto active text-white" href="#home">Beranda</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto text-white" href="#about">Tentang Kami</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto text-white" href="#values">Layanan</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto text-white" href="#schedule">Jadwal</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto text-white" href="#contact">Kontak</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto text-white" href="#portfolio">Dokumentasi</a>
                    </li>
                    <li>
                        <a class="getstarted scrollto" href="{{ route('register') }}">Daftar</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Home Section ======= -->
    <section id="home" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Selamat Datang Di
                    </h2>
                    <h1 data-aos="fade-up">
                        Website Posyandu Anggrek 1
                    </h1>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start mb-3">
                            <a href="{{ route('register') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Daftar Sekarang</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        <p class="my-2">sudah memiliki akun? <u><a class="link-underline"
                                    href="{{ route('login') }}">Masuk disini </a></u></p>
                    </div>
                </div>
                <div class="col-lg-6 hero-img text-end" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('compro/assets/img/hero-img.png') }}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Sekilas Tentang</h3>
                            <h2>Website Posyandu Anggrek 1</h2>
                            <p>
                                Website ini berisi tentang kegiatan
                                Posyandu Anggrek 1 yang menghasilkan data
                                dan informasi tentang pelayanan terhadap
                                proses tumbuh kembang anak dan pelayanan
                                kesehatan dasar ibu dan anak yang meliputi
                                cakupan program, pencapaian program,
                                kontinuitas penimbangan, hasil penimbangan
                                dan partisipasi masyarakat.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('compro/assets/img/about.jpeg') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values" style="background-color: #d0ebff">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Posyandu Anggrek 1</h2>
                    <p>Layanan Kami</p>
                </header>

                <div class="row">
                    <div class="col-lg-4 " data-aos="fade-up" data-aos-delay="200">
                        <div class="box bg-white shadow-lg">
                            <img src="{{ asset('compro/assets/img/values-1.png') }}" class="img-fluid"
                                alt="" />
                            <h3>Sistem Online dan Praktis</h3>
                            <p>
                                Dapatkan informasi pelayanan, akses
                                dimanapun dan kapanpun
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box bg-white shadow-lg">
                            <img src="{{ asset('compro/assets/img/values-2.png') }}" class="img-fluid"
                                alt="" />
                            <h3>Pemeriksaan Bayi dan Balita</h3>
                            <p>
                                Lakukan pemeriksaan dan pastikan tumbuh
                                kembang bayi anda tetap baik
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box bg-white shadow-lg">
                            <img src="{{ asset('compro/assets/img/values-3.png') }}" class="img-fluid"
                                alt="" />
                            <h3>Jadwal dan Pelayanan Posyandu</h3>
                            <p>
                                Akses jadwal dan jenis pelayanan Bayi secara
                                mudah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Values Section -->

        <!-- ======= Jadwal Section ======= -->
        <section id="schedule" class="contact">
            <div class="container " data-aos="fade-up">
                <header class="section-header">
                    <h2>Infromasi</h2>
                    <p>Jadwal Pelayanan</p>
                </header>
                <div class="col-lg-12 bsb-timeline-8 py-5 py-xl-8 mx-auto">
                    <div class="row gy-4 d-flex justify-content-center">
                        <ul class="timeline">
                            @foreach ($jadwal as $item)
                                <li class="timeline-item">
                                    <div class="timeline-body">
                                        <div class="timeline-meta">
                                            <span>{{ $item->format_tanggal }}</span>
                                        </div>
                                        <div class="timeline-content timeline-indicator">
                                            <h6 class="mb-1">{{ $item->jenis_pelayanan }}</h6>
                                            <span class="text-secondary fs-7">{{ $item->lokasi }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" style="background-color: #d0ebff">
            <div class="container " data-aos="fade-up">
                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami</p>
                </header>
                <div class="col-lg-12 mx-auto">
                    <div class="row gy-4 d-flex justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>
                                    Desa Pasir Waru Garut Jawa Barat
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>
                                    +62857-9773-8502
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>
                                    posyanduanggrek1@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Gallery</h2>
                    <p>Dokumentasi Kegiatan Pelayanan</p>
                </header>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @for ($i = 1; $i <= 9; $i++)
                        <div class="col-lg-3 col-md-6 portfolio-item filter-app p-3">
                            <div class="portfolio-wrap" style="height: 340px">
                                <img src="{{ asset('compro/assets/img/portfolio/portofolio-' . $i . '.jpeg') }}"
                                    class="img-fluid" />
                                <div class="portfolio-info">
                                    <h4>Lihat</h4>
                                    <!-- <p>Description</p> -->
                                    <div class="portfolio-links">
                                        <a href="{{ asset('compro/assets/img/portfolio/portofolio-' . $i . '.jpeg') }}"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="Description"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright
                <strong><span>Posyandu Anggrek 1</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('compro/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('compro/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('compro/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('compro/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('compro/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('compro/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('compro/assets/js/main.js') }}"></script>
</body>

</html>
