@extends('layout',['title'=>'Contact', 'active_link'=>'contact'])

@section('content')

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="row gy-4 mt-4">

        <div class="section-header">
            <h2>Formulaire de Contact</h2>
        </div>

        <div class="col-lg-4">
          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>Nos Locaux:</h4>
              <p>2 Rue Edouard Thouvenel, 74100 Ville-la-Grand, France</p>
            </div>
          </div>
          <div class="info-item d-flex">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h4>Email:</h4>
              <p>info@olbizgo.com</p>
            </div>
          </div>
          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>Appelez Nous:</h4>
              <p>+33 xxx xxx xxx</p>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Saisissez votre nom" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Saisissez votre adresse emali " required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet du message: example(demande d'information)" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Saisissez votre message ici" required></textarea>
            </div>
            {{-- <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> --}}
            <div class="text-center"><button type="submit">Envoyez mon message</button></div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section>

@endsection