<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    {{-- <span>{{$mypass}}</span> --}}

    <p>/public{{"/test"}}</p>

    {{-- <img src="{{url('storage/SHIPC1D619F65146/destinataire_card.png')}}" alt="" style="height: 150px;width:140px;"> --}}

    {{-- <script>
        let span = document.querySelector("span");
        let plainpass = span.innerText;
        span.addEventListener("click",function(){
            span.innerText = '{{Crypt::decryptString($mypass)}}'
        })
    </script> --}}

    {{-- @php
        dd(Auth::user());
    @endphp --}}
    {{-- <p>username is {{Auth::user()->name}}</p> --}}
    {{-- <button id="welcome">Click me to test Shipping ordering </button>
    <button id="launch">Click me to test Shipping launch </button>
    <button id="update">Click me to test shipping status update </button>
    <button id="next">Click me to test shipping route next points </button>
    <button id="pref">Click me to test user pref update </button>
    <script src="/js/axios.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            var bt = document.querySelector("#welcome");
            var bt2 = document.querySelector("#launch");
            var bt3 = document.querySelector("#pref");
            var bt4 = document.querySelector("#update");
            var bt5 = document.querySelector("#next");
            bt.addEventListener("click",function(){
                data = {
                    sender: "Jacqui Biley",
                    receiver: "Francois Filou",
                    packages: [
                        {description: "Sac à dos", weight: 10},
                        {description: "Blouson Lv", weight: 1.5},
                        {description: "Telephone", weight: 5.3}
                    ]
                };
                axios.post('/live/test/order', data).then(function(response){
                    console.log(response.data);
                })
            });
            bt2.addEventListener("click",function(){
                data = {
                    shipcode: "SHIP118EA2528222",
                    routeuuid: "a004ac1e-54cd-437e-a2f0-c73ee44f06f2"
                };
                axios.post('/live/test/launch', data).then(function(response){
                    console.log(response.data);
                })
            });
            bt3.addEventListener("click",function(){
                data = {
                    preference: {
                        sms: false,
                        mail: false
                    }
                };
                axios.post('/live/test', data).then(function(response){
                    console.log(response.data);
                })
            });
            bt4.addEventListener("click",function(){
                data = {
                    shipcode: "SHIP118EA2528222",
                    shipstatus: 2
                };
                axios.post('/live/test', data).then(function(response){
                    console.log(response.data);
                })
            });
            bt5.addEventListener("click",function(){
                data = {
                    shipcode: "SHIP118EA2528222",
                    route_uiid: "a004ac1e-54cd-437e-a2f0-c73ee44f06f2",
                    ship_pointid: 5
                };
                axios.post('/live/test', data).then(function(response){
                    console.log(response.data);
                })
            });
            console.log("loading finished");
        });
    </script> --}}


    {{-- <table>
        <thead>
            <td>exped</td>
            <td>clients</td>
            <td>steps</td>
            <td>packages</td>
        </thead>
        <tr>
            @foreach($details as $line)
                @php
                    dd($linee);
                @endphp
                <td>{{$details->ship_details['reference']}}</td>
                <td>{{$details->client_details['sender_name']}}</td>
                <td>{{count($details->step_details)}}</td>
                <td>{{count($details->packages)}}</td>
            @endforeach

           
        </tr>
    </table> --}}
</body>
</html>

    