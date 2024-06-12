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

    public function welcome(){
       
        // $folder = "mytest2";
        // $foldername = "/uploads/".$folder;

        // $filename = public_path($foldername .'/codebar.jpg');

        // $test = file_exists(public_path($foldername));
        // dd($filename); 

        // $filesystem = new Filesystem();
        // if(!$filesystem->exists(public_path($foldername))){
        //     $filesystem->makeDirectory(public_path($foldername), 0755, true, true);
        // }
        


        // mkdir(public_path($foldername));

        // as path use $foldername. '/file.jpg'; and access using public path
        // dd(public_path($foldername.'/codebar.jpg'));

        // $today = Carbon::now();
        // $myreference = "SHIP19655767";
        // $foldername = $myreference;
        // $barcodedigit = $this->shipService::generate12DigitCode($today, $myreference);
        // $path = $this->barcodeService::generateBarcode($barcodedigit, $barcodedigit, $foldername);
        // dd($path);

        // return view('welcome');
    }

    public function index(){
        
    }
}

// $user = User::find(3);
// $is_pass_correct = "test staff" == Crypt::decryptString($user->password) ? true : false;
// dd($is_pass_correct);

// return view("welcome");
// Storage::makeDirectory('public/les enfoires2');
// if(Storage::disk('public')->exists('les enfoires')){
//     dd("yes");
// }else{
//     dd('dont exist');
// }

// $user = User::whereHas("roles", function ($query){
//     $query->whereIn('name', ["Admin","Staff member"]);
// })->where("email","olbizgo@admin.com")->first();
// dd(isset($user));

// $steps = Step::all();
// $linkedsteps = DB::table('shipping_step')
//    ->where('shipping_id', 2)
//    ->get();

// $data = $steps->map(function($step) use ($linkedsteps){
//     $temp = $linkedsteps->where("step_id",$step->id)->first();
//     return [
//         "step_name" => $step->name,
//         "step_running_flag" =>  $temp != null ?  $temp->step_running : null,
//         "step_launched_date" => $temp != null ?  $temp->step_launched : null
//     ];
// });
// dd( $data);
// $temp = $linkedsteps->where("step_id",2)->first();
// dd( $temp->step_running);

// $ship_running_step = DB::table('shipping_step')
//     ->where('shipping_id', 1)
//     ->where('step_running', true)
//     ->select('step_id')
//     ->get();
        