@extends('Admin.layout.main')

@section('title','商城-订单退款详情')
 
@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单退款详情</span></span>
    </div>
        <div class="col-md-12">
        <div class="content">
    
        {{ csrf_field() }}
            <table class="table table-hover">
                <tr>
                    <th style="width:110px">用户名</th>
                    <th>商品编号</th>
                    <th style="width:200px">商品名称</th>
                    <th>数量</th>
                    <th>商品图片</th>
                    <th>应退金额</th>
                    <th>操作</th>

                </tr>
                    @foreach($ddxqy as $ddxq) 
                    <tr>
                        <td>{{$ddxq->oid}}</td>
                        <td>{{$ddxq->gid}}</td>
                        <td><a href="">{{$ddxq->gname}}</a></td>
                        <td>{{$ddxq->num}}</td>
                        <td style="width:200px"><a href=""><img src="#" style="width:150px;height:120px"/>{{$ddxq->pic}}</a></td>
                        <td>{{$ddxq->price}}</td>
                        <td>
                             <span class="label label-warning"><a href="ConsentRefund?id={{$ddxq->oid}}">同意退款</a></span>
                             <span class="label label-warning"><a href="RefuseRefund?id={{$ddxq->oid}}">拒绝退款</a></span>
                        </td>
                    </tr>
                    @endforeach
            
            </table>
            {{ $ddxqy->links() }}
        </div>
    </div>
@endsection
