<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopUsers extends Model
{
    protected $table = 'shop_users';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
