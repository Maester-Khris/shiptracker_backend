<?php

namespace App\Services;

class Payment{

    public static function startTransation(){
        return "new payment transaction started";
    }

    public static function transactionValidated(){
        return "the payment was validated";
    }
}