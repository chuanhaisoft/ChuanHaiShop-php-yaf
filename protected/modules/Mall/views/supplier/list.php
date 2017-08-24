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
	var Str="锁定";
	if(value==1)
	{
		Str ="正常";
	}
	try{return Str;}finally{Str = null;}
}
function STName(value, cellmeta, record)
{
	var Str="零散";
	if(value==1)Str='一级';
	else if(value==2)Str='二级';
	else if(value==3)Str='其他';
	else Str="零散"; 
	 
	try{return Str;}finally{Str = null;}
}

function GridAdd(value)
{
	window.parent.OpenExtIframWindow2(value + "?Refresh=1&NickName=" ,"添加",0.9,0.95);//Mark + "Add",
}

function DetailView(value, cellmeta, record)
{
	Str ="<a href='javascript:parent.window.OpenExtIframWindow2(\"/data_shop/user/detailview.html?ID="+record.data["ID"]+"\",\"详细\",700,500)'>"+value+"</a>";

	try{return Str;}finally{Str = null;}
}
 
</script>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div id="SearchDiv" style="line-height:25px;padding-bottom:3px;">
   
</div>
<?php echo $GridHtml; ?>
</form>

</body>
</html>
