<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipPackage extends Model
{
    use HasFactory;
    protected $fillable = ["description","reference_num","weight"];
    protected $hidden = ['id','shipping_id','shipping_id', 'created_at','updated_at'];
}
