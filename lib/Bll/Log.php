<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class Log
{

    //--user code start--
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\Log::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null)
	{
		return \Dal\Log::Update($m,$Whare,$Conn);
	}
	
	public static function ForUpdate($LogId,$Conn)
	{
		return \Dal\Log::ForUpdate($LogId,$Conn);
	}

	public static function Del($LogId,$Conn=null)
	{
		return \Dal\Log::Del($LogId,$Conn);
	}

	public static function DelRows($LOG_IDS,$Conn=null)
	{
		return \Dal\Log::DelRows($LOG_IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\Log::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($LogId = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Log::Row($LogId,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($LogId,$SqlField='*',$Whare='',$Conn=null)
	{
	    $LogId=intval($LogId);
	    if(Fram::CheckNum($LogId))
	        $Whare=["LOG_ID=?",[$LogId]];
	    return \Dal\Log::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($LogId,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Log::Model($LogId,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='LOG_ID desc';
	    return \Dal\Log::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='LOG_ID desc';
	    return \Dal\Log::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}