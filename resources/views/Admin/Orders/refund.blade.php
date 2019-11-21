@extends('Admin.layout.main')

@section('title','商城-订单退款')

@section('body')
<div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单退款</span></span>

</div>
    <form class="form-inline" method="post" action="/refund">
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
                    <th>ID</th>
                    <th>订单编号</th>
                    <th>用户名</th>
                    <th>收货人</th>
                    <th>联系电话</th>
                    <th>订单总价</th>
                    <th>处理状态</th>
                    <th>下单时间</th>
                    <th>操作</th>
                </tr>
                @foreach($datas as $data)              
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->did}}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$data->getman}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->total}}</td>
                    <td>{{$data->addtime}}</td>
                    <td>
                    @if ($data->status2 === 1)
                        已退款
                    @elseif ($data->status2 === 2)
                        待处理
                    @elseif ($data->status2 === 3)
                        已拒绝
                    @endif
                    </td>
                    <td>
                        <span class="label label-warning"><a href="RefundParticulars?id={{$data->id}}">查看</a></span>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $datas->links() }}
        </div>
</div>
@endsection

