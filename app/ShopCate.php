<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCate extends Model
{
    protected $table = 'shop_cate';
    
    public $timestamps = false;
    
    protected $guarded = [];
	
	public function posts()
	{
		return $this->hasMany('App\AttributeKey', 'cate_id');
	}
}
