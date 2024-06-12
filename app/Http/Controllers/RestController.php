<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Route;
use App\Models\Shipping;
use App\Models\ShipRoute;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Traits\ShippingOperation;
use Illuminate\Filesystem\Filesystem;
use App\Services\Barcode;
use App\Services\Shiphelper;

class RestController extends Controller
{
    use ShippingOperation;

    private $barcodeService;
    private $shipService;
    public function __construct(Barcode $barcodeservice, Shiphelper $shipService){
        $this->barcodeService = $barcodeservice;
        $this->shipService = $shipService;
    }

    // work with 12figit code or shipping coed
    public function checkShippingExist(Request $request){
        $shipping = Shipping::where("codebar_digit", $request->codedigit)->first();
        if($shipping->exists()){
            return response()->json(["data" =>$shipping->reference_exp], 200);
        }else{
            return response()->json(["data" =>""], 200);
        }
    }
   
    /** ================ Browse and Read Method ====================
     * 1- getUserShippings: List of shippings
     * 2- getShippingDetail: Shipping full details
     * 2- getUserShippingDetail: Shipping packages and step detail for userspace
     * 3- getLimitedDetail: Shipping partial detail
    */
    public function allShippings(Request $request){
        $ships = Shipping::with('packages')->get();
        return response()->json(["data" => $ships->toJson() ], 200);
    }
    
    public function getShippingDetail(Request $request){
        $ship = Shipping::where("reference_exp", $request->shipcode)->first();
        if($ship->status_exp =="ORDERED" || $ship->status_exp =="DEPOSITED"){
            $running_stepid = 0;
        }else{
            $running_stepid = $this->shippingRunningStepId($ship->id);
        }
        $shipdetails = $this->shippingDetails($request->shipcode);
        return response()->json(["data" => [
            $shipdetails->ship_details["status"],
            $shipdetails->client_details,
            count($shipdetails->packages),
            $running_stepid ,
            $shipdetails->step_details,
            $shipdetails->ship_details["depart"],
            $shipdetails->ship_details["arrival"],
        ] ], 200);
    }
    public function getUserShippingDetail(Request $request){
        $ship = Shipping::where("reference_exp", $request->shipcode)->first();
        $shipdetails = $this->shippingDetails($request->shipcode);
        return response()->json([
            "packages" => $shipdetails->packages, 
            "route_points" => $shipdetails->step_details]
            ,200);
    }
    public function getLimitedDetail(Request $request){
        $ship = Shipping::where("reference_exp", $request->shipcode)->first();
        if($ship->status_exp =="ORDERED" || $ship->status_exp =="DEPOSITED"){
            $step_runningid = 0;
        }else{
            $step_runningid = $this->shippingRunningStepId($ship->id);
        }
        if($ship->exists()){
            $route = Route::find(1);
            $route_steps = $route->steps()->orderBy('created_at', 'asc')->get();
            return response()->json([
                "data" => [
                    $route_steps, $step_runningid, $ship->status_exp
                ]
            ], 200);
        }else{
            return response()->json(["message" =>"Shipping not found"], 404);
        }
    }



    // =================== Add Methods ============================
    public function ShippingNew(Request $request){
        $today = Carbon::now();
        $packages = $request->packages;
        $newship = $request->newship;
        $newship["reference_exp"] = $this->shipService::generateReferenceCode();

        foreach($packages as $index => $pa){
            $pa['reference_num'] = strtoupper(substr(str_replace('-', '', Str::uuid()), 0, 6));
            $packages[$index] = $pa;
        }
        $createdShip = $this->createShipping($newship, $packages);
        
        $barcodedigit = $this->shipService::generate12DigitCode($today, $createdShip->reference_exp);
        $identifier = [
            "codebar_digit" => $barcodedigit,
            "codebar_url" => $this->barcodeService::generateBarcode($barcodedigit, $barcodedigit, $newship["reference_exp"])
        ];
        $res = $this->setShippingCodes($createdShip->id, $identifier);
        return response()->json(["message" => $res], 200);
    }

    
    // =================== Edit Methods ============================
    public function ShippingNewStep(Request $request){
        $res = $this->updateShippingStep($request->new_step_id, $request->shipcode);
        return response()->json(["message" =>$res], 200);
    }
    // update to handle new status on way
    public function ShippingNewStatus(Request $request){
        if(isset($request->photo, $request->signature)){
            $photourl = $this->uploadImage($request->shipcode, 'destinataire_card', $request->photo);
            $signatureurl = $this->uploadImage($request->shipcode, 'destinataire_signature', $request->signature);
            $ship = Shipping::where("reference_exp", $request->shipcode)->first();
            $ship->receiver_id_photo_url = $photourl;
            $ship->signature_photo_url = $signatureurl;
            $ship->save();
        }
        if($request->new_status == "ONWAY"){
            $route = Route::find(1);
            $launch_res = $this->launchShipping($route, $request->shipcode);
        }
        $res = $this->updateShippingStatus($request->new_status, $request->shipcode);
        return response()->json(["message" =>[$res]], 200);
    }



    // ===================== Helper Method ============================
    /**
     * shipcode: is the name of the folder
     * image: is the base64 image of the real image to sabe
     * image type: destinataire_card or destinataire_signature
     * offload the workload to a background process
    */
    public function uploadImage($shipcode, $image_type, $base64Image){
        // $folderpath = 'public/'.$shipcode;
        // $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        // $filename = $image_type . '.png';
        // if(!Storage::disk('public')->exists($shipcode)){
        //     Storage::makeDirectory($folderpath);
        // }
        // $finalpath = $folderpath .'/'. $filename;
        // Storage::put($finalpath, $decodedImage);
        // return Storage::url($finalpath);

        $foldername = "/uploads/".$shipcode;
        $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        $filename =  $foldername . '/'. $image_type . '.png';
        $filesystem = new Filesystem();
        if(!$filesystem->exists(public_path($foldername))){
            $filesystem->makeDirectory(public_path($foldername), 0755, true, true);
        }
        file_put_contents(public_path($filename), $decodedImage);
        return $filename;
    }

    // =============== Test Methods ==================================
    public function getSomeInfo(){
        $shippings = Shipping::all();
        return response()->json(["data" =>$shippings->toJson()], 200);
    }
}

// public function getUserShippingDetail(Request $request){
    //     $ship = Shipping::where("reference_exp", $request->shipcode)->first();
    //     if($ship->status_exp =="ORDERED" || $ship->status_exp =="DEPOSITED"){
    //         $running_stepid = 0;
    //     }else{
    //         $running_stepid = $this->shippingRunningStepId($ship->id);
    //     }
        
    //     $shipdetails = $this->shippingDetails($request->shipcode);
    //     return response()->json(["data" => [
    //         $shipdetails->ship_details["status"],
    //         $shipdetails->client_details,
    //         count($shipdetails->packages),
    //         $running_stepid ,
    //         $shipdetails->step_details,
    //         $shipdetails->ship_details["depart"],
    //         $shipdetails->ship_details["arrival"],
    //     ] ], 200);
    // }