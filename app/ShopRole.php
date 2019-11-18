<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopRole extends Model
{
    //
     public $timestamps = false;

     public function shopRoleHasPermission()
    {
        return $this->hasMany('\App\shopRoleHasPermission','role_id');
    }
    

    
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function($wheelactivity){
    //         $wheelactivity->shopRoleHasPermission()->delete();
    //     });
    // }
}
