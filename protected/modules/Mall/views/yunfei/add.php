<?php \Pub\Yaf::display('jq_form'); ?>
<body class="ext-gecko x-border-layout-ct">
<?php
if(false)$m=new \Model\ProYunFei();
echo Form\Html::FormBegin($m);
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  <tr>
    <td width="110px"><div align="right">运费名称：</div></td>
    <td ><?php echo Form\Html::Input($m->_Name);?></td>
  </tr>
  <tr>
    <td ><div align="right">默认运费：</div></td>
    <td><?php echo Form\Html::Input($m->_PriceCount,null,['width'=>'100px']);?>件内
    ,运费<?php echo Form\Html::Input($m->_Price,null,['width'=>'100px']);?>元 
    </td>
  </tr>
  <tr>
    <td ><div align="right">包邮件数：</div></td>
    <td><?php echo Form\Html::Input($m->_BaoYouCount,null,['width'=>'100px']);?>件(达到此件数免邮费)
    
    </td>
  </tr>
  <tr>
    <td ><div align="right">续件：</div></td>
    <td>每增加<?php echo Form\Html::Input($m->_NextCount,null,['width'=>'100px']);?>件
    ,增加运费<?php echo Form\Html::Input($m->_PriceNext,null,['width'=>'100px']);?>元
    </td>
  </tr>
  <tr>
    <td><div align="right">产品所在地：</div></td>
    <td><?php \Pub\Yaf::display('sheng_shi_qu_select',['value'=>"{$m->Sheng()},{$m->Shi()},{$m->Qu()},{$m->Xian()}"]); ?>
	</td>
  </tr>


  
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>
<?php echo Form\Html::ButtonajaxSubmit();?></td>
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

$(function(){

	
	var YunFei_BAO_YOU_COUNT = $('#YunFei_BAO_YOU_COUNT').val();
	
	if(YunFei_BAO_YOU_COUNT==-1){
		$('#YunFei_BAO_YOU_COUNT').val('');
	}
});

</script>

<?php echo Form\Html::FormEnd();?>

