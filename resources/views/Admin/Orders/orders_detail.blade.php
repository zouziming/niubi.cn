@extends('Admin.layout.main')

@section('title','商城-订单详情')

@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单详情</span></span>
        
    </div><br>
        <div class="col-md-12">
        <div class="content">
            <form action="" method="get">
            <table class="table table-hover">
                <tr>
                    <th style="width:110px">商品ID</th>
                    <th>商品编号</th>
                    <th style="width:200px">商品名称</th>
                    <th>数量</th>
                    <th>商品图片</th>
                    <th>商品价格</th>
                </tr>
                    @foreach($dds as $dd) 
                    <tr>
                        <td>{{$dd->oid}}</td>
                        <td>{{$dd->gid}}</td>
                        <td><a href="">{{$dd->gname}}</a></td>
                        <td>{{$dd->num}}</td>
                        <td style="width:200px"><a href=""><img src="#" style="width:150px;height:120px"/>{{$dd->pic}}</a></td>
                        <td>{{$dd->price}}</td>
                    </tr>
                    @endforeach
                </form>
            </table>
        </div>
    </div>
@endsection
