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
    <td colspan="2"><div align="left">申请开展线上业务，服务条款：
      <input name="tong_ti_tiao_kuan" type="hidden" id="tong_ti_tiao_kuan" value="1">
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="left">
      <label>
      <textarea name="textfield"  style="width:98%; height:300px">
<?php 
    echo Bll_News::GetScalar('MESS', "ID=2");
?>

	  </textarea>
      </label>
    </div></td>
  </tr>
  

<tr>
    <td width="11%"></td>
    <td width="89%"><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>
<script type="text/javascript">
function CheckForm()
{
	btnState();
}
</script>
            <?php 
echo EHtml::ajaxSubmitButton('开通线上销售业务','',
	array(
		'beforeSend' => 'CheckForm',
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

