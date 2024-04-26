<!DOCTYPE html>
<html lang="en">
    @include('../components.header', ["title"=>"Mon Compte"])
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
                  <a href="/userpace/estimator" class="">Estimateur de cout</a>
                  <a href="/userpace/expeditions" class="">Expeditions</a>
                  <a href="/userpace/account" class="active">Parametres du compte</a>
                </div>
              </div>
    
              <div class="col-lg-8">
                <nav class="nav">
                  <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" aria-selected="true">Mon Compte</a>
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" aria-selected="false">Préférences</a>
                </nav>
    
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="margin-left: 25px;">
                    <div class="row" style="margin-top: 30px;">
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">Nom</span>
                          <input type="text" class="form-control" placeholder="Mr Tapui marchand" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                          <input type="password" class="form-control" value="My pass goes here" >
                        </div>
                      </div>
                      <div class="col-md-6" style="margin-top: 20px;">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">@email</span>
                          <input type="email" class="form-control" placeholder="Tapui.provenderie@outlook.com"  aria-describedby="basic-addon1">
                          <small style="font-size: 10px; padding-left: 10px;">⚠️ Click on this link to verify your email <a href="">activate my account</a></small>
                        </div>
                      </div>
                      <div class="col-md-6" style="margin-top: 20px;">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">+237</span>
                          <input type="tel" class="form-control" placeholder="690 23 45 56"  aria-describedby="basic-addon1">
                        </div>
                      </div>
                    </div>
                    <button type="button" disabled class="btn btn-secondary" style="margin-top:30px;padding:4px 8px;border-radius:3px;">Mettre à jour</button>
                  </div>
    
    
    
    
    
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="margin-left: 25px;">
                    <div style="margin:15px 0;">
                      <h4>Alertes</h4>
                    </div>
                    <div class="form-check form-switch" style="margin-bottom: 10px;">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked style="transform:scale(1.3);margin-right:16px;">
                      <label class="form-check-label" for="flexSwitchCheckChecked">Notification par E-mail</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" style="transform:scale(1.3);margin-right:16px;">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Notification par SMS</label>
                    </div>
                    <button type="button" disabled class="btn btn-secondary" style="margin-top:40px;padding:4px 8px;border-radius:3px;">Mettre à jour</button>
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