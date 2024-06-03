@extends('admin/layout')

@push("scripts")
<script src="/assets/js/axios"></script>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        let toggle_pass_btns = document.querySelectorAll(".toggle-pass");
        let regenerate_btns = document.querySelectorAll(".regenerate");
        toggle_pass_btns.forEach(btn =>{
            btn.addEventListener("click",function(){
                let userline = this.closest('tr');
                let passcol = userline.querySelector('td:nth-child(4)');
                console.log(passcol.children);
                Array.from(passcol.children).forEach(span =>{
                    if(span.classList.contains('d-none')){
                        span.classList.remove('d-none');
                    }else{
                        span.classList.add('d-none');
                    }
                });
            });
        });
        regenerate_btns.forEach(btn =>{
            btn.addEventListener("click",function(){
                document.querySelector('#staff-email').value=this.getAttribute('to-update');
                document.querySelector("#update-pass-form").submit();
            });
        });
    });
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title" style="border-bottom-width: 0px;">
                <h2>Ajouter un utilisateur <small>Membre du Staff</small></h2>
            </div>
            <div class="x_content">
                <hr style="margin:0px 0px!important; margin-bottom:15px!important;">
                <form action="{{url('/accounts/new-staff')}}" method="POST" class="form-label-left input_mask" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="form-group">
                        <input name="staff_name" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom complet">
                    </div>
                    <div class="form-group has-feedback">
                        <input  name="staff_email" type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <input name="staff_tel" type="text" class="form-control has-feedback-left" placeholder="Numéro de telephone">
                    </div>
                    <div class="form-group has-feedback">
                        <input name="staff_password" readonly type="password" class="form-control has-feedback-left" value="{{$newpass}}">
                        <small>Mot de passe auto-généré</small>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group d-flex justify-content-between">
                        <button class="btn btn-warning" type="reset">Annuler</button>
                        <button class="btn btn-success" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title" style="border-bottom-width: 0px;">
                <h2>Liste des utilisateurs <small>Membre du Staff</small></h2>
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
                        @foreach ($staffs as $index => $member)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$member->name}}</td>
                                <td>{{$member->telephone}}</td>
                                <td style="text-sec" >
                                    <span class="hide-pass">&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;</span>
                                    <span class="show-pass d-none">{{$member->password}}</span>
                                </td>
                                <td>
                                    <span class="badge badge-warning toggle-pass" style="padding:8px 10px;cursor:pointer;"><i class="fa fa-eye"
                                            style="margin-right: 5px;"></i>Voir</span>
                                    <span to-update="myemail@gmail.com" class="badge badge-info regenerate" style="padding:8px 10px;cursor:pointer;"><i class="fa fa-refresh"
                                            style="margin-right: 5px;"></i>actualiser mot de passe</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form id="update-pass-form" action="{{url("/accounts-staff/newpassword")}}" method="POST">
                    @csrf
                    <input type="hidden" id="staff-email" name="account_email" value="" >
                </form>
            </div>
        </div>
    </div>
</div>
@endsection