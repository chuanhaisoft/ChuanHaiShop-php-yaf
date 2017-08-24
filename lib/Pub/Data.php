<?php
namespace Pub;
use Exception;
use PDO;

class Data
{
	public static function GetConn($Try=3)
	{//数据库操作
	    $config = \Yaf\Registry::get('config');
	    $config = $config['application']['db'];
        $conn_HOSTNAME = $config['ip'];
        $conn_DATABASE = $config['dbname'];
        $conn_PORT     = $config['port'];
        $conn_USERNAME = $config['username'];
        $conn_PASSWORD = $config['password'];
        $str="mysql:host={$conn_HOSTNAME};dbname={$conn_DATABASE};port={$conn_PORT}";
        $Conn=null;
        try
        {
            $Conn=new PDO($str,$conn_USERNAME,$conn_PASSWORD,[PDO::ATTR_TIMEOUT=>2,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            $Conn->exec("set names 'UTF8'");
        }
        catch(Exception $e)
        {
            $Try--;
            if($Try>0)
                self::GetConn($Try);
            else
                throw $e;
        }
        if($Conn==null)
        {
            $Try--;
            if($Try>0)
                self::GetConn($Try);
        }
        
        return $Conn;
	}
	
	public static function RunCommend($Sql,$_Conn=null)
	{
	    $row=null;
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    try
	    {
	        $row=$Conn->exec($Sql);
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
		return $row;
	}

	public static function Insert($Sql,$ExeArr=null,$_Conn=null)
	{
	    $row=null;
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    try
	    {
	        $r=$Conn->prepare($Sql);
	        $row=$r->execute($ExeArr);
	        $row=$Conn->lastInsertId();
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
		return $row;
	}
	
	public static function Column($Sql,$_Conn=null)
	{
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    $row=null;
	    try
	    {
	        $r=$Conn->prepare($Sql);
	        $r->execute();
	        $row=$r->fetchColumn();
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
	    return $row;
	}

	public static function Row($Sql,$_Conn=null)
	{
		$Conn=($_Conn==null)?self::GetConn():$_Conn;
		$row=null;
		try
		{
		    $r = $Conn->prepare($Sql);
		    $r->execute();
		    $row=$r->fetch(PDO::FETCH_ASSOC);
		}
		catch(Exception $e){throw $e;}
		if($_Conn==null)
		    self::CloseConn($Conn);
		return $row;
	}

	public static function Rows($Sql,$_Conn=null)
	{
		$Conn=($_Conn==null)?self::GetConn():$_Conn;
		$row=null;
		try
		{
		    $r=$Conn->prepare($Sql);
		    $r->execute();
		    $row=$r->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(Exception $e){throw $e;}
		if($_Conn==null)
		    self::CloseConn($Conn);
		return $row;
	}
	
	public static function Execute($Sql,$ExeArr=null,$_Conn=null,$_IfRowCount=false)
	{
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    $row=null;
	    try
	    {
	        $r=$Conn->prepare($Sql);
	        $row=$r->execute($ExeArr);
	        if($_IfRowCount && $row)
	           $row=$r->rowCount();
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
	    return $row;
	}
	
	public static function Execute_Fetch($Sql,$ExeArr=null,$_Conn=null)
	{
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    $row=null;
	    try
	    {
	        $r=$Conn->prepare($Sql);
	        $row=$r->execute($ExeArr);
	        $row=$r->fetch(PDO::FETCH_ASSOC);
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
	    return $row;
	}
	
	public static function Execute_Column($Sql,$ExeArr=null,$_Conn=null)
	{
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    $row=null;
	    try
	    {
	        $r=$Conn->prepare($Sql);
	        $row=$r->execute($ExeArr);
	        $row=$r->fetchColumn();
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
	    return $row;
	}
	
	public static function Execute_FetchAll($Sql,$ExeArr=null,$_Conn=null)
	{
	    $Conn=($_Conn==null)?self::GetConn():$_Conn;
	    $row=null;
	    try
	    {
	        $r=$Conn->prepare($Sql);
	        $row=$r->execute($ExeArr);
	        $row=$r->fetchAll(PDO::FETCH_ASSOC);
	    }
	    catch(Exception $e){throw $e;}
	    if($_Conn==null)
	        self::CloseConn($Conn);
	    return $row;
	}
	
	public static function CloseConn(&$Conn)
	{
	    $Conn=null;
	}
	
	public static function BeginTran(&$Conn)
	{
        return $Conn->beginTransaction();
	}
	
	public static function Commit(&$Conn)
	{
	    $r=$Conn->commit();
	    self::CloseConn($Conn);
	    return $r;
	}

	public static function RollBack(&$Conn)
	{
	    $r=$Conn->rollBack();
	    self::CloseConn($Conn);
	    return $r;
	}
}