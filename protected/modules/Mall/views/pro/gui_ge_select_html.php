<?php
    $t=0;
// 	$GuiGe=Bll_MallGuiGe::GetList(1, 100,"SORT_ID='{$SortID}'",&$t,'',"ID asc");
    $GuiGeDetail=Bll_MallGuiGe::GetList(1, 100,"PARENT_ID='{$p_id}'",&$t,'',"ID asc");
    
?>
<select name="tmp_gui_ge_<?php echo $p_id; ?>">
<option>请选择</option>
<?php foreach($GuiGeDetail as $row){?>
<option value="<?php echo $row['ID']?>"><?php echo $row['NAME']; ?></option>
<?php
	}
?>
</select>