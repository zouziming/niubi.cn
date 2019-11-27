@extends('Admin.layout.main')

@section('title','添加权限')

@section('body')
<div class="route_bg">

        <a href="/admin">返回主页</a>
        >
        <span>添加权限</span>

    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/admin/power/add" method="post">
	 {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">权限名</label>
    <input type="text" class="form-control" name="name" placeholder="权限名">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">权限描述</label>
    <input type="text" class="form-control" name="descr"  placeholder="权限描述">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">控制器</label>
    <input type="text" class="form-control" name="controller" placeholder="控制器">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">操作</label>
    <input type="text" name="action" class="form-control" placeholder="操作">
  </div>  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection