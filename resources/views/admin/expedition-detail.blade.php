@extends('admin/layout')

@push("styles")
<style>
    .timeline li{
        border-bottom: 0px!important;
    }
</style>
@endpush

@section('content')

    <div class="row">

        <div class="page-title" style="padding-left: 20px;">
            <div class="title_left">
              <h3>Detail d'une expedition</h3>
            </div>

            <div class="title_right d-flex justify-content-end">
                <form class="form-inline">
                    <input type="text" name="country" id="autocomplete-custom-append" class="form-control col-md-10" placeholder="Le code de l'expedition" style="border-radius:5px; width:300px;padding:5px 10px;" />
                    {{-- <button type="submit" class="btn btn-secondary">Send invitation</button> --}}
                </div>
            </div>
          </div>



        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Trajet de l'expedition</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline">
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                          <span>En cours ...</span>
                                        </a>
                                      </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Entrepot en suisse</a>
                                        </h2>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Aeroport de Paris</a>
                                        </h2>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Aeroport de Djibouti</a>
                                        </h2>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Port de lomé</a>
                                        </h2>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Colis Enregistré</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info">Telephone Samsung S5</li>
                        <li class="list-group-item list-group-item-info">Courrier Académique</li>
                        <li class="list-group-item list-group-item-info">Conteneur fripperie</li>
                        <li class="list-group-item list-group-item-info">Boite produits cosmétique</li>
                      </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Code bar généré</h2> 
                    <ul class="nav navbar-right panel_toolbox justify-content-end">
                        <li><a class="close-link"><i class="fa fa-print" style="font-size: 19px;"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="profile_img">
                        <div id="crop-avatar">
                          <img class="img-responsive avatar-view" src="/assets/img/no-barcode.png" alt="Avatar" title="Change the avatar" style="width: 100%; height:100%;">
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection