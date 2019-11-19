@extends('Admin.layout.main')

@section('body')
<div class="wrap">
	<div class="page-title">
		<span class="modular fl"><i></i><em>编辑需要的规格</em></span>
	</div>

	<table class="list-style">
		<input type="hidden" value="" id="attr" />
		@foreach($key as $k=>$v)
		<tr>
			<td style="text-align:right;width:15%;">
				主规格：
				<input disabled type="text" class="textBox center" value="{{$v->attr_name}}" style="height:60px;width:150px;"/>
			</td>
			<td style="position: relative;" class="attr">
				@foreach($value[$k] as $vv)	
					<input readonly type="text" class="textBox center val" value="{{$vv['attr_value']}}" style="height: 60px;"  />
				@endforeach
			</td>
		</tr>
		@endforeach
		<tr>
			<td style="text-align:right;"></td>
			<td>
				<a href="/admin/goods" class="fr"><input type="submit" value="返回" class="tdBtn"/></a>
				<a href="javascript:void(0)" id="submit" style="display: none;"><input type="submit" value="保存" class="tdBtns"/></a>
			</td>
		</tr>
	</table>
</div>

@endsection

@section('script')
<script>
	var attr = {!! $attr !!}
	$(document).ready(function(){
		var count = $('.val').length;
		for (var i = 0; i < count; i++) {
			for (key in attr) {
				// console.dir(attr[key])
				if ($($('.val')[i]).val() == attr[key]) {
					$($('.val')[i]).css('background-color', 'green');
					$($('.val')[i]).css('color', 'white');
				}
			}
		}
	});
	
	$('.val').click(function(){
		if ($(this).css('background-color') == 'rgb(0, 128, 0)') {
			$(this).css('background-color', 'white');
			$(this).css('color', 'black');
		} else {
			$(this).css('background-color', 'green');
			$(this).css('color', 'white');
		}
		
	});
	
	$('.tdBtns').click(function(){
		var count = $('.val').length;
		var data = [];
		for (var i = 0; i < count; i++) {
			if ($($('.val')[i]).css('background-color') == 'rgb(0, 128, 0)') {
				data.push($($('.val')[i]).val())
			}
		}
		console.dir(data)
		$.ajax({
			method:'post',
			url:'/admin/specs',
			data:{
				_token : '{{ csrf_token() }}',
				id : {{$id}},
				datas : data,
			},
			success: function(res){
				// console.dir(res)
				if (res.code == 0) {
					layer.msg('修改成功!');
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}	
		});
	});
	
	$('.list-style').on('click', '.val', function(){
		$('#submit').css('display','inline');
	});
</script>
@endsection