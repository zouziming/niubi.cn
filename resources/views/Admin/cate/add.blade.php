@extends('/Admin/layout/main')

@section('title','添加')


@section('body')
    <div class="route_bg">
    <a href="#">返回主页</a>
    
    <span>添加用户</span>
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
<div class="div_from_aoto" style="width: 500px;">
    
    <form action="/admin/cate/add" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="pid" value="{{$data ? $data->id : 0}}">
        <input type="hidden" name="path" value="{{$data?$data->path :'0,'}}">
       
        <div class="control-group">
            <label class="laber_from">分类名</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入分类名" name="name" type="text"><p class="help-block"></p></div>
        </div>
      
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
        </div>
    </form>
</div>
@endsection