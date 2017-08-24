<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class NewsInfo
{

    //--user code start--
    public static function RepairItem($NewsId)
    {
        $r=false;
        $t=self::Column($NewsId,'count(1)');
        if($t>0)
        {
            $r=true;
        }
        else
        {
            $m=new \Model\NewsInfo();
            $m->NewsId($NewsId);
            $r=$m->Insert();
        }
        return $r;
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\NewsInfo::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=false)
	{
		return \Dal\NewsInfo::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($NewsId,$Conn)
	{
		return \Dal\NewsInfo::ForUpdate($NewsId,$Conn);
	}

	public static function Del($NewsId,$Conn=null)
	{
		return \Dal\NewsInfo::Del($NewsId,$Conn);
	}

	public static function DelRows($NEWS_IDS,$Conn=null)
	{
		return \Dal\NewsInfo::DelRows($NEWS_IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\NewsInfo::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($NewsId = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\NewsInfo::Row($NewsId,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($NewsId,$SqlField='*',$Whare='',$Conn=null)
	{
	    $NewsId=intval($NewsId);
	    if(Fram::CheckNum($NewsId))
	        $Whare=["NEWS_ID=?",[$NewsId]];
	    return \Dal\NewsInfo::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($NewsId,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\NewsInfo::Model($NewsId,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='NEWS_ID desc';
	    return \Dal\NewsInfo::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='NEWS_ID desc';
	    return \Dal\NewsInfo::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}