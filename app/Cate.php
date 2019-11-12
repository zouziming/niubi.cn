<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    
    public $timestamps = false;
    
    protected $guarded = [];
	
	public function posts()
	{
		return $this->hasMany('App\AttributeKey');
	}
}
