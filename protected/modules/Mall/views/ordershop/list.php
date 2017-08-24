<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="X-UA-Compatible" content="IE=8">
<head id="Head1"><title></title>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<script type="text/javascript" src="/js/jQuery.js"></script>
<script language="javascript">
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

function PayType(value, cellmeta, record)
{
	var Str= value==1?'现金':'余额';
	try{return Str;}finally{Str = null;}
}
function JieSuanTime(value, cellmeta, record)
{
	var Str= value;//==''?'未结':value;
	try{return Str;}finally{Str = null;}
}
function Fa_Huo()
{
	var RowNums = "";
	var rows=grid.getSelectionModel().getSelections();
	if(rows && rows.length > 0)
	{

			for(var i=0;i<1;i++)
			{
				RowNums	= RowNums + rows[i].get("ID");
				if((rows.length!=1) && (rows.length!=i+1))
				{
						RowNums;
				}
			}
	}
	Open_Fa_Huo(RowNums);
}

function Open_Fa_Huo(Id)
{
	var str="fahuo.html";
	<?php 
	if(Bll\Role::Role_Id_User(Pub\SysFram::getLoginRoleID()))
	    echo 'str="shouhuo.html";';
	?>
	window.parent.OpenExtIframWindow2("/mall/ordershop/"+str+"?ID="+Id ,"详细",700,550);//Mark + "Add",
}

function Fa_Huo_Fun(value, cellmeta, record)
{
	Str ="<a href='javascript:Open_Fa_Huo("+record.data["ID"]+")' >"+value+"</a>";
	try{return Str;}finally{Str = null;}
}
function OpenOrder(value, cellmeta, record)
{
	Str ="<a href='javascript:OpenOrderUrl("+record.data["ID"]+")' >查 看</a>";
	try{return Str;}finally{Str = null;}
}


function Mall_Order_State(value, cellmeta, record)
{
	var Str=record.data["STATE"];
	if(Str==1)
	{
		Str =FontRed("已支付");
	}
	if(Str==0)
	{
		Str ="未支付";
	}
	if(Str==0.1)
	{
		Str ="未支付";
	}
	if(Str==-1 || Str==-1.1)
	{
		Str ="已取消";
	}

	try{return Str;}finally{Str = null;}
}

function Mall_Huo_State(value, cellmeta, record)
{
	var Str ="";
	
	if(value==1)
	{
		
		
		Str ="<a href='javascript:Open_Fa_Huo("+record.data["ID"]+")' >"+FontRed("已发货")+"</a>";
		
		
	}
	if(value==-1.2)
	{
		Str =FontRed("未发货取消");
	}
	if(value==2)
	{
		Str =FontGreen("已收货");
	}
	if(value==3)
	{
		Str =FontGreen("已完成");
	}
	if(value==2.5)
	{
		Str ="等待商家处理";
	}
	if(value==2.6)
	{
		Str ="商家同意退货";
	}
	if(value==2.7)
	{
		Str ="商家拒绝退货";
	}
	if(value==2.8)
	{
		Str ="退货,买家已发货";
	}
	if(value==4)
	{
		Str ="退货完成";
	}
	try{return Str;}finally{Str = null;}
}



var DoDelID=0;
function ActDelOrder(_id)
{
	DoDelID=_id;
	if(DoDelID)
	{
		parent.window.Ext.Msg.show({title:"系统提示：",msg:"您确定 撤单么？",minWidth:300,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:DoDelOrder});
	}else{
		ExtAlert("没有选择的行");
	}
}
function DoDelOrder(button,text)
{
	var RowNums = DoDelID;
	var rows=DoDelID;
	if(rows)
	{
		if(button=="ok")
		{
			ExtAjaxDo(PageAddress,"act=Del&IDS=" + RowNums);
		}
	}
}
function DelOrder(value, cellmeta, record)
{
	var Str='';
	
	if(record.data["SHOP_ID"]==record.data["LOGIN_ID"]||record.data["LOGIN_ROLE_ID"]==1||record.data["LOGIN_ROLE_ID"]==101||record.data["LOGIN_ROLE_ID"]==85){
	if(value==0||value==1)
		Str ="<a href='javascript:ActDelOrder("+record.data["ID"]+")' >可撤单</a>";
	}
	try{return Str;}finally{Str = null;}
}



</script>

</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div id="SearchDiv" style=" padding-bottom:3px;">
 <table width="100%" border="0" cellpadding="0" cellspacing="0"  >
      <tr>
        <td width="0"></td><td >
        <span >会员名称:</span>
         <input name="hnum" type="text" id="hnum" size="10" style="width:150px" />
           <span >商家名称:</span>
         <input name="snum" type="text" id="snum" size="10" style="width:150px" />
        <span >订单号:</span>
         <input name="id" type="text" id="id" size="10" style="width:150px" />
        <span >编号:</span>
         <input name="num" type="text" id="num" size="10" style="width:150px" />
         <span >产品名称:</span>
         <input name="name" type="text" id="name" size="15" style="width:150px" />
         <br/> 
         时间 从：<input name="st" style="width:100px" type="text" class="Wdate" id="starttime" onClick="WdatePicker()">
   到：<input name="ed" style="width:100px" type="text" class="Wdate" id="endtime" onClick="WdatePicker()">
   <span style="display:none">&nbsp;角色:
   <select name="shop_role_id" id="shop_role_id">
           <option value="">所 有</option>
           <option value="81">A类</option>
           <option value="80">B类</option>
           <option value="79">C类</option>
         </select>
</span>
   <span >&nbsp;支付状态</span>:
        <select class="SearchItem" name="zt" id="zhuangtai">
<option class="SearchItem" value="0"  selected="selected"> 所有</option>
<option class="SearchItem"  value="1" > 未支付</option>
<option class="SearchItem"  value="2"  >已支付</option>
 </select>
<span >&nbsp;发货状态</span>:
        <select class="SearchItem" name="ft" id="ft">
<option class="SearchItem" value="0"  selected="selected">所有</option>
<option class="SearchItem"  value="1" > 待发货</option>
<option class="SearchItem"  value="2"  > 已发货</option>
<option class="SearchItem"  value="3" > 已收货 </option>
<option class="SearchItem"  value="4" > 完成 </option>
<option class="SearchItem"  value="5" > 已退货</option>
<option class="SearchItem"  value="3.7" >商家拒绝退货</option>
</select>
         
  
      <input type="button" name="button" id="button" value="查 询"  onclick="SearchList();"/>
    </td>
        <td width="0"></td>
      </tr>
    </table>
  
</div>
<?php echo $GridHtml; ?>



</form>
</body>
</html>
