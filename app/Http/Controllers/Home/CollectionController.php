<?php

namespace App\Http\Controllers\Home;

use App\Goods;
use App\ShopCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index(Request $request)
	{
		$data = ShopCollection::where('uid', session('userInfo.id'))->where('status', 1)->get();
		foreach ($data as $k=>$v) {
			$data[$k]['goods'] = Goods::where('id', $v['gid'])->first();
			// dd($res);
		}
		// dump($data);
		return view('Home.collection')->with('data', $data);
	}
}
