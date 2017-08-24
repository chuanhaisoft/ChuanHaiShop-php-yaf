<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class UserController extends \Base\ControllerAdmin
{
    
    public function EditAction()
	{
	    $UID=SysFram::GetLoginID();
	    $ID=$UID;
	    if(!$ID || !is_numeric($ID))
	        die("ID错误！");
	    
	    if(Fram::IsPost())
	    {
	        $m=new Model\User();
	        $m->getPost();
	        $m->Id($ID);
	        $m->_Email->SetChanged();
	        
	        if(Fram::IsNotEmpty($m->LoginPass()))
	        {
	            if($m->LoginPass() != $m->City())
	                die("parent.window.ExtAlert('2次密码输入不一致！');");
	            $m->_LoginPass->SetChanged();
	        }
	        
	        if($m->ValidateModel())
	        {
	           $m->Update();
	           echo "parent.window.ExtAlert('操作成功！');";
	        }
	        else
	        {
	           echo "parent.window.ExtAlert('操作失败！');";
	        }
	        exit();
	    }
	    
	    $m=Bll\User::Model($ID);
	    $m->LoginPass('');$m->City('');
	    $t=0;
	    //$China=\Bll\China::GetList(1,2000,null,$t,null);
	    
	    $this->display('edit',array('m'=>$m));
	}

	
}