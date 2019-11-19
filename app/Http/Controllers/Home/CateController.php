<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;


class CateController extends Controller
{
    //
    public function cate(Request $request)
    {	
    	$cate=cate::where('pid','=',0)->get();
    	$data=Cate::where('pid','=',$request->id)->get();
    	dump($data);
    	dump($cate);
    	return view('Home/cate',['data'=>$data,'cate'=>$cate,'pid'=>$request->id]);
    }
}
