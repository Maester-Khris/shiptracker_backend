<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Olbizgo - {{$title}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons Fret Aerien -->
    <link href="/assets/img/olbiz.jpg" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">

    {{-- Personnal styles and used Plugins --}}
    <link rel="stylesheet" href="/assets/plugins/phosphoreicon/bold.css">
    <link rel="stylesheet" href="/assets/plugins/mdbootstrap/mdb_uikit_V7_2.min.css">
    <link href="/assets/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">


    <style>
        .swiper-pagination {
            margin-top: 20px;
            position: relative;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .form-outline input+i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        /* userspace form input design */
        .tab-content .form-outline input {
            padding: 10px 15px;
            margin-bottom: 10px;
        }

        .tab-content .form-outline label {
            color: #3B71CA !important;
        }
    </style>

    @stack('styles')

</head>

<body>
    <header id="header" class="header d-flex align-items-center fixed-top sticked">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets/img/logo_partial.png" alt="" style="max-height: 55px;">
                <h1>Olbizgo Express</h1>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/" class="{{$active_link == "home" ? 'active' : ''}}">Accueil</a></li>
                    <li><a href="/pricing" class="{{$active_link == "pricing" ? 'active' : ''}}">Nos Formules</a></li>
                    <li><a href="/contact" class="{{$active_link == "contact" ? 'active' : ''}}">Contact</a></li>
                    <li><a class="get-a-quote"  href="/userspace/account">Mon compte</a></li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Olbizgo Express SAS</span>
                    </a>
                    <p>Confiez nous le transport de vos colis et marchandises pour une livraison rapide, efficace et à
                        un cout defiant la concurrence.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 footer-links">
                    <h4>Liens Utils</h4>
                    <ul style="transform:translateX(25%);">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="/estimator">Devis</a></li>
                        <li><a href="#">Contact</a></li>
                        {{-- <li><a href="/userspace/expeditions">Espace utilisateur</a></li> --}}
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p style="transform:translateX(25%);">
                        2 Rue Edouard Thouvenel <br>
                        74100 Ville-la-Grand<br>
                        France <br><br>
                        <strong>Téléhone:</strong> +33 xxx xxx xxx<br>
                        <strong>Email:</strong> info@olbizgo.com<br>
                    </p>
                </div>
            </div>
        </div>

        <!-- copyright be cautious with it -->
        <!-- <div class="container mt-4">
          <div class="copyright">
            &copy; Copyright <strong><span>Logis</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div> -->

    </footer>

    <!-- <div id="preloader"></div> -->
    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>

    {{-- Personnal scripts and used Plugins --}}
    <script src="/assets/plugins/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/plugins/mdbootstrap/mdb.umd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script>
        function scrollToTop() {
            let currentPosition = window.pageYOffset;
            const scrollStep = 50; // Adjust this value to control the scroll speed

            function animateScroll() {
                if (currentPosition > 0) {
                window.scrollBy(0, -scrollStep);
                currentPosition -= scrollStep;
                requestAnimationFrame(animateScroll);
                } else {
                window.scrollTo(0, 0); // Ensure the scrollbar is exactly at the top
                }
            }

            animateScroll();
        }
        document.addEventListener("DOMContentLoaded", function () {
            scrollToTop();
            const inputFields = document.querySelectorAll('.tab-content .form-outline input');
            inputFields.forEach(input => {
                input.addEventListener('blur', () => {
                    input.classList.add('active');
                });
            });

            window.addEventListener('scroll', function(){
                if (window.pageYOffset === 0) {
                    document.querySelector("header").classList.add("sticked");
                }
            })
        });
    </script>
    @stack('scripts')

</body>
</html>