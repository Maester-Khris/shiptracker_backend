@extends('admin/layout')

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
                                            <td>{{$item->reference_exp}}</td>
                                            <td>{{$item->sender}}</td>
                                            <td>{{$item->sender_telephone}}</td>
                                            <td>{{$item->receiver}}</td>
                                            <td>{{$item->receiver_telephone}}</td>
                                            <td>{{count($item->packages)}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->status_exp}}</td>
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