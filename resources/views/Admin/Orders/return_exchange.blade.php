@extends('Admin.layout.main')

@section('title','商城-订单退换')

@section('body')
<div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单退换</span></span>

</div>
    <form class="form-inline" method="post" action="/returnExchange">
        {{ csrf_field() }}
        <div class="form-group">
                <label for="exampleInputName2"><span class="label label-primary">订单编号:</span></label>
                    <input name="id" type="text" class="form-control" id="exampleInputName2" placeholder="按订单编号" style="width:150px">
            </div>
            <div class="form-group">
                <label for="exampleInputName2"><span class="label label-primary">收货人:</span></label>
                    <input name="getman" type="text" class="form-control" id="exampleInputName2" placeholder="按收货人找" style="width:130px">
            </div>
            <div class="form-group">
                <label for="exampleInputName2"><span class="label label-primary">联系电话:</span></label>
                    <input name="phone" type="text" class="form-control" id="exampleInputName2" placeholder="按联系电话找" style="width:130px">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
<div class="col-md-12">
        <div class="content">
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <th>商品编号</th>
                    <th>商品名称</th>
                    <th>类型</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                @foreach($fakes as $fake)              
                <tr>
                    <td>{{$fake->gid}}</td>
                    <td>{{$fake->gname}}</td>
                    <td>
                    @if ($fake->status === 2)
                        换货
                    @elseif ($fake->status === 1)
                        仅退款 
                    @elseif ($fake->status === 3)
                        退货退款
                    @endif
                    </td>
                    <td>
                    @if ($fake->status2 === 1)
                        审核通过
                    @elseif ($fake->status2 === 2)
                        待审核 
                    @elseif ($fake->status2 === 4)
                        退款完成
                    @elseif ($fake->status2 === 3)
                        换货完成
                    @elseif ($fake->status2 === 5)
                        拒绝通过
                    @endif
                    </td>
                    <td>
                        <span class="label label-warning"><a href="tuihuan?id={{$fake->gid}}">查看</a></span>
                        <span class="label label-warning"><a href="dels?id={{$fake->id}}">删除</a></span>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $fakes->links() }}
        </div>
</div>
@endsection