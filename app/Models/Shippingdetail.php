<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingdetail extends Model
{
    use HasFactory;
    protected $fillable=["ship_details","client_details","step_details","packages"];

    protected $casts = [
        // 'ship_details' => 'array',
    ];
}
