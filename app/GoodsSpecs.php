<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsSpecs extends Model
{
    protected $table = 'goods_specs';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
