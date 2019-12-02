@extends('Admin.layout.main')

@section('body')
	<div class="wrap">
		<div class="page-title">
			<span class="modular fl"><i></i><em>模型列表</em></span>
			<span class="modular fr"><a href="/admin/pattern/add" class="pt-link-btn" >+添加模型</a></span>
		</div>

		<div class="operate">
		</div>
		
		<table class="list-style"> 
			
			<tr>
				<th width="80" class="center">ID编号</th>
				<th class="center">模型名称</th>

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

				<td class="center">
					<a href="/admin/pattern/edit/{{$v['id']}}" title="编辑"><img width="40px;" src="/lib/images/icon_edit.gif"/></a>
					<a href="/admin/pattern/del/{{$v['id']}}" title="删除"><img width="40px;" src="/lib/images/icon_drop.gif"/></a>
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