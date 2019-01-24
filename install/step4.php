<?php include_once('init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎您使用ChuanHaiShop商城系统！</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link href="/css/css1.css" rel="stylesheet" type="text/css" />
<link href="/css/form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/Common.js"></script>
<script type="text/javascript" src="/js/layer/layer.js"></script>
<style>
body{background-color:#dce9f1}
</style>
</head>
<body>
<?php 
	$_S=Language();
	
	$_paras="";
	if($_GET)
	{
	    foreach($_GET as $k => $v)
	    {
	        if($k!='act')
	           $_paras.="&{$k}=".urlencode($v);
	    }
	}
?>
  

<div style="padding:10px" id="content">

</div>
<iframe src="" style="width:98%;height:80px;border:0px;" allowtransparency="true"></iframe>
<script type="text/javascript">
$(function(){ 
	$("#content").append("<br/>数据库恢复中............................................");
	$('iframe').attr('src','do.php?act=1<?php echo $_paras; ?>');
	var index = layer.load(1, {
		  shade: [0.1,'#fff'] //0.1透明度的白色背景
	});
}); 
function step(v,startbr,endbr)
{
	if(startbr){v="<br/>"+v+"............................................";}
	if(endbr){v=v+"<br/>";}
	$("#content").append(v);
}
function close()
{
	layer.closeAll('loading');
}
</script>
</body>
</html>