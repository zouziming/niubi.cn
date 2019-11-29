@extends('Admin.layout.main')

@section('title','商城-订单管理')

@section('body')
<div class="route_bg">
<span class="label label-default">订单列表</span>

</div>
	<form class="form-inline" method="get" action="/admin/seeks">
		{{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputName2"><span class="label label-primary">收货人:</span></label>
                    <input value="{{Request::input('getman')}}" name="getman" type="text" class="form-control" id="exampleInputName2" placeholder="按收货人查找" style="width:130px">
            </div>
            <div class="form-group">
                <label for="exampleInputName2"><span class="label label-primary">收货地址</span></label>
                    <input value="{{Request::input('address')}}" name="address" type="text" class="form-control" id="exampleInputName2" placeholder="按收货地址查找" style="width:130px">
            </div>
            <div class="form-group">
                <label for="exampleInputName2"><span class="label label-primary">发货状态:</span></label>
                    <select name="status" class="form-control">
                        <option value="0">--请选择--</option>
                        <option value="1">未发货</option>
                        <option value="2">待发货</option>
                        <option value="3">已发货</option>
                        <option value="4">已完成</option>
                        <option value="5">无效订单</option>
                    </select>
			</div>
        <button type="submit" class="btn btn-default">搜索</button>
	</form>

<div class="col-md-12">
        <div class="content">
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>收货人</th>
                    <th>手机号</th>
                    <th>收货地址</th>
                    <th>订单总价</th>
                    <th>下单时间</th>
                    <th>邮政编码</th>
                    <th>发货状态</th>
                    <th>操作</th>
                </tr>
                @foreach($datas as $v)              
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->uid}}</td>
                    <td>{{$v->getman}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->address}}</td>
                    <td>{{$v->total}}</td>
                    <td>{{$v->addtime}}</td>
                    <td>{{$v->code}}</td>
                    <td>
                    @if ($v->status == 1)
                        待付款
                    @elseif ($v->status == 2)
                        待发货
                    @elseif ($v->status == 3)
                        已发货
                    @elseif ($v->status == 4)
                        已完成
                    @elseif ($v->status == 5)
                        无效订单
                    @endif
                    </td>
                    <td>
						<span class="label label-warning"><a href="/admin/details?id={{$v->id}}">查看详情</a></span>
						@if($v['status'] == 2)
							<span class="label label-success">
								<a class="fa" data-id="{{$v->id}}" href="javascript:void(0)">发货</a>
							</span>
						@endif
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $datas->links() }}
        </div>
</div>
@endsection

@section('script')
<script>
	$('.fa').click(function(){
		var id = $(this).data('id')
		var _this = this.parentElement
		$.ajax({
			method:'post',
			url:'/admin/order/fahuo',
			data:{
				_token : '{{ csrf_token() }}',
				id : id,
			},
			success: function(res){
				if (res.code == 0) {
					$(_this.parentElement.parentElement).children().eq(8).html('已发货')
					$(_this).remove()
					layer.msg(res.msg);
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	})
</script>
@endsection
