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

  
<div style="padding:30px; float:right">
    界面语言：简体
</div>
<div style="text-align:center">
	<iframe src="../License.html" style="width:98%;height:420px;border:0px;" allowtransparency="true"></iframe>
</div>

<div style="text-align:center;padding-top:5px;">
	<div style="width:98%;font-size:16px">
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="22%">&nbsp;</td>
    <td width="44%"><label>
      <input type="radio" name="xieyi" value="1" />我已仔细阅读并同意上述条款中的所有内容
      
    </label></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <div style="padding-top:15px">
	  	<input type="submit" style="font-size:16px" onclick="check()" name="Submit" value="下一步:环境检测" />
	  </div>
        
        </td>
    <td>&nbsp;</td>
  </tr>
</table>

	</div>
</div>

    
</div>
<script type="text/javascript">

function check()
{
  if($("input[name='xieyi']:checked").val())
  {
  	window.location.href='step2.php?xieyi=1';
  }
  else
  {
  	alert("请阅读协议并同意以上条款");
  }
}
</script>
</body>
</html>