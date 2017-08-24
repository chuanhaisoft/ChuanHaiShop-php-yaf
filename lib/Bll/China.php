<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class China
{

    //--user code start--
    public static function CitySort($Id)
    {
        $china=new \Model\China();$t=0;
        return \Bll\China::GetList(1, 1000,[$china->_Pid->w('=',$Id)],$t,'ID as k,NAME as v','ID asc');
    }
    
    public static function IdToName($Ids)
    {
        $r='';
        if(!is_array($Ids))
            $Ids=[$Ids];
        foreach ($Ids as $k=>$v)
        {
            if(\Pub\Fram::CheckNum($v))
            {
                $m=\Bll\China::Model($v);
                if($m)
                    $r.=$m->Name();
            }
        }
        return $r;
    }
    
    public static function Ip_To_CityID($ip=null)
    {
        if($ip==null)
            $ip=\Pub\Fram::GetIp();
        $City= array('ID'=>370200,'NAME'=>'青岛市');
        $Info=file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip={$ip}");
        $Info=json_decode($Info,true);
        if($Info && isset($Info['city']))
        {
            $m=new \Model\China();
            $Cityrow=\Bll\China::Model(null,[$m->_Name->w('like',"{$Info['city']}%")]);
            if($City)
            {
                $City['ID']=$Cityrow->Id();
                $City['ID']=$Cityrow->Name();
            }
                
            if(!is_numeric($City['ID']))
                $City= array('ID'=>370200,'NAME'=>'青岛市');
        }
        return $City;
    }
    
    public static function Get_City()
    {
        $City = array(); 
        
        if(isset($_COOKIE["cityid"]))
        {
            $City['ID'] = $_COOKIE["cityid"];
            $City['NAME'] = $_COOKIE["cityname"];
        }else{
            $City = \Bll\China::Ip_To_CityID();
            setcookie("cityid",$City['ID'],0,'/');
            setcookie("cityname",$City['NAME'],0,'/');
        }
        
        return $City;
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\China::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
		return \Dal\China::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function UpdateWhere($m,$Whare,$Conn=null,$_IfRowCount=true)
	{
		return \Dal\China::UpdateWhere($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\China::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null,$Whare='')
	{
		return \Dal\China::Del($Id,$Conn,$Whare);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\China::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\China::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\China::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\China::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\China::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\China::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\China::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}