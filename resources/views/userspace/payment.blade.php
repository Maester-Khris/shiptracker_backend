@extends('userspace/layout',['title'=>'Mes Paiements', 'menu_item_title'=>'payments'])

@section('content')
    <table id="example" class="table table-sm table-bordered" style="width:60%;margin:10px auto;">
        <thead>
            <tr>
                <th style="text-align: center;">Formulaire de paiement</th>
            </tr>
        </thead>
        <tbody class="table-group-divider table-divider-color">
            <tr>
                <td>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Entrez le code l'expedition" aria-label="Username" aria-describedby="basic-addon1"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group">
                        <button type="button" class="btn btn-outline-secondary" data-mdb-ripple-init>+ 237</button>
                        <button  type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-mdb-dropdown-init aria-expanded="false">
                          <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" style="transform:translateX(0px)!important;">
                          <li><a class="dropdown-item" href="#" style="padding:3px 10px;">+ 237</a></li>
                          <li><a class="dropdown-item" href="#" style="padding:3px 10px;">+ 411</a></li>
                          <li><a class="dropdown-item" href="#" style="padding:3px 10px;">+ 33</a></li>
                        </ul>
                        <input type="tel" class="form-control" placeholder="Entrez votre numéro" aria-label="Text input with segmented dropdown button" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                   <span style="display: inline-block; width:100%; text-align:center;margin-bottom:10px;"><strong>Choisissez une méthode paiement</strong></span>
                   <div style="display:flex;flex-direction:row; justify-content:center;">
                        <div style="width:65px;height:65px;border:1px solid grey; border-radius:5px;margin-right:40px;">
                            <img src="/assets/img/om-logo.png" alt="" style="width:100%;height:100%;">
                        </div>
                        <div style="width:65px;height:65px;border:1px solid grey; border-radius:5px;margin-right:40px;">
                            <img src="/assets/img/mtn.jpg" alt="" style="width:100%;height:100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Validez le paiement</button>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <table class="table table-bordered"></table> --}}
@endsection