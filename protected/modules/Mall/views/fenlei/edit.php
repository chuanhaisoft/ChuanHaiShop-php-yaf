<?php \Pub\Yaf::display('jq_form'); ?>
<?php
if(false)$m=new \Model\MallSort();
echo Form\Html::FormBegin($m);
?>
<br/>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  
    <tr>
    <td width="126"><div align="right">名称：</div></td>
    <td><?php echo Form\Html::Input($m->_Name);?></td>
  </tr>
    <tr>
    <td width="126"><div align="right">排序：</div></td>
    <td><?php echo Form\Html::Input($m->_OrderNum);?></td>
  </tr>

  
  <tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td width="421">&nbsp;</td>
          <td width="969">

<?php echo Form\Html::ButtonajaxSubmit();?></td>
        </tr>
      </table></td>
  </tr>
</table>


<?php echo Form\Html::FormEnd();?>

