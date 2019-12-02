@extends('Admin.layout.main')

@section('body')
<div class="wrap">
    <div class="page-title">
        <span class="modular fl">
            <i class="add"></i>
            <em>添加模型</em></span>
			
		<a href="javascript:void(0)" style="position: relative;left: 50px;">
			<input type="button" value="添加规格" class="tdBtn addspecs"/>
		</a>
        <span class="modular fr">
            <a href="/admin/pattern" class="pt-link-btn">模型列表</a>
		</span>
    </div>
    <form action="/admin/pattern/add" method="post">
		{{ csrf_field() }}
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">模型名称：</td>
                <td>
                    <input type="text" class="textBox length-long" name="pattern" />
				</td>
            </tr>
        </table>
		<table class="list-style specs" id="table">
			<tr>
				<th width="160" class="center">规格名称</th>
				<th class="center">规格值</th>
		
				<th width="120" class="center">操作</th>
			</tr>
			
			<!-- <tr>
				<td style="text-align:right;">
					<input name="specs_key[]" type="text" class="textBox length-long" style="height: 60px;width:160px;"/>
				</td>
				<td class="list" style="position:relative;">	
					<input name="specs_val[]" type="text" class="textBox length-long" style="height: 60px;width:160px;"/>
					<span style="font-size: 30px;position: relative;top: -20px;left: -24px;" class="delval">×</span>
					<a style="text-decoration: none;" href="javascript:void(0)" class="addsvalue">添加</a>
				</td>
				<td class="center">
					<a href="javascript:void(0)" title="删除" class="delspecs">删除</a>
				</td>
			</tr> -->
			
		</table>
		<input type="submit" value="发布新模型" class="tdBtn" />
    </form>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
</div>
@endsection

@section('script')

<script>
	var i = -1;
	
			
	$('.addspecs').click(function(){
		i++;
		var str = '';
		str += '<tr><td style="text-align:right;">';
		str += '<input name="specs_key[]" type="text" class="textBox length-long" style="height: 60px;width:160px;"/>'
		str += '</td><td class="list" style="position:relative;">'		
		str += '<input name="specs_val['+i+'][]" type="text" class="textBox length-long" style="height: 60px;width:160px;" data-id="'+i+'"/>'	
		str += '<a style="text-decoration: none;" href="javascript:void(0)" class="addsvalue">添加</a>'		
		str += '</td><td class="center"><a href="javascript:void(0)" title="删除" class="delspecs">删除</a></td></tr>'
		$('.specs').append(str)
		
	})
	
	$('#table').on('click','.addsvalue',function(){
		var val = $(this).prev().val()
		if (val.length == 0)  {
			layer.msg('请先把前面的写完')
		} else {
			$('<input name="specs_val['+$(this).prev().data('id')+'][]" type="text" class="textBox length-long" style="height: 60px;width:160px;" data-id="'+$(this).prev().data('id')+'"/>').insertBefore($(this));
		}
	});
	
	
	$('#table').on('click','.delspecs',function(){
		$(this.parentElement.parentElement).remove()
		i--;
	})
</script>
@endsection