
<?php 
$YuE=0;
$DuanXin=0;
$Mess='';
$Json=\Pub\YunHuaTong::UserMoney();
$Json=json_decode($Json,true);
if(!$Json || !isset($Json['Code']) || $Json['Code']==0)
{
    $Mess= "(接口返回信息错误。)";
    if(isset($Json['Mess']))
        $Mess="({$Json['Mess']})";
}
else 
{
    $YuE=$Json['user_money'];
    $DuanXin=$Json['message_count'];
}
?>
<table width="481" class="mytable">
  <tr>
    <td width="128"><div align="right">云话通余额:</div></td>
    <td width="346"><?php echo $YuE; ?>元<?php echo $Mess; ?></td>
  </tr>
  <tr>
    <td><div align="right">短信:</div></td>
    <td><?php echo $DuanXin; ?>条</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="http://www.yunhuatong.com" target="_blank">云话通为您提供:短信发送,voip回拨,手机话费充值接口</a></td>
  </tr>
</table>
