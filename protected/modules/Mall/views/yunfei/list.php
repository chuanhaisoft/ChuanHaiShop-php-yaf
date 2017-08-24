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
function ZhuangTai(value, cellmeta, record)
{
	var Str="未审核";
	if(value==1)
	{
		Str = FontGreen("已上架");
	}
	if(value==0)
	{
		Str =FontYello("等待上架");
	}
	if(value==-3)
	{
		Str =FontRed("审核失败");
	}
	try{return Str;}finally{Str = null;}
}
function RoleName(value, cellmeta, record)
{
	var Str=ReturnRoleName(value);
	try{return Str;}finally{Str = null;}
}
function GridAdd(value)
{
	window.parent.OpenExtIframWindow2(value + "?Refresh=1&NickName=" ,"添加运费",700,350);//Mark + "Add",
}

</script>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">

<?php echo $GridHtml; ?>
</form>
</body>
</html>
