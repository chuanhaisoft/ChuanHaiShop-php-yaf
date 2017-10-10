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
	<div class="content">
		<div class="box120 fl mr20">
		    <?php \Pub\Yaf::display('menu'); ?>
			<div style="width: 120px; height: 1px;"></div>
		</div>
		<!-- /box120 -->
		<div class="box1040 fl">
			
			<!-- /page -->
		</div>
		<!-- /box1040 -->
		<div class="clear"></div>
	</div>
	<!--/ content-->
	<?php \Pub\Yaf::display('footer'); ?>
</body>
</html>
