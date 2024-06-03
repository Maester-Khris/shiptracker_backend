<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Shippingdetail;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\ShippingOperation;

class TestController extends Controller
{
    use ShippingOperation;

    public function welcome(){
        $shipcode = "87733873";
        $details = $this->shippingDetails($shipcode);
        return view("welcome")->with(compact('details'));
        return response()->json($details->toJson(), 200);
    }

    public function index(){
        
    }
}
