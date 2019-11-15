@extends('Admin.layout.main')

@section('body')
<div class="wrap">
    <div class="page-title">
        <span class="modular fl">
            <i class="add"></i>
            <em>编辑友链</em></span>
        <span class="modular fr">
            <a href="/admin/link" class="pt-link-btn">友链列表</a></span>
    </div>
    <form action="/admin/link/edit" method="post">
		<input type="hidden" name="id" value="{{$data['id']}}"/>
		{{ csrf_field() }}
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">友链名称：</td>
                <td>
                    <input type="text" class="textBox length-long" name="name" value="{{$data['name']}}" />
				</td>
            </tr>
            
            
            <tr>
                <td style="text-align:right;">友链url：</td>
                <td>
					<input type="text" class="textBox length-long" name="url" value="{{$data['url']}}" />
				</td>
            </tr>
            <tr>
                <td style="text-align:right;"></td>
                <td>
                    <input type="submit" value="保存" class="tdBtn" /></td>
            </tr>
        </table>
    </form>
</div>
@endsection