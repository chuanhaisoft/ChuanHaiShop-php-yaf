
/* 全局变量 */
// 保存UD数据，用于缓存
var gAdUserPropertyData;
// 定义广告素材全局变量
var gAdResData = {
	// 1、手机号码
	mobile : function(){
		return nRandom = 0;
	},
	// 2、易信
	yixin : function(){
		return nRandom = 1;
	},
	// 3、云音乐
	music : function(){
		return nRandom = 3;
	},
	
	read : function(){
		return nRandom = 4;
	},
	
	news : function(){
		return nRandom = 5;
	}
};

//错误提示语
var gErrorInfo = {
	'noId' : {
		'title' : '请先输入您的帐号'
	},
	'noPhone' : {
		'title' : '请先输入您的帐号'
	},
	'noPw' : {
		'title' : '请输入您的密码'
	},
	/*'noDynPw' : {
		'title' : '请输入动态密码'
	},
	'noDynPwByMob' : {
		'title' : '请输入手机短信中的动态密码'
	},
	'noDynPwByYX' : {
		'title' : '请输入易信接收到的动态密码'
	},
	'dynPwWrong' : {
		'title' : '您输入的动态密码错误，请重新输入'
	},
	'noBindingMob' : {
		'title' : '该邮箱帐号未绑定手机号码，需绑定才能使用动态密码功能 <a id="bindMobileBtn" href="http://shouji.mail.163.com/?from=dtmm" target="_blank">立即绑定>></a>'
	},
	'dynPwd2Much' : {
		'title' : '您今天使用动态密码登录次数太多了，请用普通密码登录吧'
	},
	'mobLoginWrongDomain' : {
		'title' : '这个帐号请到<a href="http://mail.126.com">126邮箱</a>进行登录'
	},*/
	'inputWrong' : {
		'title' : '帐号或密码错误',
		'info' 	: '1. 请检查帐号拼写，是否输入有误<br />'
	},
	'idLocked' : {
		'title' : '抱歉！您的帐号已被锁定，<br />暂时无法登录。'
	},
	'systemBusy' : {
		'title' : '繁忙的系统暂时需要停下歇歇，请您稍后再试。'
	},
	'loginWrong' : {
		'title' : '您的登录过于频繁，请稍后再试。'
	},
	'loginTimeout' : {
		'title' : '登录超时！',
		'info' 	: '当前邮箱登录状态已失效, 请重新登录。'
	}
};

var oStyle = {
	value	:	'-1'
};

(function(window){
	window.indexLogin = {
		init 					: fInit,
		setUserInfo 			: fSetUserInfo,
		// 输入相关
		initInputBox 			: fInitInputBox,
		focusInputBox 			: fFocusInputBox,
		idInputEvent 			: fIdInputEvent,
		checkPw 				: fCheckPw,
		//checkDynPw 			: fCheckDynPw,
		checkInputAlways 		: fCheckInputAlways,
		handleString 			: fHandleString,
		// tab切换相关
		switchTab 				: fSwitchTab,
		switchTabTimeout 		: fSwitchTabTimeout,
		setbSwitchTabTimeout 	: fSetbSwitchTabTimeout,
		// 登录相关
		setStyle 				: fSetStyle,
		submitForm 				: fSubmitForm,
		showTheHttpLogin 		: fShowTheHttpLogin,
		showError 				: fShowError,
		showLayer 				: fShowLayer,
		hideLayer 				: fHideLayer,
		vericalAlignBody 		: fVericalAlignBody,
		// 其它
		KX 						: fKX,
		tmpSwitchLog 			: fTmpSwitchLog
	};

	var oId, oIdL, oPw, oPwL/*, oDynPw, oDynPwL*/;
	var nDomainWidth = 75;
	var tab1Cls = 'login tab-1',
		tab2Cls = 'login tab-2';
	var ntabOn = 2,
		sTmpPwd = ''/*,
		sTmpDynPwd = ''*/;
	var bSwitchTabTimeout = true;

	//登录流程
	var sLoginFunc = 'ssl',
		bIsFirstLog = true,
		sCoremailCookie = '';

	// starttime 登录时间统计
	var bStartTime = true;

	var fScaleInterval = null,
		bStartScale = false;

	function fInit(){
		var me = this;

		oId = $id('idInput');
		oIdL = $id('idInputLine');
		oPw = $id('pwdInput');
		oPwL = $id('pwdInputLine');
		/*oDynPw = $id('dynPwInput');
		oDynPwL = $id('dynPwInputLine')*/;

		window.frames['frameforlogin'].location.href = 'about:blank';
		// 读取url判断是否有错误信息
		var sErrKey = 'errorType';
		if(window.location.href.indexOf('?' + sErrKey) > -1){
			var sErrorCode = fGetQuery(sErrKey);
			me.showError(sErrorCode);
		}

		// tab控制
		if(gbForcepc){
			tab2Cls = 'login tab-2 tab-22';
		}
		$id('loginBlock').className = tab2Cls;

		var oTab1 = $id('lbApp');
		fEventListen(oTab1, 'mouseover', me.switchTabTimeout);
		fEventListen(oTab1, 'mouseout', me.setbSwitchTabTimeout);

		if((window.location.href.indexOf('tab1') > -1) || fGetQueryHash('tab') == '1'){
			me.switchTab(); // 切换tab
			//me.tmpSwitchLog(); // 临时统计
		}

		me.focusInputBox();

		me.setUserInfo();
		me.initInputBox();

		// 绑定提交表单事件
		// fEventListen($id('login163'), 'submit', me.submitForm);
		$id('login163').onsubmit = function(){
			return me.submitForm();
		};

		// 大写锁定开启判断
		var oCapsLockTest = new CapsLock({
			el : oPw,
			change : function(bFlag){
				var oHint = $id('capsLockHint');
				if(bFlag){
					oHint.style.display = 'block';
				}else{
					oHint.style.display = 'none';
				}
			}
		});
		
		me.KX(); // 可信标识
	}

	/**
	 * 根据cookie预设用户信息
	 */
	function fSetUserInfo(){
		var me = this;
		// 邮箱版本设定
		var sLogType = fGetCookie('logType');
		if(sLogType == '' || sLogType == null){
			sLogType = gUserInfo.style;
		}
		switch(sLogType){
			case '7':
				fSetStyle(7); // js6
				break;
			case '6':
				fSetStyle(6); // jy6
				break;
			case '2':
				me.setStyle(2); // 青柠
				break;
			default :
				me.setStyle(-1);
		}
		// 兼容logType并清除
		fSetCookie('logType' , '' , false);

		// 用户名设定
		var sUser = gUserInfo.username,
			sUid = fGetQueryHash('uid'),
			sErrorUsername = fGetQuery('errorUsername', true),
			sResult;
		if(sUser != null){
			oId.autocomplete='on';
		}else{
			oId.autocomplete='off';
		}
		try{ oId.focus(); }catch(e){}
		if((sUser != '' && sUser != null) || sErrorUsername != null){
			sResult = sUser;
			if( sUid != null ){
				sResult = fCheckAccount(sUid);
			}
			// 错误页跳转参数
			if(sErrorUsername != null){
				sResult = fCheckAccount(sErrorUsername);
			}
			oId.value = sResult;
			fCls(oIdL, 'showPlaceholder', 'remove');
			me.idInputEvent();
			//gMobileNumMail.getNumFromMail(oId.value);
			try{ oPw.focus(); }catch(e){}
		}
	}

	/**
	 * 绑定输入框事件
	 */
	function fInitInputBox(){
		var me = this;
		var oLo = $id('loginBtn'),
			//oLo2 = $id('loginBtn2'),
			oRg = $id('lfBtnReg'),
			oIdLabel = $id('idPlaceholder'),
			oPwLabel = $id('pwdPlaceholder'),
			//oDynPwLabel = $id('dynPwPlaceholder'),
			oAutoTips = $id('whatAutologinTip'),
			oAutoLoginWrap = $id('lfAutoLogin'),
			oAutoLoginCheckbox = oAutoLoginWrap.getElementsByTagName('b')[0],
			oRemAutoLogin = $id('remAutoLogin'),
			oAutoLoginTxt = $id('remAutoLoginTxt'),
			oStyleConf = $id('styleConf'),
			oStyleConfBlk = $id('styleConfBlock')/*,
			oShowDynPwWrap = $id('showDynPwWrap')*/;
		var oBubbleLayer = $id('bubbleLayer');
		//帐号
		fEventListen(oIdL, 'mouseover', function(){
			fCls(oIdL, 'loginFormIpt-over', 'add');
		});
		fEventListen(oIdL, 'mouseout', function(){
			fCls(oIdL, 'loginFormIpt-over', 'remove');
		});
		fEventListen(oId, 'focus', function(){
			fCls(oId, 'formIpt-focus', 'add');
			fCls(oIdL, 'loginFormIpt-focus', 'add');
		});
		fEventListen(oId, 'blur', function(){
			fCls(oIdL, 'loginFormIpt-focus', 'remove');	
			if(oId.value == ''){
				fCls(oIdL, 'showPlaceholder', 'add');
				fCls(oId, 'formIpt-focus', 'remove');
			}else{
				oId.value = fCheckAccount(oId.value);
			}
		});

		var sEventName = '';
		var bIsIe = false;
		if(document.body.onpropertychange === null){
			sEventName = 'propertychange';
			var bIsIe = true;
		}else{
			sEventName = 'input';
			me.checkInputAlways();
		}
		var el = document.createElement('div');
		el.setAttribute('oninput', 'return;')
		if(typeof el.oninput === 'function'){
			sEventName = 'input';
			if(bIsIe){
				me.checkInputAlways();
			}
		}
		fEventListen(oId, sEventName, me.idInputEvent);
		//点击双击文字
		fEventListen(oIdLabel, 'dbclick', function(){
			oId.focus();
		});
		fEventListen(oIdLabel, 'click', function(){
			oId.focus();
		});

		//密码
		fEventListen(oPwL, 'mouseover', function(){
			fCls(oPwL, 'loginFormIpt-over', 'add');
		});
		fEventListen(oPwL, 'mouseout', function(){
			fCls(oPwL, 'loginFormIpt-over', 'remove');
		});
		fEventListen(oPw, 'focus', function(){
			fCls(oPw, 'formIpt-focus', 'add');
			fCls(oPwL, 'loginFormIpt-focus', 'add');
		});
		fEventListen(oPw, 'blur', function(){
			fCls(oPwL, 'loginFormIpt-focus', 'remove');
			if(oPw.value == ''){
				fCls(oPwL, 'showPlaceholder', 'add');
				fCls(oPwL, 'formIpt-focus', 'remove');
			}
		});
		fEventListen(oPw, sEventName, me.checkPw);
		//点击双击文字
		fEventListen(oPwLabel, 'dbclick', function(){
			oPw.focus();
		});
		fEventListen(oPwLabel, 'click', function(){
			oPw.focus();
		});
		//十天自动登录checkbox
		fEventListen(oAutoLoginCheckbox, 'click', function(){
			if(oRemAutoLogin.checked){
				fCls(oAutoLoginWrap, 'autoLogin-checked', 'remove');
				oRemAutoLogin.checked = false;
			}else{
				fCls(oAutoLoginWrap, 'autoLogin-checked', 'add');
				oRemAutoLogin.checked = true;
			}
		});
		fEventListen(oAutoLoginTxt, 'click', function(){
			if(oRemAutoLogin.checked){
				fCls(oAutoLoginWrap, 'autoLogin-checked', 'remove');
				oRemAutoLogin.checked = false;
			}else{
				fCls(oAutoLoginWrap, 'autoLogin-checked', 'add');
				oRemAutoLogin.checked = true;
			}
		});
		//十天自动登录文字提示
		fEventListen(oAutoLoginTxt, 'mouseover', function(){
			oAutoTips.style.display = 'block';
		});
		fEventListen(oAutoLoginTxt, 'mouseout', function(){
			oAutoTips.style.display = 'none';
		});
		//登录按钮
		fEventListen(oLo, 'mouseover', function(){
			fCls(oLo, 'btn-login-hover', 'add');
		});
		fEventListen(oLo, 'mouseout', function(){
			oLo.className = 'btn btn-main btn-login';
		});
		fEventListen(oLo, 'mousedown', function(){
			fCls(oLo, 'btn-login-active', 'add');
		});
		//注册按钮
		fEventListen(oRg, 'mouseover', function(){
			fCls(oRg, 'btn-reg-hover', 'add');
		});
		fEventListen(oRg, 'mouseout', function(){
			oRg.className = 'btn btn-side btn-reg';
		});
		fEventListen(oRg, 'mousedown', function(){
			fCls(oRg, 'btn-reg-active', 'add');
		});
		fEventListen(oRg, 'mouseup', function(){
			oRg.className = 'btn btn-side btn-reg';
		});
		//动态密码tab登录按钮
		/*fEventListen(oLo2, 'mouseover', function(){
			fCls(oLo2, 'btn-login2-hover', 'add');
		});
		fEventListen(oLo2, 'mouseout', function(){
			oLo2.className = 'btn btn-main btn-login2';
		});
		fEventListen(oLo2, 'mousedown', function(){
			fCls(oLo2, 'btn-login2-active', 'add');
		});*/
		//动态密码输入框
		/*fEventListen(oDynPwL, 'mouseover', function(){
			fCls(oPwL, 'loginFormIpt-over', 'add');
		});
		fEventListen(oDynPwL, 'mouseout', function(){
			fCls(oPwL, 'loginFormIpt-over', 'remove');
		});
		fEventListen(oDynPw, 'focus', function(){
			fCls(oDynPw, 'formIpt-focus', 'add');
			fCls(oDynPwL, 'loginFormIpt-focus', 'add');
		});
		fEventListen(oDynPw, 'blur', function(){
			fCls(oDynPwL, 'loginFormIpt-focus', 'remove');
			if(oDynPw.value == ''){
				fCls(oDynPwL, 'showPlaceholder', 'add');
				fCls(oDynPwL, 'formIpt-focus', 'remove');
			}
		});
		fEventListen(oDynPw, sEventName, me.checkDynPw);*/
		//获取动态密码按钮
		/*fEventListen(oShowDynPwWrap, 'mouseover', function(){
			fCls(oShowDynPwWrap, 'btn-showDynPwWrap-hover', 'add');
		});
		fEventListen(oShowDynPwWrap, 'mouseout', function(){
			oShowDynPwWrap.className = 'btn btn-showDynPwWrap';
		});
		fEventListen(oShowDynPwWrap, 'mousedown', function(){
			fCls(oShowDynPwWrap, 'btn-showDynPwWrap-active', 'add');
		});
		fEventListen(oShowDynPwWrap, 'mouseup', function(){
			oShowDynPwWrap.className = 'btn btn-showDynPwWrap';
		});*/
		//版本选择
		fEventListen(oStyleConf, 'click', function(){
			oStyleConfBlk.style.display = 'block';
		});
		oStyleConfBlk.onmouseout = function(e){
			var oE = e || window.event;
			var that = this;
			_fE(function(){
				oStyleConfBlk.style.display = 'none';
			}, oE, that);
		};
		//线路选择
		/**
		$id('locationTest').onmouseout = function(e){
			var oE = e || window.event;
			var that = this;
			_fE(function(){
				$id('locationTest').style.display = 'none';
			}, oE, that);
		};
		**/
		//阻止事件触发
		function _fE(fFunc, oE, oThat){
			var e = oE,
			relatedTarget = e.toElement || e.relatedTarget;
			while(relatedTarget && relatedTarget != oThat){
				relatedTarget = relatedTarget.parentNode;
			}
			if(!relatedTarget){
				fFunc();
			}
		}
	}

	/**
	 * 输入框聚焦
	 */
	function fFocusInputBox(){
		try{
			if(oId.value != ''){
				/*if(ntabOn == 1){
					gMobileNumMail.getNumFromMail(oId.value);
				}else{
					gMobileNumMail.getMailFromNum(oId.value);
				}*/
				fCls(oIdL, 'showPlaceholder', 'remove');
				fCls(oId, 'formIpt-focus', 'add');
				/*if(ntabOn == 1){
					oPw.focus();
					fCls(oPwL, 'loginFormIpt-focus', 'add');
				}else{
					oDynPw.focus();
					fCls(oDynPwL, 'loginFormIpt-focus', 'add');
				}*/
				if(ntabOn == 2){
					oPw.focus();
					fCls(oPwL, 'loginFormIpt-focus', 'add');
				}
			}else{
				oId.focus();
			}
		}catch(e){}
	}

	/**
	 * 输入超长时隐藏后缀显示区
	 */
	function fIdInputEvent(){
		var oShowDomain = $id('showdomain'),
			oInputTest = $id('idInputTest');
		if(oId.value == ''){
			fCls(oIdL, 'showPlaceholder', 'add');
			if(oInputTest.innerText != undefined){
				oInputTest.innerText = '';
			}else{
				oInputTest.innerHTML = '';
			}
			oShowDomain.style.width = nDomainWidth + 'px';
		}else{
			fCls(oIdL, 'showPlaceholder', 'remove');
			fCls(oId, 'formIpt-focus', 'add');
			if(oInputTest.innerText != undefined){
				oInputTest.innerText = oId.value;
			}else{
				oInputTest.innerHTML = oId.value;
			}
			var tmpWidth = oInputTest.offsetWidth;
			if(tmpWidth - 130 >= 0 && tmpWidth - 130 <= nDomainWidth){
				oShowDomain.style.width = nDomainWidth - (tmpWidth - 130) + 'px';
			}else if(tmpWidth - 130 < 0){
				oShowDomain.style.width = nDomainWidth + 'px';
			}else{
				oShowDomain.style.width = '0px';
			}
		}
	}

	/**
	 * 检查密码输入框状态
	 */
	function fCheckPw(){
		if(oPw.value != ''){
			fCls(oPwL, 'showPlaceholder', 'remove');
			fCls(oPw, 'formIpt-focus', 'add');
		}else{
			fCls(oPwL, 'showPlaceholder', 'add');
		}
	}

	/**
	 * 检查动态密码输入状态
	 */
	/*function fCheckDynPw(){
		if(oDynPw.value != ''){
			fCls(oDynPwL, 'showPlaceholder', 'remove');
			fCls(oDynPw, 'formIpt-focus', 'add');
		}else{
			fCls(oDynPwL, 'showPlaceholder', 'add');
		}
	}*/

	/**
	 * 持续检查输入框状态
	 */
	function fCheckInputAlways(){
		var me = this;
		window.oIntervalCheckInputAlways = setInterval(function(){
			if(oId.value != ''){
				fCls(oIdL, 'showPlaceholder', 'remove');
				fCls(oId, 'formIpt-focus', 'add');
			}else{
				fCls(oIdL, 'showPlaceholder', 'add');
			}
			me.idInputEvent();
			me.checkPw();
			//me.checkDynPw();
		},500);
	}

	/**
	 * 字符转换（全角转半角，中文逗号转英文逗号）
	 * @param  {[type]} s [description]
	 * @return {[type]}   [description]
	 */
	function fHandleString(s){ 
		var result = "";
		for(var i = 0; i < s.length; i++){
			if(s.charCodeAt(i)==12288){
				result += String.fromCharCode(s.charCodeAt(i)-12256);
				continue;
			}
			if(s.charCodeAt(i)>65280 && s.charCodeAt(i)<65375){
				result += String.fromCharCode(s.charCodeAt(i)-65248);
			}else{
				result += String.fromCharCode(s.charCodeAt(i));
			}
		}
		result.replace(/。/g, '.');
		return result;
	}

	/**
	 * 绑定tab事件
	 */
	function fSwitchTab(){
		var me = this;
		var oTab = $id('loginBlock'),
			oTab1 = $id('lbNormal'),
			oTab2 = $id('lbApp'),
			oIdLabel = $id('idPlaceholder'),
			oNormalTab = $id('normalLoginTab'),
			oAppTab = $id('appLoginTab');
		var oInputTest = $id('idInputTest');
		me.hideLayer();

		if(ntabOn == 2){
			// 加载app登录js
			if(window.appLogin){
				appLogin.init();
			}else{
				fGetScript('/js/applogin.js', function(){
					appLogin.init();
				});
			}
			oNormalTab.style.display = 'none';
			oAppTab.style.display = 'block';
			oTab.className = tab1Cls;
			ntabOn = 1;
			fEventUnlisten(oTab2, 'mouseover', me.switchTabTimeout);
			fEventUnlisten(oTab2, 'mouseout', me.setbSwitchTabTimeout);
			fEventListen(oTab1, 'mouseover', me.switchTabTimeout);
			fEventListen(oTab1, 'mouseout', me.setbSwitchTabTimeout);
		}else{
			window.appLogin && appLogin.clearPoll();
			oPw.name = 'password';
			//oDynPw.name = '';
			//sTmpDynPwd = oPw.value;
			oAppTab.style.display = 'none';
			oNormalTab.style.display = 'block';
			oTab.className = tab2Cls;
			ntabOn = 2;
			fEventUnlisten(oTab1, 'mouseover', me.switchTabTimeout);
			fEventUnlisten(oTab1, 'mouseout', me.setbSwitchTabTimeout);
			fEventListen(oTab2, 'mouseover', me.switchTabTimeout);
			fEventListen(oTab2, 'mouseout', me.setbSwitchTabTimeout);
			oPw.value = sTmpPwd;
			if(sTmpPwd == ''){
				fCls(oPwL, 'showPlaceholder', 'add');
			}else{
				fCls(oPwL, 'showPlaceholder', 'remove');
			}
		}
		me.idInputEvent();
		me.focusInputBox();
	}

	function fSwitchTabTimeout(){
		setTimeout(function(){
			if(bSwitchTabTimeout){
				indexLogin.switchTab();
			}else{
				bSwitchTabTimeout = true;
			}
		}, 200);
	}

	function fSetbSwitchTabTimeout(){
		bSwitchTabTimeout = false;
	}

	/**
	 * 设置版本
	 * @param  {Number} n 版本号
	 */
	function fSetStyle(n){
		var oStyleConfBlk = $id('styleConfBlock');
		var aVers = oStyleConfBlk.getElementsByTagName('a');
		for(var i=0, l=aVers.length; i<l; i++){
			aVers[i].className = '';
		}
		oStyle.value = n;
		$id('styleconf' + n).className = 'verSelected';
		$id('styleConf').innerHTML = $id('styleconf' + n).innerHTML + ' <b class="ico ico-arr ico-arr-d"></b>';
		oStyleConfBlk.style.display = 'none';
		// 判断是否全程ssl
		if(n == 3 || n == 6){
			// 简约5\简约6 显示全程ssl
			$id('loginSSL').style.display = 'none';
			$id('AllSSL').style.display = 'block';
		}else{
			$id('loginSSL').style.display = 'block';
			$id('AllSSL').style.display = 'none';
			$id('AllSSLCkb').checked = false;
		}
	}
	
	
	
$(function(){

 $("#MyLoginButton").bind("click",function(){
    
	var me = window.indexLogin;

		// 检查输入
		oId.value = fTrim(oId.value);
		if(oId.value == ''){
			oId.focus();
			me.showError(1);
			return false;
		}
		if(ntabOn == 2){
			if(oPw.value.length == ''){
				oPw.focus();
				me.showError(3);
				return false;
			}else if(!fTrim(oPw.value)){ // 特殊处理密码全空格
				me.showError(460);
				return false;
			}
		}
var save10day=0;
if($('#remAutoLogin').is(':checked')) {
    save10day =1;
}	
	
var aj = $.ajax( {  
    url:'/chuanhai-login.shtml',// 跳转到 action  
    data:{  
        username : oId.value,  
        password : oPw.value,
		save10day: save10day
    },  
    type:'post',  
    cache:false,  
    dataType:'json',  
    success:function(data) {  
        if(data.error =="0" ){
            if(data.msg) alert(data.msg);  
            window.location.href='/chuanhai-admin.shtml';
        }else{  
            alert(data.msg);  
        }  
     },  
     error : function() {  
          // view("异常！");  
          alert("异常！");  
     }  
});
	
	
	
	
     });           
            
});
	

	/**

	 * 登录提交
	 * @return {Boolean}
	 */
	function fSubmitForm(){
		var me = this;

		/*var bDyn = ntabOn == 2;
		// 浏览器禁止了ssl
		if(window.bHTTPSDisabled && bDyn){
			alert('由于您在浏览器设置中禁止使用了ssl，所以无法使用动态密码登录！');
			return false;
		}*/

		// 检查输入
		oId.value = fTrim(oId.value);
		if(oId.value == ''){
			oId.focus();
			me.showError(1);
			return false;
		}
		if(ntabOn == 2){
			if(oPw.value.length == ''){
				oPw.focus();
				me.showError(3);
				return false;
			}else if(!fTrim(oPw.value)){ // 特殊处理密码全空格
				me.showError(460);
				return false;
			}
		}/*else{
			if(oDynPw.value.length == ''){
				oDynPw.focus();
				if(window.DynamicPassword){
					if(DynamicPassword.sms){
						me.showError(5);
					}else if(DynamicPassword.yixin){
						me.showError(6);
					}else{
						me.showError(4);
					}
				}else{
					me.showError(4);
				}
				return false;
			}else if(!fTrim(oDynPw.value)){ // 特殊处理密码全空格
				me.showError(460);
				return false;
			}
		}*/

		// starttime 登录时间统计
		if(bStartTime){
			var sNow = new Date().getTime();
			fSetCookie("starttime", sNow, false);
			bStartTime = false;
		}

		//用户名、密码不标准字符处理
		oId.value = me.handleString(oId.value);
		oPw.value = me.handleString(oPw.value);
		//oDynPw.value = me.handleString(oDynPw.value);

		//16位密码截断
		if(oPw.value.length > 16){
			oPw.value = oPw.value.substr(0,16);
		}
		//保存十天免登录
		if($id('remAutoLogin').checked){
			$id('savelogin').value = 1;
		}else{
			$id('savelogin').value = 0;
		}
		//登陆后锁定tab
		var oTabDisabled;
		if( ntabOn == 2 ){
			oTabDisabled = $id('lbApp');
		}else{
			oTabDisabled = $id('lbNormal');
		}
		fEventUnlisten(oTabDisabled, 'mouseover', me.switchTabTimeout);
		fEventUnlisten(oTabDisabled, 'mouseout', me.setbSwitchTabTimeout);

		var fReBindSwitchTab = setInterval(function(){
			try{
				//若有错误提示，则重新绑定切换tab事件
				if(window.frames["frameforlogin"].document.body.className == 'error'){
					fEventListen(oTabDisabled, 'mouseover', me.switchTabTimeout);
					fEventListen(oTabDisabled, 'mouseout', me.setbSwitchTabTimeout);
					clearInterval(fReBindSwitchTab);
				}
			}catch(e){}
		},500);

		//锁定登录键
		$id('loginBtn').disabled = true;
		//$id('loginBtn2').disabled = true;

		//储存登录信息
		gUserInfo.username = oId.value;
		gUserInfo.style = oStyle.value;
		if(bIsFirstLog){
			//if($id('SslLogin').checked){
				gUserInfo.safe = 1;
				sLoginFunc = 'ssl';
			/*}else{
				gUserInfo.safe = 0;
				sLoginFunc = 'http';
			}*/
		}else{
			if(sLoginFunc == 'ssl'){
				gUserInfo.safe = 1;
			}else{
				gUserInfo.safe = 0;
			}
		}
		
		gVisitorCookie.saveInfo();
		//弹出超时对话框
		if(bIsFirstLog){
			sCoremailCookie = fGetCookie('Coremail');
			setTimeout(function(){
				//若无错误提示，则判断为登录超时
				try{
					if(window.frames["frameforlogin"].document.body.className != 'error'){
						me.showTheHttpLogin();
					}
				}catch(e){
					me.showTheHttpLogin();
				}
			},5000);
		}
		//判断登录来源
		var sUrlRace = aSpdResult[1]+'_'+aSpdResult[0]+'_'+aSpdResult[2]+'_'+aSpdResult[3],
			sUrlDf = (function(){
				var sDf = fGetQueryHash('df');
				if(sDf == null){
					// 判断不同tab
					//var bIsMobile = ntabOn == 2;
					//if(bIsMobile){
					//	sDf = 'mail163_mobile';
					//}else{
						sDf = 'mail163_letter';
					//}
				}
				fSetCookie('df',sDf,false);
				return sDf;
			})(),
			sUrlUid = oId.value + '@' + gOption.sDomain;
		// 全程SSL
		var sAllSSL = ($id('AllSSLCkb').checked ? fUrlP('allssl', 'true') : '');
		//选择登录方式
		switch(sLoginFunc){
			case 'ssl' :
				var oForm = $id('login163');
				oForm.action = gOption.sSslAction
				+ fUrlP('df',sUrlDf,true)
				+ fUrlP('from','web')
				+ fUrlP('funcid','loginone')
				+ fUrlP('iframe','1')
				+ fUrlP('language','-1')
				+ fUrlP('passtype','1')
				+ fUrlP('product','mail163')
				+ fUrlP('net',sLocationInfo)
				+ fUrlP('style', oStyle.value)
				+ fUrlP('race',sUrlRace)
				+ fUrlP('uid', sUrlUid)
				//+ (bDyn ? fUrlP('passAuthType', '1'):'')
				+ sAllSSL;
				if(bIsFirstLog){
					bIsFirstLog = false;
					return true;
				}else{
					oForm.submit();alert(1);
				}
				break;
			case 'http' :
				window.sHttpAction  = gOption.url
				+ fUrlP('df',sUrlDf,true)
				+ fUrlP('from','web')
				+ fUrlP('language','-1')
				+ fUrlP('net',sLocationInfo)
				+ fUrlP('race',sUrlRace)
				+ fUrlP('style', oStyle.value)
				+ fUrlP('uid', sUrlUid)
				//+ (bDyn ? fUrlP('passAuthType', '1'):'')
				+ sAllSSL;alert(2);
				loginRequest('fEnData');
				return false;
				break;
			default :;
		}
		return false;
	}

	/**
	 * 登录超时弹框
	 * @return {Boolean}
	 */
	function fShowTheHttpLogin(){
		var me = this;
		var oIdLoginBtn = $id('idLoginBtn'),
			oHttpTips = $id('enhttpTips');
		fResize();
		window.frames['frameforlogin'].location.href = 'about:blank';
		$id('enhttpblock').style.display = 'block';
		$id('mask').style.display = 'block';
		$id('enhttpblock').focus();
		if(sLoginFunc == 'ssl'){
			var sCoremailCookieNew = fGetCookie('Coremail');

			if( sCoremailCookieNew != sCoremailCookie ){
				oHttpTips.innerHTML = '登录成功..等待跳转..';
				oIdLoginBtn.style.display = 'none';
				return false;
			}else{
				var nCount = 3;
				oHttpTips.innerHTML = '<span id="backwards">' + nCount +'</span>&nbsp;秒后自动重试';
				oIdLoginBtn.innerHTML = '立刻登录';
				fEventUnlisten(oIdLoginBtn, 'click', _fLoginFunc);
				fEventListen(oIdLoginBtn, 'click', _fLoginFunc1);
				window.gBackwards = setInterval(function(){
					nCount = nCount - 1;
					$id('backwards').innerHTML = nCount;
					if(nCount == 0){
						clearInterval(window.gBackwards);
						sLoginFunc = 'http';
						me.submitForm();
						me.showTheHttpLogin();
					}
				},1000);
				return false;
			}
		}else{
			//oHttpTips.innerHTML = '点击重新尝试普通加密方式登录';
			oIdLoginBtn.innerHTML = '重试';
			fEventUnlisten(oIdLoginBtn, 'click', _fLoginFunc1);
			fEventListen(oIdLoginBtn, 'click', _fLoginFunc);
		}

		// 登录函数引用
		function _fLoginFunc(){
			me.submitForm();
		}
		function _fLoginFunc1(){
			me.submitForm();
			oHttpTips.innerHTML ='点击重新尝试https登录';
			oIdLoginBtn.innerHTML = '重试';
			clearInterval(window.gBackwards);
			fEventUnlisten(oIdLoginBtn, 'click', _fLoginFunc1);
			fEventListen(oIdLoginBtn, 'click', _fLoginFunc);
		}
	}

	/**
	 * 错误信息提示
	 * @param  {Number} nCode 错误代码
	 */
	function fShowError(nCode){
		var me = this;
		var sErrType = '',
			nTarget = 0;
		var sTitle = '',
			sInfo = '',
			sTpl = '';

		if(!isNaN(nCode)){
	    	nCode = nCode - 0;
	    }
		switch(nCode){
			case 'Login_Timeout':
				sErrType = 'loginTimeout';
				nTarget = 0;
				break;
			case 1:
				sErrType = 'noId';
				nTarget = 1;
				break;
			case 2:
				sErrType = 'noPhone';
				nTarget = 1;
				break;
			case 3:
				sErrType = 'noPw';
				nTarget = 2;
				break;
			case 4:
				sErrType = 'noDynPw';
				nTarget = 2;
				break;
			case 5:
				sErrType = 'noDynPwByMob';
				nTarget = 2;
				break;
			case 6:
				sErrType = 'noDynPwByYX';
				nTarget = 2;
				break;
			case 1000:
				sErrType = 'noBindingMob';
				nTarget = 1;
				break;
			case 1001:
				sErrType = 'dynPwWrong';
				nTarget = 2;
				break;
			case 1002:
				sErrType = 'dynPwd2Much';
				nTarget = 0;
				break;
			case 1003:
				sErrType = 'mobLoginWrongDomain';
				nTarget = 1;
				break;
			case 460:
			case 420:
				//$id('dynPwInput').value = '';
				sErrType = 'inputWrong';
				nTarget = 0;
				break;
			case 422:
				sErrType = 'idLocked';
				nTarget = 1;
				break;
			case 414:
			case 415:
			case 416:
			case 417:
			case 418:
			case 419:
				sErrType = 'loginWrong';
				nTarget = 0;
				break;
			/*case 412:
				//已单独处理
				break;*/
			default:
				sErrType = 'systemBusy';
				nTarget = 0;
		}
		sTitle = gErrorInfo[sErrType].title,
		sInfo = gErrorInfo[sErrType].info,
		sTpl = [
			'<div class="error-tt">',
				'<p>' + sTitle + '</p>',
			'</div>',
			sInfo && sInfo != '' ?  
			['<div id="errorDetail" class="error-detail">',
				'<p>提示：</p>',
				'<p class="error-info">' + sInfo + '</p>',
			'</div>'].join('') : ''
		].join('');
		me.showLayer(sTpl, nTarget);

		//恢复登录键
		$id('loginBtn').disabled = false;
		//$id('loginBtn2').disabled = false;
	}

	/**
	 * 显示气泡浮层
	 * @param  {String} sHtml 浮层内容
	 * @param  {Number} nTarget 浮层指向 0-通用 1-账号 2-密码
	 */
	function fShowLayer(sHtml, nTarget){
		var me = this;
		var oLayer = $id('bubbleLayer'),
			oLayerWrap = $id('bubbleLayerWrap'),
			oArr = $id('layerArr');
		var nBasePoint = 215;
		if(nTarget == 1){
			nBasePoint -= 30;
		}else if(nTarget == 2){
			nBasePoint += 30;
		}
		oLayerWrap.innerHTML = sHtml;
		$id('mainMask').style.display = 'block';
		fCls(oLayer, 'bubbleLayer-show', 'add');
		oLayer.style.top = nBasePoint - oLayer.offsetHeight/2 + 'px';
		oArr.style.top = (oLayer.offsetHeight - oArr.offsetHeight)/2 + 'px';

		fEventListen(document, 'click', me.hideLayer);
		if(!oLayer.__bindClick){
			fEventListen(oLayer, 'click', function(oEvt){
				try {
					oEvt.stopPropagation();
				} catch (e) {
					oEvt.cancelBubble = true;
				}
				oLayer.__bindClick = true;
			});
		}

		// 绑定手机号码增加参数
		var oBindMobBtn = $id('bindMobileBtn');
		if(oBindMobBtn){
			oBindMobBtn.href += '&username=' + oId.value + '&domain=' + gOption.sDomain;
			fEventListen(oBindMobBtn, 'click', indexLogin.hideLayer);
		}
	}

	/**
	 * 隐藏气泡浮层
	 */
	function fHideLayer(){
		fCls($id('bubbleLayer'), 'bubbleLayer-show', 'remove');
		$id('mainMask').style.display = 'none';
		fEventUnlisten(document, 'click', indexLogin.hideLayer);
	}

	/**
	 * 设置垂直居中
	 */
	function fVericalAlignBody(){
		var nBodyHeight = 730;
		var nClientHeight = document.documentElement.clientHeight;
		if(nClientHeight >= nBodyHeight + 2){
			var nDis = (nClientHeight - nBodyHeight)/2;
			document.body.style.paddingTop = nDis + 'px';
		}else{
			document.body.style.paddingTop = '0px';
		}
	}

	/**
	 * 重写可信标识
	 */
	function fKX(){
		function RndNum_CNNIC(k){
			for (var rnd = "", i = k; i--; ){
				rnd += Math.floor( Math.random() * 10 );
			}
			return rnd;
		}
		var oKX = $id('KX_IMG');
		var oKXimg = oKX.getElementsByTagName('img')[0];
		var sHref = 'https://ss.knet.cn/verifyseal.dll?sn=e12051044010020841301459&ct=df&pa=';
		var sPa = RndNum_CNNIC(6);
		oKX.href = sHref + sPa;
	}

	/**
	 * 临时统计
	 */
	function fTmpSwitchLog(){
		var sJsLogUrl = 'http://count.mail.163.com/beacon/webmail.gif?product=mail163tab2&type=from163com';
		sJsLogUrl = sJsLogUrl + '&rnd=' + (new Date()).getTime();
		var oJsLogImg = $id('jslogimg');
		if(!oJsLogImg){
			oJsLogImg = document.createElement("IMG");
			oJsLogImg.style.display = 'none';
			oJsLogImg.alt = '';
		}
		oJsLogImg.setAttribute("src", sJsLogUrl);
		if(oJsLogImg.alt == ''){
			document.body.appendChild(oJsLogImg);
			oJsLogImg.alt = 'set';
		}
		return;
	}
})(window);

/**
 * 头图接入个性化后台广告
 */
(function(window){
    window.themeHandler = {
        isOpen              : true,
        init                : fInit,
        initData            : fInitData,
        getData             : fGetData,
        callback            : fCallback,
		adGetUdData 		: fAdGetUdData,
		showThemes			: fShowThemes,
		showNext			: fShowNext,
		showPrev 			: fShowPrev,
		themeShowLog 		: fThemeShowLog,
		scoreIndex 			: fScoreIndex,
        _data               : {},
        _interface          : '/chuanhai-lunbo.shtml',
        _param              : {
        	//prod : 'wmail_lbp',
	        ver : 1,
	       	//uid : (gUserInfo.username ? gUserInfo.username : 'nt') + '@' + gOption.sDomain,
	        //domain : gOption.sDomain,
	        //mobUser : 0, // temp
	        callback : 'themeHandler.callback'
        },
        _dftMaterial : [{
        	type : 0,
            bgColor : "2F3034",
            bgCnt : "",
            bInitLink : true,
            bgLink : ""
        }],
		_bSuc 			: false,
		_currIndex		: 0
    };

    function fInit(){
        var me = this;
        me.initData();
        me.getData(); 
    }

    function fInitData(){
        var me = this;

        me._data = {
            // 个性化后台开关
            switcher : true,
            // 默认数据
            materials : me._dftMaterial,
            pid : 0
        };

        // 3秒后判断广告返回，仍无返回，则出容灾推广
		setTimeout(function(){
			if(me._bSuc){
				return;
			}else{
		        if(me._data.materials.length > 1){
		        	$id('prevTheme').style.display = 'block';
		        	$id('nextTheme').style.display = 'block';
		        }
		        me._currIndex = me._data.pid;
		        me.showThemes(me._data.materials[me._data.pid]); 
			}
		}, 3000);
    }

    function fGetData(){
        var me = this;
        if(!me.isOpen){
            me.callback();
            return;
        }
        if(me._data.switcher){
            fJSONP(me._interface, me._param);
        }else{
            me.callback();
        }
    }


    function fCallback(o){
        var me = this;
        me._bSuc = true;

        try{
        	var oData = window.gAdTemplate_lbp.parse(o);
        }catch(e){}

    	if(oData && oData.lbp){
            // 调用js转化广告模板
            me._data.materials = oData.lbp.material || me._dftMaterial;
            me._data.pid = oData.lbp.pid;
        }
        if(me._data.materials.length > 1){
        	$id('prevTheme').style.display = 'block';
        	$id('nextTheme').style.display = 'block';
        }
        me._currIndex = me._data.pid;
        me.showThemes(me._data.materials[me._data.pid]);
    }

	/**
	 * 获取个性化用户数据
	 * @return {Object} 个性化数据标志位组合对象
	 */
	function fAdGetUdData(){
		try {
			var oData = gAdUserPropertyData;
			if(oData){
				return oData;
			}else{
				oData = {};
			}
			// 读取cookie
			oData['all'] = fGetCookie('_mail_userattr_');
			if(oData['all'] && oData['all'].length > 0){
				oData['mobile'] = oData['all'].split("/")[0] - 0;
				oData['yixin'] = oData['all'].split("/")[1] - 0;
				oData['news'] = oData['all'].split("/")[2] - 0;
				oData['music'] = oData['all'].split("/")[3] - 0;
				oData['read'] = oData['all'].split("/")[4] - 0;
			}
			gAdUserPropertyData = oData;
			return oData;
		} catch (e) {return false;}
	}

	/**
	 * 主题图显示
	 * @param  {Object} oMaterial 素材对象
	 */
	function fShowThemes(oMaterial){
		var me = this;
		var oThemeWrap = $id('theme'),
			oBg = $id('mainBg'),
			oCnt = $id('mainCnt');
		// 重置oMaterial
		oThemeWrap.innerHTML = '';
		oThemeWrap.style.cssText = '';
		oBg.style.cssText = '';
		oCnt.style.cssText = '';
		if($id('themeIframe')){
			oCnt.removeChild($id('themeIframe'));
		}

		oMaterial.tempBgLink = oMaterial.bgLink || '';
		oMaterial.tempShowLink = oMaterial.showLink || '';
		
		// 为推广平台提供uid
		var sUid = (gUserInfo.username ? gUserInfo.username : 'nt') + '@' + gOption.sDomain;

		if(!oMaterial.bInitLink && oMaterial.bgLink && oMaterial.bgLink != ''){
			oMaterial.tempBgLink = oMaterial.bgLink ;
			
		}
		if(!oMaterial.bInitShowLink && oMaterial.showLink && oMaterial.showLink != ''){
			oMaterial.tempShowLink = oMaterial.showLink + '&uid=' + sUid;
		}

		// 展示数据统计
		if(oMaterial.tempShowLink != ''){
			me.themeShowLog(oMaterial.tempShowLink);
		}

		// 第三方自定义iframe
		if(oMaterial.type == 2){
			var oThemeIframe = document.createElement("iframe");
			oThemeIframe.id = 'themeIframe';
			oThemeIframe.className = 'main-inner-iframe';
			oThemeIframe.src = oMaterial.iframeUrl;
			oThemeIframe.setAttribute('scrolling', 'no');
			oCnt.insertBefore(oThemeIframe, oThemeWrap);
			oThemeWrap.style.display = 'none';
			return
		}

		// 图片显示处理
		if(oMaterial.bgColor){
			oBg.style.backgroundColor = '#' + oMaterial.bgColor;
		}else{
			oBg.style.backgroundColor = '#fff';
		}
		if(oMaterial.bgCnt && oMaterial.bgCnt != ''){
			_fImgLoader(oMaterial.bgCnt, function(){
				oCnt.style.backgroundImage = 'url(' + oMaterial.bgCnt + ')';
			});
		}
		if(oMaterial.bgSrc && oMaterial.bgSrc != ''){
			_fImgLoader(oMaterial.bgSrc, function(){
				oBg.style.backgroundImage = 'url(' + oMaterial.bgSrc + ')';
			});
		}

		// 首页评分
		if(oMaterial.scoreIndex){
			$id('scoreIndex').style.display = "block";
			window.oScoreIndex = oMaterial;
		}else{
			$id('scoreIndex').style.display = "none";
		}

		// 云音乐播放
		if(oMaterial.musicLink && oMaterial.musicLink !=''){
			$id('musicLink').style.display = "block";
			$id('musicLink').href = oMaterial.musicLink;
		}else{
			$id('musicLink').style.display = "none";
		}

		// 带链接主题图
		if(oMaterial.tempBgLink != ''){
			var oLink = document.createElement('a');
			oLink.style.cssText = 'position:absolute;width:605px;height:600px;left:0;top:0;cursor:pointer';
			oLink.href = oMaterial.tempBgLink;
			oLink.target = "_blank";
			oThemeWrap.appendChild(oLink);
			oLink.setAttribute('hideFocus', true);
		}

		// 带视频播放主题图
		if(oMaterial.type == 1 && oMaterial.video != ''){
			var aVideoPlayer = document.createElement('div');
			aVideoPlayer.style.cssText = 'position:absolute;overflow:hidden;width:'+oMaterial.videoWd+'px;height:'+oMaterial.videoHt+'px;top:'+oMaterial.videoTop+'px;left:'+oMaterial.videoLeft+'px';
			aVideoPlayer.innerHTML = '<embed width="' + oMaterial.videoWd + '" height="' + oMaterial.videoHt + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" src="' + oMaterial.video + '" allowScriptAccess="always" />';
			oThemeWrap.appendChild(aVideoPlayer);
		}

		function _fImgLoader(imgSrc, fSuccCallBack, fErrorCallBack, nTimeout){
			window.bImgLoaderIsLoaded = false;
			var oImg = document.createElement('IMG');
			if(fSuccCallBack){
				oImg.onload = function(){
					fSuccCallBack();
					window.bImgLoaderIsLoaded = true;
				};
			}
			if(fErrorCallBack){
				oImg.onerror = function(){
					fErrorCallBack();
				};
			}
			var nTime = 0;
			if(nTimeout){
				nTime = nTimeout;
			}
			setTimeout(function(){
				oImg.src = imgSrc;
			}, nTime);
		}
	}

	function fShowNext(n){
		var me = this;
		n = n || 1;
		me._currIndex += n;

		if(me._currIndex < 0){
			me._currIndex = me._data.materials.length - 1;
		}else if(me._currIndex >= me._data.materials.length){
			me._currIndex = 0;
		}

		me.showThemes(me._data.materials[me._currIndex]);
	}

	function fShowPrev(){
		this.showNext(-1);
	}

	/**
	 * 主题图广告展现统计
	 * @param  {String} sLink 展示统计链接url
	 */
	function fThemeShowLog(sLink){
		var oImg = document.getElementById("AD__IMG");
		if(!oImg){
			oImg = document.createElement("IMG");
			oImg.id = 'AD__IMG';
			oImg.width = "1px";
			oImg.height = "1px";
			oImg.style.position = 'absolute';
			oImg.style.left = '-100px';
			oImg.style.top = '-100px';
			document.body.appendChild(oImg);
		}
		oImg.src = sLink + '&rnd=' + Math.random();
	}

	/**
	 * 首页评分
	 * @return {Object} 首页评分方法对象
	 */
	function fScoreIndex(){
		var o = {
			 open : fScoreIndexOpen
			,close : fScoreIndexClose
		};

		function fScoreIndexOpen(){
			if(oScoreIndex){
				fResize();
				$id('mask').style.display = 'block';
				$id('scoreIndexPop').style.display = 'block';
				$id('scoreIndexPopIfm').src = '/scoreindex.htm';
			}else{
				return;
			}
		}

		function fScoreIndexClose(){
			$id('mask').style.display = 'none';
			$id('scoreIndexPop').style.display = 'none';
		}

		return o;
	}
})(window);

/**
 * 添加删除classname
 * @param  {Object} o     修改对象dom元素
 * @param  {String} sCls  classname
 * @param  {String} sFunc 修改classname方式：add/remove
 */
function fCls(o, sCls, sFunc){
	var oTar = o;
	var nRes = oTar.className.indexOf(sCls);
	if(sFunc == 'add'){
		if(nRes == -1){
			oTar.className = oTar.className + ' ' + sCls;
		}else{
			return;
		}
	}
	if(sFunc == 'remove'){
		if(nRes != -1){
			var sCls = '\\s' + sCls
			var rCls = new RegExp(sCls, 'g');
			oTar.className = oTar.className.replace(rCls, '');
		}else{
			return;
		}
	}
}

/**
 * 测速+定位服务
 */
//电信t:0,联通c:1,教育网e:2
var oSpdTestPosition = {
	 gz : ['gzt', 'gzc', 'gze']
	,hz : ['hz']
	,bj : ['t', 'c', 'e']
};
var aSpdResult = [-2,-2,-2,'db'],
	aSpdStartTime = [],
	aSpdEndTime = [],
	aSpdTmpTime = [],
	aSpdQueue = ['t','c','e'];
var bSpdAuto = true;
var sLocationInfo = 'failed';
var fSpeedTestPre = function(sArea){
	var nSpdRndPosition = Math.random() * 100;
	// 默认机率
	aSpdQueue = oSpdTestPosition.gz;
	aSpdResult[3] = 'gz';
	if(nSpdRndPosition <= 33){
		aSpdQueue = oSpdTestPosition.hz;
		aSpdResult[3] = 'hz';
	}
	if(nSpdRndPosition >33 && nSpdRndPosition <= 66){
		aSpdQueue = oSpdTestPosition.bj;
		aSpdResult[3] = 'bj';
	}

	if(sArea){
		aSpdQueue = oSpdTestPosition[sArea];
		aSpdResult[3] = sArea;
	}
	try{
		for(i=0;i<aSpdQueue.length;i++){
			var sLoca = aSpdQueue[i];
			fGetScript('http://'+ sLoca +'p.127.net/cte/' + sLoca + 'test?' + (new Date()).getTime());
		}
	}catch(e){
		fNetErrDebug('ErrfSpeedTestPre');
	}
};
var fSpeedTest = function(nCount){
	try{
		var nRnd;
		if(bSpdAuto){
			fNetErrDebug('fSpeedTest' + nCount);
			aSpdStartTime[nCount] = (new Date()).getTime();
			nRnd = aSpdStartTime[nCount];
		}else{
			aSpdStartTimeUser[nCount] = (new Date()).getTime();
			nRnd = aSpdStartTimeUser[nCount];
		}
		var sLoca = aSpdQueue[nCount];
		fGetScript('http://'+ sLoca +'p.127.net/cte/' + sLoca +'p?' + nRnd);
		if(bSpdAuto){
			aSpdResult[nCount] = -1;
		}
	}catch(e){
		fNetErrDebug('ErrfSpeedTest' + nCount);
	}
};
var fSpd = function(nCount){
	try{
		if(bSpdAuto){
			fNetErrDebug('Spd' + nCount);
			aSpdEndTime[nCount] = (new Date()).getTime();
			aSpdResult[nCount] = aSpdEndTime[nCount] - aSpdStartTime[nCount];
		}else{
			aSpdEndTimeUser[nCount] = (new Date()).getTime();
			aSpdResultUser[nCount] = aSpdEndTimeUser[nCount] - aSpdStartTimeUser[nCount];
			var sIdTmp = 'locationTest';
			var oTar = $id(sIdTmp + nCount);
			var nResult = Number(aSpdResultUser[nCount]);
			/*if(nResult < 100){
				oTar.style.color = "green";
			}else if(nResult < 300 && nResult > 100 ){
				oTar.style.color = "#ff7200";
			}else{
				oTar.style.color = "red";
			}*/
			oTar.innerHTML = '<span class="fontWeight">' + nResult + '</span>ms';
		}
	}catch(e){
		fNetErrDebug('ErrSpd' + nCount);
	}
};

//locationDot
var fLocationDot = function(nCount){
	var sId = 'locationDot';
	var oTar = $id(sId + nCount);
	return setInterval(
		function(){
			if(oTar.innerHTML == '...'){
				oTar.innerHTML = '';
			}else{
				oTar.innerHTML += '.';
			}
		},200);
}

//测速弹框
var aLocationDot = [];
var fSelectLoaction = function(sFunc){
	var oDiv = $id('locationTest');
	var oExt = $id('loginExt');
	if(sFunc == 'show'){
		oDiv.style.display = 'block';
		var sIdTmp = 'locationTest';
		for( var i=0 ; i<=2 ; i++){
			$id(sIdTmp + i).innerHTML = '测速中<span id="locationDot'+ i +'"></span>';
			//$id('locationBest' + i).style.display = 'none';
			aLocationDot[i] = fLocationDot(i);
		}
		fSpdUserInit();
		fSpeedTestPre('bj');
		window.oSelectLoaction = setInterval(
			function(){
				var nBest = 4;
				aSpdResultUser[nBest] = 999;
				for( var i=0 ; i<=2 ; i++){
					clearInterval(aLocationDot[i]);
					var sTxt = $id(sIdTmp + i).innerHTML;
					if( sTxt.match('测速中') ){
						$id(sIdTmp + i).style.color = '#999';
						$id(sIdTmp + i).innerHTML = '超时';
					}
					if(aSpdResultUser[i] != -1){
						if(aSpdResultUser[nBest] > aSpdResultUser[i]){
							nBest = i;
						}
					}
				}
				if( nBest !=4 ){
					$id('locationTest' + nBest).style.color = '#22ac38';
				}
				clearInterval(oSelectLoaction);
			},1000)
	}else{
		clearInterval(oSelectLoaction);
		for( var i=0 ; i<=2 ; i++){
			clearInterval(aLocationDot[i]);
		}
		oDiv.style.display = 'none';
	}
},
fSpdUserInit = function(){
	bSpdAuto = false;
	window.aSpdResultUser = [-1,-1,-1];
	window.aSpdStartTimeUser = [];
	window.aSpdEndTimeUser = [];
	window.aSpdResult = [-3,-3,-3,'db'];
	var sIdTmp = 'locationTest';
	for( var i=0 ; i<=2 ; i++){
		$id(sIdTmp + i).style.color = '#848585';
	}
},
fLocationChoose = function(sOperator){
	clearInterval(oSelectLoaction);
	for( var i=0 ; i<=2 ; i++){
		clearInterval(aLocationDot[i]);
		$id('locationHref' + i).className = $id('locationHref' + i).className.replace(/\sservSelected/g, '');
	}
	$id('selectLocationTips').style.display = 'none';
	$id('selectLocationTipsDone').style.display = 'inline';
	$id('locationTest').style.display = 'none';
	var oOperators = {
		t : '电信',
		c : '联通',
		e : '教育网'
	};
	var sTmpSelect = 0;
	for( j in oOperators ){
		if( j == sOperator ){
			$id('locationHref' + sTmpSelect).className += ' servSelected';
			break;
		}
		sTmpSelect++;
	}
	$id('selectLocation').innerHTML = oOperators[sOperator];
	sLocationInfo = sOperator;
},
fSetLocation = function(data){
	var tmpData = '';
	var aData = data.split('&');
	for(var i = 0; i < aData.length; i++){
		var aParam = aData[i].split('=');
		if(aParam.length >= 2){
			if(aParam[0] == 'net'){
				tmpData = aParam[1];
				break;
			}
		}
	}
	if(tmpData == ''){
		sLocationInfo = 'err';
	}else{
		sLocationInfo = tmpData;
	}
	//使用此服务用户阀值
	var nPct = 100;// 0 - 100
	var rnd = Math.random()*100;
	if(rnd < nPct){
		fNetErrDebug('rnd' + ((rnd + '').split('.'))[0]);
		fSpeedTestPre();
	}else{
		bSpdAuto = false;
	}
};

function fNetErrDebug(sStep){
	try{
		if(sLocationInfo.match('err') != null){
			var sFlow = '-' + sStep;
			aSpdResult[3] += sFlow;
		}
	}
	catch(e){}
}

window.onload = function(){
	indexLogin.init();
	themeHandler.init();
	// fq统计
	////fFQ();
	//启动定位访问
	////fGetScript('http://iplocator.mail.163.com/iplocator?callback=fGetLocator');
	// 推广更新后台
	loginExtAD.init();
	// piwik 输出1%的日志
	if(fRandom(100) <= 1){
		var pkBaseURL = "http://pstat.mail.163.com/";
		fGetScript(pkBaseURL + 'piwik.js', function(){
			try{
				var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 16);
				piwikTracker.trackPageView();
				piwikTracker.enableLinkTracking();
			}catch(err){}
		});
	}
};

// 设置内容垂直居中
indexLogin.vericalAlignBody();
fEventListen(window, 'resize', fResize);
fEventListen(window, 'resize', function(){
	indexLogin.vericalAlignBody();
	fCls(document.body, 'move', 'add');
});