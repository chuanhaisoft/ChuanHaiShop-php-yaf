<script src="/js/xiala/js/comm.js"></script>
<script src="/js/xiala/js/linkagesel-min.js"></script>


<select id="fu_wu_shang"></select>
<input type="hidden" name="fuwushang" id="fuwushang">
<script>
var linkageSel1;
$(document).ready(function(){
    var data1 = <?php 
    	    
    	    function GetData()
    	    {
    	        $ReturnArr=array();
    	        $User1=Bll_User::GetList(1, 999,'ROLE_ID=82');
    	        for($i1=0;$i1<count($User1);$i1++)
    	        {
    	            $row1=$User1[$i1];
    	            $ReturnArr[$row1['ID']]=array();
    	            $ReturnArr[$row1['ID']]["name"]=$row1['NAME'];
    	            $ReturnArr[$row1['ID']]["cell"]=array();
    	            $User2=Bll_User::GetList(1, 999,'ROLE_ID=83 and LEVEL1='.$row1['ID']);
    	            for($i2=0;$i2<count($User2);$i2++)
    	            {
    	                $row2=$User2[$i2];
    	                $arr2=$ReturnArr[$row1['ID']]["cell"];
    	                
    	                $arr2[$row2['ID']]=array();
    	                $arr2[$row2['ID']]["name"]=$row2['NAME'];
    	                $arr2[$row2['ID']]["cell"]=array();
    	                
    	                $User3=Bll_User::GetList(1, 999,'ROLE_ID=84 and LEVEL2='.$row2['ID']);
    	                for($i3=0;$i3<count($User3);$i3++)
    	                {
    	                    $row3=$User3[$i3];
    	                    $arr3=$arr2[$row2['ID']]["cell"];
    	                    
    	                    $arr3[$row3['ID']]=array();
    	                    $arr3[$row3['ID']]["name"]=$row3['NAME'];
    	                    $arr3[$row3['ID']]["cell"]=array();
    	                    
    	                    $User4=Bll_User::GetList(1, 999,'ROLE_ID=85 and LEVEL3='.$row3['ID']);
    	                    for($i4=0;$i4<count($User4);$i4++)
    	                    {
    	                        $row4=$User4[$i4];
    	                        $arr4=$arr3[$row3['ID']]["cell"];
    	                        
    	                        $arr4[$row4['ID']]=array();
    	                        $arr4[$row4['ID']]["name"]=$row4['NAME'];
    	                        $arr4[$row4['ID']]["cell"]=array();
    	                        
    	                        $User5=Bll_User::GetList(1, 999,'ROLE_ID=86 and LEVEL4='.$row4['ID']);
    	                        for($i5=0;$i5<count($User5);$i5++)
    	                        {
    	                            $row5=$User5[$i5];
    	                            $arr5=$arr4[$row4['ID']]["cell"];
    	                            
    	                            $arr5[$row5['ID']]=array();
    	                            $arr5[$row5['ID']]["name"]=$row5['NAME'];
    	                            
    	                            $arr4[$row4['ID']]["cell"]=$arr5;
    	                        }
    	                        
    	                        $arr3[$row3['ID']]["cell"]=$arr4;
    	                    }
    	                    
    	                    $arr2[$row2['ID']]["cell"]=$arr3;
    	                }
    	                
    	                $ReturnArr[$row1['ID']]["cell"]=$arr2;
    	            }
    	            
    	            
    	        }
    	        

    	        
    	      print_r(str_replace(',"cell":[]', '', json_encode($ReturnArr)));
    	    }
    	    GetData();
    	?>;
    var opts = {
            data: data1,
            select: '#fu_wu_shang',
            head: false,
            defVal: [3]
    };
    linkageSel1 = new LinkageSel(opts);
    
    linkageSel1.onChange(function() {
    	var arr = linkageSel1.getSelectedArr();
    	$('#fuwushang').val(arr.join(','));
    });
});
</script>













