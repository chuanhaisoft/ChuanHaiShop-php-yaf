<script src="/js/xiala/js/comm.js"></script>
<script src="/js/xiala/js/linkagesel-min.js"></script>
<script type="text/javascript" src="/upload/cache/s_s_q_x2.js"></script>
<?php
    $Sign='sheng_shi_qu_select';
    $JsHead="false";
    if(isset($IsHead) && strlen($IsHead)>1)
        $JsHead="'{$IsHead}'";
?>

<select id="<?php echo $Sign; ?>"></select>
<input type="hidden" name="<?php echo $Sign; ?>_ids" id="<?php echo $Sign; ?>_ids">
<script>
var linkageSel1;
$(document).ready(function(){
    
    var opts_<?php echo $Sign; ?> = {
            data: s_s_q_x,
            //root: [1],
            select: '#<?php echo $Sign; ?>',
            <?php 
if(isset($level)&&$level && is_numeric($level))
{
    echo "level:{$level},";
}
?>
            selStyle: 'margin-left: 6px;',
            head: <?php echo $JsHead; ?>,
            defVal:[<?php echo isset($value)?$value:0; ?>]
    };
    linkageSel1 = new LinkageSel(opts_<?php echo $Sign; ?>);
    //linkageSel1.changeValues([<?php echo isset($value)?$value:0; ?>]);
    linkageSel1.onChange(function() {
    	var arr = linkageSel1.getSelectedArr();
    	$('#<?php echo $Sign; ?>_ids').val(arr.join(','));
    });
});
function <?php echo $Sign; ?>_Change(value)
{
	linkageSel1.changeValues(value,true);
	$('#<?php echo $Sign; ?>_ids').val(value);
	
}
</script>













