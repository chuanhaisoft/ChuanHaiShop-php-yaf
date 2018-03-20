<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<body>

<?php		
	echo EHtml::beginForm(); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">
    <tr>
    <td><div align="right">商品分类：</div></td>
    <td><?php  $this->renderPartial('mall.views.web.mall_sort_select',array('value'=>$m->SORT_PARENT_ID.','.$m->SORT_ID)); ?></td>
  </tr>
  <tr>
    <td width="11%"><div align="right">商品名称：</div></td>
    <td width="89%"><?php echo EHtml::activeTextField($m,'NAME',array('style'=>'width:600px')); ?></td>
  </tr>
    <tr>
    <td><div align="right">副标题：</div></td>
    <td><?php echo EHtml::activeTextField($m,'NAME2',array('style'=>'width:600px')); ?></td>
  </tr>
  <tr>
    <td ><div align="right">商品价格：</div></td>
    <td><?php echo EHtml::activeTextField($m,'PRICE_SHOP',array('style'=>'width:100px')); ?>元
	&nbsp;&nbsp;&nbsp;市场价：<?php echo EHtml::activeTextField($m,'SHI_CHANG_PRICE',array('style'=>'width:100px')); ?>元
	&nbsp;&nbsp;&nbsp;惠点：<?php echo EHtml::activeTextField($m,'HUI_DIAN_SHOP',array('style'=>'width:100px')); ?>个	</td>
  </tr>
  <tr>
    <td><div align="right">运费：</div></td>
    <td><?php  $this->renderPartial('mall.views.web.yun_fei_select',array('value'=>$m->WU_LIU_ID)); ?>
	
	&nbsp;&nbsp;&nbsp;积分：<?php echo EHtml::activeTextField($m,'POINT',array('style'=>'width:100px')); ?>&nbsp;&nbsp;&nbsp;赠送积分：<?php echo EHtml::activeTextField($m,'POINT_FREE',array('style'=>'width:100px')); ?>
	</td>
  </tr>
<script type="text/javascript">
    var ShopRate=<?php echo $m->RATE; ?>;
    var RoleID=<?php echo $m->SHOP_ROLE; ?>;
    if(RoleID==79 || RoleID==80 )
    {
    	$("#Pro_POINT").attr("readonly","readonly");
    	$("#Pro_PRICE_SHOP").change(function()
    	    	{
    	       	  if(!isNaN($("#Pro_PRICE_SHOP").val()))
    	       	  {
    	          	$("#Pro_POINT").val(parseInt($("#Pro_PRICE_SHOP").val()*ShopRate*100)/100);
    	       	  }
    	  		});
    }
    else
    {
    	//alert(3);
    }
	
</script>

  
    <tr>
    <td valign="top"><div align="right" style="padding-top:9px"><input type="button" id="btn_addtr" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;" value="增行"></div><input name="xing_hao_nums" type="hidden" value=""></td>
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
$(function () {
	if(RoleID==78 || RoleID==80 )
	{
		$("#Pro_POINT").val(parseInt($("#Pro_PRICE_SHOP").val()*ShopRate*100)/100);
	}
	
	var current_id=1;
	var show_count = 20;   //要显示的条数
	var count = 1;    //递增的开始值，这里是你的ID
	$("#btn_addtr").click(function () {

		var length = $("#dynamicTable tbody tr").length;
		//alert(length);
		if (length < show_count)    //点击时候，如果当前的数字小于递增结束的条件
		{
			current_id++;
			var addstr=$("#tab11 tbody").html().replace('tmp2_xing_hao',current_id+'_xing_hao').replace('tmp_ku_cun',current_id+'_ku_cun').replace('tmp_pic',current_id+'_pic');
			addstr=addstr.replace('tmp_xing_hao_db_key',current_id+'_xing_hao_db_key');
			addstr=addstr.replace('<input name="xing_hao_num_tmp" type="hidden" value="1">','<input name="xing_hao_num" type="hidden" value="'+current_id+'">');
			addstr=addstr.replace('<span name="up"></span>',UploadText(current_id+'_pic'));
			$(addstr).clone().appendTo("#dynamicTable tbody");   //在表格后面添加一行
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

function deltr(opp) {
	var length = $("#dynamicTable tbody tr").length;
	//alert(length);
	if (length <= 1) {
		alert("至少保留一行");
	} else {
		$(opp).parent().parent().remove();//移除当前行
		changeIndex();
	}
}

</script>
    
<div >

	<table id="tab11" style="display: none">
		<tbody>
			<tr>
				<input name="xing_hao_num_tmp" type="hidden" value="1">
				<input name="tmp_xing_hao_db_key" type="hidden" value="-1">
				<td align="center">型号：<input type="text" name="tmp2_xing_hao" style="width:150px" /></td>
				<td align="center">库存：<input type="text" name="tmp_ku_cun" style="width:100px" /></td>
				<td align="center">图片：<input type="text" id="tmp_pic" name="tmp_pic" style="width:100px" /><span name="up"></span> </td>
				<td>
					<input type="button"  onClick="deltr(this)" value="删行" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;">				</td>
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
				<td align="center">型号：<input type="text" name="<?php echo $j; ?>_xing_hao" style="width:150px" value="<?php echo $row['NAME']; ?>" /></td>
				<td align="center">库存：<input type="text" name="<?php echo $j; ?>_ku_cun" style="width:100px" value="<?php echo $row['KU_CUN']; ?>" /></td>
				<td align="center">图片：<input type="text" id="1_pic" name="<?php echo $j; ?>_pic" style="width:100px" value="<?php echo $row['PIC']; ?>" /><script type="text/javascript">document.write(UploadText('1_pic'))</script> </td>
				<td>
					<input type="button" id="Button2" onClick="deltr(this)" value="删行" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;">				</td>
			</tr>
<?php
		}
	}
	else
	{
?>

			<tr>
				<input name="xing_hao_num" type="hidden" value="1">
				<input name="1_xing_hao_db_key" type="hidden" value="-1">
				<td align="center">型号：<input type="text" name="1_xing_hao" style="width:150px" /></td>
				<td align="center">库存：<input type="text" name="1_ku_cun" style="width:100px" /></td>
				<td align="center">图片：<input type="text" id="1_pic" name="1_pic" style="width:100px" /><script type="text/javascript">document.write(UploadText('1_pic'))</script> </td>
				<td>
					<input type="button" id="Button2" onClick="deltr(this)" value="删行" style="width:45px;padding:0px;font-size:14px;height:18px;line-height:18px;">				</td>
			</tr>
<?php
	}
?>
		</tbody>
	</table>
</div>    </td>
  </tr>
  

  
  
  
  
      <tr>
    <td valign="top"><div align="right" style="padding-top:5px">商品介绍：</div></td>
	<td ><div style="width:85%"><?php  $this->renderPartial('//web//uedit',array('content'=>$Mess)); ?></div>
	
	</td>
  </tr>
<tr>
    <td></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td>
<script type="text/javascript">
function CheckForm()
{
	//alert($("input:hidden[name='xing_hao_num']").val());//$("input:hidden[name='xing_hao_num']").val('555,777');
	var inArr = document.getElementsByTagName('input');
    var values = '', i=0;j=0;
    for( i=0; i<inArr.length; i++ )
    {
        if( inArr[i].name == 'xing_hao_num' )
		{
            value1=$("input[name='"+inArr[i].value+"_xing_hao']").val();
            value2=$("input[name='"+inArr[i].value+"_ku_cun']").val();
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
            
        }
    }
	$("input:hidden[name='xing_hao_nums']").val(values);
	this.data=$("#ejsvformid1").serialize();
	btnState();
}
</script>
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
?></td>
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

