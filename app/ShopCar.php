<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCar extends Model
{
    protected $table = 'shop_car';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
