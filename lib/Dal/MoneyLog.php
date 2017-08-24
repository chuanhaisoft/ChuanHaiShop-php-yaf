<?php 
namespace Dal;
use \Pub\Data;
use \Pub\Fram;
use \Pub\SysFram;

class MoneyLog
{

    //--user code start--
	
	//--user code end--

	public static function TableName()
	{
		return "money_log";
	}

	public static function ViewName()
	{
		return "money_log";
	}

	public static function Insert($m,$Conn=null)
	{
	    $IsMyCat=\Pub\SysPara::IfMyCat;
    	if(!$m->_Id->Changed)
    	   $m->Id($IsMyCat?'next value for MYCATSEQ_MONEY_LOG':-1);
    	$Sql=SysFram::AutoSql($m,self::TableName(),1);
	    return Data::Insert($Sql[0],$Sql[1],$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    if(!Fram::CheckNum($m->Id()))
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
	
	public static function ForUpdate($Id,$Conn)
	{
	    $Id=intval($Id);
		return Data::Execute("select * from ".self::TableName()." where ID= ? for UPDATE",[$Id],$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
	    $Id=intval($Id);
		$Sql="delete from ".self::TableName()." where ID= ?";
		return Data::Execute($Sql,[$Id],$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
	    $r=true;
	    if(is_array($IDS))
	    {
	        $Conn=\Pub\Fram::GetConn(true);
	        for($i=0;$i<count($IDS);$i++)
	        {
	            $Sql='delete from '.self::TableName().' where ID = ?';
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

	public static function Row($Id,$SqlField = "*",$Whare = "" ,$Conn=null,$ForUpdate=false)
	{
	    $row=null;
	    $Id=intval($Id);
		if(!$SqlField || $SqlField=='')
		{
			$SqlField = " * ";
		}
		$SqlField=SysFram::SqlCheck($SqlField);
		if($Id>0)
		{
			$Sql="select $SqlField from ".self::ViewName()." where ID = '{$Id}' limit 1";
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

	public static function Model($Id,$Where = "",$Conn=null,$ForUpdate=false)
	{
	    $m=false;
	    $dr=self::Row($Id,"*",$Where,$Conn,$ForUpdate);
	    if($dr)
	    {
	       	$m=new \Model\MoneyLog();
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
    		$_Where[0].=(strlen($_Where[0])>0)?" and ID>{$_LastID}":"ID>{$_LastID}";
    		$_RecordCount=Data::Execute_Column("select count(1) from ".self::TableName()." {$_Where[0]}",$_Where[1],$Conn);
			$Sql="select $_Fields from ".self::ViewName()." {$_Where[0]} {$_OrderBy} limit 0,{$_PageSize}";
    		return Data::Execute_FetchAll($Sql,$_Where[1],$Conn);
		}
		else
		{
		    $_Where.=($_Where && strlen($_Where)>0)?" and ID>{$_LastID}":"ID>{$_LastID}";
    		$_RecordCount=Data::Column("select count(1) from ".self::TableName()." {$_Where}");
    		$Sql="select $_Fields from ".self::ViewName()." {$_Where} {$_OrderBy} limit 0,{$_PageSize}";
    		return Data::Rows($Sql,$Conn);
		}
	}
}