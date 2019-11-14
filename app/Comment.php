<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'shop_comment';
    
    public $timestamps = false;
    
    protected $guarded = [];
}
