<?php  $this->renderPartial('new_shop.views.web.header',array('top_menu_index'=>$top_menu_index)); ?>

<?php  $this->renderPartial('new_shop.views.web.shop_main_banner'); ?>


<div id="content">
  

<div class="page-nav mb20">
    
    <div class="p-tith-tab fl">
      <ul class="clearfix">
        <li><a href="/new_shop/order_user/list.html">实体店订单</a></li>
        <li class="active"><a href="/mall/order_shop/Order_detail_list_new2.html">商城订单</a></li>
        <li><a href="#">团购订单</a></li>
        <li><a href="#">优惠券订单</a></li>
      </ul>


    </div>
    <!-- / p-tith-tab-->

    <div class="crumbs_nav fr">
        <span class="icon">当前位置：</span><a href="index.html">首页</a><span class="line">&gt;</span><a href="#">消费订单</a><span class="line">&gt;</span><a href="#">商城订单</a>
    </div>


</div>
<!-- /page-nav -->
<div class="pro_search_box">
    <ul class="cz_but">
      <li class="r_line"><a href="/mall/order_shop/Order_detail_list_new2.html" <?php if($status==0){?>class="hover"<?php }?> ><strong>全部订单</strong></a></li>
      <li class="r_line"><a <?php if($status==1){?>class="hover"<?php }?> href="/mall/order_shop/Order_detail_list_new2.html?status=1"><strong>待付款 (<?php echo $daifu_count;?>)</strong></a></li>
      <li class="r_line"><a <?php if($status==2){?>class="hover"<?php }?> href="/mall/order_shop/Order_detail_list_new2.html?status=2"><strong>待发货 (<?php echo $daifa_count;?>)</strong></a></li>
      <li class="r_line"><a <?php if($status==3){?>class="hover"<?php }?> href="/mall/order_shop/Order_detail_list_new2.html?status=3"><strong>待评价 (<?php echo $daiping_count;?>)</strong></a></li>
    </ul>
</div>
<!-- /pro_search_box -->

 <script type="text/javascript">



function TimeSearch()
{
	var num = document.getElementById('num').value;
	
	var name = document.getElementById('name').value;
	var st = document.getElementById('starttime').value;
	var ed = document.getElementById('endtime').value;
	var zt = document.getElementById('zhuangtai').value;
	var ft = document.getElementById('ft').value;
	location.href="/mall/order_shop/Order_detail_list_new2.html?status=<?php echo $status; ?>&num="+num+"&name="+name+"&st="+st+"&ed="+ed+"&zt="+zt+"&ft="+ft;

}
</script>
 
<div class="search-form">
    <ul class="clearfix">
      <li>
        <strong class="bt">订单号</strong>
        <input name="num" id="num" type="text" value="" class="sr w1" />
      </li>
      <li>
        <strong class="bt">产品名称</strong> <input name="name" id="name" type="text" value="" class="sr w1" />
      </li>
       <li>
        <strong class="bt">订单积分</strong>
        <input name="pponit" id="pp" type="text" value="" class="sr w1" />
      </li>
      
      <li class="data">
        <strong class="bt">订单时间</strong> <input name="st" id="starttime" onClick="WdatePicker()"  type="text" value="" class="sr w2" placeholder="请选择时间范围起始" /><span class="line">-</span><input name="ed" id="endtime" onClick="WdatePicker()" type="text" value="" class="sr w2" placeholder="请选择时间范围结束" />
      </li>
      <li>
        <strong class="bt">支付状态</strong> 
          <select  class="w1" name="zt" id="zhuangtai">
          <option  value="0" selected="selected"> 所有</option>
          <option  value="1"> 未支付</option>
          <option  value="2">已支付</option>
        </select>

      </li>
      <li>
        <strong class="bt">发货状态</strong>
        <select class="w1" name="ft" id="ft">
          <option  value="0" selected="selected">所有</option>
          <option  value="1"> 待发货</option>
          <option  value="2"> 已发货</option>
          <option  value="3"> 已收货 </option>
          <option  value="4"> 完成 </option>
          <option  value="5"> 已退货</option>
        </select>

      </li>
      <li>
        <input type="submit" value="查询" onclick="TimeSearch()" class="btn" />
      </li>


    </ul>




  </div>
<!-- / search-form -->

<div class="main_box">


        <table class="table_data">
              <tr>
                <th width="">商品信息</th>
                <th width="100">姓名</th>
                <th width="180">支付明细(元)</th>
                <th width="80">订单状态</th>
                <th width="80">支付状态</th>
                <th width="120">操作</th>
              </tr>
        </table>

        <div class="op_subbox bottom-line-none clearfix">
            <div class="op-bnt fl">
              <label class="mr"><input type="checkbox" value="" name="" onclick="switchAll('TID')"> 全选</label>
              <input style="display:none;" type="submit" class="sub_sy1 vm mr" value="单/批量结单" name="">
            </div>     
        </div>
        <!--/op_subbox  -->
				  		
		<?php foreach ($rs as $v){?>

          <table class="table_data shop-order">
            <tbody>
              <tr>
                <th colspan="6" class="tl_14"><input type="checkbox" value="<?php echo $v['ID']?>" name="TID" class="mr"><span class="time"><?php echo $v['ADD_TIME']?></span><span class="dd">订单号：<?php echo $v['ORDER_ID']?></span><span class="name">商家：<?php echo $v['SHOP_ID_NAME']?></span></th>
              </tr>

              <tr>
                <td class="tl_14">
                  <dl class="sp-info clearfix">
                  <?php $pro = Bll_Pro::GetSingleRow('','PIC',$v['PRO_ID']);?>
                    <dt class="photo"><a href="http://jshmart.com/detail?id=<?php echo $v['PRO_ID']?>" target="_blank" class="imgbox"><img style="width:80px;height:80px;" src="<?php echo Fram::Img_Url($pro['PIC']); ?>" alt="" /></a></dt>
                    <dd class="name"><a href="http://jshmart.com/detail?id=<?php echo $v['PRO_ID']?>" target="_blank"><?php echo $v['PRO_NAME'];?></a></dd>
                    <dd class="num">×<?php echo $v['PRO_COUNT']?></dd>
                  </dl>
                  
                </td>
                <td width="100"><?php echo $v['ADDR_PERSON_NAME']?></td>
                <td width="180">

                <div class="price-mx">
                  <ul>
                    <li><strong style="width:65px;" class="bt">余额支付：</strong><span style="width:85px;" class="price">￥<?php echo $v['Mall_PAY_MONEY']?></span></li>
                    <li><strong style="width:65px;"  class="bt">充值支付：</strong><span style="width:85px;" class="price">￥<?php echo $v['Mall_PAY_CHONG_MONEY']?></span></li>
                    <li><strong style="width:65px;"  class="bt">惠点支付：</strong><span style="width:85px;" class="price">￥<?php echo $v['Mall_PAY_HUI_DIAN']?></span></li>
                    <li class="jiesuan"><strong style="width:65px;"  class="bt">总金额：</strong><span style="width:85px;" class="price">￥<?php echo $v['Mall_MONEY_ALL'];?></span></li>
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
                <a href="javascript:void(0)" class="order-detail">订单详情</a></p></td>
                <td width="80"><span class="green"><?php if($v['STATE']==1){
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
    								    	<a  href="javascript:OpenLy('订单详情','/mall/order.html?id=<?php echo $v['ORDER_ID']?>',windows_width,windows_height);" >支付</a>
    								<?php } ?>
                                     
                                     </td>
                <td width="120">
                <?php if($v['STATE']==1&&($v['STATE2']==1||$v['STATE2']==0)&&!in_array($v['STATE2'],array(2.5,2.6,2.7,2.8,2.9,4))&&Bll_Role::Role_Id_Shop($RoleID)){?>
					<p><a href="javascript:OpenLy('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>',800,600)" class="btn-fh order-detail">发货</a></p>	     
				<?php }?>
                  
                  <?php if($v['show_tui_btn']){?>
                  <p><a href="javascript:OpenLy('订单详情','/mall/order_shop/<?php echo $xiangqing_action;?>.html?ID=<?php echo $v['ID']?>',800,600)" class="btn-th order-detail">退货</a></p>
                  <?php }?>
                </td>
              </tr>

             </tbody>
          </table>
          <!--/ table_data-->

          <?php }?>


        <div class="op_subbox clearfix">
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
					
					<?php new PagerTool($pagesize,$total,$page,4,"/mall/order_shop/Order_detail_list_new.html?status=".$status.$ulr_temp."&page=",3);?>
            </div>
            <!-- /page -->


        </div>
        <!--/op_subbox  -->



        </div>
        <!-- main_box -->

</div>
<!-- /content -->


<?php  $this->renderPartial('new_shop.views.web.footer'); ?>
