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
    <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"
      />
      <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/fill/style.css"
      />
    <link rel="stylesheet" href="/assets/plugins/mdbootstrap/mdb_uikit_V7_2.min.css">
    <script src="/assets/plugins/datatables/dataTables.bootstrap5.css"></script>
    <link href="/assets/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
        .swiper-pagination {
            margin-top: 20px;
            position: relative;
        }
        a.nav-link{
            color: black;
        }
        a.nav-link.active{
            border-bottom: 2px solid blue;
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
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets/img/logo_partial.png" alt="" style="max-height: 55px;">
                <h1>Olbizgo Express</h1>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="/userspace/account" class="active">Mon compte</a></li>
                    @if(Auth::user())
                    <li>
                        <a href="/userspace/signout" style="color:#D34642;">
                            Déconnexion <i class="ph-fill ph-sign-out" style="font-size: 25px;"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>


    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('/assets/img/page-header.jpg');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Espace Utilisateur</h2>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li>Espace Utilisateur</li>
                        <li><a href="index.html">{{$menu_item_title}}</a></li>
                    </ol>
                </div>
            </nav>
        </div>
        
        <section id="service-details" class="service-details">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3">
                        <div class="services-list" style="border: 0;">
                            <a href="/userspace/expeditions" class="{{ $menu_item_title == "Expeditions" ? 'active' : '' }}">Expeditions</a>
                            {{-- <a href="/userspace/estimator" class="{{ $menu_item_title == "Estimateur" ? 'active' : '' }}">Estimateur de cout</a> --}}
                            <a href="/userspace/account" class="{{ $menu_item_title == "Parametre" ? 'active' : '' }}">Parametres du compte</a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                       @yield('content')
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- <div id="preloader"></div> -->
    <!-- Vendor JS Files -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>

    {{-- Personnal scripts and used Plugins --}}
    <script src="/assets/plugins/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/plugins/mdbootstrap/mdb.umd.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.bootstrap5.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const inputFields = document.querySelectorAll('.tab-content .form-outline input');
            inputFields.forEach(input => {
                input.addEventListener('blur', () => {
                    input.classList.add('active');
                });
            });
        });
    </script>
    @stack('scripts')

</body>
</html>