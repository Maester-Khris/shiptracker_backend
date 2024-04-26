<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Shiphelper{

    /**
     * barcode 12digit = 11digit + 1digit
     * 11 = 06 (date) + 05 (ship last reference number digit)
     * 1 checking digit
    */
    public static function generateReferenceCode(){
        $uuid = Str::uuid();
        $temp = strtoupper(substr(str_replace('-', '', $uuid), 0, 12));
        $transformed = preg_replace("/[^0-9]/", random_int(1,9), substr($temp, -5) );
        $final12 = substr_replace($temp, $transformed, -5);
        $identifier = "SHIP" . $final12;
        return $identifier;
    }
    public static function generate12DigitCode($date, $shipref){;
        $year = substr($date->year, -2);
        $month = strlen(str($date->month)) == 1 ? '0'.$date->month : str($date->month);
        $day = strlen(str($date->day)) == 1 ? '0'.$date->day : str($date->day);
        $partial = str('')->append( $day, $month, $year) . substr($shipref, -5);
        $lastdigit = self::computeCheckingDigit($partial);
        return $partial . $lastdigit;
    }

    public static function computeCheckingDigit($partial11){
        $data = collect(str_split($partial11))->mapWithKeys(function($value, $key){
            return [$key + 1 => $value];
        });
        list($oddKeys, $evenKeys)= $data->partition(function ($value, $key) {
            return $key % 2 !== 0; 
        });
        $sumoddpart = $oddKeys->reduce(function($tempsum, $val){
            return $tempsum+intval($val);
        },0);
        $sumevenpart = $evenKeys->reduce(function($tempsum, $val){
            return $tempsum+intval($val);
        },0);

        $total = $sumoddpart * 3 + $sumevenpart;
        $check = $total % 10 == 0 ? 0 : 10 - ($total % 10) ;
        return $check;
    }

    /**
     * Inputs: Colis (poids - longueur - largeur - hauteur) in cm
     * Process: each colis determine billed weight (volumetric vs real)
     * Result: billed weight * freight offer (in usd)
    */
    // $data = [
    //     ["weight"=> 10, "length"=> 250, "width"=> 75, "height"=> 100 ]
    // ];
    public static function costEstmator($data){
        $FREIGHT_OFFER = 12;
        $TOTAL_COST = [];
        if(count($data)>0){
            foreach($data as $package){
                $volumetric_w = ($package["length"] * $package["width"] * $package["height"]) / 6000 ;
                $billed_w = $volumetric_w > $package["weight"] ? $volumetric_w : $package["weight"];
                $TOTAL_COST[] = $billed_w * $FREIGHT_OFFER;
            }
        }
        $costs = collect($TOTAL_COST)->sum();
        dd($costs);
        return $costs;
    }

    public static function getShippingStatus($statuscode){
        $status = "";
        switch ($statuscode) {
            case 1:
                $status = "ORDERED";
                break;
            case 2:
                $status = "DEPOSITED";
                break;
            case 3:
                $status = "ON WAY";
                break;
            case 4:
                $status = "ARRIVED";
                break;
            case 5:
                $status = "DELIVERED";
                break;
            default:
                $status = "ORDERED";
                break;
        }
        return $status;
    }
}
