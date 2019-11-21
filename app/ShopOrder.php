<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    //  这样写ShopOrder会自动找shop_order数据表
    // ShopOrder => shop_order
    public $timestamps = false;

    public function ShopDetails()
    {
        return $this->hasMany('App\ShopDetail','oid');

    }
    
    
}
