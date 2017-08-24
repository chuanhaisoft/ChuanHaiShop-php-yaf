<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/form/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/form/additional-methods.js"></script>
<script type="text/javascript" src="/js/form/jquery.jfvalidate.helper.js"></script>
<script type="text/javascript" src="/js/form/text_cn.js"></script>


<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>


<script language="javascript">
var grid;
function SearchList()
{
	DoView();
}
function RadioValue(tmpValue)   
{   
	  var obj=document.getElementById(tmpValue);
	   return obj.value;  
}
function DealMoney(value, cellmeta, record)
{
	var Str=value*-1;
	try{return Str;}finally{Str = null;}
}


function TiXianState(value, cellmeta, record)
{
	var Str="已提交";
	if(value==1)
	{
		Str = FontRed("已审核");
	}
	if(value==2)
	{
		Str = FontRed("已完成");
	}
	if(value==3)
	{
		Str = FontRed("已驳回");
	}
	
	try{return Str;}finally{Str = null;}
}









</script>
<style type="text/css">
<!--
.STYLE1 {color: #00CC00}
-->
</style>

<body class="ext-gecko x-border-layout-ct">
<?php
if(false)$m=new \Model\User();
echo Form\Html::FormBegin($m);
?>
<br/>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">

 
  <tr>
    <td width="263"><div align="right">提现金额：</div></td>
    <td ><?php echo Form\Html::Input($m->_Money);?></td>
  </tr>

  


  
     <tr>
    <td></td>
    <td style="text-align: left"><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
    <?php 
echo Form\Html::ButtonajaxSubmit();
?>
      <br>
    <br></td>
  </tr>
</table>
<script type="text/javascript">

function MoneyChanged()
{
	$("#sxf").html('');
	if($("#Money_MONEY").val()=='')
	{
		return false;
	}
	var aj = $.ajax( 
	{  
		url:'/user/money/shouxufei.html',// 跳转到 action  
		data:{  
			MONEY : $("#Money_MONEY").val()
		},  
		type:'post',  
		cache:false,  
		dataType:'json',  
		success:function(data) {  
			if(data.error =="0" ){
				$("#sxf").html(data.msg);
				//alert(data.msg);
			}else{  
				$("#sxf").html(data.msg);
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
	$('#Money_MONEY').change(MoneyChanged);

});

function CheckForm()
{
	//alert('结算日不能提现');
	//return false;
}

</script>
<?php echo Form\Html::FormEnd();?>
<div style="float:left">
	<?php echo $GridHtml; ?>
</div>