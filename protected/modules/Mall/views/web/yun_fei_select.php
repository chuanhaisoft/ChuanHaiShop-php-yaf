<script src="/js/xiala/js/comm.js"></script>
<script src="/js/xiala/js/linkagesel-min.js"></script>
<?php
    $Sign='yun_fei_select';
?>

<select id="<?php echo $Sign; ?>"></select>
<input type="hidden" name="<?php echo $Sign; ?>_ids" id="<?php echo $Sign; ?>_ids">
<script>
var linkageSel1;
$(document).ready(function(){
    var data1 = <?php 
if(!$ProUserID)
    $ProUserID=SysFram::GetLoginID();
function GetData_yun_fei($ProUserID)
{
    	        $ReturnArr=array();
    	        $User1=Bll_ProYunFei::GetList(1, 999,'USER_ID=0 or USER_ID='.$ProUserID);
    	        for($i1=0;$i1<count($User1);$i1++)
    	        {
    	            $row1=$User1[$i1];
    	            $ReturnArr[$row1['ID']]=array();
    	            $ReturnArr[$row1['ID']]["name"]=$row1['NAME'];
    	            $ReturnArr[$row1['ID']]["cell"]=array();
    	            
    	            
    	            
    	        }
    	        print_r(str_replace(',"cell":[]', '', json_encode($ReturnArr)));
}
    	    GetData_yun_fei($ProUserID);
    	?>;
    var opts<?php echo $Sign; ?> = {
            data: data1,
            //root: [1],
            select: '#<?php echo $Sign; ?>',
            selStyle: 'margin-left: 6px;',
            head: false,
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


