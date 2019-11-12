<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;

class CateController extends Controller
{
    //
    public function index()
    {	
        $cate =new \App\Models\Cate;
    	$res=$cate->orderBy('path')->orderBy('pid')
        ->get();
    	dump($res);       
    	return view('/Admin/cate/index',['cate'=>$res]);
    } 

    public function seek(Request $request)
    {   
        $map=[];
        if (!empty($request->name)) {
            $map[]=['name','like','%'.$request->name.'%'];
        }
        if (!empty($request->id)) {
            $map[]=['id','like','%'.$request->id.'%'];
        }
        // dump($map);
        // return '123';
        $cate =new \App\Models\Cate;
       $data= $cate->where($map)->orderBy('path')->orderBy('pid')->get();
       return view('/Admin/cate/index',['cate'=>$data]);
    }


    public function add(Request $request)
    {
        $cate =new \App\Models\Cate;

        $res=$cate->where('id','=',$request->id)->first();
        // dump($res);
        // echo $res['id'];
        if ($res) {
            $res->path = $res->path.$res->id.',';
            // dump($res);
        }
    	return view('/Admin/cate/add',['data'=>$res]);
    }

    public function store(Request $request)
    {   
        $cate =new \App\Models\Cate;
    	$data['name']=$request->name;
    	$data['pid']=$request->pid;
    	$data['path']=$request->path;
    	$res =$cate->insert($data);
    	if ($res) {
            return redirect('/admin/cate/index');
            
        }
    }

    public function addSon()
    {
        // return Cate::getMember();
        $flights =new \App\Models\Cate;
              
      

    }

    public function del(Request $request)
    {
        $cate = new \App\Models\Cate;
       $aa= $cate->where('pid','=',$request->id)->first();
        dump($aa);
       // if ($aa) {
       //     echo "string";
       // }
        if ($aa==null) {
             $del=$cate ->where('id','=',$request->id)
        ->delete();
            if ($del) {
                 echo "<script>alert('删除成功');location.href='/admin/cate/index'</script>";
            } else {
                echo "<script>alert('删除失败');location.href='/admin/cate/index'</script>";
            }
        } else {
            echo "<script>alert('请先删除子类');location.href='/admin/cate/index'</script>";
        }

     
    }

    // 分类编辑页面
    public function edit(Request $request)
    {
        $cate = new \App\Models\Cate;
        $data=$cate->where('id','=',$request->id)->first();
        // dump($data);
         return view('/Admin/cate/edit',['edit'=>$data]);
    }

    // 编辑分类
    public function cateEdit(Request $request)
    {
        $cate = new \App\Models\Cate;
        // dump($request);
        // return '123';
        $edit = $cate->where('id','=',$request->id)->update(['name'=>$request->name]);
        if ($edit) {
             echo "<script>alert('编辑成功');location.href='/admin/cate/index'</script>";
        } else {
             echo "<script>alert('编辑失败');location.href='/admin/cate/index'</script>";
        }
    }
}
