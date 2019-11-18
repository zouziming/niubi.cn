@extends('Admin.layout.main')

@section('title','添加权限')

@section('body')
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