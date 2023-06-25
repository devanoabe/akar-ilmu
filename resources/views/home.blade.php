<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Akar-Ilmu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1…
[18.40, 24/6/2023] Rizkyrandall: https://drive.google.com/drive/folders/175_d-3JIduqiAcj-SEfJqsqRS8cFHBuZ?usp=sharing
[18.40, 24/6/2023] Rizkyrandall: <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Akar-Ilmu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
          * Template Name: Impact
          * Updated: Mar 10 2023 with Bootstrap v5.2.3
          * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
          * Author: BootstrapMade.com
          * License: https://bootstrapmade.com/license/
          ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Akar-Ilmu<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="{{ route('home.dashboard') }}">TryOut</a></li>
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> 
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    {{-- <li><a href="#services">LogOut</a></li> --}}
                    {{-- <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li> --}}
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Welcome to <span>Akar-Ilmu</span></h2>
                    <p>Aplikasi tryout adalah teman terbaikmu dalam mengevaluasi kemampuanmu sebelum menghadapi ujian yang sebenarnya.
                        Dengan aplikasi tryout, kamu bisa melatih dirimu secara terus-menerus dan memperbaiki kelemahanmu sebelum terlambat.
                    </p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('images/3d-business-young-woman-studying-online.png') }}" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
                        <img src="{{ asset('images/3d-business-little-boy-studying-online.png') }}" class="img-fluid" alt=""
                            data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-easel"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-gem"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-geo-alt"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-command"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>About Us</h2>
                    <p>KITA BISA KARENA KITA TERBIASA</p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <h3>AKAR-ILMU PEMUDA BERBAHAYA</h3>
                        <img src="{{ asset('images/3d-business-boy-typing-on-laptop.png') }}" class="img-fluid rounded-4 mb-4" alt=""> 
                        <p>Akar Ilmu tercipta karena para penciptanya mengalami kesulitan untuk mengakses latihan soal pada saat mereka ingin belajar</p>
                        <p>Akar Ilmu terinspirasi oleh aplikasi yang sudah ada terlebih dahulu yaitu ZENIUS, yang mana itu menjadi referensi kami untuk membuat aplikasi ini</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                               Terdapat banyak matapelajaran yang dapat dikerjakan para siswa untuk latihan 
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Bahasa Inggris</li>
                                <li><i class="bi bi-check-circle-fill"></i> Bahasa Indonesia</li>
                                <li><i class="bi bi-check-circle-fill"></i> Matematika</li>
                                <li><i class="bi bi-check-circle-fill"></i> IPA</li>
                                <li><i class="bi bi-check-circle-fill"></i> Bahasa Jepang</li>
                            </ul>
                            <p>
                                Para siswa dapat melakukan ujicoba tryout dengan menjawab soal-soal yang tersedia pada menu TryOut
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{ asset('images/juicy-man-studying-financial-analytics.gif') }}" class="img-fluid rounded-4" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Our Services Section ======= -->
        <section id="services" class="services sections-bg">
            <div class="container" data-aos="fade-up">
        
                <div class="section-header">
                    <h2>Langkah-langkah Mengerjakan TryOut</h2>
                </div>
        
                <div class="row gy-12" data-aos="fade-up" data-aos-delay="100">
        
                    <div class="col-lg-12 col-md-6">
                        <div class="service-item  position-relative">
                            <li><i></i> Login pada aplikasi Akar-Ilmu</li>
                            <li><i></i> Masuk pada halaman TryOut</li>
                            <li><i></i> Pilihlah Pelajaran yang ingin dikerjakan</li>
                            <li><i></i> Klik "Kerjakan", maka akan otomatis tercopy</li>
                            <li><i></i> New tab halaman dan paste kan copyan yang telah tercopy</li>
                            <li><i></i> setelah masuk ke halaman mengerjakan tryout, kerjakan tryout dengan baik dan benar</li>
                            <li><i></i> ada waktu untuk mengerjakan tryout</li>
                            <li><i></i> jika sampai pada batas waktu yang ditentukan soal belum di submit, maka otomatis akan tersubmit dan data otomatis terkirim</li>                            
                        </div>
                    </div><!-- End Service Item -->
        
                </div>
        
            </div>
        </section><!-- End Our Services Section -->
        <!-- ======= Our Services Section ======= -->
        <section id="services" class="services sections-bg">
            <div class="container" data-aos="fade-up">
        
                <div class="section-header">
                    <h2>Penjelasan Fitur Akar-Ilmu</h2>
                </div>
        
                <div class="row gy-12" data-aos="fade-up" data-aos-delay="100">
        
                    <div class="col-lg-12 col-md-6">
                        <div class="service-item  position-relative">
                            <li><i></i> TRYOUT</li>
                            <p>Siswa mengerjakan tryout melalui halaman ini, setelah siswa mengcopy link yang telah disediakan pada setiap jenis tryout yang akan dipilih</p>
                            <p>Pada fitur ini menampilkan Mata pelajaran, Profile siswa, Total mengerjakan Tryout, Tryout selesai, Tryout lulus, Nilai tertinggi</p>
                            <li><i></i> RESULT</li>
                            <p>Siswa mengecek tryout apa saja yang telah dilakukan pada aplikasi Akar-Ilmu ini</p> 
                            <p>Pada fitur ini menampilkan Profile siswa, Total mengerjakan Tryout, Tryout selesai, Tryout lulus, Nilai tertinggi, Tabel nilai, Penjelasan soal</p>
                            <li><i></i> REVIEW</li>
                            <p>Siswa dapat mereview soal yang telah dikerjakan setelah pihak admin mengapproved tryout yang dikerjakan
                            </p>
                            <p>terdapat pembahasan soal setelah siswa melakukan review</p>
                            <p>Pada fitur ini siswa dapat mengetahui benar atau salah nya soal yang telah dikerjakan, terdapat juga pembahasan pada soal tersebut</p>
                        </div>
                    </div><!-- End Service Item -->
        
                </div>
        
            </div>
        </section>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Impact</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
    @section('content')
        <!-- Content  -->
        {{-- <section class="content">
            <div style="height: 600px;" class="container d-flex justify-content-center align-items-center">
                <div>
                    <h2 style="color: white; font-weight: bold; font-size: 65px">Selamat Datang</h2>
                </div>
            </div><!-- /.container-fluid -->
        </section> --}}

       
    @endsection