<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101600702204",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEA0wCtN989xWbgArwn7vszNsgZQ6Ft5RkkC7kFM8+hdc+G7azsUfYy8nRIBhc7M+s/A6vSzmqVrkhyI+e0xQC/TPeKmyYytOSbkWYf/bWSiWOKbeN85Rx91e9yOCw/MumONOcSI7d9uNhMHMexsUa4tZfD0fUuC0d4eCWdfHZRRgg3nfyk+lDyiqWEhZXPXKVYOn/q29Nk1MmFmKXiT0O6sxpKZ8ViGyTKbqPSjNs3VPOyv+Cu/Ag/OWBum7+uE0ryrOsiThl7J8S/1krMjfqluhe2tQT6QeJVZB2fcQUt6OufWK112cnxle2rg/O1VqIgVjz4yEc6icGjbxnyy1ho7QIDAQABAoIBAB7+u3M4pN9JhGCCeS8+0UAb1rI7lWQQ9F2QeTYqKuKecIibXT+Q9dztveK/KOAwj1oftGDEAWbPl4y0rbY+rNtGhaLS0qIF7uBF6y8eq/7ok14fC6qwK7/wY4vi3AnDizM0OlLq0loD0/JqVyzeYaWzPH2sEW5wuj6T7/Vnf/rUV9wu0jrFQ5KTS84vyhCG5hh7naNpx9advgFYkY0n+NO3JxHoME3VJfcLS3LyTaisFwk2IVaIyESD9FXqFqj7ClABDAWq2Bymq8Sk/irTFDxV/IodOp7aQoBF8uCtF/aQ9voI4zJtoOkt/bd/9g9Qt0OzDHgVZMDy4i37EyDZ1TUCgYEA8L7vwwxeYnroSbgbG+65ei1/y3LoH4F/cdDqNuVO+fHQqMwASRiGcxW9DGrJIJ9dS9xY+n4ubJyAuJf+v6LuhTfiAGRVOIosV+tGJ6DbK9qwTDy6+U7iO9GLbvdK+GjLGTRtgq9BvKRJHyWoNthnG6eL4H2vYmLqeRLXIxc4tD8CgYEA4F9I6oC/hhgDQzgtO2ltpVH1/OteHUtFD7xjwnMkl5lfroEC+KyHUWmDtMMeHmUgjfG5yh6mFIawuiPP6fg6FvPejuTuM5P5j76JSh6vBHVgUbXNX+gZ1NhPQOtUIeJ+CH64DyizrO57HvTQQKIORnx6XURmoIn8ElMvtylJ59MCgYA91bz9izK+9rStIqWL4iAvunoFhokKdpeGY1OVMAa9+hdPE77LB4qZCq9Y/iCUyXoMHxeXl0tTSEtjnl6nWDENdJIO6bZd5FeJaXvGd/FzbSM1IbAgkttW4/Z9VPUjor7vxWCPXXZz/nptjp2LIMAzATDTQ1UF30Q8PtOVRsSgvwKBgEos9gwgmDCai6mTTtDPX+JBoFMG9Mw2cBRtsYU9T6GWoN0t5W+Uif/OJC6EOtbNk9+ZRFSfoUQz6wT+hePRnlKsOK2A3YbLqrtswDJyxmVw8HDS65yDPNby0/CgW+X/3K6uRectC4lmJensAVT8vj9rM4DV9h+ovl7IhYPF8JrlAoGBAKDwz8eKBUjBypqW87GQtZkdp/apcFdVZdIneoVLdaAKDx8EmNQvQaJMKIJ+ljwf2NB5JXRNAwZefA8JUvtir4hxfe+xglGIAIsGgObJ17PZUTBYe1L3+BbfbcXCtMnqY5tzdzyfp8CjZkIhba2R9kZ/HoB9iUDkj9tGv6/bWVwG",
		
		//异步通知地址
		'notify_url' => "http://pay.zzmblog.com/notify_url.php",
		
		//同步跳转
		'return_url' => "http://pay.zzmblog.com/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		// 'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3gbp3GVAEFmQed8pkeIgjN0ZmMx4XqO3R38mTwY7KrbjbTKDKNwbymPZA9ofL9DSyA46+SlKzyc1FsvE5EyVJ1YkoWcb61lJlL1TXnrgXUbW2Wn/zpBkSGexOJprmhKFl9WgbSKsc15WWtuAUQ8EWJ4ay9aBcOQXB6M8tCrRG3Ib+zEiuzLhSeEa9/O0cBdSjc2nLLz2qj9b79m+QyLgajXB+iX0WKtOI9DzrGyaIQk9p+x3RvP8Eppf+xupuUmEsHEEkqvd/tVtzYJwfenNy/Qg2vMp2ojPivIAXarReEuIMKGTdHpJCS6urX1aAwvORvNW5tdVmw691x3yi51aOwIDAQAB",
);