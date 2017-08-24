<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class Role
{

    //--user code start--
    public static function Role_Id_Shop($act='or')
    {
        if(is_numeric($act))
        {
            if($act==73)//79 || $act==80 || $act==81 || $act==201
                return true;
            else
                return false;
        }
        else
            return 'ROLE_ID=73';//"(ROLE_ID=79 {$act} ROLE_ID=80 {$act} ROLE_ID=81 {$act} ROLE_ID=201)";
    }
    public static function Role_Id_User($act='or')
    {
        if(is_numeric($act))
        {
            if($act==72)
                return true;
            else
                return false;
        }
        else
            return 'ROLE_ID=72';
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\Role::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null)
	{
		return \Dal\Role::Update($m,$Whare,$Conn);
	}
	
	public static function ForUpdate($RoleId,$Conn)
	{
		return \Dal\Role::ForUpdate($RoleId,$Conn);
	}

	public static function Del($RoleId,$Conn=null)
	{
		return \Dal\Role::Del($RoleId,$Conn);
	}

	public static function DelRows($ROLE_IDS,$Conn=null)
	{
		return \Dal\Role::DelRows($ROLE_IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\Role::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($RoleId = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Role::Row($RoleId,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($RoleId,$SqlField='*',$Whare='',$Conn=null)
	{
	    $RoleId=intval($RoleId);
	    if(Fram::CheckNum($RoleId))
	        $Whare=["ROLE_ID=?",[$RoleId]];
	    return \Dal\Role::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($RoleId,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Role::Model($RoleId,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ROLE_ID desc';
	    return \Dal\Role::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ROLE_ID desc';
	    return \Dal\Role::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}