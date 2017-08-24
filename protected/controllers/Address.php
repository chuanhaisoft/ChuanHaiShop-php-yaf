<?php
use Pub\SysFram;
use Pub\Fram;

class AddressController extends \Base\ControllerUser
{
	public function GetAction()
	{
		$id = Fram::GetNumValue('id');
		$userid = SysFram::GetLoginID();
		$m = new Model\ShoppingAddress();
		$w[] = $m->_Id->w('=',$id);
		$w[] = $m->_UserId->w_and('=',$userid);
		if (!Bll\ShoppingAddress::Row(null,$w)) {
			$this->show(array('error'=>'1', 'mess'=>'用户错误！'));
		}
		$w = [$m->_Id->w('=',$id)];
		$row = Bll\ShoppingAddress::Row(null,$w);
		$this->show(array('error'=>'0','data'=>$row));
	}
	
	
	public function DeleteAction()
	{
		$id = Fram::GetNumValue('id');
		$m=new \Model\ShoppingAddress();
		if (Bll\ShoppingAddress::Del($id,null,[$m->_UserId->w('=',SysFram::GetLoginID())]))
		{
			$res['error'] = 0;
			$res['mess'] = '删除成功！';
		}
		else 
		{
			$res['error'] = 1;
			$res['mess'] = '删除失败！';
		}
		$this->show($res);
	}
	

	private function show($data)
	{
		die(json_encode($data));
	}
	
	public function AddAction()
	{
	    $ID=Fram::GetNumValue('id',-1);
	    $m=new \Model\ShoppingAddress();
	    if(Fram::IsPost())
	    {
	        $m->getPost();
	        if(Fram::CheckNum($ID))
	            $m->Id($ID);
	        $m->_Address->SetChanged();
	        $m->_UserName->SetChanged();
	        $m->_UserTel->SetChanged();
	        $m->_YouBian->SetChanged();
	        $area=Fram::GetValue('sheng_shi_qu_select_ids');
	        if($area)
	            $area=explode(',', $area);
	        if(!is_array($area) || count($area)<2)
	            die(Pub\Js::Alert('请选择省市区'));
	         
	        $m->Isdefault($m->Isdefault()==1?1:0);
	         
	        $m->Sheng($area[0]);
	        $m->Shi($area[1]);
	        $m->ShengName(Bll\China::IdToName($area[0]));
	        $m->ShiName(Bll\China::IdToName($area[1]));
	        $m->AddTime(Fram::Date());
	         
	        if(isset($area[2]))
	        {
	            $m->Qu($area[2]);
	            $m->QuName(Bll\China::IdToName($area[2]));
	        }
	         
	        $m->UserId(SysFram::GetLoginID());
	        if($m->Isdefault()==1)
	        {
	            $row=Bll\ShoppingAddress::GetList(1, 100,[$m->_UserId->w('=',SysFram::GetLoginID()),$m->_Isdefault->w_and('=',1)]);
	            foreach($row as $v)
	            {
	                $up=new Model\ShoppingAddress();
	                $up->Id($v['ID']);
	                $up->Isdefault(0);
	                $up->Update();
	            }
	        }
	        if(Fram::CheckNum($ID)?$m->Update([$m->_UserId->w('=',SysFram::GetLoginID())]):$m->Insert())
	            die(Pub\Js::WindowReLoad(true).Pub\Js::LayerCloseIframe(true));
	        else
	            die(Pub\Js::Alert('操作失败'));
	    }
	    
	    if(Fram::CheckNum($ID))
	        $m=Bll\ShoppingAddress::Model($ID);
	    
	    $this->display_layout('add',['m'=>$m]);
	}
}