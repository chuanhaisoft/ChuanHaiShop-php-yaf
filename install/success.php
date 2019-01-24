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

    
    //include_once('init.php');
	//$_S=Language();
	
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
  <p>恭喜，ChuanHaiShop安装成功</p><br/>
  <p><a href="/" target="_blank">进入首页 </a></p><br/>
  <p><a href="/chuanhai/" target="_blank">进入后台</a></p><br/>
</div>

</body>
</html>