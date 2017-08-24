<script src="/js/xiala2/js/comm.js"></script>
<script src="/js/xiala2/js/linkagesel-min.js"></script>
<?php
    $Sign='kuai_di_gong_si_select';
?>

<select id="<?php echo $Sign; ?>"></select>
<input type="hidden" name="<?php echo $Sign; ?>_ids" id="<?php echo $Sign; ?>_ids">
<script>
var linkageSel1;
$(document).ready(function(){
    var data1 = <?php 
if(!$ProUserID)
    $ProUserID=SysFram::GetLoginID();

    print_r(str_replace(',"cell":[]', '', json_encode(Bll_ProYunFei::GetData_yun_fei($ProUserID))));
    
    	   
?>;
    var opts<?php echo $Sign; ?> = {
            data: data1,
            //root: [1],
            select: '#<?php echo $Sign; ?>',
            selStyle: 'margin-left: 6px;',
            head: '请选择快递公司',
            defVal:[<?php echo $value?$value:0; ?>]
    };
    <?php echo $Sign; ?> = new LinkageSel(opts<?php echo $Sign; ?>);
    //linkageSel1.changeValues([<?php echo $value?$value:0; ?>]);
    <?php echo $Sign; ?>.onChange(function() {
    	var arr = <?php echo $Sign; ?>.getSelectedArr();
    	$('#<?php echo $Sign; ?>_ids').val(arr.join(','));
    });
});
</script>


