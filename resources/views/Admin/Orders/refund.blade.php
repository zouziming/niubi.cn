@extends('Admin.layout.main')

@section('title','商城-订单退款')

@section('body')
<div class="route_bg">
    <span class="label label-success"><a href="seeks">返回订单列表</a></span>->
    <span class="label label-primary"><span>订单退款</span></span>

</div>
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
                    <th>操作</th>
                </tr>
                @foreach($data as $v)              
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
                        <span class="label label-warning">
							<a style="text-decoration: none;" href="/details?id={{$v->id}}">查看</a>
						</span>
						&nbsp;
						@if($v['refund'] == 2)
                        <span class="label label-success">
							<a  class="agree" style="text-decoration: none;" href="/admin/refund/agree/{{$v['id']}}">同意</a>
						</span>
                        <span class="label label-danger">
							<a data-id="{{$v['id']}}" class="refuse" style="text-decoration: none;" href="javascript:void(0)">拒绝</a>
						</span>
						@elseif($v['refund'] == 3)
						<span class="label label-success">同意</span>
						@elseif($v['refund'] == 4)
						<span class="label label-danger">拒绝</span>
						@endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
</div>
@endsection

@section('script')
<script>
	$('.refuse').click(function(){
		var id = $(this).data('id')
		var _this = this.parentElement.parentElement
		
		$.ajax({
			method:'post',
			url:'/admin/refund/refuse',
			data:{
				_token : '{{ csrf_token() }}',
				id : id,
			},
			success: function(res){
				if (res.code == 0) {
					$(_this).children().eq(1).remove()
					$(_this).children().eq(1).remove()
					$(_this).append('<span class="label label-danger">拒绝</span>')
					layer.msg(res.msg);
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	})
	
</script>
@endsection