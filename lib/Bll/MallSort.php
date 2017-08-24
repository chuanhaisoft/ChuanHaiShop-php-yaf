<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class MallSort
{

    //--user code start--
    public static function GetLevel($ID)
    {
        $level = 0;
         
        if($ID>=0){
            $sort_info = self::Model($ID);
            if($sort_info->ParentId()==0)
            {
    
                $level = 1;
    
            }
            else
            {
                $sort_info = self::Model($sort_info->ParentId());
                if($sort_info->ParentId()==0)
                {
    
                    $level = 2;
    
                }else{
                    $level = 3;
                }
            }
        }
    
        return $level;
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\MallSort::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\MallSort::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\MallSort::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\MallSort::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\MallSort::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\MallSort::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\MallSort::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\MallSort::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\MallSort::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\MallSort::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\MallSort::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}