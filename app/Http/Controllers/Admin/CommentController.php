<?php

namespace App\Http\Controllers\Admin;

use App\ShopUserinfo;
use App\Goods;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
	{
		$data = Comment::orderBy('id', 'desc')->paginate(3);
		$res = '1';
		foreach ($data as $v) {
			$v['uid'] = ShopUserinfo::where('id', $v['uid'])->pluck('username')[0];
			$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
		}
		
		return view('Admin.comment.index')->with(['data'=>$data, 'res'=>$res]);
	}
	
	public function del($id)
	{
		$res = Comment::where('id', $id)->delete();
		if ($res) {
			return redirect("admin/comment");
		}
	}
	
	public function reply(Request $request)
	{
		$data = $request->all();
		// dump($data);
		if ($data['data'] == null) {
			return ['code'=>1, 'msg'=>'服务器繁忙'];
		}
		$res = Comment::where('id', $data['id'])->update(['reply'=>$data['data']]);
		$reply = Comment::where('id', $data['id'])->pluck('reply')[0];
		if ($res) {
		    $res = [
		        'code' => 0,
				'msg' => $reply,
		    ];
		} else {
		    $res = [
		        'code' => 1,
				'msg' => '服务器繁忙',
		    ];
		}
		return $res;
	}
	
	public function search(Request $request)
	{
		$res = '1';
		if ($request->name == null && $request->goods == null) {
			return redirect("admin/comment");
		}
		
		if ($request->name == null) {
			$goods = $request->all()['goods'];
			if (Goods::where('name', 'like', '%'.$goods.'%')->first() != null) {
				$gid = Goods::where('name', 'like', '%'.$goods.'%')->pluck('id')[0];
				$data = Comment::where('gid', $gid)->paginate(1)->appends($request->all());
				foreach ($data as $v) {
					$v['uid'] = ShopUserinfo::where('id', $v['uid'])->pluck('username')[0];
					$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
				}
				return view('Admin.comment.index')->with(["data"=>$data, 'res'=>$res]);
			} else {
				$res = null;
				return view('Admin.comment.index')->with(['res'=>$res]);
			}
			
		}
		
		if ($request->goods == null) {
			$name = $request->all()['name'];
			if (ShopUserinfo::where('username', 'like', '%'.$name.'%')->first() != null) {
				$uid = ShopUserinfo::where('username', 'like', '%'.$name.'%')->pluck('id')[0];
				$data = Comment::where('uid', $uid)->paginate(1)->appends($request->all());
				foreach ($data as $v) {
					$v['uid'] = ShopUserinfo::where('id', $v['uid'])->pluck('username')[0];
					$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
				}
				return view('Admin.comment.index')->with(["data"=>$data, 'res'=>$res]);
			} else {
				$res = null;
				return view('Admin.comment.index')->with(['res'=>$res]);
			}
			
		}
		
		if ($request->name != null && $request->goods != null) {
			$goods = $request->all()['goods'];
			$name = $request->all()['name'];
			if (Goods::where('name', 'like', '%'.$goods.'%')->first() != null && ShopUserinfo::where('username', 'like', '%'.$name.'%')->first() != null) {
				$gid = Goods::where('name', 'like', '%'.$goods.'%')->pluck('id')[0];
				$uid = ShopUserinfo::where('username', 'like', '%'.$name.'%')->pluck('id')[0];
				$data = Comment::where('uid', $uid)->where('gid', $gid)->paginate(1)->appends($request->all());
				foreach ($data as $v) {
					$v['uid'] = ShopUserinfo::where('id', $v['uid'])->pluck('username')[0];
					$v['gid'] = Goods::where('id', $v['gid'])->pluck('name')[0];
				}
				return view('Admin.comment.index')->with(["data"=>$data, 'res'=>$res]);
			} else {
				$res = null;
				return view('Admin.comment.index')->with(['res'=>$res]);
			}
		}
	}
}
