@extends('Admin.layout.main')

@section('css')
<!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
@endsection


@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>商品列表</em></span>
		<span class="modular fr"><a href="/admin/goods/add" class="pt-link-btn">+添加商品</a></span>
	</div>
	
	<div class="operate">
	<form action="/admin/goods/search">
		@if($_GET == null)
			@if(empty($_GET['name']))
			<input name="name" type="text" class="textBox length-long" placeholder="输入商品名称..." value="" />
			@else
			<input name="name" type="text" class="textBox length-long" placeholder="输入商品名称..." value="{{$_GET['name']}}" />
			@endif
		@else
			<input name="name" type="text" class="textBox length-long" placeholder="输入商品名称..." value="" />
		@endif
		<input type="submit" value="查询" class="tdBtn"/>
	</form>
	</div>
	
  <table class="list-style Interlaced">
	@if($res == null)
	客官，伦家真的尽力了
	@else  
	<tr>
		<th width="70" class="center">ID编号</th>
		<th width="150" class="center">分类</th>
		<th width="140" class="center">商品图片</th>
		<th class="center">商品名称</th> 
		<th class="center">精品</th>
		<th class="center">新品</th>
		<th class="center">热销</th>
		<th class="center">包邮</th>
		<th class="center">上下架</th>
		<th class="center">操作</th>
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
			<td class="center">{{$v->cid}}</td>
			<td class="center pic-area"><img style="width: 130px;height: 140px;" src="{{$v->pic}}" class="thumbnail"/></td>
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
			
			@if($v->status == 1)
				<td class="center online" ids="{{$v->id}}"><img class="jia"  src="/lib/images/yes.gif"/></td>
			@else
				<td class="center online" ids="{{$v->id}}"><img class="jia" src="/lib/images/no.gif"/></td>
			@endif
			
			<td class="center btns" data-id="{{$v->id}}">
				<a href="javascript:void(0)" title="编辑"><img width="40px;" src="/lib/images/icon_edit.gif"/></a>
				<a href="javascript:void(0)" title="删除"><img width="40px;" src="/lib/images/icon_drop.gif"/></a>
				<a href="javascript:void(0)" title="规格" ><img width="40px;" src="/lib/images/icon_view.gif"/></a>
				<a href="javascript:void(0)" title="设置商品价格" ><img width="40px;" src="/lib/images/icon_title.gif"/></a>
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
			
		$('.jia').click(function(){
			var pan
			var id = $(this.parentElement).attr('ids');
			var _this = this;
			// console.dir($(this).attr('src'))
			if ($(_this).attr('src') == '/lib/images/yes.gif') {
				pan = 0;
			} else {
				pan = 1;
			}
			
			$.ajax({
				method:'post',
				url:'/admin/goods/status',
				data:{
					_token : '{{ csrf_token() }}',
					id : id,
					status : pan,
				},
				success: function(res){
					if (res.code == 0) {
						if ($(_this).attr('src') == '/lib/images/yes.gif') {
							$(_this).attr('src', '/lib/images/no.gif')
						} else {
							$(_this).attr('src', '/lib/images/yes.gif')
						}
						layer.msg('修改状态成功!');
					} else {
						layer.msg(res.msg);
					}
				}	
			});
		})
	</script>
	<script>
		$('.btns').on('click', 'a', function(){
			var data = $(this.parentElement.parentElement).children().eq(8).children().eq(0).attr('src');
			var id = $(this.parentElement).data('id');
			var src = $(this).children().eq(0).attr('src')
			// console.dir(data)
			$.ajax({
				method:'post',
				url:'/admin/goods/online',
				data:{
					_token : '{{ csrf_token() }}',
					data : data,
				},
				success: function(res){
					if (res.code == 0) {
						layer.msg('请先下架商品再来修改商品');
					} else {
						if (src == '/lib/images/icon_edit.gif') {
							location.href = "/admin/goods/edit/"+id
						} else if (src == '/lib/images/icon_drop.gif') {
							location.href = "/admin/goods/gorecycle/"+id
						} else if (src == '/lib/images/icon_view.gif') {
							location.href = "/admin/specs/"+id
						} else if (src == '/lib/images/icon_title.gif') {
							location.href = "/admin/specs/goods/"+id
						}
					}
					 
				}	
			});
		})
	</script>
@endsection