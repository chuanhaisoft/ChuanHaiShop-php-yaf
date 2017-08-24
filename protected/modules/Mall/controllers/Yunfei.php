<?php
use \Pub\Fram;
use \Pub\SysFram;

class YunfeiController extends \Base\ControllerAdmin
{
    public function ListAction()
	{
		SysFram::CheckPagePower(388);
		$m=new \Model\ProYunFei();
		$act=Fram::GetValue("act");
		if(isset($act))
		{
			switch ($act)
			{
				case "List":
					$PageNum=0;$start=0;$PageSize=0;$total=0;
	                \Pub\Ext::InitPageSize($PageNum, $start, $PageSize);
	                //$State=Fram::GetNumValue('state',-1);
	                
					$w=[$m->_UserId->w('=',SysFram::GetLoginID())];//Bll_User::IsShopManager(SysFram::GetLoginID())?'':
					
					$rs=Bll\ProYunFei::GetList($PageNum,$PageSize,$w,$total,"*");
					//Fram::SetRowsUserName(&$rs,'USER_ID');
					echo \Pub\Ext::GetJsonStr($rs,$total);
					exit();
				    break;
				
				case "Del":
					$ids=Fram::GetValue("IDS","");
					if($ids != "")
					{
						//Bll_News::DelRows($ids);
					}
					
					exit();
				break;
			}
		}
		
		$C = "ID,NAME,USER_ID,PRICE,PRICE_COUNT,PRICE_NEXT";
		$F = "产品名称,,NAME,,-1,,-1,,left;基本运费,,PRICE,,-1,,-1,,right;包含件数,,PRICE_COUNT;续件费用,,PRICE_NEXT";//,,ZhuangTai
		$T = "操作::编 辑@@page@@EditAddress@@'ID='@@700@@350;;设置省份运费@@page@@'/mall/yunfeidetail/list.html'@@'ID='@@820@@600";
		$Bar = "添加运费,,/css/js/ext/images/pen.gif,,GridAdd(AddAddress),,#FF0000";//.(Bll_User::IsShopManager(SysFram::GetLoginID())?';删除产品,,/css/js/ext/images/delete.gif,,ActDel();':'');
		$GridHtml = \Pub\Ext::GridStr(-1,Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html", "ID", "名",$C,$F ,$T,$Bar,1);
		
		
		$this->display_layout('list',array('GridHtml'=>$GridHtml));

	}
	
	public function AddAction()
	{
	    SysFram::CheckPagePower(388);
	    $UID=SysFram::GetLoginID();
	    
	    $m=new Model\ProYunFei();
	    if(Fram::IsPost())
	    {
	        $m->getPost();
	        $m->UserId($UID);
	        
	        Fram::SetChanged($m->_Name);
	        Fram::SetChanged($m->_Price);
	        Fram::SetChanged($m->_PriceCount);
	        Fram::SetChanged($m->_PriceNext);
	        Fram::SetChanged($m->_NextCount);
	        Fram::SetChanged($m->_BaoYouCount);
	        
	        if(!Fram::CheckNum($m->BaoYouCount())){
	            $m->BaoYouCount(-1);
	        }
	     
	        
	        $DiQu=Fram::GetValue('sheng_shi_qu_select_ids','');
	        if($DiQu && strlen($DiQu)>1)
	        {
	            $DiQu=explode(',', $DiQu);
	            if(is_array($DiQu) && count($DiQu)>=2 && is_numeric($DiQu[0]) && is_numeric($DiQu[1]))
	            {
	                $m->Sheng($DiQu[0]);
	                $m->Shi($DiQu[1]);
	                if(count($DiQu)>=3 && is_numeric($DiQu[2]))
	                    $m->Qu($DiQu[2]);
	                if(count($DiQu)>=4 && is_numeric($DiQu[3]))
	                    $m->Xian($DiQu[3]);
	            }
	            else 
	                die("parent.window.ExtAlert('请选择产品所在地区。');");
	        }
	        else 
	            die("parent.window.ExtAlert('请选择产品所在地区。');");
	        
	        if($m->Name()=='')
	            die("parent.window.ExtAlert('请输入运费名称。');");
	        if(!Bll\Pro::CheckPriceNum($m->Price()))
	            die("parent.window.ExtAlert('运费价格错误。');");
	        if(!Bll\Pro::CheckPriceNum($m->PriceCount()) || $m->PriceCount()===0)
	            die("parent.window.ExtAlert('件数错误。');");
	        if(!Bll\Pro::CheckPriceNum($m->PriceNext()))
	            die("parent.window.ExtAlert('续件运费价格错误。');");
	        if(!Bll\Pro::CheckPriceNum($m->NextCount()) || $m->NextCount()===0)
	            die("parent.window.ExtAlert('续数错误。');");
	        
	        if($m->ValidateModel() && Bll\ProYunFei::Insert($m))
	        {
	            echo ("parent.window.ExtAlert('操作成功。');document.getElementById('chuan_hai_form1').reset();");
	            echo Pub\Js::ParentDoView(true);
	        }
	        else 
	        {
	            echo ("parent.window.ExtAlert('操作失败。');");
	        }
	        exit();
	    }
	    
	    $m->NextCount(1);
	    $m->PriceCount(1);
	    
	    $this->display_layout('add',['m'=>$m]);
	}
	
	public function EditAction()
	{
	    SysFram::CheckPagePower(388);
	    $UID=SysFram::GetLoginID();
	    $ProID=Fram::GetNumValue('ID',-1);
	    
	    $m=new Model\ProYunFei();
	    
	    if(Fram::IsPost())
	    {
	        $m->getPost();
	        $m->Id($ProID);
	        Fram::SetChanged($m->_Name);
	        Fram::SetChanged($m->_Price);
	        Fram::SetChanged($m->_PriceCount);
	        Fram::SetChanged($m->_PriceNext);
	        Fram::SetChanged($m->_NextCount);
	        Fram::SetChanged($m->_BaoYouCount);
	        
	        if(!Fram::CheckNum($m->BaoYouCount())){
	            $m->BaoYouCount(-1);
	        }
	        
	        $DiQu=Fram::GetValue('sheng_shi_qu_select_ids','');
	        if($DiQu && strlen($DiQu)>1)
	        {
	            $DiQu=explode(',', $DiQu);
	        	            if(is_array($DiQu) && count($DiQu)>=2 && is_numeric($DiQu[0]) && is_numeric($DiQu[1]))
	            {
	                $m->Sheng($DiQu[0]);
	                $m->Shi($DiQu[1]);
	                if(count($DiQu)>=3 && is_numeric($DiQu[2]))
	                    $m->Qu($DiQu[2]);
	                if(count($DiQu)>=4 && is_numeric($DiQu[3]))
	                    $m->Xian($DiQu[3]);
	            }
	            else 
	                die("parent.window.ExtAlert('请选择产品所在地区。');");
	        }
	        else 
	            die("parent.window.ExtAlert('请选择产品所在地区。');");
	        
	        if($m->Name()=='')
	            die("parent.window.ExtAlert('请输入运费名称。');");
	        if(!Bll\Pro::CheckPriceNum($m->Price()))
	            die("parent.window.ExtAlert('运费价格错误。');");
	        if(!Bll\Pro::CheckPriceNum($m->PriceCount()) || $m->PriceCount()===0)
	            die("parent.window.ExtAlert('件数错误。');");
	        if(!Bll\Pro::CheckPriceNum($m->PriceNext()))
	            die("parent.window.ExtAlert('续件运费价格错误。');");
	        if(!Bll\Pro::CheckPriceNum($m->NextCount()) || $m->NextCount()===0)
	            die("parent.window.ExtAlert('续数错误。');");
	        
	        if($m->ValidateModel() && Bll\ProYunFei::Update($m,[$m->_UserId->w('=',$UID)]))
	        {
	            echo ("parent.window.ExtAlert('操作成功。');");
	            echo Pub\Js::ParentDoView(true);
	        }
	        else 
	        {
	            echo ("parent.window.ExtAlert('操作失败。');");
	        }
	        exit();
	    }
	    $m=Bll\ProYunFei::Model($ProID);
	    
	    $this->display_layout('add',['m'=>$m]);
	}
	
}
