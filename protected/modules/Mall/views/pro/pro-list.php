<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="X-UA-Compatible" content="IE=8">
<head id="Head1"><title></title>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<script type="text/javascript" src="/js/jQuery.js"></script>
<script type="text/javascript">
var grid;


function SearchList()
{
	FormToExt("SearchDiv",PostPara);

	DoView();
}
function RadioValue(tmpValue)   
{   
	  var obj=document.getElementById(tmpValue);
	   return obj.value;  
}
function ZhuangTai(value, cellmeta, record)
{
	var Str="未审核";
	if(value==1)
	{
		Str = FontGreen("已上架");
	}
	if(value==0)
	{
		Str =FontYello("货管部已审");
	}
	if(value==0.1)
	{
		Str =FontYello("已下架");
	}
	if(value==-3)
	{
		Str =FontRed("审核驳回");
	}
	if(value==-100)
	{
		Str =FontRed("已删除");
	}

	if(value==-6)
	{
		if(record.data["ROLE_ID"]==79)
		{
			Str =FontRed("未提交审核");
		}
		else
		{
			Str =FontRed("未提交审核")+'| <a href="javascript:TiJiaoShenHe('+ record.data['ID'] +');">提交审核</a>';
		}
		
		
	}
	
	try{return Str;}finally{Str = null;}
}

var ti_jiao_id = 0;
function TiJiaoShenHe(id)
{
	ti_jiao_id = id;
	parent.window.Ext.Msg.show({title:"系统提示：",msg:"您确定提交审核么？",minWidth:300,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:DoTiJiaoShenHe});
}
function DoTiJiaoShenHe(button,text)
{

	if(button=="ok")
	{
		ExtAjaxDo(PageAddress,"act=TiJiaoShenHe&PorId=" + ti_jiao_id);
		
	}
}

function RoleName(value, cellmeta, record)
{
	var Str=ReturnRoleName(value);
	try{return Str;}finally{Str = null;}
}
function GridAdd(value)
{
	window.parent.OpenExtIframWindow2(value + "?Refresh=1&NickName=" ,"添加产品",0.9,0.95);//Mark + "Add",
}

function DetailView(value, cellmeta, record)
{
	Str ="<a href='javascript:parent.window.OpenExtIframWindow2(\"/data_shop/user/detailview.html?ID="+record.data["ID"]+"\",\"详细\",700,500)'>"+value+"</a>";

	try{return Str;}finally{Str = null;}
}
function WebDetailView(value, cellmeta, record)
{
	Str ="<a  target='_blank' href='/pro_detail/"+record.data["ID"]+".html'>"+value+"</a>";

	try{return Str;}finally{Str = null;}
}

function ActDel2()
{
    var rows=grid.getSelectionModel().getSelections();
    if(rows && rows.length > 0)
    {
        Ext.Msg.show({title:"系统提示：",msg:"您确定 删除 么？",minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:ToDelRows2});
    }else{
        ExtAlert("没有选择的行");
    }
}

function ToDelRows2(button,text)
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
	            AjaxAct2(PageAddress,"act=Del&IDS=" + RowNums);
            }
        }
}

function AjaxAct2(url,params)
{
    Ext.Ajax.request({
        params:params,
        url:url,
        method:'post',
        success:function(response ,action){

            if(response.responseText){
            	ExtAlert(response.responseText);
            }
	           store.reload();
        },
        failure:function(){
           ExtAlert('删除失败！');
        }
    });
}


</script>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div id="SearchDiv" style=" padding-bottom:3px">
    <table width="100%" border="0" cellpadding="0" cellspacing="0"  >
      <tr>
        <td width="0"></td><td >
<span class="STYLE1">分类:</span>
<?php  //$this->renderPartial('mall.views.web.mall_sort_select',array('OnChange'=>'SetGuiGe();SetDrop();ReSet();')); ?>
<span class="STYLE1">状态:</span>
         <select name="state" id="state">
           <option value="">所 有</option>
           <option value="1">已上架</option>
           <option value="0.1">已下架</option>
           <option value="-6">未提交审核</option>
         </select>

         <span class="STYLE1">名称:</span>
         <input name="name" type="text" id="name" size="10" />
     
    

         
    &nbsp;&nbsp;
    <input type="button" name="button" id="button" value="查 询"  onclick="SearchList();"/>
    </td>
        <td width="0"></td>
      </tr>
    </table>
</div>
<?php echo $GridHtml; ?>
<?php 
    $ShangXiaSign="";
    if(Bll\Role::Role_Id_Shop(Pub\SysFram::getLoginRoleID()))$ShangXiaSign="ShangJia";
?>
<script type="text/javascript">
//商城审核-上架
function ActShangJia()
{
	parent.window.Ext.Msg.show({title:"系统提示：",msg:"您确定 上架么？",minWidth:300,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:DoShangJia});
}
function DoShangJia(button,text)
{
	var RowNums = "";
	var rows=grid.getSelectionModel().getSelections();
	if(rows && rows.length > 0)
	{
		if(button=="ok")
		{
			for(var i=0;i<rows.length;i++)
			{
				RowNums	= RowNums + rows[i].get("ID");
				if((rows.length!=1) && (rows.length!=i+1))
				{
						RowNums = RowNums + ",";
				}
			}
			ExtAjaxDo(PageAddress,"act=<?php echo $ShangXiaSign; ?>ShangXiaJia&dostate=1&IDS=" + RowNums);
		}
	}
}
//商城审核-下架
function ActXiaJia()
{
	parent.window.Ext.Msg.show({title:"系统提示：",msg:"您确定 下架么？",minWidth:300,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:DoXiaJia});
}
function DoXiaJia(button,text)
{
	var RowNums = "";
	var rows=grid.getSelectionModel().getSelections();
	if(rows && rows.length > 0)
	{
		if(button=="ok")
		{
			for(var i=0;i<rows.length;i++)
			{
				RowNums	= RowNums + rows[i].get("ID");
				if((rows.length!=1) && (rows.length!=i+1))
				{
						RowNums = RowNums + ",";
				}
			}
			ExtAjaxDo(PageAddress,"act=<?php echo $ShangXiaSign; ?>ShangXiaJia&dostate=2&IDS=" + RowNums);
		}
	}
}
<?php 
    $ShopSign="";
    if(\Pub\SysFram::getLoginRoleID()==104)$ShopSign="Shop";
?>
//库管审核
function ActDoState()
{
	parent.window.Ext.Msg.show({title:"系统提示：",msg:"您确定 审核么？",minWidth:300,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:DoState});
}
function DoState(button,text)
{
	var RowNums = "";
	var rows=grid.getSelectionModel().getSelections();
	if(rows && rows.length > 0)
	{
		if(button=="ok")
		{
			for(var i=0;i<rows.length;i++)
			{
				RowNums	= RowNums + rows[i].get("ID");
				if((rows.length!=1) && (rows.length!=i+1))
				{
						RowNums = RowNums + ",";
				}
			}
			ExtAjaxDo(PageAddress,"act=<?php echo $ShopSign; ?>ShenHe&IDS=" + RowNums);
		}
	}
}

function ActDoStateFalse()
{
	parent.window.Ext.Msg.show({title:"系统提示：",msg:"驳回原因",minWidth:300,buttons:Ext.Msg.OKCANCEL,fn:DoStateFalse,multiline: true});
}
function DoStateFalse(button,text)
{
	
	var RowNums = "";
	var rows=grid.getSelectionModel().getSelections();
	
	if(rows && rows.length > 0)
	{
		if(button=="ok")
		{
			for(var i=0;i<rows.length;i++)
			{
				RowNums	= RowNums + rows[i].get("ID");
				if((rows.length!=1) && (rows.length!=i+1))
				{
						RowNums = RowNums + ",";
				}
			}
			
			ExtAjaxDo(PageAddress,"act=<?php echo $ShopSign; ?>ShenHeFalse&IDS=" + RowNums +"&BEI_ZHU=" +text);
		}
	}
}
</script>
</form>
</body>
</html>
