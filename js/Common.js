function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
    var isOpera = userAgent.indexOf("Opera") > -1;
    if (isOpera) {
        return "Opera"
    }; //判断是否Opera浏览器
    if (userAgent.indexOf("Firefox") > -1) {
        return "FF";
    } //判断是否Firefox浏览器
    if (userAgent.indexOf("Chrome") > -1){
  return "Chrome";
 }
    if (userAgent.indexOf("Safari") > -1) {
        return "Safari";
    } //判断是否Safari浏览器
    if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {
        return "ie";
    }; //判断是否IE浏览器
}

function GetAjax(_Url,_Para)
{
	var aj = $.ajax( 
	{  
		url:_Url,
		data:_Para,  
		type:'post',  
		cache:false,  
		dataType:'script',  
		success:function(data) {  
			
		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");  
		 }  
	}
	);

}

function GetAjaxAuto(_Url,_Para)
{
	var aj = $.ajax( 
	{  
		url:_Url,
		data:_Para,  
		type:'post',  
		cache:false,  
		//dataType:'json',  
		success:function(data) {  
			var _callback = arguments[2] ? arguments[2] : '';
			if(_callback && _callback!='')
			{
				_callback(data);
			}
		 },  
		 error : function() {  
			  alert("异常！");  
		 }  
	}
	);

}

function IfFunHave(funcName) {
    try {
        if (typeof(eval(funcName)) == "function") {
            return true;
        }
    } catch(e) {}
    return false;
}

function PageReLoad()
{
	window.location.reload();
}

function GetDomHeight(_FormDiv)
{
	return window.document.getElementById(_FormDiv).offsetHeight;
}

function FormToExt(_FormDiv,_Para)
{
	$(function()
	{ 
		var Fields = $("#"+_FormDiv+" :input");
		for (var i = 0; i < Fields.length; i++)
		{
			_Para[Fields[i].name] = Fields[i].value;
		}
		//单选
		Fields = $("#"+_FormDiv+" :radio");
		for (var i = 0; i < Fields.length; i++)
		{
			_Para[Fields[i].name] = $("input[name='"+Fields[i].name+"']:checked").val();
		}
	});

}


function CardNumToName(_CardNumFrom,_NameViewDom)
{
	$("#"+_NameViewDom).html('');
	if($("#"+_CardNumFrom).val()=='')
	{
		return false;
	}
	var aj = $.ajax( 
	{  
		url:'/data_shop/order_user/checkcardnum.html',// 跳转到 action  
		data:{  
			card_num : $("#"+_CardNumFrom).val()
		},  
		type:'post',  
		cache:false,  
		dataType:'json',  
		success:function(data) {  
			if(data.error =="0" ){
				$("#"+_NameViewDom).html(data.msg);
				//alert(data.msg);
			}else{  
				$("#"+_NameViewDom).html(data.msg);
			}  
		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");  
		 }  
	}
	);

}

function CardNumToNameAll(_CardNumFrom,_NameViewDom)
{
	$("#"+_NameViewDom).html('');
	if($("#"+_CardNumFrom).val()=='')
	{
		return false;
	}
	var aj = $.ajax( 
	{  
		url:'/data_shop/order_user/checknum.html',// 跳转到 action  
		data:{  
			card_num : $("#"+_CardNumFrom).val()
		},  
		type:'post',  
		cache:false,  
		dataType:'json',  
		success:function(data) {  
			if(data.error =="0" ){
				$("#"+_NameViewDom).html(data.msg);
				//alert(data.msg);
			}else{  
				$("#"+_NameViewDom).html(data.msg);
			}  
		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");  
		 }  
	}
	);

}



function base64_encode(str){
		var c1, c2, c3;
		var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";                
		var i = 0, len= str.length, string = '';

		while (i < len){
				c1 = str.charCodeAt(i++) & 0xff;
				if (i == len){
						string += base64EncodeChars.charAt(c1 >> 2);
						string += base64EncodeChars.charAt((c1 & 0x3) << 4);
						string += "==";
						break;
				}
				c2 = str.charCodeAt(i++);
				if (i == len){
						string += base64EncodeChars.charAt(c1 >> 2);
						string += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
						string += base64EncodeChars.charAt((c2 & 0xF) << 2);
						string += "=";
						break;
				}
				c3 = str.charCodeAt(i++);
				string += base64EncodeChars.charAt(c1 >> 2);
				string += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
				string += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
				string += base64EncodeChars.charAt(c3 & 0x3F)
		}
				return string
}


var openwinowPanel;var openwinowPanel3;
function ExtAlert(value)
{
    parent.window.ExtAlert(value);
}

function ExtAlertFn(value,fn)
{
    parent.window.ExtAlert(value,fn);
}

function OpenUrl(IframeUrl,id,text)
{
	CLoseWindowPanel()
    parent.window.OpenUrl(IframeUrl,id,text);
}
function CLoseWindowPanel()
{
	if(openwinowPanel){openwinowPanel.close();}	
	////var win=Ext.getCmp("windowsP4");
	////if(win){win.close();}	
}
function CLoseWindowPanel_Url(_url)
{//"windowsP4_"+WindowStrEnCode(_url)
	//if(openwinowPanel){openwinowPanel.close();}	
	////var win=Ext.getCmp("windowsP4");
	////if(win){win.close();}	
}
function WindowStrEnCode(str)
{
	return base64_encode(str).substr(0, 6);
}

function ExtWindowClose(url)
{
	//if(openwinowPanel){openwinowPanel.close();}	
	var win=Ext.getCmp("windowsP4_"+WindowStrEnCode(url));
	if(win){win.close();}	
}


function OpenExtWindow(_url,_title,_width,_height)
{
	CLoseWindowPanel();
    openwinowPanel=new Ext.Window({title:_title,modal:true,autoLoad:_url,width:_width,height:_height,id:"windowsP4_"+WindowStrEnCode(_url)
    
    }).show();
}

function OpenExtIframWindow(_url,_title,_width,_height)
{
	CLoseWindowPanel();
    openwinowPanel=new Ext.Window({title:_title,modal:true,width:_width,height:_height,x:200,y:30,id:"windowsP4_"+WindowStrEnCode(_url),
                    html:'<iframe src="' + _url + '" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>' 
    
    }).show();
	
}
/**
function OpenExtIframWindow2(_url,_title,_width,_height)
{
	
	CLoseWindowPanel();
    openwinowPanel=new Ext.Window({title:_title,modal:true,width:_width,height:_height,x:20,y:-100,id:"windowsP4",
                    html:'<iframe src="' + _url + '" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>' 
    
    }).show();
}
**/
function OpenExtIframWindow2(_url,_title,_width,_height,_x,_y)
{
	if(_width<=1)
	{
		_width=document.body.clientWidth-60;
		if(_width>1300)
		{
			_width=1300;	
		}
	}
	if(_height<=1)
	{
		_height=document.documentElement.clientHeight*_height-30;
	}
	CLoseWindowPanel();
    openwinowPanel=new Ext.Window({title:_title,resizable:false,modal:true,width:_width,height:_height,x:_x,y:_y,id:"windowsP4_"+WindowStrEnCode(_url),
                    html:'<iframe src="' + _url + '" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>' 
    
    }).show();
}

function OpenExtIframWindow3(_url,_title,_width,_height,_x,_y)
{
	if(_width<1)
	{
		_width=document.body.clientWidth-60;
		if(_width>1100)
		{
			_width=1100;	
		}
	}
	if(_height<1)
	{
		_height=document.documentElement.clientHeight-80;
	}
	//CLoseWindowPanel();
    openwinowPanel3=new Ext.Window({title:_title,modal:true,width:_width,height:_height,x:_x,y:_y,id:"windowsP4_"+WindowStrEnCode(_url),
                    html:'<iframe src="' + _url + '" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>' 
    
    }).show();
}

//上传
function UploadText(_DomId)
{
	//var _ViewStr="<a target='_blank' href=\"javascript:this.href='/'\">预览</a> ";
	return "<a href=\"javascript:OpenExtIframWindow2('/m/upload/up.php?name="+_DomId+"','文件上传',350,200)\">上传文件</a> " + UploadTextYuLan(_DomId);
}

function UploadText2(_DomId,_Para)
{
	//var _ViewStr="<a target='_blank' href=\"javascript:this.href='/'\">预览</a> ";
	return "<a href=\"javascript:OpenExtIframWindow2('/m/upload/up.php?name="+_DomId+'&'+_Para+"','文件上传',350,200)\">上传文件</a> " + UploadTextYuLan(_DomId);
}

function UploadTextYuLan(_id)
{
	
	return " <a href=\"javascript:OpenPic($('#"+_id+"').val())\">预览</a> ";
}


function SetDomValue(_id,_value)
{
	return $('#'+_id).val(_value);
}

function OpenPic(_pic)
{
	if(!_pic || _pic=='')
	{
		alert('请先上传文件');
	}
	else
	{
		OpenExtIframWindow2('/' + _pic,'预览',0.7,0.8);
	}
}

function PicAhref(value, cellmeta, record)
{
	return "<a href='" +UploadDomain() + value + "' target='_blank'>"+value+"</a>";
}

function UploadDomain()
{
	return "/";
}
function upOpenView(SysTextBox)
{
    window.open("/"+SysTextBox.value)
}

function FontRed(Text)
{
    return '<font color="#AE0000">' + Text + '</font>';
}

function FontRed2(Text)
{
    return '<font color="#6C0000">' + Text + '</font>';
}

function FontGreen(Text)
{
    return '<font color="#006600">' + Text + '</font>';
}

function FontYello(Text)
{
    return '<font color="#C17400">' + Text + '</font>';
}





function ExtAjaxDo()
{//url,params
	var _url = arguments[0] ? arguments[0] : '';
    var _params = arguments[1] ? arguments[1] : '';
	
	Ext.Ajax.request({
		params:_params,
		url:_url,
		method:'post',
		success:function(response ,action){
			    ExtAlert(response.responseText);
			   store.reload();
		},
		failure:function(){
		   ExtAlert('操作失败！');
		}
	});
}



jBtnName='tijiao';
function btnState()
{
	
	$("#tijiao").attr("disabled",'disabled');
}
function btnState2()
{
	$("#tijiao").removeAttr('disabled');
	//$("#tijiao").attr("disabled",fasle);
	
}
function BtOnError()
{
	//alert('数据提交错误，请稍后再试');
	$("#tijiao").removeAttr('disabled');
}
function btnStateLogin()
{
	$("#login").attr("disabled",'disabled');
}
function btnState2Login()
{
	$("#login").removeAttr('disabled');
}
function btnStateComm()
{
	$("#"+jBtnName).attr("disabled",'disabled');
}
function btnState2Comm()
{
	$("#"+jBtnName).removeAttr('disabled');
}

function AjaxSubmit00(submitname)
{
//f_check();
$("#"+submitname).attr({"disabled":"disabled"}); 
jQuery.ajax(
{
	'type':'POST',
	//'dataType':'script',
	'url':self.location.toString(),
	'cache':false,
	'data':jQuery("#"+submitname).parents("form").serialize(),
	success: function(msg){
       eval(msg);
       $("#"+submitname).removeAttr('disabled'); 
     }
});
return false;


}

function SetValueByID(_name,_v)
{
	$("#"+_name).val(_v);
}

function CaiWuState(value, cellmeta, record)
{
	var Str="已提交";
	if(value==1)
	{
		Str = FontRed("已审核");
	}
	if(value==2)
	{
		Str = FontRed("已完成");
	}
	if(value==3)
	{
		Str = FontRed("已驳回");
	}
	
	try{return Str;}finally{Str = null;}
}
function FormatMoney(value, cellmeta, record)
{
	var Str=value;
	if(value>0)
	{
		Str = FontRed("+" + Str);
	}
	if(value<0)
	{
		Str = FontGreen(Str);
	}
	if(value==0)
	{
		Str = "-";
	}
	try{return Str;}finally{Str = null;}
}
//检测支付密码是否过于简单
function PayPassCheck(pass)
{
	var Str=false;
	if(pass=='000000')
	{
		Str=true;
	}
	if(pass=='111111')
	{
		Str=true;
	}
	if(pass=='222222')
	{
		Str=true;
	}
	if(pass=='333333')
	{
		Str=true;
	}
	if(pass=='444444')
	{
		Str=true;
	}
	if(pass=='555555')
	{
		Str=true;
	}
	if(pass=='666666')
	{
		Str=true;
	}
	if(pass=='777777')
	{
		Str=true;
	}
	if(pass=='888888')
	{
		Str=true;
	}
	if(pass=='999999')
	{
		Str=true;
	}
	if(pass=='123456')
	{
		Str=true;
	}
	if(pass=='654321')
	{
		Str=true;
	}
	
	
	
	
	return Str;
}

function OpenLayer(name,url,width,height)
{
	var width_n = arguments[2]?arguments[2]:750;
	var height_n = arguments[3]?arguments[3]:600;
	parent.parent.layer.ready(function(){ 
		parent.parent.layer.open({
			type: 2,
			//skin: 'layui-layer-lan',
			title: name,
			fix: false,
			shadeClose: true,
			maxmin: false,
			area: [width_n+'px', height_n+'px'],
			content: url
		});
	});
}
function OpenLayer2(name,url,width,height)
{
	layer.ready(function(){ 
		layer.open({
			type: 2,
			//skin: 'layui-layer-lan',
			title: name,
			fix: false,
			shadeClose: true,
			maxmin: true,
			area: [width+'px', height+'px'],
			content: url
		});
	});
}