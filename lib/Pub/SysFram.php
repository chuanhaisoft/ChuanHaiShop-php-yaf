<?php
namespace Pub;
class SysFram
{
	public static function CheckAdminUser($UserName,$PassWord,$IsCheckPassWord=true,$IsChangeRole=-1)
	{
		$Mess= false;
		$PassWord2=$PassWord;
		//$PassWord = md5($PassWord);
		$w=['LOGIN_NAME=? and STATE=1',[$UserName]];

		$dr = \Bll\User::Row(null,$w);
		if($dr)
		{
		    if(\Bll\UserLog::IsLoginCountLimit($dr["ID"]))
		        Fram::Arr_To_Json_Api(0, '由于重试次数过多，已被限制登录15分钟，请稍后再试。');
		}

		if($dr)
		{
		    if($dr["LOGIN_PASS"]!=$PassWord && $dr["LOGIN_PASS"]!=$PassWord2 && $IsCheckPassWord)
		    {
		        \Bll\UserLog::Do_Log($dr["ID"], "用户登录失败",\Bll\M::User_Login(),0);
		        return $Mess;
		    }

			$Mess = true;
			$IsSave10=Fram::GetNumValue('save10day',-1);
			$expire=0;
			if($IsSave10==1)
			{
			    $expire=24 * 3600 * 10;
			}
			
			Fram::SetSession("SysAdminID",$dr["ID"]);
			Fram::SetSession("SysLoginName",$dr["NAME"]);
			Fram::SetSession("SysRoleID",$dr["ROLE_ID"]);
			
			//msg
			//if($IsCheckPassWord)
			//     Fram::SetCookies('chuanhaisoft_im_user',base64_encode('71'.'---'.$dr["LOGIN_NAME"].'---'.$PassWord2),365*24*3600);

			Fram::SetCookies("cSys001",Encrypt::CommonEncode($dr["ID"]),$expire);
			Fram::SetCookies("cSys002",Encrypt::PassWordEncode2($dr["ID"].'hTtP://wWw.YunhUatOng.coM'.$dr["LOGIN_PASS"]),$expire);
			\Bll\UserLog::Do_Log($dr["ID"], "用户登录成功",\Bll\M::User_Login(),1);
		}
		else
		{
		    \Bll\UserLog::Do_Log(0, "无此用户:{$UserName}",\Bll\M::User_Login(),0);
		}
		return $Mess;
	}

	public static function IsAct()
	{
	    self::CheckAdminLogin();
	    $v=Fram::GetSession('SysIsAct');
	    return (isset($v) && $v>0)?true:false;
	}


	//恢复session
	public static function CheckAdminLogin($IsDie=true)
	{
		if(!Fram::GetSession("SysAdminID") || strlen(Fram::GetSession("SysRoleID"))<1 || !Fram::GetSession("SysRoleID") )
		{
		    self::RePairUserState();
		    if((!Fram::GetSession("SysAdminID") || strlen(Fram::GetSession("SysRoleID"))<1) && $IsDie)
		    {
		        self::LogOut();
		        die(Js::AlertLocation("未登录","/chuanhai-login.shtml",true));
		    }
		    if((!Fram::GetSession("SysAdminID") || strlen(Fram::GetSession("SysRoleID"))<1) && !$IsDie)
		        return false;
		}
		else 
		   return true;
	}

	public static function CheckPagePower($PageID)
	{
	    self::RePairUserState();
	    $Powers=\Bll\Role::Column(null,'POWER_LIST', ['ROLE_ID=?',[self::getLoginRoleID()]]);

	    if(!is_numeric($PageID))
	    {
	        $IsOk=false;
	        $Ids=explode(',', $PageID);
	        for($i=0;$i<count($Ids);$i++)
	        {
	            $Index=strpos($Powers,",".$Ids[$i].",");
	            if($Index===false)
	            {

	            }
	            else
	            {
	                $IsOk=true;
	                break;
	            }
	        }
	        if($IsOk==false)
	        {
	            die('无权访问');
	        }
	    }
	    else
	    {
	        $Index=strpos($Powers,",{$PageID},");
	        if($Index===false)
	        {
	            die('无权访问');
	        }
	    }

	}
	//app检测登陆()
	public static function CheckTelUser($UserName,$PassWord)
	{
		$Mess= false;
		$_POST['sys']=null;
		$PassWord = Encrypt::PassWordEncode($UserName.$PassWord);
		$dr = \Bll\User::Row(null,['LOGIN_NAME=?',[$UserName]]);
		if($dr)
		{
			//判断签名
			$Arr=$_POST;
			//print_r($Arr);
			$Sign = $_POST['powersign'];
			$Arr2=array();
			foreach ($Arr as $key => $value)
			{
				if($key != 'powersign')
					array_push($Arr2,$key.'='.urlencode($value));
			}
			//$Arr=array_splice($Arr,array_search('powersign',$Arr),1);
			sort($Arr2);
			////print_r($Arr2);
			////print_r($_POST);
			//循环组串加密
			$Str='';$i=0;
			$Str=implode("&", $Arr2);
			////print_r($Str.Encrypt::CommonDecode($dr['USER_PASS']));
			//print_r("**********".$Str.Encrypt::CommonDecode($dr['USER_PASS']));
			$Str1=self::PassWordEncode($Str.Encrypt::CommonDecode($dr['LOGIN_PASS']));
			$Str2=self::PassWordEncode($Str.$dr['LOGIN_NAME'].$dr['LOGIN_PASS']);
			//print_r("**********".$Str);
			if($Sign != $Str1 && $Sign != $Str2)
			{
				Fram::Arr_To_Json_Api(0, '用户名或密码签名错误!!!');
				//'{"Code":"0","Msg":"用户名或密码签名错误['.$_POST['tellto'].'**'.implode("&", $Arr2).Encrypt::CommonDecode($dr['USER_PASS']).']#####'.$Sign.'#####'.$Str.'！！！"}'
			}
			$Mess = true;
			$_POST['sys']['user']=$dr;
		}
		return $Mess;
	}
	//web api
	public static function CheckWebApiSign($MobileNum,$Key,$Id)
	{
		$Mess= false;
		$_POST['sys']=null;
		$dr = \Bll\ApiUser::Row(null,["NAME=?",[$MobileNum]]);
		if($dr && $dr['PASS'])
		{
			//判断签名
			$Arr=$_POST;
			//print_r($Arr);
			$Sign = $_POST['key'];
			$Arr2=array();
			foreach ($Arr as $key => $value)
			{
				if($key != 'key' && $key != 'sys')
					array_push($Arr2,$key.'='.urlencode($value));
			}
			sort($Arr2);
			//循环组串加密
			$Str='';$i=0;
			$Str=implode("&", $Arr2);
			$Str=md5($Str.$dr['PASS']);
			//print_r("**********".$Str);
			if($Sign != $Str)
			{
				Fram::Arr_To_Json_Api(0, '用户名或签名错误!!!');
				//'{"Code":"0","Msg":"用户名或密码签名错误['.$_POST['tellto'].'**'.implode("&", $Arr2).Encrypt::CommonDecode($dr['USER_PASS']).']#####'.$Sign.'#####'.$Str.'！！！"}'
			}
			else
			{
			    $Powers=$dr['POWERS'];
			    $Index=strpos($Powers,",".$Id.",");
			    if($Index===false)
			    {
			        Fram::Arr_To_Json_Api(0, '用户无此项目权限!!!');
			    }
			}
			//IP判断
			if($dr['API_SERVER_IP'] && strlen($dr['API_SERVER_IP'])>0)
			{
			    if(!Fram::CheckNum(strpos(",".$dr['API_SERVER_IP'].",",",".Fram::GetIp().",") ,true))
			        Fram::Arr_To_Json_Api(0, 'ip无权限');
			}
			$Mess = true;
			$_POST['sys']['user']=\Bll\User::Row($dr['USER_ID']);
			$_POST['sys']['user']['API_USER_ID']=$dr['ID'];
		}
		else
		{
		    Fram::Arr_To_Json_Api(0, '无此api用户!!!。');
		}
		return $Mess;
	}


	public static function PassWordEncode($Str)
	{
		$Str=$Str.'w9&0n1v*0s-8l';
		$str2=md5($Str);
		//$str=sha1($str."I5,Q6p2j@1");
		$str2=md5($str2."0#j0^*3)M($4@2#8!9");
		return $str2;
	}
	//退出登录
	public static function LogOut()
	{
		if(!isset($_SESSION))
		      session_start();
      	session_destroy();
      	Fram::SetCookies("cSys001","");
      	Fram::SetCookies("cSys002","");
	}

	//cookies恢复
	public static function RePairUserState()
	{
		if(!Fram::GetSession("SysAdminID") || strlen(Fram::GetSession("SysAdminID"))<1)
		{
			$cuSys001= isset($_COOKIE["cSys001"])?$_COOKIE["cSys001"]:null;
			$cuSys001 = Encrypt::CommonDecode($cuSys001);
			$cuSys001=Fram::StrCheck($cuSys001);
			$cuSys002FromCookies= isset($_COOKIE["cSys002"])?$_COOKIE["cSys002"]:null;
			//die($cuSys002FromCookies);
			if(isset($cuSys001)&& isset($cuSys002FromCookies))
			{
				$model= new \Model\User();
				$model=\Bll\User::Model($cuSys001);
				//$dr["ID"].'hTtP://wWw.YunHuAToNg.cOM'.$dr["USER_PASS"]
				$cuSys002=Encrypt::PassWordEncode2($cuSys001.'hTtP://wWw.YunhUatOng.coM'.$model->LoginPass());
				if($cuSys002 == $cuSys002FromCookies)
				{
					self::CheckAdminUser($model->LoginName(),$model->LoginPass(),false);
				}
				else 
				{
				    //登录错误次数限制
				}
			}
		}
	}

	public static function UserIsLogin()
	{
		$rev=false;
		self::RePairUserState();
		if(Fram::GetSession("SysAdminID") && strlen(Fram::GetSession("SysAdminID"))>1)
		{
			$rev=true;
		}
		return $rev;
	}

	public static function GetAdminUser()
	{
		$ShopID=-1;
		self::RePairUserState();
		$tmp = Fram::GetSession("SysAdminID");
		if($tmp)
		{
			$ShopID = $tmp;
		}
		else
		{
			die("用户信息超时,请重新打开页面");
		}
		return $ShopID;
	}

	public static function ToClientJs($__Page,$_Mark,$_Js)
	{
		//TPage::getClientScript()->registerEndScript("ddd0000","alert('用户名或密码为空')");
		//TControl::getPage()->getClientScript()->registerEndScript($_Mark,$_Js);
		$__Page->getPage()->getClientScript()->registerEndScript($_Mark,$_Js);
	}

	private static function AutoAddSql($model,$AutoKey,$TableName)
	{
		$FiledStr = "";
		$ValueStr = "";
		$Sql=['',[]];
		$i=false;
		foreach($model as $Filed => $Value)
		{
		    if(substr($Filed, 0,2)=='__')
		        continue;
			if($Value->Changed && Fram::IsNotEmpty($Value->k) && ($Value->k != $AutoKey || ($Value->k == $AutoKey && $Value->v!=-1)))
			{
				$FiledStr .= ($i?',':'').$Value->k;
				$ValueStr .= ($i?',':'').' ? ';
				array_push($Sql[1], $Value->v);
				$i=true;
			}
		}
		$Sql[0]="insert into `$TableName`($FiledStr)values($ValueStr)";
		return $Sql;
	}

	public static function AutoSql2($model,$TableName)
	{
		$FiledStr = "";
		$ValueStr = "";
		$Sql=['',[]];
		$i=false;
		foreach($model as $Filed => $Value)
		{
		    if(substr($Filed, 0,2)=='__')
		        continue;
			if($Value->Changed && Fram::IsNotEmpty($Value->k))
			{
				$FiledStr .= ($i?',':'').$Value->k;
				if(!$Value->AutoKey)
				{
				    $ValueStr .= ($i?',':'').' ? ';
				    array_push($Sql[1], $Value->v);
				}
				else 
				{
				    $ValueStr .= ($i?',':'').' '.Fram::StrCheck($Value->v,true,true,true,true,true,true).' ';
				}
				$i=true;
			}
		}
		$Sql[0]="insert into `$TableName`($FiledStr)values($ValueStr)";
		return $Sql;
	}
	
	public static function RowToModel(&$m,$row)
	{
		foreach($m as $Filed => $Value)
	    {
	        if(isset($Value->k) && isset($row[$Value->k]))
	        {
	            $Value->v=$row[$Value->k];
	        }
	    }
	    //return $m;
	}

	private static function AutoUpdateSql($model,$AutoKey,$KeyValue,$TableName)
	{
		//$TableName=$model->gTableName();
		$FiledStr = "";
		$Sql=['',[]];
		$i=false;
		foreach($model as $Filed => $Value)
		{
		    if(substr($Filed, 0,2)=='__')
		        continue;
			if($Value->Changed && $Value->k != $AutoKey)
			{
			    if(!is_array($Value->v))
			    {
			        $FiledStr .= ($i?',':'').$Value->k . '= ? ';
			        array_push($Sql[1], $Value->v);
			    }
				else 
				{
				    $FiledStr .= ($i?',':'').$Value->k . '='.$Value->k.$Value->v[0]. ' ? ';
				    array_push($Sql[1], $Value->v[1]);
				}
				$i=true;
			}
		}
		if(Fram::IsNotEmpty($FiledStr))
		{
			$FiledStr = substr($FiledStr,0,(strlen($FiledStr)-1));
		}
		if($KeyValue!='ChuanHai_Update_W_key')
		{
		    $Sql[0]="update `$TableName` set $FiledStr where $AutoKey = ?";
		    array_push($Sql[1], $KeyValue);
		}
		else 
		{
		    $Sql[0]="update `$TableName` set $FiledStr";
		}
		return $Sql;
	}

	public static function TypeGetFieldBody($Type,$Value,$pmodel=null)
	{
	    if($pmodel && $pmodel->AutoKey)
	    {}
	    else 
	    {
	        if(is_array($Value))
	        {
	            $Value=$pmodel->k.$Value[0]."'".SysFram::SqlCheck($Value[1])."'";
	        }
	        else
	        {
	            $Value="'".SysFram::SqlCheck($Value)."'";
	        }
	    }

		return $Value;
	}
	
	public static function SqlCheck($v)
	{	
	    return $v;
	    //if($v==null)
	    //    return null;
	    //return addslashes($v);
	}

	public static function Check_mysql_field_is_number($Type)
	{
	    if($Type== "int" || $Type== "bigint" || $Type== "double" || $Type== "decimal" || $Type== "bit" || $Type== "float" || $Type== "tinyint" || $Type== "smallint" || $Type== "integer" || $Type== "mediumint")
	        return true;
	    else
	        return false;
	}

	public static function getLoginRoleID()
	{
	    self::CheckAdminLogin();
		return $_SESSION["SysRoleID"];
	}

	public static function getLoginRoleName()
	{
	    self::CheckAdminLogin();
	    return \Bll\Role::Column(self::getLoginRoleID(),'ROLE_NAME');
	}

	public static function GetLoginID($IfDie=true)
	{
		$ShopID=-1;
		self::CheckAdminLogin($IfDie);
		$tmp = Fram::GetSession("SysAdminID");
		if($tmp)
		{
			$ShopID = $tmp;
		}
		else
		{
		    if($IfDie)
			    die("用户信息超时,请重新打开页面");
		    else 
		        return false;
		}
		return $ShopID;
	}

	public static function GetLoginName($UserID=-1)
	{
	    $ShopID=-1;
	    self::CheckAdminLogin();
	    $tmp = Fram::GetSession("SysAdminID");
	    if($tmp)
	    {
	        if($UserID==-1)
	           $ShopID = $tmp;
	        else
	           $ShopID = \Bll\User::GetNameByID($UserID);
	    }
	    else
	    {
	        die("用户信息超时,请重新打开页面");
	    }
	    return $ShopID;
	}
    //$Type: 1:insert;2:update
	public static function AutoSql($model,$TableName,$Type=1)
	{
		$AutoKey = $model->Get_Key_Name();
		$_key = '_'.Fram::FormatName($AutoKey);
		$KeyValue = $model->$_key->v;
		$model = (array)$model;
/**
		if(!is_numeric($KeyValue))
		{
		    return self::AutoSql2($model,$TableName);
		}
**/
		if($Type==1)
		{
			return self::AutoAddSql($model,$AutoKey,$TableName);
		}
		else
		{
		    return self::AutoUpdateSql($model,$AutoKey,$KeyValue,$TableName);
		}
	}

	public static function ConvertFieldName($__FieldName)
	{
		$__FieldName = strtolower($__FieldName);
		$__FieldName = strtr($__FieldName,"_"," ");
		$__FieldName=ucwords($__FieldName);
		$__FieldName="_".str_replace(" ","",$__FieldName);
		return $__FieldName;
	}

}
