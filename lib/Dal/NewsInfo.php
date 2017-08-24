<?php 
namespace Dal;
use \Pub\Data;
use \Pub\Fram;
use \Pub\SysFram;

class NewsInfo
{

    //--user code start--
	
	//--user code end--

	public static function TableName()
	{
		return "news_info";
	}

	public static function ViewName()
	{
		return "news_info";
	}

	public static function Insert($m,$Conn=null)
	{
	    $IsMyCat=\Pub\SysPara::IfMyCat;
    	if(!$m->_NewsId->Changed)
    	   $m->NewsId($IsMyCat?'next value for MYCATSEQ_NEWS_INFO':-1);
    	$Sql=SysFram::AutoSql($m,self::TableName(),1);
	    return Data::Insert($Sql[0],$Sql[1],$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=false)
	{
	    if(!Fram::CheckNum($m->NewsId()))
	        return false;
	    $Sql=SysFram::AutoSql($m,self::TableName(),2);
	    if(is_array($Whare))
	    {
	        $Whare=Fram::ToPdoArr($Whare);
    	    $Sql[0].=" and ({$Whare[0]})";
    	    $Sql[1]=array_merge($Sql[1],$Whare[1]);
	    }
	    else
	    {
    	    if($Whare && strlen($Whare)>0)
    	        $Sql[0].=" and ({$Whare})";
	    }
		return Data::Execute($Sql[0],$Sql[1],$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($NewsId,$Conn)
	{
	    $NewsId=intval($NewsId);
		return Data::Execute("select * from ".self::TableName()." where NEWS_ID= ? for UPDATE",[$NewsId],$Conn);
	}

	public static function Del($NewsId,$Conn=null)
	{
	    $NewsId=intval($NewsId);
		$Sql="delete from ".self::TableName()." where NEWS_ID= ?";
		return Data::Execute($Sql,[$NewsId],$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
	    $r=true;
	    if(is_array($IDS))
	    {
	        $Conn=\Pub\Fram::GetConn(true);
	        for($i=0;$i<count($IDS);$i++)
	        {
	            $Sql='delete from '.self::TableName().' where NEWS_ID = ?';
	            $r=$r && Data::Execute($Sql,[$IDS[$i]],$Conn);
	        }
	        if($r)
	            $Conn->commit();
	        else
	            $Conn->rollBack();
	        
	        \Pub\Fram::CloseConn($Conn);
	    }
	    else
	        $r=false;
		
		return $r;
	}

	public static function DelWhere($Whare,$Conn=null)
	{
	    if(is_array($Whare))
	    {
	        $Whare=Fram::ToPdoArr($Whare);
    		$Sql="delete from ".self::TableName()." where {$Whare[0]}";
    		return Data::Execute($Sql,$Whare[1],$Conn);
	    }
		else 
		    return false;
	}

	public static function Column($SqlField,$Whare,$Conn=null)
	{
		if(!$SqlField)
		{
			$SqlField = " * ";
		}
		$SqlField=SysFram::SqlCheck($SqlField);
		if(is_array($Whare))
		{
		    $Whare=Fram::ToPdoArr($Whare);
		    $Sql="select $SqlField from ".self::ViewName()." where {$Whare[0]}";
		    return Data::Execute_Column($Sql,$Whare[1],$Conn);
		}
		else
		{
		    $Sql="select $SqlField from ".self::ViewName()." where {$Whare}";
		    return Data::Column($Sql,$Conn);
		}
	}

	public static function Row($NewsId,$SqlField = "*",$Whare = "" ,$Conn=null,$ForUpdate=false)
	{
	    $row=null;
	    $NewsId=intval($NewsId);
		if(!$SqlField || $SqlField=='')
		{
			$SqlField = " * ";
		}
		$SqlField=SysFram::SqlCheck($SqlField);
		if($NewsId>0)
		{
			$Sql="select $SqlField from ".self::ViewName()." where NEWS_ID = '{$NewsId}' limit 1";
			if($Conn && $ForUpdate)
		      $Sql=$Sql.' for UPDATE';
		    $row=Data::Row($Sql,$Conn);
		}
		else
		{
		    if(is_array($Whare))
		    {
		        $Whare=Fram::ToPdoArr($Whare);
		        $Sql="select $SqlField from ".self::ViewName()." where {$Whare[0]} limit 1";
    			if($Conn && $ForUpdate)
    		      $Sql=$Sql.' for UPDATE';
    		    $row=Data::Execute_Fetch($Sql,$Whare[1],$Conn);
		    }
		    else
		    {
		        $Sql="select $SqlField from ".self::ViewName()." where {$Whare} limit 1";
    			if($Conn && $ForUpdate)
    		      $Sql=$Sql.' for UPDATE';
    		    $row=Data::Row($Sql,$Conn);
		    }
		}
		return $row;
	}

	public static function Model($NewsId,$Where = "",$Conn=null,$ForUpdate=false)
	{
	    $m=false;
	    $dr=self::Row($NewsId,"*",$Where,$Conn,$ForUpdate);
	    if($dr)
	    {
	       	$m=new \Model\NewsInfo();
	        SysFram::RowToModel($m,$dr);
	    }
		return $m;
	}

	public static function GetList($_PageNum,$_PageSize,&$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn=null)
	{
		$_PageNum--;
		$_PageSize=intval($_PageSize);
		if(!Fram::IsNotEmpty($_Fields))
		{
			$_Fields = " * ";
		}
		$_Fields=SysFram::SqlCheck($_Fields);
		if(!is_array($_Where) && Fram::IsNotEmpty($_Where))
		{
			$_Where="where {$_Where}";
		}
		if(Fram::IsNotEmpty($_OrderBy))
		{
		    $_OrderBy=SysFram::SqlCheck($_OrderBy);
			$_OrderBy="order by {$_OrderBy}";
		}
		if(is_array($_Where))
		{
		    $_Where=Fram::ToPdoArr($_Where);	    
		    if(Fram::IsNotEmpty($_Where[0]))
		      $_Where[0]="where {$_Where[0]}";
		    $_RecordCount=Data::Execute_Column("select count(1) from ".self::TableName()." $_Where[0]",$_Where[1],$Conn);
			$Sql="select $_Fields from ".self::ViewName()." {$_Where[0]} {$_OrderBy} limit ".$_PageNum*$_PageSize.",{$_PageSize}";
		    return Data::Execute_FetchAll($Sql,$_Where[1],$Conn);
		}
		else
		{
		    $_RecordCount=Data::Column("select count(1) from ".self::TableName()." $_Where",$Conn);
			$Sql="select $_Fields from ".self::ViewName()." {$_Where} {$_OrderBy} limit ".$_PageNum*$_PageSize.",{$_PageSize}";
		    return Data::Rows($Sql,$Conn);
		}

	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,&$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn=null)
	{
	    $_PageSize=intval($_PageSize);
	    $_LastID=intval($_LastID);
		if(!Fram::IsNotEmpty($_Fields))
		{
			$_Fields = " * ";
		}
		$_Fields=SysFram::SqlCheck($_Fields);
		if(!is_array($_Where) && Fram::IsNotEmpty($_Where))
		{
			$_Where="where {$_Where}";
		}
		if(Fram::IsNotEmpty($_OrderBy))
		{
		    $_OrderBy=SysFram::SqlCheck($_OrderBy);
			$_OrderBy="order by {$_OrderBy}";
		}
		
		if(is_array($_Where))
		{
		    $_Where=Fram::ToPdoArr($_Where);	    
		    if(Fram::IsNotEmpty($_Where[0]))
		      $_Where[0]="where {$_Where[0]}";
    		$_Where[0].=(strlen($_Where[0])>0)?" and NEWS_ID>{$_LastID}":"NEWS_ID>{$_LastID}";
    		$_RecordCount=Data::Execute_Column("select count(1) from ".self::TableName()." {$_Where[0]}",$_Where[1],$Conn);
			$Sql="select $_Fields from ".self::ViewName()." {$_Where[0]} {$_OrderBy} limit 0,{$_PageSize}";
    		return Data::Execute_FetchAll($Sql,$_Where[1],$Conn);
		}
		else
		{
		    $_Where.=($_Where && strlen($_Where)>0)?" and NEWS_ID>{$_LastID}":"NEWS_ID>{$_LastID}";
    		$_RecordCount=Data::Column("select count(1) from ".self::TableName()." {$_Where}");
    		$Sql="select $_Fields from ".self::ViewName()." {$_Where} {$_OrderBy} limit 0,{$_PageSize}";
    		return Data::Rows($Sql,$Conn);
		}
	}
}