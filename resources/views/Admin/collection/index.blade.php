@extends('Admin.layout.main')

@section('body')
	<div class="wrap">
		<div class="page-title">
			<span class="modular fl"><i></i><em>收藏列表</em></span>
		</div>

		<div class="operate">
		<form action="/admin/collection/search">
			@if($_GET != null)
				@if(!empty($_GET['name']) && !empty($_GET['goods']))
				<input name="name" type="text" class="textBox length-long" placeholder="输入用户名称..." value="{{$_GET['name']}}" />
				<input name="goods" type="text" class="textBox length-long" placeholder="输入商品名称..." value="{{$_GET['goods']}}" />
				@elseif(!empty($_GET['goods']))
				<input name="name" type="text" class="textBox length-long" placeholder="输入用户名称..." value="" />
				<input name="goods" type="text" class="textBox length-long" placeholder="输入商品名称..." value="{{$_GET['goods']}}" />
				@elseif(!empty($_GET['name']))
				<input name="name" type="text" class="textBox length-long" placeholder="输入用户名称..." value="{{$_GET['name']}}" />
				<input name="goods" type="text" class="textBox length-long" placeholder="输入商品名称..." value="" />
				@else
				<input name="name" type="text" class="textBox length-long" placeholder="输入用户名称..." value="" />
				<input name="goods" type="text" class="textBox length-long" placeholder="输入商品名称..." value="" />
				@endif
			@else
				<input name="name" type="text" class="textBox length-long" placeholder="输入用户名称..." value="" />
				<input name="goods" type="text" class="textBox length-long" placeholder="输入商品名称..." value="" />
			@endif	
				<input type="submit" value="查询" class="tdBtn"/>
		</form>
		</div>
		
		<table class="list-style">
			@if($res == null)
			客官，伦家真的尽力了
			@else 
			<tr>
				<th width="80" class="center">ID编号</th>
				<th width="200" class="center">用户</th>
				<th class="center">商品</th>
				<th class="center">状态</th>
				<th width="200" class="center">收藏时间</th>
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
					<td class="td-name center">{{$v['status']}}</td>
					<td class="center">{{$v['addtime']}}</td>
					<td class="center">
						<a href="/admin/collection/del/{{$v['id']}}" title="删除" style="text-decoration:none;">删除</a>
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