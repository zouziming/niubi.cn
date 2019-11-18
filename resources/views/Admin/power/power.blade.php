@extends('Admin.layout.main')

@section('title','权限表')

@section('body')

	<div class="route_bg">

        <a href="__MODULE__/Index/main">返回主页</a>
        >
        <span>分类列表</span>

    </div>
    <div class="col-md-10" style="margin-top:5px;">
        <div class="content">
            <table  class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>权限名</th>
                    <th>权限描述</th>
                    <th>控制器名字</th>
                    <th>操作名</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr  style="font-size:10px">
                	<td>{{$v->id}}</td>
                	<td>{{$v->name}}</td>
                	<td>{{$v->descr}}</td>
                	<td>{{$v->controller}}</td>
                	<td>{{$v->action}}</td>
                	<td><a href="/admin/power/del/{{$v->id}}">删除</a>|<a href="/admin/power/edit/index?id={{$v->id}}">编辑</a></td>
                </tr>
               	@endforeach
              
            </table>
           
        </div>
         <button type="button" class="btn btn-default"><a href="/admin/power/add
         	">添加权限</a></button>
    </div>
@endsection