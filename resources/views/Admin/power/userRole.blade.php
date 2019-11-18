@extends('Admin.layout.main')

@section('title','管理员列表')

@section('body')
  <div class="route_bg">

        <a href="__MODULE__/Index/main">返回主页</a>
        >
        <span>权限资源列表</span>

    </div>
    <div class="col-md-10" style="margin-top:5px;">

        <div class="content">
          <span>{{ session('status') }}</span>
            <table  class="table table-hover">
                <tr>
                    <th>用户名</th>
                    <th>所属角色</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr  style="font-size:10px">
                  <td>{{$v->username}}</td>
                  <td>{{$v->name}}</td>
                  <td><a href="/admin/power/userRole/del?id={{$v->aid}}">删除</a>|<a href="/admin/power/userRole/edit/index?id={{$v->aid}}&role_id={{$v->role_id}}&uid={{$v->username}}">编辑</a></td>
                </tr>
                @endforeach
              
            </table>
           
        </div>
         <button type="button" class="btn btn-default"><a href="/admin/power/userRole/addIndex">添加管理员</a></button>
    </div>
@endsection