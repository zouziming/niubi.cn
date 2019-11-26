<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopUserinfo extends Model
{
    const SEX_UN   =  2; //保密
    const SEX_BOY  =  1; //男
    const SEX_GIRL =  0; //女
    protected $table = 'shop_userinfo';
    protected $granded = [];
    public $timestamps = true;
}
