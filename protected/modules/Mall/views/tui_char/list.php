<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >

<head id="Head1"><title></title>
<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<script type="text/javascript">
function SearchList()
{
	FormToExt("SearchDiv",PostPara);

	DoView();
}
function ActBianJi(_ID,_PRICE_COUNT,_PRICE,_NEXT_COUNT,_PRICE_NEXT,_AREA_ID,_BAO_YOU_COUNT)   
{
	setValue('YunFeiDetail[PRICE_COUNT]',_PRICE_COUNT);
	setValue('YunFeiDetail[PRICE]',_PRICE);
	setValue('YunFeiDetail[NEXT_COUNT]',_NEXT_COUNT);
	setValue('YunFeiDetail[PRICE_NEXT]',_PRICE_NEXT);
	setValue('YunFeiDetail[BAO_YOU_COUNT]',_BAO_YOU_COUNT);
	sheng_shi_qu_select_Change(_AREA_ID);
	setValue('DetailID',_ID);
}
function BianJi(value, cellmeta, record)
{
	var _ID=record.data["ID"];
	var _PRICE_COUNT=record.data["PRICE_COUNT"];
	var _PRICE = record.data["PRICE"];
	var _NEXT_COUNT = record.data["NEXT_COUNT"];
	var _PRICE_NEXT = record.data["PRICE_NEXT"];
	var _AREA_ID = record.data["AREA_ID"];
	var _BAO_YOU_COUNT = record.data["BAO_YOU_COUNT"];
	if(_BAO_YOU_COUNT==-1){
		_BAO_YOU_COUNT="";
	}
	var Str2="'"+_ID+"','"+_PRICE_COUNT+"','"+_PRICE+"','"+_NEXT_COUNT+"','"+_PRICE_NEXT+"','"+_AREA_ID+"','"+_BAO_YOU_COUNT+"'";

	var Str="<a href=javascript:ActBianJi("+Str2+")>编 辑</a>";
	try{return Str;}finally{Str = null;}
}
function setValue(name, val)
{
    if(1==1){//val != ""
        var htmlType = $("[name='"+name+"']").attr("type");
        if(htmlType == "text" || htmlType == "textarea" || htmlType == "select-one" || htmlType == "hidden" || htmlType == "button"){
            $("[name='"+name+"']").val(val);
        }else if(htmlType == "radio"){
            $("input[type=radio][name='"+name+"'][value='"+val+"']").attr("checked",true);
        }else if(htmlType == "checkbox"){
            var vals = val.split(",");
            for(var i=0; i < vals.length; i++){
                $("input[type=checkbox][name='"+name+"'][value='"+vals[i]+"']").attr("checked",true);
            }
        }
    }
}
</script>
</head>
<body style="background: #fff;">

<?php foreach ($list as $v){?>

<div style="padding:12px;border-bottom:1px solid #ccc;padding-bottom:25px;">

    <div style="color:#888;height:25px;"><?php echo $v['USER_ID_NAME']?> 与 <?php echo $v['ADD_TIME']?> 留言</div>
    <div><?php echo $v['MESS']?> </div>
	
</div>
<?php }?>

<div style="height: 40px;padding:10px;line-height:40px;text-align:right;">
<?php new PagerTool($PageSize,$total,$PageNum,8,"/mall/tui_char/list.html?ID=".$ProID."&page=",1);?>

</div>


<div id="SearchDiv" style="height:150px;overflow: hidden;">
<?php		
	echo EHtml::beginForm('/mall/tui_char/add_edit.html?ID='.Fram::GetNumValue('ID')); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
?>

<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  
  <tr style="background: #fff;">
    <td ><div align="right">内容：</div></td>
    <td><?php echo EHtml::activeTextArea($m,'MESS',array('style'=>'width:200px')); ?>
    
    </td>
  </tr>
  


<script type="text/javascript">
function ChangeFormUrl()
{
	this.url=$("#ejsvformid1").attr('action');
	btnState();
}
</script>
<tr style="background: #fff;">
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr style="background: #fff;">
          <td>
            <?php 
echo EHtml::ajaxSubmitButton('提交','',
	array(
		'beforeSend' => 'ChangeFormUrl',
		'complete' => 'btnState2',
		'dataType'=>'script',
		'error'=>'BtOnError',
		'update'=> '#response'),
		
		array('id'=> 'tijiao')
		); 
?></td>
        </tr>
      </table></td>
  </tr>
</table>

<?php echo EHtml::endForm();?>
</div>


</form>
</body>
</html>
