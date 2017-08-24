<?php
class Tui_charController extends \Base\ControllerAdmin
{
    public function ActionList()
	{
// 		SysFram::CheckPagePower(388);
		$ProID=Fram::GetNumValue('ID',-1);
		$UID = $UID=SysFram::GetLoginID();
		
    	$PageNum=Fram::GetNumValue('page',1);;
    	$start=0;
    	$PageSize=10;
    	$total=0;
        
    	$w="ORDER_DETAIL_ID={$ProID} ";
    	$rs=Bll_OrderTuiChar::GetList($PageNum,$PageSize,$w,$total,"*",'ADD_TIME DESC');
    	//Fram::SetRowsUserName(&$rs,'USER_ID');
    	Fram::SetRowsUserName(&$rs,'USER_ID',true);
    	
    	
    	foreach ($rs as $key => $v){
    	    if($v['USER_ID']==$UID){
    	        $rs[$key]['USER_ID_NAME'] = '您';
    	    }
    	}
    	
		$data['m'] =  new OrderTuiChar();;
		$data['list'] = $rs;
		$data['PageNum'] = $PageNum;
		$data['PageSize'] = $PageSize;
		$data['total'] = $total;
		$data['ProID'] = $ProID;
		
		$this->layout="ext";
		$this->render('list',$data);

	}
	
	public function actionAdd_edit()
	{
// 	    SysFram::CheckPagePower(388);
	    $UID=SysFram::GetLoginID();
	    
	    $MESS=Fram::GetValue('OrderTuiChar[MESS]');
	    $ORDER_DETAIL_ID=Fram::GetNumValue('ID');
	    if($ORDER_DETAIL_ID<=0)
	        die("alert('订单id缺失!')");
	    
	    if(Yii::app()->request->isPostRequest)
	    {
	        $F='OrderTuiChar';
	        $m=new Model_OrderTuiChar();
	        $m->UserId($UID);
	        $m->GetForm($_POST[$F]);
	        $m->OrderDetailId($ORDER_DETAIL_ID);
	        $m->AddTime(Fram::Date());
	       
	        Fram::SetChanged($m->_Mess);
	        
            if(Bll_OrderTuiChar::Insert($m))
            {
                echo ("alert('操作成功!');location.href='/mall/tui_char/list.html?ID={$ORDER_DETAIL_ID}';");
            }
            else
            {
                echo ("alert('操作失败!');");
            }
	       

	        exit();
	    }
	}
	
	
}
