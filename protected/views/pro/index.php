<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title><?php echo Pub\SysPara::SiteName; ?></title>
<link href="/css/layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.masonry.js"></script>
<script type="text/javascript" src="/js/stickUp.min.js"></script>
<script type="text/javascript" src="/js/scrollFix.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/unslider/unslider.min.js"></script>
<script type="text/javascript" src="/js/jquery.infinitescroll.js"></script>
<script type="text/javascript" src="/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/layer/layer.js"></script>
<script type="text/javascript" src="/js/Common.js"></script>
</head>
<body style="background-color: #f6f6f6;">

<div style="background-color: #ffffff;">
<?php \Pub\Yaf::display('header',['hover'=>'index']); ?>
</div>
<script type="text/javascript">
	function DoLogin()
	{
		GetAjax('/user/Dologin.html',{login_name:$("#login_name").val(),login_pass:$("#login_pass").val()});
	}
	function DoLoginOut()
	{
		GetAjax('/user/Loginout.html');
	}
	function DoLoginSuccess(state,state5,state2)
	{
		if(state==1)
		{$("#user-login").hide();$("#user-info").show();}
		else
		{$("#user-login").show();$("#user-info").hide();}
		$("#state5").html(state5);
		$("#state2").html(state2);
	}
	
</script>
<div class="banner" id="b06">
    <div class="user-pos">
      <div class="user-news mb" style=" border-bottom: none;">
				
				<div class="user-info" id='user-info' style="display:<?php echo $user_id?'':'none';?>">
					<dl class="user-xx mb">
						<dt><img src="<?php echo \Pub\SysPara::site_url().'images/default_top.jpg';?>" alt="" /></dt>
						<dd>欢迎会员登录:!</dd>
					</dl>
					<div class="user-btn">
					<a href="/order/list.html" class="btn-s1 mr" >会员中心</a>
					
					<a href="javascript:return;" onclick="DoLoginOut();" class="btn-s2 mr">退出</a>
						</div>
						
						
<div class="order-form-num">
					<ul class="clearfix">
<a href="/order/list.html">
						<li>
							<div class="num" id="state5"><?php echo $order_count['5']; ?></div>
							<div class="text" >待收货</div>
						</li>

						<li>
							<div class="num" id="state2"><?php echo $order_count['2']; ?></div>
							<div class="text" >待付款</div>
						</li>
</a>
					</ul>
</div>	
						
						
				</div>
				<!-- /user-info -->
				
				
				<div class="user-info" id='user-login' style="display:<?php echo $user_id?'none':'';?>">
					<form name="loginForm" action="" method="post">
						<div class="index-login">
							<h2 class="title clearfix"><span class="tit">登录账号</span></h2>
							<ul>
								<li>
									<input type="text" id="login_name" placeholder="请输入帐号/手机号/邮箱" class="sr">
								</li>
								<li>
									<input type="password" id="login_pass" placeholder="请输入密码" class="sr">
								</li>
							</ul>
							<div class="unlogin">
								<input type="checkbox" class="un-login" name="save10day" id="un-login">
								<label for="un-login">十天内免登录</label>
								<a href="javascript:OpenLayer('忘记密码','/user/findpass.html',550,300)" class="fr">忘记密码？</a>
							</div>
						</div>

						<div class="user-btn" style="clear:both">
							<a href="javascript:DoLogin();" class="btn-s1 mr">登录</a>
							<a href="javascript:OpenLayer('用户注册','/user/reg.html',550,300)" class="btn-s2">注册</a>
						</div>
					</form>
				</div>
				
				
			</div>
			<!-- user-news -->
			 </div>
    <!-- /user-pos -->
	 <ul>
<?php foreach ($ad as $x): ?>
        <li class="banner-li" style="background:<?php echo $x['COLOR'];?> repeat scroll 0% 0%; display: list-item;">
        <?php if($x['URL'] && $x['URL']!='#'){ ?><a target="_blank" href="<?php echo $x['URL'];?>"  ><?php } ?>
        <img alt="<?php echo $x['TITLE'];?>" class="lazy-loading" src="/<?php echo $x['PIC1'];?>" />
        <?php if($x['URL'] && $x['URL']!='#'){ ?></a><?php } ?></li>
<?php endforeach; ?>
	 
    </ul>
    <div class="banner-wrapper">
    <a href="javascript:void(0);" class="unslider-arrow06 prev">上一张</a>
    <a href="javascript:void(0);" class="unslider-arrow06 next">下一张</a>
    </div>

</div>




<script>

function imgReload()

{

  var imgHeight = 0;

  var wtmp = $("body").width();

  $("#b06 ul li.banner-li").each(function(){

        $(this).css({width:wtmp + "px"});

    });

  $(".sliderimg").each(function(){

    $(this).css({width:wtmp + "px"});

    imgHeight = $(this).height();

  });

}



$(window).resize(function(){imgReload();});



$(document).ready(function(e) {

  imgReload();

    var unslider06 = $('#b06').unslider({

    dots: true,

    fluid: true

  }),

  data06 = unslider06.data('unslider');

  

  $('.unslider-arrow06').click(function() {

        var fn = this.className.split(' ')[1];

        data06[fn]();

    });

});

</script>

<!-- example_06 end -->

			
<div >
	<div id="content" >
		<div class="box120 fl mr20">
		 
			<div style="width: 120px; height: 1px;"></div>
		</div>
		<!-- /w140 -->
	 <div class="box1040 fl ">
	 <div id="content1">
		<div class="box780 fl mr20">
			 
<?php
    $m_pro=new \Model\Pro();
    foreach($IndexViewSort as $key => $value)
    {
        $Class="sy".($key+1);
        $rows=Bll\Pro::GetList(1,4,[$m_pro->_SortParentId->w('=',$value),$m_pro->_State->w_and('=',1)]);
?>
			 <div class="sy-fenbox mb">
				<div class="title <?php echo $Class; ?>">
					<span class="tith mb"><?php echo Bll\MallSort::Column($value,'NAME'); ?></span>
					<div class="pt_tags">
					
					<span class="pt_tags_item">
					<a href="#" target="_blank">
					休闲鞋</a></span>
					<span class="pt_tags_item">
					<a href="#" target="_blank">
					衬衫</a></span>
					</div>
				</div>
				<!-- /title -->
				<div class="sy-cont">
			         <?php \Pub\Yaf::display('pro-item',['pro'=>$rows,'FirstClass'=>true],false); ?>
			   </div>
			</div>
<?php 
    }
?>
			
		</div>
		<!-- /w140 -->
		<div class="box240 fl">
			 
			<div class="uibox-index mb" style="background-color: #ffffff;">
				<div class="title">
					<h2 class="tith">惠优选</h2>
				</div>
				<!-- /title -->
				<div class="cont pro-list-sides2">
					<ul>
						<?php $i = 0;foreach ($role as $v): $i++;?>
						<li <?php if ($i == count($role)) echo 'class="last"'?>>
							<dl>
								<dt>
									<a href="<?php echo \Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" class="img-h"><img src="<?php echo \Pub\Fram::Img_Url($v['PIC']); ?>" alt="<?php echo $v['NAME']?>"></a>
								</dt>
								<dd class="name">
									<a href="<?php echo \Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>"><?php echo $v['NAME']?></a>
								</dd>
								<dd class="price-box">
									<span class="price-sc"><i>¥</i><b><?php echo $v['PRICE']?></b></span>
									<?php if ($v['SHI_CHANG_PRICE'] > $v['PRICE']): ?>
									<span class="price-yj"><span class="wz">市场价</span><span class="num"><i>¥</i><b><?php echo $v['SHI_CHANG_PRICE']?></b></span></span>
									<?php endif; ?>
								</dd>
							</dl>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!-- /cont -->
				<div class="more">
					<a href="<?php echo \Pub\SysPara::Pro_List_Url();?>">更多&gt;&gt;</a>
				</div>
			</div>
			<!-- /uibox-index -->
			
			<div class="uibox-index mb" style="background-color: #ffffff;">
				<div class="title">
					<h2 class="tith">积分兑换</h2>
				</div>
				<!-- /title -->
				<div class="cont pro-list-sides2">
					<ul>
						<?php $i = 0;foreach ($point as $v): $i++;?>
						<li <?php if ($i == count($point)) echo 'class="last"'?>>
							<dl>
								<dt>
									<a href="<?php echo \Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" class="img-h"><img src="<?php echo \Pub\Fram::Img_Url($v['PIC']); ?>" alt="<?php echo $v['NAME']?>"></a>
								</dt>
								<dd class="name">
									<a href="<?php echo \Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>"><?php echo $v['NAME']?></a>
								</dd>
								<dd class="price-box">
									<span class="price-sc"><i>¥</i><b><?php echo $v['PRICE']?></b></span>
									<?php if ($v['SHI_CHANG_PRICE'] > $v['PRICE']): ?>
									<span class="price-yj"><span class="wz">市场价</span><span class="num"><i>¥</i><b><?php echo $v['SHI_CHANG_PRICE']?></b></span></span>
									<?php endif; ?>
								</dd>
								<dd class="huidian-proaction clearfix">
					                <p class="u-price" style="width:100%;"><i class="bk"></i><b><?php echo $v['HUI_DIAN']?></b><span class="dw bk">积分</span></p>
					            </dd>
							</dl>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!-- /cont -->
				<div class="more">
					<a href="<?php echo \Pub\SysPara::Pro_List_Url(0,1,0,0,0,2);?>">更多&gt;&gt;</a>
				</div>
			</div>
			<!-- /uibox-index -->


		</div>
		<!-- /w240 -->
		<div class="clear"></div>
		</div>
		<div id="content2">
	<div class="sy-pro">
  <div class="hrbox clearfix">
  <div class="sy-pro-title">

      <div class="txip"><span>最新上线</span></div>
       <div class="txip-y"><span><strong>NEW &nbsp; PRODUCTS</strong></span></div>
      </div>
  </div>
  </div>
	<?php \Pub\Yaf::display('pro-item',['pro'=>$pro_list],false); ?>
			
			<script>  
    $(document).ready(function (){
    	$('#pro_list').infinitescroll({
    		navSelector: "#navigation", //导航的选择器，会被隐藏
            nextSelector: "#navigation a", //包含下一页链接的选择器
            itemSelector: ".wfc", //你将要取回的选项(内容块)
            debug: true, //启用调试信息
            animate: true, //当有新数据加载进来的时候，页面是否有动画效果，默认没有
            extraScrollPx: 150, //滚动条距离底部多少像素的时候开始加载，默认150
            bufferPx: 40, //载入信息的显示时间，时间越大，载入信息显示时间越短
            maxPage: 5,
            errorCallback: function() {
                //alert('error');
            }, //当出错的时候，比如404页面的时候执行的函数
            localMode: true, //是否允许载入具有相同函数的页面，默认为false
            dataType: 'html',//可以是json
//            template: function(data) {
//                //data表示服务端返回的json格式数据，这里需要把data转换成瀑布流块的html格式，然后返回给回到函数
//                return '';
//            },
            loading: {
                msgText: "加载中...",
                finishedMsg: '到底了...',
                selector: '.loading' // 显示loading信息的div
            }
        }, function(newElements, data, url) { //回调函数
            //console.log(data);
            //alert(url);
        });
    
    });
</script> 
			<!-- /pro-list-span2 -->
		</div>
		</div>
	</div>
	</div>
	
	<!--/ content-->
	</div>
	<script src="http://msg.yunhuatong.com/im.js" id="chuanhaisoft_im_script" para_jsjq="0" para_add_friend="71.1;" pic_upload_url="http://www.chuanhaisoft.com/system/upload/Upload_im/">
	<?php \Pub\Yaf::display('footer'); ?>
	
</body>
</html>
