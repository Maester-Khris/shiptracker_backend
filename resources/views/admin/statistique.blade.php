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
    function getMonthName(monthnum){
        mlist = [ "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre" ];
        return mlist[monthnum-1];
    }
    function populateChart(chartype, chartid, label, datasetname, data){
        const canvas = document.querySelector(`#${chartid}`);
        const ctx = canvas.getContext('2d');
        const chartData = {
            labels: label,
            datasets: [{
                label: datasetname, 
                backgroundColor: "rgba(38, 185, 154, 0.31)",
                borderColor: "rgba(38, 185, 154, 0.7)",
                pointBorderColor: "rgba(38, 185, 154, 0.7)",
                pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointBorderWidth: 1,
                data: data, 
            }],
        };
        const chartConfig = {type: chartype, data: chartData, options: {}};
        const myChart = new Chart(ctx, chartConfig);
    }
    document.addEventListener("DOMContentLoaded",function(){
        let statistics = <?php echo json_encode($stats); ?>;
        shipmonths = Object.keys(statistics.newshippermonth);  
        shipmonthsdata = shipmonths.map(monthlabel =>{
            return statistics.newshippermonth[monthlabel]
        });
        shiplabel = shipmonths.map(month =>{
            return getMonthName(parseInt(month)) ;
        });
        cltMonth = Object.keys(statistics.newshippermonth);
        cltData = cltMonth.map(monthlabel =>{
            return statistics.newcltpermonth[monthlabel].senders
        });
        cltlabel = cltMonth.map(month =>{
            return getMonthName(parseInt(month)) ;
        });
        perfMonth = Object.keys(statistics.lastTransitAvg);
        perfData = perfMonth.map(monthlabel =>{
            return statistics.lastTransitAvg[monthlabel]
        });
        perflabel = perfMonth.map(month =>{
            return getMonthName(parseInt(month)) ;
        });

        populateChart('line', 'expChart', shiplabel, 'Nouvelles éxpeditions', shipmonthsdata);
        populateChart('bar', 'clientBar', cltlabel, 'Nouveaux clients', cltData);
        populateChart('bar', 'performanceBar', perflabel, 'Durée transit', perfData);
        
        statusLabels =  Object.keys(statistics.shipCountPerStatus);
        statusData = statusLabels.map(label =>{
            return statistics.shipCountPerStatus[label];
        });
        statusFull = {
            labels: statusLabels,
            datasets: [{
                data: statusData,
                backgroundColor: ["#455C73","#9B59B6","#BDC3C7",],
                hoverBackgroundColor: ["#34495E","#B370CF","#CFD4D8",]
            }],
            options:{
                plugins:{
                    title: {
                        display: true,
                        text: 'Doughnut Chart'
                    },
                    tooltip: {
                        enabled: true
                    },
                }
            }
        };
        var myctx = document.querySelector("#myDoughnut");
        var canvasDoughnut = new Chart(myctx, {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: statusFull
        });
    });
</script>
@endpush


@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Expéditions <small style="font-size: 14px;">Nombre de transport par mois</small></h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-9">
                    <canvas id="expChart"></canvas>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12" style="background: white;margin-top:20px;">
            <div class="col-md-4">
                <section class="dashboard_graph">
                    <div class="row x_title">
                        <h2>Nouveaux clients <small>Total: </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        <canvas id="clientBar"></canvas>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="dashboard_graph">
                    <div class="row x_title">
                        <h2>Performance <small>Durée moyen transit (en jours)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        <canvas id="performanceBar"></canvas>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="dashboard_graph">
                    <div class="row x_title">
                        <h2>Chiffres expeditions <small>groupé par statut</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body" style="padding-left:10px;font-size:14px;">
                        <canvas id="myDoughnut"></canvas>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection