<?php
class WarehouseController extends BaseController
{
	public $defaultAction='List';
	
	public function ActionList()
	{
		SysFram::CheckPagePower('426');
		$act=Fram::GetValue("act");
		$flag=Fram::GetNumValue("fg",0);
		$UID=SysFram::GetLoginID();
		if(isset($act))
		{
			switch ($act)
			{
				case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize(&$PageNum, &$start, &$PageSize, &$PageNum);
	                
	               if(SysFram::getLoginRoleID()==1||(SysFram::getLoginRoleID()==105&&$flag==0))
	                	$_where=' 1=1 ';
	                else $_where='ADD_USER='.$UID;
					$rs=Bll_ProWarehouse::GetList($PageNum,$PageSize,$_where,$total,"*");
					Fram::SetRowsUserName(&$rs,'ADD_USER');
					 
					 
					echo Ext::GetJsonStr($rs,$total);
					exit();
				    break;
				case "Del":
				       
				        $ids=Fram::GetValue("IDS","");
				        if($ids != ""){
				        	 Bll_ProWarehouse::DelRows($ids);
				        }
				        exit();
				        break;
				
			}
		}
		
		$C = "ID,NAME,FU_ZE_REN,TEL,ADD_USER,ADD_USER_NAME,ADD_TIME";
		$F = "编号,,ID;名称,,NAME;负责人,,FU_ZE_REN;手机号,,TEL;添加人,,ADD_USER_NAME;添加时间,,ADD_TIME";//
		$T ="操作::编辑@@page@@EditAddress@@'ID='@@500@@450";
		$Bar = "添加,,/css/js/ext/images/pen.gif,,GridAdd(AddAddress),,#FF0000;删除,,/css/js/ext/images/delete.gif,,ActDel()";
		
		$GridHtml = Ext::GridStr(-1,"/mall/warehouse/list/", "/mall/warehouse/edit.html", "/mall/warehouse/add.html", "ID", "会员",$C,$F ,$T,$Bar,1,'SearchDiv');

		$this->render('list',array('GridHtml'=>$GridHtml));
	}
	
	
	
	
	public function actionAdd()
	{
	    SysFram::CheckPagePower('426');
	    $UID=SysFram::GetLoginID();
	    
		
		if(Yii::app()->request->isPostRequest)
		{
		    $m=new Model_ProWarehouse();
		    $m->Name(Fram::GetValue('NAME'));
		    if(!$m->Name())
		    	die("parent.window.ExtAlert('名称不为空')");
		    $m->FuZeRen(Fram::GetValue('FZR'));
		    if(!$m->FuZeRen())
		       die("parent.window.ExtAlert('负责人不为空')");
		    $m->Tel(Fram::GetNumValue('TEL'));
		    if(!is_numeric($m->Tel()) || strlen($m->Tel())!=11)
		    	die("parent.window.ExtAlert('请输入正确的手机号码')");
		    $m->Mess(Fram::GetValue('MESS'));
		    $m->Addr(Fram::GetValue('ADDR'));
			$m->AddTime(Fram::Date());
			$m->State(1);
			$m->AddUser(Bll_User::GetCurrentShopID());
			
			
 
			 
			if(Bll_ProWarehouse::Insert($m))
			{
			    
			    
				echo "parent.window.ExtAlert('操作成功');document.getElementById('ejsvformid1').reset(); ";//
			}
			else 
			{
			     
				echo "parent.window.ExtAlert('操作失败');";
			}
			 
			echo Js::ParentDoView(true);
			exit();
		}
		$this->layout="ext";
		
		$this->render('edit');
	}
	
	public function actionEdit()
	{
	    $UID=SysFram::GetLoginID();
	    SysFram::CheckPagePower('426');
		 
		$Id=Fram::GetNumValue('ID',-1);
		if(!$Id || $Id<=0)
		    die('参数错误');
		$row=Bll_ProWarehouse::GetSingleRow("ID=".$Id);
		if(SysFram::getLoginRoleID()!=1&&$row['ADD_USER']!=$UID)
		   die('无权操作');
			
		
	    if(Yii::app()->request->isPostRequest)
		{
		   
		    $m=new Model_ProWarehouse();
		    $m->Id($Id);
		    $m->Name(Fram::GetValue('NAME'));
		    if(!$m->Name())
		    	die("parent.window.ExtAlert('名称不为空')");
		    $m->FuZeRen(Fram::GetValue('FZR'));
		    die("parent.window.ExtAlert('负责人不为空')");
		    $m->Tel(Fram::GetNumValue('TEL'));
		    if(!is_numeric($m->Tel()) || strlen($m->Tel())!=11)
		    	die("parent.window.ExtAlert('请输入正确的手机号码')");
		    $m->Mess(Fram::GetValue('MESS'));
		    $m->Addr(Fram::GetValue('ADDR'));
			
			if(Bll_ProWarehouse::Update($m)){
				echo "parent.window.ExtAlert('操作成功');";
			} 
			else {
				echo "parent.window.ExtAlert('操作失败');";
			}
			 
			echo Js::ParentDoView(true);
			exit();
		}
		
		
		$this->layout="ext";
		$this->render('edit',array('row'=>$row));
	}
	
	 
	
	
	
	
}