<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class UserInfo
{

    //--user code start--
    public static function GetToken_UserID($ID)
    {
        $r=null;
        $u=\Bll\UserInfo::Model($ID);
        if($u)
        {
            $r=$u->Token();
        }
        return $r;
    }
    public static function GetToken_OpenID($OpenID)
    {
        $ID=\Bll\User::OpenID_To_UserID($OpenID);
        $r=null;
        if(\Pub\Fram::CheckNum($ID))
        {
            $u=\Bll\UserInfo::Model($ID);
            if($u)
            {
                $r=$u->Token();
            }
        }
        return $r;
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\UserInfo::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=false)
	{
		return \Dal\UserInfo::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($UserId,$Conn)
	{
		return \Dal\UserInfo::ForUpdate($UserId,$Conn);
	}

	public static function Del($UserId,$Conn=null)
	{
		return \Dal\UserInfo::Del($UserId,$Conn);
	}

	public static function DelRows($USER_IDS,$Conn=null)
	{
		return \Dal\UserInfo::DelRows($USER_IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\UserInfo::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($UserId = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\UserInfo::Row($UserId,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($UserId,$SqlField='*',$Whare='',$Conn=null)
	{
	    $UserId=intval($UserId);
	    if(Fram::CheckNum($UserId))
	        $Whare=["USER_ID=?",[$UserId]];
	    return \Dal\UserInfo::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($UserId,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\UserInfo::Model($UserId,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='USER_ID desc';
	    return \Dal\UserInfo::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='USER_ID desc';
	    return \Dal\UserInfo::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}