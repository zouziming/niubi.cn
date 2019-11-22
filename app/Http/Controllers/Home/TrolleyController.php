<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrolleyController extends Controller
{
    //
    public function shopping(Request $request)
    {	
    	dd($request->all());
    }
}
