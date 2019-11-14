<?php

namespace App\Http\Controllers\Admin;

use App\Cate;
use App\Goods;
use App\AttributeKey;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecsController extends Controller
{
    public function index($id)
	{
		
		$cid = Goods::where('id', $id)->pluck('cid');
		$attr = Goods::where('id', $id)->pluck('attribute_list');
		// $attr = json_decode($attr[0]);
		dump($attr);
		$pid = Cate::where('id', $cid)->pluck('pid');
		
		$key = AttributeKey::where('cate_id', $pid)->get();
		
		
		foreach ($key as $k=>$v) {
			$value[$k] = AttributeValue::where('attr_id', $v['id'])->get();
		}
		
		return view('Admin.specs.index')->with(['key'=>$key, 'value'=>$value, 'id'=>$id, 'attr'=>$attr[0]]);
	}
	
	public function set(Request $request)
	{
		$all = $request->all();
		// dump($all);
		// dump($all['datas']);
		$data = json_encode($all['datas'], JSON_UNESCAPED_UNICODE);
		dump($data);
		$res = Goods::where('id', $all['id'])->update(['attribute_list' => $data]);
		
		if ($res) {
		    $res = [
		        'code' => 0,
		    ];
		} else {
		    $res = [
		        'code' => 1,
		    ];
		}
		return $res;
	}
}
