<div id="header2">
    <div class="hbox clearfix">
    <?php \Pub\Yaf::display('nav_menu'); ?>
    </div>
</div>
<div id="navbox">
  <div class="hbox clearfix">

    <div class="classification">

      
      <?php \Pub\Yaf::display('menu',['left_menu_state'=>isset($left_menu_state)?$left_menu_state:0]); ?>
    </div>
        <?php \Pub\Yaf::display('navitems',['hover'=>isset($hover)?$hover:null]); ?>
        <div class="shop-car" id="shop-car">
            <div class="cw-icon">
                <i class="ci-left"></i> <i class="ci-right">&gt;</i><i id="shopping-amount" class="ci-count"><?php echo Pub\Cart::ItemNums();?></i>
                <a href="<?php echo Pub\SysPara::site_url('cart.html');?>" target="_blank">我的购物车</a>
            </div>
            <div class="shop-car-layer">
                <div class="spacer"></div>
                <?php
					$all_pro = Pub\Cart::GetCartPro();
					if (empty($all_pro)) :
				?>
                <div class="prompt" id="shop-car-content">
                    <div class="nogoods"><b></b>购物车中还没有商品</div>
                </div>
                <!--/prompt-->
                <?php else : ?>
                <div class="settleup-content" id="shop-car-content">
                    <div class="smt">
                        <h4 class="fl">商品清单</h4>
                    </div>
                    <div class="smc">
                        <ul>
                            <?php foreach ($all_pro as $v) :?>
                            <li>
                                <div class="p-img fl">
                                    <a target="_blank" href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>"><img width="50" height="50" src="<?php echo Pub\SysPara::Img_Url($v['PIC']); ?>"></a>
                                </div>
                                <div class="p-name fl">
                                    <a target="_blank" href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>">
                                        <?php echo $v['NAME']?>
                                    </a>
                                </div>
                                <div class="p-detail fr ar">
                                    <span class="p-price"><strong>￥<?php echo $v['PRICE']?></strong>×<?php echo $v['num']?></span><br /><a href="#" onclick="cart_delete('<?php echo $v['cart_key'];?>')" class="delete">删除</a>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="smb ar">
                    <?php
						$count = $total = 0;
						foreach ($all_pro as $v) {
							$count += $v['num'];
							$total += $v['PRICE'] * $v['num'];
						}
					?>
                        <div class="p-total">共<b><?php echo $count;?></b>件商品&#12288;共计<strong>￥ <?php printf("%.2f",$total);?></strong></div>
                        <a id="btn-payforgoods" title="去购物车" href="<?php echo Pub\SysPara::site_url('cart.html');?>">去购物车</a>
                    </div>
                </div>
                <!--/#settleup-content-->
                <?php endif;?>
            </div>
        </div>
        <!-- shop-car -->
        <script type="text/javascript">
            AddHover("#shop-car");
        </script>
    </div>
    <!--/ hbox-->
</div>
<!--/ header-->
<script type="text/javascript">
jQuery(function($){
                $(document).ready(function(){
                  //$('#navbox').stickUp();
                });
              });

    function cart_refresh() {
        $.ajax({
            type: "GET",
            url: "<?php echo Pub\SysPara::site_url() ;?>cart/data.html",
            dataType: "json",
            success: function(data) {
                if (data) {
                    $("#shop-car-content").attr("class", "settleup-content");
                    var amount = count = totalprice = 0;
                    var html = '<div class="settleup-content" id="shop-car-content"><div class="smt"><h4 class="fl">商品清单</h4></div><div class="smc"><ul>';
                    $.each(data, function() {
                        html += '<li><div class="p-img fl"><a target="_blank" href="' + this.url + '"><img width="50" height="50" src="' + this.PIC + '"></a></div><div class="p-name fl"><a target="_blank" href="' + this.url +
                            '">' + this.NAME + '</a></div><div class="p-detail fr ar"><span class="p-price"><strong>￥' + this.PRICE + '</strong>×' + this.num + '</span><br /><a href="#" onclick="cart_delete(\'' + this.cart_key +
                            '\')" class="delete">删除</a></div></li>';
                        amount++;
                        count = accAdd(count, this.num);
                        totalprice = accAdd(totalprice, this.PRICE * this.num);
                    });
                    html += '</ul></div><div class="smb ar"><div class="p-total">共<b>' + count + '</b>件商品　共计<strong>￥ ' + totalprice.toFixed(2) + '</strong></div><a id="btn-payforgoods" title="去购物车" href="<?php echo Pub\SysPara::site_url('cart.html ');?>">去购物车</a></div>';
                    $("#shop-car-content").html(html);
                    $("#shopping-amount").html(amount);
                } else {
                    $("#shop-car-content").attr("class", "prompt");
                    $("#shop-car-content").html('<div class="prompt" id="shop-car-content"><div class="nogoods"><b></b>购物车中还没有商品</div></div>');
                    $("#shopping-amount").html("0");
                }
            }
        });
    }

    function cart_delete(key) {
        $.ajax({
            type: "POST",
            url: "<?php echo Pub\SysPara::site_url() ;?>cart/delete.html",
            data: {
                key: key
            },
            dataType: "json",
            success: function(data) {
                if (data.error == 0) {
                    cart_refresh();
                }
            }
        })
    }
</script>
