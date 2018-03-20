<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<body>

<?php \Pub\Yaf::display('jq_form'); ?>
<?php
$m=new \Model\Pub();
echo Form\Html::FormBegin($m);
?><br/>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
<?php
for($i=0;$i<count($rows);$i++)
{
    $FieldType='';
    if($rows[$i]['TYPE']==2)
        $FieldType='<script type="text/javascript">document.write(UploadText("'.$rows[$i]['PUB_ID'].'"))</script>';
?>
    <tr >
    <td width="173"><div align="right"><?php echo $rows[$i]['PUB_NAME'] ?>：</div></td>
    <td width="340">
    <input name="<?php echo $rows[$i]['PUB_ID'] ?>" type="text" id="<?php echo $rows[$i]['PUB_ID'] ?>" value="<?php echo $rows[$i]['PUB_VALUE'] ?>" />
    <?php echo $FieldType; ?>
    </td>
  </tr>
<?php
}
?>


<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td width="224">&nbsp;</td>
          <td width="145">

<?php echo Form\Html::ButtonajaxSubmit();?></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php echo Form\Html::FormEnd();?>
