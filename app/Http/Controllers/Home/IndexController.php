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
    	$data=Cate::where('pid','=',0)->get();
    	foreach ($data as $key => $value) {
    		$son = Cate::where('pid','=',$value->id)->get();
    		$data[$key]['son'] =$son;
    		// dump($son);
    	}
    	dump($data);
    	return view('/Home/index',['data'=>$data]);
    }
}
