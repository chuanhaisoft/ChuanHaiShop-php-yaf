<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="X-UA-Compatible" content="IE=8">
<head id="Head1"><title></title>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>

<script language="javascript">
var grid;
function SearchList()
{
	DoView();
}
function RadioValue(tmpValue)   
{   
	  var obj=document.getElementById(tmpValue);
	   return obj.value;  
}

function PayType(value, cellmeta, record)
{
	var Str= value==1?'现金':'余额';
	try{return Str;}finally{Str = null;}
}
function JieSuanTime(value, cellmeta, record)
{
	var Str= value;//==''?'未结':value;
	try{return Str;}finally{Str = null;}
}
function GridAdd(value)
{
	window.parent.OpenExtIframWindow2(value + "?Refresh=1&NickName=" ,"添加产品消费",0.95,0.89);//Mark + "Add",
}

function OpenOrder(value, cellmeta, record)
{
	Str ="<a href='javascript:OpenOrderUrl("+record.data["ID"]+")' >查 看</a>";
	try{return Str;}finally{Str = null;}
}

function OpenOrderUrl(value)
{
	window.parent.OpenExtIframWindow2("/data_user/point/order_point.html?Refresh=1&orderid="+value ,"相关单元",0.95,0.89);//Mark + "Add",
}






</script>
<style type="text/css">
<!--
.STYLE1 {color: #00CC00}
-->
</style>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div style="display:none">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="10">&nbsp;</td><td >
        <span >
        <span class="STYLE1">类别</span>:
         <select name="pSort" id="pSort">
           <option value="-1">所 有</option>
         </select>
    &nbsp;&nbsp;
        <span class="STYLE1" style="display:none">图片状态:
         <select name="pPinLei" id="pPinLei">
           <option value="-1">所 有</option>
    
         </select></span>
    &nbsp;&nbsp;</span>
         <span class="STYLE1">名称</span>:
         <input name="pTitle" type="text" id="pTitle" size="15" />
    &nbsp;&nbsp;
    <input type="button" name="button" id="button" value="点击查询"  onclick="SearchList();"/></td>
        <td width="10">&nbsp;</td>
      </tr>
    </table>
</div>
<script type="text/javascript">

</script>
<?php echo $GridHtml; ?>
</form>
</body>
</html>
