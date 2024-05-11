@extends('userspace/layout',['title'=>'Calculateur', 'menu_item_title'=>'Estimateur'])
@section('content')
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
@endsection
  