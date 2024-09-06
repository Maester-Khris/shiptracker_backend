<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Step;
use App\Models\User;
use App\Models\Shippingdetail;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Traits\ShippingOperation;

use App\Services\Barcode;
use App\Services\Shiphelper;
use Illuminate\Filesystem\Filesystem;
use Carbon\Carbon;

class TestController extends Controller
{
    use ShippingOperation;

    private $barcodeService;
    private $shipService;
    public function __construct(Barcode $barcodeservice, Shiphelper $shipService){
        $this->barcodeService = $barcodeservice;
        $this->shipService = $shipService;
    }

    public function index(){
        return view('welcome');
    }

    public function welcome(){
        // $nbmonths=2;
        /* =========== 0 - Stats on Shippings ==============
        * 1- count all
        * 2- count new one per last month
        */
        // $shippnb = Shipping::all()->count();
        // $shipsperMonth = $this->shipCountPerLastNMonth($nbmonths);

        /* =========== 2- Stats on Shippings Client (sender) ==============
        * 1- count all client
        * 2- count new one per last month
        */
        // $clientsnb = $this->totalDistinctElts();
        // $clientsnb->count();
        // $clientsperMonth = $this->clientPerLastMonth($nbmonths);

        /* =========== 3- Stats on Shippings effectiveness ==============
        * 1- count shipping by group of status: ORDERED - | ONWAY | - DELIVERED
        */
        // $effective_ship = $this->countEltperGroupingStatus();

        /* =========== 4- Stats on Shippings performance ==============
        * 1- average transit duratin per mont
        */
        // $transitstats = $this->avgTransitDuration($nbmonths);

        // $today = Carbon::today()->endOfDay();
        // $startoflastmonths = $today->copy()->subMonths(($nbmonths-1))->startOfMonth()->startOfDay();
        // $data = DB::table("shippings")
        //     ->whereBetween('created_at', [$startoflastmonths, $today])
        //     ->select(DB::raw('MONTH(created_at) as month'), 'sender', 'created_at')
        //     ->distinct()
        //     ->get();

        // $groupeddata = $data->groupBy('month');

        // dd($this->eltsBetweenNowAndLastNMonth($nbmonths));
        // dd($transitstats);
    }





    // Stats on Shippings

    // Nomber of create ship for last n month
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
        });;
    }



    public function totalDistinctElts(){
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



    public function groupEltsByLastNMonth($nbmonths){
        $today = Carbon::today()->endOfDay();
        $startoflastmonths = $today->copy()->subMonths(($nbmonths-1))->startOfMonth()->startOfDay();
        $data = DB::table("shippings")
            ->whereBetween('created_at', [$startoflastmonths, $today])
            ->select(DB::raw('MONTH(created_at) as month'), 'sender', 'created_at', 'departure_date','arrival_date')
            ->distinct()
            ->get();

            // return $data->groupBy('month');

        return $data->groupBy('month')->map(function($item){
            return $item[0];
        });
    }

    
    public function countEltperGroupingStatus(){
        $data = DB::table('shippings')
            ->select(DB::raw('COUNT(id) as totalids'), 'status_exp')
            ->groupBy("status_exp")->get();

        $res = $data->groupBy("status_exp")->map(function($item){
            return $item[0]->totalids;
        });
        return $res;
    }

    public function avgTransitDuration($nbmonths){
        $today = Carbon::today()->endOfDay();
        $startoflastmonths = $today->copy()->subMonths(($nbmonths-1))->startOfMonth()->startOfDay();
        $data = DB::table("shippings")
            ->whereBetween('created_at', [$startoflastmonths, $today])
            ->select(DB::raw('MONTH(created_at) as month'), 'sender', 'created_at', 'departure_date','arrival_date')
            ->distinct()
            ->get();


        $groupeddata = $data->groupBy('month');
        $final = [];
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
}
