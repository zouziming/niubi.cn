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
    	$data=Cate::where('id','=',$request->id)->first();
    	// dump($data);
    	// dump($cate);
    	// dump($data->pid);

    	// 判断是否有子类
    	if ($data->pid==0) {
    	// 	// 有子类
    		// 查出子类
    		$bro=Cate::where('pid',$data->id)->get();
    		// 查自己
    		$pid=Cate::where('id',$data->id)->first();
    	} else {
    		// 没子类
    		// 查兄弟
    		$bro=Cate::where('pid',$data->pid)->get();
    		// 查父类
    		$pid=Cate::where('id',$data->pid)->first();

    	}
    	// dump($pid);
    	return view('Home/cate',['data'=>$bro,'cate'=>$cate,'pid'=>$pid,'mb'=>$data,'sonId'=>$request->id]);
    }
}
