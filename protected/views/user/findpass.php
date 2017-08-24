<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
\Pub\Yaf::display('jq_form');
?>
<script type="text/javascript" src="/js/layui/layui.js"></script>
<script type="text/javascript" src="/js/Common.js"></script>
<link rel="stylesheet" href="/js/layui/css/layui.css" media="all">
<style type="text/css">
tr{height:38px}
.layui-form-switch{border-color: #5FB878;background-color: #5FB878;}
.layui-form-switch em {
    color: #ffffff!important;
}
.layui-form-switch i {
    background-color: #fff;
}
</style>
</head>

<body >
<?php
if(false)$m=new \Model\User();
echo Form\Html::FormBegin($m);
//$m->CaiId(11111111);
//print_r(\Yaf\Registry::get('chuan_hai_form_Model'));
?>
<script type="text/javascript">
var wait=0;var send_tpe='短信';
	function time(o) 
	{ 
	if (wait == 0) 
	{ 
	//o.removeAttribute("disabled");	
	o.html("获取验证码");
	wait = 0; 
	} else 
	{ 
	o.html("重新发送(" + wait + ")"); 
	wait--; 
	setTimeout(function() 
	{ 
		time(o) 
	}, 
	1000) 
	} 
	} 
function isMobile(mobile)
{
		var mreg =/^1[0-9]{10}$/;
		if(!mreg.test(mobile)){
			return false;
		}
		return true;
}
function SendMessage()
{
		var phoneno = $("#LOGIN_NAME").val();
		var codepic=$("#ADDRESS").val();
		if(!isMobile(phoneno))
		{
			alert("请输入您的手机号码!");
			return false;
		}
		if(!codepic)
		{
			alert("请输入图形验证码!");$("#ADDRESS").focus().select();return false;
		}
		if(wait>0)return false;
		wait=35;
	var aj = $.ajax( 
	{  
		url:'/user/SendmessFindpass.html',
		data:{  
			mobilenum : phoneno,
			codepic:codepic,
			send_type:send_tpe
		},  
		type:'post',  
		dataType:'script',
		cache:false,    
		success:function(data) {  

		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");  
		 }  
	}
	);

	//$("#message1").css('display','none');
	//$("#message2").css('display','show');
	time($("#message1"));
	


}
</script>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="8" class="layui-form">
    <tr>
    <td width="126"><div align="right" class="gaodu">手机号码：</div></td>
    <td><?php echo Form\Html::Input($m->_LoginName);?>
	<input type="checkbox" name="zzz" lay-skin="switch" lay-text="语音|短信" lay-filter="switchTest">
    <button onClick="SendMessage()" type="button" id= "message1" class="ui-button-text" >获取验证码</button>
    </td>
  </tr>
    <tr>
    <td width="126"><div align="right" class="gaodu">手机验证码：</div></td>
    <td><?php echo Form\Html::Input($m->_Area,null,['width'=>'100px']);?>
    </td>
  </tr>
    <tr>
    <td width="126"><div align="right" class="gaodu">图形验证码：</div></td>
    <td><?php echo Form\Html::Input($m->_Address,null,['width'=>'100px']);?> 
	<?php \Pub\Yaf::display('yan-zheng-ma',['h'=>'35px']);?></td>
  </tr>
    <tr>
    <td width="126"><div align="right" class="gaodu">新密码：</div></td>
    <td><?php echo Form\Html::Password($m->_LoginPass);?></td>
  </tr>
      <tr>
    <td width="126"><div align="right" class="gaodu">重复密码：</div></td>
    <td><?php echo Form\Html::Password($m->_City);?></td>
  </tr>
    
  <tr>
    <td><div align="right" class="gaodu"> </div></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td width="421">&nbsp;</td>
          <td width="969">

<?php 
echo Form\Html::ButtonajaxSubmit();
?></td>
        </tr>
      </table></td>
  </tr>
</table>
<script>
layui.use('form', function(){
  var form = layui.form();
  form.on('switch(switchTest)', function(data){send_tpe=this.checked ? '语音' : '短信'});
});
</script>
<?php echo Form\Html::FormEnd();?>
</body>
</html>
