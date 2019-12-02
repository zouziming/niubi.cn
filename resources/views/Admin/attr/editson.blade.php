@extends('Admin.layout.main')

@section('body')
<div class="wrap" style="position: relative;">
	<div class="page-title">
		<span class="modular fl"><i></i><em>编辑规格</em></span>
	</div>
	
	<form onsubmit="return false">
		{{ csrf_field() }}
		<table class="list-style">
			@foreach($key as $v)
			<tr>
				<td style="text-align:right;">主规格：</td>
				<td class="list" style="position:relative;">
					<div class="attr">
						<input disabled type="text" class="textBox length-long center" style="height: 60px;width: 100px;" value="{{$v->attr_name}}" ids="{{$v->id}}"/>
						@foreach($v['value'] as $vv)
							<input type="text" class="textBox length-long" style="height: 60px;width: 100px;" value="{{$vv->attr_value}}" ids="{{$vv->id}}"/>
						@endforeach
						<input type="submit" value="编辑" class="tdBtn" data-id="{{$v['id']}}"/><br>
					</div>
				</td>
			</tr>
			@endforeach
		</table>
	</form>
	<a href="/admin/allattr" style="position: relative;top: 5px;left: 200px;"><input type="submit" value="完成" class="wan"/></a>
 </div>
@endsection

@section('script')
<script>
	$('.tdBtn').click(function(){
		var count = this.parentElement.childElementCount - 3;
		var data = [];
		var id = $(this).data('id')
		for(var i = 1; i <= count; i++) {
			data[$(this.parentElement).children().eq(i).attr('ids')] = $(this.parentElement).children().eq(i).val();
		}
		// console.dir(data);
		$.ajax({
			method:'post',
			url:'/admin/allattr/editson',
			data:{
				_token : '{{ csrf_token() }}',
				datas : data,
				id : id,
			},
			success: function(res){
				if (res.code == 0) {
					layer.msg('设置成功!');
				} else if (res.code != 0) {
					layer.msg('设置失败!');
				}
			}	
		});
	})
</script>
@endsection