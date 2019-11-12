<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeKey extends Model
{
    protected $table = 'attribute_key';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
