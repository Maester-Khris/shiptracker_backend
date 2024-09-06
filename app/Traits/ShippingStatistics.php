<?php
namespace App\Traits;

use App\Models\Shipping;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

trait ShippingStatistics{

    public function shipCountPerLastNMonth($nbmonths){
        $today = Carbon::today()->endOfDay();
        $startoflastmonths = $today->copy()->subMonths(($nbmonths-1))->startOfMonth()->startOfDay();
        $data = DB::table("shippings")
            ->whereBetween('created_at', [$startoflastmonths, $today])
            ->select(DB::raw('MONTH(created_at) as month'),  'reference_exp')
            ->distinct()
            ->get();

        return $data->groupBy('month')->map(function($item){
            return $item->count();
        });
    }

    // =========== Clients =========================
    public function totalDistinctClients(){
        $data = DB::table("shippings")
            ->select('sender')
            ->distinct()
            ->get();

        return $data;
    }
    public function clientPerLastMonth($nbmonths){
        $today = Carbon::today()->endOfDay();
        $startoflastmonths = $today->copy()->subMonths(($nbmonths-1))->startOfMonth()->startOfDay();
        $data = DB::table("shippings")
            ->whereBetween('created_at', [$startoflastmonths, $today])
            ->select(DB::raw('MONTH(created_at) as month,  COUNT(DISTINCT sender) as senders'))
            ->groupby('month')
            ->get();

        return $data->groupby('month')->map(function($item){
            return $item[0];
        });;
    }


    // =========== shipping count per status =========================
    public function groupShippingperStatus(){
        $data = DB::table('shippings')
            ->select(DB::raw('COUNT(id) as totalids'), 'status_exp')
            ->groupBy("status_exp")->get();

        $res = $data->groupBy("status_exp")->map(function($item){
            return $item[0]->totalids;
        });
        return $res;
    }

    // =========== transit performances =========================
    public function avgTransitDuration($nbmonths){
        $today = Carbon::today()->endOfDay();
        $startoflastmonths = $today->copy()->subMonths(($nbmonths-1))->startOfMonth()->startOfDay();
        $data = DB::table("shippings")
            ->whereNotNull('departure_date')
            ->whereNotNull('arrival_date')
            ->whereBetween('created_at', [$startoflastmonths, $today])
            ->select(DB::raw('MONTH(created_at) as month'), 'sender', 'created_at', 'departure_date','arrival_date')
            ->distinct()
            ->get();


        $groupeddata = $data->groupBy('month');
        $groupeddata->each(function($monthgroup){
            $temp = [];
            foreach($monthgroup as $item){
                $avgtransit = Carbon::createFromFormat('Y-m-d H:i:s',$item->arrival_date)
                ->diffInDays(Carbon::createFromFormat('Y-m-d H:i:s',$item->departure_date));
                $temp[]=$avgtransit;
                $item->transitduration=$avgtransit;
            }
            $monthgroup->avgtransit = collect($temp)->avg();
            return $monthgroup;
        });
    
        return $groupeddata->map(function($item){
            return $item->avgtransit;
        });
    }
    public function totalAvgTransitDuration(){
        $today = Carbon::today()->endOfDay();
        $data = DB::table("shippings")
            ->whereNotNull('departure_date')
            ->whereNotNull('arrival_date')
            ->select(DB::raw('MONTH(created_at) as month'), 'sender', 'created_at', 'departure_date','arrival_date')
            ->distinct()
            ->get();

        $groupeddata = $data->groupBy('month');
        $groupeddata->each(function($monthgroup){
            $temp = [];
            foreach($monthgroup as $item){
                $avgtransit = Carbon::createFromFormat('Y-m-d H:i:s',$item->arrival_date)
                ->diffInDays(Carbon::createFromFormat('Y-m-d H:i:s',$item->departure_date));
                $temp[]=$avgtransit;
                $item->transitduration=$avgtransit;
            }
            $monthgroup->avgtransit = collect($temp)->avg();
            return $monthgroup;
        });
    
        return $groupeddata->map(function($item){
            return $item->avgtransit;
        });
    }

    public function totalPackagesSent(){
        $total = [];
        $shippingsents = Shipping::with('packages')->where("status_exp","DELIVERED")->get();
        foreach($shippingsents as $ship){
            $total[] = $ship->packagesCount() ;
        }
        return array_sum($total);
    }

}