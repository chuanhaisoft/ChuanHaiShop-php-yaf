<?php
use Pub\Fram;
use Pub\SysFram;

class SetController extends \Base\ControllerAdmin 
{
	public function Indexaction()
	{
	   SysFram::CheckPagePower(363);
	
	   $this->display_layout('index');
	}
	

	public function ParaAction()
	{
	    SysFram::CheckPagePower(363);
	    $Group=Fram::GetValue('group',1);
	    $m=new \Model\Pub();
	    $m->IsEdit(1);
	    $m->GroupId($Group);
	    $t=0;
	    $rows=Bll\Pub::GetList(1,999, [$m->_IsEdit->w(),$m->_GroupId->w_and()],$t,'',$m->_PubId->k.' asc');
	    if(Fram::IsPost())
	    {
	        foreach ($_POST as $key => $value) 
	        {
	            if(is_numeric($key))
	            {
	                Bll\Pub::Set($key, Fram::StrCheck($value));
	            }
	        }
	        die("parent.window.ExtAlert('操作成功！')");
	    }
	    
	    $this->display_layout('para',array('rows'=>$rows));
	}
	
	
	
	
	
	
	
	
}