<?php

namespace App\Http\Controllers\Admin;

use App\ShopUsers;
use App\Goods;
use App\ShopCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index()
	{
		$res = '1';
		$data = ShopCollection::orderBy('id', 'desc')->paginate(3);
		
		foreach ($data as $v) {
			$v['uid'] = ShopUsers::where('id', $v['uid'])->pluck('username')[0];
			$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
			if ($v['status'] == 1) {
				$v['status'] = '收藏中';
			} else {
				$v['status'] = '取消收藏';
			}
				
		}
		return view('Admin.collection.index')->with(['res'=>$res, 'data'=>$data]);
	}
	
	public function del($id)
	{
		$res = ShopCollection::where('id', $id)->delete();
		if ($res) {
			return redirect("admin/collection");
		}
	}
	
	public function search(Request $request)
	{
		$res = '1';
		if ($request->name == null && $request->goods == null) {
			return redirect("admin/collection");
		}
		
		if ($request->name == null) {
			$goods = $request->all()['goods'];
			if (Goods::where('name', 'like', '%'.$goods.'%')->first() != null) {
				$gid = Goods::where('name', 'like', '%'.$goods.'%')->pluck('id')[0];
				$data = ShopCollection::where('gid', $gid)->paginate(1)->appends($request->all());
				foreach ($data as $v) {
					$v['uid'] = ShopUsers::where('id', $v['uid'])->pluck('username')[0];
					$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
					if ($v['status'] == 1) {
						$v['status'] = '收藏中';
					} else {
						$v['status'] = '取消收藏';
					}
				}
				return view('Admin.collection.index')->with(["data"=>$data, 'res'=>$res]);
			} else {
				$res = null;
				return view('Admin.collection.index')->with(['res'=>$res]);
			}
			
		}
		
		if ($request->goods == null) {
			$name = $request->all()['name'];
			if (ShopUsers::where('username', 'like', '%'.$name.'%')->first() != null) {
				$uid = ShopUsers::where('username', 'like', '%'.$name.'%')->pluck('id')[0];
				$data = ShopCollection::where('uid', $uid)->paginate(1)->appends($request->all());
				foreach ($data as $v) {
					$v['uid'] = ShopUsers::where('id', $v['uid'])->pluck('username')[0];
					$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
					if ($v['status'] == 1) {
						$v['status'] = '收藏中';
					} else {
						$v['status'] = '取消收藏';
					}
				}
				return view('Admin.collection.index')->with(["data"=>$data, 'res'=>$res]);
			} else {
				$res = null;
				return view('Admin.collection.index')->with(['res'=>$res]);
			}
			
		}
		
		if ($request->name != null && $request->goods != null) {
			$goods = $request->all()['goods'];
			$name = $request->all()['name'];
			if (Goods::where('name', 'like', '%'.$goods.'%')->first() != null && ShopUsers::where('username', 'like', '%'.$name.'%')->first() != null) {
				$gid = Goods::where('name', 'like', '%'.$goods.'%')->pluck('id')[0];
				$uid = ShopUsers::where('username', 'like', '%'.$name.'%')->pluck('id')[0];
				$data = ShopCollection::where('uid', $uid)->where('gid', $gid)->paginate(1)->appends($request->all());
				foreach ($data as $v) {
					$v['uid'] = ShopUsers::where('id', $v['uid'])->pluck('username')[0];
					$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
					if ($v['status'] == 1) {
						$v['status'] = '收藏中';
					} else {
						$v['status'] = '取消收藏';
					}
				}
				return view('Admin.collection.index')->with(["data"=>$data, 'res'=>$res]);
			} else {
				$res = null;
				return view('Admin.collection.index')->with(['res'=>$res]);
			}
		}
	}
}
