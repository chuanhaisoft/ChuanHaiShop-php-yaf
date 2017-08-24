<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class ProMess
{

    //--user code start--
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\ProMess::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\ProMess::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\ProMess::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\ProMess::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\ProMess::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\ProMess::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\ProMess::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\ProMess::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\ProMess::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\ProMess::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\ProMess::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}