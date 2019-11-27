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
                    <th style="width:110px;text-align: center;">详情ID</th>
                    <th style="text-align: center;">订单ID</th>
                    <th style="width:250px;text-align: center;">商品名称</th>
                    <th style="text-align: center;">数量</th>
                    <th>商品图片</th>
                    <th style="width:150px;text-align: center;">商品价格</th>
                    <th style="text-align: center;">商品规格</th>
                    <th style="text-align: center;">评论</th>
					<th style="text-align: center;">操作</th>
                </tr>
                    @foreach($detail as $v) 
                    <tr>
                        <td style="text-align: center;">{{$v->oid}}</td>
                        <td style="text-align: center;">{{$v->oid}}</td>
                        <td style="text-align: center;">{{$v->gname}}</a></td>
                        <td style="text-align: center;">{{$v->num}}</td>
                        <td style="width:200px;text-align: center;"><img src="{{$v->pic}}" style="width:150px;height:120px"/></td>
                        <td style="text-align: center;"><b>￥</b>{{$v->price}}</td>
                        <td style="text-align: center;">{{$v->specs}}</td>
                        <td style="text-align: center;">
							@if($v->status == 1)
								没有评论
							@else
								<span style="color: red;">{{$v['comment'][0]['content']}}</span>
							@endif
						</td>
						<td style="text-align: center;">
						@if($v->status == 2 && $v['comment'][0]['reply'] == null)
							<a data-id="{{$v['comment'][0]['id']}}" href="javascript:void(0)" class="reply" style="text-decoration: none;color: green;">回复</a>
						@elseif($v->status == 2 && $v['comment'][0]['reply'] != null)
							<span style="color: red;">{{$v['comment'][0]['reply']}}</span>
						@endif
						</td>
                    </tr>
                    @endforeach
                </form>
            </table>
        </div>
    </div>
@endsection

@section('script')
<script>
	$('.reply').click(function(){
		var Response = prompt("请输入回复内容");
		var id = $(this).data('id');
		var _this = this
		// console.dir($(this).remove());
		$.ajax({
			method:'post',
			url:'/admin/comment/reply',
			data:{
				_token : '{{ csrf_token() }}',
				data : Response,
				id : id,
			},
			success: function(res){
				if (res.code == 0) {
					$(_this.parentElement).append('<span style="color: red;">'+res.msg+'</span>')
					$(_this).remove()
					layer.msg('回复成功!');
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	})
</script>
@endsection
