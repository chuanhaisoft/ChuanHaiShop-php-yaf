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
</script>
<style type="text/css">
<!--
.STYLE1 {color: #00CC00}
-->
</style>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div id="SearchDiv" >
</div>
<script type="text/javascript">

</script>
<?php echo $GridHtml; ?>
</form>
</body>
</html>
