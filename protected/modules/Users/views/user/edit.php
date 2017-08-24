<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
//$this->display('index/b.php');
$this->display(APP_PATH.'/views/top_ext.php');
?>
</head>

<body class="ext-gecko x-border-layout-ct">
<?php
if(false)$m=new \Model\User();
echo Form\Html::FormBegin($m);
//$m->CaiId(11111111);
//print_r(\Yaf\Registry::get('chuan_hai_form_Model'));
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable"  id="mytable">
    <tr>
    <td width="126"><div align="right">登录名：</div></td>
    <td><?php echo Form\Html::Input($m->_LoginName,['readonly'=>'readonly']);?></td>
  </tr>
    <tr>
    <td width="126"><div align="right">姓名：</div></td>
    <td><?php echo Form\Html::Input($m->_Name,['readonly'=>'readonly']);?></td>
  </tr>
      <tr>
    <td width="126"><div align="right">Email：</div></td>
    <td><?php echo Form\Html::Input($m->_Email);?></td>
  </tr>
      <tr>
    <td width="126"><div align="right">QQ：</div></td>
    <td><?php echo Form\Html::Input($m->_Qq);?></td>
  </tr>
    <tr>
    <td width="126"><div align="right">密码：</div></td>
    <td><?php echo Form\Html::Password($m->_LoginPass);?>留空不修改</td>
  </tr>
      <tr>
    <td width="126"><div align="right">重复密码：</div></td>
    <td><?php echo Form\Html::Password($m->_City);?></td>
  </tr>
    
  <tr>
    <td><div align="right"> </div></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td width="421">&nbsp;</td>
          <td width="969">

<?php 
echo Form\Html::ButtonajaxSubmit();
?></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php echo Form\Html::FormEnd();?>
</body>
</html>
