<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopPattern extends Model
{
    protected $table = 'shop_pattern';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
