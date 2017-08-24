<script type="text/javascript" src="/js/Ext_Css.js"></script>
<script type="text/javascript" src="/js/Ext.js"></script>
<script type="text/javascript" src="/js/Css.js"></script>
<body >
<style type="text/css">
.mytable
{
	border:1px #cfdae8; background-color:#cfdae8
}
.mytable tr
{
	border:1px #cfdae8; background-color:#ffffff;
}
</style>
<?php		
	echo EHtml::beginForm(); 
	EHtml::setOptions(array(
	'errorContainer'		=> 'div.container',
	'errorElement'=> 'span',
	'errorClass' => 'invalid'
	));
	if(!$m)$m=new Model_OrderMallDetail();
	if(!$order)$order=new Model_OrderMall();
	
?>
<input id="DelRows" name="DelRows" type="hidden" value="">
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable">

  <tr>
    <td><div align="right">会员：</div></td>
    <td><?php  echo Bll_User::GetNameByID($m->UserId()); ?>【<?php  echo Bll_User::GetCardNumById($m->UserId());?>】</td>
  </tr>
  
  <tr>
    <td><div align="right">订单号：</div></td>
    <td><?php  echo $m->OrderId(); ?></td>
  </tr>

  <tr>
    <td><div align="right">运费：</div></td>
    <td><?php  echo $m->MoneyYunFei(); ?></td>
  </tr>
  
  <tr>
    <td ><div align="right" >修改为：</div></td>
	<td ><input name="new_yunfei" type="text" id="new_yunfei" value="" />	</td>
  </tr>
<tr>
    <td></td>
    <td><table width="60%" border="0" cellspacing="0">
        <tr>
          <td>

            <?php 
            $RoleID=SysFram::getLoginRoleID();
if(Bll_Role::Role_Id_Shop($RoleID) || $RoleID==1)
{
    echo EHtml::ajaxSubmitButton('确 定','',
    	array(
    		'beforeSend' => 'btnState',
    		'complete' => 'btnState2',
    		'dataType'=>'script',
    		'error'=>'BtOnError',
    		'update'=> '#response'),    		
    		array('id'=> 'tijiao')
    		); 
}
?></td> 
<?php if($show_delay_shou_huo){?>
<td><a id="Delay_Shou_huo" style="    background: #0AE;display: inline-block;    line-height: 30px;    padding: 0px 30px;    border: 0px none;    color: #FFF;    height: 30px;    cursor: pointer;    border-radius: 4px;    font-size: 18px;">延期收货</a>
      </td>
      <?php }?>
        </tr>
      </table>
      
      </td>
      
      
  </tr>
 



</table>


<style>
    .btn_a{
	background: #0AE;display: inline-block;    line-height: 30px;    padding: 0px 30px;    border: 0px none;    color: #FFF;    height: 30px;    cursor: pointer;    border-radius: 4px;    font-size: 18px;
    }
</style>
<?php echo EHtml::endForm();?>

