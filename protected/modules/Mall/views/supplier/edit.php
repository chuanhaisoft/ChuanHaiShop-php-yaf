 <script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<body>

<?php		
	echo EHtml::beginForm(); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  <tr>
    <td width="130"><div align="right">名称：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'NAME'); ?></td>
  </tr>
  <tr>
    <td><div align="right">分类：</div></td>
    <td><?php echo EHtml::activeRadioButtonList($m,'SORT',
    	array(
		'0'=>"零散",
        '1'=>"一级",
		'2'=>"二级",
		'3'=>"其他",
    ),array('separator'=>'')); ?></td>
  </tr>
  <tr>
    <td width="130"><div align="right">合同号：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'HT_NUM'); ?></td>
  </tr>
   <tr>
    <td><div align="right">合同上传：</div></td>
    <td><?php echo EHtml::activeTextField($m,'HT_FU'); ?><script type="text/javascript">document.write(UploadText('Supplier_HT_FU'))</script></td>
  </tr>
  <tr>
    <td width="130"><div align="right">供方代表：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'SNAME'); ?></td>
  </tr>
   <tr>
    <td width="130"><div align="right">供方电话：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'SMOB'); ?></td>
  </tr>
   <tr>
    <td width="130"><div align="right">需方代表：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'DNAME'); ?></td>
  </tr>
   <tr>
    <td ><div align="right">需方电话：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'DMOB'); ?></td>
  </tr>
    <tr>
    <td width="130"><div align="right">营业执照证件号：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'YY_NUM'); ?></td>
  </tr>

  <tr>
    <td><div align="right">营业执照图片：</div></td>
    <td><?php echo EHtml::activeTextField($m,'YY_PIC'); ?><script type="text/javascript">document.write(UploadText('Supplier_YY_PIC'))</script></td>
  </tr>

   <tr>
    <td width="130"><div align="right">法人代表：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'FA_REN'); ?></td>
  </tr>
    <tr>
    <td width="130"><div align="right">法人身份证：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'FR_IDC'); ?></td>
  </tr>
  
    <tr>
    <td><div align="right">身份证上传：</div></td>
    <td><?php echo EHtml::activeTextField($m,'IDC_PIC'); ?><script type="text/javascript">document.write(UploadText('Supplier_IDC_PIC'))</script></td>
  </tr>
  
    <tr>
    <td width="130"><div align="right">开户银行：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'BANK_NAME'); ?></td>
  </tr>
    <tr>
    <td width="130"><div align="right">银行卡号：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'BANK_NUM'); ?></td>
  </tr>
   <tr>
    <td ><div align="right">税号：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'TAX_NUM'); ?></td>
  </tr>
   <tr>
    <td ><div align="right">税率：</div></td>
    <td>
<?php echo EHtml::activeTextField($m,'TAX_RATE'); ?></td>
  </tr>
   <tr>
    <td><div align="right">付款方式：</div></td>
    <td><?php echo EHtml::activeRadioButtonList($m,'PAY_TYPE',
    	array(
		'0'=>"现金",
        '1'=>"供应商预付款",
		'2'=>"金额欠款", 
    ),array('separator'=>'')); ?></td>
  </tr>
   <tr>
    <td><div align="right">账期：</div></td>
    <td><?php echo EHtml::activeRadioButtonList($m,'ACC_TYPE',
    	array(
		'0'=>"实时",
        '15'=>"15天",
		'30'=>"30天",
		'45'=>"45天",
    ),array('separator'=>'')); ?></td>
  </tr>
  <tr>
    <td><div align="right">手机号码：</div></td>
    <td><?php echo EHtml::activeTextField($m,'MOBILE'); ?></td>
  </tr>
  
    
    <tr>
    <td><div align="right">联系地址：</div></td>
    <td><?php echo EHtml::activeTextField($m,'ADDR'); ?></td>
  </tr>
   <tr>
    <td valign="top"><div align="right" style="padding-top:5px">备注：</div></td>
	<td ><div style="width:85%"><?php  $this->renderPartial('//web//uedit',array('content'=>$Mess)); ?></div>
	
	</td>
  </tr>
  
  <tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td >

<?php 
echo EHtml::ajaxSubmitButton('保存数据','',
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

