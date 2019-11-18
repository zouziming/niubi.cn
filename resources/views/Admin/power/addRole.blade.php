@extends('Admin.layout.main')

@section('title','添加角色')

@section('body')
	<div class="route_bg">

        <a href="__MODULE__/Index/main">返回主页</a>
        >
        <span>添加角色</span>

    </div><br>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form action="/admin/power/role/add" method="post">
	 {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">角色名</label>
    <input type="text" class="form-control" name="name" placeholder="角色">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
  @foreach($power as $v)
  <label><input style="width:15px" type="checkbox" name="permission_id[]"  value="{{$v->id}}">
    {{$v->name}}　
    </label>
    @endforeach
</form>
@endsection