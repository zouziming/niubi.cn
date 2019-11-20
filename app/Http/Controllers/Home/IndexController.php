<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;

class IndexController extends Controller
{
    //
    public function index()
    {
    	$obj=Cate::where('pid','=',0)->get();
    	foreach ($obj as $key => $value) {
    		$son = Cate::where('pid','=',$value->id)->get();
    		$obj[$key]['son'] =$son;
    		// dump($son);
    	}
    	dump($obj);
    	return view('/Home/index',['obj'=>$obj]);
    }
}
