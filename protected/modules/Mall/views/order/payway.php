<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>选择支付方式</title>
<link rel="stylesheet" href="/css/huiup.min2016.css"/>
<script src="/js/jquery-1.10.1.min.js"></script>
<script src="/js/main.js"></script>
</head>
<body>
<div class="type-index">
  <div class="headbar">
    <a class="button button-left" href="javascript:history.back();"><i class="icon iconfont">&#xe679;</i></a>
      <h1 class="title">选择支付方式</h1>

</div>
<script type="text/javascript" src="/js/Ext_Css.js"> </script>

<script type="text/javascript" src="/js/Css.js"></script>
<style  type="text/css">
.body
{
	background:#FFFFFF;
}
</style>
<body class="ext-gecko x-border-layout-ct" style="background-color:#FFFFFF; height:100%;">


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


    if(!$m)$m=new Model_OrderMall();
    $u=Bll_User::GetModel($m->UserId());if(!$u)$u=new Model_User();
    if(!Fram::CheckNum($u->Id()))
        die('无法查询订单所属会员');
    //未实名认证不能使用账户余额
    function IfPayUserYuEr($ID)
    {
        $c=Bll_OrderMallDetail::GetScalar("count(1)", "ORDER_ID='{$ID}' and (SHOP_ROLE_ID='79' or SHOP_ROLE_ID='80')");
        if($c==0)
            return true;
        else 
            return false;
    }
    /**
    $IsC=IfPayUserYuEr($m->Id());
    if($u->CheckUser()==0 || !$IsC)
    {
        $u->Money(0);
        $u->HuiDian(0);
    }
**/
    $CanPay = Bll_OrderMall::CanPayYuE($m->Id());
    if(Fram::CheckNum($CanPay,true))
        $u->Money($CanPay);

    
    $u_m=new User();$u_m->MONEY2=0;
    
    $PayHuiDian=($u->HuiDian()>=$m->AllHuiDian())?$m->AllHuiDian():$u->HuiDian();
    $PayMoney=($u->Money()>=$m->MoneyAll())?$m->MoneyAll():$u->Money();
    $u_m->HUI_DIAN=$PayHuiDian;
    $u_m->MONEY="$PayMoney"-"{$u_m->HUI_DIAN}";
    

	echo EHtml::beginForm(); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
?>
<style type="text/css">
.ext-gecko x-border-layout-ct
{
	background:#FFFFFF;
}
.mytable
{
	border:1px #cfdae8; background-color:#ffffff; height:100%;
	 border:solid thin #ffffff;
}
.mytable tr
{
	border:1px #cfdae8; background-color:#ffffff;
}
</style>


<div class="tab" style="width:100%; height:100%;  margin-top:10px;">
<table width="100%"  border="0"  cellpadding="0" cellspacing="0" class="mytable" >
    
  <tr>
    <td width="40%"><div align="right">订单金额：</div></td>
    <td ><span class="font_red"><?php echo $m->MoneyAll() ?></span></td>
  </tr>
    <tr>
    <td><div align="right">订单惠点：</div></td>
    <td><span class="font_red"><?php echo $m->AllHuiDian() ?></span></td>
  </tr>
  <tr>
    <td><div align="right">可使用金额：</div></td>
    <td><?php echo $u->Money() ?></td>
  </tr>
  <tr>
    <td><div align="right">可使用惠点：</div></td>
    <td><?php echo $u->HuiDian() ?></td>
  </tr>
  
  

  
  
  
    <tr>
    <td><div align="right">支付惠点：</div></td>
    <td><?php echo EHtml::activeTextField($u_m,'HUI_DIAN',array('onchange'=>'HuiDianChanged();')); ?></td>
  </tr>


  
    <tr>
    <td ><div align="right">支付金额：</div></td>
    <td><?php echo EHtml::activeTextField($u_m,'MONEY',array('onchange'=>'PayMoneyChanged();')); ?></td>
  </tr>
  
  

<tr>
    <td ><div align="right" style="display:none" class="pay_chong_tr">充值金额：</div></td>
    <td >
	<div style="display:none" class="pay_chong_tr">
    <div><input  value="1" checked="checked" type="radio" name="chong_type" id="chong_type_1"> <label for="chong_type_1">易宝网银支付</label>
    <input value="2" type="radio" name="chong_type"  id="chong_type_2"> <label for="chong_type_2">易宝快捷支付</label></div>
	<div style="padding-top:6px"><?php echo EHtml::activeTextField($u_m,'MONEY2',array('readonly'=>'readonly')); ?></div> </div>    </td>
</tr>

  
  
      <tr>
    <td><div align="right" >支付密码：</div></td>
	<td ><?php echo EHtml::activePasswordField($u_m,'NAME'); ?></td>
      </tr>
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>

            <?php 
echo EHtml::ajaxSubmitButton('确认支付','',
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
</div>
<script type="text/javascript">
var OrderMoney=<?php  echo $m->MoneyAll();?>;
var OrderHuiDian=<?php  echo $m->AllHuiDian();?>;
var UserMoney=<?php echo $u->Money();?>;
var UserHuiDian=<?php echo $u->HuiDian();?>;
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
	var User_HUI_DIAN=$("#User_HUI_DIAN").val();var User_Pay_Money=0;
	if(!isNaN(User_HUI_DIAN))
	{
		if(User_HUI_DIAN>MaxHuiDian)
		{
			User_HUI_DIAN=MaxHuiDian;
			$("#User_HUI_DIAN").val(MaxHuiDian);
		}
		User_Pay_Money=accSub(OrderMoney,User_HUI_DIAN);
		if(User_Pay_Money>UserMoney)
		{
			User_Pay_Money=UserMoney;
		}
		$("#User_MONEY").val(User_Pay_Money);
	}
	else
	{
		alert("请输入正确的惠点");
	}
    var cha=accAdd(User_HUI_DIAN,User_Pay_Money);
	if(cha<OrderMoney)
	{
		$(".pay_chong_tr").css("display",'block');
		$("#User_MONEY2").val(accSub(OrderMoney,cha));
		//document.getElementById('pay_chong_tr2').style.display='none';
	}
	else
	{
		$("#User_MONEY2").val(0);
		$(".pay_chong_tr").css("display",'none');
		//document.getElementById('pay_chong_tr2').style.display='block';
	}
		

}


function PayMoneyChanged()
{
	var User_HUI_DIAN=$("#User_HUI_DIAN").val();var User_Pay_Money=$("#User_MONEY").val();
	if(!isNaN(User_HUI_DIAN) || !isNaN(User_Pay_Money))
	{
		if(User_HUI_DIAN>MaxHuiDian)
		{
			User_HUI_DIAN=MaxHuiDian;
			$("#User_HUI_DIAN").val(MaxHuiDian);
		}
		var cha=accAdd(User_HUI_DIAN,User_Pay_Money);
		if(cha<OrderMoney)
		{
			$(".pay_chong_tr").css("display",'block');
			$("#User_MONEY2").val(accSub(OrderMoney,cha));
		}
		else
		{
			$("#User_MONEY2").val(0);
			$(".pay_chong_tr").css("display",'none');
		}
	}
	else
	{
		alert("请输入正确的支付惠点,支付金额");
	}
    
		

}


HuiDianChanged();
function ChongZhi()
{
	money=$("#User_MONEY2").val();
	if(!money || isNaN(money))
	{alert('充值金额错误，请重新输入');return false;}
	var type=$("input[name='chong_type']:checked").val();
	OpenLayer2('充值','/mall/order/addorder.html?order_mall_id=<?php echo $m->Id();?>&userid=<?php echo $m->UserId();?>&money='+money+'&type='+type,document.body.clientWidth-50,window.document.documentElement.clientHeight-50);
	//parent.parent.window.OpenExtIframWindow2('/user/money/addorder.html?userid=<?php //echo $u["ID"]; ?>&money='+money+'&type='+type,'充值',document.body.clientWidth-100,parent.parent.window.document.documentElement.clientHeight-100);
}
</script>
</body>
<?php echo EHtml::endForm();?>

