@extends('layout',['title'=>'Accueil', 'active_link'=>'home'])

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row gy-4 d-flex justify-content-between" style="margin-top: 40px;">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2 data-aos="fade-up">
                    Le Transport Aérien de vos colis & marchandises
                </h2>
                <p data-aos="fade-up" data-aos-delay="100">
                    Envolez vos marchandises vers de nouveaux horizons avec notre expertise en fret aérien de
                    confiance.
                    Nous sommes fiers d'offrir des solutions sur mesure pour le transport rapide et fiable de vos
                    marchandises
                    vers des destinations nationales et internationales.
                </p>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
            </div>
        </div>
    </div>
</section>

<main id="main">
    {{-- <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="section-header">
                <span>Nos Atouts</span>
                <h2>Nos Atouts</h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
                    <div>
                        <h4 class="title">Sécurité</h4>
                        <p class="description">La sécurité de vos marchandises est notre priorité absolue, à chaque
                            étape du processus.</p>
                        <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
                    <div>
                        <h4 class="title">Rapidité</h4>
                        <p class="description">Nous nous engageons à livrer vos envois en temps voulu, sans
                            compromis sur l'efficacité.</p>
                        <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
                    <div>
                        <h4 class="title">Support Clientèle</h4>
                        <p class="description">Notre équipe dévouée est là pour répondre à vos besoins et vous
                            offrir un service client exceptionnel.</p>
                        <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <span>Nos Services</span>
                <h2>Nos Services</h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Stockage</a></h3>
                        <p>
                            Nous offrons des installations de stockage sécurisées pour vos marchandises,
                            garantissant leur intégrité jusqu'à leur expédition.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/logistics-service.jpg" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Logistique</a></h3>
                        <p>
                            Notre expertise logistique assure une coordination fluide de vos envois, optimisant
                            l'efficacité et réduisant les délais de livraison.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/cargo-service.jpg" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Conteneur</a></h3>
                        <p>
                            Nos services comprennent la gestion efficace des conteneurs, assurant un transport sans
                            heurt de bout en bout.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/packaging-service.jpg" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Packaging</a></h3>
                        <p>
                            Nous proposons un emballage professionnel pour protéger vos produits pendant le
                            transport, minimisant les risques de dommages.
                        </p>
                    </div>
                </div>
            </div>
    </section>

    {{-- <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="zoom-out">

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3>Estimez le cout de votre expedition</h3>
                    <p>
                        Prêt à expédier ? Obtenez une estimation de devis personnalisée pour votre fret aérien dès
                        aujourd'hui.
                        Remplissez simplement notre formulaire en ligne pour recevoir une évaluation détaillée de
                        nos services adaptés à vos besoins spécifiques.
                    </p>
                    <a class="cta-btn" href="/estimator">Obtenir un devis</a>
                </div>
            </div>
        </div>
    </section> --}}

</main>

@endsection