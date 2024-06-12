@extends('admin/layout')

@php
    function statusPlain($status){
        switch($status){
            case "ORDERED":
                return App\Enums\ShippingStatus::ORDERED->value;
            case "DEPOSITED":
                return App\Enums\ShippingStatus::DEPOSITED->value;
            case "ONWAY":
                return App\Enums\ShippingStatus::ONWAY->value;
            case "ARRIVED":
                return App\Enums\ShippingStatus::ARRIVED->value;
            case "DELIVERED":
                return App\Enums\ShippingStatus::DELIVERED->value;
        }
    }
@endphp

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded",function(){
        console.log('ye');
        var copy_buttons = document.querySelectorAll(".copy_button");
        copy_buttons.forEach(btn =>{
            btn.addEventListener("click",function(){
                let span_text = btn.previousElementSibling;
                console.log(span_text);
                navigator.clipboard.writeText(span_text.innerText);
            })
        });
    });
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Liste des expeditions <small>clients</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Code Expedition</th>
                                        <th>Expediteur Nom</th>
                                        <th>Expediteur Telephone</th>
                                        <th>Destinataire Nom</th>
                                        <th>Destinataire Telephone</th>
                                        <th>Nombre Colis</th>
                                        <th>Date Départ</th>
                                        <th>Statut Expéd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shippings as $item)
                                        <tr>
                                            <td class="position-relative">
                                                <span>{{$item->reference_exp}}</span>
                                                <i class="copy_button icon-clickable fa fa-copy position-absolute" style="font-size:12px;top:5px;right:5px;cursor:pointer;color:#2A3F54;"></i>
                                            </td>
                                            <td>{{$item->sender}}</td>
                                            <td>{{$item->sender_telephone}}</td>
                                            <td>{{$item->receiver}}</td>
                                            <td>{{$item->receiver_telephone}}</td>
                                            <td>{{count($item->packages)}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{statusPlain($item->status_exp)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection