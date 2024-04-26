<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class MailVerificationController extends Controller
{
    public function verifyEmail(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('home');
    }

    public function resendVerificationLink(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
