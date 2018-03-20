
    <script type="text/javascript" src="/js/jQuery.js"></script>
    
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
    <li class="layui-this">常规参数</li>
    <li>支付参数</li>
	<li>云话通设置</li>
	<li>邮件服务器</li>

  </ul>
  <div class="layui-tab-content" style="padding: 0px 0px;">
    <div class="layui-tab-item layui-show">
      <iframe src="/system/set/para.html" width="100%" height="94%" allowTransparency="true" frameborder="0" scrolling="auto">
	  </iframe>
    </div>
    <div class="layui-tab-item">
		<iframe src="/system/set/para.html?group=8" width="100%" height="94%" allowTransparency="true" frameborder="0" scrolling="auto">
		</iframe>
	</div>
    <div class="layui-tab-item">
		<iframe src="/system/set/para.html?group=100" width="100%" height="94%" allowTransparency="true" frameborder="0" scrolling="auto">
		</iframe>
	</div>
    <div class="layui-tab-item">
		<iframe src="/system/set/para.html?group=50" width="100%" height="94%" allowTransparency="true" frameborder="0" scrolling="auto">
		</iframe>
	</div>

  </div>
</div>
<script type="text/javascript">

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
        	  $(".layui-tab-content").height($(window).height() - 45);
            //设置顶部切换卡容器内每个iframe高度
        	  $(".layui-tab-content").find('iframe').each(function () {
                //$(this).height(tabcontent.height());
            });
        }).resize();
          $('.layui-tab').height($(window).height() - 45);
          //$("iframe").height($(window).height() - 40);
          $(".layui-tab-content").height($(window).height() - 45);
});


</script>