<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Olbizgo - Connexion</title>
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
    <link rel="stylesheet" href="/assets/plugins/mdbootstrap/mdb_uikit_V7_2.min.css">
    <script src="/assets/plugins/datatables/dataTables.bootstrap5.css"></script>
    <link href="/assets/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
      .form-outline input+i {
              position: absolute;
              top: 50%;
              transform: translateY(-50%);
              pointer-events: none;
          }
        .pass-eye:hover{
        }
    </style>
  </head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/assets/img/logo_partial.png" alt="" style="max-height: 55px;">
        <h1>Olbizgo Express</h1>
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#">Accueil</a></li>
          <li><a href="/userspace/account" class="active">Mon compte</a></li>
        </ul>
      </nav>
    </div>
  </header>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="page-header d-flex align-items-center" style="background-image: url('/assets/img/page-header.jpg');">
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
                <li>Accueil</li>
                <li>Espace Utilisateur</li>
                <li> <a href="">Login</a></li>
              </ol>
            </div>
          </nav>
        </div>
        <!-- End Breadcrumbs -->
    
        <!-- ======= Service Details Section ======= -->
        <section id="service-details" class="service-details" style="padding-top: 30px;">
          <div class="container" data-aos="fade-up">
            <div class="row gy-4" style="width: 400px; margin:0 auto;">
                <h4 class="mb-3" style="text-align:center;">Connexion à l'espace utilisateur</h4>
                <form action="{{url('/signin')}}" method="POST" class="form-outline" style="margin-top: 10px;">
                    @csrf
                    <!-- Email -->
                    <div data-mdb-input-init class="form-outline" style="margin-bottom: 15px;height:50px;">
                        <input name="user_email" type="email" class="form-control ps-5" placeholder="Adresse Email" style="height:100%;padding:15px 15px;font-size:15px;" />
                        <i class="ph-bold ph-at ms-3" style="font-size: 22px;"></i>
                    </div>
                      
                    <!-- Password -->
                    <div data-mdb-input-init class="form-outline input-group" style="margin-bottom: 15px; height:50px;">
                        <input name="user_password" type="password" class="form-control ps-5" placeholder="Mot de passe" style="height:100%; padding:15px 15px;font-size:15px;"/>
                        <i class="ph-bold ph-lock-key ms-3" style="font-size: 22px;"></i>
                        {{-- <button class="btn btn-outline-primary pass-eye" type="button" id="button-addon2" data-mdb-ripple-init data-mdb-ripple-color="dark" style="height:100%; width:45px; padding-left:5px; padding-right:5px; border-color:transparent; border-top-right-radius:2px;border-bottom-right-radius:2px;">
                            <i class="ph-bold ph-eye" style="font-size: 22px;"></i>
                        </button> --}}
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-2" style="margin-top: 30px">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input name="user_remember" class="form-check-input" type="checkbox" value="1" id="form1Example3" checked />
                          <label class="form-check-label" for="form1Example3">Se Souvenir de moi</label>
                        </div>
                      </div>
                      <div class="col"> 
                        Pas de compte ? <a href="/signup" style="font-size: 12px;"> Nouveau</a>
                      </div>
                    </div>
                  
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Connexion</button>
                  </form>
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
</body>
</html>