<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<body class="ext-gecko x-border-layout-ct">
<?php		
	echo EHtml::beginForm(); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
?>
<script type="text/javascript">
CurrentSelectID=-1;
LastID_FuZhi=-1;
function SetGuiGe()
{
	CurrentSelectID=<?php echo $m->SORT_ID; ?>;//linkageSel1.getSelectedValue(1);
	
	var aj = $.ajax( 
	{  
		url:'/mall/pro/gui_ge_html/?no_select=1',
		data:{  
			sort_id : CurrentSelectID,
			Used_Type_Ids : '<?php echo $UsedTypeIds;?>',
			SHOP_ID : <?php echo $USER_ID;?>
		},  
		type:'post',  
		cache:false,  
		dataType:'html',  
		success:function(data) {  
			//CurrentSelectID=linkageSel1.getSelectedValue(1);
			//if(LastID_FuZhi == CurrentSelectID)
			$("#gui_ge_div").html(data);

			//初始化选中的规格			
			var pid;
			<?php foreach ($TypePids as $v){?>
			   pid = <?php echo $v?>;
			   $('#gui_ge_'+pid).attr("checked", true);;
			<?php }?>
			SetDrop();

			
			<?php foreach ($Types as $v){?>
			   
			   $('#dynamicTable tr').each(function(){
				   xing_hao_num = $(this).find('input[name=xing_hao_num]').val();
				   xing_hao_db_key = $(this).find('input[name='+xing_hao_num+'_xing_hao_db_key]').val();
				   if(xing_hao_db_key==<?php echo $v['ID']?>){
					   <?php if($v['GUI_GE_JSON_ARRAY']){?>
    					   <?php foreach ($v['GUI_GE_JSON_ARRAY'] as $v2){?>
    					      $(this).find('select[name=drop_<?php echo $v2['pid']?>]').val(<?php echo $v2['tid']?>);
    					      $(this).find('select[name=drop_<?php echo $v2['pid']?>]').attr("disabled","disabled");
    					   <?php }?>
					   <?php }?>
					   
				   }
				   
			   });
			<?php }?>

			
			
			
			
		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");
		 }  
	}
	);

}

$(function()
{ 
	//setTimeout("SetGuiGe()","1000");
}); 
</script>
<input id="DelRows" name="DelRows" type="hidden" value="">
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
    <tr>
    <td><div align="right">商品分类：</div></td>
    <td><?php  $this->renderPartial('mall.views.web.mall_sort_select',array('value'=>$m->SORT_PARENT_ID.','.$m->SORT_ID,'onlyread'=>true,'OnChange'=>'SetGuiGe();SetDrop();ReSet();')); ?></td>
  </tr>
  <tr>
    <td width="11%"><div align="right">商品名称：</div></td>
    <td width="89%"><?php echo $pro->Name(); ?></td>
  </tr>
  
  <tr style="display:none;">
    <td><div align="right">规格：</div></td>
    <td>
	   <div id="gui_ge_div">
	       
	   </div>
	</td>
  </tr>
  
    <tr>
    <td valign="top"><div align="right" style="padding-top:9px"><input style="display: none;" type="button" id="btn_addtr" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;" value="增行"></div><input name="xing_hao_nums" type="hidden" value=""><input name="gui_ge_value" type="hidden" value=""></td>
    <td>
<style type="text/css">

.smallbutton{
    background: #0AE;
    line-height: 15px;
    padding: 0px 0px;
    border: 0px none;
    color: #FFF;
    height: 15px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 15px;
}
</style>
<script type="text/javascript">
var current_id=1;
$(function () {
	
	var show_count = 200;   //要显示的条数
	var count = 1;    //递增的开始值，这里是你的ID
	$("#btn_addtr").click(function () {

		var length = $("#dynamicTable tbody tr").length;
		//alert(length);
		if (length < show_count)    //点击时候，如果当前的数字小于递增结束的条件
		{
			current_id++;
			var addstr=$("#tab11 tbody").html().replace('tmp2_xing_hao',current_id+'_xing_hao').replace('tmp_ku_cun',current_id+'_ku_cun').replace('tmp_pic',current_id+'_pic');
			addstr=addstr.replace('tmp_xing_hao_db_key',current_id+'_xing_hao_db_key');
//			addstr=addstr.replace('<input name="xing_hao_num_tmp" type="hidden" value="1">','<input name="xing_hao_num" type="hidden" value="'+current_id+'">');
			addstr=addstr.replace('xing_hao_num_tmp','xing_hao_num');
			addstr=addstr.replace('xing_hao_num_tmp_value',current_id);
			addstr=addstr.replace('xing_hao_num_tmp','xing_hao_num');
			addstr=addstr.replace('<span name="up"></span>',UploadText(current_id+'_pic'));
			addstr=addstr.replace(new RegExp('name="tmp_',"g"),'name="'+current_id+'_');
			addstr=addstr.replace(new RegExp('id="tmp_',"g"),'id="'+current_id+'_');
			addstr=addstr.replace(new RegExp('_tmp_id_',"g"),current_id);
			$(addstr).clone().appendTo("#dynamicTable tbody");
			changeIndex();//更新行号
		}
	});


});
function changeIndex() {
	var i = 1;
	$("#dynamicTable tbody tr").each(function () { //循环tab tbody下的tr
		$(this).find("input[name='NO']").val(i++);//更新行号
	});
}
var publi_opp=null;var delID=0;
function deltr(button,text) 
{
	if(button=="ok")
	{
		var length = $("#dynamicTable tbody tr").length;
		//alert(length);
		if (length <= 1) {
			alert("至少保留一行");
		} else {
			$(publi_opp).parent().parent().remove();//移除当前行
			changeIndex();
		}
		if(delID>0)
		{
			$("#DelRows").val($("#DelRows").val()+','+delID);
		}
	}
	delID=0;
}
var ShopRate=<?php echo $m->RATE; ?>;
var RoleID=<?php echo $m->SHOP_ROLE; ?>;
function SetPointValue(i)
{
       	  if(!isNaN($("#"+i+"_price").val()))
       	  {
          	$("#"+i+"_point").val(parseInt($("#"+i+"_price").val()*ShopRate*100)/100);
       	  }
}
function ActDel(opp,dbid)
{
	if(dbid>0)
	{
		delID=dbid;
	}
	publi_opp=opp;
	Ext.Msg.show({title:"系统提示：",msg:"您确定 删除 么？",minWidth:230,icon:Ext.MessageBox.QUESTION,buttons:Ext.Msg.OKCANCEL,fn:deltr});
}


function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}
var Wei_Zhi=new Array(0,0,0,0,0,0);
function FindKongSpan(id)
{
	var r=-1;
	if(IsInArray(Wei_Zhi,id))
	{
		return r;
	}
	
	for (var k=1;k<=5;k++)
	{//$($("#dynamicTable select[name='drop_"+$(this).val()+"']"))
		//alert("html:"+$("span[name='row_guige_"+k+"']").html());
		var tempstr=trimStr($("span[name='row_guige_"+k+"']").first().html());
		if(tempstr=='' || tempstr==undefined)
		{
			r=k;
			break;
		}
	}
	
	return r;
}
function ReSet()
{
	Wei_Zhi=new Array(0,0,0,0,0,0);
	 for (var k=1;k<=5;k++)
	 {
		 $("span[name='row_guige_"+k+"']").html('');
	 }
}
function IsInArray(arr, obj) {  
    var i = arr.length;  
    while (i--) {  
        if (arr[i] === obj) {  
            return true;  
        }  
    }  
    return false;  
}
function NotSelected()
{
	 $('input[name="gui_ge_select"]').not("input:checked").each(function(){
		 $($("#dynamicTable select[name='drop_"+$(this).val()+"']")).remove();
		 $($("#tab11 select[name='drop_"+$(this).val()+"']")).remove();
		 //Wei_Zhi.remove($(this).val());

		 var t=$(this).val();
		 for (var k=1;k<Wei_Zhi.length;k++)
		 {
			if(Wei_Zhi[k]==t)
			{
				Wei_Zhi[k]=0;
			}
		 }

	 });
}
function SetDrop()
{
	$(".gui_ge_row_td").hide();
	//NotSelected();
	var arr = new Array();
	var has_arr = 0;
	$('input[name="gui_ge_select"]:checked').each(function(){
		arr.push($(this).val());
		has_arr = 1;
	});
	if(has_arr){
		$(".gui_ge_row_td").show();
	}
	arr.sort(function(a,b){return a-b});
	
	 var _Selected="";
		var i=1;
		for (var k=0;k<arr.length;k++)
		{
				if(_Selected!=""){_Selected += ",";}_Selected += arr[k];//alert($("span[name='row_guige_"+i+"']").html());
				//alert(arr[k]+"drop数量:"+$("#dynamicTable select[name='drop_"+arr[k]+"']").length);
				if($("#dynamicTable select[name='drop_"+arr[k]+"']").length==0)
				{
					r=FindKongSpan(arr[k]);//alert(r);
					if(r>0)
					{
						$("span[name='row_guige_"+r+"']").html($("#div_drop_"+arr[k]).html());
						Wei_Zhi[r]=arr[k];
					}
					
				}
				i++;
		}
		NotSelected();
}

</script>
<div >

	<table id="tab11" style="display: none">
		<tbody>
			<tr>
				<input name="xing_hao_num_tmp" type="hidden" value="xing_hao_num_tmp_value">
				<input name="tmp_xing_hao_db_key" type="hidden" value="-1">
				<td class="gui_ge_row_td" align="center">规格：<span class='kong' name="row_guige_1"></span><span class='kong' name="row_guige_2"></span><span class='kong' name="row_guige_3"></span><span class='kong' name="row_guige_4"></span><span class='kong' name="row_guige_5"></span></td>
				<td align="center">价格：<input type="text" id="tmp_price" name="tmp_price" style="width:80px" onchange="SetPointValue(_tmp_id_)" /> </td>
				<td align="center">惠点：<input type="text" id="tmp_hui_dian" name="tmp_hui_dian" value="0" style="width:70px" /> </td>
				<td align="center">库存：<input type="text" name="tmp_ku_cun" style="width:80px" /></td>
				<td align="center">积分：<input type="text" id="tmp_point" name="tmp_point" style="width:70px" class="typepoint" /> </td>
				<td style="display:none;">
					<input type="button"  onClick="ActDel(this,0)" value="删行" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;">				</td>
			</tr>
		</tbody>
	</table>
	
	<table id="dynamicTable"  border="0" cellspacing="0" cellpadding="0">
		<tbody>
<?php
	if(Types && count($Types)>0)
	{
		for($i=0;$i<count($Types);$i++)
		{
			$j=$i+1;$row=$Types[$i];
?>
<script type="text/javascript">
	current_id=<?php echo $j; ?>;
</script>
			<tr>
				<input name="xing_hao_num" type="hidden" value="<?php echo $j; ?>">
				<input name="<?php echo $j; ?>_xing_hao_db_key" type="hidden" value="<?php echo $row['ID']; ?>">
				<td class="gui_ge_row_td" align="center">规格：<span class='kong' name="row_guige_1"></span><span class='kong' name="row_guige_2"></span><span class='kong' name="row_guige_3"></span><span class='kong' name="row_guige_4"></span><span class='kong' name="row_guige_5"></span></td>
				<td align="center">价格：<input disabled="disabled"  readonly="readonly" type="text" id="<?php echo $j; ?>_price" name="<?php echo $j; ?>_price" style="width:80px" onchange="SetPointValue(<?php echo $j; ?>);" value="<?php echo $row['PRICE']; ?>" /> </td>
				<td align="center">惠点：<input disabled="disabled" readonly="readonly" type="text" id="<?php echo $j; ?>_hui_dian" name="<?php echo $j; ?>_hui_dian" style="width:70px" value="<?php echo $row['HUI_DIAN']; ?>" /> </td>
				<td align="center">库存：<input type="text" name="<?php echo $j; ?>_ku_cun" style="width:80px" value="<?php echo $row['KU_CUN']; ?>" /></td>
				<td align="center">积分：<input disabled="disabled" type="text" id="<?php echo $j; ?>_point" name="<?php echo $j; ?>_point" style="width:70px" class="typepoint" value="<?php echo $row['POINT']; ?>" /> </td>
				
				
				<td style="display:none;">
					<input type="button" id="Button2" onClick="ActDel(this,<?php echo $row['ID']; ?>)" value="删行" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;">				</td>
			</tr>
<script type="text/javascript">
//SetPointValue(<?php echo $j; ?>);
</script>
<?php
		}
	}
	else
	{
?>

			<tr>
				<input name="xing_hao_num" type="hidden" value="1">
				<input name="1_xing_hao_db_key" type="hidden" value="-1">
				<td align="center">规格：<span class='kong' name="row_guige_1"></span><span class='kong' name="row_guige_2"></span><span class='kong' name="row_guige_3"></span><span class='kong' name="row_guige_4"></span><span class='kong' name="row_guige_5"></span></td>
				<td align="center">价格：<input type="text" id="1_price" name="1_price" style="width:80px" onchange="SetPointValue(1);" /> </td>
				<td align="center">惠点：<input type="text" id="1_hui_dian" name="1_hui_dian" value="0" style="width:70px" /> </td>
				<td align="center">库存：<input type="text" name="1_ku_cun" style="width:80px" /></td>
				<td align="center">积分：<input type="text" id="1_point" name="1_point" style="width:70px" class="typepoint" /> </td>
				
				<td align="center">图片：<input type="text" id="1_pic" name="1_pic" style="width:60px" readonly="readonly" /><script type="text/javascript">document.write(UploadText('1_pic'))</script> </td>
				<td style="display:none;">
					<input type="button" id="Button2" onClick="ActDel(this,0)" value="删行" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;">				</td>
			</tr>
<?php
	}
?>
		</tbody>
	</table>
</div>    </td>
  </tr>
  
  
  <?php if($pro_bei_zhu){?>
  <tr>
    <td  align="right">备注</td>
    <td style="color:#e00"><?php echo $pro_bei_zhu;?></td>
  </tr>
  <?php }?>

<script type="text/javascript">

    function SetPointInput()
    {
        if(RoleID==79)
        {
        	$(".typepoint").attr("readonly","readonly");
        }
        else
        {
        	
        }
    }
    SetPointInput();
</script>
  
     
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>
<script type="text/javascript">
function CheckForm()
{

	//多规格重复判断
	 //判断规格
  var IsChongFu=false;
	var gui_ge_rows = new Array();
	var gei_ge_json = new Array();
	var gui_ge_str = '';
	var price_row = 0;
	var has_gui_ge = 0;
	
	$('#dynamicTable tr').each(function(){
  	var index = '';
  	var price = 0;
  	

  	$(this).find('input').each(function(){
      	var input_name = $(this).attr('name');
      	input_name +='';
      	if(input_name.substr(input_name.length-5)=='price'){
      	    price = $(this).val();
      	    if(price>0){
      	    	price_row +=1;
      	    }
      	}
  	});

  	
  	row_num = $(this).find('input[name=xing_hao_num]').val();
  	gei_ge_json[row_num+'_gui_ge'] = new Array();
  	
  	$(this).find('select').each(function(){
  		has_gui_ge = 1;
  	    index += $(this).val()+'_';
  	    gei_ge_json[row_num+'_gui_ge'].push($(this).val());
      });
  	gui_ge_str += row_num+'_gui_ge:'+index+',';
  	if(price>0){
      	for(var i=0;i<gui_ge_rows.length;i++){
   		   if(gui_ge_rows[i]===index){
   	 	 	   IsChongFu=true;
       		   break;
   		   }
          }
      	gui_ge_rows.push(index);

      }
  });

	if(!has_gui_ge&&price_row>1){
		alert("没有选择规格 ,只能有一行有效行");
		return false;
	}
  

  	
	
//	ss = JSON.stringify(gei_ge_json); 
	$('input[name=gui_ge_value]').val(gui_ge_str);
	if(IsChongFu)
	{
		alert("有重复的规格");
		return false;
	}
	
	//alert($("input:hidden[name='xing_hao_num']").val());//$("input:hidden[name='xing_hao_num']").val('555,777');
	var inArr = document.getElementsByTagName('input');
    var values = '', i=0;j=0;
    for( i=0; i<inArr.length; i++ )
    {
        if( inArr[i].name == 'xing_hao_num' )
		{
        	value1='abc';
            value2=$("input[name='"+inArr[i].value+"_ku_cun']").val();
            item_hui_dian=$("input[name='"+inArr[i].value+"_hui_dian']").val();
            item_point=$("input[name='"+inArr[i].value+"_point']").val();
            item_price=$("input[name='"+inArr[i].value+"_price']").val();
            //alert(inArr[i].value+','+value1+','+value2);
            if(value1 && !isNaN( value2 ))
            {
            	j++;
    			if(j>1)
    			{
    				values=values+',';	
    			}
                values=values+inArr[i].value;
            }
            
            if(value1 && (value2=="" || value2 == undefined || value2 == null || isNaN(value2) ))
            {
				$("input[name='"+inArr[i].value+"_ku_cun']").focus();
				alert(value1+":库存错误，请重新输入");
				return false;
            }
            if(value1 && (item_price=="" || item_price == undefined || item_price == null || isNaN(item_price) ))
            {
				$("input[name='"+inArr[i].value+"_price']").focus();
				alert(value1+":价格错误，请重新输入");
				return false;
            }

            if(value1 && (item_hui_dian=="" || item_hui_dian == undefined || item_hui_dian == null || isNaN(item_hui_dian) ))
            {
				$("input[name='"+inArr[i].value+"_hui_dian']").focus();
				alert(value1+":惠点错误，请重新输入");
				return false;
            }

            if(value1 && (item_point=="" || item_point == undefined || item_point == null || isNaN(item_point) ))
            {
				$("input[name='"+inArr[i].value+"_point']").focus();
				alert(value1+":积分错误，请重新输入");
				return false;
            }
            if(RoleID==80 && item_point<item_price*ShopRate)
            {
				$("input[name='"+inArr[i].value+"_point']").focus();
				alert(value1+":积分不能低于签约比例，请重新输入");
				return false;
            }
            
        }
    }
	$("input:hidden[name='xing_hao_nums']").val(values);
	this.data=$("#ejsvformid1").serialize();
	btnState();
}
</script>

<?php if($show_btn){?>
            <?php 
echo EHtml::ajaxSubmitButton('保存数据','',
	array(
		'beforeSend' => 'CheckForm',
		'complete' => 'btnState2',
		'dataType'=>'script',
		'error'=>'BtOnError',
		'update'=> '#response'),
		
		array('id'=> 'tijiao')
		); 
?>

<?php }else{?>
    <?php echo $show_msg;?>
<?php }?>

</td>
        </tr>
      </table></td>
  </tr>
</table>
<script type="text/javascript">

function UserChanged()
{
	$("#UserName").html('');
	if($("#User_ADD_USER_ID").val()=='')
	{
		return false;
	}
	var aj = $.ajax( 
	{  
		url:'/data_shop/order_user/checkcardnum.html',// 跳转到 action  
		data:{  
			card_num : $("#User_ADD_USER_ID").val()
		},  
		type:'post',  
		cache:false,  
		dataType:'json',  
		success:function(data) {  
			if(data.error =="0" ){
				$("#UserName").html(data.msg);
				//alert(data.msg);
			}else{  
				$("#UserName").html(data.msg);
			}  
		 },  
		 error : function() {  
			  // view("异常！");  
			  alert("异常！");  
		 }  
	}
	);

}




</script>

<?php echo EHtml::endForm();?>

