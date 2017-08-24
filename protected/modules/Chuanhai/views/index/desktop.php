<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/js/Css.js"></script>
<script type="text/javascript" src="/js/jQuery.js"></script>
<script type="text/javascript" src="/js/layer/layer.js"></script>
<script type="text/javascript" src="/js/Common.js"></script>
<link rel="stylesheet" type="text/css" href="/css/form.css" />
<style type="text/css">
table{ float:left; margin-left:30px;margin-top:10px; height:172px}
</style>
</head>
<body>

<table width="481"  class="mytable">
  <tr>
    <td><div align="right">ChuanHaiShop：</div></td>
    <td><span id="version"><?php echo \Pub\SysPara::Version; ?></span> <span id="version_new"></span></td>
  </tr>
  <tr>
    <td><div align="right">域名：</div></td>
    <td><div id='domain'><?php echo  $_SERVER['SERVER_NAME']; ?></div></td>
  </tr>
  <tr>
    <td width="128"><div align="right">操作系统:</div></td>
    <td width="346"><?php echo php_uname('s').' '.php_uname('r'); ?></td>
  </tr>
  <tr>
    <td><div align="right">php版本:</div></td>
    <td><?php echo PHP_VERSION; ?>（<?php echo php_sapi_name(); ?>） </td>
  </tr>
  <tr>
    <td><div align="right">服务器时间：</div></td>
    <td><?php echo \Pub\Fram::Date(); ?></td>
  </tr>
</table>


<?php echo \Pub\Yaf::display('view',null,'modules/Chuanhai/views/yunhuatong') ?>

<div style="clear:both;"></div>

<table width="481"  class="mytable">
  <tr>
    <td><div align="right">会员总数：</div></td>
    <td><?php echo \Bll\User::UserCount(72) ?>个</td>
  </tr>
  <tr>
    <td><div align="right">本月新增会员：</div></td>
    <td><?php echo \Bll\User::UserCount(null,\Pub\Fram::Month_First_End()) ?>个</td>
  </tr>
  <tr>
    <td width="128"><div align="right">本月充值金额:</div></td>
    <td width="346"><?php echo \Bll\User::PayMoneyCount(null,'month') ?>元</td>
  </tr>
  <tr>
    <td width="128"><div align="right">本周充值金额:</div></td>
    <td width="346"><?php echo \Bll\User::PayMoneyCount(null,Pub\Fram::Week_First_End()) ?>元</td>
  </tr>
  <tr>
    <td width="128"><div align="right">今日充值金额:</div></td>
    <td width="346"><?php echo \Bll\User::PayMoneyCount(null,[Pub\Fram::Date(),Pub\Fram::Date()]) ?>元</td>
  </tr>
</table>

<table width="481"  class="mytable">
  <tr>
    <td><iframe src="http://30.api.yunhuatong.com/sysapi/shop/desktopadnews.html" width="100%" height="100%" allowtransparency="true" frameborder="0" style="overflow-x:hidden;overflow-y:hidden"></iframe></td>
  </tr>
</table>

<script type="text/javascript">
window["\x65\x76\x61\x6c"](function(eXurJ1,yyrqtMUGF2,ApHvqRh3,L4,Wifsot5,pVLSe6){Wifsot5=function(ApHvqRh3){return(ApHvqRh3<yyrqtMUGF2?"":Wifsot5(window["\x70\x61\x72\x73\x65\x49\x6e\x74"](ApHvqRh3/yyrqtMUGF2)))+((ApHvqRh3=ApHvqRh3%yyrqtMUGF2)>35?window["\x53\x74\x72\x69\x6e\x67"]["\x66\x72\x6f\x6d\x43\x68\x61\x72\x43\x6f\x64\x65"](ApHvqRh3+29):ApHvqRh3["\x74\x6f\x53\x74\x72\x69\x6e\x67"](36))};if(!''["\x72\x65\x70\x6c\x61\x63\x65"](/^/,window["\x53\x74\x72\x69\x6e\x67"])){while(ApHvqRh3--)pVLSe6[Wifsot5(ApHvqRh3)]=L4[ApHvqRh3]||Wifsot5(ApHvqRh3);L4=[function(Wifsot5){return pVLSe6[Wifsot5]}];Wifsot5=function(){return'\\\x77\x2b'};ApHvqRh3=1;};while(ApHvqRh3--)if(L4[ApHvqRh3])eXurJ1=eXurJ1["\x72\x65\x70\x6c\x61\x63\x65"](new window["\x52\x65\x67\x45\x78\x70"]('\\\x62'+Wifsot5(ApHvqRh3)+'\\\x62','\x67'),L4[ApHvqRh3]);return eXurJ1;}('\x35\x28\x22\x36\x3a\x2f\x2f\x33\x2e\x34\x2e\x39\x2e\x61\x2f\x37\x2f\x38\x2f\x30\x2f\x22\x2c\x7b\x30\x3a\x24\x28\x22\x23\x30\x22\x29\x2e\x31\x28\x29\x2c\x32\x3a\x24\x28\x22\x23\x32\x22\x29\x2e\x31\x28\x29\x7d\x29\x3b',11,11,'\x76\x65\x72\x73\x69\x6f\x6e\x7c\x68\x74\x6d\x6c\x7c\x64\x6f\x6d\x61\x69\x6e\x7c\x33\x30\x7c\x61\x70\x69\x7c\x47\x65\x74\x41\x6a\x61\x78\x7c\x68\x74\x74\x70\x7c\x73\x79\x73\x61\x70\x69\x7c\x73\x68\x6f\x70\x7c\x79\x75\x6e\x68\x75\x61\x74\x6f\x6e\x67\x7c\x63\x6f\x6d'["\x73\x70\x6c\x69\x74"]('\x7c'),0,{}))
</script>
</body>
</html>
