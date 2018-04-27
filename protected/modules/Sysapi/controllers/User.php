<?php
Use \Pub\Fram;
Use \Pub\SysFram;

class UserController extends \Base\Api
{
	public function LoginAction()
	{
	    //Fram::CheckPower(2);
	    self::Login();
	}
	
	public function UserinfoAction()
	{
	    parent::CheckApiUser();
	    self::UserInfo();
	}
	public function UserinfosAction()
	{
	    parent::CheckApiUser();
	    self::UserInfos();
	}
	
	public function SipIpsAction()
	{
	    die('{"error":"0","msg":"","ips":""}');//115.159.150.172,115.159.150.171
	}
	
	public function BackcallAction()
	{
	    $tellfrom=\Pub\Fram::GetValue('tellfrom');
	    $tellto=\Pub\Fram::GetValue('tellto');
	    if($tellfrom=='13708954375')
	    {
	        echo \Pub\YunHuaTong::CallBack($tellfrom, $tellto);
	    }
	    else
	    {
	        die('{"error":"0","msg":"","ips":""}');
	    }
	}
	
	public function RegAction()
	{
	    $MobileCode=\Pub\Fram::GetValue('mobile_code',null);
	    
	    $m=new \Model\User();
        $m->LoginName(\Pub\Fram::GetValue('login_name'));
        $m->LoginPass(\Pub\Fram::GetValue('login_pass'));
        $m->MobileNum($m->LoginName());
        $m->RoleId(72);
        $m->State(1);
        $m->Money(Bll\Pub::Value(73));
        $m->Point(Bll\Pub::Value(71));
        
        if(!$MobileCode || Bll\Code::Mobile_Get_Code($m->LoginName())!=$MobileCode)
            die(parent::ToJson([],1,'手机验证码错误！'));
        
        if(!\Form\Validator::MobileNum($m->LoginName()))
            die(parent::ToJson([],1,'手机号格式错误！'));
         
        $t=Bll\User::Column(null,'count(1)',[$m->_LoginName->w()]);
        if($t>0)
            die(parent::ToJson([],1,'手机号已被占用！'));
        if(strlen($m->LoginPass())<6 || strlen($m->LoginPass())>18)
            die(parent::ToJson([],1,'请输入6-18位的密码！'));

        $m->Insert();
        die(parent::ToJson(['state'=>'ok']));
	}
	
	public function Mobile_codeAction()
	{
	    $Tel=Fram::GetValue('mobilenum');
	    $CodePic=Fram::GetValue('codepic');
	    $SendType=Fram::GetValue('send_type');
	    
	    if(Form\Validator::MobileNum($Tel))
	    {
	        $m=new \Model\User();$m->LoginName($Tel);
	        $t=Bll\User::Column(null,'count(1)',[$m->_LoginName->w()]);
	        if($t>0)
	            die(parent::ToJson([],1,'手机号已被占用！'));
	         
	        $Num=Fram::RandStr(6,'NUMBER');
	        if($SendType!='语音')
	            Pub\YunHuaTong::CodeText($Tel,$Num);
	        else
	            Pub\YunHuaTong::CodeVoip($Tel,$Num);
	         
	        Bll\Code::DoWrite($Tel, $Num);
	        die(parent::ToJson(['state'=>'ok']));
	    }
	    else
	    {
	        die(parent::ToJson([],1,'手机号码错误！'));
	    }
	}
	
	

	
	
	public static function Login()
	{
	    $Arr=array('error'=>0,'mess'=>'');
	    
	   $UserName=Fram::GetValue("username");
	   $UserPass=Fram::GetValue("password");
	   //print_r($_POST);
	   if(Fram::IsNotEmpty($UserName) && Fram::IsNotEmpty($UserPass) && is_numeric($UserName))
	   {
	       //$UserPass=md5($UserPass);
	       $w=['LOGIN_NAME= ? and STATE=1',[$UserName]];
		   $user = \Bll\User::Row(null,$w);
		
			   if($user)
			   {
			       if(Bll\UserLog::IsLoginCountLimit($user["ID"]))
			           die(json_encode(array('error'=>1,'mess'=>'由于重试次数过多，已被限制登录15分钟，请稍后再试。')));
			   }
			   
			   //print_r($user);
			   //print_r($_POST);
			   $ROLE_NAME='';$role_type=1;
			   if($user)
			   {
			       $ROLE_NAME=Bll\Role::Column(null,'ROLE_NAME', 'ROLE_ID='.$user['ROLE_ID']);
			   }
				if($user)
				{
				    if($user['LOGIN_PASS']!=$UserPass)
				    {
				        Bll\UserLog::Do_Log($user["ID"], "用户登录失败",Bll\M::User_Login(),0,null,Fram::GetValue('api_user_ip',null));
				        $Arr=array('error'=>1,'mess'=>'用户名或密码错误！');
				        die(json_encode($Arr));
				    }
					$Arr=array('error'=>0,'user_id'=>$user['ID'],'card_num'=>$user['LOGIN_NAME'],'name'=>$user['NAME'],'mobile'=>$user['MOBILE_NUM'],'rolename'=>$ROLE_NAME,'role_id'=>$user['ROLE_ID'],'role_type'=>$role_type,'check_user'=>$user['CHECK_USER'],'check_mobile'=>$user['CHECK_MOBILE'],'check_email'=>$user['CHECK_EMAIL']);
					$Arr["sip_url"]="182.254.141.218";
					$Arr["im_user"]=$user['ID'].'.'.\Pub\ChuanHaiIm::DomainID();
					//$Arr["s_login_sign"]=md5("H&uip.Cn".$user['ID'].'-'.$user['USER_PASS'].'@'.$user['CARD_NUM'].'wJ*sH');
					Bll\UserLog::Do_Log($user["ID"], "用户登录成功",Bll\M::User_Login(),1,null,Fram::GetValue('api_user_ip',null));
			        die(json_encode($Arr));
				}
				else
				{
					     Bll\UserLog::Do_Log(0, "无此用户:{$UserName}",Bll\M::User_Login(),0,null,Fram::GetValue('api_user_ip',null));
						 $Arr=array('error'=>1,'mess'=>'用户名或密码错误！');
		                 die(json_encode($Arr));
				}
	           
	      
	   }
	   else {
	       Bll\UserLog::Do_Log(0, "无此用户:{$UserName}",Bll\M::User_Login(),0,null,Fram::GetValue('api_user_ip',null));
	       $Arr=array('error'=>1,'mess'=>'用户名或密码错误.！');
		   die(json_encode($Arr));
	   }
	
	   
	}
	public static function UserInfo()
	{
	     $Arr=[];
	    
	     $UserID=Fram::GetNumValue('api_user','-1');
		 if(Fram::IsNotEmpty($UserID)  && is_numeric($UserID) && $UserID>0)
	     {
		      $User=Bll\User::Row($UserID);
		  //$ROLE_NAME=Bll\Role::Column($User['ROLE_ID'],'ROLE_NAME');
		  
		   $user_pic=Bll\UserInfo::Column($UserID,'USER_PIC');
	       if($User['SEX']==1)$sex='男';
			elseif($User['SEX']==2)$sex='女';
			else $sex='未知';
			if($User['CHECK_USER']==1)$check='已认证';
			elseif($User['CHECK_USER']==0)$check='未认证';
	        $Arr=array('mobile'=>$User['MOBILE_NUM'],'card_num'=>$User['ID'],'name'=>$User['NAME'],'login_name'=>$User['LOGIN_NAME'],'address'=>$User['ADDRESS'],'email'=>$User['EMAIL'],'rmb'=>$User['MONEY'],'rmb_lock'=>$User['MONEY_LOCK'],'talktime'=>$User['TALK_TIME'],'idcard'=>$User['ID_CARD'],'sex'=>$sex,'addtime'=>$User['ADD_TIME'],'role_id'=>$User['ROLE_ID'],'rolename'=>'rolename','check'=>$check,'user_pic'=>$user_pic);
	        $Arr['check_user']=$User['CHECK_USER'];$Arr['check_mobile']=$User['CHECK_MOBILE'];$Arr['check_email']=$User['CHECK_EMAIL'];
	        $Arr["id"]=$User['ID'];
	        $Arr["qq"]="";$Arr["point"]=$User['POINT'];
	        if($User['QQ'])
	        {
	            $Arr["qq"]=$User['QQ'];
	        }
	        $Arr["sip_url"]="182.254.141.218";
	        
	        
	        die(parent::ToJson($Arr));
		 }else{
		      die(parent::ToJson([],1,'用户错误！'));
		}
	  
	}
	
	
	
	public static function UserInfos()
	{
		 $Arr=array('error'=>0,'mess'=>'');
	    
	     $UserID=Fram::GetNumValue('user_id','-1');
		 if(Fram::IsNotEmpty($UserID)  && is_numeric($UserID))
	   {
		 $User=Bll\User::Row($UserID);
		  //$ROLE_NAME=Bll\Role::Column($User['ROLE_ID'],'ROLE_NAME');
		  
		  $user_pic=Bll\UserInfo::Column($UserID,'USER_PIC');
	   if($User['SEX']==1)$sex='男';
			elseif($User['SEX']==2)$sex='女';
			else $sex='未知';
			if($User['CHECK_USER']==1)$check='已认证';
			elseif($User['CHECK_USER']==0)$check='未认证';
	        $Arr=array('error'=>0,'PASS'=>$User['USER_PASS'],'card_num'=>$User['ID'],'card_num'=>$User['ID'],'mobile'=>$User['MOBILE_NUM'],'address'=>$User['ADDRESS'],'email'=>$User['EMAIL'],'name'=>$User['NAME'],'idcard'=>$User['ID_CARD'],'card_num'=>$User['CARD_NUM'],'rmb'=>$User['MONEY'],'talktime'=>$User['TALK_TIME'],'sex'=>$sex,'addtime'=>$User['ADD_TIME'],'rolename'=>'rolename','check'=>$check,'user_pic'=>$user_pic);
	        die(json_encode($Arr));
		 }else{
		 $Arr=array('error'=>1,'mess'=>'用户错误！');
		   die(json_encode($Arr));
						}
	}
	
	
	
	
	
	
	public static function User_info()
	{
		$Arr=array('error'=>0,'mess'=>'');
	    $UserID=Fram::GetNumValue('user_id',-1);
	    $user=Bll\User::Row($UserID);
	    
	if($user["CHECK_USER"]==1)
	{
		$rz="已认证";
		}else{
			$rz="未认证";
			}
	   
	
	    $Arr= array('error'=>0,'name'=>$user['NAME'],'card_num'=>$user['ID'],'renzheng'=>$rz,'mobile'=>$user['MOBILE_NUM']);
	    $Arr['check_user']=$user['CHECK_USER'];$Arr['check_mobile']=$user['CHECK_MOBILE'];$Arr['check_email']=$user['CHECK_EMAIL'];
	    die(json_encode($Arr));
	}
	
	
	
	public  function SearchUsersAction()
	{
	    
	    $search_no=Fram::GetNumValue('search_key',0);
	    $search_name=Fram::GetValue('search_key','');$search_name = str_replace("%","",$search_name);
	    
	    $page=Fram::GetNumValue('page',1);
	    $page_size=Fram::GetNumValue('page_size',10);
	    
	    if($page<0)
	    {
	        $page = 1;
	    }
	    if($page_size<0)
	    {
	        $page_size = 10;
	    }
	    if($page_size>100)
	    {
	        $page_size = 100;
	    } 
	    
	    $m = new Model\User();
	    
	    $w = null;
	    
	    if ($search_no) 
	    {
	        //$search_no = '%'.$search_no.'%';
	    	$w[] = $m->_LoginName->w_and('=',$search_no);
	    }
	    elseif($search_name)
	    {
	        $search_name = ''.$search_name.'%';
	        $w[] = $m->_Name->w_and('like',$search_name);
	    }
	    else
	    {
	        $Arr=array('error'=>1,'mess'=>'必须传入search_key！','total'=>0,'page'=>$page,'all_page_nun'=>0,'list'=>array());
	        die(json_encode($Arr));
	    }
	    
	    $w[]=$m->_State->w_and('=','1');
	   
	    $total = 0;
	    $list = Bll\User::GetList($page, $page_size,$w,$total,'ID,NAME,ROLE_ID,CARD_NUM,ADD_TIME','ID DESC');

	    $all_page_nun = ceil($total/$page_size);
	    
	    $Arr=array('error'=>0,'mess'=>'成功！','total'=>$total,'page'=>$page,'all_page_nun'=>$all_page_nun,'list'=>$list);
	    die(json_encode($Arr));
	
	}
	
	
}