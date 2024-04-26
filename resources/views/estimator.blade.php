<!DOCTYPE html>
<html lang="en">
  @include('components.header', ["title"=>"Estimateur de fret"])
<body>
    
      <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Olbizgo Express</h1>
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#" class="active">Accueil</a></li>
          <li><a href="#">Nos Services</a></li>
          <li><a href="#">Formules</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="/userpace/account">Mon compte</a></li>
          <li><a class="get-a-quote" href="/estimator">Obtenir un devis</a></li>
        </ul>
      </nav>
    </div>
  </header>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
              <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                  <h2>Obtenir un devis</h2>
                  <p>
                    Obtenez une estimation de devis personnalisée pour votre fret aérien dès aujourd'hui. Remplissez simplement notre formulaire en ligne .
                  </p>
                </div>
              </div>
            </div>
          </div>
          <nav>
            <div class="container">
              <ol>
                <li><a href="index.html">Accueil</a></li>
                <li>Devis</li>
              </ol>
            </div>
          </nav>
        </div><!-- End Breadcrumbs -->
    
        <!-- ======= Get a Quote Section ======= -->
        <section id="get-a-quote" class="get-a-quote">
          <div class="container" data-aos="fade-up">
    
            <div class="row g-0">
    
              <!-- <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div> -->
    
              <div class="col-lg-7">
                <form action="forms/quote.php" method="post" class="php-email-form">
                  <h3>Estimez votre transport</h3>
                  <p>Nos prenons des renseignement sur la destination de votre expedition, ainsi que sur les colis à transporter.</p>
                  <div class="row gy-4">
                    <div class="col-md-6">
                      <!-- <input type="text" name="delivery" class="form-control" placeholder="Lieu de Destination" required> -->
                      <select class="form-select" name="" id="">
                        <Option>Yaoundé</Option>
                        <Option>Bangui</Option>
                        <Option>Conacry</Option>
                        <Option>Lomé</Option>
                      </select>
                    </div>
                    <div class="col-lg-12"  style="margin-bottom: 10px;">
                      <h4 style="margin-top: 0px;">Colis</h4>
                    </div>
                    <div class="col-md-6">
                      <input type="number" name="delivery" class="form-control" placeholder="Nombre de colis" required>
                    </div>
                    
                    <!-- <div class="row" style="margin-bottom: 10px;"> -->
                      <div class="col-md-6">
                        <input type="text" name="weight" class="form-control" placeholder="Longueur maximale (cm/colis)" required>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="weight" class="form-control" placeholder="Largeur maximale (cm/colis)" required>
                      </div>
                    <!-- </div> -->
                    <!-- <div class="row"> -->
                      <div class="col-md-6">
                        <input type="text" name="weight" class="form-control" placeholder="Hauteur maximale (cm/colis)" required>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="weight" class="form-control" placeholder="Poids (kg)" required>
                      </div>
                      <div class="col-md-6"></div>
                    <!-- </div> -->
                    <div class="col-md-4 ">
                      <button type="submit" style="padding-left: 10px;padding-right: 10px;">MON COUT</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
    
      </main>
    
    @include('components.footer')
    @include('components.script')
</body>
</html>