<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopAddres extends Model
{
    protected $table = 'shop_address';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
