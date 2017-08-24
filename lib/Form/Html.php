<?php 
namespace Form;

class Html
{
	public static function Input($Field,$HtmlOptions=null,$Style=null)
	{
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $n=self::FieldName($Field->k);
	    $s=\Pub\Fram::StrBind('<input name="?" id="?" value="?" type="text"??>',[$n,$n,htmlspecialchars($Field->v),$Options,$_Style]);
	    self::FieldToViewed($Field->k,'input');
		return $s;
	}
	
	public static function Password($Field,$HtmlOptions=null,$Style=null)
	{
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $n=self::FieldName($Field->k);
	    $s=\Pub\Fram::StrBind('<input name="?" id="?" value="?" type="password"??>',[$n,$n,htmlspecialchars($Field->v),$Options,$_Style]);
	    self::FieldToViewed($Field->k,'password');
	    return $s;
	}
	
	public static function Text($Field,$HtmlOptions=null,$Style=null)
	{
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $n=self::FieldName($Field->k);
	    $s=\Pub\Fram::StrBind('<textarea name="?" id="?"??>?</textarea>',[$n,$n,$Options,$_Style,htmlspecialchars($Field->v)]);
	    self::FieldToViewed($Field->k,'text');
	    return $s;
	}
	
	public static function Radio($Field,$Data,$HtmlOptions=null,$Style=null)
	{
	    $s='';
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $i=1;
	    $n=self::FieldName($Field->k);
	    foreach ($Data as $key => $value)
	    {
	        $s.=\Pub\Fram::StrBind('<input name="?" id="?" value="?" type="radio"??? /><label for="?">?</label> ',[$n,$n."_$i",htmlspecialchars($key),($key==$Field->v?' checked="checked"':''),$Options,$_Style,$n."_$i",htmlspecialchars($value)]);
	        $i++;
	    }
	    self::FieldToViewed($Field->k,'radio');
	    return $s;
	}
	
	public static function CheckBox($Field,$Data,$HtmlOptions=null,$Style=null)
	{
	    $s='';
	    if(!is_array($Field->v))
	        $Field->v=[$Field->v];
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $i=1;
	    $n=self::FieldName($Field->k);
	    if(isset($Data[0]) && isset($Data[0]['k']) && isset($Data[0]['v']))
	    {
	        foreach ($Data as $key => $value)
	        {
	            $s.=\Pub\Fram::StrBind('<input name="?[]" id="?" value="?" type="checkbox"??? /><label for="?">?</label> ',[$n,$n.'_'.htmlspecialchars($value['k']),htmlspecialchars($value['k']),(in_array($value['k'], $Field->v)?' checked="checked"':''),$Options,$_Style,$n.'_'.htmlspecialchars($value['k']),htmlspecialchars($value['v'])]);
	            $i++;
	        }
	    }
	    else
	    {
	        foreach ($Data as $key => $value)
	        {
	            $s.=\Pub\Fram::StrBind('<input name="?[]" id="?" value="?" type="checkbox"??? /><label for="?">?</label> ',[$n,$n.'_'.htmlspecialchars($key),htmlspecialchars($key),(in_array($key, $Field->v)?' checked="checked"':''),$Options,$_Style,$n.'_'.htmlspecialchars($key),htmlspecialchars($value)]);
	            $i++;
	        }
	    }
	    //$s.=\Pub\Fram::StrBind('<input id="?" type="hidden" value="" name="?" />',[$n,$n]);
	    self::FieldToViewed($Field->k,'checkBox');
	    return $s;
	}
	
	public static function Select($Field,$Data,$HtmlOptions=null,$Style=null)
	{
	    $s='<option>请选择</option>';
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    foreach ($Data as $key => $value)
	    {
	        $s.=\Pub\Fram::StrBind('<option value="?"???>?</option>',[htmlspecialchars($key),($key==$Field->v?' selected="selected"':''),$Options,$_Style,htmlspecialchars($value)]);
	    }
	    $n=self::FieldName($Field->k);
	    self::FieldToViewed($Field->k,'select');
	    return "<select name=\"{$n}\" id=\"{$n}\">{$s}</select>";
	}
	
	public static function Button($Label='提 交',$HtmlOptions=null,$Style=null)
	{
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $s=\Pub\Fram::StrBind('<input type="button" value="?"?? />',[$Label,$Options,$_Style]);
	    return $s;
	}

	public static function Hidden($Field)
	{
	    $n=self::FieldName($Field->k);
	    $s=\Pub\Fram::StrBind('<input name="?" id="?" value="?" type="hidden">',[$n,$n,htmlspecialchars($Field->v)]);
	    self::FieldToViewed($Field->k,'input');
	    return $s;
	}
	
	public static function ButtonajaxSubmit($AjaxOptions=null,$Label='提 交',$Url='',$HtmlOptions=null,$Style=null,$AppendFun='')
	{
	    if(!isset($HtmlOptions['id']))
	        $HtmlOptions['id']='tijiao';
	    if(!isset($HtmlOptions['name']))
	        $HtmlOptions['name']='tijiao';
	    
	    if(!$Url || strlen($Url)<1)
	        $Url=\Pub\Fram::CurrentUrl();
	    
	    $Options=self::AttrToStr($HtmlOptions);
	    $_Style=[];
	    if(is_array($Style))
	        $_Style=array_merge($_Style,$Style);
	    $_Style=self::AttrToStr_Css($_Style);
	    $s=\Pub\Fram::StrBind('<input type="button" value="?"?? />',[$Label,$Options,$_Style]);
	    self::ButtonJs($HtmlOptions['id'],$Url,$AjaxOptions,$AppendFun);
	    return $s;
	}
	
	
	
	public static function FormBegin($m,$HtmlOptions=[],$Method='post',$Action='')
	{
	    if(!is_array($HtmlOptions))
	        $HtmlOptions=[];
	    if(!isset($HtmlOptions['id']))
	        $HtmlOptions['id']='chuan_hai_form1';
	    if(!isset($HtmlOptions['name']))
	        $HtmlOptions['name']='chuan_hai_form1';
	    if(!isset($HtmlOptions['method']))
	        $HtmlOptions['method']='post';
	    if($Action && strlen($Action)>1)
	        $HtmlOptions['action']=$Action;
	    else 
	        $HtmlOptions['action']=\Pub\Fram::CurrentUrl();
	    
	    $Options=self::AttrToStr($HtmlOptions);
	    
	    $m->__FieldViewed=[];
	    $m->__FieldArray=[];
	    \Yaf\Registry::set('chuan_hai_form_Model',$m);
	    $s=\Pub\Fram::StrBind('<form?>',[$Options]);
	    $m->__chuan_hai_form_id=$HtmlOptions['id'];
	    return $s."\n";
	}
	
	protected static function FieldName($name,$m=null)
	{
	    if($m==null)
	        $m=\Yaf\Registry::get('chuan_hai_form_Model');
	    return ($m->NameIfPass())?$m->FieldPassedName()[$name]:$name;
	}
	
	protected static function FieldToViewed($FieldName,$Type='')
	{
	    $m=\Yaf\Registry::get('chuan_hai_form_Model');
	    //if(!property_exists($m, '__FieldViewed'))
	    //    $m->__FieldViewed=[];
	    array_push($m->__FieldViewed, $FieldName);
	    if($Type=='checkBox')
	       array_push($m->__FieldArray,$FieldName);
	}
	
	protected static function ButtonJs($ButonID,$Url,$AjaxOptions=null,$AppendFun='')
	{
	    $Options=['beforeSend'=>'btnState','complete'=>'btnState2'];
	    if(isset($AjaxOptions) && isset($AjaxOptions['beforeSend']))
	        $Options['beforeSend']=$AjaxOptions['beforeSend'];
	    if(isset($AjaxOptions) && isset($AjaxOptions['complete']))
	        $Options['complete']=$AjaxOptions['complete'];
	    
	    if($AppendFun && strlen($AppendFun)>1 && substr(trim($AppendFun), -1)!=';')
	        $AppendFun.=';';
	    $Js=<<<str
jQuery("#{$ButonID}").click(function()
	{{$AppendFun}
		var form = jQuery(this).parents('form');
		var isValid=form.valid();
		if( isValid ){
			$.fn.EJFValidate.restoreName();
			jQuery.ajax({'beforeSend':{$Options['beforeSend']},'complete':{$Options['complete']},'dataType':'script','error':BtOnError,'type':'POST','url':'{$Url}','cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery("#response").html(html)}});
		}
		return isValid;
	}
);
str;
	    \Yaf\Registry::set('chuan_hai_form_ButtonJs',\Yaf\Registry::get('chuan_hai_form_ButtonJs').$Js);
	}
	
	public static function FormEnd()
	{
	    $m=\Yaf\Registry::get('chuan_hai_form_Model');
	    $Id=$m->__chuan_hai_form_id;
	    $ButtonJs=\Yaf\Registry::get('chuan_hai_form_ButtonJs');
	    
	    $Rules=$m->Rules();
	    $Rules_Json=self::RulesJson($m);
	    $Rules_Json[0]=json_encode($Rules_Json[0]);
	    $Rules_Json[1]=json_encode($Rules_Json[1]);
	    for($i=0;$i<count($m->__FieldArray);$i++)
	    {
	        $Rules_Json[0]=str_replace('"'.$m->__FieldArray[$i].'"', '"'.$m->__FieldArray[$i].'[]"', $Rules_Json[0]);
	        $Rules_Json[1]=str_replace('"'.$m->__FieldArray[$i].'"', '"'.$m->__FieldArray[$i].'[]"', $Rules_Json[1]);
	    }
	    $Js=<<<str
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
{$ButtonJs}
$("#{$Id}").validate({"errorContainer":"div.container","errorElement":"span","errorClass":"invalid","rules":{$Rules_Json[0]},"messages":{$Rules_Json[1]}     });
});
/*]]>*/
</script>
str;
	    return "\n</form>\n".$Js;
	}
	
	public static function RulesJson($m,$IsServerValidate=false)
	{
	    $Str=[[],[]];//"\"User[LOGIN_NAME]\":{\"required\":true}";
	    $Rules=$m->Rules();
	    if($IsServerValidate)
	    {
	        $FieldViewed=[];
	        foreach(get_object_vars($m) as $Key=>$Value)
	        {
	            if(substr($Key, 0,1)=='_' && substr($Key, 0,2)!='__' && $Value->Changed)
	            {
	                array_push($FieldViewed, $Value->k);
	            }
	        }
	    }
	    else 
	       $FieldViewed=array_merge($m->__FieldViewed);
	    for($j=0;$j<count($FieldViewed);$j++)
	    {
	        if(is_array($Rules))
	        {
	            for($i=0;$i<count($Rules);$i++)
	            {
	                $row=$Rules[$i];
	                if(!isset($row['on']))
	                    $row['on']=[];
	                else 
	                {
	                    if(!is_array($row['on']))
	                        $row['on']=[$row['on']];
	                }
	                if(!is_array($row) || ($m->__RuleName=='' && $row['on']!=[]) || ($m->__RuleName && $m->__RuleName!='' &&  !in_array($m->__RuleName, $row['on'])   ))
	                    continue;

	                if(in_array($FieldViewed[$j], $row[0]))
	                {
	                    if(is_array($row[1]) && count($row[1])>1)
	                    {
	                        foreach($row[1] as $k=>$v)
	                        {
	                            $TmpRow=$row;
	                            $TmpRow[1]=[$k=>$v];
	                            self::RulesStr(self::FieldName($FieldViewed[$j],$m),$TmpRow,isset($row['msg'])?$row['msg']:null,$Str,$m);
	                        }
	                        
	                    }
	                    else
	                        self::RulesStr(self::FieldName($FieldViewed[$j],$m),$row,isset($row['msg'])?$row['msg']:null,$Str,$m);
	                }
	            }
	        }
	    }
	    return $Str;
	}
	
	private static function RulesStr($FieldName,$Row,$Msg,&$Str,$m=null)
	{
	    $RuleName=$Row[1];
	    $Value=true;
	    if(is_array($RuleName))
	    {
	        $Key=array_keys($RuleName);
	        $Key=$Key[0];
	        $Value=$RuleName[$Key];
	        $RuleName=$Key;
	        
	        if($Key=='equalTo')
	            $Value='#'.self::FieldName($Value,$m);
	    }
	    
	    switch($RuleName)
	    {
	        default:
	            if(isset($Str[0][$FieldName]))
	                $Str[0][$FieldName][$RuleName]=$Value;
	            else 
	                $Str[0][$FieldName]=["{$RuleName}"=>$Value];
	            
	            $t=$Row;unset($t[0]);unset($t[1]);unset($t['msg']);unset($t['on']);
	            if(count($t)>0)
	            {
	                $Str[0][$FieldName]=array_merge($t,$Str[0][$FieldName]);
	            }
	            
	            if($Msg!=null)
	            {
	                if(isset($Str[1][$FieldName]))
	                    $Str[1][$FieldName][$RuleName]=$Msg;
	                else
	                    $Str[1][$FieldName]=["{$RuleName}"=>$Msg];
	            }
	            break;
	    }
	    
	    return $Str;
	}
	
	protected static function AttrToStr($Options,$ItemFenGe=' ',$ValueFenGe='=',$FirstFenGe=true)
	{
	    $s='';
	    if(is_array($Options) && count($Options)>0)
	    {
	        $i=1;
	        foreach ($Options as $key => $value)
	        {
	            $s.=((($FirstFenGe && $i==1)||$i>1)?$ItemFenGe:'').htmlspecialchars($key).$ValueFenGe.'"'.htmlspecialchars($value).'"';
	            $i++;
	        }
	    }
	    return $s;
	}
	protected static function AttrToStr_Css($Options,$ItemFenGe=';',$ValueFenGe=':',$FirstFenGe=false)
	{
	    $s='';
	    if(is_array($Options) && count($Options)>0)
	    {
	        $i=1;
	        foreach ($Options as $key => $value)
	        {
	            $s.=((($FirstFenGe && $i==1)||$i>1)?$ItemFenGe:'').htmlspecialchars($key).$ValueFenGe.htmlspecialchars($value);
	            $i++;
	        }
	        $s='style="'.$s.'"';
	    }
	    return $s;
	}
	

}
