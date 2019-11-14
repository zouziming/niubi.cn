@extends('Admin.layout.main')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection


@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>商品列表</em></span>
		<span class="modular fr"><a href="/admin/goods/add" class="pt-link-btn">+添加商品</a></span>
	</div>
	
	<div class="operate">
	<form action="/admin/goods/search">
		<!-- {{ csrf_field() }} -->
		<input name="name" type="text" class="textBox length-long" placeholder="输入商品名称..." value="" />
		<input type="submit" value="查询" class="tdBtn"/>
	</form>
	</div>
	
  <table class="list-style Interlaced">
	@if($res == null)
	客官，伦家真的尽力了
	@else  
	<tr>
		<th width="70">ID编号</th>
		<th width="300">商品图片</th>
		<th>商品名称</th> 
		<th>精品</th>
		<th>新品</th>
		<th>热销</th>
		<th>包邮</th>
		<th>操作</th>
	</tr>
	
		@foreach($data as $k=>$v)
		<tr>
			<td>
				<span>
					<input type="checkbox" class="middle children-checkbox" name="shan"/>
					&nbsp;
					<i>{{$v->id}}</i>
				</span>
			</td>
			<td class="center pic-area"><img style="width: 100px;height: 100px;" src="{{$v->pic}}" class="thumbnail"/></td>
			<td class="td-name">
				<span class="ellipsis td-name block">{{$v->name}}</span>
			</td>
			@if($v->boutique == 1) 
				<td class="center"><img src="/lib/images/yes.gif"/></td>
			@else
				<td class="center"><img src="/lib/images/no.gif"/></td>
			@endif
			
			@if($v->new == 1)
				<td class="center"><img src="/lib/images/yes.gif"/></td>
			@else
				<td class="center"><img src="/lib/images/no.gif"/></td>
			@endif
			
			@if($v->hot == 1)
				<td class="center"><img src="/lib/images/yes.gif"/></td>
			@else
				<td class="center"><img src="/lib/images/no.gif"/></td>
			@endif
			
			@if($v->free == 1)
				<td class="center"><img src="/lib/images/yes.gif"/></td>
			@else
				<td class="center"><img src="/lib/images/no.gif"/></td>
			@endif
				
			<td class="center">
				<a href="/admin/specs/{{$v->id}}" title="规格" ><img width="40px;" src="/lib/images/icon_view.gif"/></a>
				<a href="/admin/goods/edit/{{$v->id}}" title="编辑"><img width="40px;" src="/lib/images/icon_edit.gif"/></a>
				<a href="/admin/goods/gorecycle/{{$v->id}}" title="删除"><img width="40px;" src="/lib/images/icon_drop.gif"/></a>
			</td>
		</tr>
		@endforeach
	
		</table>
		<!-- BatchOperation -->
		<div style="overflow:hidden;">
			<!-- Operation -->
			<div class="BatchOperation fl">
			<label id="quan" class="btnStyle middle">全选</label>
			<label id="quanbu" class="btnStyle middle">全不选</label>
			<input id="dels" type="button" value="批量删除" class="btnStyle"/>
			</div>
			<!-- turn page -->
			<div class="turnPage center fr">
				{{$data->links()}}
			</div>
		</div>
	@endif	
</div>

@endsection

@section('script')
	<script>
		$('#quan').click(function(){
			$('.children-checkbox').each(function(){
				$(this).prop("checked",true);
			});
		})
		
		$('#quanbu').click(function(){
			$('.children-checkbox').each(function(){
				$(this).prop("checked",false);
			});
			
		})
		
		$('#dels').click(function(){
			let ids = [];
			$("input[name='shan']:checked").each(function() { 
				ids.push($(this).next().text());
				// console.dir(ids);
			});
			console.dir(ids);
			location.href = "/admin/goods/del/"+ids;
		})		
	</script>
@endsection