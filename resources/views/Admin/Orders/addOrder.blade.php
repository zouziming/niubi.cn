@extends('Admin.layout.main')

@section('title','商城-添加订单')

@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>添加订单</span></span>
    </div><br>
    <div class="div_from_aoto" style="width: 500px;">
    <form action="addOrder" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="id">
        <div class="control-group">
            <label class="label label-primary">用户名</label>
            <div class="controls"><input class="input_from" type="text" name="username" ><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="label label-primary">订单编号</label>
            <div class="controls"><input class="input_from" type="text" name="did" ><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="label label-primary">收货人</label>
            <div class="controls"><input class="input_from" type="text" name="getman" ><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="label label-primary">手机号</label>
            <div class="controls"><input class="input_from" type="text" name="phone" ><p class="help-block"></p></div>
        </div>



        <div class="control-group">
            <label class="label label-primary">订单总价</label>
            <div class="controls"><input style="width:200px" class="input_from" type="text" name="total" ><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="label label-primary">邮政编码</label> 
            <div class="controls"><input class="input_from" type="text" name="code" ><p class="help-block"></p></div>
        </div>

        <div class="form-group" style="width:120px">
                <label for="exampleInputName2"><span class="label label-primary">发货状态:</span></label>
                    <select name="status" class="form-control">
                        <option>--请选择--</option>
                        <option value="1">未发货</option>
                        <option value="2">待发货</option>
                        <option value="3">已发货</option>
                        <option value="4">已完成</option>
                        <option value="5">无效订单</option>
                    </select>
        </div>

        <div class="form-group" style="width:120px">
                <label for="exampleInputName2"><span class="label label-primary">订单退款状态:</span></label>
                    <select name="status2" class="form-control">
                        <option>--请选择--</option>
                        <option value="1">已退款</option>
                        <option value="2">待处理</option>
                        <option value="3">已拒绝</option>
                    </select>
        </div>

        <div class="control-group">
            <label class="label label-primary">收货地址</label>
            <div class="controls"><input style="width:350px" class="input_from" type="text" name="address" ><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">添加订单</button></div>
        </div>
    </form>
</div>
@endsection