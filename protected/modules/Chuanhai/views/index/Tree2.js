setTimeout(function() {
				Ext.get('loading').remove();
				Ext.get('loading-mask').fadeOut( {
					remove : true
				});
			}, 30000);
        Tree1.on("click",TreeLink); 
        //Tree1.el.setOpacity(.5);
        
		function TreeLink(node,event)
		{
			if(!node.leaf)
			{
				if(node.isExpanded()){
					node.collapse(false);}else{
					node.expand(false);}
			}
			else
			{
				//alert(node.attributes.infram);
				if(node.attributes.infram == 1)
				{
					OpenUrl(node.attributes.url,node.attributes.tid,node.text );
				}
				else
				{
					
					OpenUrl2(node.attributes.url,node.attributes.tid,node.text );
				}
			}
		}
		//Child4.text="ddddd";
		var contextPanel = 
			new Ext.Panel({
			title:'系统桌面',
			id:"tab_000",
			region:'center',
			autoScroll: true,
			frame:true,      
			border:false,
			bodyBorder:false,
			html:'<iframe id="ifr000" src="/chuanhai/index/desktop/" width="100%" allowTransparency="true" height="100%" frameborder="0" scrolling="auto"></iframe>'
			//autoLoad: {scripts: true, scope: this,nocache: true}//
		});
		var contextPanel2 = new Ext.Panel({
			title:'一周报表',
			region:'center',
			autoScroll: true,
			frame:true,      
			border:false,
			text:"加载中.....",
			html:'<iframe id="test" src="'+UrlText+'" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>' 

			//autoLoad: {url: 'aa.asp',scripts: true, scope: this}//
		});
	   if(DefaultPageUrl)
	   {
		   contextPanel=new Ext.Panel({   
		  title:DefaultPageUrl_name,   
		  id:'tab_'+DefaultPageUrl_id,   
		  iconCls: 'icon-cmp',                     
		  margins:'0 0 0 0',   
		  //autoHeight:true,  cmp.gif 
		  icon:"/js/ext/images/cmp.gif",
		  border:false,
		  ////header:false,
		  //bodyStyle:"height:0px",
		  bodyBorder:false,
		  autoScroll:true,   
		  autoWidth:true,   
		  closable:false,
		  frame:true,
		  text:"加载中.....",  
		  html:'<iframe id="ifr' + DefaultPageUrl_id + '" src="'+DefaultPageUrl+'" width="100%" height="100%" allowTransparency="true" frameborder="0" style="overflow-x:hidden;overflow-y:auto"></iframe>'  
				});
	   }
		
        //Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
       var viewport = new Ext.Viewport({
            layout:'border',
            items:[
                new Ext.BoxComponent({ // raw
                    region:'north',
                    el: 'north',
					margins:'0 1 0 2',
                    height:65
                }),
				{
                    region:'west',
                    id:'west-panel',
                    title:ChangeMenu,
                    //margins:'0 200 0 0',
                    split:true,
                    width: 153,
                    //autoHeight : true,
                    collapsible: true,
                    autoScroll:true,
                    frame:true,
                    margins:'0 0 0 1',
                    layoutConfig:{
                        animate:false
                    },
					items:[Tree1]
                },
                new Ext.TabPanel({
                    region:'center',
					id:"TabPanel1",
					margins:'0 0 0 -2',
                    deferredRender:false,
                    activeTab:0,
                    border:false,
			        bodyBorder:false,
                    items:[contextPanel],
                    enableTabScroll: true
                    
                   
                //
                })
             ]
        });
		//iframe


		//Tree1.expandAll();
		//skins.style.display="inline";
		//ExtSkin = new Ext.form.ComboBox();
		//ExtSkin.applyToMarkup("skins")
//		var combo = new Ext.form.ComboBox({
//	        //emptyText: '请选择',
//			//以下2个是必备的	        
//	        mode: 'local',
//	        triggerAction: 'all',
//	        transform: 'skins',
//			listeners:{"select":function(c){changeSkin(c.getValue());}}
//	    });
		//userloginmess='用户:admin [系统管理员]'; 
        
		document.getElementById("UserLoginMess").innerHTML="<span style='font-size:12'>"+userloginmess+"</span>";
		Barner = new Ext.Toolbar(['', {xtype:"tbfill"},{text:"刷新页面",cls:"x-btn-text-icon",icon:"/css/js/ext/images/girdrefresh.gif",handler:refreshPage},"-",{text:"修改个人信息",cls:"x-btn-text-icon",icon:"/css/js/ext/images/key.gif",handler:function(){ OpenExtIframWindow2("/users/user/edit.html" ,"信息修改",680,500)} },"",{text:"退出登陆",cls:"x-btn-text-icon",icon:"/css/js/ext/images/user.gif",handler:function(){ if(confirm("确定退出么?")){parent.window.location.href="/chuanhai/index/loginout/";}} },"-" ,{text:"关闭所有标签",cls:"x-btn-text-icon",icon:"/css/js/ext/images/delete.gif",handler:CloseTabs},"-" ]);
        Barner.render("TopBar");
    });
function OpenUrl(IframeUrl,id,text)
{
    if (!Ext.get('tab_'+id)) {
		Ext.getCmp("TabPanel1").add(new Ext.Panel({   
				  title:text ,   
				  id:'tab_'+id,   
				  iconCls: 'icon-cmp',                     
				  margins:'0 0 0 0',   
				  //autoHeight:true,  cmp.gif 
				  icon:"/js/ext/images/cmp.gif",
				  border:false,
				  ////header:false,
				  //bodyStyle:"height:0px",
				  bodyBorder:false,
				  autoScroll:true,   
				  autoWidth:true,   
				  closable:true,
				  frame:true,
				  text:"加载中.....",  
				  html:'<iframe id="ifr' + id + '" src="'+IframeUrl+'" width="100%" height="100%" allowTransparency="true" frameborder="0" style="overflow-x:hidden;overflow-y:auto"></iframe>'  
			})).show();}
    else{Ext.getCmp("TabPanel1").activate('tab_'+id);}
}

function ToChangeRole()
{
	window.location.href='/shopm/changerole.html';
}
 
function OpenUrl2(IframeUrl,id,text)
{
    if (!Ext.get('tab_'+id)) {
		Ext.getCmp("TabPanel1").add({   
				  title:text ,   
				  id:'tab_'+id,   
				  iconCls: 'icon-cmp',                     
				  margins:'0 0 0 0',   
				  //autoHeight:true,  
				  //icon:"/js/ext/images/cmp.gif", 
				  autoScroll:true,   
				  autoWidth:true,   
				  closable:true,
				  border:false,
				  bodyBorder:false,
				  frame:true,   
				  text:"加载中.....",
				  autoLoad: {url: IframeUrl,scripts: true, scope: this,nocache: true}
			}).show();}else{
		Ext.getCmp("TabPanel1").activate('tab_'+id);}
}

function CloseTabs(){
    Ext.getCmp("TabPanel1").items.each(function(item){
        if(item.closable){
            Ext.getCmp("TabPanel1").remove(item);
        }
    });
}


function changeSkin(value) 
{
	Ext.util.CSS.swapStyleSheet('window', '/js/ext/resources/css/' + value + '.css');
}

function ExtAlert(value)
{
    Ext.Msg.show({title:"系统提示：",msg:value,minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL}).getDialog().setPagePosition(400,220);
}

function ExtAlertFn(value,fn)
{
    Ext.Msg.show({title:"系统提示：",msg:value,minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:fn}).getDialog().setPagePosition(300,150);
}

function refreshPage()
{
    var ExtIframeID = Ext.getCmp("TabPanel1").getActiveTab().id;
    var iframeID="ifr" + ExtIframeID.replace("tab_","");
    if(window.frames[iframeID])
    {
        document.getElementById(iframeID).contentWindow.location.reload();
    }
    else
    {
        Ext.getCmp("TabPanel1").getActiveTab().getUpdater().refresh();
    }
    //ExtIframeID = null;iframeID = null;CollectGarbage();
}

function refreshPageGrid()
{
    var ExtIframeID = Ext.getCmp("TabPanel1").getActiveTab().id;
    var iframeID="ifr" + ExtIframeID.replace("tab_","");
    if(window.frames[iframeID])
    {
        document.getElementById(iframeID).contentWindow.store.reload();
    }
    
}

function IfrToCurrIfr(Value,ElementID)
{
    var ExtIframeID = Ext.getCmp("TabPanel1").getActiveTab().id;
    var iframeID="ifr" + ExtIframeID.replace("tab_","");
    if(window.frames[iframeID])
    {
    	window.frames[iframeID].document.getElementById(ElementID).value=Value;
    }
    
}