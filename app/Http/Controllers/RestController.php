<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shipping;
use App\Models\ShipRoute;

class RestController extends Controller
{
    public function connectUser(Request $request){
        $user = User::where("email",$request->email)->first();
        if($user->exists()){
            // $is_pass_correct = Hash::check("Admin pass", $request->password);
            // if($is_pass_correct){
                return response()->json([
                    "data" => $user->toJson(),
                    "apiToken" => $user->createToken($request->device)->plainTextToken
                ], 200);
            // }else{
            //     $request->json(["message"=>"incorrect credentials"],200); 
            // }
        }else{
            $request->json(["message"=>"No user found"],404); 
        }
    }
    public function deconnectUser(Request $request){
        $user = User::where("email",$request->email)->first();
        if($user->exists()){
            $user->tokens()->delete();
            return response()->json(["message" => "Deconencted, Goodbye!"], 200);
        }else{
            $request->json(["message"=>"No user found"],404); 
        }
    }
    // ===============================================================================================

    public function getUserShippings(Request $request){
        $user = User::where("email", $request->user_email)->first();
        if($user->exists()){
            $ships = Shipping::with('packages')
                ->whereHas("proprietary", function ($query) use ($user) {
                    $query->where('id', $user->id);
                })->get();
                return response()->json(["data" => $ships->toJson() ], 200);
        }
        
        // return response()->json(["data" => $user->shippings->toJson() ], 200);
    }
    public function getUserShippingDetail(Request $request){
        $shipping = Shipping::with('packages')
            ->where("reference_exp",$request->ship_reference)->first(); 
        if($shipping->exists()){
            return response()->json(["data" => $shipping->append('route_points')->toJson() ], 200);
        }
    }
    public function getUserShippingsInfos(Request $request){
        
    }

    public function getSomeInfo(){
        $shippings = Shipping::all();
        return response()->json(["data" =>$shipping->toJson()], 200);
    }
}
