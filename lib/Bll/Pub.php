<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class Pub
{

    //--user code start--
    public static function Value($PubID,$Conn=null)
    {
        return \Bll\Pub::Column($PubID,'PUB_VALUE',null,$Conn);
    }
    
    public static function Set($PubID,$Value,$Conn=null)
    {
        $m=new \Model\Pub();
        $m->PubId($PubID);
        $m->PubValue($Value);
    
        return \Dal\Pub::Update($m,$Conn);
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\Pub::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null)
	{
		return \Dal\Pub::Update($m,$Whare,$Conn);
	}
	
	public static function ForUpdate($PubId,$Conn)
	{
		return \Dal\Pub::ForUpdate($PubId,$Conn);
	}

	public static function Del($PubId,$Conn=null)
	{
		return \Dal\Pub::Del($PubId,$Conn);
	}

	public static function DelRows($PUB_IDS,$Conn=null)
	{
		return \Dal\Pub::DelRows($PUB_IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\Pub::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($PubId = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Pub::Row($PubId,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($PubId,$SqlField='*',$Whare='',$Conn=null)
	{
	    $PubId=intval($PubId);
	    if(Fram::CheckNum($PubId))
	        $Whare=["PUB_ID=?",[$PubId]];
	    return \Dal\Pub::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($PubId,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Pub::Model($PubId,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='PUB_ID desc';
	    return \Dal\Pub::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='PUB_ID desc';
	    return \Dal\Pub::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}