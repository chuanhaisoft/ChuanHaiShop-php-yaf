<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class Tree
{

    //--user code start--
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\Tree::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null)
	{
		return \Dal\Tree::Update($m,$Whare,$Conn);
	}
	
	public static function ForUpdate($TreeId,$Conn)
	{
		return \Dal\Tree::ForUpdate($TreeId,$Conn);
	}

	public static function Del($TreeId,$Conn=null)
	{
		return \Dal\Tree::Del($TreeId,$Conn);
	}

	public static function DelRows($TREE_IDS,$Conn=null)
	{
		return \Dal\Tree::DelRows($TREE_IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\Tree::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($TreeId = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Tree::Row($TreeId,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($TreeId,$SqlField='*',$Whare='',$Conn=null)
	{
	    $TreeId=intval($TreeId);
	    if(Fram::CheckNum($TreeId))
	        $Whare=["TREE_ID=?",[$TreeId]];
	    return \Dal\Tree::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($TreeId,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Tree::Model($TreeId,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='TREE_ID desc';
	    return \Dal\Tree::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='TREE_ID desc';
	    return \Dal\Tree::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}