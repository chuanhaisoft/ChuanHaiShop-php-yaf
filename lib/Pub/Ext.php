<?php
namespace Pub;
class Ext
{

	public static function GetJsonStr($rs,$total)
	{	
	    $sb = "";
	    if(!$rs || !is_array($rs))
	        $rs=array();
		$RowCount = count($rs);
		$CellCount =0;
		if(isset($rs[0]))
		      $CellCount = count($rs[0]);//列数
		$j = 1; //dr循环控制
		$k = 1;//列循环控制
		$sb.="{\"RowCount\":\"".$RowCount."\",\"TotalCount\":\"".$total."\",\"Result\":";

		$sb.=str_replace(PHP_EOL, '', json_encode($rs));
	        $sb.="}";
			
            $scriptTag = false;
            $cb = Fram::GetValue("callback");

            if ($cb != null)
            {
                $scriptTag = true;
                header("Content-type: text/javascript");
            }
            else
            {
				header("Content-type: application/x-json");
            }
            if ($scriptTag)
            {
                //sb = cb + "(" + rt + ")";
				$sb=$cb."(".$sb;
				$sb.=");";
            }

		return $sb;
	}
	
	public static function ToJsStr($Str)
	{
		$Str = str_replace("\\","\\\\'",$Str);
		$Str = str_replace('"','\"',$Str);
		$Str = str_replace("'","\'",$Str);
		
		return $Str;
	}
	
	public static function GetLeftMenu($_dt)
	{//iconCls:'test'
		//print_r($_dt);
		$sc='';
		$sc_c='';
		$sb='';
		$RootNodeName = "";//根节点名称root
		$TreeNodeName = "";//节点名称，比如Child1
		$NodeID = "-1";//tree的id号
		$IsLeaf = 1;//0是叶子
		$i = 1;
		$FolderNum=0;  //当前第几个文件夹
		foreach($_dt as $row) 
		{
		    
			$NodeID=$row["TREE_ID"];
			if ($i == 1)
			{
				$RootNodeName = "Child" . $NodeID;
			}
			$TreeNodeName = "Child" . $NodeID;
			$IsLeaf = $row["NODE_TYPE"];
			//生成节点
			if ($IsLeaf == 0)
			{
				$sb = $sb."var ".$TreeNodeName."=new Ext.tree.TreeNode({id : '".$TreeNodeName."',text : '".$row["TREE_NAME"]."',url : '".$row["TREE_URL"]."',"."infram:".$row["IN_IFRAME"].","."tid:".$NodeID.",leaf : true".self::TreeIcon($row['TREE_PIC1'])."});";
			}
			else
			{
				if ($i == 1)
				{
					$sb = $sb."var ".$TreeNodeName."=new Ext.tree.TreeNode({id : 'root',text : '".$row["TREE_NAME"]."',expanded : true".self::TreeIcon($row['TREE_PIC1'])." });";
				}
				else
				{
				    $FolderNum++;
				    
					$sb = $sb."var ".$TreeNodeName."=new Ext.tree.TreeNode({id : '".$TreeNodeName."',text : '".$row["TREE_NAME"]."',expanded : ".($FolderNum<=6?'true':'false').self::TreeIcon($row['TREE_PIC1'])."});";
				}
			}
			//附件节点
			if ($row["PARENT_NUM"] != "-1")
			{
				$sc_c =  "if(typeof(Child" . $row["PARENT_NUM"] . ")!='undefined'){Child" . $row["PARENT_NUM"] . ".appendChild(" . $TreeNodeName . ");}";
				$sc=$sc.$sc_c;
			}
			++$i;
		}
		$sc .= "var Tree1=new Ext.tree.TreePanel({root:{$RootNodeName},autoWidth:true,autoHeight:true,bodyBorder:false,border:false,autoScroll:false,rootVisible:false});";
		return $sb.$sc;
		
	}
	
	public static function TreeIcon($IconField)
	{
	    return isset($IconField) && $IconField!=null && strlen($IconField)>3?",icon:'{$IconField}'":'';
	}

	public static function GridStr($PageID,$PageAddress,$EditAddress,$AddAddress,$PrimaryKeyName,$ChineseMark,$Fields,$GridFields,$ToolFields=NULL,$ToolBar=NULL,$GridHeight=490,$HeightCha=0,$ViewMode=1,$PageSize=-1,$Excel=false)
	{
	    
	    $IsPersentHeight=$GridHeight>0?0:1;
	    
	    //$PageID=Fram::GetNumValue('pageid',0);
	    $Fields="'".str_replace(",", "','", $Fields)."'";
	    $GridFieldsArr=explode(";",$GridFields);
	    $GridFields = '';
	    for($i=0;$i<count($GridFieldsArr);$i++)
	    {
	        $Arr=explode(",,",$GridFieldsArr[$i]);
	        if(is_array($Arr) && count($Arr)>=2)
	        {
	            $GridFields .= "{";
	            $GridFields .= "header: '{$Arr[0]}',menuDisabled:true";
	            $GridFields .= ",dataIndex: '{$Arr[1]}'";
	            if(isset($Arr[3]) && $Arr[3]!= -1)
	               $GridFields .= ",renderer: {$Arr[3]}";
	            if(isset($Arr[2]) && $Arr[2]!= -1)
	                $GridFields .= ",width: {$Arr[2]}";
	            if(isset($Arr[4]))
	                $GridFields .= ",align: '{$Arr[4]}'";
	            else 
	                $GridFields .= ",align: 'center'";
	            
	            $GridFields .= "}";
	            if($i!=(count($GridFieldsArr)-1))
	                $GridFields .= ",";
	        }
	    }
	    
	    //bar
	    $GridBar = '';
	    $GridBarArr=explode(";",$ToolBar);
	    for($i=0;$i<count($GridBarArr);$i++)
	    {//{text:"添加单个"+ChineseMark,cls:"x-btn-text-icon",icon:"/css/js/ext/images/pen.gif",handler:function(){ActAdd(AddAddress);}},
	        $Arr=explode(",,",$GridBarArr[$i]);
	        if(is_array($Arr) && count($Arr)>=2)
	        {
	            $GridBar .= ',"&nbsp;&nbsp;","-","&nbsp;&nbsp;",{cls:"x-btn-text-icon",';
	            if(count($Arr)>=4)
	               $GridBar .= "text: '&nbsp;<font color=\"{$Arr[3]}\">{$Arr[0]}</font>&nbsp;'";
	            else
	               $GridBar .= "text: '&nbsp;&nbsp;{$Arr[0]}&nbsp;&nbsp;'";
	            $GridBar .= ",icon: '{$Arr[1]}'";
	            $GridBar .= ',handler: function(){'.$Arr[2].'}';
	            $GridBar .= '}';
	        }
	    }
	    //
	    $ActFieldStr='';$ActFieldJs='';
	    if($ToolFields && strlen($ToolFields)>3)
	    {
	        $ToolFields=self::RowActStrToExt($ToolFields);
	        $ActFieldStr=$ToolFields[0];
	        $ActFieldJs=$ToolFields[1];
	    }
	    
	    if($Excel==true)
	    {
	        $Excel=<<<str
,"-",{
    text: '导出到Excel',cls:"x-btn-text-icon",icon:"/css/js/ext/images/xls.gif",
    handler: function() 
	{
        var vExportContent = grid.getExcelXml();
        if (1==1) 
		{
            if (! Ext.fly('frmDummy')) 
			{
                var frm = document.createElement('form');
                frm.id = 'frmDummy';
                frm.name = id;
                frm.className = 'x-hidden';
                document.body.appendChild(frm);
            }
            Ext.Ajax.request(
			{
                url: '/user/Toexcel.html',
                method: 'POST',
                form: Ext.fly('frmDummy'),
                callback: function(o, s, r) {
                    //alert(r.responseText);
                },
                isUpload: true,
                params: {exportContent: vExportContent}
            })
        } 
		else 
		{
            document.location = 'data:application/vnd.ms-excel;base64,' + Base64.encode(vExportContent);
        }
}}
str;
	    }
	    else 
	        $Excel='';
	    
	    
	    $str = <<<str
	
<style type="text/css">
.x-panel-header{ 
  height:1px;line-height:1px;padding: 0px 0px 0px 0px;
}

</style>
<div id="ui-grid"></div>
<script type="text/javascript">
            var PageAddress = "{$PageAddress}";
	        var EditAddress = "{$EditAddress}";
	        var AddAddress = "{$AddAddress}";
	        var Mark = "ID";
	        var ChineseMark = "{$ChineseMark}"
	        var Mark_ID = "";
	        var PrimaryKeyName = "ID";
	        var SqlPrimaryKey = '{$PrimaryKeyName}';
	        var ToDivName = "ui-grid";
	        var store;
            var vStart=0;
            var grid;
            var sm;
            var ViewMode={$ViewMode};
            var PageID={$PageID};
            var GridHeight={$GridHeight};
            var HeightCha=!isNaN({$HeightCha})?{$HeightCha} : GetDomHeight('{$HeightCha}')*-1;
            var IsPersentHeight={$GridHeight};
            var PostPara={};
            var vLimit={$PageSize};
            //vLimit=10;document.body.clientWidth
            var MyBrow = myBrowser();

function DoAutoHeight()
{
    if(IsPersentHeight<=1)
    {
        GridHeight=document.documentElement.clientHeight*IsPersentHeight+HeightCha;
        if(vLimit<=0)
        {
            vLimit=parseInt((GridHeight-53)/27);
        }
        //alert(GridHeight);
    }
    if(MyBrow!='ie')
    {
        //GridHeight=GridHeight-3;
    }
}
function ExtCheckUrl(_url)
{
    if(_url.indexOf('?')>=0)
    {
        return '&';
    }
    else
    {
        return '?';
    }
}

DoAutoHeight();

        Ext.onReady(function(){
        		sm = new Ext.grid.CheckboxSelectionModel();//{width:27}
        		//sm.handleMouseDown = Ext.emptyFn;
                store = new Ext.data.Store({

                proxy: new Ext.data.ScriptTagProxy({
                    url: PageID<=0 ? PageAddress + ExtCheckUrl(PageAddress) + 'act=List':'/page/grid/data/?act=List&pageid='+PageID,
			        nocache : true
                }),
                reader: new Ext.data.JsonReader({
                    root: 'Result',
                    totalProperty: 'TotalCount',
                    id: SqlPrimaryKey,
                    fields: [{$Fields}]
                }),
                remoteSort: true
            });
			store.on('beforeload', function() {   
                   Ext.apply(store.baseParams,PostPara);//{pSort:RadioValue("pSort"),pPinLei:RadioValue("pPinLei"),pTitle:Ext.get('pTitle').dom.value}
             });  
            var cm = new Ext.grid.ColumnModel([
                new Ext.grid.RowNumberer(),
                sm,
                //new Ext.grid.CheckboxSelectionModel({header:""}),
                
                {$GridFields}{$ActFieldStr}

		        ]);
            cm.defaultSortable = false;
            

            grid = new Ext.grid.GridPanel({
                el:ToDivName,
                //enableColumnHide:false,
                width:document.body.clientWidth,
                height:GridHeight,//document.body.clientHeight*0.8,
                //autoHeight:true,
                //autoWidth:true,
                forceFit: true,
                layout:'fit',
                //frame: true,
                //bodyStyle:"height:100%;width:100%",
                autoScroll:true,
                //scroll:true,
                title:'', //ChineseMark + '管理',
                store: store,
                cm: cm,
                //trackMouseOver:false,
                //sm: new Ext.grid.RowSelectionModel({handleMouseDown:Ext.emptyFn}),
                sm:sm,
                loadMask: true,
                autoExpandColumn:2,
 viewConfig: { 
            forceFit:true
           
        }, 
                bbar: new Ext.PagingToolbar({
                    pageSize: vLimit,
                    store: store,
                    displayInfo: true,
                    //displayMsg: '显示第 {0} 条到 {1} 条数据,共: {2} 条',
                    //emptyMsg: "没有记录",
                    items:[
                  	        "&nbsp;&nbsp;",'-', "&nbsp;&nbsp;",
					        {text:"刷新数据",cls:"x-btn-text-icon",icon:"/css/js/ext/images/girdrefresh.gif",handler:function(){store.reload();}}
					        {$Excel}{$GridBar}
					        //,
					       
					       // "-",
					       // {text:"添加单个"+ChineseMark,cls:"x-btn-text-icon",icon:"/css/js/ext/images/pen.gif",handler:function(){ActAdd(AddAddress);}},
					       //  "-",
					        //{text:"删除"+ChineseMark,cls:"x-btn-text-icon",icon:"/css/js/ext/images/delete.gif",handler:ActDel}
        					
				          ]
                })
        		
            }); 
        	
	        //Link_Bar = new Ext.om.PagingLink('Link_Bar_Div',{pageSize:vLimit,callback:DoView,prevText:'上页',nextText:'下页'});
            //Link_Bar.bind(store);
            grid.render();
            DoView(vStart,vLimit); 
            //alert(Ext.get(ToDivName).getComputedHeight());
            window.onresize=function()
            {
                if(ViewMode==1)
                {
                    grid.setWidth(document.body.clientWidth); //Ext.get(ToDivName).getComputedWidth()
                    DoAutoHeight();
                }    
            };
            
            function ToDelRows(button,text)
	        {
        		
			        var RowNums = "";
			        var rows=grid.getSelectionModel().getSelections();
			        if(rows && rows.length > 0)
			        {
			            if(button=="ok")
			            {
				            for(var i=0;i<rows.length;i++)
				            {
					            RowNums	= RowNums + rows[i].get(SqlPrimaryKey);
					            if((rows.length!=1) && (rows.length!=i+1))
					            {
							            RowNums = RowNums + ",";
					            }
				            }
				            AjaxAct(PageAddress,"act=Del&IDS=" + RowNums);
			            }
			        }
	        }
			function ToTiJiaoShenHeRows(button,text)
	        {
        		
			        var RowNums = "";
			        var rows=grid.getSelectionModel().getSelections();
			        if(rows && rows.length > 0)
			        {
			            if(button=="ok")
			            {
				            for(var i=0;i<rows.length;i++)
				            {
					            RowNums	= RowNums + rows[i].get(SqlPrimaryKey);
					            if((rows.length!=1) && (rows.length!=i+1))
					            {
							            RowNums = RowNums + ",";
					            }
				            }
				            AjaxAct(PageAddress,"act=ShenHe&IDS=" + RowNums);
			            }
			        }
	        }
			function ToBoHuiShenHeRows(button,text)
	        {
        		
			        var RowNums = "";
			        var rows=grid.getSelectionModel().getSelections();
			        if(rows && rows.length > 0)
			        {
			            if(button=="ok")
			            {
				            for(var i=0;i<rows.length;i++)
				            {
					            RowNums	= RowNums + rows[i].get(SqlPrimaryKey);
					            if((rows.length!=1) && (rows.length!=i+1))
					            {
							            RowNums = RowNums + ",";
					            }
				            }
				            AjaxAct(PageAddress,"act=BoHui&IDS=" + RowNums);
			            }
			        }
	        }
	        function act(value, cellmeta, record)
	        {
		        var Str="";
		        //Str = Str + "<a href='javascript:ActEditDingWei("+value+")'>定位</a>&nbsp;&nbsp;&nbsp;&nbsp;";
		        Str = Str + "<a href='javascript:ActEdit("+value+")'>编 辑</a>";

					try{
						return Str;;
					}finally{
						Str = null;
				   }
	        }
			{$ActFieldJs}
			function IsCommend(value, cellmeta, record)
	        {
		        var Str="";
				if(record.data["IS_COMMEND"] && record.data["IS_COMMEND"]==1)
				{
					Str = "<span style='color:#FF0000'>"+value+"</span>";
				}
				else
				{
					Str = value;
				}
		        

					try{
						return Str;;
					}finally{
						Str = null;
				   }
	        }

function ActPiLiangJieDan()
{
	var rows=grid.getSelectionModel().getSelections();
	if(rows && rows.length > 0)
	{
		Ext.Msg.show({title:"系统提示：",msg:"您确定 结单 么？结单后不可更改撤销！！！",minWidth:300,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:PiLiangJieDan});
	}else{
		ExtAlert("没有选择的行");
	}
}
function PiLiangJieDan(button,text)
{
	
	var RowNums = "";
	var rows=grid.getSelectionModel().getSelections();
	if(rows && rows.length > 0)
	{
		if(button=="ok")
		{
			for(var i=0;i<rows.length;i++)
			{
				RowNums	= RowNums + rows[i].get(SqlPrimaryKey);
				if((rows.length!=1) && (rows.length!=i+1))
				{
						RowNums = RowNums + ",";
				}
			}
			AjaxJieDan(PageAddress,"act=JieDan&IDS=" + RowNums);
		}
	}
}

function AjaxJieDan(url,params)
{
	Ext.Ajax.request({
		params:params,
		url:url,
		method:'post',
		success:function(response ,action){
			    ExtAlert(response.responseText);
			   store.reload();
		},
		failure:function(){
		   ExtAlert('结单失败！');
		}
	});
}			    
			    
	        function ActDel()
	        {
	            var rows=grid.getSelectionModel().getSelections();
	            if(rows && rows.length > 0)
	            {
		            Ext.Msg.show({title:"系统提示：",msg:"您确定 删除 么？",minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:ToDelRows});
		        }else{
		            ExtAlert("没有选择的行");
		        }
	        }
			function ActTiJiaoShenHe()
	        {
	            var rows=grid.getSelectionModel().getSelections();
	            if(rows && rows.length > 0)
	            {
		            Ext.Msg.show({title:"系统提示：",msg:"您确定 审核 么？",minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:ToTiJiaoShenHeRows});
		        }else{
		            ExtAlert("没有选择的行");
		        }
	        }
			function ActBoHuiShenHe()
	        {
	            var rows=grid.getSelectionModel().getSelections();
	            if(rows && rows.length > 0)
	            {
		            Ext.Msg.show({title:"系统提示：",msg:"您确定 驳回 么？",minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:ToBoHuiShenHeRows});
		        }else{
		            ExtAlert("没有选择的行");
		        }
	        }

	        function AjaxAct(url,params)
	        {
		        Ext.Ajax.request({
			        params:params,
			        url:url,
			        method:'post',
			        success:function(response ,action){
				           store.reload();
			               if(response.responseText)
			               {ExtAlert(response.responseText);}
			               
			        },
			        failure:function(){
			           ExtAlert('删除失败！');
			        }
		        });
	        }
	        
	        function AjaxFormAct(_form,_params)
	        {
		        Ext.Ajax.request({
			        params:_params,
			        form:_form,
			        success:function(response ,action){
				           store.reload();
			        },
			        failure:function(){
			           ExtAlert('删除失败！');
			        }
		        });
	        }
	        
        });
        
            function DoView()
            {
                store.load({params:{start:vStart,limit:vLimit}});
            }
            
        	function ActEdit(value)
	        {
		        //parent.window.OpenUrl(EditAddress +ExtCheckUrl(EditAddress)+ "Act=Edit&" + PrimaryKeyName + "=" + value,Mark + "Edit" + value,ChineseMark+"修改");
		        var __Width = arguments[1] ? arguments[1] : 0.5;
                var __Height = arguments[2] ? arguments[2] : 400;
		        window.parent.OpenExtIframWindow2(value+ExtCheckUrl(value)+"Refresh=0&" + PrimaryKeyName + "=" + value,ChineseMark,__Width,__Height);
	        }
        	
            function ActAdd(value)
            {
		        var __Width = arguments[1] ? arguments[1] : 0.5;
                var __Height = arguments[2] ? arguments[2] : 400;
                window.parent.OpenExtIframWindow2(value +ExtCheckUrl(value)+ "Refresh=1&NickName=" ,ChineseMark,__Width,__Height);
            }
        	
	        function SysClear()
	        {
        	    PageAddress = null;
	            EditAddress = null;
	            AddAddress = null;
	            Mark = null;
	            ChineseMark = null;
	            Mark_ID = null;
	            PrimaryKeyName = null;
	            SqlPrimaryKey = null;
	            ToDivName = null;
	            store.removeAll();
	            store = null;
                vStart = null;
                vLimit = null;
                CollectGarbage();
	        }
        	window.onunload = SysClear;

        </script>
str;
	
        return $str;
	}
	
	public static function RowActStrToExt($ToolFields) 
	{
	    $ReturnStr = '';$ReturnJs = '';
	    
		if($ToolFields)
	    {
	        $Arr = explode(";;;",$ToolFields);
	        if(is_array($Arr) && count($Arr)>0)
	        {
	            for($j=0;$j<count($Arr);$j++)
	            {
	                $ArrFields=explode("::",$Arr[$j]);
	                if(!is_array($ArrFields) || count($ArrFields)==0 || !$ArrFields[0])
	                   continue;
                    $Arr2=explode(";;",$ArrFields[1]);
                    if(!is_array($Arr2) || count($Arr2)==0 || !$Arr2[0])
                       continue;
                    
                    $ReturnStr .= ",{";
                    $ReturnStr .= "header: '{$ArrFields[0]}',menuDisabled:true";
                    $ReturnStr .= ",dataIndex: SqlPrimaryKey";
                    $ReturnStr .= ",renderer: act_{$j}";
                    $ReturnStr .= ",align: 'center'";
                    $ReturnJs .= "function act_{$j}(value, cellmeta, record){";
                    $ReturnJs .= 'var Str="";Str = Str + "';
                    for($i=0;$i<count($Arr2);$i++)
                    {
                        $Arr3=explode("@@",$Arr2[$i]);
                        $Url = $Arr3[2];
                        $Url .= $Arr3[3] ? "+ExtCheckUrl({$Url})+".$Arr3[3].'+' : "+'?'+"."PrimaryKeyName+'='+";
                        $Url .= '"+value+"';
                        if(!$Arr3[4])
                            $Arr3[4]=600;
                        if(!$Arr3[5])
                            $Arr3[5]=300;

                        if(!$Arr3[1] || $Arr3[1]=='page')//<a href='javascript:ActEdit("+value+")'></a>
                            $ReturnJs .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\\\"javascript:parent.window.OpenExtIframWindow2({$Url},'{$Arr3[0]}',{$Arr3[4]},{$Arr3[5]})\\\">{$Arr3[0]}</a>";
                        if(!$Arr3[1] || $Arr3[1]=='selfpage')//<a href='javascript:ActEdit("+value+")'></a>
                            $ReturnJs .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\\\"javascript:OpenExtIframWindow2({$Url},'{$Arr3[0]}',{$Arr3[4]},{$Arr3[5]})\\\">{$Arr3[0]}</a>";
                        if(!$Arr3[1] || $Arr3[1]=='tab')
                            $ReturnJs .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\\\"javascript:parent.window.OpenUrl({$Url},{$Arr3[4]},'{$Arr3[0]}')\\\">{$Arr3[0]}</a>";
                        
                    }
                    $ReturnJs .= '";try{return Str;}finally{Str = null;}}';
                    $ReturnStr .= "}";
	            }
	        }
	    }
	    
	    return array($ReturnStr,$ReturnJs);
	}

	public static function InitPageSize(&$PageNum,&$start,&$PageSize,$MaxPagesize=500)
	{

	    $start=Fram::GetValue("start",0);
	    $PageSize=Fram::GetNumValue('limit',19);
	    if(!\Pub\Fram::CheckNum($PageSize))$PageSize=19;
	    if( $PageSize>$MaxPagesize)$PageSize=$MaxPagesize;
	    if($start>0 && is_numeric($start))
	    {
	        $PageNum = ceil($start/$PageSize);
	        if($PageNum <0)
	        {
	            $PageNum = 0;
	        }
	    }
	    $PageNum++;
	    return;
	}

}
