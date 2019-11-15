<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'shop_attribute_value';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
