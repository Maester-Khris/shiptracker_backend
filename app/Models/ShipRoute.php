<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipRoute extends Model
{
    use HasFactory;
    protected $fillable = ["route_name", "route_points","route_uuid"];
    protected $casts = [
        'route_points' => 'json',
    ];

}
