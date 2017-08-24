<script src="/js/xiala/js/comm.js"></script>
<script src="/js/xiala/js/linkagesel-min.js"></script>
<?php
    $Sign='yun_fei_select';
?>

<select id="<?php echo $Sign; ?>"></select>
<input type="hidden" name="<?php echo $Sign; ?>_ids"
	id="<?php echo $Sign; ?>_ids">
<script>
var linkageSel1_<?php echo $Sign; ?>;
$(document).ready(function(){
    var data1_<?php echo $Sign; ?> = <?php 
if(!isset($ProUserID))
    $ProUserID=\Pub\SysFram::GetLoginID();
function GetData_yun_fei($ProUserID)
{
    $temp_m=new \Model\ProYunFei();
    $ReturnArr = array();
    $User1 = \Bll\ProYunFei::GetList(1, 999, [$temp_m->_UserId->w('=',0),$temp_m->_UserId->w_or('=',$ProUserID)] );
    for ($i1 = 0; $i1 < count($User1); $i1 ++) {
        $row1 = $User1[$i1];
        $ReturnArr[$row1['ID']] = array();
        $ReturnArr[$row1['ID']]["name"] = $row1['NAME'];
        $ReturnArr[$row1['ID']]["cell"] = array();
    }
    print_r(str_replace(',"cell":[]', '', json_encode($ReturnArr)));
}
    	    GetData_yun_fei($ProUserID);
    	?>;
    var opts<?php echo $Sign; ?> = {
            data: data1_<?php echo $Sign; ?>,
            //root: [1],
            select: '#<?php echo $Sign; ?>',
            selStyle: 'margin-left: 6px;',
            head: false,
            defVal:[<?php echo isset($value)?$value:0; ?>]
    };
    <?php echo $Sign; ?> = new LinkageSel(opts<?php echo $Sign; ?>);
    //linkageSel1_<?php echo $Sign; ?>.changeValues([<?php echo isset($value)?$value:0; ?>]);
    <?php echo $Sign; ?>.onChange(function() {
    	var arr = <?php echo $Sign; ?>.getSelectedArr();
    	$('#<?php echo $Sign; ?>_ids').val(arr.join(','));
    });
});
</script>


