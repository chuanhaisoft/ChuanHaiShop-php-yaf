<?php
    $t=0;
    $m=new \Model\MallGuiGe();
    if($USER_ID)
    {
        $w = '';
        //$where = [$m->_UserId->w('=',$USER_ID),$m->_ParentId->w_and('=',0)];//" (USER_ID = '{$USER_ID}'  {$w} ) AND PARENT_ID='0'";
        $where = [$m->_ParentId->w('=',0)];
    }
    else
    {
        $where = [$m->_ParentId->w('=',0)];
    }
   
    
    if(isset($Used_Type_Ids))
    {
        $Used_Type_Ids = explode('_', $Used_Type_Ids);
        if(is_array($Used_Type_Ids))
        {
            $where[]=$m->_Id->KuoHao_Left('or');
            $IsFirst=true;
            foreach ($Used_Type_Ids as $v)
            {
                $where[]=$IsFirst?$m->_Id->w('=',$v):$m->_Id->w_or('=',$v);
                $IsFirst=false;
            }
            $where[]=$m->_Id->KuoHao_Right();
            //$where .= " OR (ID in (".implode(',', $Used_Type_Ids)."))";
        }
    }
    
    //print_r($where);
   
	$GuiGe=\Bll\MallGuiGe::GetList(1, 100,$where,$t,'',"ID asc");
	
	if(!$GuiGe){
	    die('');
	}
	
	$GuiGeIDS="";
	
	?>
	
<script type="text/javascript">
	GuiGe_Obj = {};
</script>
<div style="line-height:25px; padding-top:2px">

	<?php
	for($i=0;$i<count($GuiGe);$i++)
	{
	    $row=$GuiGe[$i];
	    $where2 = [$m->_ParentId->w('=',$row['ID'])];
	    $GuiGeDetail=\Bll\MallGuiGe::GetList(1, 800,$where2,$t,'',"ID asc");
?>

    <input onchange="SetDrop()" id="gui_ge_<?php echo $row['ID']; ?>" value="<?php echo $row['ID']; ?>" type="checkbox" <?php echo ($i==0&&!$NoSelect)?'checked':''; ?> name="gui_ge_select" /><label for="gui_ge_<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></label>
<div style="width:0px;height:0px;overflow:hidden;float:left" id="div_drop_<?php echo $row['ID']; ?>">
<select name="drop_<?php echo $row['ID']; ?>" class="width55" >
        <?php 
            $Ids2='';
            for($j=0;$j<count($GuiGeDetail);$j++)
            {
                echo "<option value='{$GuiGeDetail[$j]['ID']}'>{$GuiGeDetail[$j]['NAME']} </option>";
                if($Ids2!="")$Ids2.=',';
                $Ids2.=$GuiGeDetail[$j]['ID'];
            }     
        ?>
</select>
</div>

<script type="text/javascript">
	GuiGe_Obj.guige_<?php echo $row['ID']; ?>="<?php echo $Ids2; ?>";
</script>
<?php
        if($GuiGeIDS!="")$GuiGeIDS.=',';
        $GuiGeIDS.=$row['ID'];
	}
	
?>
<script type="text/javascript">
	GuiGeIDS="<?php echo $GuiGeIDS; ?>";
	SetDrop();
</script>
</div>