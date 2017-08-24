<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once $_SERVER['DOCUMENT_ROOT']."/m/weixin/lib/WxPay.Api.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/m/weixin/example/WxPay.NativePay.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/m/weixin/example/log.php';

$CaiwuID=\Pub\Fram::GetNumValue('id');
if(!\Pub\Fram::CheckNum($CaiwuID))
    die('信息错误');

$caiwu=\Bll\CaiWu::Model($CaiwuID);
if(!\Pub\Fram::CheckNum($caiwu->Money()))
    die('金额错误');
if($caiwu->State()==1)
    die('订单已支付');

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
$url1 = $notify->GetPrePayUrl("123456789");

//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$input = new WxPayUnifiedOrder();
$input->SetBody("test");
$input->SetAttach("test");
$input->SetOut_trade_no($caiwu->Id());
$input->SetTotal_fee($caiwu->Money()*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://shop.yunhuatong.com/pay/notify.html");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id("123456789");
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>支付</title>
<style type="text/css">
.tuizhijuzhong{position: absolute;height:180px;top:50%;margin-top:-100px;} 
</style>
</head>
<body>
	<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;display:none">扫描支付模式一<br/>
	<img alt="模式一扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url1);?>" style="width:150px;height:150px;"/>
	</div>
	<div style="margin-left: 10px;color:#556B2F;font-size:20px;font-weight: bolder;">
	  <div align="center">请使用微信扫码支付</div>
	</div><br/>
	<div>
	  <div align="center"><img alt="请使用微信扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:180px;height:180px;"/>
        </div>
	</div>
</body>
</html>