var oComment = null;/*用来存储remove元素对象*/
var num = 0;		/*用来记录星星的角标*/
$(function(){
	
	var flag = false;
	var num = -1;
	var $currentWidth = $("#option").find(".current").outerWidth();
	var $currentLeft = $("#option").find(".current").position().left;
	$(".option_current").css({
		width : $currentWidth,
		left : $currentLeft
	});
	$("#option").find("li").hover(function() {
		var $width = $(this).outerWidth();
		var $left = $(this).position().left;
		$(".option_current").stop().animate({
			left : $left,
			width : $width
		}, 300, 'swing');
		$(this).click(function() {
			flag = true;
			this.index = $(this).index();
			num = $(this).index();
			$(this).siblings("li").find("a").removeClass("active");
			$(this).find("a").addClass("active");
			
			$(this).unbind('click');
		})
	}, function() {
		if (flag) {
			$(".option_current").stop().animate({
				left : $("#option").find("li").eq(num).position().left,
				width : $("#option").find("li").eq(num).outerWidth()
			}, 300, 'swing');
		} else {
			$(".option_current").stop().animate({
				left : $currentLeft,
				width : $currentWidth
			}, 300, 'swing');
		}
	});
	
	$("#text1").focus(function() {
		searchTip.searchTipChange();
	}).blur(function() {
		searchTip.searchTipChange();
	})
})

/*搜索框提示*/
var searchTip = {
	searchTipChange: function() {
		if($("#text1").val() == "3D 手机") {
			$("#text1").val("");
		} else if($.trim($("#text1").val()) == '') {
			$("#text1").val("3D 手机");
		}
	}	
};


function init() {
		if($("#comment")) {
			oComment = $("#comment").remove();
		}
	}
	
//评价
function cz(obj, flag) {
		if(flag == "comment") {
			$(oComment).css("opacity", "1");
			$(oComment).insertAfter($(obj).parent().parent());
			var aImg = $("#star").get(0).getElementsByTagName("img");
			for(var i=0; i<aImg.length; i++) {
				aImg[i].src = "../../images/star1.png";
			}
			aImg[0].src = "../../images/star2.png";
			num = 0;
		}	
}

//分页
function page(json) {
	if(!json.obj) {return false;}
	var oPage = document.getElementById(json.obj);
	var nowPage = json.nowPage || 1;
	var allPage = json.allPage || 5;
	var callback = json.callback || function() {};
	if(nowPage >= 4 && allPage>=6) {//nowPage>=2 
		var oA = document.createElement("a");
		oA.href = "#1";
		oA.innerHTML = "首页";
		oPage.appendChild(oA);
	}
	if(nowPage - 1 > 0) {//用于判断存不存在上一页
		var oA = document.createElement("a");
		oA.href = "#"+parseInt(nowPage-1);
		oA.innerHTML = "上一页";
		oPage.appendChild(oA);
	}
	if(allPage <= 5) {
		for(var i=1; i<= 5; i++) {
			var oA = document.createElement("a");
			oA.href = "#"+i;
			oA.innerHTML = i;
			if(i == nowPage) {
				oA.className = "active";
			}
			oPage.appendChild(oA);
		}
	} else {
		for(var i=1; i<= 5; i++) {
			var oA = document.createElement("a");
			if(nowPage == 1 || nowPage == 2) {
				oA.href = "#"+i;
				oA.innerHTML = i;
				if(i == nowPage) {
					oA.className = "active";
				}
			} else if(allPage-nowPage == 1 || allPage-nowPage == 0) {
				oA.href = "#"+parseInt((allPage-5)+i);
				oA.innerHTML = (allPage-5)+i;
				if(allPage-nowPage == 1 && i==4) {
					oA.className = "active";
				} else if(allPage-nowPage == 0 && i==5) {
					oA.className = "active";
				}
			} else {
				oA.href = "#"+parseInt((nowPage - 3)+i);
				oA.innerHTML = (nowPage - 3)+i;
				if(i == 3) {
					oA.className = "active";
				}
			}
			oPage.appendChild(oA);
		}
	}
	if(allPage - nowPage > 0) {
		var oA = document.createElement("a");
		oA.href = "#"+parseInt(nowPage+1);
		oA.innerHTML = "下一页";
		oPage.appendChild(oA);
	}
	if(allPage - nowPage >= 3 && allPage >= 6) {//不考虑当前页超过总页数
		//console.log("尾页");
		var oA = document.createElement("a");
		oA.href = "#"+allPage;
		oA.innerHTML = "尾页";
		oPage.appendChild(oA);
	}
	callback(nowPage, allPage);
	
	var aA = oPage.getElementsByTagName("a");
	for(var i=0; i<aA.length; i++) {
		aA[i].onclick = function() {
			oPage.innerHTML = "";
			var nowPage = parseInt(this.getAttribute("href").substring(1));
			page({
				obj: oPage.id,
				nowPage: nowPage,
				allPage: allPage
			});
		}
	}
}


/*改变星星状态*/
function changeStar() {
	var aImg = $("#star").get(0).getElementsByTagName("img");
	var that = null;
	init();
	function init() {
		for(var i=0; i<aImg.length; i++) {
			aImg[i].src = "../../images/star1.png";
		}
		aImg[0].src = "../../images/star2.png";
	}
	for(var i=0; i<aImg.length; i++) {
		aImg[i].index = i;
		
		aImg[i].onmouseover = function() {
			that = this;
			init();
			for(var i=0; i<=this.index; i++) {
				aImg[i].src = "../../images/star2.png";
			}
			this.onclick = function() {
				num = that.index;
				for(var i=0; i<=that.index; i++) {
					aImg[i].src = "../../images/star2.png";
				}
			}
		}
		aImg[i].onmouseout = function() {
			init();
			for(var i=0; i<=num; i++) {
				aImg[i].src = "../../images/star2.png";
			}
		}
	}
}

var orderstat  = {
		getorderstat:function(index,pagenum,state){
			$.post('/order/orderstat',{'pagenum':'pagenum','state':'state'},function(data){
				
			}
			,'json');
		}
}