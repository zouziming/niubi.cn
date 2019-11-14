@extends('Admin.layout.main')

@section('body')
	<div class="wrap">
		<div class="page-title">
			<span class="modular fl"><i></i><em>商品回收站</em></span>
		</div>

		<table class="list-style">
			<tr>
				<th width="80" class="center">ID编号</th>
				<th width="300" class="center">商品图片</th>
				<th class="center">名称</th>
				<th class="center">操作</th>
			</tr>
			@foreach($data as $v)
			<tr>
				<td class="center">
				<span>
				<i>{{$v->id}}</i>
				</span>
				</td>
				<td class="center pic-area"><img style="width: 150px;height: 150px;" src="{{$v->pic}}" class="thumbnail"/></td>
				<td class="td-name center" >
				<span class="ellipsis td-name block">{{$v->name}}</span>
				</td>
				<td class="center">
				<a href="/admin/goods/backrecycle/{{$v->id}}" title="恢复">恢复</a>
				<a href="/admin/goods/del/{{$v->id}}" title="彻底删除">彻底删除</a>
				</td>
			</tr>
			@endforeach
		</table>
		<!-- BatchOperation -->
		<div style="overflow:hidden;">
			  <!-- turn page -->
			  <div class="turnPage center fr">
			  </div>
		</div>
	</div>
@endsection