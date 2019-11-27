@extends('Admin.layout.main')

@section('title','商城-订单发货')
 
@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单发货</span></span>
    </div>
        <div class="col-md-12">
        <div class="content">
        <form action="/admin/shippeds" method="post">
        {{ csrf_field() }}
            <table class="table table-hover">
                <tr>
                    <th style="width:110px">用户名</th>
                    <th>商品编号</th>
                    <th style="width:200px">商品名称</th>
                    <th>数量</th>
                    <th>商品图片</th>
                    <th>商品价格</th>
                    <th>操作</th>

                </tr>
                    @foreach($yfh as $fh) 
                    <tr>
                        <td>{{$fh->oid}}</td>
                        <td>{{$fh->gid}}</td>
                        <td><a href="">{{$fh->gname}}</a></td>
                        <td>{{$fh->num}}</td>
                        <td style="width:200px"><a href=""><img src="#" style="width:150px;height:120px"/>{{$fh->pic}}</a></td>
                        <td>{{$fh->price}}</td>
                        <td>
                             <a href="#" class="btn btn-primary btn-lg disabled" role="button">已发货</a>
                        </td>
                    </tr>
                    @endforeach
                </form>
            </table>
            {{ $yfh->links() }}
        </div>
    </div>
@endsection
