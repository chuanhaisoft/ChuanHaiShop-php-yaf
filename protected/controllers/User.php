<?php
use Pub\SysFram;
use Pub\Fram;

class UserController extends \Base\Common
{
	public function RegAction()
	{
	    $m=new \Model\User('reg');
	    if(Fram::IsPost())
	    {
	        $m->getPost();
	        $m->_LoginName->SetChanged();
	        $m->_LoginPass->SetChanged();
	        $m->MobileNum($m->LoginName());
	        $m->RoleId(72);
	        $m->State(1);
	        $m->Money(Bll\Pub::Value(73));
	        $m->Point(Bll\Pub::Value(71));
	        
	        if($m->ValidateModel())
	        {
	            $t=Bll\User::Column(null,'count(1)',[$m->_LoginName->w()]);
	            if($t>0)
	                die(Pub\Js::Alert('手机号已被占用！'));
	            if(!$m->Area() || Bll\Code::Mobile_Get_Code($m->LoginName())!=$m->Area())
	                die(Pub\Js::Alert('手机验证码错误！'));
	            //图片验证码

	            $m->Insert();
	            die(Pub\Js::Alert('注册成功,请登录。')."parent.layer.closeAll('iframe');");
	        }
	        else
	        {
	            die(Pub\Js::Alert('信息错误！'));
	        }
	    }
	    
		$this->display('reg',['m'=>$m]);
	}
	
	
	public function FindPassAction()
	{
	    $m=new \Model\User('reg');
	    if(Fram::IsPost())
	    {
	        $m->getPost();
	        $m->_LoginPass->SetChanged();
	        
	        $Tel=$m->LoginName();
	        if(Form\Validator::MobileNum($Tel))
	        {
	            $m_user=Bll\User::Model(null,[$m->_LoginName->w('=',$Tel)]);
	            if(!$m_user)
	                die("wait=1;".Pub\Js::Alert('无此会员！'));
	            
	            if($m->ValidateModel())
	            {
	                if(!$m->Area() || Bll\Code::Mobile_Get_Code($m->LoginName())!=$m->Area())
	                    die(Pub\Js::Alert('手机验证码错误！'));
	                //图片验证码
	            
	                $m->Update();
	                die(Pub\Js::Alert('操作成功,请登录。')."parent.layer.closeAll('iframe');");
	            }
	            else
	            {
	                die(Pub\Js::Alert('信息错误！'));
	            }
	        }
	        else 
	        {
	            die(Pub\Js::Alert('用户信息错误！'));
	        }
	        
	    }
	     
	    $this->display('findpass',['m'=>$m]);
	}
	
	
	
	
	
	public function LoginoutAction()
	{
	    SysFram::LogOut();
	    die('DoLoginSuccess(0,0,0)');
	}
	
	public function DologinAction()
	{
	    if(Fram::IsPost())
	    {
	        $arr=array('error'=>0,'msg'=>'');
	        $UserName=Fram::GetValue("login_name");
	        $UserPass=Fram::GetValue("login_pass");
	    
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
	            $arr=array('error'=>1,'msg'=>'用户错误！');
	        if($arr['error']==1)
	           Pub\Js::Alert($arr['msg'],false,true);
	        else 
	        {
	            
	            $s5 = \Bll\OrderMallDetail::TongJi('1',Pub\SysFram::GetLoginID());
	            $s2 = \Bll\OrderMallDetail::TongJi('-1',Pub\SysFram::GetLoginID(),Pub\Fram::Data_Add_Day(-7));
	            die("DoLoginSuccess(1,{$s5},{$s2})");
	        }
	           
	    }
	}
	
	public function SendmessFindpassAction()
	{
	    $Tel=Fram::GetValue('mobilenum');
	    $CodePic=Fram::GetValue('codepic');
	    $SendType=Fram::GetValue('send_type');
	    if(!$CodePic || $CodePic!=Bll\Code::Get_Code_Pic())
	    {
	        echo "wait=1;";
	        Pub\Js::Alert('图形验证码错误,请重新输入',false,true);
	    }
	
	    if(Form\Validator::MobileNum($Tel))
	    {
	        $m=new \Model\User();$m->LoginName($Tel);
	        $t=Bll\User::Column(null,'count(1)',[$m->_LoginName->w()]);
	        if($t==0)
	            die("wait=1;".Pub\Js::Alert('无此会员！'));
	         
	        $Num=Fram::RandStr(6,'NUMBER');
	        if($SendType!='语音')
	            Pub\YunHuaTong::CodeText($Tel,$Num);
	        else
	            Pub\YunHuaTong::CodeVoip($Tel,$Num);
	         
	        Bll\Code::DoWrite($Tel, $Num);
	        die('1');
	    }
	    else
	    {
	        echo "wait=1;";
	        Pub\Js::Alert('手机号码错误',false,true);
	    }
	}
	
	public function SendmessAction()
	{
	    $Tel=Fram::GetValue('mobilenum');
	    $CodePic=Fram::GetValue('codepic');
	    $SendType=Fram::GetValue('send_type');
	    if(!$CodePic || $CodePic!=Bll\Code::Get_Code_Pic())
	    {
	        echo "wait=1;";
	        Pub\Js::Alert('图形验证码错误,请重新输入',false,true);
	    }

	    if(Form\Validator::MobileNum($Tel))
	    {
	        $m=new \Model\User();$m->LoginName($Tel);
	        $t=Bll\User::Column(null,'count(1)',[$m->_LoginName->w()]);
	        if($t>0)
	            die("wait=1;".Pub\Js::Alert('手机号已被占用！'));
	        
	        $Num=Fram::RandStr(6,'NUMBER');
	        if($SendType!='语音')
	            Pub\YunHuaTong::CodeText($Tel,$Num);
	        else
	            Pub\YunHuaTong::CodeVoip($Tel,$Num);
	        
	        Bll\Code::DoWrite($Tel, $Num);
	        die('1');
	    }
	    else
	    {
	        echo "wait=1;";
	        Pub\Js::Alert('手机号码错误',false,true);
	    }
	}
	
	public function ImagecodeAction()
	{
	    $Pic=new \Pub\ImageCode();
	    $Pic->Do_Img();
	}
	
	
}