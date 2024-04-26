<!DOCTYPE html>
<html lang="en">
    @include('../components.header', ["title"=>"Mes Expeditions"])
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
                    <a href="/userpace/estimator" class="">Estimateur de cout</a>
                    <a href="/userpace/expeditions" class="active">Expeditions</a>
                    <a href="/userpace/account">Parametres du compte</a>
                  </div>
                </div>
                <div class="col-lg-9">
                  <nav class="nav">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" aria-selected="true">Nouvel Envoi</a>
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" aria-selected="false">Historique</a>
                    <a class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" aria-selected="false">Détails</a>
                  </nav>
      
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="margin-left: 25px;">
                      <form action="">
                        <div style="margin:15px 0;">
                          <h4>Infos</h4>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Expediteur: </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mr Duchampds">
                        <div class="row" style="margin-top: 8px;">
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Destinataire Nom: </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mme Rambo">
                          </div>
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Destinataire Téléphone: </label>
                            <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="+33 3232 4432 433">
                          </div>
                        </div>
                        <div style="margin-top: 25px;">
                          <h4>Ajouter des Colis</h4>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Description: </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sac à main Zara">
                          </div>
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Poids (kg): </label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="10">
                          </div>
                        </div>
                        <button type="button" class="btn btn-secondary" style="margin-top: 7px;">Ajouter</button>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="margin-left: 25px;">
                      <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Expéditeur</th>
                                <th>Destinataire</th>
                                <th>Départ coli(s)</th>
                                <th>Status d'envoi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>12/04/2024</td>
                                <td>Terminé</td>
                                <td>Voir les details</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>12/04/2024</td>
                                <td>Terminé</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>12/04/2024</td>
                                <td>Terminé</td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>12/04/2024</td>
                                <td>Terminé</td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>12/04/2024</td>
                                <td>Terminé</td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>12/04/2024</td>
                                <td>Terminé</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab"
                    style="margin-left: 25px;">
                    <form action="">
                      <div style="margin:15px 0;">
                        <h4>Consulter les détails</h4>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <label for="inputPassword2">Reference de l'expedition:</label>
                          <input type="text" class="form-control" id="inputPassword2" placeholder="SHIPB690B3766560">
                        </div>
                        <div class="col-md-3" style="display: flex">
                          <button type="submit" class="btn btn-secondary" style="align-self:flex-end;">Rechercher</button>
                        </div>
                      </div>
                    </form>
    
                    <div style="margin-top: 16px;">
                      <h4>Suivi du trajet et colis</h4>
    
                      <div class="row">
                        <div class="col-md-6" style="margin-right: 20px;">
                            trajet displaying here
                        </div>
                      
                        <div class="col-md-6" style="width: 380px;">
                          <div class="swiper-container"
                            style="width: 300px; height: auto; overflow: hidden; margin: 0 auto;">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card-body">
                                    <h3>Colis N°1</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Iure, excepturi nam consectetur odit reprehenderit.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card-body">
                                    <h3>Colis N°2</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Iure, excepturi nam consectetur odit reprehenderit.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card-body">
                                    <h3>Colis N°3</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Iure, excepturi nam consectetur odit reprehenderit.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card-body">
                                    <h3>Colis N°4</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Iure, excepturi nam consectetur odit reprehenderit.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card-body">
                                    <h3>Colis N°5</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Iure, excepturi nam consectetur odit reprehenderit.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card-body">
                                    <h3>Colis N°6</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Iure, excepturi nam consectetur odit reprehenderit.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="swiper-pagination" style="width: 100%!important;"></div>
                          </div>
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
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
      <script>
        var swiper = new Swiper('.swiper-container', {
          autoplay: {
            delay: 4000,
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
        });
      </script>
</body>
</html>