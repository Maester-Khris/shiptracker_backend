@extends('admin/layout')

@push("styles")
<style>
    .timeline li{
        border-bottom: 0px!important;
    }
    section.panel{
        min-height: 350px;
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
@endphp

@section('content')
    <div class="row">
        <div class="page-title d-flex align-items-center" style="padding-left: 20px;padding-right: 25px;padding-bottom:0px;">
            <div class="title_left">
              <h3 style="margin-bottom: 0px;">Detail d'une expedition</h3>
            </div>
            <div class="title_right d-flex justify-content-end">
                <form action="{{url('/expeditions/detail')}}" method="POST">
                    @csrf
                    <div class="input-group" style="margin-bottom: 0px;">
                        @isset($shipcode)
                            <input name="shipcode" type="text" class="form-control" placeholder="Entrer le code de l'expedition" value="{{$shipcode}}">
                        @endisset
                        @empty($shipcode)
                            <input name="shipcode" type="text" class="form-control" placeholder="Entrer le code de l'expedition">
                        @endempty
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-light" type="submit" style="background-color:#446587;color:white;">Consulter</button>
                        </span>
                    </div>
                </form>
            </div>
          </div>

          <div class="row" style="width: 100%;">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">
                  <div class="col-md-3 " >
                    <section class="panel">
                      <div class="x_title">
                        <h2>Détail expedition</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        <div class="project_detail">
                            @if($detail_retrieved == true)
                                <p class="title">Expéditeur:</p>
                                <p>Mr/Mme {{$details->client_details["sender_name"], $details->client_details["sender_phone"]}}</p>
                                <p class="title">Destinataire</p>
                                <p>Mr/Mme {{$details->client_details["receiver_name"], $details->client_details["receiver_phone"], $details->client_details["receiver_address"]  }}</p>
                                <div style="margin-top: 10px;">
                                    <p class="title" style="margin-bottom: 10px;">
                                      Statut: 
                                      <span class="badge badge-inf" style="font-size: 11px;">{{$details->ship_details["statusplain"]}}</span>
                                    </p>
                                    <p class="title">Date de création:</p>
                                    <p>{{$details->ship_details["createdat"]}}</p>
                                    <p class="title">Date de départ: </p>
                                    <p>{{$details->ship_details["depart"]}}</p>
                                    <p class="title">Date d'arrvié: </p>
                                    <p>{{$details->ship_details["arrival"]}}</p>
                                </div>
                            @endif
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="col-md-3 ">
                    <section class="panel">
                        <div class="x_title">
                            <h2>Trajet de l'expedition</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="dashboard-widget-content">
                                @if($detail_retrieved == true)
                                    <ul class="list-unstyled timeline">
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
                                    </ul>
                                @endif
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
                        <div class="panel-body">
                            @if($detail_retrieved == true)
                                <ul class="list-group" style="font-size: 15px;">
                                    @foreach ($details->packages as $item)
                                        <li class="list-group-item list-group-item-light">{{$item->description}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </section>
                  </div>
                  <div class="col-md-3 " >
                    <section class="panel">
                      <div class="x_title">
                        <h2>Fichier externes</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        @if($detail_retrieved == true)
                        <div class="project_detail">
                          <p class="title">Code digital à 12 chiffre</p>
                          <p style="margin-bottom: 0px;">{{$details->ship_details["codebardigit"]}}</p>
                          <p>Imprimer le code barre 
                            @isset($details->ship_details["codebarurl"]) <a id="print-barcode" style="cursor: pointer;"><i class="fa fa-print" style="float: right; font-size:17px;"></i></a> @endisset
                            @empty($details->ship_details["codebarurl"]) <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i> @endempty
                          </p>
                          <div style="margin-top: 20px;">
                            <p class="title">Pièces d'identification</p>
                            <p>Afficher la pièce d'identité du destinataire 
                                @isset($details->client_details["receiver_photo"]) <a href="{{url($details->client_details['receiver_photo'])}}" id="show-id-photo" style="cursor: pointer;" download><i class="fa fa-photo" style="float: right;"></i></a> @endisset
                                @empty($details->client_details["receiver_photo"]) <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i> @endempty
                            </p>
                          </div>
                          <div style="margin-top: 20px;">
                            <p class="title">Accusé réception</p>
                            <p>Afficher la signature 
                                @isset($details->ship_details["signature"]) <a href="{{url($details->ship_details['signature'])}}" id="show-id-photo" style="cursor: pointer;" download><i class="fa fa-photo" style="float: right;"></i></a> @endisset
                                @empty($details->ship_details["signature"]) <i class="fa fa-minus-circle" style="float: right; font-size:17px;"></i> @endempty
                            </p>
                          </div>
                          </div>
                        </div>
                        @endif
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    @isset($details)
    <template id="img-source">
        <img src="{{$details->ship_details["codebarurl"]}}" alt="" style="height: 400px; width:400px;">
        {{-- for production --}}
        {{-- <img src="/public/{{$details->ship_details["codebarurl"]}}" alt="" style="height: 400px; width:400px;"> --}}
    </template>
    @endisset
@endsection