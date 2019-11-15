@extends('Admin.layout.main')

@section('body')
	<div class="wrap">
		<div class="page-title">
			<span class="modular fl"><i></i><em>评论列表</em></span>
			<span class="modular fr"><a href="/admin/link/add" class="pt-link-btn" >+添加友链</a></span>
		</div>

		<div class="operate">
		<form action="/admin/link/search">
			@if($_GET == null)
				<input name="link" type="text" class="textBox length-long" placeholder="输入友链名称..." value="" />
			@else
				<input name="link" type="text" class="textBox length-long" placeholder="输入友链名称..." value="{{$_GET['link']}}" />
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
				<th width="200" class="center">友链名称</th>
				<th class="center">友链地址</th>

				<th width="120" class="center">操作</th>
			</tr>
			@foreach($data as $v)
				<tr height="60">
					<td class="center">
						<span>
						<i>{{$v['id']}}</i>
						</span>
					</td>
					<td class="center pic-area">{{$v['name']}}</td>
					<td class="td-name center">{{$v['url']}}</td>
					<td class="center">
						<a href="/admin/link/edit/{{$v->id}}" title="编辑"><img width="40px;" src="/lib/images/icon_edit.gif"/></a>
						<a href="/admin/link/del/{{$v->id}}" title="删除"><img width="40px;" src="/lib/images/icon_drop.gif"/></a>
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