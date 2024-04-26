<!DOCTYPE html>
<html lang="en">
    @include('../components.header', ["title"=>"Calculatrice"])
<body>
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
          {{-- <li><a href="#">Nos Services</a></li>
          <li><a href="#">Formules</a></li>
          <li><a href="#">Contact</a></li> --}}
          <li><a href="/userpace/account">Mon compte</a></li>
          {{-- <li><a class="get-a-quote" href="/estimator">Obtenir un devis</a></li> --}}
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
                <li><a href="index.html">Accueil</a></li>
                <li>Espace Utilisateur</li>
              </ol>
            </div>
          </nav>
        </div>
        <!-- End Breadcrumbs -->
    
        <!-- ======= Service Details Section ======= -->
        <section id="service-details" class="service-details">
            <div class="container" data-aos="fade-up">
      
              <div class="row gy-4">
      
                <div class="col-lg-3">
                    <div class="services-list" style="border: 0;">
                        <a href="/userpace/estimator" class="active">Estimateur de cout</a>
                        <a href="/userpace/expeditions" class="">Expeditions</a>
                        <a href="/userpace/account">Parametres du compte</a>
                      </div>
                </div>
      
                <div class="col-lg-8">
                  <nav class="nav">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" aria-selected="true">Calculateur</a> 
                  </nav>
      
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div style=" width: 500px; height: 600px;  margin-left: 30px; margin-top: 30px; ">
                        <div class="row">
                        <div class="col-md-4" style="margin-right: 40px;">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="longueur (cm)">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="mb-3">
                              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="largeur (cm)">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="mb-3">
                              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="hauteur (cm)">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="mb-3">
                              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="poids (Kg)">
                            </div>
                          </div>
                          <button type="button" disabled class="btn btn-secondary" style="margin-top:5px;padding:4px 8px;border-radius:3px;">Ajouter un coli</button>
                        </div>
                        
                        <div class="col-md-6">
                          <h4 class="text-center" style="margin-bottom: 10px;">Estimateur de prix</h4>
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Coli</th>
                                <th scope="col">Cout</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Paquet N°1</td>
                                <td>1,23$</td>
                              </tr>
                              <tr>
                                <td>Paquet N°2</td>
                                <td>5,324$</td>
                              </tr>
                              <tr>
                                <td>Total: </td>
                                <td>12, 123$</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    
      </main>

      @include('components.script')
</body>
</html>