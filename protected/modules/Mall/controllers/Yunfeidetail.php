<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class YunfeidetailController extends \Base\ControllerAdmin
{
    public function ListAction()
	{
		SysFram::CheckPagePower(388);
		$ProID=Fram::GetNumValue('ID',-1);
		$act=Fram::GetValue("act");
		
		$m=new \Model\ProYunFeiDetail();
		
		if(isset($act))
		{
			switch ($act)
			{
				case "List":
					$PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
	                //$State=Fram::GetNumValue('state',-1);
	                
					$w=[$m->_YunFeiId->w('=',$ProID),$m->_UserId->w_and('=',SysFram::GetLoginID())];//"YUN_FEI_ID={$ProID} and USER_ID=".SysFram::GetLoginID();
					$rs=Bll\ProYunFeiDetail::GetList($PageNum,$PageSize,$w,$total,"*");
					for($i=0;$i<count($rs);$i++)
					{
					    $rs[$i]['NAME']=\Bll\China::Column($rs[$i]['AREA_ID'],'NAME');
					}
					echo Ext::GetJsonStr($rs,$total);
					exit();
				    break;
				
				case "Del":
					$ids=Fram::GetValue("IDS","");
					if($ids != "")
					{
						Bll\ProYunFeiDetail::DelWhere([$m->_Id->w('=',$ids),$m->_UserId->w_and('=',SysFram::GetLoginID())]);
					}
					
					exit();
				break;
			}
		}
		
		$C = "ID,NAME,USER_ID,PRICE,PRICE_COUNT,PRICE_NEXT,NEXT_COUNT,AREA_ID,BAO_YOU_COUNT";
		$F = "城市,,NAME;运费,,PRICE,,-1,,-1,,right;包含件数,,PRICE_COUNT;续件费用,,PRICE_NEXT;续件个数,,NEXT_COUNT;操作,,ID,,-1,,BianJi";//,,ZhuangTai
		$T = "";//操作::编 辑@@page@@EditAddress@@'ID='@@700@@350
		$Bar = "删 除,,/css/js/ext/images/delete.gif,,ActDel()";
		$GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html", "ID", "名",$C,$F ,$T,$Bar,0.98,'SearchDiv');
		
		$this->display_layout('list',array('GridHtml'=>$GridHtml,'m'=>$m));

	}
	
	public function AddeditAction()
	{
	    SysFram::CheckPagePower(388);
	    $UID=SysFram::GetLoginID();
	    
	    $yun_fei_id=Fram::GetNumValue('yun_fei_id');
	    $DetailID=Fram::GetNumValue('DetailID');
	    if($yun_fei_id<=0)
	        die("parent.window.ExtAlert('yun_fei_id缺失');");
	    
	    if(\Pub\Fram::IsPost())
	    {
	        $DiQu_Str=Fram::GetArrayValue('sheng_checkbox');
	        
	        $DIQU_Array = explode(',',$DiQu_Str);
	        
	        $re_mes = '';

	        
	        foreach ($DIQU_Array as $DiQu)
	        {
	            $m=new Model\ProYunFeiDetail();
	            $m->getPost();
	            $m->UserId($UID);
	            $m->YunFeiId($yun_fei_id);
	             
	            Fram::SetChanged($m->_Price);
	            Fram::SetChanged($m->_PriceCount);
	            Fram::SetChanged($m->_PriceNext);
	            Fram::SetChanged($m->_NextCount);
	            Fram::SetChanged($m->_BaoYouCount);
	             
	            if(!Fram::CheckNum($m->BaoYouCount())){
	                $m->BaoYouCount(-1);
	            }
	             
	             
// 	            $DiQu=Fram::GetValue('sheng_shi_qu_select_ids','');
	            if($DiQu && Fram::CheckNum($DiQu))
	            {
	                $t=Bll\ProYunFeiDetail::Column(null,'count(1)', [$m->_YunFeiId->w('=',$yun_fei_id),$m->_AreaId->w_and('=',$DiQu)]);
	                if($DetailID>0)
	                    $t=Bll\ProYunFeiDetail::Column(null,'count(1)', [$m->_YunFeiId->w('=',$yun_fei_id),$m->_AreaId->w_and('=',$DiQu),$m->_Id->w_and('<>',$DetailID)]);
	                //var_dump($DetailID>0);
	                if($t>0)
	                    die("parent.window.ExtAlert('存在已经添加过的省份。');");
	                $m->AreaId($DiQu);
	            }
	            else
	                die("parent.window.ExtAlert('请选择价格省份。');");
	             
	            if(!Bll\Pro::CheckPriceNum($m->Price()))
	                die("parent.window.ExtAlert('运费价格错误。');");
	            if(!Bll\Pro::CheckPriceNum($m->PriceCount()) || $m->PriceCount()===0)
	                die("parent.window.ExtAlert('件数错误。');");
	            if(!Bll\Pro::CheckPriceNum($m->PriceNext()))
	                die("parent.window.ExtAlert('续件运费价格错误。');");
	            if(!Bll\Pro::CheckPriceNum($m->NextCount()) || $m->NextCount()===0)
	                die("parent.window.ExtAlert('续数错误。');");
	            
	            if($DetailID<=0)
	            {
	                if($m->ValidateModel() && Bll\ProYunFeiDetail::Insert($m))
	                {
	                    $re_mes ="parent.window.ExtAlert('操作成功。');document.getElementById('chuan_hai_form1').reset();DoView();";
	                   
	                }
	                else
	                {
	                    echo ("parent.window.ExtAlert('操作失败。');");
	                    die();
	                }
	            }
	            else
	            {
	                Fram::SetChanged($m->_YunFeiId,false);
	                Fram::SetChanged($m->_UserId,false);
	                $m->Id($DetailID);
	                if($m->ValidateModel() && Bll\ProYunFeiDetail::Update($m,[$m->_UserId->w('=',SysFram::GetLoginID())]))
	                {
	                    $re_mes = "parent.window.ExtAlert('操作成功。');setValue('DetailID',-1);document.getElementById('chuan_hai_form1').reset();DoView();";
	                }
	                else
	                {
	                    echo ("parent.window.ExtAlert('操作失败。');");
	                    die();
	                }
	            }
	            
	            
	            
	        }
	        
	        echo  $re_mes; 
	        

	        exit();
	    }
	}
	
	
}
