</script><script type="text/javascript" src="/js/Ext_Css.js"></script>
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
<br/>
<script type="text/javascript">

	function RenZheng()
	{
		var money=0.1;
		var type=3;
		
		parent.parent.window.OpenExtIframWindow2('/user/money/addorder.html?userid=<?php echo $user["ID"]; ?>&money='+money+'&type='+type,'认证',document.body.clientWidth-100,parent.parent.window.document.documentElement.clientHeight-100);
	}
</script>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">

<tr>
    <td width="263"><div align="right">所属服务商：</div></td>
    <td><?php echo Bll_User::GetNameByID($user["LEVEL1"]).'-'.Bll_User::GetNameByID($user["LEVEL2"]).'-'.Bll_User::GetNameByID($user["LEVEL3"]).'-'.Bll_User::GetNameByID($user["LEVEL4"]).'-'.Bll_User::GetNameByID($user["LEVEL5"]); ?>
   
  </tr>
   <tr>
    <td><div align="right">服务人员：</div></td>
    <td><?php echo $TuiJianRen;echo "(".Bll_User::GetScalar("MOBILE_NUM", "ID=".$user['RECOMMEND_ID']).")" ?></td>
  </tr>
  
  <tr>
    <td width="263"><div align="right">商家名称：<font color="#CC0000">*</font></div></td>
    <td><?php echo EHtml::activeTextField($m,'NAME');  ?>
    
  </tr>

  <tr>
    <td><div align="right">联系电话：<font color="#CC0000">*</font></div></td>
    <td><?php echo EHtml::activeTextField($m,'MOBILE_NUM');  ?></td>
  </tr>
  
  


  <tr>
    <td><div align="right">证件号码：<font color="#CC0000">*</font></div></td>
    <td>
    <?php //echo EHtml::activeTextField($m_u,'ID_CARD'); ?>
	<?php  echo EHtml::activeTextField($m,'ID_CARD'); ?><font color="#CC0000">（营业执照的证件号）</font></td>
  </tr>  
 <!--    <tr>
    <td><div align="right"></div></td>
    <td ><img src="/images/abcbamk.png" /></td>
  </tr>-->
  
  <tr>
    <td><div align="right">证件图片：<font color="#CC0000">*</font></div></td>
    <td><?php echo EHtml::activeTextField($m,'YING_YE_ZHI_ZHAO'); ?><script type="text/javascript">document.write(UploadText('User_YING_YE_ZHI_ZHAO'))</script><font color="#CC0000">（营业执照的副本）</font></td>
  </tr>
 
    <tr>
    <td><div align="right">联系地址：<font color="#CC0000">*</font></div></td>
    <td ><?php echo EHtml::activeTextField($m,'ADDRESS'); ?><font color="#CC0000">（所在区县须同营业执照地址一致）</font></td>
  </tr>  

   <tr>
    <td></td>
    <td style="text-align: center"><br>
      
     
    <?php 
echo EHtml::ajaxSubmitButton('提交认 证','',
	array(
		'beforeSend' => 'btnState',
		'complete' => 'btnState2',
		'dataType'=>'script',
		'error'=>'BtOnError',
		'update'=> '#response'),
		
		array('id'=> 'tijiao')
		); 
?>
      <br>
    <br></td>
  </tr>

</table>

<?php echo EHtml::endForm();?>