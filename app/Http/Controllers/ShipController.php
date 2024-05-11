<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Shipping;
use App\Models\ShipRoute;
use App\Models\ShipPackage;
use App\Services\Barcode;
use App\Services\Shiphelper;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class ShipController extends Controller
{

    private $barcodeService;
    private $shipService;
    public function __construct(Barcode $barcodeservice, Shiphelper $shipService){
        $this->barcodeService = $barcodeservice;
        $this->shipService = $shipService;
    }

    /**
     * ============== Web functions ============== 
     * 
    */
    public function userspace_expedition(){
        $userid = Auth::user()->id;
        $shippings = Shipping::whereHas("proprietary", function ($query) use ($userid) {
                $query->where('id', $userid);
            })
            ->get();
        return view('userspace.expedition')->with(compact('shippings'));
    }
    public function userspace_account(){
        return view('userspace.account');
    }
    public function userspace_estimator(){
        return view('userspace.estimator');
    }


    /**
     * ============== Admin functions ============== 
     * 
    */
    public function launchShipping(Request $request){
        $ship_route = ShipRoute::where("route_uuid",$request->routeuuid)->first();
        $shipping = Shipping::where("reference_exp",$request->shipcode)->first();
        if($shipping->exists() && $ship_route->exists()){
            $today = Carbon::now();
            $barcode_digit = $this->shipService::generate12DigitCode($today, $request->shipcode);
            $barcode_url = $this->barcodeService::generateBarcode($barcode_digit, $barcode_digit);
            $ship_route_data = $ship_route->route_points;
            
            $shipping->status_exp = "ON WAY";
            $shipping->route_uuid = $ship_route->route_uuid;
            $shipping->actual_point_id = $ship_route_data[0]["point_id"];
            $shipping->departure_date = $today;
            $shipping->codebar_url = $barcode_url; 
            $shipping->codebar_digit = $barcode_digit;
            $shipping->save();
            return response()->json($shipping->toJson(), 200);
        }else{
            return response()->json("No data found", 404);
        }
    }
    public function updateShippingStatus(Request $request){
        $shipping = Shipping::where("reference_exp",$request->shipcode)->first();
        if($shipping->exists()){
            $shipping->status_exp = $this->shipService::getShippingStatus($request->shipstatus);
            $shipping->save();
            return response()->json($shipping->toJson(), 200);
        }else{
            return response()->json("No data found", 404);
        }
    }
    public function markShippingNewPoint(Request $request){
        $route = ShipRoute::where('route_uuid', $request->route_uiid)->first();
        $shipping = Shipping::where("reference_exp",$request->shipcode)->first();
        if($shipping->exists() && $route->exists()){
            $search_pointid = $request->ship_pointid;
            $points = collect($route->route_points);
            $matchingIndex = $points->search(function ($item) use ($search_pointid) {
                return in_array($search_pointid, $item);
            });
            if(($matchingIndex + 1) == $points->count()){
                return response()->json("No Route Next Point found", 404);
            }else{
                $shipping->actual_point_id = $points[$matchingIndex + 1]["point_id"];
                $shipping->save();
                return response()->json($shipping->toJson(), 200);
            }
        }else{
            return response()->json("No data found", 404);
        }  
    }
    public function createShippingRoute(){

    }


    /**
     * ============== Client functions ============== 
     * on function n°2: no need to use proprietary method since every ship has a unique code
     * SHIP66555392
    */
    public function getShippingBarcodeUrl(Request $request){
        $ship = Shipping::where("reference_exp",$request->shipcode)->first();
        if($ship->exists()){
            if($ship->codebar_url == null){
                return response()->json(["message"=>"Not barcode"], 200);
            }else{
                return response()->json(["message"=>"Found barcode", "img"=>$ship->codebar_url], 200);
            }
        }else{
            return response()->json(["message"=>"Shipping not found"], 404);
        }
    }
    public function orderShipping(Request $request){
        $userid = Auth::user()->id;
        $packages = $request->packages;
        foreach($packages as $index => $pa){
            $pa['reference_num'] = strtoupper(substr(str_replace('-', '', Str::uuid()), 0, 6));
            $packages[$index] = $pa;
        }
        $identifier = $this->shipService::generateReferenceCode();
        $shipping = Shipping::create([
            'reference_exp' => $identifier,
            'sender' => Auth::user()->name,
            'receiver' => $request->receiver,
            'user_id' => $userid,
        ])->packages()->createMany($packages);
        return response()->json($shipping->toJson(), 200);
    }
    public function getUserShippingDetails(Request $request){
        $ships = Shipping::where("reference_exp",$request->shipcode)
            ->with('packages')
            ->first();
        return response()->json($ships->toJson(), 200);
    }
    public function getUserShippingsHistory(){
        $userid = Auth::user()->id;
        $ships = Shipping::with('packages')
            ->whereHas("proprietary", function ($query) use ($userid) {
                $query->where('id', $userid);
            })
            ->withSum('packages as total_weight', 'weight')
            ->get();
        return response()->json($ships->toJson(), 200);
    }
    public function estimateCost(Request $request){
        $result = $this->shipService::singleCostEstmator($request->package_infos);
        return response()->json($result, 200);
    }   
    
}

