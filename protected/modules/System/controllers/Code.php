<?php
use Pub\Fram;

class CodeController extends yaf\Controller_Abstract
{
	public function GetAction()
	{
	    if(strpos($_SERVER['SERVER_SOFTWARE'], 'Win')==false)
	        die('请在win下执行');
	    $Table="pub";
	    echo $Table.':';
	    $r=Pub\Data::Rows("SHOW FIELDS FROM ".$Table);
	    $r=json_encode($r);
	     //model
	     $str=Pub\Curl::SendPost('http://30.api.yunhuatong.com/system/code/Codeapi/',['lib'=>'model','table_name'=>$Table,'table_fields'=>$r,'user_name'=>'api001','user_pass'=>'96385211']);
	     $str=iconv(mb_detect_encoding($str), 'UTF-8', $str);
	     if(strpos($str, 'FieldPassedName'))
	       echo self::CreateFile('lib/Model/'.self::FormatStr($Table).'.php', $str,true);
	     //bll
	     $str=Pub\Curl::SendPost('http://30.api.yunhuatong.com/system/code/Codeapi/',['lib'=>'bll','table_name'=>$Table,'table_fields'=>$r,'user_name'=>'api001','user_pass'=>'96385211']);
	     $str=iconv(mb_detect_encoding($str), 'UTF-8', $str);
	     if(strpos($str, 'GetListByIndex'))
	       echo self::CreateFile('lib/Bll/'.self::FormatStr($Table).'.php', $str,false);
	     //dal
	     $str=Pub\Curl::SendPost('http://30.api.yunhuatong.com/system/code/Codeapi/',['lib'=>'dal','table_name'=>$Table,'table_fields'=>$r,'user_name'=>'api001','user_pass'=>'96385211']);
	     $str=iconv(mb_detect_encoding($str), 'UTF-8', $str);
	     if(strpos($str, 'GetListByIndex'))
	       echo self::CreateFile('lib/Dal/'.self::FormatStr($Table).'.php', $str,false);
	     
	}
	
	public static function CreateFile($Path,$str,$FuGai=false)
	{
	    if(Pub\File::Is_Exist($Path))
	    {
	        $f=Pub\File::File_Mess($Path);
	        $UserCode=Fram::GetRegexMess("//--user code start--[内容]//--user code end--",$f);
	        //can edit code
	        if(strpos($f,"//--can edit code start--"))
	        {
	            $EditCode_User=Fram::GetRegexMess("//--can edit code start--[内容]//--can edit code start--",$f);
	            $EditCode=Fram::GetRegexMess("//--can edit code start--[内容]//--can edit code start--",$str);
	            $str=str_replace($EditCode, $EditCode_User, $str);
	        }

	        if(is_array($UserCode))
	        {
	            $code='';
	            for($i=0;$i<count($UserCode);$i++)
	            {
	                $code.=trim($UserCode[$i]);
	                if($i>0)
	                    $code.="\n\t";
	            }
	            $UserCode=$code;
	        }
	        else
	            $UserCode='';
	    }
	    if(!isset($UserCode) || !$UserCode)
	    {
	        $UserCode='';
	    }
	    $n="\n    ";if($UserCode=='')$n="";
	    $str=str_replace("//--user code start--", "//--user code start--{$n}".$UserCode, $str);
	    echo Pub\File::CreateFile($Path, $str,$FuGai);
	}
	
	
	public static function FormatStr($str)
	{
	    $str=strtolower($str);
	    $str=str_replace('_', ' ', $str);
	    $str=ucwords($str);
	    $str=str_replace(' ', '', $str);
	    return $str;
	}

}