@extends('Admin.layout.main')

@section('title','商城-订单退换详情')

@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单退换详情</span></span>
    </div><br>
    <div class="div_from_aoto" style="width: 500px;">

    <form action="tuihuan" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$th->id}}">
        <div class="control-group">
            <label class="label label-primary">商品ID</label>
            <div class="controls"><dl><dt><dd class="input_from" type="text" name="gid">{{$th->gid}}</dd></dd></dl><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="label label-primary">商品</label>
            <div class="controls"><dl><dt><dd class="input_from" type="text" name="gname" >{{$th->gname}}</dt></dd></dl><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="label label-primary">服务类型</label>
            <div class="controls"><dl><dt><dd class="input_from" type="text" name="status" >
            {{$th->status}}
            </dt></dd></dl><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="label label-primary">审核意见</label> 
            <div class="controls">                    
            <td>
                <span><input name="status2" value="1" type="radio" checked="checked" style="width:20px; margin: 20px 10px">审核通过</span>
                <span><input type="radio" name="status2" value="5" style="width:20px; margin: 20px 10px">拒绝通过</span>
            </td><p class="help-block"></p>
        </div>
        <button class="btn btn-default" type="submit">确认提交</button>
    </form>
</div>
@endsection