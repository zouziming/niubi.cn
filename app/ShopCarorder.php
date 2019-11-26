<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCarorder extends Model
{
	protected $table = 'shop_carorders';
	
	public $timestamps = false;
	
	protected $guarded = [];
}
