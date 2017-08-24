<script src="/js/xiala/js/comm.js"></script>
<script src="/js/xiala/js/linkagesel-min.js"></script>
<?php
    $Sign='mall_sort_select';
?>
<span id="span_<?php echo $Sign; ?>">
<select id="<?php echo $Sign; ?>"></select>
<input type="hidden" name="<?php echo $Sign; ?>_ids" id="<?php echo $Sign; ?>_ids">
<script>
var linkageSel1;
$(document).ready(function(){
    var data1 = <?php 

    	    function GetData()
    	    {
    	        $ReturnArr=array();
//     	        $User1=Bll_MallSort::GetList(1, 999,'PARENT_ID=0');
    	        $User1  = array();
    	        $All_Sort = Bll_MallSort::GetList(1, 1000000,'');
    	        foreach ($All_Sort as $v)
    	        {
    	            if($v['PARENT_ID']==0)
    	            {
    	                $User1[] = $v;
    	            }
    	        }
    	        
    	        for($i1=0;$i1<count($User1);$i1++)
    	        {
    	            $row1=$User1[$i1];
    	            $ReturnArr[$row1['ID']]=array();
    	            $ReturnArr[$row1['ID']]["name"]=$row1['NAME'];
    	            $ReturnArr[$row1['ID']]["cell"]=array();
//     	            $User2=Bll_MallSort::GetList(1, 999,'PARENT_ID='.$row1['ID']);
    	            $User2=array();
    	            foreach ($All_Sort as $v)
    	            {
    	                if($v['PARENT_ID']==$row1['ID'])
    	                {
    	                    $User2[] = $v;
    	                }
    	            }
    	            for($i2=0;$i2<count($User2);$i2++)
    	            {
    	                $row2=$User2[$i2];
    	                
    	                $ReturnArr[$row1['ID']]["cell"][$row2['ID']]=array();
    	                $ReturnArr[$row1['ID']]["cell"][$row2['ID']]["name"]=$row2['NAME'];
    	                $ReturnArr[$row1['ID']]["cell"][$row2['ID']]["cell"]=array();
//     	                $User3=Bll_MallSort::GetList(1, 999,'PARENT_ID='.$row2['ID']);
    	                $User3=array();
    	                foreach ($All_Sort as $v)
    	                {
    	                    if($v['PARENT_ID']==$row2['ID'])
    	                    {
    	                        $User3[] = $v;
    	                    }
    	                }
    	                for($i3=0;$i3<count($User3);$i3++)
    	                {
    	                    $row3=$User3[$i3];
    	                     
    	                    $ReturnArr[$row1['ID']]["cell"][$row2['ID']]["cell"][$row3['ID']]=array();
    	                    $ReturnArr[$row1['ID']]["cell"][$row2['ID']]["cell"][$row3['ID']]["name"]=$row3['NAME'];
    	                    $ReturnArr[$row1['ID']]["cell"][$row2['ID']]["cell"][$row3['ID']]["cell"]=array();
    	                }
    	                
    	              
    	            }
    	            

    	        }
    	        

    	      
    	      print_r(str_replace(',"cell":[]', '', json_encode($ReturnArr)));
    	    }
    	    GetData();
    	?>;
    var opts = {
            data: data1,
            //root: [1],
            select: '#<?php echo $Sign; ?>',
            selStyle: 'margin-left: 6px;',
            head: '请选择分类',
            defVal:[<?php echo $value?$value:0; ?>]
    };
    linkageSel1 = new LinkageSel(opts);
    //linkageSel1.changeValues([<?php echo $value?$value:0; ?>]);
    linkageSel1.onChange(function() {
    	var arr = linkageSel1.getSelectedArr();
    	$('#<?php echo $Sign; ?>_ids').val(arr.join(','));
    	<?php  if($OnChange)echo $OnChange;  ?>
    	<?php echo isset($onlyread) && $onlyread==true?"$('#span_mall_sort_select select').attr('disabled',true);":""; ?>
    });
});
</script>

</span>











