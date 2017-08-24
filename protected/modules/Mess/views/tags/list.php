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
function GridAdd(value)
{
	
	window.OpenExtIframWindow2(value + "?Refresh=1&NickName=" ,"添加产品消费",0.95,0.89);//Mark + "Add",
}

function ActAdd2(value)
{
    var __Width = arguments[1] ? arguments[1] : 0.5;
    var __Height = arguments[2] ? arguments[2] : 400;
    window.OpenExtIframWindow2(value +ExtCheckUrl(value)+ "Refresh=1&NickName=" ,ChineseMark,__Width,__Height);
}

function OpenOrder(value, cellmeta, record)
{
	Str ="<a href='javascript:OpenOrderUrl("+record.data["ID"]+")' >查 看</a>";
	try{return Str;}finally{Str = null;}
}
function GuanLian(value, cellmeta, record)
{
	Str ="<a href='javascript:void(0);' class='add_tags abtn'  tagid='" + record.data["ID"] + "' tagval='"+ record.data["TITLE"] +"'>关联</a>";
	try{return Str;}finally{Str = null;}
}

function OpenOrderUrl(value)
{
	window.OpenExtIframWindow2("/data_user/point/order_point.html?Refresh=1&orderid="+value ,"相关单元",0.95,0.89);//Mark + "Add",
}


$('.add_tags').live('click', '.add_tags', function() {
    var add_one = 1;
    var key = $(this).attr('tagid');
    var val = $(this).attr('tagval');
    var html = '<input name="TAG1[]" checked  id="TAG1_'+ key +'" value="'+ key +'" type="checkbox"><label for="TAG1_'+ key +'">'+ val +'</label>';
    $('#select_box').find('input').each(function(){
        var e_key = $(this).attr('value');
        if(key==e_key){
            alert('该标签已在列表中!');
            add_one = 0;
        }
    });

    if(add_one){
    	$('#select_box').append(html);
    }
});


</script>
<style type="text/css">
<!--
.STYLE1 {color: #00CC00}
-->
</style>
</head>
<body>
    <form name="form1" method="post" action="" id="form1">
<div id="SearchDiv">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="10">&nbsp;</td>
        <td  style="padding:5px;">
         <span class="STYLE">关键字</span>:
         <input name="keyword" type="text" id="keyword" size="15" />
    &nbsp;&nbsp;
          <input type="button" name="button" id="button" value="点击查询"  onclick="SearchList();"/>
          
        <span id="select_box" style="margin-left: 60px;">
         <?php foreach ($tags as $key => $v){?>
            <input name="TAG1[]" checked="checked" id="TAG1_<?php echo $key?>" value="<?php echo $key;?>" type="checkbox">
            <label for="TAG1_<?php echo $key;?>"><?php echo $v;?></label>
        <?php }?>
        </span><input type="button" name="button" id="button2" value="选定"  onclick="parent.select_tags_v($('#select_box').html());parent.window.ExtWindowClose(escape(window.location.pathname+window.location.search));"/>
        </td>
        <td width="10">&nbsp;</td>
      </tr>
    </table>
</div>
<script type="text/javascript">

</script>
<?php echo $GridHtml; ?>
</form>
</body>
</html>
