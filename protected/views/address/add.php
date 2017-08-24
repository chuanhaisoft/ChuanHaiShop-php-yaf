<?php \Pub\Yaf::display('jq_form',['jq'=>false]); ?>
<?php
if(false)$m=new \Model\ShoppingAddress();
echo Form\Html::FormBegin($m);
$value='0';
if(Pub\Fram::CheckNum($m->Sheng()))
    $value=$m->Sheng().','.$m->Shi().','.$m->Qu().','.$m->Xian();
?>
<div id="layer_form">
		<div class="layer_form">
			<div class="m_myaddress" style="width:auto;">
				<div class="item first clearfix">
					<span class="item-label"><i>*</i>&nbsp;所在地区</span>
					<div class="select">
<?php \Pub\Yaf::display('sheng_shi_qu_select',['value'=>$value]); ?>
					</div>
                    <p class="i-error" id="area_msg"></p>
				</div>
				<!--/item -->
				<div class="item clearfix" >
					<span class="item-label"><i>*</i>&nbsp;详细地址</span>
					<?php echo Form\Html::Text($m->_Address,['placeholder'=>'无需重复填写省市区，小于75个字','class'=>"item-textarea ztag",'autocomplete'=>'off']);?>
				</div>
				<!--/item -->
				<div class="item item-fullname clearfix">
				
					<span class="item-label"><i>*</i>&nbsp;收货人姓名</span> <?php echo Form\Html::Input($m->_UserName,['placeholder'=>'请使用真实姓名','class'=>"item-input item-input-fullname ztag"]);?>
				</div>
				<!--/item -->
				<div class="item clearfix">
					<span class="item-label"><i>*</i>&nbsp;手机号码</span>
					<?php echo Form\Html::Input($m->_UserTel,['placeholder'=>'手机号码、电话号码必须填一项','class'=>"item-input item-input-mobile zptag",'autocomplete'=>'off']);?>

				</div>
				<div class="item clearfix">
					<span class="item-label"><i>*</i>&nbsp;邮政编码</span> 
					<?php echo Form\Html::Input($m->_YouBian,['class'=>'item-input ztag']);?>
					<p class="i-error"></p>
				</div>
				<!--/item -->
				<div class="item-bottom clearfix">
					<div class="ckb">
					    <?php echo Form\Html::CheckBox($m->_Isdefault,['1'=>'设为默认地址']);?>
					</div>
					<input type="hidden" id="addressid">
					<?php echo Form\Html::ButtonajaxSubmit(null,'保存新地址',null,['class'=>'item-submit']);?>
				</div>
				<!--/item -->
			</div>
			<!-- m_myaddress -->
		</div>
		<!-- / .layer_form -->
	</div>
	
<?php echo Form\Html::FormEnd();?>