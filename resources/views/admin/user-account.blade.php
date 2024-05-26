@extends('admin/layout')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title" style="border-bottom-width: 0px;">
                <h2>Ajouter un utilisateur <small>Collaborateur</small></h2>
            </div>
            <div class="x_content">
                <hr style="margin:0px 0px!important; margin-bottom:15px!important;">
                <form class="form-label-left input_mask" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom complet">
                        {{-- <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span> --}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                        {{-- <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span> --}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" placeholder="Numéro de telephone">
                        {{-- <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span> --}}
                    </div>
                    <div class="form-group has-feedback">
                        <input readonly type="password" class="form-control has-feedback-left" value="13445565">
                        <small>Mot de passe auto-généré</small>
                        {{-- <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span> --}}
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="item form-group d-flex justify-content-between">
                        <button class="btn btn-warning" type="button">Annuler</button>
                        <button class="btn btn-success" type="reset">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title" style="border-bottom-width: 0px;">
                <h2>Liste des utilisateurs <small>Collaborateurs</small></h2>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom Complet</th>
                            <th>Telephone</th>
                            <th>Mot de passe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>67235409</td>
                            <td>bier#fertrç_</td>
                            <td>
                                <span class="badge badge-warning" style="padding:8px 10px"><i class="fa fa-eye"
                                        style="margin-right: 5px;"></i>Voir</span>
                                <span class="badge badge-info" style="padding:8px 10px"><i class="fa fa-refresh"
                                        style="margin-right: 5px;"></i>actualiser mot de passe</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>67235409</td>
                            <td>bier#fertrç_</td>
                            <td>
                                <span class="badge badge-warning" style="padding:8px 10px"><i class="fa fa-eye"
                                        style="margin-right: 5px;"></i>Voir</span>
                                <span class="badge badge-info" style="padding:8px 10px"><i class="fa fa-refresh"
                                        style="margin-right: 5px;"></i>actualiser mot de passe</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>67235409</td>
                            <td>bier#fertrç_</td>
                            <td>
                                <span class="badge badge-warning" style="padding:8px 10px"><i class="fa fa-eye"
                                        style="margin-right: 5px;"></i>Voir</span>
                                <span class="badge badge-info" style="padding:8px 10px"><i class="fa fa-refresh"
                                        style="margin-right: 5px;"></i>actualiser mot de passe</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>67235409</td>
                            <td>bier#fertrç_</td>
                            <td>
                                <span class="badge badge-warning" style="padding:8px 10px"><i class="fa fa-eye"
                                        style="margin-right: 5px;"></i>Voir</span>
                                <span class="badge badge-info" style="padding:8px 10px"><i class="fa fa-refresh"
                                        style="margin-right: 5px;"></i>actualiser mot de passe</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>67235409</td>
                            <td>bier#fertrç_</td>
                            <td>
                                <span class="badge badge-warning" style="padding:8px 10px"><i class="fa fa-eye"
                                        style="margin-right: 5px;"></i>Voir</span>
                                <span class="badge badge-info" style="padding:8px 10px"><i class="fa fa-refresh"
                                        style="margin-right: 5px;"></i>actualiser mot de passe</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Larry</td>
                            <td>67235409</td>
                            <td>bier#fertrç_</td>
                            <td>
                                <span class="badge badge-warning" style="padding:8px 10px"><i class="fa fa-eye"
                                        style="margin-right: 5px;"></i>Voir</span>
                                <span class="badge badge-info" style="padding:8px 10px"><i class="fa fa-refresh"
                                        style="margin-right: 5px;"></i>actualiser mot de passe</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection