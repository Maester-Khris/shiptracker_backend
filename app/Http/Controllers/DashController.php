<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Route;
use App\Models\Message;
use App\Models\Shipping;
use App\Mail\ShiptrackerMail;
use App\Traits\ShippingOperation;
use Spatie\Permission\Models\Role;

use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;



class DashController extends Controller
{
    use ShippingOperation;

    public function home(){
        return redirect('/dashboard/expeditions');
    }


    public function listExpeditions(){
        $shippings = Shipping::all();
        return view("admin.expeditions")->with(compact('shippings'));
    }
    public function getExpeditionDetail(Request $request){
        if(isset($request->shipcode)){
            $shipcode = $request->shipcode;
            $details = $this->shippingDetails($request->shipcode);
            return view("admin.expedition-detail")->with(compact('details'))->with(compact('shipcode'));
        }else{
            $default_route = Route::find(1);
            $default_route_steps = $default_route->steps;
            return view("admin.expedition-detail")->with(compact('default_route_steps'));
        }
    }


    public function listMessages(){
        $msgs = Message::all();
        return view("admin.messages")->with(compact('msgs'));
    }
    public function replyToMessage(Request $request){
        // validate if bad back with input
        
        $mail_subj="Réponse à votre precedent message";
        Mail::to($request->recipient_mail)
            ->send(new ShiptrackerMail(
                $request->recipient_name, $mail_subj, $request->msg_response, $request->message_type
            ));

        session()->flash('mail_status', 'Le Mail a été bien envoyé !');
        return back();
    }


    public function listStaff(){
        $staffs = User::role('Staff member')->get();
        $newpass = $this->generatePass();
        return view("admin.user-account")->with(compact('staffs'))->with(compact('newpass'));
    }
    public function createStaffAccount(Request $request){
        // validate if bad back with input
        // "password" => Hash::make($request->staff_password),
        $staffrole = Role::where('name','Staff member')->first();
        $staff_member = User::create([
            "name" => $request->staff_name,
            "password" => Crypt::encryptString($request->staff_password),
            "telephone" => $request->staff_tel,
            "email" => $request->staff_email,
        ]);
        $staff_member->assignRole($staffrole);
        session()->flash('pass_status', 'Compte a bien été créé !');
        return back(); 
    }
    public function regeneratePassword(Request $request){
        $user = User::where('email', $request->account_email)->first();
        $user->password = Crypt::encryptString($this->generatePass());
        $user->save();
        session()->flash('pass_status', 'Le Mot de passe de $user->name a bien été mis à jour !');
        return back();
    }



    public function generatePass(){
        return Str::random(6);
    }
}
