<?php
namespace Pub;
class Fram
{
	//获取当前时间
	public static function Date($_Format="Y-m-d H:i:s")
	{
		//date_default_timezone_set('Asia/Shanghai');
		return date($_Format);
	}
	public static function Is_DateTime($dateTime)
	{
	    $ret = strtotime($dateTime);
	    return $ret !== FALSE && $ret != -1;
	}
	public static function Data_Add_Fen($FenZhong,$datetime=null)
	{
	    //date_default_timezone_set('Asia/Shanghai');
	    if(!$datetime)
	        $datetime=Fram::Date();
	    
	    return date("Y-m-d H:i:s", strtotime("{$datetime} +{$FenZhong} min"));
	}
	
	public static function Time_Cha($Time1,$Time2=null,$Type='day')
	{
	    if($Time2==null)
	        $Time2=Fram::Date();
	    if($Type=='day')
	        $r=(strtotime($Time1)-strtotime($Time2))/86400;
	    else
	        $r=(strtotime($Time1)-strtotime($Time2));//abs
	     
	    return $r;
	}
	
	public static function Time1_Time2_Cha($Time1,$Time2=null)
	{
	    if($Time2==null)
	        $Time2=Fram::Date();
	    $r=abs(strtotime($Time1)-strtotime($Time2));
	    return $r;
	}
	
	public static function Data_Add_Day($TianShu,$datetime=null,$_Format="Y-m-d H:i:s")
	{
	    //date_default_timezone_set('Asia/Shanghai');
	    if(!$datetime)
	        $datetime=Fram::Date();
	    
	    return date($_Format, strtotime("{$datetime} +{$TianShu} day"));
	}
	
	public static function Data_Month($datetime=null)
	{
	    //date_default_timezone_set('Asia/Shanghai');
	    if(!$datetime)
	        $datetime=Fram::Date();
	    $_Format="Y-m";
	    return date($_Format, strtotime($datetime)).'-01';
	}
	public static function Month_First_End($datetime=null)
	{
	    //date_default_timezone_set('Asia/Shanghai');
	    
	    if(!$datetime)
	        $datetime=Fram::Date();
	    
	    $firstday = date('Y-m-01', strtotime($datetime));
	    $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
	    
	    return array($firstday,$lastday);
	}
	
	public static function Week_First_End()
	{
	    $FrstDay=date('Y-m-d', strtotime('this week'));
	    return [$FrstDay,Fram::Data_Add_Day(6,$FrstDay,'Y-m-d')];
	}
	
	public static function Month_Current_Next($datetime=null)
	{
	    //date_default_timezone_set('Asia/Shanghai');
	     
	    if(!$datetime)
	        $datetime=Fram::Date();
	     
	    $firstday = date('Y-m-01', strtotime($datetime));
	    $lastday = date('Y-m-01', strtotime("$firstday +1 month"));
	     
	    return array($firstday,$lastday);
	}
	
	
	public static function Data_Str($str,$_Format="Y-m-d H:i:s")
	{
	    //date_default_timezone_set('Asia/Shanghai');;
	    return date($_Format,strtotime($str));
	}
	public static function Data_Str_Month($str)
	{
	    //date_default_timezone_set('Asia/Shanghai');
	    return date('Y-m',strtotime($str)).'-01';
	}
	
	public static function DealNumber($number,$IfFalseDefaultValue=0)
	{
	    if(!isset($number) || !is_numeric($number))
	        $number = $IfFalseDefaultValue;
	    return $number;
	}
	public static function DealChuShu($number,$DefaultValue=1)
	{
	    if(!isset($number) || !is_numeric($number) || $number==0)
	        $number = $DefaultValue;
	    return $number;
	}
	//有误差
	public static function DealNumFloor($number,$WeiShu=2)
	{
	    $ChuShu=1;
	    for($i=1;$i<=$WeiShu;$i++)
	    {
	        $ChuShu=$ChuShu*10;
	    }
	    return floor($number*$ChuShu)/$ChuShu;
	}
	//
	public static function FormatName($_Name)
	{
		$arr=explode('_',$_Name);
		foreach ($arr as $key => $value)
		{
			$arr[$key]= ucfirst(strtolower($value));
		}
		
		return join('',$arr);
	}
	
	public static function PageAddress($_this,$route,$para=array())
	{
		return $_this->createUrl($route,$para);
	}
	//判断arr所有值是否为真
	public static function ArrIsTrue($arr)
	{
	    $r=true;
	    for($i=0;$i<count($arr);$i++)
	    {
	        $r=$r && $arr[$i];
	    }
	    return $r;
	}
	
	public static function Domain_Current()
	{
	   return "http://".$_SERVER['HTTP_HOST'];
	}
	
	
	
	public static function convert2utf8($object)
    {
    	//$NewObject = array();
    	$NewObject = $object;
    	//echo gettype($object);
    	switch (gettype($object))
    	{
    		case 'array':
    			foreach($object as $k1=> $v1)
    			{
    				if(gettype($object[$k1]) == 'array')
    				{
    					$NewObject[$k1] = self::convert2utf8($object[$k1]);
    					//echo count($object[$k1]);
    					/**
    					foreach($object[$k1] as $k2=> $v2)
    					{
    						$NewObject[$k1][$k2] = iconv("gbk","utf-8",$object[$k1][$k2]);
    					}
						**/
    				}
    				else
    				 {
    				 	$NewObject[$k1] = iconv("gbk","utf-8",$object[$k1]);
    				 }
    			}
    			break;
    		case 'string':
    			
    		default:
    			$NewObject = iconv("gbk","utf-8",$object);
    			break;
    	}
        return $NewObject;
    }
    
	public static function convert2gbk($object)
    {
    	$NewObject = $object;
    	//echo gettype($object);
    	switch (gettype($object))
    	{
    		case 'array':
    			foreach($object as $k1=> $v1)
    			{
    				if(gettype($object[$k1]) == 'array')
    				{
    					$NewObject[$k1] = self::convert2gbk($object[$k1]);
    				}
    				else
    				 {
    				 	$NewObject[$k1] = iconv("utf-8","gbk",$object[$k1]);
    				 }
    			}
    			break;
    		case 'string':
    			
    		default:
    			$NewObject = iconv("utf-8","gbk",$object);
    			break;
    	}
        return $NewObject;
    }
	
	//获取客户端ip地址
	public static function GetIp()
	{
		$ip=empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR'];
		if(is_numeric(strpos($ip, ',')))
		{
		    $ip=explode(',', $ip);
		    $ip=trim($ip[0]);
		}
		return $ip;
	}
	
	public static function StrCheck($Str,$DoKuoHao=false,$DoDengYu=false,$DoWenHao=false,$DoFenHao=false,$DoKongGe=false,$DoMyCatKey=false)
	{
		if(self::IsNotEmpty($Str))
		{
			$Str = trim($Str);
			$Str = str_replace("'","&#39;",$Str);
			$Str = str_replace("<","&#60;",$Str);
			$Str = str_replace(">","&#62;",$Str);
			$Str = str_replace("--","&#8254;&#8254;",$Str);
			$Str = str_replace("\\","&#92;",$Str);
			$Str = str_replace("\$","&#36;",$Str);
			if($DoKuoHao)
			{
			    $Str = str_replace("(","&#40;",$Str);
			    $Str = str_replace(")","&#41;",$Str);
			}
			if($DoDengYu)
			    $Str = str_replace("=","&#61;",$Str);
			if($DoWenHao)
			    $Str = str_replace("?","&#63;",$Str);
			if($DoFenHao)
			    $Str = str_replace(";","&#59;",$Str);
			if($DoKongGe)
			    $Str = str_replace(" ","&#160;",$Str);
			if($DoMyCatKey)
			    $Str = str_replace("next&#160;value&#160;for&#160;MYCATSEQ","next value for MYCATSEQ",$Str);
			//str_ireplace — 像str_replace()函数一样匹配和替换字符串，但是不区分大小写
			/**
			$Str=str_ireplace("drop","dro&#112;",$Str);
			$Str=str_ireplace("modify","modif&#121;",$Str);
			$Str=str_ireplace("cast","cas&#116;",$Str);
			$Str=str_ireplace("update","updat&#101;",$Str);
			$Str=str_ireplace("delete","delet&#101;",$Str);
			$Str=str_ireplace("where","wher&#101;",$Str);
			**/
			
		}
		else 
		{
			$Str="";
		}

		return $Str;
	}
	
	public static function IsNotEmpty($Str,$IsNothing=false)
	{
		$Value=false;
		if(isset($Str) && $Str!=null && ($IsNothing==false || ($IsNothing==true && $Str!="")))
		{
			$Value=true;
		}
		return $Value;
	}

	public static function GetSession($_SessionName)
	{
	    if(!isset($_SESSION))
		      session_start();
	    $v=isset($_SESSION[$_SessionName])?$_SESSION[$_SessionName]:null;
	    //session_write_close();
		return $v;
	}
	
	public static function SetSession($_SessionName,$_Value)
	{
	    //session_commit();
	    //session_unset();
	    if(!isset($_SESSION))
		      session_start();
		$_SESSION[$_SessionName] = $_Value;
		//session_commit();
	}
	
	public static function SetCookies($_CookieName,$_Value,$_Expire=0)
	{
	    if($_Expire>0)
	        $_Expire=strtotime(Fram::Date())+$_Expire;
		setcookie($_CookieName,$_Value,$_Expire,"/");//time()+3600*
	}
	
	public static function GetCookies($_CookieName)
	{
	    if(isset($_COOKIE[$_CookieName]))
	    {
	        if (is_array($_COOKIE[$_CookieName]))
	        {
	            return self::ArrayCheck($_COOKIE[$_CookieName]);
	        }
	        else
	        {
	            return self::StrCheck($_COOKIE[$_CookieName]);
	        }
	    }
	    else 
	    {
	        return null;
	    }
	}
	
	public static function ArrayCheck($Data)
	{
	    if (is_array($Data))
	    {
	        foreach ($Data as $key => $value)
	        {
	            $Data[$key] = self::ArrayCheck($value);
	        }
	        return $Data;
	    }
	    else
	    {
	        return self::StrCheck($Data);
	    }
	}
	
	public static function ReadFiles($file)
	{
		$tdata = "";
		//die($file);
		$fp = fopen($file, "r");
		 
		if(filesize($file) <= 0) return;
		 
		while($data = fread($fp, filesize($file)))
		{
			$tdata .= $data;
		}
		fclose($fp);
		return $tdata;
	}
	//读取传递参数
	public static function GetValue($key,$value=null,$IsToUTF8=false,$IsUrlEnCode=false,$IsUrlDeCode=false)
	{
		$tdata = null;
		if(isset($_GET[$key]))
		    $tdata = $_GET[$key];
		if(!isset($tdata) && isset($_REQUEST[$key]))
		 	$tdata=$_REQUEST[$key];
	    if(!isset($tdata))
	    {
	        $yaf=\Yaf\Dispatcher::getInstance()->getRequest()->getParam($key, null);
	        if(isset($yaf))
	            $tdata=$yaf;
	    }
		if(isset($value) && !isset($tdata))
		 	$tdata=$value;
		 $tdata = self::StrCheck($tdata);
		 if($IsToUTF8 && isset($tdata))
		 {
		 	$tdata = Fram::convert2utf8($tdata);
		 }
		if($IsUrlDeCode && isset($tdata))
			$tdata = urldecode($tdata);
		if($IsUrlEnCode && isset($tdata))
			$tdata = urlencode($tdata);
		return $tdata;
	}
	
	public static function GetArrayValue($key,$value=null)
	{
	    $r='';
	    $v=isset($_POST[$key])?$_POST[$key]:null;
	    if(is_array($v))
	    {
	        for($i=0;$i<count($v);$i++)
	        {
	            if($v[$i])
	            {
	                if($r!='')
	                    $r.=',';
	                $r.=Fram::StrCheck($v[$i]);
	            }
	        }
	    }
	    else 
	    {
	        $r=Fram::StrCheck(isset($_POST[$key])?$_POST[$key]:null);
	    }
	    return $r;
	}
	
	public static function GetFormValue($F,$key,$value=null,$IsToUTF8=false,$IsUrlEnCode=false,$IsUrlDeCode=false)
	{
	    $tdata = isset($_POST[$F][$key])?$_POST[$F][$key]:null;
	    
	    if(isset($value) && !isset($tdata))
	        $tdata=$value;
	    $tdata = self::StrCheck($tdata);
	    if($IsToUTF8)
	    {
	        $tdata = Fram::convert2utf8($tdata);
	    }
	    if($IsUrlDeCode)
	        $tdata = urldecode($tdata);
	    if($IsUrlEnCode)
	        $tdata = urlencode($tdata);
	    return $tdata;
	}
	
	public static function GetNumValue($key,$value=-1,$IsToUTF8=false,$IsUrlEnCode=false,$IsUrlDeCode=false)
	{
	    $tdata = null;
	    if(isset($_GET[$key]))
	        $tdata = $_GET[$key];
	    if(!isset($tdata) && isset($_REQUEST[$key]))
	        $tdata=$_REQUEST[$key];
		if(!isset($tdata))
	    {
	        $yaf=\Yaf\Dispatcher::getInstance()->getRequest()->getParam($key, null);
	        if(isset($yaf))
	            $tdata=$yaf;
	    }
	    if(isset($value) && !isset($tdata))
	        $tdata=$value;
	    if(!is_numeric($tdata))
	        $tdata=$value;
	
	    return $tdata;
	}
	
	//读取传递参数
	public static function GetFormNumValue($F,$key,$value=-1,$IsToUTF8=false,$IsUrlEnCode=false,$IsUrlDeCode=false)
	{
		$tdata = isset($_POST[$F][$key])?$_POST[$F][$key]:null;
		
		if(isset($value) && !isset($tdata))
		 	$tdata=$value;
		 if(!is_numeric($tdata))
			$tdata=$value;
		
		return $tdata;
	}
	
	public static function BcAdd($a,$b=0,$WeiShu=2)
	{
	    return bcadd($a, $b,$WeiShu);
	}
	public static function BcSub($a,$b=0,$WeiShu=2)
	{
	    return bcsub($a, $b,$WeiShu);
	}

	public static function CheckNum($_str,$IsBaoHan0=false)
	{
	    if($IsBaoHan0)
	    {
	        if(is_numeric($_str) && $_str >=0)
	        {
	            return true;
	        }
	        else
	        {
	            return false;
	        }
	    }
	    else 
	    {
	        if(is_numeric($_str) && $_str >0)
	        {
	            return true;
	        }
	        else
	        {
	            return false;
	        }
	    }

	}
	//设置无缓存
	public static function SetNoCache()
	{
		header ("Cache-Control: no-cache, must-revalidate"); 
    	header ("Pragma: no-cache"); 
	}
	//过滤文件名
	public static function FileExtCheck($filePath)
	{
		$extName=explode(".",$filePath);
		$filePath = $extName[0].'.'.$extName[count($extName)-1];
		return $filePath;
	}
	//清除缓存
	public static function DelMem($_name)
	{
		$cache = Yii::app()->cache;
		$cache->delete($_name);
	}
	public static function SetDefaultV($_name,$_Dafaultvalue,$CheckEmpeyStr=false)
	{
		if(!isset($_name))
			$_name=$_Dafaultvalue;
		if($CheckEmpeyStr)
		{
			if($_name=="")
				$_name=$_Dafaultvalue;
		}
		return $_name;
	}
	
	public static function QianMing($Host,$HostType=null)
	{
		if($HostType==null)
			$HostType=new Model_HostType();
		$QianMing=$HostType->QianMing();
		$QianMing=Encrypt::QianMing($QianMing.$Host->FtpUser().$HostType->SpaceSize());
		//echo "----------------------".$QianMing.$Host->FtpUser().$Host->FtpPass();
		//$QianMing=Encrypt::QianMing($QianMing.$Host->FtpUser().$HostType->SpaceSize().$Host->SiteDomain().$HostType->DiskPath().$Host->FtpPass());
		return $QianMing;
	}
	public static function RandStr($len=6,$format='ALLdefalut') 
	{ 
		 switch($format) { 
		 case 'ALL':
		 $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~'; break;
		 case 'CHAR':
		 $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~'; break;
		 case 'NUMBER':
		 $chars='0123456789'; break;
		 default :
		 $chars='AmnoBC0DEklF1GxHzI2JK3LpqrM4NO5wPtQyR6zSTsU7vVWijXY8uZab9cdefgh'; 
		 break;
		 }
		 //mt_srand((double)microtime()*1000000*getmypid()); 
		 $password="";
		 while(strlen($password)<$len)
		    $password.=substr($chars,(mt_rand()%strlen($chars)),1);
		 return $password;
    }
    
    
 
    public static function FormatSortArr($Arr)
    {
        $ReturnArr=array();
        if($Arr && is_array($Arr))
        {
            for($i=0;$i<count($Arr);$i++)
            {
                $ReturnArr[''.$Arr[$i]['id']]=$Arr[$i]['name'];
            }
        }
        return $ReturnArr;
    }
    
    public static function SetRowsUserName(&$Rows,$F='USER_ID',$IsAddCardNum=false)
    {
        for($i=0;$i<count($Rows);$i++)
        {
            if($Rows[$i][$F])
            {
                $row=\Bll\User::GetSingleRow('ID='.$Rows[$i][$F],'NAME,CARD_NUM');
                
                $Rows[$i][$F.'_NAME']='';
                $Rows[$i][$F.'_NAME']=$row['NAME'];
                
                if($IsAddCardNum)
                {
                    $Rows[$i]['CARD_NUM']='';
                    $Rows[$i]['CARD_NUM']=$row['CARD_NUM'];
                }
            }
            else 
            {
                $Rows[$i][$F.'_NAME']='';
                if($IsAddCardNum)
                    $Rows[$i]['CARD_NUM']='';
            }
                
        }
        return $Rows;
    }
    
    public static function SetRowsRoleId(&$Rows,$F='USER_ID')
    {
        for($i=0;$i<count($Rows);$i++)
        {
            if($Rows[$i][$F])
            {
                $row=\Bll\User::Column(null,'ROLE_ID',['ID=?',[$Rows[$i][$F]]]);
    
                $Rows[$i]['ROLE_ID']='';
                $Rows[$i]['ROLE_ID']=$row;
            }
            else
            {
                $Rows[$i]['ROLE_ID']='';
            }
    
        }
        return $Rows;
    }
    
    public static function SetRowsRoleName(&$Rows,$F='ROLE_ID')
    {
        for($i=0;$i<count($Rows);$i++)
        {
            if($Rows[$i][$F])
            {
                $row=\Bll\User::Column(null,'ROLE_NAME',['ID=?',[$Rows[$i][$F]]]);
                $Rows[$i]['ROLE_NAME']='';
                $Rows[$i]['ROLE_NAME']=$row;
            }
            else
            {
                $Rows[$i]['ROLE_NAME']='';
            }
    
        }
        return $Rows;
    }
    
    public static function SetRowUserName(&$Rows,$F='USER_ID')
    {
        $Rows[$F.'_NAME']='';
        if($Rows[$F])
            $Rows[$F.'_NAME']=\Bll\User::Column(null,'NAME',['ID=?',[$Rows[$F]]]);
    
         
    }
    
    public static function SetRowsName(&$Rows,$F,$V)
    {
        for($i=0;$i<count($Rows);$i++)
        {
            $Rows[$i][$F]=$V;
        }
        return $Rows;
    }
    
    public static function GeoHash($x,$y)
    {
        require_once(dirname(__FILE__).'/Geohash.php');
        $geohash = new Geohash();
        $hash = $geohash->encode($y,$x);
        return $hash;
    }
    
    public static function Xy_To_Hash($x,$y,$FanWei=5)
    {
        $arr=0;
        require_once(dirname(__FILE__).'/Geohash.php');
        $geohash = new Geohash();
        $hash = $geohash->encode($y,$x);
        //取前缀，前缀约长范围越小
        $prefix = substr($hash, 0, $FanWei);
        //取出相邻八个区域
        $neighbors = $geohash->neighbors($prefix);
        array_push($neighbors, $prefix);
        return $neighbors;
    }
    
    public static function IsJsonStr($str)
    {
        return !is_null(json_decode($str));
        
    }
    
    public static function GetConn($IfStartTran=false)
    {
        $Conn=\Pub\Data::GetConn();
        if($IfStartTran)
            $Conn->beginTransaction();
        return $Conn;
    }
    
    public static function CloseConn($Conn)
    {
        $Conn=null;
    }
    //废弃，有错误
    public static function UnitAddMax($num,$ErDu=3000,$Max=3000)
    {
        if($num >= $Max)
            return 0;
        $p=0;
        $TotalXuYao=$Max - "$num";
        if($ErDu >= $TotalXuYao)
        {
            $p= $TotalXuYao;
        }
        else
        {
            $p=$ErDu;
        }
        return $p;
    }
    public static function SendMail($To,$Title,$Mess)
    {
        $smtpserver     = Bll_Pub::Value(200); //SMTP服务器
        $smtpserverport = Bll_Pub::Value(203); //SMTP服务器端口
        $smtpusermail   = Bll_Pub::Value(201); //SMTP服务器的用户邮箱
        $smtpemailto    = $To;
        $smtpuser       = Bll_Pub::Value(201); //SMTP服务器的用户帐号
        $smtppass       = Bll_Pub::Value(202); //SMTP服务器的用户密码
        $mailsubject    = $Title; //邮件主题
        $mailsubject    = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码
        $mailbody       = $Mess; //邮件内容
        //$mailbody = "=?UTF-8?B?".base64_encode($mailbody)."?="; //防止乱码
        $mailtype       = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常
        $smtp           = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp->debug    = FALSE; //是否显示发送的调试信息
        $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
        return $state;
    }
    
    //权限判断
    public static function CheckPower($ID=0)
    {
        Encrypt::CheckWebApiPower($ID);
    }
    
    public static function CurrentUrl($IsHaveDomain=false)
    {
        return ($IsHaveDomain?('http://'.$_SERVER['SERVER_NAME'].($_SERVER["SERVER_PORT"]=='80'?'':(':'.$_SERVER["SERVER_PORT"]))):'').$_SERVER["REQUEST_URI"]; 
    }
    
    public static function CurrentPath($IsHaveDomain=false)
    {
        return dirname(self::CurrentUrl($IsHaveDomain));
    }
    
    public static function SetChanged($key,$IsChanged=true)
    {
        $key->Changed=$IsChanged;
    }
    
    public static function ModelToModel(&$Model,&$YiiModel)
    {
        foreach ($YiiModel as $key => $value)
        {
             $key2 = '_'.Fram::FormatName($key);
             if(isset($Model->$key2) )
             {
                $YiiModel->$key=$Model->$key2->v;
             }
        }
    }
    
    public static function Check_Cli()
    {
        set_time_limit(0);
        if (substr(php_sapi_name(), 0, 3) !== 'cli')
        {
            die("This Programe can only be run in CLI mode");
        }
    }
    
    public static function Cli_Mode()
    {
        
        if (substr(php_sapi_name(), 0, 3) !== 'cli')
        {
            return false;
        }
        else
            return true;
    }
    
    //img_url
    public static function Img_Url($img_path='')
    {
        $url = \Pub\SysPara::PicDomain;
        if(!$img_path)
        {
            $img_path = 'upload/mallpro.jpg';
        }
        return $url.$img_path;
    }
    
    public static function GetStrLen($string, $sublen, $start = 0, $code = 'UTF-8')
    {
        if($code == 'UTF-8')
        {
            $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
            preg_match_all($pa, $string, $t_string);
    
            if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."..";
            return join('', array_slice($t_string[0], $start, $sublen));
        }
        else
        {
            $start = $start*2;
            $sublen = $sublen*2;
            $strlen = strlen($string);
            $tmpstr = '';
    
            for($i=0; $i<$strlen; $i++)
            {
                if($i>=$start && $i<($start+$sublen))
                {
                if(ord(substr($string, $i, 1))>129)
                {
                $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                $tmpstr.= substr($string, $i, 1);
            }
        }
    if(ord(substr($string, $i, 1))>129) $i++;
    }
    if(strlen($tmpstr)<$strlen ) $tmpstr.= "..";
    return $tmpstr;
    }
    }
    
    public static function Set_Im_Cookies($UserID)
    {
        $user=\Bll\User::Model($UserID);
        $user_info=\Bll\UserInfo::Model(71);if(1==2)$user_info=new \Model\UserInfo();
        if($user)
        {
            $str=md5($user_info->UserId().$user->LoginName().$user_info->EncodeImStr().md5($user->LoginPass()));
            Fram::SetCookies('chuanhaisoft_im_user',base64_encode($user_info->UserId().'---'.$user->LoginName().'---'.$str),365*24*3600);
        }
    }
    
    public static function Arr_To_Json($arr)
    {
        return json_encode($arr);
    }
    
    public static function Arr_To_Json_Api($Code,$Mess,$IfDie=true,$OtherPara=null)
    {
        $arr=array('Code'=>"{$Code}",'Mess'=>$Mess);
        if(is_array($OtherPara))
        {
            foreach($OtherPara as $key => $v)
            {
                $arr[$key]=$v;
            }
        }
        if($IfDie)
            die(Fram::Arr_To_Json($arr));
        else 
            return Fram::Arr_To_Json($arr);
    }
    
    public static function ToPdoArr($_arr,$DealFirstWhere=true)
    {
        $r=null;
        if(is_array($_arr[0]))
        {
            $arr=['',[]];
            for($i=0;$i<count($_arr);$i++)
            {
                if(is_array($_arr[$i]))
                {
                    $arr[0].=$_arr[$i][0];
                    if(isset($_arr[$i][1]))
                        array_push($arr[1], $_arr[$i][1]);
                }
                else
                    $arr[0].=$_arr[$i];
            }
            $r= $arr;
        }
        else
            $r=  $_arr;

        if($DealFirstWhere && substr($r[0], 0,4)==' and')
        {
            $r[0]=substr($r[0], 4);
        }
        else 
        {
            if($DealFirstWhere && substr($r[0], 0,3)==' or')
                $r[0]=substr($r[0], 3);
        }
        
        return $r;
    }
    
    //正则返回匹配
    public static function GetRegexMess($_name,$fileInfo)
    {
        $r='';$matched=array();
        $_name=str_replace("[内容]","(.*)",$_name);$_name=str_replace('/','\/',$_name);
        preg_match_all('/'.$_name.'/isU',$fileInfo,$matched);
        $r=($matched && count($matched)>=2)?$matched[1]:'';
        return $r;//str_replace("'","\'",$Return)
    }
    
    public static function IsPost() 
    {
        return (\Yaf\Dispatcher::getInstance()->getRequest()->getMethod()=='POST')?true:false;
    }
    
    public static function StrBind($str,$arr)
    {
        $r='';
        $str=explode('?', $str);
        if(count($str)>1)
        {
            $r=$str[0];
            for($i=1;$i<count($str);$i++)
            {
                $r.=((is_array($arr) && isset($arr[$i-1]))?$arr[$i-1]:'').$str[$i];
            }
        }
        else
            $r=implode('', $str);
        return $r;
    }
    
    public static function GetSuoLue($img,$size='_250x250')
    {
        $src = $img;
        if($img && strpos($img,'_')===false)
        {
            $pa = explode('.', $img);
            if(count($pa)==2)
            {
                $pa[0] .=$size;
            }
            $src = implode('.', $pa);
        }

        return $src;
    }
    

}
