<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
       "reference_exp", "sender","receiver","user_id"
    ];
    protected $hidden = ['id','user_id','route_uuid','codebar_url',''];

    public function packages(){
        return $this->hasMany(ShipPackage::class);
    }

    public function proprietary(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected function packagesCount(): Attribute
    {
        return new Attribute(
            get: fn () => $this->packages->count(),
        );
    }

    protected function routePoints(): Attribute
    {
        $route = ShipRoute::where('route_uuid',$this->route_uuid)->first();
        return new Attribute(
            get: fn () => $route->route_points
        );
    }
}
