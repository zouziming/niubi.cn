@extends('Home.layout.main')

@section('title','商城-订单')

@section('body')
	<form class="layui-form" action="/home/order/edit/{{$data['id']}}" method="post">
		{{ csrf_field() }}

		@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		<div class="layui-form-item">
			<label class="layui-form-label">收件人</label>
			<div class="layui-input-block">
				<input value="{{$data['getman']}}" type="text" name="getman" required  lay-verify="required" autocomplete="off" class="layui-input">
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">手机</label>
			<div class="layui-input-block">
				<input value="{{$data['phone']}}" type="number" name="phone" required  lay-verify="required" autocomplete="off" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">邮编</label>
			<div class="layui-input-block">
				<input value="{{$data['code']}}" type="number" name="code" required  lay-verify="required" autocozplete="off" class="layui-input">
			</div>
		</div>

		<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
			</div>
		</div>
	</form>
	<button class="layui-btn layui-btn-primary" style="position: relative;left:250px;top:-53px"><a href="/ShowOrders">返回</a></button>
@endsection

@section('script')
<script>
//Demo
// layui.use('form', function(){
//   var form = layui.form;
  
//   form.on('submit(formDemo)', function(data){
//     layer.msg(JSON.stringify(data.field));
//     return false;
//   });
// });
</script>
@endsection