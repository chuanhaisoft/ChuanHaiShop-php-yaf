<?php
namespace Pub;
class Js
{
	//
	public static function ScriptHead()
	{
		return "<script>"; 
	}
	
	public static function ScriptEnd()
	{
		return "</script>"; 
	}
	
	public static function LocationHref($PageAddress,$IsIncludeScript=false,$IsDie=false)
	{
	    $str = "";
	    if($IsIncludeScript)$str .=self::ScriptHead();
	    $str .= "window.location.href='$PageAddress';"; 
	    if($IsIncludeScript)$str .=self::ScriptEnd();
	    if($IsDie)
	        die($str);
	    else
	        return $str;
	}
	
	public static function Alert($message,$IsIncludeScript=false,$IsDie=false)
	{
		$str = "";
		if($IsIncludeScript)
			$str .=self::ScriptHead();
		$str .= "alert('{$message}');";
		if($IsIncludeScript)
			$str .=self::ScriptEnd();
			
		if($IsDie)
	        die($str);
	    else
	        return $str;
	}
	
	public static function LayerCloseIframe($IsParent=false,$IsIncludeScript=false)
	{
	    $r="layer.closeAll('iframe');";
	    if($IsParent)
	        $r="parent.layer.closeAll('iframe');";
	    if($IsIncludeScript)
	        $r=self::ScriptHead().$r.self::ScriptEnd();
	    
	    return $r;
	}
	
	public static function WindowReLoad($IsParent=false,$IsIncludeScript=false)
	{
	    $r="window.location.reload();";
	    if($IsParent)
	        $r="parent.window.location.reload();";
	    if($IsIncludeScript)
	        $r=self::ScriptHead().$r.self::ScriptEnd();
	    
		return $r;
	}
	
	public static function AlertLocation($message,$url="/",$IsIncludeScript=false)
	{
		$str = "";
		if($IsIncludeScript)$str .=self::ScriptHead();
		$str .= "alert('{$message}');window.location.href='{$url}';";
		if($IsIncludeScript)$str .=self::ScriptEnd();
			
		return $str;
	}
	
	public static function HistoryBack($BackNum,$IsIncludeScript=false)
	{
		$str = "";
		if($IsIncludeScript)
			$str .=self::ScriptHead();
		$str .= "history.back({$BackNum});";
		if($IsIncludeScript)
			$str .=self::ScriptEnd();
			
		return $str;
	}	
	
	public static function ParentDoView($IsGlobalIfame=false)
	{
	    if($IsGlobalIfame)
	        return "parent.window.refreshPageGrid();";
	    else
		  return "parent.window.DoView();";
		
	}
	
	
	public static function FormResert($name='chuan_hai_form1')
	{
	    return "document.getElementById('{$name}').reset();";
	}
	
	public static function ParentWindowClose()
	{
		return "parent.window.CLoseWindowPanel();";
	}
	public static function ParentWindowClose2()
	{
		return "parent.parent.window.CLoseWindowPanel();";
	}
	public static function LayAlert($message,$IsIncludeScript=false)
	{
		$str = "";
		if($IsIncludeScript)$str .=self::ScriptHead();
		$str .= "alert('{$message}');top.location.reload();";
		if($IsIncludeScript)$str .=self::ScriptEnd();
			
		return $str;
	}
 
	
}
