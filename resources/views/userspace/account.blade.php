@extends('userspace/layout',['title'=>'Mon Compte', 'menu_item_title'=>'Parametre'])



@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            let btn_tel = document.querySelector("#edit-telephone");
            let btn_pass = document.querySelector("#edit-pass");
            let btn_email = document.querySelector("#edit-email");
            // let btn_update = document.querySelector("#edit-telephone");
            btn_tel.addEventListener("click",function(){
                document.querySelector("#input_tel").removeAttribute('readonly');
                document.querySelector("#input_tel").focus();
            });
            btn_pass.addEventListener("click",function(){
                document.querySelector("#input_pass").removeAttribute('readonly');
                document.querySelector("#input_pass").focus();
                document.querySelector("#input_pass").value="";
            });
            btn_email.addEventListener("click",function(){
                document.querySelector("#input_email").removeAttribute('readonly');
                document.querySelector("#input_email").focus();
            });
        });
    </script>
@endpush






@section('content')
<nav class="nav">
    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
        aria-selected="true">Mon Compte</a>
    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
        aria-selected="false">Préférences</a>
</nav>

<div class="tab-content" id="myTabContent">

    <!-- Tab N°1  -->
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
        style="background-color:#eee; padding: 15px 10px;border-radius: 5px;margin-top:10px;">
        <div style="width: 400px; ">
            <form action="{{url('/userspace/account/edit')}}" method="POST">
                @csrf
                <div class="row">
                    {{-- input name --}}
                    <div style="display: flex; justify-content:start">
                        <div data-mdb-input-init class="form-outline"
                            style="margin-bottom: 15px;height:50px;background-color: #E0E0E0;">
                            <input type="text" class="form-control ps-5" value="{{Auth::user()->name}}" readonly
                                style="height:100%;padding:15px 15px;font-size:15px;" />
                            <i class="ph-bold ph-user ms-3" style="font-size: 22px;"></i>
                        </div>
                    </div>
                    {{-- input password --}}
                    <div style="display: flex; justify-content:start">
                        <div data-mdb-input-init class="form-outline"
                            style="margin-bottom: 15px;height:50px;background-color: #E0E0E0;">
                            <input id="input_pass" name="input_pass" type="password" class="form-control ps-5" value="{{Auth::user()->password}}" readonly
                                style="height:100%;padding:15px 15px;font-size:15px;" />
                            <i class="ph-bold ph-lock-key ms-3" style="font-size: 22px;"></i>
                        </div>
                        <button id="edit-pass" type="button" data-mdb-ripple-init style="margin-left:5px;background-color:#E0E0E0;border: 1px solid grey;border-radius:3px;height:50px;">
                            <i class="ph-bold ph-pencil-simple-line" style="font-size: 25px"></i>
                        </button>
                    </div>
                    {{-- input email --}}
                    <div class="position-relative" style="display: flex; justify-content:start">
                        <div  data-mdb-input-init class="form-outline" style="height:50px;background-color: #E0E0E0;margin-bottom:17px;">
                            <input id="input_email" name="input_email" type="email" class="form-control ps-5" value="{{Auth::user()->email}}" readonly
                                style="height:100%;padding:15px 15px;font-size:15px;" />
                            <i class="ph-bold ph-at ms-3" style="font-size: 22px;"></i>
                        </div>
                        <small class="position-absolute" style="bottom:0px; font-size: 10px; padding-left: 10px;">
                            <i class="ph-bold ph-warning" style="color:#FCA310;font-size:10px;"></i> Click on this link to
                            verify your email <a href="">activate my account</a></small>
                        
                        <button id="edit-email" type="button" data-mdb-ripple-init style="margin-left:5px;background-color:#E0E0E0;border: 1px solid grey;border-radius:3px;height:50px;">
                            <i class="ph-bold ph-pencil-simple-line" style="font-size: 25px"></i>
                        </button>
                    </div>
                    {{-- input telephone --}}
                    <div style="display: flex; justify-content:start">
                        <div data-mdb-input-init class="form-outline"
                            style="margin-bottom: 15px;height:50px;background-color: #E0E0E0;">
                            <input id="input_tel" name="input_tel" type="tel" class="form-control ps-5" value="{{Auth::user()->telephone}}" readonly
                                style="height:100%;padding:15px 15px;font-size:15px;" />
                            <i class="ph-bold ph-phone ms-3" style="font-size: 22px;"></i>
                        </div>
                        <button id="edit-telephone" type="button" data-mdb-ripple-init style="margin-left:5px;background-color:#E0E0E0;border: 1px solid grey;border-radius:3px;height:50px;">
                            <i class="ph-bold ph-pencil-simple-line" style="font-size: 25px"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init style="margin-top:10px;padding:8px 18px;border-radius:3px;">Mettre à jour</button>
            </form>
            
        </div>
    
    </div>

    <!-- Tab N°2  -->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="background-color:#eee; padding: 15px 10px;border-radius: 5px;margin-top:10px;">
       <div style="padding-left: 15px;">
        <div style="margin:5px 0;margin-bottom:15px;">
            <h5>Alertes</h5>
        </div>
        <div class="form-check form-switch" style="margin-bottom: 10px;">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                style="transform:scale(1.3);margin-right:16px;">
            <label class="form-check-label" for="flexSwitchCheckChecked">Notification par E-mail</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                style="transform:scale(1.3);margin-right:16px;">
            <label class="form-check-label" for="flexSwitchCheckDefault">Notification par SMS</label>
        </div>
        <button type="button" class="btn btn-primary" data-mdb-ripple-init
            style="margin-top:10px;padding:8px 18px;border-radius:3px;transform:translateX(-10px);">Mettre à
        jour</button>
       </div>
    </div>
</div>
@endsection