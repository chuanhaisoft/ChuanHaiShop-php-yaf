
function indexbanner() {

    var $banner = $('.banner');
    var $banner_ul = $('.banner-img');
    var $btn = $('.banner-btn');
    var $btn_a = $btn.find('a')
    var v_width = $banner.width();
    var page = 1;
    var timer = null;
    var btnClass = null;
    var page_count = $banner_ul.find('li').length;//把这个值赋给小圆点的个数
    var banner_cir = "<li class='selected' href='#'><a href='javascript:void(0);'></a></li>";
    for (var i = 1; i < page_count; i++) {
        //动态添加小圆点
        banner_cir += "<li><a href='javascript:void(0);'></a></li>";
    }
    $('.banner-circle').append(banner_cir);
    var cirLeft = $('.banner-circle').width() * (-0.5);
    $('.banner-circle').css({'marginLeft': cirLeft});
    $banner_ul.width(page_count * v_width);
    function move(obj, classname) {
        //手动及自动播放
        if (!$banner_ul.is(':animated')) {
            if (classname == 'prevBtn') {
                if (page == 1) {
                    $banner_ul.animate({left: -v_width * (page_count - 1)});
                    page = page_count;
                    cirMove();
                }
                else {
                    $banner_ul.animate({left: '+=' + v_width}, "slow");
                    page--;
                    cirMove();
                }
            }
            else {
                if (page == page_count) {
                    $banner_ul.animate({left: 0});
                    page = 1;
                    cirMove();
                }
                else {
                    $banner_ul.animate({left: '-=' + v_width}, "slow");
                    page++;
                    cirMove();
                }
            }
        }
    }

    function cirMove() {
        //检测page的值，使当前的page与selected的小圆点一致
        $('.banner-circle li').eq(page - 1).addClass('selected')
            .siblings().removeClass('selected');
    }

    $banner.mouseover(function () {
        $btn.css({'display': 'block'});
        clearInterval(timer);
    }).mouseout(function () {
        $btn.css({'display': 'none'});
        clearInterval(timer);
        timer = setInterval(move, 3000);
    }).trigger("mouseout");//激活自动播放
    $btn_a.mouseover(function () {
        //实现透明渐变，阻止冒泡
        $(this).animate({opacity: 0.6}, 'fast');
        $btn.css({'display': 'block'});
        return false;
    }).mouseleave(function () {
        $(this).animate({opacity: 0.3}, 'fast');
        $btn.css({'display': 'none'});
        return false;
    }).click(function () {
        //手动点击清除计时器
        btnClass = this.className;
        clearInterval(timer);
        timer = setInterval(move, 3000);
        move($(this), this.className);
    });
    $('.banner-circle li').live('click', function () {
        var index = $('.banner-circle li').index(this);
        $banner_ul.animate({left: -v_width * index}, 'slow');
        page = index + 1;
        cirMove();
    });

}



//左侧菜单
//par
//contag
//menu
//menutag
//中间
function middle_door(mpar,mtit,mcont,bq){
    var mtitle=$(mpar+" "+mtit);
    var mbq=$(mpar+" "+bq);
    var menucount=$(mpar+" "+mcont);
    mtitle.each(function(i){
        $(this).css("cursor","pointer");
        $(this).click(function(){
                if($(menucount[i]).css("display")=='block'){
                    $(menucount[i]).css("display","none");
                    $(mbq[i]).attr("class","close");
                }else{
                    $(menucount[i]).css("display","block");
                    $(mbq[i]).attr("class","open");
                }
        });
    });

}



function tab_door(par,cont){

$(par +" "+"li").hover(
  function () {
    $(this).addClass("hover");
  },
  function () {
    $(this).removeClass("hover");
  }
);
}


function AddHover(par){

$(par).hover(
  function () {
    $(this).addClass("hover");
  },
  function () {
    $(this).removeClass("hover");
  }
);
}


/*
   替换select为可编辑样式
*/
   function repselect(className){

        var se=$("."+className);
        var seli=se.find("ul.item_list li");
        se.hover(
            function(){
                $(this).css("z-index","9999");
                $(this).find("span.select_item").addClass("active");
                $(this).find("ul.item_list").css("display","block");
            },
            function(){
                $(this).css("z-index","");
                $(this).find("ul.item_list").css("display","none");
                $(this).find(".select_item").removeClass("active");

            }
        );

        seli.click(function(){
            $(this).parent().parent().find("span.select_item").html($(this).find("a").html());
            $(this).parent().parent().find("input").val($(this).find("a").attr("dc"));
            $(this).parent().css("display","none");
        });
   }

/*
   替换select为可编辑样式
   */
   function navitm_input_select_menu(className){

        var se=$("."+className);
        var seli=se.find("ul.item_list li");
        se.hover(
            function(){
                $(this).css("z-index","9999");
                $(this).find("span.select_item").addClass("active");
                $(this).find(".navitm-cats").css("display","block");
            },
            function(){
                $(this).css("z-index","");
                $(this).find(".navitm-cats").css("display","none");
                $(this).find(".select_item").removeClass("active");

            }
        );

        seli.click(function(){
            $(this).parent().parent().find("span.select_item").html($(this).find("a").html());
            $(this).parent().parent().find("input").val($(this).find("a").attr("dc"));
            $(this).parent().css("display","none");
        });
   }



//帮助中心
//par
//contag
//menu
//menutag
//中间
function LeftMenu(mpar,mtit,mcont,bq){
    var mtitle=$(mpar+" "+mtit);
    var mbq=$(mpar+" "+bq);
    var menucount=$(mpar+" "+mcont);
    mtitle.each(function(i){
        $(this).css("cursor","pointer");
        $(this).click(function(){
                if($(menucount[i]).css("display")=='block'){
                    $(menucount[i]).css("display","none");
                    $(mbq[i]).attr("class","close");
                }else{
                    $(menucount[i]).css("display","block");
                    $(mbq[i]).attr("class","open");
                }
        });
    });

}


/*地图导航初始化*/
function resize() {
    $().ready(function () {
        var lcq_width = $(window).width();
        var lcq_height = $(window).height();
        var cont_height = lcq_height - $('#map-header').outerHeight() - $('.search-top').outerHeight();
        //alert(cont_height);
        //      if(lcq_width < 1180){
        //              $("body").eq(0).addClass("w1180");
        //          }else{
        //              $("body").eq(0).removeClass("w1180");
        //      }
        $('.map-l').css({
            height: cont_height + 'px',
            left: 0
        });

        $('#map-content').css({
            height: cont_height + 'px'
        });


        $('.map-list').css({
            height: cont_height - 180 + 'px'
        });


        $('html').css({
            overflow: 'hidden'
        });
    });
}
// 小数加减法
function accAdd(arg1, arg2) {
    var r1, r2, m;
    try {
        r1 = arg1.toString().split(".")[1].length
    } catch (e) {
        r1 = 0
    }
    try {
        r2 = arg2.toString().split(".")[1].length
    } catch (e) {
        r2 = 0
    }
    m = Math.pow(10, Math.max(r1, r2))
    return (arg1 * m + arg2 * m) / m
}

function accSub(arg1, arg2) {
    var r1, r2, m, n;
    try {
        r1 = arg1.toString().split(".")[1].length
    } catch (e) {
        r1 = 0
    }
    try {
        r2 = arg2.toString().split(".")[1].length
    } catch (e) {
        r2 = 0
    }
    m = Math.pow(10, Math.max(r1, r2));
    //last modify by deeka
    //动态控制精度长度
    n = (r1 >= r2) ? r1 : r2;
    return ((arg1 * m - arg2 * m) / m).toFixed(n);
}

function setCookie(name, value) {
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) {
        return unescape(arr[2]);
    } else {
        return null;
    }
}



    $(document).ready(function() {

    	$("#ng-all-hook").mouseover(function(){
  		  $("#navitm-cats").show();
  		});
    	$("body").mouseout(function(){
    		el = event.target;
    		c=$(el).parents('#classification');
    		//console.log('当前鼠标在', c.length, '元素上');
    		if(c.length==0)
    		{
    			$("#navitm-cats").hide();
    		}
  		  
  		});
        
    });
