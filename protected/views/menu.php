<link href="/css/menu.css" rel="stylesheet">
<link href="/js/circliful/css/font-awesome.min.css" rel="stylesheet">
<?php
	$class='vertical-menu-wrapper visible-lg';
	if(isset($left_menu_state)&& $left_menu_state==1)
		$class='vertical-menu-wrapper visible-lg default-open';
?>
<div class="<?php echo $class; ?>" >
        <h4 class="title"><span>全部分类</span><i class="fa fa-bars"></i></h4>
        <div class="vertical-menu" id="vertical-menu">
          <ul class="vertical-menu-list">
            
<?php
$data = array();
$total = 0;
// 取得所有分类
$m_sort=new \Model\MallSort();
$all_sort = Bll\MallSort::GetList(1, 2000, [$m_sort->_State->w('=',1)], $total, "*", $m_sort->_OrderNum->k." ASC");
foreach ($all_sort as $v) 
{
    if ($v['PARENT_ID'] == 0) 
    {
        $data['sort'][] = $v;
    }
    else 
    {
        $data['sort_'.$v['PARENT_ID']][] = $v;
    }
}
?>
<?php
    foreach ($data['sort'] as $v) :
?>
<li class="list-name">
  <a href="<?php echo Pub\SysPara::Pro_List_Url($v['ID']);?>">
    <img src="/images/new/sort_base.png" class="icon-menu">    <span class="menu-title"><?php echo $v['NAME']?></span>
  </a>
    <div class="submenu-wrapper" style="width:900px;overflow:hidden;">
    <div class="submenu-content"><div class="row">
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<?php foreach (isset($data['sort_'.$v['ID']])?$data['sort_'.$v['ID']]:[] as $sv) :?>
    <div class="submenu-category-wrapper horizontal">
    <h4 class="title"><a href="<?php echo Pub\SysPara::Pro_List_Url($sv['ID']);?>"><?php echo $sv['NAME']?></a></h4>
        <ul><li></li>
<?php foreach (isset($data['sort_'.$sv['ID']])?$data['sort_'.$sv['ID']]:[] as $v3) :?>
            <li><a class="basic" href="<?php echo Pub\SysPara::Pro_List_Url($v3['ID']);?>"><?php echo $v3['NAME']?></a></li>
<?php endforeach; ?>
          </ul>
      </div>
<?php endforeach; ?>
</div>

</div></div>
  </div>
  </li>
<?php
    endforeach;
?>

          </ul>
        </div>
      </div>
<script type="text/javascript">
	$(".submenu-wrapper").height(document.getElementById("vertical-menu").offsetHeight-10);
</script>