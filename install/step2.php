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
if(!isset($_REQUEST['xieyi']) || $_REQUEST['xieyi']!=1)
{
    header("Location:index.php");
    exit();
}
$_S=Language();
function system_info()
{
	global $_S;
    $info = array();
    
    /* 检查系统基本参数 */
    $info[] = array($_S['php_os'], PHP_OS);
    $info[] = array($_S['php_ver'], (PHP_VERSION>=5.6?$_S['support'] : $_S['not_support'])."(".PHP_VERSION.")");
	SetIsPhp(PHP_VERSION>=5.6);

    /* 检查MYSQL支持情况 */
    $mysql_enabled = class_exists('PDO') ? $_S['support'] : $_S['not_support'];
    $info[] = array($_S['is_mysql'], $mysql_enabled);
	SetIsPhp($mysql_enabled);
    
    /* 检查yaf支持情况 */
    if (defined('Yaf\VERSION') || defined('YAF_VERSION'))
    {
        $info[] = array($_S['is_yaf'], $_S['support']."(".(defined('Yaf\VERSION')?Yaf\VERSION:YAF_VERSION).")" );
    }
    else 
    {
        $info[] = array($_S['is_yaf'], $_S['not_support'] );
    }
    $info[] = array($_S['is_yaf_namespace'], defined('Yaf\VERSION')?$_S['support']: $_S['not_support'] );
	SetIsPhp(defined('Yaf\VERSION'));
    
    /* 检查bcmath支持情况 */
    $info[] = array($_S['is_bcmath'], function_exists('bcadd') ? $_S['support'] : $_S['not_support']);
    SetIsPhp(function_exists('bcadd'));
    

    /* 检查图片处理函数库 */
    $gd_ver = gd();
    $gd_ver = empty($gd_ver) ? $_S['not_support'] : $gd_ver;
    if ($gd_ver > 0)
    {
        if (function_exists('gd_info'))
        {
            $gd_info = gd_info();
            $jpeg_enabled = ($gd_info['JPEG Support']        === true) ? $_S['support'] : $_S['not_support'];
            $gif_enabled  = ($gd_info['GIF Create Support'] === true) ? $_S['support'] : $_S['not_support'];
            $png_enabled  = ($gd_info['PNG Support']        === true) ? $_S['support'] : $_S['not_support'];
        }

    }
    else
    {
        $jpeg_enabled = $_S['not_support'];
        $gif_enabled  = $_S['not_support'];
        $png_enabled  = $_S['not_support'];
    }
    $info[] = array($_S['gd_version'], $gd_ver);
    $info[] = array($_S['jpeg'], $jpeg_enabled);
    $info[] = array($_S['gif'],  $gif_enabled);
    $info[] = array($_S['png'],  $png_enabled);
	SetIsPhp($gd_ver > 0);


    return $info;
}

function gd()
{
    $version=-1;
    if (function_exists('gd_info'))
    {
        $ver_info = gd_info();
        preg_match('/\d/', $ver_info['GD Version'], $match);
        $version = $match[0];
    }
    else
    {
        if (function_exists('imagecreatetruecolor'))
        {
            $version = 2;
        }
        elseif (function_exists('imagecreate'))
        {
            $version = 1;
        }
    }
    return $version;
}
$info=system_info();
?>
<body>

  
<br/><br/><br/><br/>
<div >
  <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td style="background-color:#41a5e1;color:#FFFFFF;padding:10px">环境检测</td>
    </tr>
<?php
	for($i=0;$i<count($info);$i++)
	{
?>
    <tr>
      <td style="padding:5px">
	  	<?php echo $info[$i][0] ?>-----------------------------------------------------------<?php echo $info[$i][1] ?>	  </td>
    </tr>
<?php
	}
?>
    <tr>
      <td style="background-color:#41a5e1;color:#FFFFFF;padding:10px">目录权限</td>
    </tr>
<?php
	for($i=0;$i<count($CheckWriteFolder);$i++)
	{
?>
    <tr>
      <td style="padding:5px">
	  	<?php $CheckWrite=is_writable(APP_PATH.'/'.$CheckWriteFolder[$i]);SetIsWrite($CheckWrite); ?>
	  	<?php echo $CheckWriteFolder[$i] ?>-----------------------------------------------------------<?php echo $CheckWrite ? $_S['support_write'] : $_S['not_support_write'] ?>	  </td>
    </tr>
<?php
	}
?>
    <tr>
      <td>
		  <div style="padding:10px; padding-top:20px; text-align:center">
			<input type="submit" <?php if(!$IsPhp || !$IsWrite){ ?> disabled="disabled"<?php } ?> style="font-size:16px" onclick="check()" name="Submit" value="下一步:配置ChuanHaiShop" />
		  </div>
	  </td>
    </tr>
  </table>
</div>

<script type="text/javascript">

function check()
{
  window.location.href='step3.php';
}
</script>
</body>
</html>