<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\Alert;
use App\Services\Barcode;
use App\Mail\ShiptrackerMail;
use App\Jobs\SendMail;
use Illuminate\Support\Facades\Mail;
use Courier;

class FeatureController extends Controller
{
    private $alertService;
    private $barcodeService;

    public function __construct(Alert $alertservice, Barcode $barcodeservice){
        $this->alertService = $alertservice;
        $this->barcodeService = $barcodeservice;
    }

    public function index(){
        return response()->json(["message" => 'working fine']);
    }

    public function sendsms(){

    }

    public function sendmail(){
        $passingDataToView = 'Simple Mail Send In Laravel!';
        $mail_recipient = 'formationnikit@gmail.com';
        $mail_subj= "Shiptracker Alert: Package Arrived";
        $name = "Funny Coder";

        $recipient = [
            'mail' => 'first-recipient@gmail.com',
            'subject' => 'Shiptracker new Alert'
        ];
        
        // ======== single mail =========
        Mail::to($mail_recipient)->send(new ShiptrackerMail($name, $mail_subj));

        // ======== bulk ===========
        // $recipients = [
        //     'First Coder' => ['first-recipient@gmail.com','Shiptracker new Alert'], 
        //     'Second Coder' => ['second-recipient@gmail.com','Notification of alert bill']
        // ];
        // foreach ($recipients as $name => $recipient) {
        //     Mail::to($recipient[0])->send(new ShiptrackerMail($name, $recipient[1]));
        // }

        return response()->json([
            'message'=>$this->alertService::sendMailAlert()
        ],200);
    }

    public function barcode(){
        $res = $this->barcodeService::generateBarcode('SHIPB690B3766560','SHIPB690B3766560');
        return response()->json(['message'=> "image code saved"],200);
    }
}

