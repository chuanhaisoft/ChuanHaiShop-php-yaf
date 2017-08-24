<?php
$data = array();
$total = 0;
// 取得所有分类
$m_sort=new \Model\MallSort();
$all_sort = Bll\MallSort::GetList(1, 2000, [$m_sort->_State->w('=',1)], $total, "*", $m_sort->_OrderNum->k." ASC");
foreach ($all_sort as $v) 
{
    if ($v['PARENT_ID'] == 0) {
        foreach ($all_sort as $v2) {
            if ($v2['PARENT_ID'] == $v['ID']) {
                foreach ($all_sort as $v3) {
                    if ($v3['PARENT_ID'] == $v2['ID']) {
                        $v2['SUB_SORT'][] = $v3;
                    }
                }
                $v['SUB_SORT'][] = $v2;
            }
        }
        $data['sort'][] = $v;
    }
}
?>
<div class="navitm-cats" id="navitm-cats" style='display:none'>
	<ul>
    <?php
    foreach ($data['sort'] as $v) :
    ?>
		<li class="catli">
			<div class="alinks">
				<a href="<?php echo Pub\SysPara::Pro_List_Url($v['ID']);?>" class="t"><i class="icon i<?php echo $v['ID'];?>"></i><strong title="<?php echo $v['NAME']?>"><?php echo mb_substr($v['NAME'],0,4,'utf-8'); ?></strong></a><i class="iconfont arr"></i>
			</div>
			<div class="m-ctgcard" style="width: 120px;">
				<div class="subitems">
					<?php foreach ($v['SUB_SORT'] as $sv) :?>
					<dl>
						<dt>
							<a href="<?php echo Pub\SysPara::Pro_List_Url($sv['ID']);?>"><?php echo $sv['NAME']?><i>&gt;</i></a>
						</dt>
						
					</dl>
					<?php endforeach; ?>
				</div>
			</div>
		</li>
		<?php
			endforeach;
		?>
	</ul>
</div>
<script type="text/javascript">tab_door("#navitm-cats");</script>
<!-- /#navitm-cats -->
