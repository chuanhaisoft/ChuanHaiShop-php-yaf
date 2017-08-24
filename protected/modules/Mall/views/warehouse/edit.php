<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<body class="ext-gecko x-border-layout-ct">
<?php		
	echo EHtml::beginForm(); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
?>
<br/>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  
    <tr>
    <td width="126"><div align="right">名称：</div></td>
    <td><INPUT name="NAME" type="text" value="<?php echo $row["NAME"];?>"/></td>
  </tr>
    <tr>
    <td width="126"><div align="right">负责人：</div></td>
    <td><INPUT name="FZR" type="text" value="<?php echo $row["FU_ZE_REN"];?>"/></td>
  </tr>
  <tr>
    <td width="126"><div align="right">手机号：</div></td>
    <td><INPUT name="TEL" type="text" value="<?php echo $row["TEL"];?>"/></td>
  </tr>
    <tr>
    <td width="126"><div align="right">地址：</div></td>
    <td><INPUT name="ADDR" type="text" value="<?php echo $row["ADDR"];?>"/></td>
  </tr>
    <tr>
    <td width="126"><div align="right">备注：</div></td>
    <td><INPUT name="MESS" type="text" value="<?php echo $row["MESS"];?>"/></td>
  </tr>
  <tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td width="421">&nbsp;</td>
          <td width="969">

<?php 
echo EHtml::ajaxSubmitButton('提 交','',
	array(
		'beforeSend' => 'btnState',
		'complete' => 'btnState2',
		'dataType'=>'script',
		'error'=>'BtOnError',
		'update'=> '#response'),
		
		array('id'=> 'tijiao')
		); 
?></td>
        </tr>
      </table></td>
  </tr>
</table>


<?php echo EHtml::endForm();?>

