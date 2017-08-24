function close_tips(obj, id) {
    $(obj).parent().remove();
    var tips = getCookie("tips");
    tips = tips + id;
    setCookie("tips", tips, null, null, null);
}
var df = [];
$(document).ready(function() {
    if ($("#detail-nav") && $("#detail-nav").length > 0) {
        $("#detail-nav").append($(".deal-info .deal-bw").clone().addClass("detail-navbut").removeClass("deal-bw"));
        $("#detail-nav li:first").addClass("hover");
        detailTitleHeight();
        detailTitle();
        $(window).scroll(function() {
            detailTitleHeight();
            detailTitle();
        });
        $("#detail-nav li").click(function() {
            var aName = $(this).attr("name");
            var idTop = $("#" + aName).offset().top - 50;
            $('html, body').animate({
                scrollTop: idTop
            }, 0);
        });
    }
});

function detailTitleHeight() {
    var objs = $("#detail-nav li");
    df = [];
    for (i = 0; i < objs.length; i++) {
        var divid = $(objs[i]).attr("name");
        if ($("#" + divid) && $("#" + divid).length > 0) {
            var divtop = $("#" + divid).offset().top;
            df.push([divid, divtop]);
        }
    }
}

function detailTitle() {
    var p = $("#detail-nav").offset().top;
    var i = $(window).scrollTop();
    var q = $(window).scrollTop() + 55;
    if ($(window).scrollTop() < (p - 1) || p < $("#detail-navwarp").offset().top) {
        $("#detail-nav").css({
            position: "static",
            top: "0"
        });
    } else {
        if (jQuery.browser.msie && jQuery.browser.version == "6.0") {
            var a = $(window).scrollTop() - $("#detail-navwarp").offset().top;
            $("#detail-nav").css({
                position: "absolute",
                left: "0",
                top: a
            });
        } else {
            $("#detail-nav").css({
                position: "fixed",
                top: "0"
            });
        }
    }
    for (j = 0; j < df.length; j++) {
        if (q <= df[j][1]) {
            if (j == 0) {
                break;
                return;
            } else {
                $("#detail-nav li").removeClass("hover");
                $($("#detail-nav li").eq(j - 1)).addClass("hover");
                break;
            }
        } else {
            if (j == (df.length - 1)) {
                $("#detail-nav li").removeClass("hover");
                $($("#detail-nav li").eq(j)).addClass("hover");
                break;
            }
        }
    }
}
