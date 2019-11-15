@extends('Admin.layout.main')

@section('body')
<div class="wrap">
    <div class="page-title">
        <span class="modular fl">
            <i class="add"></i>
            <em>添加轮播图</em></span>
        <span class="modular fr">
            <a href="/admin/lunbo" class="pt-link-btn">轮播图列表</a></span>
    </div>
    <form action="/admin/lunbo/add" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
        <table class="list-style">
            <tr>
                <td style="text-align:right;">添加图片：</td>
                <td>
                    <input type="file" id="suoluetu" class="hide" onchange="demo(this)" name="file"/>
                    <label for="suoluetu" class="labelBtnAdd">+</label></td>
            </tr>
            <tr>
                <td style="text-align:right;">轮播缩图片：</td>
                <td>
                    <img src="" width="260" class="mlr5" />
				</td>
			</tr>
			
			<tr>
                <td style="text-align:right;">轮播图地址：</td>
                <td>
					<input type="text" class="textBox length-long" name="url" />
				</td>
            </tr>
            <tr>
                <td style="text-align:right;"></td>
                <td>
                    <input type="submit" value="添加" class="tdBtn" /></td>
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