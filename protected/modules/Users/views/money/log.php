<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="X-UA-Compatible" content="IE=8">
<head id="Head1"><title></title>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<script type="text/javascript" src="/js/jQuery.js"></script>

<script language="javascript">
var grid;
function SearchList()
{
	FormToExt("SearchDiv",PostPara);
	DoView();
}
function RadioValue(tmpValue)   
{   
	  var obj=document.getElementById(tmpValue);
	   return obj.value;  
}

function RightMoneyShow(value, cellmeta, record)
{
	
	var Str="";
	if(value&&value!=0)
	{
		Str = value;
	}
	
	
	try{return Str;}finally{Str = null;}
}


function TiXianState(value, cellmeta, record)
{
	var Str="已提交";
	if(value==1)
	{
		Str = FontRed("已审核");
	}
	if(value==2)
	{
		Str = FontRed("已完成");
	}
	
	try{return Str;}finally{Str = null;}
}









</script>
<style type="text/css">
<!--
.STYLE1 {color: #00CC00}
-->
</style>

<body class="ext-gecko x-border-layout-ct">

<form name="form1" method="post" action="" id="form1">
<div id="SearchDiv" style=" padding-bottom:3px;">
 <table width="100%" border="0" cellpadding="0" cellspacing="0"  >
      <tr>
        <td width="0"></td><td >
         
         时间 从：<input name="st" style="width:100px" type="text" class="Wdate" id="starttime" onClick="WdatePicker()">
   到：<input name="ed" style="width:100px" type="text" class="Wdate" id="endtime" onClick="WdatePicker()">
   <span >&nbsp;类型</span>:
   <select name="search_type" id="search_type">
           <option value="">所 有</option>
           <option value="1001">商城订单收益分配</option>
           <option value="1002">商城订单销售收益</option>
           <option value="1003">商城订单扣服务费</option>
           <option value="9904">超市订单收益分配</option>
           <option value="9903">超市订单扣服务费</option>
           <option value="9960">超市销售收益</option>
           <option value="1000">实体店订单收益分配</option>
           <option value="5">实体店订单扣服务费</option>
         </select>
         
  
      <input type="button" name="button" id="button" value="查 询"  onclick="SearchList();"/>
    </td>
        <td width="0"></td>
      </tr>
    </table>
  
</div>
<?php echo $GridHtml; ?>



</form>

	
