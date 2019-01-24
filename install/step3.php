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
<?php

$_S=Language();

?>
<body>

  
<br/><br/><br/><br/>
<div id="paras">
  <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" style="background-color:#41a5e1;color:#FFFFFF;padding:10px">数据库配置</td>
    </tr>

    <tr>
      <td width="17%" style="padding:5px"><div align="right">数据库主机:</div></td>
      <td width="83%" style="padding:5px"><input type="text" name="host" value="127.0.0.1"></td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">端口号:</div></td>
      <td width="83%" style="padding:5px"><input type="text" name="port" value="3306"></td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">数据库名:</div></td>
      <td width="83%" style="padding:5px"><input type="text" name="db_name" value=""></td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">用户名:</div></td>
      <td width="83%" style="padding:5px"><input type="text" name="db_user" value="root"></td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">密码:</div></td>
      <td width="83%" style="padding:5px"><input type="text" name="db_pass" value=""></td>
    </tr>

    <tr>
      <td colspan="2" style="background-color:#41a5e1;color:#FFFFFF;padding:10px">管理员帐号</td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">登录名:</div></td>
      <td width="83%" style="padding:5px">admin</td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">登录密码:</div></td>
      <td width="83%" style="padding:5px"><input type="password" name="admin_pass" value=""></td>
    </tr>
    <tr>
      <td width="17%" style="padding:5px"><div align="right">确认密码:</div></td>
      <td width="83%" style="padding:5px"><input type="password" name="admin_pass2" value=""></td>
    </tr>
    <tr>
      <td colspan="2">
		  <div style="padding:10px; padding-top:20px; text-align:center">
			<input type="submit" style="font-size:16px" onclick="install()" name="Submit" value="立即安装ChuanHaiShop" />
		  </div>	  </td>
    </tr>
  </table>
</div>

<script type="text/javascript">

function install()
{
	var checked=true;
	var parastr="act=1";
	$("#paras input[type=text],#paras input[type=password]").each(function () {
		parastr=parastr+"&"+this.name+"="+encodeURI(this.value);
		if(!this.value && checked)
		{
			alert('信息不完整,请填写以上信息');
			checked=false;
		}
	})
	if(checked)
	{
		if(!$("input[name='admin_pass']").val() || $("input[name='admin_pass']").val()!=$("input[name='admin_pass2']").val())
		{
			alert('2此密码输入不一致');
			return;
		}
		
		layer.open({
		  type: 2,
		  title: 'ChuanHaiShop安装',
		  area: ['600px', '400px'],
		  content:"step4.php?"+parastr
		});
	}

}
</script>
</body>
</html>