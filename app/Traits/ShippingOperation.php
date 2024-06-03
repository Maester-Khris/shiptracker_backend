<?php
namespace App\Traits;

use Carbon\Carbon;
use App\Models\Shipping;
use App\Models\Shippingdetail;
use Illuminate\Support\Facades\DB;

trait ShippingOperation{
    
    public function createShipping($inputs, $packages){
        $shipping = Shipping::create([
            'sender' => $inputs['sender'],
            'sender_telephone' =>  $inputs['sender_telephone'],
            'receiver' =>  $inputs['receiver'],
            'receiver_telephone' =>  $inputs['receiver_telephone'],
            "receiver_address" =>  $inputs['receiver_address'],
            "delivery_town" =>  $inputs['delivery_town'],
            'reference_exp' =>  $inputs['reference_exp']
        ])
        ->packages()
        ->createMany($packages);
        return 1;
    }

    public function orderShipping($route, $shipcode, $inputs){
        $today = Carbon::now();
        $route_first_step = $route->steps()->orderBy('created_at', 'asc')->first();
        $shipping = Shipping::where("reference_exp",$shipcode)->first();
        $shipping->departure_date = $today;
        $shipping->codebar_url = $inputs['codebar_url']; 
        $shipping->codebar_digit = $inputs['codebar_digit']; 
        $shipping->status_exp = "ON WAY";
        $shipping->save();

        DB::table('shipping_step')
            ->insert([
                'shipping_id' => $shipping->id, 
                'step_id' => $route_first_step->id,
                'step_running' => true,
                'step_launched' => Carbon::today()
            ]);
        return 1;
    }

    public function updateShippingStatus($stepid, $shipcode){
        $shipping = Shipping::where("reference_exp",$shipcode)->first();
        DB::table('shipping_step')
            ->where('shipping_id', $shipping->id)
            ->where('step_running', true)
            ->update(['step_running' => false]);

        DB::table('shipping_step')
            ->insert([
                'shipping_id' => $shipping->id, 
                'step_id' => $stepid,
                'step_running' => true,
                'step_launched' => Carbon::today()
            ]);
        return 1;
    }

    public function updateShippingStep($status, $shipcode){
        $shipping = Shipping::where("reference_exp",$shipcode)->first();
        $shipping->status_exp = $status;
        if($status == "ARRIVED"){
            $shipping->arrival_date = Carbon::now();
        }
        $shipping->save();
        return 1;
    }

    public function shippingDetails($shipcode){
        $ship = Shipping::where("reference_exp",$shipcode)->with('packages')->first();
        $ship_steps = DB::table('shipping_step')
            ->where('shipping_id',$ship->id)
            ->join('steps','shipping_step.step_id','=','steps.id')
            ->select('shipping_step.step_running','shipping_step.step_launched','steps.name as step_name')
            ->get();
        
        $details = new Shippingdetail;
        $details->client_details = collect([
            "sender_name" => $ship->sender,
            "sender_phone" => $ship->sender_telephone,
            "receiver_name" => $ship->receiver,
            "receiver_phone" => $ship->receiver_telephone,
            "receiver_address" => $ship->receiver_address,
            "delivery_town" => $ship->delivery_town,
        ]);
        $details->ship_details = collect([
            "reference" => $ship->sender,
            "status" => $ship->status_exp,
            "codebarurl" => $ship->codebar_url,
            "codebardigit" => $ship->codebar_digit,
            "createdat" => $ship->created_at,
            "depart" => $ship->departure_date,
        ]);
        $details->step_details = $ship_steps->map(function($item) {
            return [
                "step_name" => $item->step_name,
                "step_running_flag" => $item->step_running,
                "step_launched_date" => $item->step_launched,
            ];
        });
        $details->packages = $ship->packages;
        return $details;
    }
}