<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title><?php echo $pro['NAME']?>-<?php echo \Pub\SysPara::SiteName?></title>
<link href="/css/layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/layer/layer.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/detail.js"></script>
<script src="http://msg.yunhuatong.com/im.js" id="chuanhaisoft_im_script" para_jsjq="0" para_add_friend="71.1;" pic_upload_url="http://www.chuanhaisoft.com/system/upload/Upload_im/"></head>
<body>
<script type="text/javascript">
<?php
foreach ($pro['type'] as $value) {
	foreach ($value as $k => $v) {
		if (!in_array($k, array('KU_CUN','PRICE','HUI_DIAN','POINT','GUI_GE_JSON','GUI_GE_1','GUI_GE_2','GUI_GE_3','GUI_GE_4','GUI_GE_5','CAN_USE_YU_E'))){
			unset($value[$k]);
		}
	}
	$type_data[] = $value;
}
?>
var type_data = <?php echo json_encode($type_data)?>;
//添加到购物车
$(function(){
	$('#add_cart').click(function(){
		if (check_guige() == false) return false;
		var type_id = new Array();
		$('#guigelist').find('input').each(function(i){
			if ($(this).val()) {
				type_id[i] = $(this).val();
			}
		});
		type_id = type_id.join("-");
		var pro_id = <?php echo $pro['ID']?>;
		var num = $('input[name=num]').val();
		$.ajax({
			url: '<?php echo Pub\SysPara::site_url() ;?>cart/add.html',
			type: 'get',
			dataType: 'json',
			data: {pro_id:pro_id,type_id:type_id,num:num},
			success: function(data) {
				cart_refresh();
				layer.msg(data['msg'], {
				  offset: 't',
				  anim: 6
				});
			}
		});
	});
	$("#buy_now").click(function(){
		if (<?php echo $UserId ? $UserId : 0; ?> == 0) {
			alert('请登录');
			window.location.href = "/";
			return false;
		}
		if (check_guige() == false) return false;
		document.buyform.submit();
	});
	send_data(<?php echo $pro['ID']; ?>, <?php echo $UserId ? : '-1'; ?>);
	<?php if (empty($guige)) {
		echo 'select($("<a></a>"))';
	}?>
});
function check_guige() {
	var status = true;
	$('#guigelist').find('input').each(function(i) {
		if (!$(this).val()) {
			alert('请选择' + $(this).parent('dd').prev('dt')[0].innerText);
			status = false;
			return false;
		}
	});
	var data = new Array();
	$.each(type_data, function(i,v){
		var key = v.GUI_GE_1+'-'+v.GUI_GE_2+'-'+v.GUI_GE_3+'-'+v.GUI_GE_4+'-'+v.GUI_GE_5;
		data[key] = new Array();
		$.each(v, function (si,sv){
			data[key][si] = Number(sv);
		})
	});
	var k = new Array();
	for (i=0; i<5; i++) {
		k[i] = $('input[name="GUI_GE_'+(i+1)+'"]').length ? $('input[name="GUI_GE_'+(i+1)+'"]').val() : 0;
	}
	var key = k.join('-');
	if (!data[key]) {
		alert('该规格下无商品，请更换规格');
		status = false;
		return false;
	}
	return status;
}
function select(obj, id){
	obj.css('border-color','#c81623').siblings('a').css('border-color','#ccc');
	obj.prevAll('input').val(id);
	var data = new Array();
	$.each(type_data, function(i,v){
		var key = v.GUI_GE_1+'-'+v.GUI_GE_2+'-'+v.GUI_GE_3+'-'+v.GUI_GE_4+'-'+v.GUI_GE_5;
		data[key] = new Array();
		$.each(v, function (si,sv){
			data[key][si] = Number(sv);
		})
	});
	var k = new Array();
	for (i=0; i<5; i++) {
		k[i] = $('input[name="GUI_GE_'+(i+1)+'"]').length ? $('input[name="GUI_GE_'+(i+1)+'"]').val() : 0;
	}
	var key = k.join('-');
	// 隐藏没有的属性
	var guige_name = obj.prevAll('input').attr('name');
	var g_value = new Object();
	for (var i = 1; i < 6; i++) {
		g_value[i] = $('input[name=GUI_GE_'+i+']').val() ? parseInt($('input[name=GUI_GE_'+i+']').val()) : 0;
	}
	var res = new Array();
	for (var i = 1; i < 6; i++) {
		var data2 = type_data.slice(0);
		res[i] = new Array();
		for (var j = 1; j < 6; j++) {
			if (j != i) {
				for (var k in data2) {
					if (data2[k]['GUI_GE_'+j] != g_value[j] && g_value[j] != 0) {
						delete(data2[k]);
					}
				}
			}
		}
		for (var k in data2) {
			if($.inArray(data2[k]['GUI_GE_'+i], res[i]) == -1 && data2[k]['GUI_GE_'+i] != 0) {
				res[i].push(data2[k]['GUI_GE_'+i]);
			}
		}
	}
	for (var k in res) {
		$('input[name=GUI_GE_'+k+']').nextAll('a').each(function(){
			if (guige_name.replace('GUI_GE_','') != k) {
				if($.inArray($(this).attr('id').replace('guige_',''), res[k]) >= 0) {
					$(this).show();
				} else {
					$(this).hide();
				}
			}
		})
	}
	$('#ku_cun').text(data[key]['KU_CUN']);
	$('#price-sc').text(data[key]['PRICE']);
	$('#hui_dian').text(data[key]['HUI_DIAN']);
	$('#point').text(data[key]['POINT']);
	//$('#pay_m').attr('data-val', data[key]['CAN_USE_YU_E']);
	$('#pay_x').attr('data-val', data[key]['PRICE']);// - data[key]['HUI_DIAN']- data[key]['CAN_USE_YU_E']
	$('#pay_h').attr('data-val', data[key]['HUI_DIAN']);
	getPay();
	$('#pay_w').show();
	$('#pay_tip').hide();
}
</script>
<?php \Pub\Yaf::display('header',['hover'=>'pro']); ?>
<script>
$(document).ready(function(){
        $("#navitm-cats").css("display","none");
        $(window).unbind ('scroll');
		navitm_input_select_menu("classification");//替换select为可编辑样式
		tab_door("#navitm-cats");
		});

		</script>
	<div id="content">
		<div class="crumbs_nav mb" style="padding-left:80px;">
		当前位置：
			<?php if ($mallBreadCrumbs['ID']): ?>
			<a href="<?php echo Pub\SysPara::Pro_List_Url($mallBreadCrumbs['ID']);?>"><?php echo $mallBreadCrumbs['NAME']?></a>
			<?php endif; ?>
			<?php if ($mallBreadCrumbs['SUB']['ID']): ?>
			<span class="line">&gt;</span><a href="<?php echo Pub\SysPara::Pro_List_Url($mallBreadCrumbs['SUB']['ID']);?>"><?php echo $mallBreadCrumbs['SUB']['NAME']?></a>
			<?php endif; if (!empty($mallBreadCrumbs['SUB']['SUB'])) :?>
			<span class="line">&gt;</span><a href="<?php echo Pub\SysPara::Pro_List_Url($mallBreadCrumbs['SUB']['SUB']['ID']);?>"><?php echo $mallBreadCrumbs['SUB']['SUB']['NAME']?></a>
			<?php endif; ?>
		</div>
		<!-- /crumbs_nav -->

		<div class="pro-detail clearfix">
			<div class="p-photo fl">
				<div class="pimgbox">
					<div class="banner">
						<div class="banner-btn">
							<a href="javascript:;" class="prevBtn"><i></i></a> <a
								href="javascript:;" class="nextBtn"><i></i></a>
						</div>
						<ul class="banner-img">
							<?php
							    if(!$pro['desc']['PIC1'] && !$pro['desc']['PIC2'] && !$pro['desc']['PIC3'] && !$pro['desc']['PIC4'] && !$pro['desc']['PIC5'] && !$pro['desc']['PIC6'])
							        $pro['desc']['PIC1']=$pro['PIC'];
								for ($i=1; $i<6; $i++) :
									if ($pro['desc']['PIC'.$i]) :
							?>
							<li><img src="<?php echo Pub\Fram::Img_Url($pro['desc']['PIC'.$i]); ?>" /></li>
							<?php
									endif;
								endfor;
							?>
						</ul>
					</div>
					<ul class="banner-circle">
						<?php
							for ($i=1; $i<6; $i++) :
								if ($pro['desc']['PIC'.$i]) :
						?>
						<li<?php if ($i == 1) echo ' class="selected"';?>><a href="javascript:void(0);"><img src="<?php echo Pub\Fram::Img_Url($pro['desc']['PIC'.$i]); ?>" height="80" width="80"/></a></li>
						<?php
								endif;
							endfor;
						?>
					</ul>
				</div>
				<script>
				$(function() {
					var $banner = $('.index-box1 .banner');
					var $banner_ul = $('.index-box1 .banner-img');
					var $btn = $('.index-box1 .banner-btn');
					var $btn_a = $btn.find('a')
					var v_width = $banner.width();
					var page = 1;
					var timer = null;
					var btnClass = null;
					var page_count = $banner_ul.find('li').length;// 把这个值赋给小圆点的个数
					var banner_cir = "<li class='selected' href='#'><a href='javascript:void(0);'></a></li>";
					for (var i = 1; i < page_count; i++) {
						// 动态添加小圆点
						banner_cir += "<li><a href='javascript:void(0);'></a></li>";
					}
					$('.index-box1 .banner-circle').append(banner_cir);
					var cirLeft = $('.banner-circle').width() * (-0.5);
					$('.index-box1 .banner-circle').css({
						'marginLeft' : cirLeft
					});
					$banner_ul.width(page_count * v_width);
					function move(obj, classname) {
						// 手动及自动播放
						if (!$banner_ul.is(':animated')) {
							if (classname == 'prevBtn') {
								if (page == 1) {
									$banner_ul.animate({
										left : -v_width * (page_count - 1)
									});
									page = page_count;
									cirMove();
								} else {
									$banner_ul.animate({
										left : '+=' + v_width
									}, "slow");
									page--;
									cirMove();
								}
							} else {
								if (page == page_count) {
									$banner_ul.animate({
										left : 0
									});
									page = 1;
									cirMove();
								} else {
									$banner_ul.animate({
										left : '-=' + v_width
									}, "slow");
									page++;
									cirMove();
								}
							}
						}
					}
					function cirMove() {
						// 检测page的值，使当前的page与selected的小圆点一致
						$('.index-box1 .banner-circle li').eq(page - 1).addClass('selected')
								.siblings().removeClass('selected');
					}
					$banner.mouseover(function() {
						$btn.css({
							'display' : 'block'
						});
						clearInterval(timer);
					}).mouseout(function() {
						$btn.css({
							'display' : 'none'
						});
						clearInterval(timer);
						timer = setInterval(move, 3000);
					}).trigger("mouseout");// 激活自动播放
					$btn_a.mouseover(function() {
						// 实现透明渐变，阻止冒泡
						$(this).animate({
							opacity : 1
						}, 'fast');
						$btn.css({
							'display' : 'block'
						});
						return false;
					}).mouseleave(function() {
						$(this).animate({
							opacity : 0.6
						}, 'fast');
						$btn.css({
							'display' : 'none'
						});
						return false;
					}).click(function() {
						// 手动点击清除计时器
						btnClass = this.className;
						clearInterval(timer);
						timer = setInterval(move, 3000);
						move($(this), this.className);
					});
					$('.index-box1 .banner-circle li').live('click', function() {
						var index = $('.banner-circle li').index(this);
						$banner_ul.animate({
							left : -v_width * index
						}, 'slow');
						page = index + 1;
						cirMove();
					});
				});
				function detailbanner() {
					var $banner = $('.pro-detail .banner');
					var $banner_ul = $('.pro-detail .banner-img');
					var $btn = $('.pro-detail .banner-btn');
					var $btn_a = $btn.find('a')
					var v_width = $banner.width();
					var page = 1;
					var timer = null;
					var btnClass = null;
					var page_count = $banner_ul.find('li').length;// 把这个值赋给小圆点的个数
					// var banner_cir="<li class='selected' href='#'><a
					// href='javascript:void(0);'></a></li>";
					// for(var i=1;i<page_count;i++){
					// 动态添加小圆点
					// banner_cir+="<li><a href='javascript:void(0);'></a></li>";
					// }
					// $('.pro-detail .banner-circle').append(banner_cir);
					var cirLeft = $('.pro-detail .banner-circle').width() * (-0.5);
					// $('.pro-detail .banner-circle').css({'marginLeft':cirLeft});
					$banner_ul.width(page_count * v_width);
					function move(obj, classname) {
						// 手动及自动播放
						if (!$banner_ul.is(':animated')) {
							if (classname == 'prevBtn') {
								if (page == 1) {
									$banner_ul.animate({
										left : -v_width * (page_count - 1)
									});
									page = page_count;
									cirMove();
								} else {
									$banner_ul.animate({
										left : '+=' + v_width
									}, "slow");
									page--;
									cirMove();
								}
							} else {
								if (page == page_count) {
									$banner_ul.animate({
										left : 0
									});
									page = 1;
									cirMove();
								} else {
									$banner_ul.animate({
										left : '-=' + v_width
									}, "slow");
									page++;
									cirMove();
								}
							}
						}
					}
					function cirMove() {
						// 检测page的值，使当前的page与selected的小圆点一致
						$('.pro-detail .banner-circle li').eq(page - 1).addClass('selected')
								.siblings().removeClass('selected');
					}
					$banner.mouseover(function() {
						$btn.css({
							'display' : 'block'
						});
						clearInterval(timer);
					}).mouseout(function() {
						$btn.css({
							'display' : 'none'
						});
						clearInterval(timer);
						timer = setInterval(move, 3000);
					}).trigger("mouseout");// 激活自动播放
					$btn_a.mouseover(function() {
						// 实现透明渐变，阻止冒泡
						$(this).animate({
							opacity : 1
						}, 'fast');
						$btn.css({
							'display' : 'block'
						});
						return false;
					}).mouseleave(function() {
						$(this).animate({
							opacity : 0.6
						}, 'fast');
						$btn.css({
							'display' : 'none'
						});
						return false;
					}).click(function() {
						// 手动点击清除计时器
						btnClass = this.className;
						clearInterval(timer);
						timer = setInterval(move, 3000);
						move($(this), this.className);
					});
					$('.pro-detail .banner-circle li').live('click', function() {
						var index = $('.pro-detail .banner-circle li').index(this);
						$banner_ul.animate({
							left : -v_width * index
						}, 'slow');
						page = index + 1;
						cirMove();
					});
				}
				detailbanner();
				</script>
			</div>
			<!--/ p-photo-->
			<div class="p-info fl">
				<div class="ptbox clearfix">
					<h1 class="p-title"><?php echo $pro['NAME']?></h1>
					<span class="tag c1">特价</span>
				</div>
				<!--/ p-ptbox-->
				<div class="tips"><?php echo $pro['NAME2']?></div>
				<dl class="price-box clearfix">
					<dt>价格</dt>
					<dd>
						<span class="price-sc"><i>¥</i><b id="price-sc"><?php echo $pro['PRICE']?></b></span>
						<?php if ($pro['SHI_CHANG_PRICE'] > $pro['PRICE']) :?>
						<span class="price-yj"><span class="wz">市场价</span><span class="num"><i>¥</i><b><?php echo $pro['SHI_CHANG_PRICE']?></b></span></span>
						<?php endif; ?>
						<?php if ($pro['HUI_DIAN']): ?>
						<span class="u-price">可积分抵扣：<i class="bk"></i><b id="hui_dian"><?php echo $pro['HUI_DIAN']?></b></span>
						<?php endif; ?>
					</dd>
				</dl>
				<!-- <dl class="mod-unit clearfix">
					<dt>编号</dt>
					<dd>2365865</dd>
				</dl> -->

				<dl class="mod-unit clearfix">
	                <dt>支付</dt>
	                <dd>
	                <span id="pay_w" style="display:none;">
	                  
	                  <span class="price-sc">&nbsp;金额:<i>¥</i><b id="pay_x"></b></span>
	                  <span class="u-price">&nbsp;可积分抵扣：<i class="bk"></i><b id="pay_h"></b></span>
	                  </span>
	                  <span id="pay_tip" style="color: red;">温馨提示：选择规格后显示支付价格详情！</span>
	                    </p>

	                </dd>
	            </dl>

				<form name="buyform" action="<?php echo Pub\SysPara::site_url().'cart.html'?>" method="post">
					<input type="hidden" name="id" value="<?php echo $pro['ID']; ?>">
				<div id="guigelist">
				<?php
					$i=0;
					foreach ($guige as $k=>$v) :
						$i++;
				?>
				<dl class="mod-unit clearfix">
					<dt><?php echo $v['NAME']; ?></dt>
					<dd>
					<input type="hidden" name="GUI_GE_<?php echo $i;?>" />
					<?php foreach ($v['SUB'] as $vv) : ?>
					<a style="border:1px solid #E6E6E6;cursor:pointer;" onclick="select($(this),<?php echo $vv['ID'];?>)" id="guige_<?php echo $vv['ID'];?>"><?php echo $vv['NAME']?></a>
					<?php endforeach; ?>
					</dd>
				</dl>
				<?php endforeach; ?>
				</div>
				<dl class="mod-unit clearfix">
					<dt>库存</dt>
					<dd id="ku_cun">现货</dd>
				</dl>
				<dl class="mod-unit clearfix">
					<dt>积分</dt>
					<dd>购买此产品可获得 <span id="point"><?php echo $pro['POINT']?></span> 积分</dd>
				</dl>
				<dl class="mod-unit clearfix">
					<dt>运费</dt>
					<dd>
						<select name="sheng" id="sheng" class="qy">
							<option value="0">请选择</option>
							<?php foreach ($sheng as $key => $value): ?>
							<option value="<?php echo $value['ID'] ?>"><?php echo $value['NAME']; ?></option>
							<?php endforeach; ?>
					</dd>
				</select> <span class="price" id="yunfei">¥<?php echo $yunfei[0]['PRICE'];?></span>
				</dl>
				<div class="choose-btns clearfix" id="choose-btns">
					<div class="choose-amount">
						<div class="wrap-input">
							<input name="num" value="1" class="text buy-num" data-max="0" id="J_Amount">
							<a href="javascript:;" class="btn-reduce" title="减少" onClick="numDec()">-</a>
							<a href="javascript:;" class="btn-add" title="增加" onClick="numAdd()">+</a>
						</div>
					</div>
					<?php if($pro['STATE']==0.1) :?>
					<span class="btn-special2 btn-lg" style="color: red">此商品已下架</span>
					<?php else :?>
					<!--<a class="btn-special2 btn-lg" style="color: red" href="http://www.jushihuichina.com/index.php?m=content&c=index&a=show&catid=36&id=182" target="_blank">新年快乐！</a>-->
					  <a class="btn-special2 btn-lg" href="javascript:return;" id="add_cart">加入购物车</a>
					<a class="btn-special1 btn-lg" href="#" id="buy_now">立即购买</a>

					<?php endif;?>
				</div>
			</form>
				<!-- /choose-btns -->
				<script>
				$(function() {
					$("#J_Amount").keyup(function() {
						countChange();
					});
					$("#sheng").change(function(){
						getYunFei();
					})
				})
				function numAdd() {
					var num_add = parseInt($("#J_Amount").val()) + 1;
					if ($("#J_Amount").val() == "") {
						num_add = 1
					}
					$("#J_Amount").val(num_add);
					countChange();
				}
				function numDec() {
					var num_dec = parseInt($("#J_Amount").val()) - 1;
					if (num_dec < 1) {
						alert("数量不能小于1")
					} else {
						$("#J_Amount").val(num_dec);
					}
					countChange();
				}
				function countChange()
				{
					getYunFei();
					getPay();
				}
				function getYunFei() {
					if (isNaN($("#J_Amount").val()) || parseInt($("#J_Amount").val()) < 1 || $("#J_Amount").val() == '') {
						$("#J_Amount").val("1");
					}
					var data = new Array();
					<?php foreach ($yunfei as $key => $value): ?>
					data[<?php echo $key ?>] = <?php echo json_encode($value); ?>;
					<?php endforeach; ?>
					var detail = data[$("#sheng").val()] ? data[$("#sheng").val()] : data[0];
					var yunfei,num = parseInt($("#J_Amount").val());
					if (num >= detail.BAO_YOU_COUNT && detail.BAO_YOU_COUNT != -1) {
						yunfei = 0;
					} else if (num <= detail.PRICE_COUNT) {
						yunfei = detail.PRICE;
					} else {
						yunfei = (Math.ceil((num - detail.PRICE_COUNT) / detail.NEXT_COUNT) * detail.PRICE_NEXT + parseFloat(detail.PRICE)).toFixed(2);
					}
					$('#yunfei').text('¥'+yunfei);
				}
				function getPay(){
					var count = $('#J_Amount').val();
					//$('#pay_m').text(($('#pay_m').attr('data-val') * count).toFixed(2));
					$('#pay_x').text(($('#pay_x').attr('data-val') * count).toFixed(2));
					$('#pay_h').text(($('#pay_h').attr('data-val') * count).toFixed(2));
				}
				</script>
				<div class="pingfen clearfix">
					<div class="star-box">
						<strong class="star"> <span style="width: <?php //echo $pingjia_pingfen * 20; ?>%;"><?php //echo $pingjia_pingfen; ?></span>
						</strong> 
					</div>
					<div class="baidushare fr">
						<!-- Baidu Button BEGIN -->
						<div class="bdsharebuttonbox">
							<span class="share-icon">分享到：</span>
							<a href="#" class="bds_more" data-cmd="more"></a>
							<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
							<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
							<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
							<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
							<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
						</div>
						<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
					  </script>
					</div>
					<!--/baidushare-->
				</div>
				<!-- /pingfen -->
			</div>
			<!--/ p-photo-->
		</div>
		<!--/ pro-detail-->
		<div class="pro-detail-wz mt30 clearfix">
			<div class="box210 fl mr20">
				<div class="ui_box2 mb">
					<div class="cbox">
						<div class="title mb">
							<h2 class="tith">
								<strong class="name">商家信息</strong>
							</h2>
						</div>
						<!--/ title-->
						<div class="cont shop-info">
							<div class="photo mb">
								<?php if ($pro['shopinfo']['SHOP_PIC'] != '/'): ?>
								<img src="<?php echo Pub\Fram::Img_Url($pro['shopinfo']['SHOP_PIC']); ?>" width="100%" alt="" />
								<?php endif; ?>
							</div>
							<ul>
								<li><?php echo $pro['shopinfo']['NAME']; ?></li>
								<li>电话：<?php echo $pro['shopinfo']['MOBILE_NUM']; ?></li>
								<li>地址：<?php echo $pro['shopinfo']['ADDRESS']; ?></li>
							</ul>
							<div style="text-align:center;height:26px">
								<?php if ($pro['shopinfo']['QQ']) {?>
								<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $pro['shopinfo']['QQ'];?>&site=qq&menu=yes">
									<img src="<?php echo Pub\SysPara::site_url()?>images/qq.png" />
								</a>
								<?php }?>
								<a href="javascript:void(0)" onClick="chuanhaisoft_im_totalk('<?php echo $pro['shopinfo']['NAME'] ?>', '<?php echo $pro['shopinfo']['ID'] ?>')">
									<img src="<?php echo Pub\SysPara::site_url()?>images/hp.png" />
								</a>
							</div>
							<div class="btn-box">
							<br /><br />
								
							</div>
						</div>
					</div>
				</div>
				<!-- ui_box2 -->
				<?php if (!empty($hotpros)): ?>
				<div class="ui_box2">
					<div class="cbox">
						<div class="title mb">
							<h2 class="tith">
								<strong class="name">热销商品</strong>
							</h2>
						</div>
						<!--/ title-->
						<div class="cont hot-view">
							<ul class="">
								<?php
									$i = 0;
									foreach ($hotpros as $v):
										$i++;
										$pingjia_hot = Bll_ProPingJia::GetSingleRow('PRO_ID='.$v['ID'],'count(*) as count');
										$pingjia_hot_count = $pingjia_hot['count'];
								?>
								<li class="clearfix <?php echo $i == count($hotpors) ? 'last' : ''; ?>"><a class="aimg" target="_blank" href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>"><img
										alt="" src="<?php echo Pub\Fram::Img_Url($v['PIC']); ?>"></a>
									<p class="producttit">
										<a href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" target="_blank" class="atit"><?php echo $v['NAME']?></a>
									</p>
									<div class="clearfix">
										<p class="productprice">
											<span>¥<?php echo $v['PRICE']?></span>
											<?php if ($v['SHI_CHANG_PRICE'] > $v['PRICE']): ?>
											<del>¥<?php echo $v['SHI_CHANG_PRICE']?></del>
											<?php endif; ?>
										</p>
										<p class="commentcount">
											<a target="_blank" href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>#s-pj"><?php echo $pingjia_hot_count;?> 人已评价</a>
										</p>
									</div></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<!--/ cont-->
					</div>
					<p class="bm"></p>
				</div>
				<?php endif; ?>
				<!--/ ui_box2-->
			</div>
			<!--/ box210-->
			<div class="box950 fl">
                <div id="detail-navwarp">
					<div class="pro-sort-tab" id="detail-nav">
						<div class="tab-li">
							<ul>
								<li name="s-js" class="hover"><a><span>详细介绍</span></a></li>
								<!-- <li name="s-wq"><a><span>规格参数</span></a></li> -->
								<!-- <li name="s-pj"><a><span>商品评价</span></a></li>-->
								<!-- <li name="s-fb"><a><span>发表评价</span></a></li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="pro-sort-tab" id="s-js" style="border-top: none!important;">
					<div class="ps-cont mess"><?php if (!empty($pro['desc']['MESS'])) echo $pro['desc']['MESS'];?></div>
					<!--/ps-cont-->
				</div>
				<!--/pro-sort-tab-->
				
				<!--/pro-sort-tab-->
				<div class="pro-sort-tab" id="s-pj">
					<div class="ps-cont" style="display: none">
						<div class="review_list">
							<ul class="mb20">
								<?php if (!empty($pingjia)): ?>
								<?php foreach ($pingjia as $key => $value):
								$value['USER_INFO'] = json_decode(Api::UserInfo($value['USER_ID']), true); ?>
								<li>
									<p>
										<strong class="orange b"><?php echo $value['ANONYMOUS'] ? '匿名用户' : $value['USER_INFO']['name']; ?></strong> ( <?php echo $value['ADD_TIME']; ?> )
									</p>
									<p><?php echo $value['MESS'] ? : '好评'; ?></p>
									<?php if ($value['REPLY']): ?>
									<div class="huifu">
										<strong class="orange b">店主：</strong><?php echo $value['REPLY']; ?>
									</div>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
								<?php else: ?>
								<li >
									<p>暂无评价</p>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<!--/ps-cont-->
				</div>
				<!--/pro-sort-tab-->
				
				<!--/pro-sort-tab-->
			</div>
			<!--/ box950-->
		</div>
		<!-- / pro-detail-wz-->
		<div class="clear"></div>
	</div>
	
	
	<?php \Pub\Yaf::display('footer'); ?>
	
</body>
</html>
