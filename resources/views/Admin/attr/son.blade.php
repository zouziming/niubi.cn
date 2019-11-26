@extends('Admin.layout.main')

@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>编辑子规格</em></span>
		<span class="modular fr"><a href="/admin/allattr" class="pt-link-btn">规格列表</a></span>
	</div>

	<table class="list-style">
		<tr>
			<td style="text-align:right;width:10%;">所属分类：</td>
			<td>
				<input type="text" disabled value="{{$cate->name}}" />
			</td>
		</tr>
		@foreach($attr as $v)
		<tr>
			<td style="text-align:right;width:15%;">主规格：</td>
			<td style="position: relative;" class="attr{{$v->id}}">
				<label  class="labelBtnAdd add" style="position:absolute;right: 5px;">+</label>
				<input disabled type="text" class="textBox" value="{{$v->attr_name}}" style="height: 60px;" ids="{{$v->id}}" />
				@foreach($v['value'] as $vv)
					<input disabled type="text" class="textBox" style="height: 60px;" value="{{$vv}}" />
				@endforeach
				<input name="value" type="text" class="textBox" style="height: 60px;" value="" />
			</td>
		</tr>
		@endforeach
		<tr>
			<td style="text-align:right;"></td>
			<td><a href="/admin/allattr"><input type="submit" value="返回" class="tdBtn"/></a></td>
		</tr>
	</table>
</div>
@endsection

@section('script')
<script>
	$('.add').click(function(){
		var id = $(this.nextElementSibling).attr('ids');
		// var id = $(this.parentElement).children(":first").attr('ids');
		var value = $(this.parentElement).children("input:last-child").val();
		// console.dir(value)
		// console.dir(id)
		// $('<input name="value" type="text" class="textBox" style="height: 60px;" value="" />').appendTo($('.attr'+id))
		$.ajax({
			method:'post',
			url:'/admin/attr/son',
			data:{
				_token : '{{ csrf_token() }}',
				id : id,
				value : value
			},
			success: function(res){
				if (res.code == 0) {
					layer.msg('添加成功!');
					$('<input name="value" type="text" class="textBox" style="height: 60px;" value="" />').appendTo($('.attr'+id));
				} else if (res.code != 0) {
					layer.msg('添加失败!');
				}
			},
			error: function(err){
				var json = JSON.parse(err.responseText);
				$.each(json.errors, function(idx, obj) {
					layer.msg(obj[0]);
					return false;
				});
			}
		});
	})
</script>
@endsection