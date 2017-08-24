<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
//$this->display('index/b.php');
$this->display(APP_PATH.'/views/top_ext.php');
?>
<script type="text/javascript" src="/js/Ext.js"></script>
</head>

<body class="ext-gecko x-border-layout-ct">
<?php
if(false)$m=new Model\News();
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
    <td><div align="right"><?php echo Pub\Fram::GetValue('ID')==133?'标签':'Url:' ?>：</div></td>
    <td><?php echo Form\Html::Input($m->_Url);?></td>
  </tr> 
  <tr>
    <td><div align="right">Color：</div></td>
    <td><?php echo Form\Html::Input($m->_Color);?></td>
  </tr> 
  
  <tr>
    <td><div align="right">图片：</div></td>
    <td><?php echo Form\Html::Input($m->_Pic1,array('readonly'=>'readonly'));?>
	<script type="text/javascript">document.write(UploadText2('PIC1',''))</script>
	</td>
  </tr>
  
  
      <tr>
    <td valign="top"><div align="right" style="padding-top:5px">介绍：</div></td>
	<td ><div style="width:85%"><?php  $this->display(APP_PATH.'/views/uedit.php',array('content'=>$info)); ?></div>
	
	</td>
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
