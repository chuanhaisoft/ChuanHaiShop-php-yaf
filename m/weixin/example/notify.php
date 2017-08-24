<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once  $_SERVER['DOCUMENT_ROOT'] .'/m/weixin/lib/WxPay.Api.php';;
require_once  $_SERVER['DOCUMENT_ROOT'] .'/m/weixin/lib/WxPay.Notify.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/m/weixin/example/log.php';

//初始化日志
$logHandler= new CLogFileHandler($_SERVER['DOCUMENT_ROOT']."/m/weixin/logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
    private $UserDo=false;
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back007:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		Log::DEBUG("start_user_do_state:");
		$Do=\Bll\CaiWu::Update_Chong_State($data["out_trade_no"],\Pub\Number::Chu($data["total_fee"], 100,0));
		Log::DEBUG("user_do_state:{$Do}:");
		if($Do)
		{
		    return true;
		}
		else 
		    return false;
		
	}
}

Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
