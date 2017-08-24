<?php
use Pub\SysFram;
use Pub\Fram;

class UserroleController extends yaf\Controller_Abstract
{
	public function EditAction()
	{
	    SysFram::CheckPagePower(372);$UID=SysFram::GetLoginID();
	    $ID=Fram::GetNumValue('ID',-1);
	    if(!$ID || !is_numeric($ID))
	        die("ID错误！");
	    
	    if(Fram::IsPost())
	    {
	        $m=new Model\User();
	        $m->getPost();
	        $m->Id($ID);
	        
	        $m->_LoginName->SetChanged();
	        $c=Bll\User::Column(null,'count(1)',[$m->_LoginName->w('=',$m->LoginName()),$m->_Id->w_and('<>',$UID)]);
	        if($c>0)
	            die("parent.window.ExtAlert('此登录名已经占用！');");
	        $m->_Name->SetChanged();
	        $m->_Address->SetChanged();
	        if(Fram::IsNotEmpty($m->LoginPass()))
	           $m->_LoginPass->SetChanged();
	        $m->_State->SetChanged();
	        
	        if($m->ValidateModel() && $m->Update())
	        {
	           echo Pub\Js::ParentDoView(true);
	           echo "parent.window.ExtAlert('操作成功！');";
	        }
	        else
	        {
	           echo "parent.window.ExtAlert('操作失败！');";
	        }
	        exit();
	    }
	    
	    $m=Bll\User::Model($ID);
	    $m->LoginPass('');
	    
	    $this->display('add',array('m'=>$m));
	}
	
	public function AddAction()
	{
	    SysFram::CheckPagePower(372);$UID=SysFram::GetLoginID();
	    if(Fram::IsPost())
	    {
	        $m=new Model\User();
	        $m->getPost();
	         
	        $m->_LoginName->SetChanged();
	        $m->_Name->SetChanged();
	        $m->_LoginPass->SetChanged();
	        $m->_State->SetChanged();
	        $m->RoleId(1);
	        
	        $c=Bll\User::Column(null,'count(1)',[$m->_LoginName->w('=',$m->LoginName())]);
	        if($c>0)
	            die("parent.window.ExtAlert('此登录名已经占用！');");
	         
	        if($m->ValidateModel() && $m->Insert())
	        {
	            echo "document.getElementById('chuan_hai_form1').reset();";
	            echo Pub\Js::ParentDoView(true);
	            echo "parent.window.ExtAlert('操作成功！');";
	        }
	        else
	        {
	            echo "parent.window.ExtAlert('操作失败！');";
	        }
	        exit();
	    }
	     
	    $m=new Model\User();
	    $m->State(1);
	    
	    $this->display('add',array('m'=>$m));
	}
	
}
