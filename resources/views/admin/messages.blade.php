@extends('admin/layout')

@push("styles")
<style>
    form input, form textarea{
        font-size:14px!important;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12 ">

        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title" style="border-bottom-width: 0px;">
                    <h2>Liste des messages</h2>
                    <ul class="nav navbar-right panel_toolbox justify-content-end">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Expediteur</th>
                                <th>Subjet</th>
                                <th>Categorie</th>
                                <th>Contenu</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td><strong>Demande de remboursement</strong></td>
                                <td>
                                    <span class="badge badge-primary" style="padding:5px 10px">Renseignement</span>
                                </td>
                                <td>
                                   Lorem ipsum dolor, sit amet consectetur adipisicing elit...
                                </td>
                                <td>
                                    <span class="badge badge-secondary" style="padding:5px 10px;margin-bottom:5px;cursor:pointer;"><i class="fa fa-eye"
                                            style="margin-right: 5px;"></i>Voir message</span>
                                    <span class="badge bg-green" style="padding:5px 10px;cursor:pointer;"><i class="fa fa-mail-reply"
                                            style="margin-right: 5px;"></i>Repondre</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Frank Gilbert</td>
                                <td><strong>Demande d'information</strong></td>
                                <td>
                                    <span class="badge badge-primary" style="padding:5px 10px">Renseignement</span>
                                </td>
                                <td>
                                   Lorem ipsum dolor, sit amet consectetur adipisicing elit...
                                </td>
                                <td>
                                    <span class="badge badge-secondary" style="padding:5px 10px;margin-bottom:5px;cursor:pointer;"><i class="fa fa-eye"
                                            style="margin-right: 5px;"></i>Voir message</span>
                                    <span class="badge bg-green" style="padding:5px 10px;cursor:pointer;"><i class="fa fa-mail-reply"
                                            style="margin-right: 5px;"></i>Repondre</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ngeugand F.</td>
                                <td><strong>Plainte sur le service</strong></td>
                                <td>
                                    <span class="badge badge-warning" style="padding:5px 10px">Reclamation</span>
                                </td>
                                <td>
                                   Lorem ipsum dolor, sit amet consectetur adipisicing elit...
                                </td>
                                <td>
                                    <span class="badge badge-secondary" style="padding:5px 10px;margin-bottom:5px;cursor:pointer;"><i class="fa fa-eye"
                                            style="margin-right: 5px;"></i>Voir message</span>
                                    <span class="badge bg-green" style="padding:5px 10px;cursor:pointer;"><i class="fa fa-mail-reply"
                                            style="margin-right: 5px;"></i>Repondre</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title" style="border-bottom-width: 0px;margin-bottom:0px;">
                    <h2>Message de: Mark</h2>
                    <ul class="nav navbar-right panel_toolbox justify-content-end">
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div style="padding: 8px; background:#eee;border:1px solid #b4b4b4;border-radius:5px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere itaque consectetur, quaerat quae ab molestiae, eveniet ipsam est cupiditate eos corrupti aliquam iure! Sint eius, unde debitis omnis assumenda incidunt? Nulla sed aperiam molestias enim minus officiis sint quam doloribus?</div>
                </div>
            </div>
        </div>




       
    </div>
    <div class="col-md-5 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title" style="border-bottom-width: 0px;">
                <h2>Repondre au message</h2>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Expediteur:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" readonly="readonly" value="noreply@olbizgo.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Destinataire:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="email" class="form-control" readonly="readonly" value="mark_entreprises@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Message:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea class="form-control" rows="10" placeholder="Saisissez le contenu du message de ici"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group d-flex justify-content-between">
                        <button class="btn btn-warning" type="button">Annuler</button>
                        <button class="btn btn-success" type="reset">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection