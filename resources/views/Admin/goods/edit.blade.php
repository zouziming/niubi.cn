@extends('Admin.layout.main')

@section('body')
<div class="wrap">
    <div class="page-title">
        <span class="modular fl">
            <i class="add"></i>
            <em>编辑商品</em></span>
        <span class="modular fr">
            <a href="/admin/goods" class="pt-link-btn">商品列表</a></span>
    </div>
    <form id="formData" action="/admin/goods/edit/{{$data->id}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">商品名称：</td>
                <td>
                    <input type="text" class="textBox length-long" name="name" value="{{$data->name}}" /></td>
            </tr>
            <tr>
                <td style="text-align:right;">商品分类：</td>
                <td>
                    <select class="textBox" name="cid">
                    	<option value="">--请选择--</option>
                    		@foreach($cate as $v)
                    		<?php 
                    			$num = substr_count($v['path'], ',');
                    			$str = str_repeat('--', $num-1);
                    		?>
                            <option <?=$num<2?'disabled':''?> 
							@if($data->cid == $v->id)
								selected='selected'
							@endif
							 value="{{$v->id}}">{{$str.$v->name}}</option>
                    		@endforeach		
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品描述：</td>
                <td>
                    <input type="text" class="textBox length-long" name="descr" value="{{$data->descr}}" /></td>
            </tr>
            <tr>
                <td style="text-align:right;">推荐至：</td>
                <td>
					
                    <input type="checkbox" name="jinpin" id="jingpin" value="1"
					 @if($data->boutique)
					 checked="checked"
					 @endif 
					  />
                    <label for="jingpin">精品</label>
                    <input type="checkbox" name="xinpin" id="xinpin" value="1"
					 @if($data->new)
					 checked="checked"
					 @endif 
					 />
                    <label for="xinpin">新品</label>
                    <input type="checkbox" name="rexiao" id="rexiao" value="1"
					 @if($data->hot)
					 checked="checked"
					 @endif 
					 />
                    <label for="rexiao">热销</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">是否包邮：</td>
                <td>
                    <input type="radio" name="baoyou" id="baoyou" value="1"
					 @if($data->baoyou == 1)
					 checked
					 @endif 
					 />
                    <label for="baoyou">包邮</label>
                    <input type="radio" name="baoyou" id="bubaoyou" value="0"
					 @if($data->baoyou == 0)
					 checked
					 @endif 
					 />
                    <label for="bubaoyou">不包邮</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">编辑图片：</td>
                <td>
                    <input type="file" id="suoluetu" class="hide" onchange="demo(this)" name="file"/>
                    <label for="suoluetu" class="labelBtnAdd">+</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">商品缩略图：</td>
                <td>
                    <img src="{{$data->pic}}" width="60" height="60" class="mlr5" /></td>
            </tr>
            <tr>
                <td style="text-align:right;">商品详情：</td>
                <td>
                    <textarea class="textarea">...这里直接调用文本编辑器...</textarea></td>
            </tr>
            <tr>
                <td style="text-align:right;"></td>
                <td>
                    <input type="submit" value="修改商品" class="tdBtn" />
					<a href="javascript:void(0)"><input type="submit" value="返回" class="tdBtn fan"/></a>
				</td>
            </tr>
        </table>
    </form>
</div>
@endsection


@section('script')
<script src="/lib/js/jquery.min.js"></script>
<script>
	function demo(file)
	  {
	    if (file.files && file.files[0])
	    {
	      var reader = new FileReader();
	      reader.onload = function(evt){
	        jQuery(".mlr5").attr("src",evt.target.result)
	        // console.log(evt.target.result)
	      }
	      reader.readAsDataURL(file.files[0]);
	    } else {
	      jQuery(".mlr5").attr("src",evt.target.result)
	    }
	  }
	  
</script>
@endsection