<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class UserLog
{

    //--user code start--
    public static function IsLoginCountLimit($UserID,$FenZhong=20)
    {
        $m=new \Model\UserLog();
        $m->UserId($UserID);
        $m->ActTime(Fram::Data_Add_Fen(-$FenZhong));
        $m->State(0);
    
        $c=\Bll\UserLog::Column(null,'count(1)', [$m->_UserId->w(),$m->_ActTime->w_and('>='),$m->_State->w_and()]);
    
        if(Fram::CheckNum($c) && $c>=10)
            return true;
        else
            return false;
    }
    
    public static function Do_Log($UserID,$Mess,$ModuleID=0,$State=0,$Conn=null,$ip=null)
    {
        $m=new \Model\UserLog();
        $m->UserId($UserID);
        $m->Mess($Mess);
        $m->ModuleId($ModuleID);
        $m->ActTime(Fram::Date());
        if($ip==null)
            $m->ActIp(Fram::GetIp());
        else
            $m->ActIp($ip);
        $m->State($State);
    
        return \Bll\UserLog::Insert($m,$Conn);
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\UserLog::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null)
	{
		return \Dal\UserLog::Update($m,$Whare,$Conn);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\UserLog::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\UserLog::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\UserLog::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\UserLog::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\UserLog::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\UserLog::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\UserLog::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\UserLog::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\UserLog::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}