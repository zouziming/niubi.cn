@extends('Admin.layout.main')

@section('body')
	<div class="wrap" style="height: 1000px;">
		<div class="page-title">
			<span class="modular fl"><i></i><em>设置模型</em></span>
			<a href="javascript:void(0)" style="position: relative;left: 50px;">
				<input type="button" value="确认" class="tdBtn setspecs"/>
			</a>
			<span class="modular fr">
			    <a href="/admin/goods" class="pt-link-btn">商品列表</a>
			</span>
		</div>

		
		<table class="list-style"> 
			
			<div class="btn-group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="min-width:500px" >请选择模型 <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" style="min-width:500px" >
					@foreach($allm as $v)
						<li><a data-id="{{$v['id']}}" class="model" href="javascript:void(0)" style="text-align: center;">{{$v['name']}}</a></li>
					@endforeach
				</ul>
			</div>
	
		</table>
		<table class="list-style specs" id="table">
				<tr>
					<th width="160" class="center">规格名称</th>
					<th class="center">规格值</th>
				</tr>
			

				

		</table>
		<table class="list-style specs" id="specstable">
				<tr>
					
					<th class="center">价格</th>
					<th class="center">库存</th>
				</tr>
				
		</table>
		<!-- BatchOperation -->
		<div style="overflow:hidden;">
			  <!-- turn page -->
			<div class="turnPage center fr">

			</div>
		</div>
	</div>

@endsection

@section('script')
<script>
	$('.model').on('click', function(){
		var _this = this
		var id = $(this).data('id')
		$.ajax({
			method:'post',
			url:'/admin/pattern/checkmodel',
			data:{
				_token : '{{ csrf_token() }}',
				id : id,
			},
			success: function(res){
				for (k in res.data) {
					var str = '';
					str += '<tr><td style="text-align:right;">'
					str += '<input readonly type="text" class="textBox length-long" style="height: 60px;width:160px;" value="'+res.data[k]['name']+'"/>'
					str += '</td><td id="lists" class="list" style="position:relative;">'
					for (kk in res.data[k]['specs']) {
						str += '<input readonly type="text" class="textBox length-long vals" style="height: 60px;width:160px;" value="'+res.data[k]['specs'][kk]['name']+'" data-id="'+res.data[k]['specs'][kk]['id']+'"/>'
					}
					str += '</td></tr>'
					$('#table').append(str);
				}
				
				var str2 = '';
				for (k in res.data) {
					str2 += '<th width="160" class="center">'+res.data[k]['name']+'</th>'
				}
				$('#specstable').children().eq(0).children().eq(0).prepend(str2);
			}	
		});
	})
	
	$('#table').on('click', '.vals', function(){
		// console.dir(this);
		if ($(this).css('background-color') == 'rgb(0, 128, 0)') {
			$(this).css('background-color', 'white');
			$(this).css('color', 'black');
		} else {
			$(this).css('background-color', 'green');
			$(this).css('color', 'white');
		}
		
		
		setTimeout(function(){
			var _this = this
			var id = []
			$('#specstable').children().eq(0).children().eq(4).remove()
			$('#specstable').children().eq(0).children().eq(3).remove()
			$('#specstable').children().eq(0).children().eq(2).remove()
			$('#specstable').children().eq(0).children().eq(1).remove()
			$('.vals').each(function(index, ele){
				if($(ele).css('background-color') == 'rgb(0, 128, 0)') {
					id.push($(ele).data('id'))
				}
			})
			// console.dir(id)
			
			$.ajax({
				method:'post',
				url:'/admin/pattern/checkspecskey',
				data:{
					_token : '{{ csrf_token() }}',
					id : id,
				},
				success: function(res){
					if (res.code == 0) {
						
						for (k in res.group) {
							var str = '' 
							str += '<tr><td style="text-align:center;">'
							str += '<input disabled type="text" class="textBox length-long" style="height: 60px;width:160px;" value="'+res.group[k][0][0]+'"/>'	
							str += '</td><td style="text-align:center;">	'		
							str += '<input disabled type="text" class="textBox length-long" style="height: 60px;width:160px;" value="'+res.group[k][0][1]+'"/>'	
							str += '</td><td style="text-align:center;"><input type="text" class="textBox length-long" style="height: 60px;width:500px;"/></td><td class="list" style="text-align:center;"><input type="text" class="textBox length-long" style="height: 60px;width:500px;"/></td></tr>'
							$('#specstable').append(str)
						}
					}
				}	
			});
		}, 500)
		
		
		
	})
	
	
</script>
@endsection