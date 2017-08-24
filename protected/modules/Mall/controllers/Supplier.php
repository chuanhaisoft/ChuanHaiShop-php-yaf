<?php
class SupplierController extends BaseController
{
	public $defaultAction='List';
	
	public function ActionList()
	{
		SysFram::CheckPagePower('425');
		$act=Fram::GetValue("act");
		$UID=SysFram::GetLoginID();
		$flag=Fram::GetNumValue("fg",0);
		if(isset($act))
		{
			switch ($act)
			{
				case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize(&$PageNum, &$start, &$PageSize, &$PageNum);
	                $State=Fram::GetNumValue('state',-1);
	                if(SysFram::getLoginRoleID()==1||(SysFram::getLoginRoleID()==105&&$flag==0))
	                	$_where=' 1=1 ';
	                else $_where='ADD_USER='.$UID;
					$rs=Bll_Supplier::GetList($PageNum,$PageSize,$_where,$total,"*,{$UID} as LOGIN_ID,".SysFram::getLoginRoleID()." as LOGIN_ROLE_ID");
					Fram::SetRowsUserName(&$rs,'ADD_USER');
					 
					 
					echo Ext::GetJsonStr($rs,$total);
					exit();
				    break;
				case "Del":
				       
				        $ids=Fram::GetValue("IDS","");
				        if($ids != ""){
				        	$arr=explode(',', $ids);
				        	for($i=0;$i<count($arr);$i++){
				        		if($arr[$i] && is_numeric($arr[$i])){
				        			$row=Bll_Supplier::GetSingleRow("ID=".$arr[$i]);
				        			if(SysFram::getLoginRoleID()!=1&&$row['ADD_USER']!=$UID)
				        				die('无权操作');
				        			Bll_Supplier::Del($arr[$i]);
				        		}
				        	}
				        }
				        exit();
				        break;
				
			}
		}
		
		$C = "ID,NAME,MOBILE,FA_REN,SORT,ADD_USER,ADD_USER_NAME,ADD_TIME,LOGIN_ID,LOGIN_ROLE_ID";//服务商(区县)惠点,,HUI_DIAN;
		$F = "编号,,ID;名称,,NAME;手机号,,MOBILE;分类,,SORT,,-1,,STName;法人,,FA_REN;添加人,,ADD_USER_NAME;添加时间,,ADD_TIME";//
		$T ="操作::编辑@@page@@EditAddress@@'ID='@@0.9@@0.95";
		$Bar = "添加,,/css/js/ext/images/pen.gif,,GridAdd(AddAddress),,#FF0000;删除,,/css/js/ext/images/delete.gif,,ActDel()";
		
		$GridHtml = Ext::GridStr(-1,"/mall/supplier/list/", "/mall/supplier/edit.html", "/mall/supplier/add.html", "ID", "会员",$C,$F ,$T,$Bar,1,'SearchDiv');

		$this->render('list',array('GridHtml'=>$GridHtml));
	}
	
	
	
	
	public function actionAdd()
	{
	   SysFram::CheckPagePower('425');
	    $UID=SysFram::GetLoginID();
	    
		$m=new Model_Supplier();
		$m2=new Supplier();
		if(Yii::app()->request->isPostRequest)
		{
		    $F='Supplier';
			$m->Sort(Fram::GetFormNumValue($F,'SORT'));
			$m->Name(Fram::GetFormValue($F, 'NAME'));
			$m->AccType(Fram::GetFormNumValue($F,'ACC_TYPE'));
			$m->Addr(Fram::GetFormValue($F, 'ADDR'));
			$m->BankName(Fram::GetFormValue($F, 'BANK_NAME'));
			$m->BankNum(Fram::GetFormValue($F, 'BANK_NUM'));
			$m->Dmob(Fram::GetFormValue($F, 'DMOB'));
			$m->Dname(Fram::GetFormValue($F, 'DNAME'));
			$m->Smob(Fram::GetFormValue($F, 'SMOB'));
			$m->Sname(Fram::GetFormValue($F, 'SNAME'));
			$m->FaRen(Fram::GetFormValue($F, 'FA_REN'));
			$m->FrIdc(Fram::GetFormValue($F, 'FR_IDC'));
			$m->IdcPic(Fram::GetFormValue($F, 'IDC_PIC'));
			$m->HtFu(Fram::GetFormValue($F, 'HT_FU'));
			$m->HtNum(Fram::GetFormValue($F, 'HT_NUM'));
			$m->Mess(Fram::GetFormValue($F, 'MESS'));
			//$m->Mess(str_replace("'", "&#39;", $_POST['content']));
			$m->Mobile(Fram::GetFormValue($F, 'MOBILE'));
			if(!is_numeric($m->Mobile()) || strlen($m->Mobile())!=11)
			    die("parent.window.ExtAlert('请输入正确的手机号码')");
			$m->PayType(Fram::GetFormNumValue($F, 'PAY_TYPE'));
			$m->TaxNum(Fram::GetFormValue($F, 'TAX_NUM'));
			$m->TaxRate(Fram::GetFormValue($F, 'TAX_RATE'));
			$m->YyNum(Fram::GetFormValue($F, 'YY_NUM'));
			$m->YyPic(Fram::GetFormValue($F, 'YY_PIC'));
			$m->AddTime(Fram::Date());
			$m->Mid(4);
			$m->AddUser(Bll_User::GetCurrentShopID());
			
			$m->Addr(Fram::GetFormValue($F, 'ADDR'));
			
			$RecommendID=Fram::GetNumValue('RECOMMEND_ID');
		    if($RecommendID){
	    		$RecommendID=Bll_User::GetIdByCardNum($RecommendID);
	    		if(!$RecommendID || !is_numeric($RecommendID))
	    			die("parent.window.ExtAlert('无效推荐人，请重新输入。')");
	    		$Role=Bll_User::GetRoleByID($RecommendID);
	    		if($Role!=78)die("parent.window.ExtAlert('无效推荐人JS，请重新输入。')");
	    		$m->RecommendId($RecommendID);
	    	}
	    	
				

 
			 
			if(Bll_Supplier::Insert($m))
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
		
		$this->render('add',array('m'=>$m2));
	}
	
	public function actionEdit()
	{
		SysFram::CheckPagePower('425');
	    $UID=SysFram::GetLoginID();
	    
		$m=new Model_Supplier();
		$m2=new Supplier();
		$Id=Fram::GetNumValue('ID',-1);
		if(!$Id || $Id<=0)
		    die('参数错误');
		$row=Bll_Supplier::GetSingleRow("ID=".$Id);
		if(SysFram::getLoginRoleID()!=1&&$row['ADD_USER']!=$UID)
		   die('无权操作');
			
		
	    if(Yii::app()->request->isPostRequest)
		{
		    $F='Supplier';
		    $m->Id($Id);
			
		    $m->Sort(Fram::GetFormNumValue($F,'SORT'));
		    $m->Name(Fram::GetFormValue($F, 'NAME'));
		    $m->AccType(Fram::GetFormNumValue($F,'ACC_TYPE'));
		    $m->Addr(Fram::GetFormValue($F, 'ADDR'));
		    $m->BankName(Fram::GetFormValue($F, 'BANK_NAME'));
		    $m->BankNum(Fram::GetFormValue($F, 'BANK_NUM'));
		    $m->Dmob(Fram::GetFormValue($F, 'DMOB'));
		    $m->Dname(Fram::GetFormValue($F, 'DNAME'));
		    $m->Smob(Fram::GetFormValue($F, 'SMOB'));
		    $m->Sname(Fram::GetFormValue($F, 'SNAME'));
		    $m->FaRen(Fram::GetFormValue($F, 'FA_REN'));
		    $m->FrIdc(Fram::GetFormValue($F, 'FR_IDC'));
		    $m->IdcPic(Fram::GetFormValue($F, 'IDC_PIC'));
		    $m->HtFu(Fram::GetFormValue($F, 'HT_FU'));
		    $m->HtNum(Fram::GetFormValue($F, 'HT_NUM'));
		    $m->Mess(Fram::GetFormValue($F, 'MESS'));
		    //$m->Mess(str_replace("'", "&#39;", $_POST['content']));
		    $m->Mobile(Fram::GetFormValue($F, 'MOBILE'));
		    if(!is_numeric($m->Mobile()) || strlen($m->Mobile())!=11)
		    	die("parent.window.ExtAlert('请输入正确的手机号码')");
		    $m->PayType(Fram::GetFormNumValue($F, 'PAY_TYPE'));
		    $m->TaxNum(Fram::GetFormValue($F, 'TAX_NUM'));
		    $m->TaxRate(Fram::GetFormValue($F, 'TAX_RATE'));
		    $m->YyNum(Fram::GetFormValue($F, 'YY_NUM'));
		    $m->YyPic(Fram::GetFormValue($F, 'YY_PIC'));
		    
		    	
		    $m->Addr(Fram::GetFormValue($F, 'ADDR'));
		    $RecommendID=Fram::GetNumValue('RECOMMEND_ID');
		    if($RecommendID&&$row['RECOMMEND_ID']!=$RecommendID){
		    	$RecommendID=Bll_User::GetIdByCardNum($RecommendID);
		    	if(!$RecommendID || !is_numeric($RecommendID))
		    		die("parent.window.ExtAlert('无效推荐人，请重新输入。')");
		    	$Role=Bll_User::GetRoleByID($RecommendID);
		    	if($Role!=78)die("parent.window.ExtAlert('无效推荐人JS，请重新输入。')");
		    	$m->RecommendId($RecommendID);
		    }
			
			
			if(Bll_Supplier::Update($m)){
				echo "parent.window.ExtAlert('操作成功');";
			} 
			else {
				echo "parent.window.ExtAlert('操作失败');";
			}
			 
			echo Js::ParentDoView(true);
			exit();
		}
		
		$m=Bll_Supplier::GetModel($Id);
		$m2->NAME=$m->Name();
		$m2->ACC_TYPE=$m->AccType();
		$m2->ADDR=$m->Addr();
		$m2->BANK_NAME=$m->BankName();
		$m2->BANK_NUM=$m->BankNum();
		$m2->DMOB=$m->Dmob();
		$m2->DNAME=$m->Dname();
		$m2->FA_REN=$m->FaRen();
		$m2->MOBILE=$m->Mobile();
		$m2->FR_IDC=$m->FrIdc();
		$m2->HT_FU=$m->HtFu();
		$m2->HT_NUM=$m->HtNum();
		$m2->IDC_PIC=$m->IdcPic();
		$m2->MESS=$m->Mess();
		$m2->PAY_TYPE=$m->PayType();
		$m2->SMOB=$m->Smob();
		$m2->SNAME=$m->Sname();
		$m2->SORT=$m->Sort();
		$m2->TAX_NUM=$m->TaxNum();
		$m2->TAX_RATE=$m->TaxRate();
		$m2->YY_NUM=$m->YyNum();
		$m2->YY_PIC=$m->YyPic();
		$m2->MESS=$m->Mess();
		$Mess=$m->Mess();
		$this->layout="ext";
		$this->render('add',array('m'=>$m2,'Mess'=>$Mess,'rm'=>$row['RECOMMEND_ID']));
	}
	
	public function actionView()
	{
		$UID=SysFram::GetLoginID();
		$Id=Fram::GetNumValue('ID',-1);
		if(!$Id || $Id<=0)
			die('参数错误');
		$row=Bll_Supplier::GetSingleRow('ID='.$Id);
		$this->render('view',array('row'=>$row));
		
	}
	
	
	
	
}