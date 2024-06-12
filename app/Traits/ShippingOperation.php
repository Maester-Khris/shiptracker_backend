<?php
namespace App\Traits;

use Carbon\Carbon;
use App\Models\Shipping;
use App\Models\Step;
use App\Models\Shippingdetail;
use App\Models\ShipPackage;
use Illuminate\Support\Facades\DB;
use App\Enums\ShippingStatus;

trait ShippingOperation{
    
    public function createShipping($inputs, $packages){
        $savedpackages = [];
        foreach ($packages as $packageData) {
            $package = new ShipPackage($packageData);
            $savedpackages[] = $package;
        }
        $shipping = new Shipping();
        $shipping->sender = $inputs['sender'];
        $shipping->sender_telephone = $inputs['sender_telephone'];
        $shipping->receiver = $inputs['receiver'];
        $shipping->receiver_telephone = $inputs['receiver_telephone'];
        $shipping->receiver_address = $inputs['receiver_address'];
        $shipping->delivery_town = $inputs['delivery_town'];
        $shipping->reference_exp = $inputs['reference_exp'];
        $shipping->save();
        $shipping->packages()->saveMany($savedpackages);
        return $shipping;
    }

    public function setShippingCodes($shipid, $inputs){
        $shipping = Shipping::find($shipid);
        $shipping->codebar_url = $inputs['codebar_url']; 
        $shipping->codebar_digit = $inputs['codebar_digit']; 
        $shipping->save();
        return 1;
    }

    public function launchShipping($route, $shipcode){
        $today = Carbon::now();
        $route_first_step = $route->steps()->orderBy('created_at', 'asc')->first();
        $shipping = Shipping::where("reference_exp",$shipcode)->first();
        $shipping->departure_date = $today;
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

    public function updateShippingStep($stepid, $shipcode){
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

    public function updateShippingStatus($status, $shipcode){
        $shipping = Shipping::where("reference_exp",$shipcode)->first();
        $shipping->status_exp = $status;
        if($status == "ARRIVED" || $status == "DELIVERED"){
            $shipping->arrival_date = Carbon::now();
        }
        $shipping->save();
        return 1;
    }

    public function shippingRunningStepId($shipid){
        $ship_running_step = DB::table('shipping_step')
            ->where('shipping_id', $shipid)
            ->where('step_running', true)
            ->select('step_id')
            ->get();

        return $ship_running_step[0]->step_id;
    }

    public function shippingDetails($shipcode){
        $ship = Shipping::where("reference_exp",$shipcode)->with('packages')->first();
        $steps = Step::all();
        $linkedsteps = DB::table('shipping_step')
           ->where('shipping_id', $ship->id)
           ->get();

        $details = new Shippingdetail;
        $details->client_details = collect([
            "sender_name" => $ship->sender,
            "sender_phone" => $ship->sender_telephone,
            "receiver_name" => $ship->receiver,
            "receiver_phone" => $ship->receiver_telephone,
            "receiver_photo" => $ship->receiver_id_photo_url,
            "receiver_address" => $ship->receiver_address,
            "delivery_town" => $ship->delivery_town,
        ]);
        $details->ship_details = collect([
            "reference" => $ship->sender,
            "status" => $ship->status_exp,
            "statusplain" => $this->statusPlain($ship->status_exp),
            "signature" => $ship->signature_photo_url,
            "codebarurl" => $ship->codebar_url,
            "codebardigit" => $ship->codebar_digit,
            "createdat" => $ship->created_at,
            "depart" => $ship->departure_date,
            "arrival" => $ship->arrival_date,
        ]);
        $details->step_details = $steps->map(function($step) use ($linkedsteps){
            $temp = $linkedsteps->where("step_id",$step->id)->first();
            return [
                "step_name" => $step->name,
                "step_running_flag" =>  $temp != null ?  $temp->step_running : null,
                "step_launched_date" => $temp != null ?  $temp->step_launched : null
            ];
        });
        $details->packages = $ship->packages;
        return $details;
    }

    public function statusPlain($status){
        switch($status){
            case "ORDERED":
                return ShippingStatus::ORDERED->value;
            case "DEPOSITED":
                return ShippingStatus::DEPOSITED->value;
            case "ONWAY":
                return ShippingStatus::ONWAY->value;
            case "ARRIVED":
                return ShippingStatus::ARRIVED->value;
            case "DELIVERED":
                return ShippingStatus::DELIVERED->value;
        }
    }
}
// $ship_steps = DB::table('shipping_step')
//     ->where('shipping_id',$ship->id)
//     ->join('steps','shipping_step.step_id','=','steps.id')
//     ->select('shipping_step.step_running','shipping_step.step_launched','steps.name as step_name')
//     ->get();