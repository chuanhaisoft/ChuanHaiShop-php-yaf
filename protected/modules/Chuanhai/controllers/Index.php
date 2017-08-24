<?php
use Pub\SysFram;
use Pub\Fram;

class IndexController extends yaf\Controller_Abstract 
{
    public function IndexAction()
    {
        SysFram::CheckAdminLogin();
        $this->display('admin');
    }
    
    public function AdminAction()
    {
        SysFram::CheckAdminLogin();
        $this->display('admin');
    }
    
    public function DesktopAction()
    {
        	
        SysFram::CheckAdminLogin();
        $RoleID=SysFram::getLoginRoleID();
        $View='desktop';
         
        $row=Dal\User::Row(SysFram::GetLoginID());
        $this->display($View,array('row'=>$row));
    }
    
    public function LoginAction()
    {
        SysFram::CheckAdminLogin(false);
        if(SysFram::UserIsLogin())
        {
            if(Fram::IsPost())
                die(json_encode(['error'=>0,'msg'=>'']));
            else 
                Pub\Js::LocationHref('/chuanhai-admin.shtml',true,true);
        }

        if(Fram::IsPost())
        {
            $arr=array('error'=>0,'msg'=>'');
            $UserName=Fram::GetValue("username");
            $UserPass=Fram::GetValue("password");
            
            if(Fram::IsNotEmpty($UserName) && Fram::IsNotEmpty($UserPass))
            {
                if(SysFram::CheckAdminUser($UserName,$UserPass,1))
                {
                    $arr=array('error'=>0,'msg'=>'');
                }
                else
                {
                    $mess = '用户名或密码错误！';
                    $arr=array('error'=>1,'msg'=>$mess);
                }
            }
            else
                $arr=array('error'=>1,'msg'=>'卡号错误，请输入正确的卡号！');
            
            die(json_encode($arr));
        }
        
        $this->display('login');
    }
    
    public function LunboAction()
    {
        $Total=0;
        $rows=Bll\News::GetList(1, 999,['SORT_ID=9 and STATE=1',null],$Total);
        $this->display('lunbo',array('rows'=>$rows));
    }
    
    public function TreeAction()
    {
        SysFram::CheckAdminLogin();
        $this->display('treejs');
    }
    
    public function LoginoutAction()
    {
        SysFram::LogOut();
        header("location:/chuanhai/");
    }
}