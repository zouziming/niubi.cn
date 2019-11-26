<link rel="stylesheet" href="/lib/libs/layui/css/layui.css">
<link rel="stylesheet" href="/lib/libs/layui/css/modules/layer/default/layer.css">
<link rel="stylesheet" href="/lib/libs/xadmin.css">

<script type="text/javascript" src="/lib/libs/jquery.min.js"></script>
<script type="text/javascript" src="/lib/libs/xadmin.js"></script>
<script type="text/javascript" src="/lib/libs/layui/layui.js"></script>
<script type="text/javascript" src="/lib/layer/form.js"></script>
<script type="text/javascript" src="/lib/libs/layui/lay/modules/layer.js"></script>
	
<form class="layui-form">
	<input type="hidden" name="title" lay-verify="required" class="layui-input">
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">评价</label>
		<div class="layui-input-block">
			<textarea name="content" placeholder="请输入内容" class="layui-textarea"></textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		</div>
	</div>
</form>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
	
    return false;
  });
});
</script>