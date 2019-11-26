@extends('Admin.layout.main')

@section('body')
<div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>规格</em></span>
  </div>
  
  <table class="list-style">
	<tr>
		<th class="center">分类名称</th>
		<th class="center">规格详细属性</th>
		<th class="center">操作</th>
	</tr>
	@foreach($result as $v)
	<tr>
		<td class="center">
			<span>{{ $v['cate']['name'] }}</span>
		</td>
		<td class="center">
			<span>
				@foreach($v['key'] as $vv)
					{{$vv['attr_name']}}
					（
						<span class="vals">
						@foreach($vv['value'] as $vvv)
							{{$vvv->attr_value}}
						@endforeach
						</span>
					）
				@endforeach
			</span>
		</td>
		<td class="center">
			<a href="/admin/attr/son/{{$v['cate']['id']}}" title="添加子规格"><img width="40" src="/lib/images/icon_view.gif"/></a>
			<a href="javascript:void(0)" title="编辑子规格" data-id="{{$v['cate']['id']}}" data-val="{{$v['key']}}" class="edit">
				<img width="40" src="/lib/images/icon_edit.gif"/>
			</a>
			<a href="javascript:void(0)" data-id="{{$v['cate']['id']}}" class="del" title="删除子规格">
				<img width="40px;" src="/lib/images/icon_drop.gif"/>
			</a>
		</td>
	</tr>
	@endforeach
  </table>
  
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      
  </div>
 </div>
@endsection

@section('script')
<script>
	$('.edit').click(function(){
		var id = $(this).data('id')
		var attr = $(this).data('val')
		$.ajax({
			method:'post',
			url:'/admin/hasson',
			data:{
				_token : '{{ csrf_token() }}',
				attr : attr,
			},
			success: function(res){
				if (res.code == 0) {
					layer.msg(res.msg);
				} else {
					location.href = '/admin/allattr/editson/'+id
				}
			}	
		});
	})

	$('.del').click(function(){
		var id = $(this).data('id')
		var val = $(this.parentElement.parentElement).find('.vals')
		$.ajax({
			method:'post',
			url:'/admin/allattr/delson',
			data:{
				_token : '{{ csrf_token() }}',
				id : id,
			},
			success: function(res){
				if (res.code == 0) {
					val.html('')
					layer.msg(res.msg);
				} else {
					layer.msg(res.msg);
				}
			}	
		});
	})
</script>
@endsection