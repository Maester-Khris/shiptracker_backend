@extends('userspace/layout',['title'=>'Mes Expeditions', 'menu_item_title'=>'Expeditions'])

    @push('styles')
        <link rel="stylesheet" href="/assets/css/loader.css">
        <style>
            .icon-clickable{
                cursor: pointer;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="/assets/js/axios.min.js"></script>
        <script>    	
            document.addEventListener("DOMContentLoaded",function(){
                var swiper = new Swiper('.swiper-container', {
                    autoplay: {
                        delay: 4000,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    }
                });

                // =============== Nav Tab 1: Shipping form and order ================
                var add_colis = document.querySelector('#new-colis');
                var add_colis_complete = document.querySelector('#new-colis-complete');
                var order_ship = document.querySelector('#order-ship');
                var colis_data = [];
                add_colis.addEventListener("click",function(e){
                    e.preventDefault();   
                    colis_data.push({
                        description: document.querySelector('#new-colis-desc').value,
                        height: document.querySelector('#new-colis-height').value,
                        width: document.querySelector('#new-colis-width').value,
                        weight: document.querySelector('#new-colis-weight').value,
                        length: document.querySelector('#new-colis-length').value,
                    });
                    console.log(colis_data);
                    document.querySelector('#new-colis-desc').value="";
                    document.querySelector('#new-colis-height').value="";
                    document.querySelector('#new-colis-width').value="";
                    document.querySelector('#new-colis-weight').value="";
                    document.querySelector('#new-colis-length').value="";
                });
                add_colis_complete.addEventListener("click",function(e){
                    e.preventDefault();
                    axios.post('/userspace/package-estimator',{package_infos:colis_data}).then(function(response){
                        let costs = response.data;
                        let total_cost = costs.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
                        let newdata = colis_data.map((line, index)=>({
                            ...line,
                            ['cost']: costs[index]
                        }));
                        newdata.forEach((line, counter) =>{
                            const new_tr = document.createElement('tr');
                            const new_td_label = document.createElement('td');
                            const new_td_des = document.createElement('td');
                            const new_td_cost = document.createElement('td');
                            new_td_label.innerText = `Paquet ${counter+1}`;
                            new_td_des.innerText = `${line.height} x ${line.width} x ${line.weight}`;
                            new_td_cost.innerText = `Fcfa ${line.cost}`;
                            new_tr.append(new_td_label, new_td_des, new_td_cost);
                            document.querySelector('.recap-lines').append(new_tr);
                        });
                        const new_tr_total = document.createElement('tr');
                        const new_td_total_label = document.createElement('td');
                        const new_td_total_cost = document.createElement('td');
                        new_td_total_label.setAttribute('colspan', '2');
                        new_td_total_label.innerText = 'Total:';
                        new_td_total_cost.innerText = `Fcfa ${total_cost}`;
                        new_tr_total.append(new_td_total_label, new_td_total_cost);
                        document.querySelector('.recap-lines').append(new_tr_total);
                    });
                    document.querySelector('.add-colis-form').classList.add('d-none');
                    document.querySelector('.recap-colis').classList.remove('d-none');
                });
                order_ship.addEventListener("click",function(e){
                    e.preventDefault(); 
                    shipdata = {
                        receiver: document.querySelector("#ship_receiver_name").value,
                        packages: colis_data
                    }
                    axios.post('/userspace/expeditions/new-order',shipdata).then(response =>{
                        console.log("order registered");
                    });
                });


                // ============ Nav Tab 2: Shipping list copy ref code =============
                var copy_buttons = document.querySelectorAll(".copy_button");
                copy_buttons.forEach(btn =>{
                    btn.addEventListener("click",function(){
                        let span_text = btn.previousElementSibling;
                        navigator.clipboard.writeText(span_text.innerText);
                    })
                });

                // ========= Nav Tab 3: Shipping detail road and packages ==========
                var detail_button = document.querySelector('.detail-seach-btn');
                var shipcode_input = document.querySelector('.shipcode');
                var slide_wrapper = document.querySelector('.swiper-wrapper');
                var route_wrapper = document.querySelector('.route-wrapper');
                var pacakge_template = document.querySelector('#package-slide');
                var routeStage_template = document.querySelector('#routes-stage');
                var routeLine_template = document.querySelector('#routes-line');
                var routeIcon_template = document.querySelector('#routes-step-icon');
                var loader_template = document.querySelector('#loader');

                detail_button.addEventListener('click',function(e){
                    e.preventDefault();
                    axios.post('/userspace/expedition/get-barcode',{shipcode:shipcode_input.value}).then(function(response){
                        console.log(response.data);
                        if(response.data.img){
                            let imgsrc = response.data.img;
                            // document.querySelector('#ship-barcode').src="{{ Storage::disk('local')->url("+imgsrc+") }}";
                        }
                    }); 
                    axios.post('/userspace/expeditions/details',{ship_reference:shipcode_input.value}).then(function(response){
                        var shipping = JSON.parse(response.data.data);
                        document.querySelector('.route-wrapper').innerHTML="";
                        console.log(shipping);
                        // add Route points
                        shipping.route_points.forEach((point, index) => {
                            let stageItem = document.importNode(routeStage_template.content, true);
                            let lineItem = document.importNode(routeLine_template.content, true);
                            let iconItem = document.importNode(routeIcon_template.content, true);
                            let flight_icon = iconItem.querySelector('i:first-child');
                            let passed_icon = iconItem.querySelector('i:last-child');
                            
                            stageItem.querySelector('h4').innerText = `${point.point_name}`;
                            if(point.point_id >= shipping.actual_point_id ){
                                stageItem.querySelector('.stage-icon').append(flight_icon)
                            }else{
                                stageItem.querySelector('.stage-icon').append(passed_icon)
                            }   
                            route_wrapper.appendChild(stageItem);

                            if(index < (shipping.route_points.length -1)){
                                if((index + 1) == shipping.actual_point_id){
                                    let loader = document.importNode(loader_template.content, true);
                                    lineItem.querySelector('.loader-container').append(loader);
                                }
                                route_wrapper.appendChild(lineItem);
                            }
                        });
                        // add  Packages
                        shipping.packages.forEach((pack, index) => {
                            let packageItem = document.importNode(pacakge_template.content, true);
                            packageItem.querySelector('h4').innerText = `Colis N° ${index}`;
                            packageItem.querySelector('.desc').innerText = `${pack.description}`;
                            packageItem.querySelector('.volum').innerText = `(25 x 34 x ${pack.weight})`;
                            slide_wrapper.appendChild(packageItem);
                        });
                        // Show point and packaes
                        document.querySelector('.tracker-content').classList.remove('d-none'); 
                        document.querySelector('.tracker-no-content').classList.add('d-none'); 
                        document.querySelector('.route-container').classList.remove('d-none');
                    });
                });
            });
        </script>
    @endpush


@section('content')
    {{-- <nav class="nav"> --}}
        {{-- <a class="{{request()->has('detail') ? 'nav-link' : 'nav-link active' }}" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
            type="button" aria-selected="true">Nouvel Envoi</a>
        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
            type="button" aria-selected="false">Historique</a> 
            {{request()->has('detail') ? 'nav-link active' : 'nav-link' }}--}}
        {{-- <a class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
            type="button" aria-selected="false">Détails</a> --}}
    {{-- </nav> --}}

    <div class="tab-content" id="myTabContent">

        <!-- Tab N°1  -->
        {{-- <div class="{{request()->has('detail') ? 'tab-pane fade' : 'tab-pane fade show active' }}" id="home" role="tabpanel" aria-labelledby="home-tab" style="margin: 10px 20px; margin-left:0px;">
            <div style="background-color: #eee; padding:20px; border-radius: 10px; min-height:420px;">
                @include('userspace/components/newexpedition')
            </div>
        </div> --}}
        
        <!-- Tab N°2  -->
        {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="margin: 10px 20px; margin-left:0px;">
            <div style="background-color: #eee; padding:20px; border-radius: 10px; min-height:420px;">
                <div style="margin-bottom:20px;">
                    <h4>Liste des expeditions enregistrées</h4>
                </div>
                <table id="example" class="table table-sm table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Code Exped</th>
                            <th>Expéditeur</th>
                            <th>Destinataire</th>
                            <th>Départ coli(s)</th>
                            <th>Status d'envoi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider table-divider-color">
                        @foreach ($shippings as $item)
                            <tr>
                                <td class="position-relative"><span>{{$item->reference_exp}}</span> <i class="copy_button icon-clickable position-absolute ph-bold ph-copy" style="font-size: 12px; top:5px; right:5px;"></i> </td>
                                <td>{{$item->sender}}</td>
                                <td>{{$item->receiver}}</td>
                                <td>{{$item->departure_date !=null ? $item->departure_date : '/' }}</td>
                                <td style="text-align: center"><span class="badge badge-primary rounded-pill d-inline" style="padding: 4px 15px;">{{$item->status_exp}}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}

        <!-- Tab N°3  -->
        {{-- {{request()->has('detail') ? 'tab-pane fade show active' : 'tab-pane fade' }} --}}
        <div  id="details"  style="margin: 10px 0px;">
            <div style="margin:15px 0; ">
                <h4>Consulter les détails</h4>
                <form action="" style="margin-top: 20px;">
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="form121" class="shipcode form-control active" placeholder="SHIPB690B3766560" style="padding: 8px 15px;" 
                                value="{{request()->has('shipcode') ? request()->get('shipcode') : '' }}" />
                                <label class="form-label" for="form121">Reference de l'expedition</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button data-mdb-ripple-init class="btn btn-primary btn-block detail-seach-btn" style="height: 40px;">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
           

            <div style="margin-top: 16px;background-color: #eee;min-height: 300px;border-radius: 10px;padding:20px;">
                <h4 style="margin-bottom: 20px;">Suivi du trajet et Colis</h4>
                <div class="tracker-no-content" style="width:100%; height:140px; display:flex; justify-content:center; align-items:center">
                    <p style="font-size: 17px;">Rien à afficher</p>
                </div>
                <div class="row tracker-content d-none">
                    <div class="col-md-6" style="margin-right: 20px;">
                        @include('userspace/components/routestep')
                    </div>
                    <div class="col-md-5" style="margin: auto 0px;">
                        <div class="position-relative" style="margin-bottom: 30px; text-align:center;">
                            <img id="ship-barcode" src="/assets/img/no-barcode.png" class="img-thumbnail" alt="ship bar code" style="height: 80px; width:200px;margin-bottom: 5px;">
                            {{-- <img id="ship-barcode" src="{{ Storage::disk('local')->url("barcodes/code_6.jpg") }}" class="img-thumbnail" alt="ship bar code" style="height: 80px; width:200px;margin-bottom: 5px;"> --}}
                            <i class="position-absolute icon-clickable ph-bold ph-download-simple" style="top:3px; right:3px;font-size:15px;"></i>
                            <h5 style="font-size:18px,">Code bar de l'expédition</h5>
                        </div>
                        <div class="swiper-container"
                            style="width: 250px; height: auto; overflow: hidden; margin: 0 auto;">
                            <div class="swiper-wrapper"> </div>
                            <div class="swiper-pagination" style="width: 100%!important;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('userspace/components/codetemplate')
@endsection
