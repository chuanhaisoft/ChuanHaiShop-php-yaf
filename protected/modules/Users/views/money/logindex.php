	<script type="text/javascript" src="/js/Ext_Css.js"></script>
    <script type="text/javascript" src="/js/Ext.js"></script>
    <script type="text/javascript" src="/js/Css.js"></script>

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
        items:[
            {
               title: '&nbsp;&nbsp;&nbsp;收支明细&nbsp;&nbsp;&nbsp;',
               html:'<iframe src="/user/money/log.html" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
            ,{
                title: '&nbsp;&nbsp;&nbsp;商城收支明细&nbsp;&nbsp;&nbsp;',
                html: '<iframe src="/user/money/log2.html?type=1" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
			,{
                title: '&nbsp;&nbsp;&nbsp;超市收支明细&nbsp;&nbsp;&nbsp;',
                html:'<iframe src="/user/money/log2.html?type=2" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
		
            ,{
                title: '&nbsp;&nbsp;&nbsp;实体店收支明细&nbsp;&nbsp;&nbsp;',
                html:'<iframe src="/user/money/log2.html?type=3" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
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