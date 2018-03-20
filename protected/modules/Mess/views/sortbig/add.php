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

<body>

<?php
if(false)$m=new Model\SortBig();
echo Form\Html::FormBegin($m);
//$m->CaiId(11111111);
//print_r(\Yaf\Registry::get('chuan_hai_form_Model'));
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable"  id="mytable">
    <tr>
    <td width="126"><div align="right">标题：</div></td>
    <td><?php echo Form\Html::Input($m->_Title);?></td>
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
