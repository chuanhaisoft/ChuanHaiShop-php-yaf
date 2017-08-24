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
<script type="text/javascript" src="/js/jquery.pin.js"></script>
</head>
<body>

<?php \Pub\Yaf::display('header',['hover'=>isset($hover)?$hover:null]); ?>
	<div id="content">
		<div class="box120 fl mr20">
		    <?php \Pub\Yaf::display('menu'); ?>
			<div style="width: 120px; height: 1px;"></div>
		</div>
		<!-- /box120 -->
		<div class="box1040 fl">
			<div class="crumbs_nav mb">
				<a href="<?php echo Pub\SysPara::Pro_List_Url($mallBreadCrumbs['ID']);?>" class="main-max"><?php echo $mallBreadCrumbs['NAME']?></a>
				<?php if (!empty($mallBreadCrumbs['SUB'])) :?>
				<span class="line">&gt;</span><a href="<?php echo Pub\SysPara::Pro_List_Url($mallBreadCrumbs['SUB']['ID']);?>"><?php echo $mallBreadCrumbs['SUB']['NAME']?></a>
				<?php endif; if (!empty($mallBreadCrumbs['SUB']['SUB'])) :?>
				<span class="line">&gt;</span><a href="<?php echo Pub\SysPara::Pro_List_Url($mallBreadCrumbs['SUB']['SUB']['ID']);?>"><?php echo $mallBreadCrumbs['SUB']['SUB']['NAME']?></a>
				<?php endif; ?>
			</div>
			<!-- /crumbs_nav -->
			
			<!--/ p_classify-->
			<div class="pro_search_box2 mb20">
				<div class="s-right">
					<div class="num-box">
						共<strong class="num"><?php echo $total;?></strong>条相关产品
					</div>
					<div class="pager">
						<ul class="items">
							
						</ul>
					</div>
				</div>
				<!-- /s-right -->
				<!--/ page-->
				<ul class="cz_but">
					<li class="r_line"><a <?php if ($paixu == 0) echo 'class="hover"';?> href="<?php echo Pub\SysPara::Pro_List_Url($mallsort['ID'],1,0,$user_id,0,$type).$searchParams;?>"><strong>默认</strong></a></li>
					<li class="r_line"><a <?php if ($paixu == 3) echo 'class="hover"';?> href="<?php echo Pub\SysPara::Pro_List_Url($mallsort['ID'],1,3,$user_id,0,$type).$searchParams;?>"><strong>销量</strong></a></li>
					<?php $p_paixu = ($paixu==1) ? 2 : 1;?>
					<li class="r_line"><a <?php if ($paixu == 1 || $paixu == 2) echo 'class="hover"';?> href="<?php echo Pub\SysPara::Pro_List_Url($mallsort['ID'],1,$p_paixu,$user_id,0,$type).$searchParams;?>"><strong>价格</strong></a></li>
					<li class="r_line"><a <?php if ($paixu == 4) echo 'class="hover"';?> href="<?php echo Pub\SysPara::Pro_List_Url($mallsort['ID'],1,4,$user_id,0,$type).$searchParams;?>"><strong>人气</strong></a></li>
				</ul>
				<form action="<?php echo Pub\SysPara::Pro_List_Url($sort_id,1,$paixu,$user_id,0,$type);?>" name="searchform">
					<?php if ($role): ?>
					<input type="hidden" name="role" value="<?php echo $role; ?>">
					<?php endif; ?>
					<div class="range-default mr20">
						<input type="text" name="minprice" class="price-txt" value="<?php echo $minprice;?>" placeholder="¥">
						<span class="divider">-</span>
						<input type="text" name="maxprice" class="price-txt" value="<?php echo $maxprice;?>" placeholder="¥">
						<input type="submit" class="submit-btn bk" value="确定">
					</div>
					<!-- /range-default -->
					<div class="search-small">
						<input type="text" name="keyword" class="price-txt w2" value="<?php echo $keyword;?>" placeholder="在结果中搜索">
						<input type="submit" class="submit-btn bk" value="确定">
					</div>
				</form>
				<!-- /range-default -->
			</div>
			<!--pro_search_box2 -->
			<?php \Pub\Yaf::display('pro-item',['pro'=>$pro],false); ?>
			<!-- / pro-list-span4-->
			<div class="page clearfix">
				<div class="p-wrap">
					<?php new Pub\PagerTool($pagesize,$total,$page,8,Pub\SysPara::Pro_List_Url($sort_id,'[page]',$paixu,$user_id,0,$type).$searchParams,1);?>
				</div>
			</div>
			<!-- /page -->
		</div>
		<!-- /box1040 -->
		<div class="clear"></div>
	</div>
	<!--/ content-->
	<?php \Pub\Yaf::display('footer'); ?>
</body>
</html>
