<?php

namespace App\Http\Controllers\Admin;

use App\ShopLunbo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LunboController extends Controller
{
    public function index(Request $request)
	{
		$data = ShopLunbo::orderBy('id', 'desc')->get();
		return view('Admin.lunbo.index')->with(['data'=>$data]);
	}
	
	public function add()
	{
		return view('Admin.lunbo.add');
	}
	
	public function checkadd(Request $request)
	{
		$this->validate($request, [
		    'file' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'file' => '图片',
		]);
		
		if($request->hasFile('file')){
			// 使用request 创建文件上传对象
			$profile = $request -> file('file');
			// 获取文件后缀名
			// dump($profile);
			$ext = $profile->getClientOriginalExtension();
			// dump($ext);
			// 处理文件名称
			$temp_name = str_random(20);
			$filename =  $temp_name.'.'.$ext;
			// 保存文件
			$res = $profile->move('./storage/lunbo/', $filename);
		}	
		
		$data['pic'] = '/storage/lunbo/'.$filename;
		if ($request->url != null) {
			$data['url'] = $request->url;
		}
		$data['addtime'] = date('Y-m-d H:i:s', time());
		
		$result = ShopLunbo::create($data);
		
		if ($result) {
			return redirect("admin/lunbo");
		}
	}
	
	public function edit(Request $request, $id)
	{
		$request->session()->flash('url', $request->server('HTTP_REFERER'));
		$data = ShopLunbo::where('id', $id)->get();
		return view('Admin.lunbo.edit')->with('data', $data[0]);
	}
	
	public function checkedit(Request $request)
	{	
		$olddata = ShopLunbo::where('id', $request->id)->first();

		$this->validate($request, [
		    'url' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'url' => '地址',
		]);
		
		if($request->hasFile('file')){
			// 使用request 创建文件上传对象
			$profile = $request -> file('file');
			// 获取文件后缀名
			// dump($profile);
			$ext = $profile->getClientOriginalExtension();
			// dump($ext);
			// 处理文件名称
			$temp_name = str_random(20);
			$filename =  $temp_name.'.'.$ext;
			
			// 保存文件
			$res = $profile->move('./storage/lunbo/', $filename);
			$data['pic'] = '/storage/lunbo/'.$filename;
			
			unlink('.'.$olddata->pic);
		}
		
		$data['url'] = $request->url;
		$data['createtime'] = date('Y-m-d H:i:s', time());
		
		$res = ShopLunbo::where('id', $request->id)->update($data);
		if ($res) {
			return redirect($request->session()->get('url'));
		}
	}
	
	public function del($id)
	{
		$res = ShopLunbo::where('id', $id)->delete();
		
		if ($res) {
			return redirect("admin/lunbo");
		}
	}
}
