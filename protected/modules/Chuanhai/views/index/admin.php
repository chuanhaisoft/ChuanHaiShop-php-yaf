<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="Keywords" content="">
    <title>川海软件</title>
    <link rel="stylesheet" href="/js/layui/css/layui.css"  media="all">
    <link rel="stylesheet" type="text/css" href="/css/css1.css" />
    <script type="text/javascript" src="/js/jQuery.js"></script>
    <script src="/js/layui/layui.js"></script>
	<script type="text/javascript" src="/js/Common.js"></script>
	<script src="/chuanhai-tree.shtml"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
  .layui-body{bottom:0px !important;}
  .layui-tab {margin:0 1px;overflow:hidden;}

  .layui-tab-item { height:inherit;}
  .layui-body {left: 150px;}
  .layui-nav-tree .layui-nav-child a {height: 30px;line-height:30px;}
  
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
    <!-- 布局容器 -->
    <div class="layui-layout layui-layout-admin">
        <!-- 头部 -->
        <div class="layui-header">
            <div class="layui-main" style="color:#bbb">
                <!-- logo -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td><div align="left" style="letter-spacing:5px; padding-top:8px"><img height="50px" src="/images/logo_title.png"></div></td>
                <td><div align="left" style=" float:right; margin-top:-25px; margin-right:10px">
                <span id="UserLoginMess"><span style="font-size:12;">
					<script>document.write(userloginmess);</script>
				</span></span>
        | <a href="/" target="_blank" class="buy-now" style="color:#bbb">商城前端</a>

        
        
                </div>
				
				
<div align="left" style=" float:right;margin-top:8px; margin-bottom:-30px; margin-right:10px">
	<button class="layui-btn layui-btn-xs layui-btn-normal" style="background-color:#FF5722" onClick='OpenExtIframWindow2("/users/user/edit.html" ,"信息修改",680,500)'>修改个人信息</button>
	<button class="layui-btn layui-btn-xs layui-btn-normal" style="background-color:#FF5722" onClick="refreshPage()">刷新页面</button>
	<button class="layui-btn layui-btn-xs layui-btn-normal" style="background-color:#FF5722;display:none">关闭所有页面</button>
	<button class="layui-btn layui-btn-xs layui-btn-normal" style="background-color:#FF5722" onClick="ExtAlertFn('您确定退出么？',DoLoginOut);">退出登录</button>
</div>
				</td>
              </tr>
            </tbody></table>
                
               
            </div>
        </div>

        <!-- 侧边栏 -->
        <div class="layui-side layui-bg-black" style="width:150px;">
            <div class="layui-side-scroll" style="width:inherit">
                <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="left-nav" style="border-radius:0;width:inherit">
                </ul>
            </div>
        </div>

        <!-- 主体 -->
        <div class="layui-body" style="bottom:0px;" id="desktop_tab">
            <!-- 顶部切换卡 -->
            <div class="layui-tab layui-tab-brief" lay-filter="top-tab" lay-allowClose="true" style="margin:0px; height:100%;">
                <ul class="layui-tab-title" style="height:40px; overflow:hidden" id="desktop_tab_ul">
					<li class="layui-this" lay-id="000">桌 面</li>
				</ul>
                <div class="layui-tab-content" style="padding: 0px 0px;height:100%">
					<div class="layui-tab-item layui-show">
						<iframe src="/chuanhai/index/desktop/" id="ifr000" style="width:100%;height:100%;border:0px;" allowtransparency="true"></iframe>
					</div>
				</div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        /**
         * 对layui进行全局配置
         */
        layui.config({
            base: '/js/admin/'
        });

        /**
         * 初始化整个cms骨架
         */
        layui.use(['desktop'], function() {
            var chuanhai_desktop = layui.desktop('left-nav', 'top-tab');

            chuanhai_desktop.addNav(tree_data, 0, 'id', 'pid', 'node', 'url');

            chuanhai_desktop.bind(60 + 40 + 0 + 0 ); //头部高度 + 顶部切换卡标题高度 + 顶部切换卡内容padding + 底部高度

            chuanhai_desktop.clickLI(0);
        });
    </script>
</body>
</html>