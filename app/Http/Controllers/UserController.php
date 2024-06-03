<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    // use RegistersUsers;

    /** =========== Sign UP ===============
     * get & post
     * show form and exute process
    */
    // public function showSignup(){
    //     return view('auth.signup');
    // }
    // public function signupUser(Request $request){
    //     $existings_mail = User::where("email",$request->user_email)->exists();
    //     if(!$existings_mail){
    //         if($request->user_password == $request->user_password_confirm){
    //             $user = User::create([
    //                 "name" => $request->user_name,
    //                 "password" => Hash::make($request->user_password),
    //                 "telephone" => $request->user_tel,
    //                 "email" => $request->user_email,
    //             ])->preference()->create([
    //                 "alert" => [
    //                     'mail' => true,
    //                     'sms' => false
    //                 ]
    //             ]);
    //             return redirect()->intended('/userspace/account');
    //         }else{
    //             return back()->withErrors([
    //                 "message"=>"Error, password dont match",
    //             ]);
    //         }           
    //     }else{
    //         return back()->withErrors([
    //             "message"=>"unauthorized, existings user",
    //         ]);
    //     }
    //     // ========== Store to try email verification ==============
    //     // trigger registered event to auto send verifi email
    //     // event(new Registered($user));
    //     // $user->sendEmailVerificationNotification();
    //     // auth()->login($user);
    // }

    /** =========== Sign IN ===============
     * get & post
     * show form and exute process
     * katlynn03@example.com
    */
    // public function showSignin(){
    //     return view('auth.login');
    // }
    // public function signinUser(Request $request){
    //     $user = User::where("email",$request->user_email)->first();
    //     if($user->exists()){
    //         $is_pass_correct = Hash::check($request->user_password, $user->password);
    //         if($is_pass_correct){
    //             $request->session()->regenerate();
    //             if($request->user_remember == 1){
    //                 Auth::login($user, $remember = true);
    //             }
    //             Auth::login($user);
    //             return redirect()->intended('/userspace/expeditions');
    //         }else{
    //             $request->json(["message"=>"incorrect credenation"],200); 
    //         }
    //     }else{
    //         $request->json(["message"=>"No user found"],404); 
    //     }
    //     // return redirect()->route('home')->withInput([
    //     //     "message"=>"successul registration", 
    //     //     "data"=>$user->toJson()
    //     // ]);
    //     // $request->json(["message"=>"successful auth", "data"=>$user->toJson()],200);
    // }

    // public function signOutUser(Request $request){
    //     $user = Auth::user();
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('login');
    // }


    /**
     * ================ ACCOUNT MANAGEMENT ===================
    */
    public function verifyUserEmail($user_email){
        
    }
    public function updateUserInfo(Request $request){
        $user = Auth::user();
        $user->password = Hash::make($request->input_pass);
        $user->email = $request->input_email;
        $user->telephone = $request->input_tel;
        $user->save();
        return redirect('/userspace/account');
    }
    public function updateUserPreference(Request $request){
        // get auth user
        $user = User::find(14);
        $pref = $user->preference->alert;
        $user->preference->update([
            "alert" => $request->preference
        ]);
        return response()->json($user->preference, 200);
    }

    // ======== User space management ==================
    public function myAccount(){
        // return view('estimator');
    }
}
