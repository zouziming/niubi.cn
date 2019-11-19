@extends('Admin.layout.main')

@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>添加分类</em></span>
		<span class="modular fr"><a href="/admin/goods/attr" class="pt-link-btn">规格列表</a></span>
	</div>
	
	<form method="post" action="/admin/attr/add">
		{{ csrf_field() }}
		<table class="list-style">
			<tr>
				<td style="text-align:right;width:15%;">分类名称：</td>
				<td>
				<select class="textBox" name="cate_id">
					<option value="">--请选择--</option>
						@foreach($catedata as $v)
				        <option value="{{$v->id}}">{{$v->name}}</option>
						@endforeach		
				</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">分类主规格：</td>
				<td class="list">
					<label id="jia" class="labelBtnAdd" style="width: 60px;">+</label>
					<input name="name[]" type="text" class="textBox length-long attr" style="height: 60px;"/>
				</td>
				
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td><input type="submit" value="添加" class="tdBtn"/></td>
			</tr>
		</table>
	</form>
 </div>
@endsection

@section('script')
<script>
	$('#jia').click(function(){
		$('.attr:first').clone().val('').appendTo('.list');
	})
</script>
@endsection