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
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  <tr>
    <td width="110px"><div align="right">运费名称：</div></td>
    <td ><?php echo EHtml::activeTextField($m,'NAME'); ?></td>
  </tr>
  <tr>
    <td ><div align="right">默认运费：</div></td>
    <td><?php echo EHtml::activeTextField($m,'PRICE_COUNT',array('style'=>'width:100px')); ?>件内
    ,运费<?php echo EHtml::activeTextField($m,'PRICE',array('style'=>'width:100px')); ?>元 
    </td>
  </tr>
  <tr>
    <td ><div align="right">包邮件数：</div></td>
    <td><?php echo EHtml::activeTextField($m,'BAO_YOU_COUNT',array('style'=>'width:100px')); ?>件
    
    </td>
  </tr>
  <tr>
    <td ><div align="right">续件：</div></td>
    <td>每增加<?php echo EHtml::activeTextField($m,'NEXT_COUNT',array('style'=>'width:100px')); ?>件
    ,增加运费<?php echo EHtml::activeTextField($m,'PRICE_NEXT',array('style'=>'width:100px')); ?>元
    </td>
  </tr>
  <tr>
    <td><div align="right">产品所在地：</div></td>
    <td><?php  $this->renderPartial('mall.views.web.sheng_shi_qu_select',array('value'=>"{$m->SHENG},{$m->SHI},{$m->QU},{$m->XIAN}")); ?>
	
	</td>
  </tr>


  
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>
<script type="text/javascript">
function CheckForm()
{
	btnState();
}
</script>
            <?php 
echo EHtml::ajaxSubmitButton('保存数据','',
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
<script type="text/javascript">

function UserChanged()
{
	$("#UserName").html('');
	if($("#User_ADD_USER_ID").val()=='')
	{
		return false;
	}
	var aj = $.ajax( 
	{  
		url:'/data_shop/order_user/checkcardnum.html',// 跳转到 action  
		data:{  
			card_num : $("#User_ADD_USER_ID").val()
		},  
		type:'post',  
		cache:false,  
		dataType:'json',  
		success:function(data) {  
			if(data.error =="0" ){
				$("#UserName").html(data.msg);
				//alert(data.msg);
			}else{  
				$("#UserName").html(data.msg);
			}  
		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");  
		 }  
	}
	);

}


</script>

<?php echo EHtml::endForm();?>

