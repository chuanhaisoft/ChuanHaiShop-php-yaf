<?php use Pub\Fram;
\Pub\Yaf::display('jq_form'); ?>
<body >
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

<?php		
	
	if(false)$m=new Model\OrderMallDetail();
	if(false)$order=new Model\OrderMall();
	echo Form\Html::FormBegin($m);
?>
<input id="DelRows" name="DelRows" type="hidden" value="">
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
    <tr>
    <td><div align="right">订单号：</div></td>
    <td><?php  echo $m->Id(); ?></td>
  </tr>
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
    <td><?php  echo $m->MoneyPro(); ?>
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
    <td><?php echo Bll\OrderMall::ShoppingAddress($m->OrderId()); ?></td>
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
    if( $m->State2()==1)
    {
?>
  <tr>
    <td valign="top"><div align="right" ></div></td>
	<td >请在收到货物后操作	</td>
  </tr>

<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>

<?php echo Form\Html::ButtonajaxSubmit(null,'确认收货');?></td>
        </tr>
      </table></td>
  </tr>

<?php 
    }
?>

<?php if((in_array($State2,array(1,2,2.5,2.6,2.7,2.8,2.9,4))||$show_tui)){?>
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
        <?php }else{
if(!$m->ShouHuoTime() || ($m->ShouHuoTime() && Pub\Fram::Time_Cha(Pub\Fram::Date(),$m->ShouHuoTime())<7)){
            ?>
        <select name="tui_reason">
            <option value="1">图片、产地、保质期等描述不符</option>
            <option value="2">认为是假货</option>
            <option value="3">商品破损问题</option>
            <option value="4">发货问题</option>
            <option value="5">商品变质</option>
            <option value="6">效果不好、不喜欢</option>
            <option value="7">认为是三无产品</option>
        </select>  
        <a id="tui_huo" class="btn_a" style="maring-left:12px;">申请退货</a>   
        <?php }}?>
    </td>
</tr>

<?php 
    }
?>

<?php if($State2==2.6){?>
    <tr class="tui_tr_fa">
    <td valign="top" align="right">物流公司：</td>
    <td id="tui_tr">
<?php \Pub\Yaf::display('kuai-di-gong-si-select',['value'=>$m->KuaiDiGongSi()]); ?>
</td></tr>
    <tr class="tui_tr_fa">
    <td valign="top" align="right">运单号：</td>
    <td id="tui_tr">
    <input name="TUI_KUAIDI_DANHAO" /></td></tr>
    <tr class="tui_tr_fa"><td></td>
    <td><a id="tui_huo_fa_huo" class="btn_a" style="maring-left:12px;">发货</a>   </td>
    </tr>
    
<?php }?>
<?php if(in_array($State2,array(2.5,2.6,2.7,2.8,2.9,4))){?>

 <tr>
        <td></td>
        <td>
        
        <?php 
            $RoleID=\Pub\SysFram::getLoginRoleID();
/**
		if(Bll\Role::Role_Id_User($RoleID))
		{?>
		
		<a href="javascript:OpenLayer('留言','/mall/tui_char/list.html?ID=<?php  echo $m->ID(); ?>',600,500)">留言</a>
		  
		<?php }else{?>
		
		<a href="javascript:window.OpenExtIframWindow2('/mall/tui_char/list.html?ID=<?php  echo $m->ID(); ?>','留言',600,500)">留言</a>
		
		<?php }
**/
		?>
        
        
  </td></tr>
  
  <?php }?>

</table>

<script type="text/javascript">
//申请退货
$('#tui_huo').click(function(){
    var ID = <?php  echo $m->ID(); ?>;
    var tui_reason = $('select[name=tui_reason]').val();

    $.ajax({
		url: '/mall/ordershop/tuihuo.html?ID='+ID,
		type: 'get',
		dataType: 'text',
		data: 'tui_reason='+tui_reason,				
		success: function(data) {
			if(data=="申请成功!"){
				$('#tui_tr').hide();
				location.reload();
			}
			alert(''+data);
		}
	});
    
	
});

</script>
<script type="text/javascript">
//退货单号
$('#tui_huo_fa_huo').click(function(){
    var ID = <?php  echo $m->ID(); ?>;
    var TUI_KUAIDI = $('input[name=kuai_di_gong_si_select_ids]').val();
    var TUI_KUAIDI_DANHAO = $('input[name=TUI_KUAIDI_DANHAO]').val();

    $.ajax({
		url: '/mall/ordershop/tui_huo_fa_huo.html?ID='+ID,
		type: 'get',
		dataType: 'text',
		data: 'TUI_KUAIDI_DANHAO='+TUI_KUAIDI_DANHAO+'&TUI_KUAIDI='+TUI_KUAIDI,				
		success: function(data) {
			if(data=="发货成功!"){
				$('.tui_tr_fa').hide();
			}
			alert(''+data);
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