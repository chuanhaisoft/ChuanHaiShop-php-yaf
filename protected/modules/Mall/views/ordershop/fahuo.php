<?php \Pub\Yaf::display('jq_form'); ?>
<body>

<?php
if(false)$m=new \Model\OrderMallDetail();
if(false)$order=new Model\OrderMall();
echo Form\Html::FormBegin($m);
?>
<style type="text/css">
.mytable
{
	border:1px #cfdae8; background-color:#cfdae8
}
.mytable tr
{
	border:1px #cfdae8; background-color:#ffffff;
}
</style>

<input id="DelRows" name="DelRows" type="hidden" value="">
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">

<?php if(!Bll\Role::Role_Id_User(Pub\SysFram::getLoginRoleID())&&$order->State()==1){?>
<div style="border: 1px #cfdae8;padding:5px 8px;background:#fff;">
    <span class="order_num">总金额：<label>￥<?php echo $order->MoneyAll();?></label></span>
    <span class="order_num">余额支付金额：<label>￥<?php echo $order->PayMoney();?></label></span>
    <span class="order_num">充值支付金额：<label>￥<?php echo $order->PayChongMoney();?></label></span>
    <span class="order_num">惠点支付：<label><?php echo $order->PayHuiDian();?></label></span>
</div>
<?php }?>
  <tr>
    <td><div align="right">会员：</div></td>
    <td><?php  echo Bll\User::GetNameByID($m->UserId()); ?>【<?php  echo Bll\User::GetLoginNameByID($m->UserId());?>】</td>
  </tr>
  
  <tr>
    <td><div align="right">订单号：</div></td>
    <td><?php  echo $m->Id(); ?></td>
  </tr>
  
  <?php if ($order->PayChongZhiOrderNum()) {?>
  
  
  <tr style="display: none">
    <td><div align="right">充值定单号：</div></td>
    <td><?php  echo $order->PayChongZhiOrderNum(); ?></td>
  </tr>
  
  <?php }?>
  <tr>
    <td width="20%"><div align="right">产品：</div></td>
    <td ><?php  echo $m->ProName(); ?></td>
  </tr>
    <tr>
    <td><div align="right">型号：</div></td>
    <td><?php  echo $m->ProTypeName(); ?></td>
  </tr>
  <tr>
    <td><div align="right">售价：</div></td>
    <td><?php  echo $m->MoneyPro(); ?> * <?php  echo $m->ProCount(); ?> = <?php  echo Pub\Number::Cheng($m->MoneyPro(), $m->ProCount()); ?>
	&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">运费：</div></td>
    <td><?php  echo $m->MoneyYunFei(); ?></td>
  </tr>
  <tr>
    <td><div align="right">实付金额：</div></td>
    <td><?php  echo $m->PayMoney(); ?></td>
  </tr>
    <tr>
    <td><div align="right">实付惠点：</div></td>
    <td><?php  echo $m->PayHuiDian(); ?></td>
  </tr>
  <?php if($m->Mess()){?>
  <tr>
    <td><div align="right">备注：</div></td>
    
    <td><?php echo $m->Mess()?></td>
  </tr>
<?php }?>
  <tr>
    <td><div align="right">收货地址：</div></td>
    <td><?php echo \Bll\OrderMall::ShoppingAddress($m->OrderId()); ?></td>
  </tr>
  <tr>
    <td><div align="right">收货人姓名：</div></td>
    <td><?php echo $order->AddrPersonName(); ?></td>
  </tr>
  <tr>
    <td><div align="right">收货人电话：</div></td>
    <td><?php echo $order->AddrPersonTel(); ?></td>
  </tr>
  
  <?php if($m->KuaiDiDanHao()){?>
  
  <tr>
    <td><div align="right">快递单号：</div></td>
    <?php $all_kuaidi = Bll\ProYunFei::GetData_yun_fei();?>
    <td><?php echo $m->KuaiDiDanHao(); ?> (<?php  if(isset($all_kuaidi[$m->KuaiDiGongSi()])){ echo $all_kuaidi[$m->KuaiDiGongSi()]['name']; } ?>)</td>
  </tr>
<?php }?>
  <?php if($m->FaHuoTime()){?>
  
  <tr>
    <td><div align="right">发货时间：</div></td>
    
    <td><?php echo $m->FaHuoTime()?></td>
  </tr>
<?php }?>
  <?php if($m->ShouHuoTime()){?>
  
  <tr>
    <td><div align="right">收货时间：</div></td>
    
    <td><?php echo $m->ShouHuoTime()?></td>
  </tr>
<?php }?>




  
<?php 
    if($order->State()==1&&($State2==1||$State2==0)&&!in_array($State2,array(2.5,2.6,2.7,2.8,2.9,4)))
    {
?>
  <tr>
    <td valign="top"><div align="right" >物流公司：</div></td>
	<td ><?php \Pub\Yaf::display('kuai-di-gong-si-select',['value'=>$m->KuaiDiGongSi()]); ?>	</td>
  </tr>
  <tr>
    <td ><div align="right" >物流单号：</div></td>
	<td ><input name="dan_hao" type="text" id="dan_hao" value="<?php  echo $m->KuaiDiDanHao(); ?>" />	</td>
  </tr>
<tr>
    <td></td>
    <td><table width="60%" border="0" cellspacing="0">
        <tr>
          <td>

<?php 
$RoleID=Pub\SysFram::getLoginRoleID();
if(\Bll\Role::Role_Id_Shop($RoleID) || $RoleID==1)
{
    echo Form\Html::ButtonajaxSubmit();
}
?></td> 
<?php if($show_delay_shou_huo){?>
<td><a id="Delay_Shou_huo" style="    background: #0AE;display: inline-block;    line-height: 30px;    padding: 0px 30px;    border: 0px none;    color: #FFF;    height: 30px;    cursor: pointer;    border-radius: 4px;    font-size: 18px;">延期收货</a>
      </td>
      <?php }?>
        </tr>
      </table>
      
      </td>
      
      
  </tr>
<?php 
    }
?>

<?php if(in_array($State2,array(2.5,2.6,2.7,2.8,2.9,4))){?>
<tr>
    <td><div align="right">退货时间：</div></td>
    
    <td><?php echo $m->TuiTime();?></td>
  </tr>
<tr>
    <td valign="top" align="right">退货：</td>
    <td id="tui_tr">
        <?php if($State2==2.5){?>
                        等待商家处理
        <?php }elseif($State2==2.6){?>
                        商家同意 等待发货
        <?php }elseif($State2==2.7){?>
                         商家拒绝退货
        <?php }elseif($State2==2.8){?>
                          买家已发货
        <?php }elseif($State2==4){?>
                        退货完成
        <?php }?>
        
        
        <?php switch($TuiReason){
            case  1 : echo '(图片、产地、保质期等描述不符)'; break;
            case  2 : echo '(认为是假货)'; break;
            case  3 : echo '(商品破损问题)'; break;
            case  4 : echo '(发货问题)'; break;
            case  5 : echo '(商品变质)'; break;
            case  6 : echo '(效果不好、不喜欢)'; break;
            case  7 : echo '(认为是三无产品)'; break;
            
        }
        ?>
        
       </td>
</tr>
 
   <?php if($m->TuiFahuoTime()){?>
  
  <tr>
    <td><div align="right">退货发货时间：</div></td>
    
    <td><?php echo $m->TuiFahuoTime();?></td>
  </tr>
   <tr>
    <td><div align="right">退货发货快递单号：</div></td>
    
    <td><?php echo $m->TuiKuaidiDanhao();?></td>
  </tr>
<?php }?>

<?php if($m->TuiShouhuoTime()){?>
  
  <tr>
    <td><div align="right">退货收货时间：</div></td>
    
    <td><?php echo $m->TuiShouhuoTime();?></td>
  </tr>
   
<?php }?>
  
        <?php if(in_array($State2,array(2.5))){?>
        <tr>
        <td></td>
        

            <td>
                <a id="" tongyi="1" class="btn_a tongyi_tui_huo" style="maring-left:12px;">同意退货</a>   
                <a id="" tongyi="2" class="btn_a tongyi_tui_huo" style="maring-left:12px;">拒绝退货</a>   
            </td>
        </tr>
        
        <?php }?>
        <?php if(in_array($State2,array(2.8))){?>
        <tr class="tui_tr_queren">
        <td></td>
            <td>
                <a class="btn_a tui_huo_shou_huo" style="maring-left:12px;">确认收货</a>   
            </td>
        </tr>
        
        <?php }?>
        
        
        
        <?php if(in_array($State2,array(2.7))&&(Pub\SysFram::getLoginRoleID()==1)){?>
        <tr class="tui_tr_queren">
        <td align="right">协调:</td>
            <td>
                <input checked type="radio" name="xie_tiao_value" value="1"> 协调完成   
                <input type="radio" name="xie_tiao_value" value="2"> 完成退货 退款  
                <input type="radio" name="xie_tiao_value" value="3"> 驳回退货确认收货
                   
            </td>
            </tr></tr>
        <td></td>
            <td>
                <a class="btn_a xie_tiao_wan_cheng" style="maring-left:12px;">提交</a>   
            </td>
            
        </tr>
        
        <?php }?>
        
        <tr>
        <td></td>
        <td>
        
        <a style="display:none" href="javascript:window.OpenExtIframWindow2('/mall/tui_char/list.html?ID=<?php  echo $m->ID(); ?>','留言',600,500)">留言</a>
  </td></tr>
<?php }?>


</table>


<script type="text/javascript">
//延期收货
$('#Delay_Shou_huo').click(function(){
    var ID = <?php  echo $m->ID(); ?>;
    var RoleID = <?php  echo \Pub\SysFram::getLoginRoleID(); ?>;

    $.ajax({
		url: '/mall/ordershop/delay_Shou_huo.html?ID='+ID,
		type: 'get',
		dataType: 'text',
		data: '',				
		success: function(data) {
			if(data=="延期收货成功"){
				$('#Delay_Shou_huo').hide();
			}
			parent.window.ExtAlert(''+data);
		}
	});
    
	
});

</script>

<script type="text/javascript">
//处理退货
$('.tongyi_tui_huo').click(function(){
    var ID = <?php  echo $m->ID(); ?>;
    var Tongyi = $(this).attr('tongyi');

    $.ajax({
		url: '/mall/ordershop/Chuli_tui_huo.html?ID='+ID,
		type: 'get',
		dataType: 'text',
		data: 'tongyi='+Tongyi,				
		success: function(data) {
			
			parent.window.ExtAlert(''+data);
			location.reload();
		}
	});
    
	
});

</script>
<script type="text/javascript">
//退货确认收货
$('.tui_huo_shou_huo').click(function(){
    var ID = <?php  echo $m->ID(); ?>;

    $.ajax({
		url: '/mall/ordershop/tui_huo_shou_huo.html?ID='+ID,
		type: 'get',
		dataType: 'text',
					
		success: function(data) {
			if(data=="收货成功!"){
				$('.tui_tr_queren').hide();
				location.reload();
			}
			parent.window.ExtAlert(''+data);
		}
	});
    
	
});

</script>
<script type="text/javascript">
//协调完成
$('.xie_tiao_wan_cheng').click(function(){
    var ID = <?php  echo $m->ID(); ?>;
    var xie_tiao_value = $('input[name=xie_tiao_value]:checked').val();

    $.ajax({
		url: '/mall/ordershop/xie_tiao_wan_cheng.html?ID='+ID+'&xie_tiao_value='+xie_tiao_value,
		type: 'get',
		dataType: 'text',
					
		success: function(data) {
			if(data=="操作成功!"){
// 				$('.tui_tr_queren').hide();
				location.reload();
			}
			parent.window.ExtAlert(''+data);
		}
	});
    
	
});

</script>
<style>
    .btn_a{
	background: #0AE;display: inline-block;    line-height: 30px;    padding: 0px 30px;    border: 0px none;    color: #FFF;    height: 30px;    cursor: pointer;    border-radius: 4px;    font-size: 18px;
    }
</style>
<?php echo Form\Html::FormEnd();?>

