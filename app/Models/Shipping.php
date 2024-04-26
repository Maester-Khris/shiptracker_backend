<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
       "reference_exp", "sender","receiver","user_id"
    ];
    protected $hidden = ['id','user_id','route_uuid','actual_point_id','codebar_url',''];

    public function packages(){
        return $this->hasMany(ShipPackage::class);
    }

    public function proprietary(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
