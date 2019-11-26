<?php

namespace App\Http\Controllers\Admin;

use App\ShopLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function index()
	{
		$res = '1';
		$data = ShopLink::orderBy('id', 'desc')->paginate(3);
		return view('Admin.link.index')->with(['data'=>$data, 'res'=>$res]);
	}
	
	public function add()
	{
		return view('Admin.link.add');
	}
	
	public function checkadd(Request $request)
	{
		$this->validate($request, [
		    'name' => 'required',
		    'url' => 'required|url',
		]);
		
		$data['name'] = $request->name;
		$data['url'] = $request->url;
		$data['addtime'] = date('Y-m-d H:i:s', time());
		
		$res = ShopLink::create($data);
		
		if ($res) {
			return redirect("admin/link");
		}
	}
	
	public function edit(Request $request, $id)
	{
		$request->session()->flash('url', $request->server('HTTP_REFERER'));
		$data = ShopLink::where('id', $id)->get();
		return view('Admin.link.edit')->with('data', $data[0]);
	}
	
	public function checkedit(Request $request)
	{
		$this->validate($request, [
		    'name' => 'required',
		    'url' => 'required|url',
		]);
		
		
		$data['name'] = $request->name;
		$data['url'] = $request->url;
		$data['createtime'] = date('Y-m-d H:i:s', time());
		
		$res = ShopLink::where('id', $request->id)->update($data);
		
		if ($res) {
			return redirect($request->session()->get('url'));
		}
	}
	
	public function del($id)
	{
		$res = ShopLink::where('id', $id)->delete();
		
		if ($res) {
			return redirect("admin/link");
		}
	}
	
	public function search(Request $request)
	{
		if ($request->link == null) {
			return redirect("admin/link");
		}
		$link = $request->link;
		$res = ShopLink::where('name','like','%'.$link.'%')->first();
		$data = ShopLink::where('name','like','%'.$link.'%')->paginate(1)->appends($request->all());
		return view('Admin.link.index')->with(["data"=>$data, 'res'=>$res]);
	}
}
