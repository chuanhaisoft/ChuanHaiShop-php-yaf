layui.define(['layer','element', 'fortree'], function(exports) {
    var layer      = layui.layer;
    var element    = layui.element;
    var fortree    = layui.fortree;
    var $          = layui.jquery;

    var nav        = null;
    var tab        = null;
    var tabcontent = null;
    var tabtitle   = null;
    var navfilter  = null;
    var tabfilter  = null;

    /**
     * 添加导航
     */
    function addNav(data, topid, idname, pidname, nodename, urlname) {
        topid    = topid    || 0;
        idname   = idname   || 'id';
        pidname  = pidname  || 'pid';
        nodename = nodename || 'node';
        urlname  = urlname  || 'url';

        var mytree = new fortree(data, idname, pidname, topid);
        var html = '';var TmpHtml='';

        mytree.forBefore = function (v, k, hasChildren) {
			if(v[pidname]=="0")
			{html += '<li class="layui-nav-item layui-nav-itemed" style="background:#2F4056;">';TmpHtml='';}
			else
			{html += '<li class="layui-nav-item" style="background:#393D49">';TmpHtml=' +';}
            
        };

        mytree.forcurr = function(v, k, hasChildren) {
            html += '<a '+(v[urlname] ? ' data-url="'+v[urlname]+'" data-id="'+v[idname]
				 +'" style="cursor: pointer; ' : (v[pidname]=="0"?'style="cursor: pointer;color:#FFB800 !important;':''))+'">'
			     +TmpHtml;
            html += v[nodename];
            html += '</a>';
        };

        mytree.callBefore = function (v, k) {
            html += '<ul class="layui-nav-child">';
        };

        mytree.callAfter = function (v, k) {
            html += '</ul>';
        };

        mytree.forAfter = function (v, k, hasChildren) {
            html += '</li>';
        };

        mytree.each();

        nav.append(html);

        element.init('nav('+navfilter+')');
    }

    /**
     * 将侧边栏与顶部切换卡进行绑定
     */
    function bind(height) {
        var height = height || 60 + 41 + 44; //头部高度 顶部切换卡标题高度 底部高度
        /**
         * iframe自适应
         */
        $(window).resize(function() {
            //设置顶部切换卡容器度
            tabcontent.height($(this).height() - height);
            //设置顶部切换卡容器内每个iframe高度
            tabcontent.find('iframe').each(function () {
                //$(this).height(tabcontent.height());
            });
        }).resize();

        /**
         * 监听侧边栏导航点击事件
         */
        element.on('nav('+navfilter+')', function(elem) {
            var a        = elem.children('a');
            var title    = a.text();
            var src      = elem.children('a').attr('data-url');
            var id       = elem.children('a').attr('data-id');
            var iframe   = tabcontent.find('iframe[data-id='+id+']').eq(0);
            var tabindex = (new Date()).getTime();

            if(src != undefined && src != null && id != undefined && id != null) {
                if(iframe.length) { //存在 iframe
                    //获取iframe身上的tab index
                    tabindex = iframe.attr('data-tabindex');
                }else{ //不存在 iframe
                    //显示加载层
                    var tmpIndex = layer.load();
                    //设置1秒后再次关闭loading
                    setTimeout(function() {
                        layer.close(tmpIndex);
                    }, 1000);
                    //拼接iframe
                    var iframe = '<iframe onload="layui.layer.close('+tmpIndex+')"';
					iframe += ' id="ifr'+tabindex+'"';
                    iframe += ' src="'+src+'" data-id="'+id+'" data-tabindex="'+tabindex+'"';
					//allowTransparency="true" frameborder="0" style="overflow-x:hidden;overflow-y:auto"
                    iframe += ' style="width: 100%; height: 100%; border: 0px;"';
                    iframe += ' allowTransparency="true" ></iframe>';
                    //顶部切换卡新增一个卡片
                    element.tabAdd(tabfilter, {title: title.replace("+",""), content: iframe, id: 'index-'+tabindex});
                }

                //切换到指定索引的卡片
                element.tabChange(tabfilter, 'index-'+tabindex);

                //隐藏第一个切换卡的删除按钮
                tabtitle.find('li').eq(0).find('i').hide();
            }
        });
    }

    /**
     * 根据索引点击导航栏的某个li
     */
    function clickLI(index) {
        nav.find('li').eq(index || 0).click();
    }

    /**
     * 导出接口
     */
    exports('desktop', function(navLayFilter, tabLayFilter) {
        navfilter  = navLayFilter;
        tabfilter  = tabLayFilter;

        nav        = $('.layui-nav[lay-filter='+navfilter+']').eq(0);
        tab        = $('.layui-tab[lay-filter='+tabfilter+']').eq(0);
        tabcontent = tab.children('.layui-tab-content').eq(0);
        tabtitle   = tab.children('.layui-tab-title').eq(0);

        var error = '';
        if(nav.length == 0) {
            error += '无导航栏<br>';
        }

        if(tab.length == 0) {
            error += '无切换卡<br>';
        }

        if(error) {
            layer.msg('模块初始化失败！<br>' + error);
            return false;
        }

        return {addNav: addNav, bind: bind, clickLI: clickLI};
    });
	
});



function ExtAlert(value)
{
	var IsTime = arguments[1] ? parseInt(arguments[1])*1000 : 10*1000;
	window.layer.msg(value, {
        time: IsTime,
		isOutAnim: false,
        btn: ['确 定', '取 消']
      });
}

function ExtAlertFn(value,fn)
{
	window.layer.msg(value, {
        time: 0,
		isOutAnim: false,
        btn: ['确 定', '取 消']
		,yes: function(index, layero){
			fn('ok','ok?');
			layer.close(index);
  		}
      });
}

function refreshPageGrid()
{
	var CurrentPanel=$("#desktop_tab_ul>li").filter(".layui-this");
	if(CurrentPanel && CurrentPanel.attr("lay-id"))
	{
		var iframeID="ifr" +CurrentPanel.attr("lay-id").replace("index-","");
		if(window.frames[iframeID])
		{
			document.getElementById(iframeID).contentWindow.store.reload();
		}
	}

}

function refreshPage()
{
	var CurrentPanel=$("#desktop_tab_ul>li").filter(".layui-this");
	if(CurrentPanel && CurrentPanel.attr("lay-id"))
	{
		var iframeID="ifr" +CurrentPanel.attr("lay-id").replace("index-","");
		if(window.frames[iframeID])
		{
			document.getElementById(iframeID).contentWindow.location.reload();
		}
		else
		{
				
		}
	}

}

function DoLoginOut()
{
	parent.window.location.href="/chuanhai/index/loginout/";
}


function IfrToCurrIfr(Value,ElementID)
{
    alert('IfrToCurrIfr????????????????????????');
    
}

