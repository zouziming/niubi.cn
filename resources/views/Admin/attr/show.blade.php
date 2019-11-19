@extends('Admin.layout.main')

@section('body')
<div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>规格</em></span>
	<span class="modular fr"><a href="/admin/attr/add" class="pt-link-btn">+添加规格</a></span>
  </div>
  
  <table class="list-style">
	<tr>
		<th class="center">分类名称</th>
		<th class="center">规格属性</th>
		<th class="center">操作</th>
	</tr>
	@foreach($result as $v)
	<tr>
		<td class="center">
			<span>{{ $v[1]['name'] }}</span>
		</td>
		<td class="center">
			<span>
				@foreach($v[0] as $vv)
					{{ $vv['attr_name'] }} &nbsp;
				@endforeach
			</span>
		</td>
		<td class="center">
			<a href="/admin/attr/edit/{{$v[1]['id']}}" title="设置规格"><img width="40" src="/lib/images/icon_edit.gif"/></a>
			<a href="javascript:void(0)" title="删除" class="del" data-id="{{$v[1]['id']}}">
				<img width="40px;" src="/lib/images/icon_drop.gif"/>
			</a>
		</td>
	</tr>
	@endforeach
  </table>
  
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  
	  <!-- turn page -->
	  <div class="turnPage center fr">
	   
	  </div>
  </div>
 </div>
@endsection

@section('script')
<script>
	$('.del').click(function(){
		var id = $(this).data('id');
		var tr = $(this.parentElement.parentElement)
		$.ajax({
			method:'get',
			url:'/admin/attr/del',
			data:{
				id : id,
			},
			success: function(res){
				if (res.code == 0) {
					layer.msg('删除成功!');
					tr.remove();
				} else if (res.code != 0) {
					layer.msg(res.msg);
				}
			}
		});
	});
</script>
@endsection