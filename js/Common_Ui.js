
function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return '';
}

function GetAjax(_Url,_Para)
{
	_CallBack = arguments[2] ? arguments[2] : -1;
	if(_Para=='')
	{
		_Para='sys_act=callback';
	}
	var aj = $.ajax( 
	{  
		url:_Url,
		data:_Para,  
		type:'post',  
		cache:false,  
		dataType:'script',  
		success:function(data) {
			if(_CallBack!=-1)
			{
				_CallBack(data);
			}
		 },  
		 error : function() {  
			  // view("异常！");  
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



function SetDomValue(_id,_value)
{
	$('#'+_id).val(_value);
}


function PicAhref(value, cellmeta, record)
{
	return "<a href='" +UploadDomain() + value + "' target='_blank'>"+value+"</a>";
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
			maxmin: true,
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