@extends('Admin.layout.main')

@section('body')
<div class="wrap" style="position: relative;">
	<div class="page-title">
		<span class="modular fl"><i></i><em>编辑分类</em></span>
	</div>
	
	<form onsubmit="return false">
		{{ csrf_field() }}
		<table class="list-style">
			<tr>
				<td style="text-align:right;width:15%;">分类名称：</td>
				<td>
					<input disabled type="text" value="{{$cate[0]['name']}}" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">分类主规格：</td>
				<td class="list" style="position:relative;">
					@foreach($data as $v)
					
					<div class="attr">
						<input type="text" class="textBox length-long" style="height: 60px;" value="{{$v->attr_name}}" ids="{{$v->id}}"/>
						<input type="submit" value="编辑" class="tdBtn"/><br>
					</div>
					
					@endforeach
				</td>
			</tr>
			
		</table>
	</form>
	<a href="/admin/goods/attr" style="position: relative;top: 5px;left: 200px;"><input type="submit" value="完成" class="wan"/></a>
 </div>
@endsection

@section('script')
<script>
	$('.tdBtn').click(function(){
		var id = $(this.parentElement).children(":first").attr('ids');
		var name = $(this.parentElement).children(":first").val();
		// console.dir(id);
		// console.dir(name)
		$.ajax({
			method:'post',
			url:'/admin/attr/edit',
			data:{
				_token : '{{ csrf_token() }}',
				id : id,
				name : name
			},
			success: function(res){
				// console.dir(res)
				if (res.code == 0) {
					alert(res.msg);
				} else if (res.code == 1) {
					alert(res.msg);
				}
			}	
		});
	})
</script>
@endsection