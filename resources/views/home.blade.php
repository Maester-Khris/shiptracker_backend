@extends('layout',['title'=>'Resultat recherche', 'active_link'=>'home'])

@push("styles")
<link href="/assets/css/home_fix.css" rel="stylesheet">
@endpush

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between" style="margin-top: 40px;">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up">
                        OLBIZGO EXPRESS
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Votre solution de confiance pour le groupage de fret aérien, le négoce, et le centre d'achats international.Envolez vos marchandises vers de nouveaux horizons avec notre expertise en fret aérien de confiance. 
                        Nous sommes fiers d'offrir des solutions sur mesure pour le transport rapide et fiable de vos marchandises
                    </p>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
                </div>
            </div>
        </div>
    </section>

    <main id="main">

        {{-- features --}}
        <section id="featured-services" class="featured-services">
            <div class="container-fluid" style="">
                <div class="section-header">
                    <span>Nos Atouts</span>
                    <h2>Nos Atouts</h2>
                </div>
                <div class="d-flex flex-row justify-content-between" style="padding:0px 100px;">    
                    <div class="service-item d-flex" data-aos="fade-up">
                        <div class="icon flex-shrink-0 d-flex flex-column justify-content-center align-items-center">
                            <img src="/assets/img/feature-protection.png" alt="" style="">
                        </div>
                        <div>
                            <h4 class="title">Sécurité</h4>
                            <p class="description">
                                Vos colis sont entre de bonnes mains, de l'achat à la livraison, nos équipes s'assurent d'un controle rigoureux de vos colis.
                            </p>
                            <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                        </div>
                    </div>
                    <div class="service-item d-flex" data-aos="fade-up" data-aos-delay="100" style="">
                        <div class="icon flex-shrink-0 d-flex flex-column justify-content-center align-items-center" style="">
                            <img src="/assets/img/feature-fast.png" alt="" style="">
                        </div>
                        <div style="">
                            <h4 class="title">Rapidité & Fiabilité</h4>
                            <p class="description">Nous garantissons des délais de livraison rapides et un suivi rigoureux de vos marchandises</p>
                            <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                        </div>
                    </div>
                    <div class="service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon flex-shrink-0 d-flex flex-column justify-content-center align-items-center">
                            <img src="/assets/img/feature-customer-service.png" alt="" style="">
                        </div>
                        <div>
                            <h4 class="title">Support Clientèle Dédié</h4>
                            <p class="description">
                                Notre équipe est à votre disposition pour répondre à toutes vos questions et vous assister tout au long de vos transactions
                            </p>
                            <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                        </div>
                    </div> 
                    <div class="service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon flex-shrink-0 d-flex flex-column justify-content-center align-items-center">
                            <img src="/assets/img/feature-intermediary.png" alt="" style="">
                        </div>
                        <div>
                            <h4 class="title">Protection de vos achats</h4>
                            <p class="description">
                                Nous activons la garantie fabricant et vendeur pour vous en intervenant pour faire valoir vos droits en cas de
                                défauts de fabrication, ou tout autre soucis.
                            </p>
                            <!-- <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- search bar --}}
        <section>
            <div class="container" data-aos="fade-up">
                <div class="section-header" style="padding-bottom: 0px;">
                    <span>Centre de recherche</span>
                    <h2>Suivi de vos colis</h2>
                </div>
                <p style="width:80%;margin:0 auto;text-align:center;font-weight:500;margin-bottom:15px;">
                    Au cœur de notre page, accédez facilement au suivi de vos colis en temps réel
                </p>
                <div class="row" style="width:80%;margin:0 auto;">
                    <form action={{url('/result-searchbar')}} method="POST" role="form" id="form-buscar">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-10 col-md-3 col-sm-12 p-0">
                                        <input d="1" class="form-control search-slt" type="text" name="search"
                                        placeholder="Entrez votre numéro d'envoi SHIP12345667..." required>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                                        <button type="submit" class="btn btn-danger wrn-btn" style="border:1px solid #0D42FF!important;background-color: #0D42FF;font-weight:400;">
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Rechercher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- services --}}
        <section id="service" class="services pt-0" style="padding-top: 80px!important;">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <span>Nos Services</span>
                    <h2>Nos Services</h2>
                </div>

            
                <div class="row gy-4">
                    
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-img">
                                <img class="service-img" src="/assets/img/grouping.jpg" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Groupage de Fret Aérien</a></h3>
                            <p>
                                Profitez de notre expertise pour regrouper vos envois aériens à des tarifs compétitifs. 
                                Nous vous assurons une livraison rapide et sécurisée près de chez vous.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <div class="card-img">
                                <img class="service-img" src="/assets/img/negociation.jpg" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Négoce International</a></h3>
                            <p>
                                Grâce à notre réseau mondial de partenaires, nous vous offrons une sélection de produits de haute qualité à des prix imbattables. 
                                Nous vous assistons dans vos achats et nous nous occupons de tout le processus logistique
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-img">
                                <img class="service-img" src="/assets/img/world_wide_shop.jpg" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Centre d'Achats International</a></h3>
                            <p>
                                Vous souhaitez acheter des produits sur le marché international ? Nous achetons pour vous et vous les livrons à un point de retrait proche de chez vous. 
                                Un service rapide, fiable et simplifié pour toutes vos commandes à l’étranger.
                            </p>
                        </div>
                    </div>
                    
                </div>
        </section>

        {{-- ============== Not used now ==============  --}}
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