@extends('Admin.layout.main')

@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>编辑对应规格的价格</em></span>
		<span class="fr"><a href="/admin/goods"><input type="submit" value="返回" class="tdBtn"/></a></span>
		
	</div>

	<table class="list-style">
		<input type="hidden" value="" id="attr" />
		
		<tr>
			<td style="text-align:right;width:15%;">
				规格组合
			</td>
			<td class="center">价钱</td>
			<td class="center">库存</td>
			<td class="center">操作</td>
		</tr>
		@if($pan)
			@foreach($group as $k=>$v)
			<tr>
				<td style="text-align:right;width:15%;">
					<input disabled type="text" class="textBox center val" value="{{$v['name']}}" style="height:60px;width:150px;" keys="{{$v['key']}}"/>
				</td>
				<td style="position: relative;" class="attr center">
					<input type="number" class="textBox center val"  value="" style="height:60px;width:350px;"/>
				</td>
				<td style="position: relative;" class="attr center">
					<input type="number" class="textBox center val"  value="" style="height:60px;width:350px;"/>
				</td>
				<td style="position: relative;" class="attr center">
					<span><a href="javascript:void(0)"><input type="submit" value="添加" class="tdBtn add"/></a></span>
				</td>
			</tr>
			@endforeach
		@else
			@foreach($data as $k=>$v)
			<tr>
				<td style="text-align:right;width:15%;">
					<input disabled type="text" class="textBox center val" value="{{$v['goods_specs']}}" style="height:60px;width:150px;" ids="{{$v['id']}}"/>
				</td>
				<td style="position: relative;" class="attr center">
					<input type="number" class="textBox center val"  value="{{$v['goods_price']}}" style="height:60px;width:350px;"/>
				</td>
				<td style="position: relative;" class="attr center">
					<input type="number" class="textBox center val"  value="{{$v['goods_stock']}}" style="height:60px;width:350px;"/>
				</td>
				<td style="position: relative;" class="attr center">
					<span><a href="javascript:void(0)"><input type="submit" value="修改" class="tdBtn edit"/></a></span>
				</td>
			</tr>
			@endforeach
		@endif
	</table>
</div>
@endsection

@section('script')
<script>
	$('.add').click(function(){
		var ele = this.parentElement.parentElement.parentElement.parentElement;
		// var count = ele.childElementCount;
		var data = [];
		
		// console.dir($(ele).children().eq(0).children().eq(0).attr('keys'));
		data.push({{$gid}});
		data.push($(ele).children().eq(0).children().eq(0).attr('keys'));
		data.push($(ele).children().eq(0).children().eq(0).val());
		data.push($(ele).children().eq(1).children().eq(0).val());
		data.push($(ele).children().eq(2).children().eq(0).val());
		
		// console.dir(data)
		
		
		$.ajax({
			method:'post',
			url:'/admin/specs/addgoods',
			data:{
				_token : '{{ csrf_token() }}',
				data : data,
			},
			success: function(res){
				if (res.code == 0) {
					layer.msg('添加成功!');
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	});
	
	$('.edit').click(function(){
		var ele = this.parentElement.parentElement.parentElement.parentElement;
		// var count = ele.childElementCount;
		var data = [];
		
		data.push($(ele).children().eq(0).children().eq(0).attr('ids'));
		data.push($(ele).children().eq(1).children().eq(0).val());
		data.push($(ele).children().eq(2).children().eq(0).val());
		
		// console.dir(data)
		
		
		$.ajax({
			method:'post',
			url:'/admin/specs/editgoods',
			data:{
				_token : '{{ csrf_token() }}',
				data : data,
			},
			success: function(res){
				if (res.code == 0) {
					layer.msg('修改成功!');
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	});
</script>
@endsection