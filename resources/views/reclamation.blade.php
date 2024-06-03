@extends('layout',['title'=>'Réclamtion', 'active_link'=>'contact'])

@section('content')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="row gy-4 mt-4">
        <div class="section-header">
            <h2>Formulaire de Reclamation</h2>
            @if(session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                {{session()->get('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if(session('status_err'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                {{session()->get('status_err')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        </div>
        <div class="col-lg-4">
         <img src="/assets/img/satisfaction.png" alt="satisfaction" style="height: 300px; width:300px;">
        </div>
        <div class="col-lg-8">
          <form action="{{url('/reclamation')}}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="msger_name" class="form-control" id="name" placeholder="Saisissez votre nom" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="msger_email" id="email" placeholder="Saisissez votre adresse emali " required>
              </div>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="exped_code" id="subject" placeholder="Saisissez votre code d'expedition SHIP23244545" required>
              </div>
            <div class="form-group mt-3">
                <select name="msg_subject" class="form-select" aria-label="Default select example" style="font-size:14px;color:#4C4C4C;">
                    <option selected>Selectionnez l'objet de votre plainte</option>
                    <option value="Colis introuvable">Mon colis est introuvable</option>
                    <option value="Duree transit">Durée de transit trop long</option>
                    <option value="Colis endommage">Colis recu endommagé</option>
                    <option value="Autres">Autres</option>
                </select>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="msg_content" rows="5" placeholder="Veuillez decrire la situation ici" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Envoyez ma plainte</button></div>
          </form>
        </div>

      </div>

    </div>
  </section>
@endsection