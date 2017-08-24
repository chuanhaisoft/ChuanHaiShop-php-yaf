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
            defVal:[<?php echo $value?$value:0; ?>]
    };
    linkageSel1 = new LinkageSel(opts_<?php echo $Sign; ?>);
    //linkageSel1.changeValues([<?php echo $value?$value:0; ?>]);
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

<?php 
if(isset($_GET['dodb'])&&$_GET['dodb']==1)
{
function GetData()
    	    {
    	        $ReturnArr=array();
    	        $User1=Bll_China::GetList(1, 999,'PID=0');
    	        for($i1=0;$i1<count($User1);$i1++)
    	        {
    	            $row1=$User1[$i1];
    	            $ReturnArr[$row1['ID']]=array();
    	            $ReturnArr[$row1['ID']]["name"]=$row1['NAME'];
    	            $ReturnArr[$row1['ID']]["cell"]=array();
    	            $User2=Bll_China::GetList(1, 999,'PID='.$row1['ID']);
    	            for($i2=0;$i2<count($User2);$i2++)
    	            {
    	                $row2=$User2[$i2];
    	                $arr2=$ReturnArr[$row1['ID']]["cell"];
    	                
    	                $arr2[$row2['ID']]=array();
    	                $arr2[$row2['ID']]["name"]=$row2['NAME'];
    	                $arr2[$row2['ID']]["cell"]=array();
    	                
    	                $User3=Bll_China::GetList(1, 999,'PID='.$row2['ID']);
    	                for($i3=0;$i3<count($User3);$i3++)
    	                {
    	                    $row3=$User3[$i3];
    	                    $arr3=$arr2[$row2['ID']]["cell"];
    	                    
    	                    $arr3[$row3['ID']]=array();
    	                    $arr3[$row3['ID']]["name"]=$row3['NAME'];
    	                    $arr3[$row3['ID']]["cell"]=array();
    	                    
    	                    $User4=Bll_China::GetList(1, 999,'PID='.$row3['ID']);
    	                    for($i4=0;$i4<count($User4);$i4++)
    	                    {
    	                        $row4=$User4[$i4];
    	                        $arr4=$arr3[$row3['ID']]["cell"];
    	                         
    	                        $arr4[$row4['ID']]=array();
    	                        $arr4[$row4['ID']]["name"]=$row4['NAME'];
    	                        $arr4[$row4['ID']]["cell"]=array();
    	                         
    	                       
    	                         
    	                        $arr3[$row3['ID']]["cell"]=$arr4;
    	                    }
    	                    
    	                    $arr2[$row2['ID']]["cell"]=$arr3;
    	                }
    	                
    	                $ReturnArr[$row1['ID']]["cell"]=$arr2;
    	            }
    	            
    	            
    	        }
    	        print_r(str_replace(',"cell":[]', '', json_encode($ReturnArr)));
    	    }
    	    //GetData();
}
    	?>











