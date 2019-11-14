<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_value';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
