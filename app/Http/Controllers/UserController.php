<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Hash;

class UserController extends Controller
{
    use RegistersUsers;

    /** =========== Sign UP ===============
     * get & post
     * show form and exute process
    */
    // ================== Next ==================
    // on the same view of auth success
    // prompt user to validate his email
    // $this->verifyUserEmail($user->email);
    public function showSignup(){
        return view('auth.signup');
    }
    public function signupUser(Request $request){
        $existings_mail = User::where("email","formationnikit@gmail.com")->exists();
        if(!$existings_mail){
            $user = User::create([
                "name" => "Admin Platform 2",
                "password" => Hash::make("Admin pass"),
                "telephone" => "Admin Platform 2",
                "email" => "formationnikit@gmail.com",
            ])->preference()->create([
                "alert" => [
                    'mail' => true,
                    'sms' => false
                ]
            ]);
            // trigger registered event to auto send verifi email
            event(new Registered($user));
            // $user->sendEmailVerificationNotification();
            auth()->login($user);
            return response()->json([
                "message"=>"successul registration", 
                "data"=>$user->toJson()
            ], 200);            
        }else{
            return response()->json([
                "message"=>"unauthorized, existings user",
            ], 401);
        }
    }

    /** =========== Sign IN ===============
     * get & post
     * show form and exute process
    */
    public function showSignin(){
        return view('auth.login');
    }
    public function signinUser(Request $request){
        $user = User::where("email","admin@gmail.com")->first();
        if($user->exists()){
            $is_pass_correct = Hash::check("Admin pass", $user->password);
            if($is_pass_correct){
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->route('home')
                    ->withInput([
                        "message"=>"successul registration", 
                        "data"=>$user->toJson()
                    ]);
                // $request->json(["message"=>"successful auth", "data"=>$user->toJson()],200);
            }else{
                $request->json(["message"=>"incorrect credenation"],200); 
            }
        }else{
            $request->json(["message"=>"No user found"],404); 
        }
    }

    public function signOutUser(Request $request){
        $user = Auth::user();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


    /**
     * ================ ACCOUNT MANAGEMENT ===================
    */
    public function verifyUserEmail($user_email){
        
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
}
