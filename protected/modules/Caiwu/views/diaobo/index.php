	<script type="text/javascript" src="/js/Ext_Css.js"></script>
    <script type="text/javascript" src="/js/Ext.js"></script>
    <script type="text/javascript" src="/js/Css.js"></script>
	<link rel="stylesheet" href="/js/layui/css/layui.css"  media="all">
  <style type="text/css">
  .layui-body{bottom:0px !important;}
  .layui-tab {margin:0 1px;overflow:hidden;}

  .layui-tab-item { height:inherit;}
  
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>





<div class="layui-tab" style="height:100%; overflow:hidden">
  <ul class="layui-tab-title" style="height:40px; overflow:hidden">
    <li class="layui-this">金额调拨</li>
    <li>积分调拨</li>

  </ul>
  <div class="layui-tab-content" style="padding: 0px 0px;height:100%">
    <div class="layui-tab-item layui-show">
      <iframe src="money.html" width="100%" height="94%" allowTransparency="true" frameborder="0" scrolling="auto">
	  </iframe>
    </div>
    <div class="layui-tab-item">
		<iframe src="point.html" width="100%" height="94%" allowTransparency="true" frameborder="0" scrolling="auto">
		</iframe>
	</div>

  </div>
</div>


<script>

layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  //触发事件
  var active = {
    tabAdd: function(){
      //新增一个Tab项
      element.tabAdd('demo', {
        title: '新选项'+ (Math.random()*1000|0) //用于演示
        ,content: '内容'+ (Math.random()*1000|0)
        ,id: new Date().getTime() //实际使用一般是规定好的id，这里以时间戳模拟下
      })
    }
    ,tabDelete: function(othis){
      //删除指定Tab项
      element.tabDelete('demo', '44'); //删除：“商品管理”
      
      
      othis.addClass('layui-btn-disabled');
    }
    ,tabChange: function(){
      //切换到指定Tab项
      element.tabChange('demo', '22'); //切换到：用户管理
    }
  };
  
  $('.site-demo-active').on('click', function(){
    var othis = $(this), type = othis.data('type');
    active[type] ? active[type].call(this, othis) : '';
  });
  
  //Hash地址的定位
  var layid = location.hash.replace(/^#test=/, '');
  element.tabChange('test', layid);
  
  element.on('tab(test)', function(elem){
    location.hash = 'test='+ $(this).attr('lay-id');
  });
  
  
  
  
          $(window).resize(function() {
            //设置顶部切换卡容器度
            $(".layui-tab-content").height($(window).height() - height);
            //设置顶部切换卡容器内每个iframe高度
            $(".layui-tab-content").find('iframe').each(function () {
                //$(this).height(tabcontent.height());
            });
        }).resize();
  
});
</script>

<script type="text/javascript">
/**
Ext.onReady(function()
{
    var tabs2 = new Ext.TabPanel({
        renderTo: document.body,
        activeTab: <?php echo isset($_GET['id'])?$_GET['id']:0;?>,
        width:600,
        border:false,hideBorders :true, 
        height:document.documentElement.clientHeight-36,
		autoWidth:true,
        plain:true,
		tabPosition:'top',
		
        defaults:{autoScroll: true},
        items:[{
                title: '&nbsp;&nbsp;&nbsp;金额调拨&nbsp;&nbsp;&nbsp;',
                html: '<iframe src="money.html" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
			,{
                title: '&nbsp;&nbsp;&nbsp;积分调拨&nbsp;&nbsp;&nbsp;',
                html:'<iframe src="point.html" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
			
			
        ]
    });
	//contentPanel.setActiveTab(n); //激活Tab 页 
	function ReLoad(tab)
	{//alert(tab.title);
	//tab.getUpdater().refresh();
	//tab.doLayout();
		//IframeUrl="/page/grid/?pageid=1";
        //tab.html='<iframe  src="'+IframeUrl+'" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>';
    }

    function handleActivate(tab)
	{
		//IframeUrl="/page/grid/?pageid=1";
        //tab.html='<iframe  src="'+IframeUrl+'" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>';
    }
});
**/
</script>