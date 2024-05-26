@extends('layout',['title'=>'Réclamtion', 'active_link'=>'contact'])

@section('content')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="row gy-4 mt-4">

        <div class="section-header">
            <h2>Formulaire de Reclamation</h2>
        </div>

        <div class="col-lg-4">
         <img src="/assets/img/satisfaction.png" alt="satisfaction" style="height: 300px; width:300px;">
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
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Saisissez votre code d'expedition" required>
              </div>
            <div class="form-group mt-3">
                <select class="form-select" aria-label="Default select example" style="font-size:14px;color:#4C4C4C;">
                    <option selected>Selectionnez l'objet de votre plainte</option>
                    <option value="1">Mon colis est introuvable</option>
                    <option value="2">Durée de transit trop long</option>
                    <option value="3">Colis recu endommagé</option>
                    <option value="3">Autres</option>
                </select>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Veuillez decrire la situation ici" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Envoyez ma plainte</button></div>
          </form>
        </div>

      </div>

    </div>
  </section>
@endsection