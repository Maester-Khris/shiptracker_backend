@php
    $allpackagesweight = 0;
    foreach($ship->packages as $pack){
        $allpackagesweight += $pack->weight;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title></title>
    <style>
        body *{
            font-family: "Quicksand", sans-serif;
            font-optical-sizing: auto;
            font-weight: 300;
            font-style: normal;
        }
        .pad-10{
            padding: 4px 10px;
        }
        .wrapper{
            width:  500px;
            margin: 0 auto;
            margin-top: 20px;
        }
        hr{
            border-width: 2px!important;
            border-color: black!important;
        }
        .table-container {
            display: table;
            width: 100%;
            text-align: center;
        }
        .table-item{
            display: table-cell;
            vertical-align: middle;
            
        }
    </style>
</head>
<body>

  <div class="wrapper">
    <div style="width:100%;margin-bottom:10px">
        <img src="/assets/img/olbiz.jpg" alt="logo olbiz" style="float:right;height:50px;width:80px;">
        <div style="clear: right"></div>
    </div>
    <div class="head-section table-container" style="margin-bottom: 10px;">
        <div class="table-item" style="text-align:left;line-height:20px;">
            2 Rue Edouard Thouvenel <br> 
            74100 Ville-la-grand
        </div>
        <div class="table-item" style="line-height:20px;">
            Mr/Mme Morreti Moreno <br>
            +41 3232 4343 23232
        </div>
        <div class="table-item" style="text-align:right;line-height:20px;">
            Mr/Mme Francisco toti<br>
            +33 3232 4343 23232
        </div>
    </div>
    <hr>
    <div class="content-section" style="padding-top:10px;margin-bottom:20px">
        <div style="width:100%; margin-bottom:10px;">
            <strong style="font-weight: 700;">OLBIZGO EXPRESS</strong>
            <span style="float:right">Total Colis: {{$ship->packagesCount}}</span>
        </div>
        <div style="margin-bottom: 10px;">
            <div class="info-place" style="float:left;width:40%;text-align:left;">
                Paris Vincène Franc Moisin, <br>
                Rue La lisere du 93, <br>
                France
            </div>
            <div  style="float:right;width:40%;text-align:right;">
                Total poids: {{$allpackagesweight}} Kg <br>
                DATE CRE: {{\Carbon\Carbon::createFromFormat('Y-m-d h:m:s',$ship->created_at)->format('Y/m/d')}} <br> 
                @if($ship->departure_date)
                    DATE EXP: {{\Carbon\Carbon::createFromFormat('Y-m-d h:m:s',$ship->departure_date)->format('Y/m/d')}} <br> 
                @else
                    DATE EXP: / <br> 
                @endif
                @if($ship->arrival_date)
                    DATE EXP: {{\Carbon\Carbon::createFromFormat('Y-m-d h:m:s',$ship->arrival_date)->format('Y/m/d')}} <br> 
                @else
                    DATE ARR: / <br> 
                @endif

            </div>
            <div style="clear: both"> </div>
        </div>
        <div style="text-align: left">
            <strong style="font-weight:700;margin-bottom:5px;">ENVOYÉ À:</strong> <br>
            {{$ship->receiver}}  <br>
            {{$ship->receiver_telephone}}
        </div>
    </div>
    <hr>
    <div class="code-section" style="width: 100%;text-align:center;padding-top:10px;">
        @if($ship->codebar_url)
            <img src="{{$ship->codebar_url}}" alt="ship code" style="widows:80px;height:80px;">
        @else
            <span>AUCUN CODE TROUVÉ</span>
        @endif
    </div>  
  </div>

  <script>
    document.addEventListener("DOMContentLoaded",function(){
        window.print();
    });
  </script>
</body>
</html>