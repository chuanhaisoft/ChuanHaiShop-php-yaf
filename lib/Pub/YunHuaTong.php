<?php
namespace Pub;

class YunHuaTong
{
    //充话费
    public static function UserMoney()
    {
        return self::SendUrl([],'/api/Usermoney/');
    }
    //充话费
    public static function ChongHuaFei($MobileNum,$MianZhi,$OrderNum)
    {
        $vars["mobilechong"] = $MobileNum;
        $vars["mianzhi"] = $MianZhi;
        $vars["ordernum"] = $OrderNum;
        return self::SendUrl($vars,'/api/chonghuafei/');
    }
	//拨打电话
	public static function CallBack($TellFrom,$TellTo,$UserID=0)
	{
		$vars["tellfrom"] = $TellFrom;
		$vars["tellto"] = $TellTo;
		$vars["userid2"] = $UserID;
		return self::SendUrl($vars,'/api/backcall/');
	}
	
	//语音验证码--接受 字母数字，建议纯数字
	public static function CodeVoip($TellFrom,$Code,$PlayCount=3)
	{
		$vars["tellfrom"] = $TellFrom;
		$vars["code"] = $Code;
		$vars["play_count"] = $PlayCount;
		
		return self::SendUrl($vars,'/api/code/');
	}
	
	public static function CodeText($TellFrom,$Code)
	{
		$vars["tellfrom"] = $TellFrom;
		$vars["code"] = $Code;
		$vars["textqianming"] = self::TextQianMing();
		return self::SendUrl($vars,'/api/codetext/');
	}
	//只能发通知类(验证码以外的需要固定下格式)
	public static function SendMessage($TellFrom,$Template_id,$Para)
	{
		$vars["tellfrom"] = $TellFrom;
		$vars["template_id"] = $Template_id;
		if(is_array($Para))
		{
		    foreach($Para as $key => $value)
		    {
		        $vars["template_para_".$key]=$value;
		    }
		}
		$vars["textqianming"] = self::TextQianMing();

		return self::SendUrl($vars,'/api/sendtongzhi/');
	}
	//广告类接口，暂未对接，使用时通知
	public static function SendAd($TellFrom,$Message)
	{
		$vars["tellfrom"] = $TellFrom;
		$vars["code"] = $Message;
		$vars["textqianming"] = self::TextQianMing();
		
		return self::SendUrl($vars,'/api/sendad/');
	}
	
	public static function TextQianMing()
	{
		return \Bll\Pub::Value(60000007);
	}
	
	public static function Key()
	{
	    return \Bll\Pub::Value(60000006);
	}
	
	public static function SendUrl($vars,$url)
	{
		//配置项
		$UserID = \Bll\Pub::Value(60000005);
		$Key    = self::Key();
		
		$vars["mobilenum"] = $UserID;
		$Key = self::ApiSign($vars,$Key);
		$vars["key"] = $Key;
		
		$sn = new Snoopy();
		$sn->timed_out=true;
		$sn->read_timeout=20;
		$sn->rawheaders["Pragma"] = "no-cache";
		$sn->submit('http://30.api.yunhuatong.com'.$url,$vars);
		return $sn->results;
	}
	
	public static function ApiSign($Arr,$Key)
	{
		$Arr2=array();
		foreach ($Arr as $key => $value)
		{
			array_push($Arr2,$key.'='.urlencode($value));
		}
		sort($Arr2);
		$Str='';
		$Str=implode("&", $Arr2);
		$Str=md5($Str.$Key);
		
		return $Str;
	}
}