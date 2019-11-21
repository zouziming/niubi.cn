@extends('Admin.layout.main')

@section('title','商城-修改订单')

@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>修改订单</span></span>
    </div><br>
    <div class="div_from_aoto" style="width: 500px;">
    <form action="amend" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$ddss->id}}">
        <div class="control-group">
            <label class="laber_from">收货人</label>
            <div class="controls"><input class="input_from" type="text" value="{{$ddss->getman}}" name="getman" ><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">手机号</label>
            <div class="controls"><input class="input_from" type="text" value="{{$ddss->phone}}" name="phone" ><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">邮政编码</label> 
            <div class="controls"><input class="input_from" type="text" value="{{$ddss->code}}" name="code" ><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">收货地址</label>
            <div class="controls"><input style="width:350px" class="input_from" value="{{$ddss->address}}" type="text" name="address" ><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">修改</button></div>
        </div>
    </form>
</div>
@endsection