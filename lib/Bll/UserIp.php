<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class UserIp
{

    //--user code start--
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\UserIp::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null)
	{
		return \Dal\UserIp::Update($m,$Whare,$Conn);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\UserIp::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\UserIp::Del($Id,$Conn);
	}

	public static function DelRows($idS,$Conn=null)
	{
		return \Dal\UserIp::DelRows($idS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\UserIp::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\UserIp::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["id=?",[$Id]];
	    return \Dal\UserIp::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\UserIp::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='id desc';
	    return \Dal\UserIp::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='id desc';
	    return \Dal\UserIp::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}