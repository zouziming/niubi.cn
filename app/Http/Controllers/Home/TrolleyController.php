<?php

namespace App\Http\Controllers\Home;

use App\ShopCardetail;
use App\ShopCarorder;
use App\ShopAddres;
use App\ShopCar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrolleyController extends Controller
{
    public function shopcar(Request $request)
	{
		$userinfo = session('userInfo');
		$data = ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 0)->get();
		// dump($data);
		
		foreach ($data as $k=>$v) {
			$data[$k]['goods_specs'] = explode('_', $v['goods_specs']);
		}
		// dump($data);
		return view('Home.shopcar')->with('data', $data);
	}
	
	public function jian(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->update(['goods_num'=>$request->num]);
		if ($res) {
			return ['code'=>0, 'msg'=>'ok'];
		}
	}
	
	public function jia(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->update(['goods_num'=>$request->num]);
		if ($res) {
			return ['code'=>0, 'msg'=>'ok'];
		}
	}
	
	public function ipt(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->update(['goods_num'=>$request->num]);
		if ($res) {
			return ['code'=>0, 'msg'=>'ok'];
		}
	}
	
	public function del(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->delete();
		if ($res) {
			return ['code'=>0, 'msg'=>'删除成功'];
		} else {
			return ['code'=>1, 'msg'=>'删除失败'];
		}
	}
	
	public function alldel(Request $request)
	{
		$res = ShopCar::where('uid', $request->id)->delete();
		if ($res) {
			return ['code'=>0, 'msg'=>'清空购物车成功'];
		} else {
			return ['code'=>1, 'msg'=>'清空购物车失败'];
		}
	}
	
	public function btn(Request $request)
	{
		$res = ShopCar::where('uid', $request->uid)->first();
		// dump($res);
		if ($res == null) {
			return ['code'=>1, 'msg'=>'什么东西都没有，提交个鬼'];
		}
		if ($request->id == null) {
			return ['code'=>2, 'msg'=>'你TM倒是选啊'];
		} else {
			foreach ($request->id as $v) {
				ShopCar::where('id', $v)->update(['is_buy'=>1]);
			}
			return ['code'=>0];
		}
	}
	
	public function pay(Request $request)
	{
		$address = ShopAddres::where('uid', session('userInfo.id'))->get();
		$data = ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 1)->get();
		foreach ($data as $k=>$v) {
			$data[$k]['goods_specs'] = explode('_', $v['goods_specs']);
		}
		// dump($data);
		return view('Home.shopcarpay')->with(['data'=>$data, 'address'=>$address]);
	}
	
	public function orders(Request $request)
	{
		$address = ShopAddres::where('id', $request->address)->get();
		// dd($address);
		$addr['getman'] = $address[0]['consignee'];
		$addr['phone'] = $address[0]['phone'];
		$addr['address'] = $address[0]['add_id'].' '.$address[0]['address'];
		$addr['uid'] = session('userInfo.id');
		$addr['addtime'] = date('Y-m-d H:i:s', time());
		$addr['code'] = '000000';
		$addr['status'] = 1;
		
		$total = [];
		$oid = ShopCarorder::insertGetId($addr);
		// dd($oid);
		$onum = time().$oid;
		// dd($onum);
		ShopCarorder::where('id', $oid)->update(['order_num'=>$onum]);
		foreach ($request->detail as $v) {
			$car = ShopCar::where('id', $v)->get();
			$details['oid'] = $oid;
			$details['gid'] = $car[0]['gid'];
			$details['gname'] = $car[0]['goods_name'];
			$details['num'] = $car[0]['goods_num'];
			$details['pic'] = $car[0]['goods_img'];
			$details['price'] = $car[0]['goods_price'];
			$details['specs'] = $car[0]['goods_specs'];
			
			$total[] = $car[0]['goods_num'] * $car[0]['goods_price'];
			$res = ShopCardetail::create($details);
		}
		$price = 0;
		foreach ($total as $v) {
			$price += $v;
		}

		ShopCarorder::where('id', $oid)->update(['total'=>$price]);
		if ($res) {
			ShopCar::whereIn('id', $request->detail)->delete();
			return ['code'=>0, 'msg'=>'提交订单成功', 'oid'=>$oid];
		} else {
			return ['msg'=>'提交订单失败'];
		}
	}
	
	public function pyjy(Request $request)
	{
		$data = ShopCarorder::where('id', $request->id)->get();
		// dump($data);
		return view('Home.pay')->with('data', $data);
	}
	
	public function paypyjy(Request $request)
	{
		require_once base_path("/storage/pay/pagepay/pagepay.php");
	}
	
	public function returnurl(Request $request)
	{
		require_once base_path("/storage/pay/config.php");
		require_once base_path('/storage/pay/pagepay/service/AlipayTradeService.php');
		
		$arr=$_GET;
		$alipaySevice = new \AlipayTradeService($config); 
		$result = $alipaySevice->check($arr);
		
		/* 实际验证过程建议商户添加以下校验。
		1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
		2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
		3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
		4、验证app_id是否为该商户本身。
		*/
		// echo '<pre>';
		// var_dump($_GET);
		if($result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代码
			
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
		
			//商户订单号
			$out_trade_no = htmlspecialchars($_GET['out_trade_no']);
		
			//支付宝交易号
			$trade_no = htmlspecialchars($_GET['trade_no']);
			
			//交易金额
			$total_amount = htmlspecialchars($_GET['total_amount']);
			
			$data = ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->first();
			
			if ($data != null) {
				$res1=ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->update(['status'=>2]);
				$res2=ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->update(['trade_no'=>$trade_no]);
			}
			if ($res1 && $res2) {
				echo '<b>付款成功</b>';
			} else {
				echo '<b>付款失败</b>';
			}
			
			// echo "验证成功<br />支付宝交易号：".$trade_no;
		
			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		else {
		    //验证失败
		    echo "验证失败";
		}
	}
	
	public function notifyurl()
	{
		
		require_once base_path('/storage/pay/config.php');
		require_once base_path('/storage/pay/pagepay/service/AlipayTradeService.php');
		
		$arr=$_POST;
		$alipaySevice = new AlipayTradeService($config); 
		$alipaySevice->writeLog(var_export($_POST,true));
		$result = $alipaySevice->check($arr);
		
		/* 实际验证过程建议商户添加以下校验。
		1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
		2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
		3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
		4、验证app_id是否为该商户本身。
		*/
	

		if($result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代
		
			
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
			
		    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
			
			//商户订单号
		
			$out_trade_no = $_POST['out_trade_no'];
		
			//支付宝交易号
		
			$trade_no = $_POST['trade_no'];
		
			//交易状态
			$trade_status = $_POST['trade_status'];
			
			//交易金额
			$total_amount = $_POST['total_amount'];
		
		
		    if($_POST['trade_status'] == 'TRADE_FINISHED') {
		
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
					//如果有做过处理，不执行商户的业务程序
						
				//注意：
				//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
				$data = ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->first();
				
				if ($data != null) {
					$res1=ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->update(['status'=>2]);
					$res2=ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->update(['trade_no'=>$trade_no]);
				}
				if ($res1 && $res2) {
					echo '<b>付款成功</b>';
				} else {
					echo '<b>付款失败</b>';
				}
		    }
		    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
					//如果有做过处理，不执行商户的业务程序			
				//注意：
				//付款完成后，支付宝系统发送该交易状态通知
				$data = ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->first();
				
				if ($data != null) {
					$res1=ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->update(['status'=>2]);
					$res2=ShopCarorder::where('order_num', $out_trade_no)->where('total', $total_amount)->update(['trade_no'=>$trade_no]);
				}
				if ($res1 && $res2) {
					echo '<b>付款成功</b>';
				} else {
					echo '<b>付款失败</b>';
				}
		    }
			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
			echo "success";	//请不要修改或删除
		}else {
		    //验证失败
		    echo "fail";
		
		}
	}
}
