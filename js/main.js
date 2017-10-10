window.onerror=function(){return true;} 

    function cirMove() {
        //检测page的值，使当前的page与selected的小圆点一致
        $('.banner-circle li').eq(page - 1).addClass('selected')
            .siblings().removeClass('selected');
    }

   
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

function AddHover(par)
{
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



   