<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'shop_cate';

     public $timestamps = false;
	public static function getMember()
	{
		return 123;
	}
}
