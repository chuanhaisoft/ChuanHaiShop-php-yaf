<?php \Pub\Yaf::display('jq_form'); ?>
<?php
if(false)$m=new \Model\User();
echo Form\Html::FormBegin($m);
?>
<br/>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable"  id="mytable">
    <tr style="display:none">
    <td width="126"><div align="right">当前金额：</div></td>
    <td><?php echo $m->Money(); ?></td>
  </tr>
  <tr>
    <td><div align="right">操作对象：</div></td>
    <td><?php echo Form\Html::Input($m->_LoginName);?><span id="UserName" class="STYLE1"></span></td>
  </tr> 
    <tr>
    <td width="126"><div align="right">加减金额：</div></td>
    <td><?php echo Form\Html::Input($m->_Money);?>谨慎操，加10请输入10,减请输入负数</td>
  </tr>
      <tr>
    <td width="126"><div align="right">操作说明：</div></td>
    <td><INPUT name="MESS" id="MESS" value='' type="text" /></td>
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

<script type="text/javascript">
function UserChanged()
{
	$("#UserName").html('');
	if($("#LOGIN_NAME").val()=='')
	{
		return false;
	}
	var aj = $.ajax( 
	{  
		url:'/data_shop/order_user/checknum.html',// 跳转到 action  
		data:{  
			login_name : $("#User_LOGIN_NAME").val()
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

jQuery(function($){
	$('#User_CARD_NUM').change(UserChanged);
});
</script>

<?php echo Form\Html::FormEnd();?>

<div style="float:left">
	<?php echo $GridHtml; ?>
</div>
