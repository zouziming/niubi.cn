@extends('/Admin/layout/main')

@section('title','编辑分类')


@section('body')
<div class="route_bg">
    <a href="__MODULE__/Index/main">返回主页</a>
    <span>编辑分类</span>
</div>
    <!-- {{$edit->id}} -->
<div class="div_from_aoto" style="width: 500px;">
    <div class="form-group">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
</div>
    <form action="/admin/cate/edit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="page" value="{{$page}}">
        <input type="hidden" name="id" value="{{$edit->id}}">
        <div class="control-group">
            <label class="laber_from">分类名</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入分类名" name="name" value="{{$edit->name}}" type="text"><p class="help-block"></p></div>
        </div>
      
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
        </div>
    </form>
</div>

@endsection