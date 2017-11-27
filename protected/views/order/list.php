<script type="text/javascript" src="/js/layer/layer.js"></script>
<script type="text/javascript" src="/js/layer/Common.js"></script>
<style>
table .list_tbody .title_list td {border: 1px solid #f2f2f2;border-bottom: none;color: #a9aaac;height:34px;padding-left:17px;}
table .list_tbody .title_list td label{color:#3b343c;}
table .list_tbody .title_list{display: table-row;vertical-align: inherit;border-color: inherit;background:#f5f5f5;}
table .myList td{text-align: center !important;border:1px solid #f2f2f2;border-top:none;height:83px;padding-top:15px;}
table #comment td{padding: 0;border: none;}
table .myList .obligation{color:red;}
table .myList_td1_div{display: block;width: 100%;float: left;height:83px;}

table .myList .order_details{padding-left:17px;}
table .myList .myList_td1{text-align: left !important;}
table .myList .myList_td1 .prod_img{float:left;width: 66px;height: 66px;border: 1px solid #DEDEDE; }
table .myList .myList_td1 .prod_name{float: left;margin-left: 15px;width: 285px;word-break: break-all;
	padding-top:14px;line-height:20px;  overflow:hidden;height: 69px;}
table .myList .myList_td1 .prod_num{float: left;margin-left: 127px; width: 50px;padding-top: 30px;text-align:center;color:#abafba;}
table .myList .myList_td1 .return_repair{width:90px;padding-top: 30px;float:left;margin-left:20px;text-align:center;color:#6b6b69;}
table .myList .inf-amount-total div, .inf-state div{height: 1px;background: #eaeaea;margin-top: 6px;margin-bottom: 8px;}
table .myList a{color:#000;}
.inf-state div{background: #fff;}
.inf-cz a{display:inline-block;padding:10px 18px;background:#f5f5f5;border:1px solid #e8e8e8;}

#comment{opacity:0;filter:alpha(opacity=0)}
.comment{width:100%;height:314px;border:1px solid #ccc;}
.score_bg{width:100%;height:50px;position:relative;line-height:50px;}
.score{position:absolute;left:58px;}
.star{width:300px;height:50px;position:absolute;left:100px;}
.star img{float:left;padding:16px 5px;cursor:pointer;}
.comment_content{width:100%;height:264px;position:relative;}
.comment_content .content textarea{width:976px;height:200px;position:absolute;left:100px;text-align:left;
	word-break:all-break;border:1px solid #a8a8a8;}
.content_commit{width:100%;height:64px;position:absolute;top:200px;left:0px;}
.commit_btn{padding:6px 24px;position:absolute;left:100px;top:16px;border-radius:2px;
	background:#f41414;border:none;cursor:pointer;color:#fff;width:96px;height:26px;}/**/
.sm_comment_wrap{position:absolute;left:260px;top:22px;}
.sm_comment_wrap .sm_comment{position:relative;top:2px;}
</style>
<script type="text/javascript" src="/js/main.js"></script>
<?php \Pub\Yaf::display('header',['hover'=>isset($hover)?$hover:'pro']); ?>

<div class="content">
  

<div class="page-nav mb20">
    
    <div class="p-tith-tab fl">
      <ul class="clearfix">

      </ul>


    </div>
    <!-- / p-tith-tab-->

    <div class="crumbs_nav fr" style="float:left;width:100%">
        <span class="icon">当前位置：</span><a href="/">首页</a><span class="line">&gt;</span>商城订单
		<div style="float:right;">
<?php 
    $user=Bll\User::Model(Pub\SysFram::GetLoginID());
?>
		账户余额：<span class="red"><?php echo $user->Money() ?></span>    账户积分：<span class="red"><?php echo $user->Point() ?></span>
		</div>
    </div>


</div>
 


<div class="main_box">


		<?php foreach ($rs as $v){?>

          <table class="table_data shop-order" style="margin-bottom: 0px;">
            <tbody>
              <tr>
                <th colspan="6" class="tl_14" style="text-align:left; padding-left:5px;">
                <input type="checkbox" value="<?php echo $v['ID']?>" name="TID" class="mr">
                <span class="dd">订单号：<?php echo $v['ORDER_ID']?></span>
                               订单时间：<span class="time"><?php echo $v['ADD_TIME']?></span>
                <span class="name"> 商家：<?php echo $v['SHOP_ID_NAME']?></span></th>
              </tr>

              <tr>
                <td class="tl_14">
                  <dl class="sp-info clearfix">
                  <?php if(Pub\Fram::CheckNum($v['PRO_ID']))$pro = Bll\Pro::Row($v['PRO_ID'],null,'PIC');?>
                    <dt class="photo"><a href="<?php echo Pub\SysPara::Pro_Detail_Url($v['PRO_ID']) ?>" target="_blank" class="imgbox"><img style="width:80px;height:80px;" src="<?php echo Pub\Fram::Img_Url($pro['PIC']); ?>" alt="" /></a></dt>
                    <dd class="name"><a href="<?php echo Pub\SysPara::Pro_Detail_Url($v['PRO_ID']) ?>" target="_blank"><?php echo $v['PRO_NAME'];?></a></dd>
                    <dd class="num">×<?php echo $v['PRO_COUNT']?></dd>
                  </dl>
                  
                </td>
                
                <td width="180">

                <div class="price-mx">
                  <ul>
                  <?php if($v['USED_YU_E']>0){ ?>
                    <li><strong style="width:65px;" class="bt">余额支付：</strong><span style="width:85px;" class="price">￥<?php echo $v['USED_YU_E']?></span></li>
                    <?php }if($v['USED_BANK']>0){ ?>
                    <li><strong style="width:65px;"  class="bt">充值支付：</strong><span style="width:85px;" class="price">￥<?php echo $v['USED_BANK']?></span></li>
                    <?php }if($v['PAY_HUI_DIAN']>0){ ?>
                    <li><strong style="width:65px;"  class="bt">积分支付：</strong><span style="width:85px;" class="price">￥<?php echo $v['PAY_HUI_DIAN']?></span></li>
                    <?php }if(Pub\Number::Jia($v['USED_YU_E'], $v['USED_BANK'],$v['PAY_HUI_DIAN'])>0){ ?>
                    <li class="jiesuan"><strong style="width:65px;"  class="bt">汇总：</strong><span style="width:85px;" class="price">￥<?php echo Pub\Number::Jia($v['USED_YU_E'], $v['USED_BANK'],$v['PAY_HUI_DIAN']);?></span></li>
                   <?php } ?>
                  </ul>

                </div>

                </td>
                <td width="80"><p class="orange">
                    <?php 
								        if($v['STATE2']==0){
    								    	echo '待发货';							        
								        }elseif($v['STATE2']==1){
                                            echo '已发货';
								        }elseif($v['STATE2']==2){
								    	    echo '已收货';
								        }elseif($v['STATE2']==3){
								    	    echo '完成';
								        }elseif($v['STATE2']==4){
								    	    echo '已退货';
								        //}elseif($v['STATE2']==-1 || $v['STATE2']==-1.1){
								        //    echo '订单已取消';
								        
								    	 }elseif($v['STATE2']==-1.2){
                                            echo '未发货取消';
								    	    
								        }
								    ?>
                </p><p class="links">
                
                <a class="order-detail" href="javascript:OpenLayer('订单详情','/mall/ordershop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>',800,600);" >订单详情</a>
                				
                <td width="85"><span class="green"><?php if($v['STATE']==1){
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
                                     
                                     ?></span>
                                     
                                     
                                     <?php if($v['STATE']!=1&&$v['STATE']!=-1&&$v['STATE']!=-1.1){?>
    								    	<a  href="javascript:OpenLayer('订单','/mall/order/pay.html?id=<?php echo $v['ORDER_ID']?>',800,500);" >支付</a>
    								<?php } ?>
                                     
                                     </td>
                <td width="120">
                <?php if($v['STATE']==1&&($v['STATE2']==1||$v['STATE2']==0)&&!in_array($v['STATE2'],array(2.5,2.6,2.7,2.8,2.9,4))&&Bll\Role::Role_Id_Shop($RoleID)){?>
					<p><a href="javascript:OpenLayer('订单详情','/new_shop/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>',800,600)" class="btn-fh order-detail">发货</a></p>	     
				<?php }?>
                  
                  <?php if($v['show_tui_btn']){?>
                  <p style="display:none"><a href="javascript:OpenLayer('订单详情','/new_shop/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>',800,600)" class="btn-th order-detail">退货</a></p>
                  <?php }?>
                  
                  <?php if($v['IS_PING_JIA']==1){?>
                    <p><a val="<?php echo $v['ID']?>" href="javascript:void(0);" class="btn-th pingjia_btn_show">已评</a></p>
				  <?php }?>
                </td>
              </tr>
              
              <?php if($v['IS_PING_JIA']==1){?>
							<tr id="comment_box_<?php echo $v['ID']?>"  class="myList" style="display:none;">
							</tr>
			<?php }?>

             </tbody>
          </table>
          <!--/ table_data-->
<div style="padding-top:5px"></div>
          <?php }?>

<div style="padding-top:5px"></div>
        <div class="op_subbox clearfix" style="clear:both;">
            <div class="op-bnt fl">
              <label class="mr"><input type="checkbox" value="" name="" onclick="switchAll('TID')"> 全选</label>
              <input style="display:none;" type="submit" class="sub_sy1 vm mr" value="单/批量结单" name="">
            </div>


            <div class="page tr fr">
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
					
					<?php new Pub\PagerTool($pagesize,$total,$page,4,"/new_shop/order_shop/Order_detail_list_new.html?status=".$status.$ulr_temp."&page=",3);?>
            </div>
            <!-- /page -->


        </div>
        <!--/op_subbox  -->



        </div>
        <!-- main_box -->

</div>
<!-- /content -->

<script type="text/javascript">
<!--

$('.pingjia_btn_show').click(function(){
	 var id_c = $(this).attr('val');
	 
	 $('#comment_box_'+id_c).toggle();
	 $.ajax({
			url: '/new_shop/order_shop/get_ping_jia.html?ID='+id_c,
			type: 'get',
			dataType: 'html',
			success: function(data) {
				$('#comment_box_'+id_c).html(data);
			}
		});
	 
});

//-->
</script>

