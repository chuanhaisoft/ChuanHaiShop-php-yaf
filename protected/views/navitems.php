<?php 
if(!isset($hover))
    $hover=null;
    
$sort_id = Pub\Fram::GetNumValue('sort_id',0);
?>
<div class="navitems">
    <ul class="clearfix">
        <li <?php if ($hover == 'index') echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::site_url()?>" class="name"><strong>首页</strong></a></li>
        <li <?php if ($hover == 'pro' && $sort_id==0) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url();?>" class="name"><strong>惠优选</strong></a><i class="ico-kh"></i></li>
        <!-- <li><a href="tuan.html" class="name"><strong>团购</strong></a></li>
        <li><a href="huodong.html" class="name"><strong>活动</strong></a></li>  -->
        <li <?php if ($hover == 'point') echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(0,1,0,0,0,2);?>" class="name"><strong>积分兑换</strong></a></li>
        <li <?php if ($sort_id==1266) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(1266);?>" class="name"><strong>家电</strong></a></li>
        <li <?php if ($sort_id==1271) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(1271);?>" class="name"><strong>数码</strong></a></li>
        <li <?php if ($sort_id==683) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(683);?>" class="name"><strong>食品</strong></a></li>
        <li <?php if ($sort_id==348) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(348);?>" class="name"><strong>服饰</strong></a></li>
        <li <?php if ($sort_id==354) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(354);?>" class="name"><strong>母婴</strong></a></li>
        <li <?php if ($sort_id==755) echo 'class="hover"'; ?>><a href="<?php echo Pub\SysPara::Pro_List_Url(755);?>" class="name"><strong>家居</strong></a></li>
    </ul>
</div>
