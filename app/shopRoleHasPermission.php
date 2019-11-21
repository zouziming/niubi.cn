<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shopRoleHasPermission extends Model
{
    //
    // return $this->belongsTo('\App\ShopRole');
     public $timestamps = false;

     public function ShopPermission()
     {
     	return $this->hasMany('\App\ShopPermission','id','permission_id');
     }
}
