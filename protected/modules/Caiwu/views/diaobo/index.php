	<script type="text/javascript" src="/js/Ext_Css.js"></script>
    <script type="text/javascript" src="/js/Ext.js"></script>
    <script type="text/javascript" src="/js/Css.js"></script>

<div style="height:30px; font-size:18px; letter-spacing:2px">
资产调拨，请谨慎操作。
</div>
<script type="text/javascript">

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
</script>