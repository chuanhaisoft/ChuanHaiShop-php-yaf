<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="X-UA-Compatible" content="IE=8">
<head id="Head1"><title></title>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<script type="text/javascript" src="/js/jQuery.js"></script>

<script type="text/javascript">
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
</script>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div id="SearchDiv" style=" padding-bottom:3px;display:none">
    <table width="100%" border="0" cellpadding="0" cellspacing="0"  >
      <tr>
        <td width="10">&nbsp;</td><td >
<?php
	if(Pub\SysFram::getLoginRoleID()==1)
	{
?>
 <span class="STYLE1">姓名:</span>
         <input name="name" type="text" id="name" size="10" />
    
    <span class="STYLE1">卡号:</span>
         <input name="card_num" type="text" id="card_num" size="15" />
         
<span class="STYLE1">手机号:</span>
         <input name="mobile_num" type="text" id="mobile_num" size="10" />
<span class="STYLE1">证件号:</span>
         <input name="id_card" type="text" id="id_card" size="15" />
  
<?php
	}
?>
时间 从：<input name="starttime" style="width:100px" type="text" class="Wdate" id="starttime" onClick="WdatePicker()">
   到：<input name="endtime" style="width:100px" type="text" class="Wdate" id="endtime" onClick="WdatePicker()">



    <label>
    <input type="button" onclick="SearchList()" style="width:80px" name="button" id="button" value="查 询" />
    </label></td>
        <td width="10">&nbsp;</td>
      </tr>
    </table>
</div>
<?php echo $GridHtml; ?>
</form>
</body>
</html>
