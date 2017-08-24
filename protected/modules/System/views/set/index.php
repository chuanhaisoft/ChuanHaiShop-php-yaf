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
        items:[{
                title: '&nbsp;&nbsp;&nbsp;常规参数&nbsp;&nbsp;&nbsp;',
                html: '<iframe src="/system/set/para.html" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
        ,{
            title: '&nbsp;&nbsp;&nbsp;支付参数&nbsp;&nbsp;&nbsp;',
            html:'<iframe src="/system/set/para.html?group=8" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
        }
            ,{
                title: '&nbsp;&nbsp;&nbsp;云话通设置&nbsp;&nbsp;&nbsp;',
                html:'<iframe src="/system/set/para.html?group=100" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
            }
            ,{
                title: '&nbsp;&nbsp;&nbsp;邮件服务器&nbsp;&nbsp;&nbsp;',
                html:'<iframe src="/system/set/para.html?group=50" width="100%" height="100%" allowTransparency="true" frameborder="0" scrolling="auto"></iframe>'
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