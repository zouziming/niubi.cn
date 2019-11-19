@extends('Admin.layout.main')

@section('title','商城-订单确认发货')
 
@section('body')
    <div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单确认发货</span></span>
    </div>
        <div class="col-md-12">
        <div class="content">
        <form action="/shippeds" method="post">
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
                    @foreach($fhd as $fh) 
                    <tr>
                        <td>{{$fh->oid}}</td>
                        <td>{{$fh->gid}}</td>
                        <td><a href="">{{$fh->gname}}</a></td>
                        <td>{{$fh->num}}</td>
                        <td style="width:200px"><a href=""><img src="#" style="width:150px;height:120px"/>{{$fh->pic}}</a></td>
                        <td>{{$fh->price}}</td>
                        <td>
                             <span class="label label-warning"><a href="editStatus?id={{$fh->oid}}">确认发货</a></span>
                        </td>
                    </tr>
                    @endforeach
                </form>
            </table>
            {{ $fhd->links() }}
        </div>
    </div>
@endsection
