<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipRoute;
use Hash;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{

    public function welcome(){
        dd(Storage::url('public/barcodes/code_6.jpg'));
    }

    public function index(){
        
    }
}
