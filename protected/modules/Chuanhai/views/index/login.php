<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo \Pub\SysPara::SiteName; ?></title>
<link rel="stylesheet" type="text/css" href="/css/login.css" />
<script id="jsOption" type="text/javascript">
//当前域名配置
var gOption = {
	"sDomain" : "yunhuatong.com",
	"sCookieDomain" : "yunhuatong.com",
	"sAutoLoginUrl" : "/chuanhai/login/",
	"sSslAction" : "/chuanhai/login/",
	"product" : "yunhuatong.com",
	"url" : "/chuanhai/login/",
	"url2" : "/chuanhai/login/",
	"gad" : "/chuanhai/login/"
};
</script>
<script id="jsBase" type="text/javascript" src="/js/login/base_v5.min.js"></script>
<script type="text/javascript" src="/js/jQuery.js"></script>

<script id="jsInit" type="text/javascript">
fSetCookie("starttime",'',false); // starttime 登录时间统计
fCheckCookie();
fCheckAutoLogin();
if(!fGetQuery('errorType')){ // 有错误信息时不自动登录
	fAutoLogin();
}

fHtml5Tag();
</script>
</head>

<body>


<header class="header">
	<h1 class="headerLogo" style="margin-top:-15px;"><a href="#"  title=""><img src="/<?php echo \Bll\Pub::Value(205) ?>" alt=""></a></h1>
	<nav class="headerNav">

        <a href="#" target="_blank"></a>
        <a href="#" target="_blank"></a>
        <a href="#" >帮助</a>&nbsp;|&nbsp;<a class="last" href="#" >在线答疑</a>
	</nav>
</header>




<section class="main" id="mainBg">
	<div class="main-inner" id="mainCnt">
		<div id="theme">
			<noscript><p class="noscriptTitle">浏览器不支持或禁止了网页脚本，<br/>导致您无法正常登录。</p><br/></noscript>
		</div>
		<div class="themeCtrl">
			
			<a id="prevTheme" href="javascript:void(0);" onClick="themeHandler.showPrev()" title="上一张"></a>
			<a id="nextTheme" href="javascript:void(0);" onClick="themeHandler.showNext()" title="下一张"></a>
		</div>
	</div>
	<!--气泡浮层遮罩-->
	<div id="mainMask" style="display:none"></div>
	<!--通用气泡浮层-->
	<div id="bubbleLayer" class="layer">
		<div class="layer-hd"></div>
		<div id="bubbleLayerWrap" class="layer-mid"></div>
		<div class="layer-ft"></div>
		<div id="layerArr" class="layer-arrow"></div>
	</div>
	<!--登录框-->
	<div id="loginBlock" class="login tab-2">
		<div class="loginFunc">
			<div id="lbApp" class="loginFuncApp">手机访问</div>
			<div id="lbNormal" class="loginFuncNormal">用户帐号登录</div>
		</div>
		<!-- 安全登录 -->
		<div id="appLoginTab" class="loginForm">
			<div id="appLoginWait">
				<h3>功能开发中，请稍后。</h3>
				<div id="appCodeWrap">
					<div class="appCode-example"></div>
					<div id="appCodeBox">
						
						
					</div>
				</div>
				<!--<p id="appLoginTxt" class="txt-err"></p>-->
				
			</div>
			<div id="appLoginScan" style="display:none">
				<div class="appLogin-scanSuc"></div>
				<p class="appLogin-scantxt txt-suc">成功扫描，请在手机上确认登录</p>
				<a id="appLoginRestart" href="javascript:void(0)">返回重新扫描</a>
			</div>
			<form id="appLoginForm" method="post" action="" autocomplete="off" target="_self"></form>
			<img id="appLoginStat" width="1" height="1" style="position:absolute;left:0;bottom:-1px" src="" />
		</div>
		<!-- 邮箱帐号登录 -->
		<div id="normalLoginTab" class="loginForm">
			<form id="login163" name="login163" method="post" action="model.htm" target="frameforlogin">
				<input type="hidden" id="savelogin" name="savelogin" value="0" />
				<input type="hidden" id="url2" name="url2" value="model.htm" />
				<div id="idInputLine" class="loginFormIpt showPlaceholder">
					<b class="ico ico-uid"></b>
					<input class="formIpt" tabindex="1" title="请输入帐号" id="idInput" name="username" type="text" maxlength="50" value="" />
					<span id="showdomain" class="domain"></span>
					<div id="mobtips"></div>
					<label for="idInput" class="placeholder" id="idPlaceholder">请输入用户名</label>
					<div id="idInputTest"></div>
				</div>
				<!-- 普通密码登录 -->
				<div id="normalLogin">
					<div id="pwdInputLine" class="loginFormIpt showPlaceholder">
						<b class="ico ico-pwd"></b>
						<input class="formIpt" tabindex="2" title="请输入密码" id="pwdInput" name="password" type="password"/>
						<label for="pwdInput" class="placeholder" id="pwdPlaceholder">密码</label>
						<p id="capsLockHint" style="display: none">大写状态开启</p>
					</div>
					<div class="loginFormCheck">
						<div id="lfAutoLogin" class="loginFormCheckInner">
							<b class="ico ico-checkbox"></b>
							<label id="remAutoLoginTxt" for="remAutoLogin">
								<input tabindex="3" title="十天内免登录" class="loginFormCbx" type="checkbox" id="remAutoLogin" />
							十天内免登录</label>
							<div id="whatAutologinTip">为了您的信息安全，请不要在网吧或公用电脑上使用此功能！
							</div>
						</div>
						<div class="forgetPwdLine">						
							
						</div>
					</div>
					<div class="loginFormBtn">
                    <button id="MyLoginButton" class="btn btn-main btn-login" tabindex="6" type="button">登&nbsp;&nbsp;录</button>
						<button style="display:none" id="loginBtn" class="btn btn-main btn-login" tabindex="6" type="submit">登&nbsp;&nbsp;录</button>
						<a id="lfBtnReg" class="btn btn-side btn-reg" href="/user/user/reg.html" target="_blank" tabindex="7" style="display:none"></a>
					</div>
				</div>
				
				<div class="loginFormConf" style="display:none">
					<div class="loginFormVer">
						版本: <a id="styleConf" href="javascript:void(0);">默认版本 <b class="ico ico-arr ico-arr-d"></b></a>
					</div>
					<div class="loginFormService" id="loginSSL">正使用SSL登录</div>
					<div id="styleConfBlock" class="loginFormVerList unishadow">
						<ul>
							<li><a id="styleconf-1" class="verSelected" href="javascript:void(0);" onClick="indexLogin.setStyle(-1)">默认版本</a></li>
							<li><a id="styleconf7" href="javascript:void(0);" onClick="indexLogin.setStyle(7)"></a></li>
							<li><a id="styleconf6" href="javascript:void(0);" onClick="indexLogin.setStyle(6)"></a></li>
						</ul>
					</div>
					<div class="loginFormService" id="AllSSL" style="display:none">
						<input title="全程SSL" class="loginFormCbx" type="checkbox" id="AllSSLCkb" />&nbsp;<label style="vertical-align:baseline;" for="AllSSLCkb">全程SSL</label>
					</div>
					<div class="loginFormCheckInner" style="display:none">
						<input class="loginFormCbx loginFormSslCbx" type="checkbox" tabindex="5" title="SSL安全登录" id="SslLogin" checked="checked" /><label class="loginFormSslText" for="SslLogin">&nbsp;<span style="font-family:verdana;">SSL</span>安全登录</label>
					</div>
					<div class="loginFormService" style="display:none">
						<a id="selectLocationTips" href="javascript:void(0);" onClick="fSelectLoaction('show');return false;">登录速度太慢? <b class="ico ico-arr ico-arr-d"></b></a>
						<span id="selectLocationTipsDone">
							<a href="javascript:void(0);" onClick="fSelectLoaction('show');return false;">
								<span>服务器: <span id="selectLocation">电信</span></span><b class="ico ico-arr ico-arr-d"></b>
							</a>
						</span>
					</div>
					<div id="locationTest" class="unishadow">
						<div class="locationTestTitle">
							<h3>测试并选择最佳服务器</h3>
							<a class="locationTestTitleClose" href="javascript:void(0);" onClick="fSelectLoaction();return false;">>关闭</a>
						</div>
						<div class="locationTestList">
							<ul>
								<li>
									<a id="locationHref0" href="javascript:void(0);" onClick="fLocationChoose('t');return false;">
									电&nbsp;&nbsp;&nbsp;信
									<br/><span class="locationTestEach" id="locationTest0"></span>
									</a>
								</li>
								<li style="border-left:1px solid #d5dbe2;border-right:1px solid #d5dbe2;">
									<a id="locationHref1" href="javascript:void(0);" onClick="fLocationChoose('c');return false;">
									联&nbsp;&nbsp;&nbsp;通
									<br/><span class="locationTestEach" id="locationTest1"></span>
									</a>
								</li>
								<li>
									<a id="locationHref2" href="javascript:void(0);" onClick="fLocationChoose('e');return false;">
									教育网
									<br/><span class="locationTestEach" id="locationTest2"></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="mailApp">
					<a class="mailApp-logo" href="#" style="display:none"></a>
				</div>
			</form>
			<div class="ext" id="loginExt">
				<div id="extVerSelect">适配？</div>
				<ul style="display:none" id="extText"></ul>
				<ul>
                <li class="ext-1">
                </li>
                <li class="ext-2">
                   </li>
                </ul>
			</div>
		</div>
	</div>
</section>

<footer id="footer" class="footer">
	<div class="footer-inner" id="footerInner">
		
		<a id="KX_IMG" style="position:absolute;right:50px;top:24px;" href="https://ss.knet.cn/verifyseal.dll?sn=e12051044010020841301459&ct=df&pa" target="_blank">
			
		</a>
		<nav class="footerNav">
			<span class="copyright">Copyright@ <?php echo \Pub\SysPara::SiteName; ?> all rights reserved 鲁ICP备号-1</span>
		</nav>
	</div>
</footer>
<!--遮罩-->
<div id="mask" class="mask" style="display:none;"></div>
<!--登录提示弹框-->
<div class="enhttp" style="display:none" id="enhttpblock">
	<div class="enhttpbox">
		<div class="topborder"></div>
		<div class="ct">
			<div class="inner">
				
			</div>
		</div>
		<div class="bottomborder"></div>
	</div>
	<iframe class="httploginframe" src="about:blank" id="frameforlogin" name="frameforlogin" style="overflow:hidden;border:0">登录iframe</iframe>
</div>
<!--首页评分弹框-->
<div id="scoreIndexPop">
	<iframe id="scoreIndexPopIfm" src="about:blank" frameborder="0" scrolling="no" allowTransparency="allowtransparency"></iframe>
</div>



<script type="text/javascript" src="/js/login/1.js"></script>
<script type="text/javascript" src="/js/login/2.js"></script>




</body>
</html>