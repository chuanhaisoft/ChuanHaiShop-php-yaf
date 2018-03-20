<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php \Pub\Yaf::display('jq_form'); ?>
<script type="text/javascript" src="/js/Common.js"></script>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

<style type="text/css">
body
{
	background:#FFFFFF;
}
</style>



<script type="text/javascript" src="/js/layer/layer/layer.js"></script>
<script type="text/javascript">
;!function(){

//加载扩展模块
layer.config({
    extend: 'extend/layer.ext.js'
});



}();

</script>

<?php
    if(false)$m=new Model\OrderMall();
    $u=Bll\User::Model($m->UserId());
    if(!$u)
        die('无法查询订单所属会员');

    
    $u_m=new \Model\User();$u_m->MONEY2=0;
    
    $PayHuiDian=($u->Point()>=$m->AllHuiDian())?$m->AllHuiDian():$u->Point();
    $m->PayHuiDian($PayHuiDian);
    $PayMoney=($u->Money()>=$m->MoneyAll())?$m->MoneyAll():$u->Money();
    $m->PayMoney(Pub\Number::Jian($PayMoney, $PayHuiDian));
    

	echo Form\Html::FormBegin($m);
?>
<style type="text/css">
.ext-gecko x-border-layout-ct
{
	background:#FFFFFF;
}
.mytable
{
	border:1px #cfdae8; background-color:#cfdae8; height:100%;
	 
}
.mytable tr
{
	border:1px #cfdae8; 
}
</style>


<div class="tab" style="width:90%; height:100%; margin-left:10px; ">
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="mytable" >
    <tr>
    <td colspan="3"><br/></>订单提交成功，请尽快支付订单。<br/></td>
  </tr>
  <tr>
    <td width="25%"><div align="right">订单金额：</div></td>
    <td ><span class="font_red"><?php echo $m->MoneyAll() ?></span></td>
    <td width="350px" rowspan="9" >
	<iframe id="ifr_pay" src="" width="100%" height="300px" allowTransparency="true" frameborder="0" style="overflow-x:hidden;overflow-y:hidden"></iframe>
	</td>
  </tr>
    <tr>
    <td><div align="right">订单积分：</div></td>
    <td><span class="font_red"><?php echo $m->AllHuiDian() ?></span></td>
    </tr>
  <tr>
    <td><div align="right">用户余额：</div></td>
    <td><?php echo $u->Money() ?></td>
    </tr>
  <tr>
    <td><div align="right">用户积分：</div></td>
    <td><?php echo $u->Point() ?></td>
    </tr>
  
  

  
  
  
    <tr>
    <td><div align="right">支付积分：</div></td>
    <td><?php echo Form\Html::Input($m->_PayHuiDian,['onchange'=>'HuiDianChanged();']);?>    </td>
    </tr>


  
    <tr>
    <td ><div align="right">支付金额：</div></td>
    <td><?php echo Form\Html::Input($m->_PayMoney,['onchange'=>'PayMoneyChanged();']);?>   </td>
    </tr>
  
  

<tr>
    <td ><div align="right" style="display:none" class="pay_chong_tr">充值金额：</div></td>
    <td >
	<div style="display:none" class="pay_chong_tr">
    <div>
        <input  value="1" checked="checked" type="radio" name="chong_type" id="chong_type_1"> <label for="chong_type_1">微信扫码支付</label>
    </div>
	<div style="padding-top:6px">
	<?php echo Form\Html::Input($m->_PayChongMoney,['readonly'=>'readonly']);?>
	<?php //echo EHtml::activeTextField($u_m,'MONEY2',array('readonly'=>'readonly')); ?></div> </div>    </td>
    </tr>

  
  
      <tr style="display:none">
    <td><div align="right" >支付密码：</div></td>
	<td ><?php //echo Form\Html::Password($m->_Address);?></td>
      </tr>
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>

            <?php echo Form\Html::ButtonajaxSubmit(null,'确认支付');?></td>
        </tr>
      </table></td>
    </tr>
</table>
</div>
<script type="text/javascript">
var OrderMoney=<?php  echo $m->MoneyAll();?>;
var OrderHuiDian=<?php  echo $m->AllHuiDian();?>;
var UserMoney=<?php echo $u->Money();?>;
var UserHuiDian=<?php echo $u->Point();?>;
var MaxHuiDian=<?php echo $PayHuiDian;?>;

function accAdd(arg1,arg2){ 
    var r1,r2,m; 
    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0} 
    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0} 
    m=Math.pow(10,Math.max(r1,r2)) 
    return (arg1*m+arg2*m)/m 
} 

function accSub(arg1,arg2){ 
       var r1,r2,m,n; 
       try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0} 
       try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0} 
       m=Math.pow(10,Math.max(r1,r2)); 
       //last modify by deeka 
       //动态控制精度长度 
       n=(r1>=r2)?r1:r2; 
       return ((arg1*m-arg2*m)/m).toFixed(n); 
}

function HuiDianChanged()
{
	var User_HUI_DIAN=$("#PAY_HUI_DIAN").val();var User_Pay_Money=0;
	if(!isNaN(User_HUI_DIAN))
	{
		if(User_HUI_DIAN>MaxHuiDian)
		{
			User_HUI_DIAN=MaxHuiDian;
			$("#PAY_HUI_DIAN").val(MaxHuiDian);
		}
		User_Pay_Money=accSub(OrderMoney,User_HUI_DIAN);
		if(User_Pay_Money>UserMoney)
		{
			User_Pay_Money=UserMoney;
		}
		$("#PAY_MONEY").val(User_Pay_Money);
	}
	else
	{
		alert("请输入正确的积分");
	}
    var cha=accAdd(User_HUI_DIAN,User_Pay_Money);
	if(cha<OrderMoney)
	{
		$(".pay_chong_tr").css("display",'block');
		$("#PAY_CHONG_MONEY").val(accSub(OrderMoney,cha));
		//document.getElementById('pay_chong_tr2').style.display='none';
	}
	else
	{
		$("#PAY_CHONG_MONEY").val(0);
		$(".pay_chong_tr").css("display",'none');
		//document.getElementById('pay_chong_tr2').style.display='block';
	}
		

}


function PayMoneyChanged()
{
	var User_HUI_DIAN=$("#PAY_HUI_DIAN").val();var User_Pay_Money=$("#PAY_MONEY").val();
	if(!isNaN(User_HUI_DIAN) || !isNaN(User_Pay_Money))
	{
		if(User_HUI_DIAN>MaxHuiDian)
		{
			User_HUI_DIAN=MaxHuiDian;
			$("#PAY_HUI_DIAN").val(MaxHuiDian);
		}
		var cha=accAdd(User_HUI_DIAN,User_Pay_Money);
		if(cha<OrderMoney)
		{
			$(".pay_chong_tr").css("display",'block');
			$("#PAY_CHONG_MONEY").val(accSub(OrderMoney,cha));
		}
		else
		{
			$("#PAY_CHONG_MONEY").val(0);
			$(".pay_chong_tr").css("display",'none');
		}
	}
	else
	{
		alert("请输入正确的支付积分,支付金额");
	}
    
		

}


HuiDianChanged();
function ChongZhi(id)
{
	$('#tijiao').hide();
	var _url='/mall/order/Caiwutoorder.html?id=<?php echo $m->Id();?>'+'&type='+$("input[name='chong_type']:checked").val();
	$('#ifr_pay').attr('src', _url);
}
</script>

<?php echo Form\Html::FormEnd();?>

</body>
</html>
