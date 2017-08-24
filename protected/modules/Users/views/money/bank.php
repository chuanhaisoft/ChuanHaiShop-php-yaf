<?php $this->display(APP_PATH.'/views/top_ext.php'); ?>

<body class="ext-gecko x-border-layout-ct">
<?php
if(false)$m=new \Model\Bank();
echo Form\Html::FormBegin($m);
?>
<br/>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">


  <tr>
    <td width="263"><div align="right">开户姓名：</div></td>
    <td width="1285" class="STYLE1"><?php echo Form\Html::Input($m->_UserName);?>
    </td>
  </tr>

   <tr>
    <td><div align="right">开户行：</div></td>
    <td ><?php echo Form\Html::Input($m->_BankName);?></td>
  </tr>  <tr>
    <td><div align="right">银行卡号：</div></td>
    <td ><?php echo Form\Html::Input($m->_BankNum);?></td>
  </tr>  

  
   <tr>
    <td></td>
    <td style="text-align: center"><br>
      
     
<?php 
echo Form\Html::ButtonajaxSubmit();
?>
      <br>
    <br></td>
  </tr>

</table>

<?php echo Form\Html::FormEnd();?>