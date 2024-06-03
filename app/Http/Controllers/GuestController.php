<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Shipping;

class GuestController extends Controller
{
    public function showSignup(){
        return view('auth.signup');
    }
    
    public function showSignin(){
        return view('auth.login');
    }


    public function registerMessage(Request $request){
        // validate input, if bad return with inputs
        $message = Message::create([
            "guest_name" => $request->msger_name,
            "guest_email" => $request->msger_email,
            "message_subject" => $request->msg_subject,
            "message_content" => $request->msg_content,
        ]);
        session()->flash('status', 'Votre message a été bien envoyé !');
        return back();
    }

    public function registerReclamation(Request $request){
        // validate input, if bad return with inputs
        $expedition_flag = Shipping::where('reference_exp',$request->exped_code)->exists();
        if($expedition_flag){
            $message = Message::create([
                "guest_name" => $request->msger_name,
                "guest_email" => $request->msger_email,
                "message_type" => "reclamation",
                "expedition_code" => $request->exped_code,
                "message_subject" => $request->msg_subject,
                "message_content" => $request->msg_content,
            ]);
            session()->flash('status', 'Votre plainte a été bien envoyé !');
            return back();
        }else{
            session()->flash('status_err', 'Code d\'expedition introuvable !');
            return back();
        }
        
    }
}
