<html><head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/search-1185.css">
	<link rel="stylesheet" href="/css/order/order_list.css">
	<script src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.js"></script>
	<script src="/js/order/order_list.js"></script>
	<script src="/js/Common.js"></script>
	<title>我的订单</title>
</head>
<body style="background: #fff;">
	<div class="container">
<link rel="stylesheet" href="/css/common/_top_1185.css" type="text/css">
<script src="http://apps.bdimg.com/libs/jquery.cookie/1.4.1/jquery.cookie.min.js"></script>

<div style="height:20px;"></div>

<script>
    var windows_width = document.body.clientWidth*0.8;
    var windows_height = window.document.documentElement.clientHeight*0.8;
    if(windows_width>1000){
    	windows_width=1000;
    }
    if(windows_height>600){
    	windows_height = 750;
    }
    
</script>
		
		<div id="content" class="clear">
			<div class="wrap_option">
				<div id="option" class="option">
					<div class="wrapInner_option">
						<ul>
							<li <?php if($status==0){?>class="current"<?php }?>><a href="/mall/order_shop/Order_detail_list_new.html"><span>全部订单</span><sup style="right: -7px;"><?php echo $all_count?></sup></a></li>
							<li <?php if($status==1){?>class="current"<?php }?>><a href="/mall/order_shop/Order_detail_list_new.html?status=1"><span>待付款</span><sup><?php echo $daifu_count;?></sup></a></li>
							<li <?php if($status==2){?>class="current"<?php }?>><a href="/mall/order_shop/Order_detail_list_new.html?status=2"><span>待发货</span><sup><?php echo $daifa_count;?></sup></a></li>
							<li <?php if($status==3){?>class="current"<?php }?>><a href="/mall/order_shop/Order_detail_list_new.html?status=3"><span>待评价<span><sup><?php echo $daiping_count;?></sup></span></span></a></li>
							<li <?php if($status==4){?>class="current"<?php }?>><a href="/mall/order_shop/Order_detail_list_new.html?status=4"><span>已退货 <span><sup><?php echo $tuihuo_count; ?></sup></span></span></a></li>
    
						</ul>
						<div class="option_current" style="width: 80px; left: 0px;"></div>
					</div>
				</div>
			</div>
			<div class="title_wrap">
				<div id="order_title">
                				<table width="100%" border="0" cellpadding="0" cellspacing="0"  >
      <tr>
        <td width="0"></td><td >
        <span >
<?php if(SysFram::getLoginRoleID()!=76 && SysFram::getLoginRoleID()!=77 && SysFram::getLoginRoleID()!=78){?>
        <span class="STYLE1">会员卡号:</span>
         <input name="hnum" type="text" id="hnum" size="10" />
<?php }?>
        <span class="STYLE1">订单号:</span>
         <input name="num" type="text" id="num" size="10" />
        <span class="STYLE1">编号:</span>
         <input name="mall_id" type="text" id="mall_id" size="10" />
         <span class="STYLE1">产品名称:</span>
         <input name="name" type="text" id="name" size="15" />
         <span class="STYLE1">订单积分:</span>
         <input name="ppoint" type="text" id="ppoint" size="10" /><BR>
         订单时间 从：<input name="st" style="width:100px" type="text" class="Wdate" id="starttime" onClick="WdatePicker()">
   到：<input name="ed" style="width:100px" type="text" class="Wdate" id="endtime" onClick="WdatePicker()">
   <span >&nbsp;支付状态</span>:
        <select class="SearchItem" name="zt" id="zhuangtai">
<option class="SearchItem" value="0"  selected="selected"> 所有</option>
<option class="SearchItem"  value="1" > 未支付</option>
<option class="SearchItem"  value="2"  >已支付</option>
 </select>
<span >&nbsp;发货状态</span>:
        <select class="SearchItem" name="ft" id="ft">
<option class="SearchItem" value="0"  selected="selected">所有</option>
<option class="SearchItem"  value="1" > 待发货</option>
<option class="SearchItem"  value="2"  > 已发货</option>
<option class="SearchItem"  value="3" > 已收货 </option>
<option class="SearchItem"  value="4" > 完成 </option>
<option class="SearchItem"  value="5" > 已退货</option>
</select>
 <script type="text/javascript">



function TimeSearch()
{
	var num = document.getElementById('num').value;
	var hnum = document.getElementById('hnum').value;
	var mall_id = document.getElementById('mall_id').value;
	var name = document.getElementById('name').value;
	var st = document.getElementById('starttime').value;
	var ed = document.getElementById('endtime').value;
	var zt = document.getElementById('zhuangtai').value;
	var ft = document.getElementById('ft').value;
	location.href="/mall/order_shop/Order_detail_list_new.html?status=<?php echo $status; ?>&num="+num+"&hnum="+hnum+"&mall_id="+mall_id+"&name="+name+"&st="+st+"&ed="+ed+"&zt="+zt+"&ft="+ft;

}
</script>
         
  
      <input type="button" name="button" id="button" value="查 询"  onclick="TimeSearch()" />
        </td>
        <td width="0"></td>
      </tr>
      </table>
					<div class="order_title_fl"><span>商城订单<label>&gt;</label></span><a href="javascript:;">
					   <?php if($status==0){?>
					                       全部订单
					   <?php }elseif($status==1){?>
					                       待付款订单
					   <?php }elseif($status==2){?>
					                       待发货订单
					   <?php }elseif($status==3){?>
					                       待评论订单
					   <?php }?>
					
					</a></div>
				</div>
			</div>
			<div class="wrap_order_list">
				<div class="no_order">
					<div class="to_tip">
						您暂时还没有订单哦，去看看心仪的商品吧！<br>
						<a href="#">去购物&gt;</a>
					</div>
				</div>
				<div class="order_list">
					<table cellpadding="0" cellspacing="0">		
						<thead>
							<tr>
								<th class="order_details">订单详情</th>
								<th class="receiver">收货人</th>
								<th class="money">金额</th>
								<th class="full_state">
									<ul>
										<li>
											<a class="sear_titl" href="javascript:;">状态</a>
											<a class="select_img" href="javascript:;"></a>
											<div class="full_state_list" style="display:none">
												<a href="javascript:;">menu1</a>
												<a href="javascript:;">menu2</a>
												<a href="javascript:;">menu3</a>
												<a href="javascript:;">menu1</a>
												<a href="javascript:;">menu2</a>
												<a href="javascript:;">menu3</a>
											</div>
										</li>
									</ul>
								</th>
								<th class="operate">操作</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="5" style="height:22px;"></td>
							</tr>
				  		</tbody>
				  		
				  		<?php $LAEST_ORDER_ID = 0;$begin=0;?>
				  		
				  		
				  		<?php foreach ($rs as $v){?>
				  		
				  		<?php if($LAEST_ORDER_ID!=$v['ORDER_ID']&&$LAEST_ORDER_ID!=0){?>	
						<?php $begin=0;?>
				  		</tbody>
						<tbody>
							<tr>
								<td colspan="5"></td>
							</tr>
				  		</tbody>
						<?php }?>
				  		
				  		<?php if($LAEST_ORDER_ID!=$v['ORDER_ID']){?>
				  		<?php $begin = 1;?>
						<tbody class="list_tbody">
							<tr class="title_list">
								<td colspan="5">
									<span><?php echo $v['ADD_TIME']?></span>
									<span class="order_num">订单号：<label><?php echo $v['ORDER_ID']?></label> </span>
									<span class="order_num">
									<?php if($v['STATE']==1){
    								    		echo '已支付';
    								    	}elseif($v['STATE']==0){
                                                echo '未支付';
                                     }elseif($v['STATE']==0.1){
                                                echo '未支付';
                                     }elseif($v['STATE']==-1){
                                                echo '已取消';
                                     }elseif($v['STATE']==-1.1){
                                                echo '已取消';
                                     }
                                     
                                     ?>
                                         </span>   
                                         <span class="order_num">
                                            <?php if($v['STATE']!=1&&$v['STATE']!=-1&&$v['STATE']!=-1.1){?>
    								    	<a  href="javascript:OpenLayer('订单详情','/mall/order.html?id=<?php echo $v['ORDER_ID']?>',windows_width,windows_height);" >支付</a>
    								<?php } ?>
    								</span>
    								
    								<?php if($v['STATE']==1){?>
        								<span class="order_num">总金额：<label>￥<?php echo $v['Mall_MONEY_ALL'];?></label></span>
        								<span class="order_num">余额支付金额：<label>￥<?php echo $v['Mall_PAY_MONEY']?></label></span>
        								<span class="order_num">充值支付金额：<label>￥<?php echo $v['Mall_PAY_CHONG_MONEY']?></label></span>
        								<span class="order_num">惠点支付：<label><?php echo $v['Mall_PAY_HUI_DIAN']?></label></span>
    								<?php 
                                     
                                     }else{?>
    								    <span class="order_num">总金额：<label>￥<?php echo $v['MONEY_ALL']?></label></span>
    								<?php }?>
    							
								</td>
							</tr>
							
					   <?php }?>
							<tr class="myList">
								<td class="myList_td1 order_details">
									<div class="myList_td1_div">
										<div class="prod_img">
										
										<?php $pro = Bll_Pro::GetSingleRow('','PIC',$v['PRO_ID']);?>
											<a href="http://jshmart.com/detail?id=<?php echo $v['PRO_ID']?>" target="_blank">
												<img src="<?php echo Fram::Img_Url($pro['PIC']); ?>" style="width: 66px;height: 66px;">
											</a>
										</div>
										<div class="prod_name">
											<a href="http://jshmart.com/detail?id=<?php echo $v['PRO_ID']?>" target="_blank">
											<?php echo $v['PRO_NAME'];?>
											</a>
										</div>
										<div class="prod_num"><?php echo $v['ID']?></div>
										<div class="return_repair">
										  x<?php echo $v['PRO_COUNT']?>
										 </div>
									</div>
								</td>
								<td rowspan="1" class="receiver">
									<?php echo $v['ADDR_PERSON_NAME']?>
								</td>
								<td rowspan="1" class="inf-amount-total money">
									金额  ￥<?php echo $v['PAY_MONEY']?>
									<div style="display: none;"></div>
									<div style="display: none;">在线支付</div>
								</td>
								<td rowspan="1" class="inf-state full_state">
								    <?php 
								        if($v['STATE2']==0){
    								    	echo '待发货';							        
								        }elseif($v['STATE2']==1){
                                            echo '已发货';
								        }elseif($v['STATE2']==2){
								    	    echo '已收货';
								        }elseif($v['STATE2']==3){
								    	    echo '完成';
								        }elseif($v['STATE2']==2.5 || $v['STATE2']==2.6 || $v['STATE2']==2.8){
								    	    echo '退货中';
								        }elseif($v['STATE2']==4){
								    	    echo '已退货';
								        //}elseif($v['STATE2']==-1 || $v['STATE2']==-1.1){
								        //    echo '订单已取消';
								        
								    	 }elseif($v['STATE2']==-1.2){
                                            echo '未发货取消';
								    	    
								        }
								    ?>
								
									<div></div>
									<a href="javascript:OpenLayer('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>');" target="_blank">订单详情</a>
									<br/>
									
									<?php if($v['STATE2']==-1){?>
									<a style="margin-top: 5px;    display: inline-block;" href="javascript:OpenLayer('修改运费','/mall/order_shop/change_yunfei.html?ID=<?php echo $v['ID']?>');" target="_blank">修改运费</a>
								    <?php }?>
								</td>
								<td rowspan="1" class="inf-cz operate">
								<?php if($v['STATE2']==3&&$v['IS_PING_JIA']==0&&$v['USER_ID']==SysFram::GetLoginID()){?>
									<a class="pingjia_btn" val="<?php echo $v['ID']?>" href="javascript:void(0);">评价</a>
								<?php }?>
								
								<?php if($v['IS_PING_JIA']==1){?>
								    <a class="pingjia_btn_show" val="<?php echo $v['ID']?>" class="" href="javascript:void(0);">已评</a>
								<?php }?>
								
								<?php if($v['show_tui_btn']){?>
										      <a href="javascript:OpenLayer('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>')">退货</a>
										  <?php }?>
										  
										  <?php $RoleID=SysFram::getLoginRoleID();?>
										  
										  <?php if(in_array($v['STATE2'],array(2.6))&&!Bll_Role::Role_Id_Shop($RoleID)){?>
										      <a href="javascript:OpenLayer('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>')">退货发货</a>
										  <?php }?>
										  <?php if($v['STATE']==1&&($v['STATE2']==1||$v['STATE2']==0)&&!in_array($v['STATE2'],array(2.5,2.6,2.7,2.8,2.9,4))&&Bll_Role::Role_Id_Shop($RoleID)){?>
										      <a href="javascript:OpenLayer('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>')">发货</a>
										  <?php }?>
										  <?php if(in_array($v['STATE2'],array(2.5))&&Bll_Role::Role_Id_Shop($RoleID)){?>
										      <a href="javascript:OpenLayer('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>')">同意退货</a>
										  <?php }?>
										  <?php if(in_array($v['STATE2'],array(2.8))&&Bll_Role::Role_Id_Shop($RoleID)){?>
										      <a href="javascript:OpenLayer('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>')">确认收货</a>
										  <?php }?>
										  <?php if(in_array($v['STATE2'],array(1))&&Bll_Role::Role_Id_User($RoleID)){?>
										      <a href="javascript:void(0);" class="user_shouhuo_btn" val="<?php echo $v['ID']?>">确认收货</a>
										  <?php }?>
								
								
								</td>
							</tr>
							<?php if($v['STATE2']==3&&$v['IS_PING_JIA']==0){?>
							
							<tr id="comment_box_<?php echo $v['ID']?>"  class="myList" style="display:none;">
							
							<form action="/mall/order_shop/pingjia.html?ID=<?php echo $v['ID']?>" method="post">
								<td colspan="5" style="">
									<div class="comment">
										<div class="score_bg">
											<div class="score">评分：</div>
											<div class="star">
												<img val="1" class="" src="http://jshmart.com/images/star1.png">
												<img val="2" class="" src="http://jshmart.com/images/star1.png">
												<img val="3" class="" src="http://jshmart.com/images/star1.png">
												<img val="4" class="" src="http://jshmart.com/images/star1.png">
												<img val="5" class="" src="http://jshmart.com/images/star1.png">
												<input type="hidden" name="PING_FEN" value="0">
											</div>	
										</div>
										<div class="comment_content">
										
										<input type="hidden" name="PRO_ID" value="<?php echo $v['PRO_ID']?>">
										<input type="hidden" name="USER_ID" value="<?php echo $v['USER_ID']?>">
										<input type="hidden" name="SHOP_ID" value="<?php echo $v['SHOP_ID']?>">
											<div class="score">评论： </div>
											<div class="content">
												<textarea name="MESS"></textarea>
											</div>
											<div class="content_commit">
												<input type="submit" class="commit_btn" value="提交评论">
												<div class="sm_comment_wrap">
													<input class="sm_comment" name="ANONYMOUS" type="checkbox" value="1">
													匿名评论
												</div>
											</div>	
										</div>
									<div>
								</div></div></td>
								
								</form>
							</tr>
							
						<?php }?>
						
						<?php if($v['IS_PING_JIA']==1){?>
							<tr id="comment_box_<?php echo $v['ID']?>"  class="myList" style="display:none;">
							</tr>
						<?php }?>
						<?php $LAEST_ORDER_ID = $v['ORDER_ID'];?>
						<?php }?>
						
						</tbody>
						<tbody>
							<tr>
								<td colspan="5"></td>
							</tr>
				  		</tbody>
				  		
						
					</table>
					
					
					<div class="page_wrap" style="text-align:right;">
	
					<?php
					$ulr_temp = '';

					 if(!empty($_GET['num'])){
					   $ulr_temp .= '&num='.$_GET['num'];
					}?>
					<?php if(!empty($_GET['name'])){
					   $ulr_temp .= '&name='.$_GET['name'];
					}?>
					<?php if(!empty($_GET['st'])){
					   $ulr_temp .= '&st='.$_GET['st'];
					}?>
					<?php if(!empty($_GET['ed'])){
					   $ulr_temp .= '&ed='.$_GET['ed'];
					}?>
					<?php if(!empty($_GET['zt'])){
					   $ulr_temp .= '&zt='.$_GET['zt'];
					}?>
					<?php if(!empty($_GET['ft'])){
					   $ulr_temp .= '&ft='.$_GET['ft'];
					}?>
					
					<?php new PagerTool($pagesize,$total,$page,8,"/mall/order_shop/Order_detail_list_new.html?status=".$status.$ulr_temp."&page=",1);?>
						<div id="page" class="page" style="display:none;">
						<a  style="display: none;" href="#1">首页</a><a href="#4">上一页</a><a href="#2">2</a><a href="#3">3</a><a href="#4">4</a><a href="#5" class="active">5</a><a href="#6">6</a><a href="#6">下一页</a></div>
					</div>
				</div>
			</div>			
		</div>
		
	</div>	

<script>

$(function(){
	$('.pingjia_btn').click(function(){
		 var id_c = $(this).attr('val');
		 $('#comment_box_'+id_c).toggle();
	});

	$('.star img').mouseover(function(){

		var value_now = $(this).attr('val');

		$(this).parent().find('input').val(value_now);
			
		 $(this).parent().find('img').each(function(){
			   $(this).attr('src','http://jshmart.com/images/star1.png');
		});
		 $(this).parent().find('img').each(function(){
			 value_i = $(this).attr('val')
			 if(value_i<=value_now){
				    $(this).attr('src','http://jshmart.com/images/star2.png');
			 }
		});
	});



	$('.pingjia_btn_show').click(function(){
		 var id_c = $(this).attr('val');
		 
		 $('#comment_box_'+id_c).toggle();
		 $.ajax({
				url: '/mall/order_shop/get_ping_jia.html?ID='+id_c,
				type: 'get',
				dataType: 'html',
				success: function(data) {
					$('#comment_box_'+id_c).html(data);
				}
			});
		 
	});
	
})
	
</script>

<script type="text/javascript">
//申请退货
$('.user_shouhuo_btn').click(function(){
    var ID = $(this).attr('val');
    var this_btn = $(this);
    if(window.confirm('您确定收货吗?')){
    $.ajax({
		url: '/mall/order_shop/shou_huo_ajax.html?ID='+ID,
		type: 'post',
		dataType: 'text',				
		success: function(data) {
			if(data=="收货成功"){
				this_btn.hide();
			}
			alert(''+data);
		}
	});

    }
    
	
});

</script>



</body></html>