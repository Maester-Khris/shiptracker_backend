<?php

namespace App\Http\Controllers;


use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function signupUser(Request $request){
        $guestrole = Role::where('name','Guest user')->first();
        $existings_mail = User::where("email",$request->user_email)->exists();
        if(!$existings_mail){
            if($request->user_password == $request->user_password_confirm){
                $user = User::create([
                    "name" => $request->user_name,
                    "password" => Hash::make($request->user_password),
                    "telephone" => $request->user_tel,
                    "email" => $request->user_email,
                ])->assignRole($guestrole);
                return redirect()->intended('/userspace/expeditions');
            }else{
                return back()->withErrors([
                    "message"=>"Error, password dont match",
                ]);
            }           
        }else{
            return back()->withErrors([
                "message"=>"unauthorized, existings user",
            ]);
        }
        // ========== Store to try email verification ==============
        // trigger registered event to auto send verifi email
        // event(new Registered($user));
        // $user->sendEmailVerificationNotification();
        // auth()->login($user);
    }



    // ============ Sign In Guest and Remote ====================
    public function signinGuestUser(Request $request){
        $user = User::where("email",$request->user_email)->first();
        if($user->exists()){
            $is_pass_correct = Hash::check($request->user_password, $user->password);
            if($is_pass_correct){
                $request->session()->regenerate();
                if($request->user_remember == 1){
                    Auth::login($user, $remember = true);
                }
                Auth::login($user);
                return redirect()->intended('/userspace/expeditions');
            }else{
                $request->json(["message"=>"incorrect credenation"],200); 
            }
        }else{
            $request->json(["message"=>"No user found"],404); 
        }
    }
    public function signinRemoteUser(Request $request){
        $user = User::where("email",$request->email)->first();
        if($user->exists()){
            $is_pass_correct = Hash::check($request->password, $user->password);
            if($is_pass_correct){
                return response()->json([
                    "data" => $user->toJson(),
                    "apiToken" => $user->createToken($request->device)->plainTextToken
                ], 200);
            }else{
                $request->json(["message"=>"incorrect credentials"],200); 
            }
        }else{
            $request->json(["message"=>"No user found"],404); 
        }
    }
    

    // ============ Sign Out Guest and Remote ====================
    public function signoutGuestUser(Request $request){
        $user = Auth::user();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function signoutRemoteUser(Request $request){
        $user = User::where("email",$request->email)->first();
        if($user->exists()){
            $user->tokens()->delete();
            return response()->json(["message" => "Deconencted, Goodbye!"], 200);
        }else{
            $request->json(["message"=>"No user found"],404); 
        }
    }
}
