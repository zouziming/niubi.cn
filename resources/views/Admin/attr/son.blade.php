@extends('Admin.layout.main')

@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>编辑子规格</em></span>
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
			<td>
				
				<input disabled type="text" class="textBox" value="{{$v->attr_name}}"/>
			</td>
		</tr>
		@endforeach
		<tr>
			<td style="text-align:right;"></td>
			<td><input type="submit" value="保存" class="tdBtn"/></td>
		</tr>
	</table>
</div>
@endsection

@section('script')
<script>
	
</script>
@endsection