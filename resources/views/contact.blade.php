@extends('layout',['title'=>'Contact', 'active_link'=>'contact'])


@push('styles')
<style>
  form a:hover{
    text-decoration: underline;
  }
</style>
@endpush
@section('content')

<main id="main">
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
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Saisissez votre nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Saisissez votre adresse emali " required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet du message: exemple(demande d'information)" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Saisissez votre message ici" required></textarea>
              </div>
              <div style="display: flex; justify-content:start;">
                <span style="display: flex; justify-content:center; align-items:center; height:20px; width:20px;border-radius:10px; border:1px solid red;margin-right:5px;">
                  <i class="ph-bold ph-exclamation-mark" style="color:red"></i>
                </span>
                <span style="display:inline-block; margin-bottom:15px;"><a href="/reclamation">
                  Je voudrais faire une reclamation
                </a></span>
              </div>
              <div class="text-center"><button type="submit">Envoyez mon message</button></div>
            </form>
          </div>
        </div>
    </div>
  </section>
</main>

@endsection