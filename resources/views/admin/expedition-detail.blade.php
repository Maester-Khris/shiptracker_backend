@extends('admin/layout')

@push("styles")
<style>
    .timeline li{
        border-bottom: 0px!important;
    }
</style>
@endpush
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded',function(){
        let print_btn = document.querySelector("#print-barcode");
        let imgtemplate = document.querySelector('template#img-source');
        let imgcontainer = document.importNode(imgtemplate.content, true);
        let imgtoPrint = imgcontainer.querySelector('img');
        print_btn.addEventListener('click',function(){
            win = window.open(imgtoPrint.src,"_blank");
            win.onload = function() { win.print(); }
        });
    });
</script>
@endpush

@php
    $detail_retrieved = isset($details) ? true : false;
    // dd($detail_retrieved);
    // dd($details->step_details)
@endphp

@section('content')
    <div class="row">
        <div class="page-title" style="padding-left: 20px;">
            <div class="title_left">
              <h3>Detail d'une expedition</h3>
            </div>
            <div class="title_right d-flex justify-content-end">
                <form action="{{url('/expeditions/detail')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input name="shipcode" type="text" class="form-control" placeholder="Entrer le code de l'expedition">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="background: #d3d3d3;">Consulter</button>
                        </span>
                    </div>
                </form>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">
                  <div class="col-md-3 col-sm-3" >
                    <section class="panel">
                      <div class="x_title">
                        <h2>Détail expedition</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        <div class="project_detail">
                          <p class="title">Expéditeur:</p>
                          <p>{{$detail_retrieved == false ? 'Mr/Mme , ' : 'Mr/Mme '.$details->client_details["sender_name"].', '.$details->client_details["sender_phone"]}}</p>
                          <p class="title">Destinataire</p>
                          <p>{{$detail_retrieved == false ? 'Mr/Mme , ' : 'Mr/Mme '.$details->client_details["receiver_name"].', '.$details->client_details["receiver_phone"].', '.$details->client_details["receiver_address"]  }}</p>
                          <div style="margin-top: 10px;">
                            <p class="title" style="margin-bottom: 10px;">Statut: <span class="badge badge-info" style="padding:5px 10px;">{{$detail_retrieved == false ? '': $details->ship_details["status"]}}</span></p>
                            <p class="title">Date de création:</p>
                            <p>{{$detail_retrieved == false ? '' : $details->ship_details["createdat"]}}</p>
                            <p class="title">Date de départ: </p>
                            <p>{{$detail_retrieved == false ? '' : $details->ship_details["depart"]}}</p>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="col-md-3 col-sm-9">
                    <section class="panel">
                        <div class="x_title">
                            <h2>Trajet de l'expedition</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <ul class="list-unstyled timeline">
                                    @if($detail_retrieved == true)
                                        @foreach($details->step_details as $index => $step)
                                            <li>
                                                <div class="block" style="margin-left: 35px;">
                                                    @if($step['step_running_flag'])
                                                        <div class="tags" style="width:34px;z-index:20;transform:translate(-16px,-8px);">
                                                            <a href="" class="tag" style="text-align: center;">
                                                                <i class="fa fa-map-marker" style="font-size: 20px;transform:translate(2px,-3px);z-index:25;"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a>{{$step['step_name']}}</a>
                                                        </h2>
                                                        <p style="margin-bottom: 0px;font-style:italic;">Débuté le : {{ $step['step_launched_date']}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        @foreach ($default_route_steps as $step)
                                        <li>
                                            <div class="block" style="margin-left: 35px;">
                                                <div class="block_content">
                                                    <h2 class="title">
                                                        <a>{{$step->name}}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </section>
                  </div>
                  <div class="col-md-3">
                    <section class="panel">
                        <div class="x_title">
                            <h2>Colis enregistré(s)</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <ul class="list-group" style="font-size: 15px;">
                                @if($detail_retrieved == false)
                                    @for($i = 0; $i < 4; $i++)
                                        <li class="list-group-item list-group-item-light">Lorem ipsum dolor sit amet</li>
                                    @endfor
                                @else
                                    @foreach ($details->packages as $item)
                                    <li class="list-group-item list-group-item-light">{{$item->description}}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </section>
                  </div>
                  <div class="col-md-3 col-sm-3" >
                    <section class="panel">
                      <div class="x_title">
                        <h2>Fichier externes</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        <div class="project_detail">
                          <p class="title">Code digital à 12 chiffre</p>
                          <p style="margin-bottom: 0px;">{{$detail_retrieved == false ? '' : $details->ship_details["codebardigit"]}}</p>
                          <p>Imprimer le code barre 
                            @if($detail_retrieved == true)
                                @isset($details->ship_details["codebarurl"]) <a id="print-barcode" style="cursor: pointer;"><i class="fa fa-print" style="float: right; font-size:17px;"></i></a> @endisset
                                @empty($details->ship_details["codebarurl"]) <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i> @endempty
                            @else
                                <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i>
                            @endif
                          </p>
                          <div style="margin-top: 20px;">
                            <p class="title">Pièces d'identification</p>
                            <p>Afficher la carte du destinataire 
                                @if($detail_retrieved == true)
                                    @isset($details->ship_details["codebarurl"]) <a href="{{url('/assets/img/satisfaction.png')}}" id="show-id-photo" style="cursor: pointer;" download><i class="fa fa-photo" style="float: right;"></i></a> @endisset
                                    @empty($details->ship_details["codebarurl"]) <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i> @endempty
                                @else
                                    <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i>
                                @endif
                            </p>
                          </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    <template id="img-source">
        <img src="{{url('/assets/img/satisfaction.png')}}" alt="" style="height: 400px; width:400px;">
    </template>
@endsection