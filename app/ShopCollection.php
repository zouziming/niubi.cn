<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCollection extends Model
{
    protected $table = 'shop_collection';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
