<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopLink extends Model
{
    protected $table = 'shop_link';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
