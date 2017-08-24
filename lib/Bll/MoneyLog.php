<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class MoneyLog
{

    //--user code start--
    public static function DoLog($UserId,$Money,$Mess,$ModuleId=null,$Conn=null,$Point=null,$Talk_Time=null,$MessID=null,$CaiWuID=null,$MessageCount=null,$LeftMoney=null,$RightMoney=null,$Shi=null)
    {
        $m=new \Model\MoneyLog();
        $m->Money($Money);
        if(is_numeric($Point))
            $m->Point($Point);
        if(is_numeric($Talk_Time))
            $m->TalkTime($Talk_Time);
        if(is_numeric($MessageCount))
            $m->MessageCount($MessageCount);
        if(is_numeric($MessID))
            $m->MessId($MessID);
        $m->UserId($UserId);
        if(is_numeric($LeftMoney))
            $m->LeftMoney($LeftMoney);
        if(is_numeric($RightMoney))
            $m->RightMoney($RightMoney);
        $m->ActTime(Fram::Date());
        $m->Mess($Mess);
        if($ModuleId)
            $m->ModuleId($ModuleId);
        
        if(is_numeric($Shi))
            $m->Shi($Shi);
         
        if(self::Insert($m,$Conn))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\MoneyLog::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
		return \Dal\MoneyLog::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\MoneyLog::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\MoneyLog::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\MoneyLog::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\MoneyLog::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\MoneyLog::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\MoneyLog::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\MoneyLog::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\MoneyLog::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\MoneyLog::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}