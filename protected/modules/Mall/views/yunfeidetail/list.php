<?php \Pub\Yaf::display('jq_form'); ?>

<script type="text/javascript">
function SearchList()
{
	FormToExt("SearchDiv",PostPara);

	DoView();
}
function ActBianJi(_ID,_PRICE_COUNT,_PRICE,_NEXT_COUNT,_PRICE_NEXT,_AREA_ID,_BAO_YOU_COUNT)   
{
	setValue('PRICE_COUNT',_PRICE_COUNT);
	setValue('PRICE',_PRICE);
	setValue('NEXT_COUNT',_NEXT_COUNT);
	setValue('PRICE_NEXT',_PRICE_NEXT);
	setValue('BAO_YOU_COUNT',_BAO_YOU_COUNT);


	var checkbox_html = '';
	for(key in s_s_q_x)
	{
		if(key ==_AREA_ID)
		{
			checkbox_html +='<span  style="display:inline-block;"><input  checked name="sheng_checkbox[]" type="hidden" value="'+ key +'"> '+ s_s_q_x[key].name +'</span>';
			
		}
	}
	$('#sheng_checkbox_box').html(checkbox_html);
	
// 	sheng_shi_qu_select_Change(_AREA_ID);
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
<body>
<div id="SearchDiv" style="height:285px;overflow: hidden;">
<?php
if(false)$m=new \Model\ProYunFeiDetail();
echo Form\Html::FormBegin($m,null,'post','/mall/yunfeidetail/addedit.html?yun_fei_id='.Pub\Fram::GetNumValue('ID'));
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
  <tr>
    <td style="    width: 85px;"><div align="right">运费：</div></td>
    <td><?php echo Form\Html::Input($m->_PriceCount,null,['width'=>'100px']);?>件内
    ,运费<?php echo Form\Html::Input($m->_Price,null,['width'=>'100px']);?>元
     <input name="DetailID" type="hidden" id="DetailID" value="-1">
    </td>
  </tr>
  <tr>
    <td ><div align="right">包邮件数：</div></td>
    <td><?php echo Form\Html::Input($m->_BaoYouCount,null,['width'=>'100px']);?>件(达到此件数免邮费)
    
    </td>
  </tr>
  <tr>
    <td ><div align="right">续件：</div></td>
    <td>每增加<?php echo Form\Html::Input($m->_NextCount,null,['width'=>'100px']);?>件
    ,增加运费<?php echo Form\Html::Input($m->_PriceNext,null,['width'=>'100px']);?>元
    </td>
  </tr>
  <tr>
    <td><div align="right">省份：</div></td>
    <td><?php \Pub\Yaf::display('sheng_shi_qu_checkbox',['value'=>"",'level'=>"1",'IsHead'=>'请选择']); ?>
	</td>
  </tr>


<script type="text/javascript">
function ChangeFormUrl()
{
	this.url=$("#chuan_hai_form1").attr('action');
	btnState();
}
</script>
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>
<?php echo Form\Html::ButtonajaxSubmit(['beforeSend'=>'ChangeFormUrl']);?></td>
        </tr>
      </table></td>
  </tr>
</table>

<?php echo Form\Html::FormEnd();?>
</div>


<div style="float:left">
	<?php echo $GridHtml; ?>
</div>

