<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'shop_goods';
	
	public $timestamps = false;
	
	protected $guarded = [];
}
