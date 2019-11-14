@extends('Admin.layout.main')

@section('body')
	<div class="wrap">
		<div class="page-title">
			<span class="modular fl"><i></i><em>评论列表</em></span>
		</div>

		<div class="operate">
		<form action="/admin/comment/search">
			<input name="name" type="text" class="textBox length-long" placeholder="输入用户名称..." />
			<input name="goods" type="text" class="textBox length-long" placeholder="输入商品名称..." />
			<input type="submit" value="查询" class="tdBtn"/>
		</form>
		</div>
		
		<table class="list-style">
			@if($res == null)
			客官，伦家真的尽力了
			@else 
			<tr>
				<th width="80" class="center">ID编号</th>
				<th width="200" class="center">留言用户</th>
				<th class="center">留言商品</th>
				<th class="center">评论内容</th>
				<th class="center">回复内容</th>
				<th width="200" class="center">评论时间</th>
				<th width="120" class="center">操作</th>
			</tr>
			@foreach($data as $v)
				<tr height="60">
					<td class="center">
						<span>
						<i>{{$v['id']}}</i>
						</span>
					</td>
					<td class="center pic-area">{{$v['uid']}}</td>
					<td class="td-name center">{{$v['gid']}}</td>
					<td class="td-name center">
						<span class="ellipsis td-name block">{{$v['content']}}</span>
					</td>
					<td class="center">
						@if($v['reply'] != null)
						<span class="ellipsis td-name block">{{$v['reply']}}</span>
						@else
						<span class="ellipsis td-name block">暂无回复</span>
						@endif
					</td>
					<td class="center">{{$v['addtime']}}</td>
					<td class="center">
						<a href="javascript:void(0)" title="回复" style="text-decoration:none;" class="reply" ids="{{$v['id']}}">回复</a>
						<a href="/admin/comment/del/{{$v['id']}}" title="删除" style="text-decoration:none;">删除</a>
					</td>
				</tr>
			@endforeach
		
		</table>
		<!-- BatchOperation -->
		<div style="overflow:hidden;">
			  <!-- turn page -->
			  <div class="turnPage center fr">
				{{$data->links()}}
			  </div>
		</div>
	</div>
	@endif
@endsection

@section('script')
<script>
	$('.reply').click(function(){
		var Response = prompt("请输入回复内容");
		var id = $(this).attr('ids');
		var comment = $(this.parentElement.parentElement).children().eq(4).children().eq(0)
		// console.dir(comment)
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
					layer.msg('回复成功!');
					comment.html(res.msg)
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	})
</script>
@endsection