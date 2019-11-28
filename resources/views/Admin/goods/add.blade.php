@extends('Admin.layout.main')

@section('body')
<div class="wrap">
    <div class="page-title">
        <span class="modular fl">
            <i class="add"></i>
            <em>添加商品</em></span>
        <span class="modular fr">
            <a href="/admin/goods" class="pt-link-btn">商品列表</a></span>
    </div>
    <form action="/admin/goods/add" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">商品名称：</td>
                <td>
                    <input type="text" class="textBox length-long" name="name" value="{{ session('data.name') }}" /></td>
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
                            <option
							 @if(session('data.cid') == $v->id)
							 	selected
							 @endif
							  <?=$num<2?'disabled':''?> value="{{$v->id}}">{{$str.$v->name}}</option>
							@endforeach		
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品描述：</td>
                <td>
                    <input type="text" class="textBox length-long" name="descr" value="{{ session('data.descr') }}" /></td>
            </tr>
            <tr>
                <td style="text-align:right;">推荐至：</td>
                <td>
					
                    <input type="checkbox" name="jinpin" id="jingpin" value="1"
					 @if(session('data.jinpin') == 1)
						checked
					 @endif
					 />
                    <label for="jingpin">精品</label>
                    <input type="checkbox" name="xinpin" id="xinpin" value="1"
					 @if(session('data.xinpin') == 1)
					 	checked
					 @endif
					 />
                    <label for="xinpin">新品</label>
                    <input type="checkbox" name="rexiao" id="rexiao" value="1"
					 @if(session('data.rexiao') == 1)
					 	checked
					 @endif
					 />
                    <label for="rexiao">热销</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">是否包邮：</td>
                <td>
                    <input type="radio" name="baoyou" id="baoyou" value="1" 
					@if(session('data.baoyou') == 1)
						checked
					@endif
					/>
                    <label for="baoyou">包邮</label>
                    <input type="radio" name="baoyou" id="bubaoyou" value="0" 
					 @if(session('data.baoyou') == 0)
					 	checked
					 @endif
					 />
                    <label for="bubaoyou">不包邮</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">添加图片：</td>
                <td>
                    <input type="file" id="suoluetu" class="hide" onchange="demo(this)" name="file"/>
                    <label for="suoluetu" class="labelBtnAdd">+</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">商品缩图片：</td>
                <td>
                    <img src="" width="250" class="mlr5" />
				</td>
            </tr>
            <tr>
                <td style="text-align:right;">商品详情：</td>
                <td>
                    <textarea class="textarea">...这里直接调用文本编辑器...</textarea></td>
            </tr>
            <tr>
                <td style="text-align:right;"></td>
                <td>
                    <input type="submit" value="发布新商品" class="tdBtn" /></td>
            </tr>
        </table>
    </form>
</div>
@endsection


@section('script')
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