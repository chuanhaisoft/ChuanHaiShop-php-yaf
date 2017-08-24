<?php
use Pub\SysFram;
use Pub\Fram;
use Pub\Ext;

class MoneyController extends \Base\ControllerAdmin
{
    public function IndexAction()
    {
        $this->display_layout('index',array('admin_user'=>''));
    }
    
    public function BankAction()
    {
        $m=new \Model\Bank();
        $m=\Bll\Bank::Model(null,[$m->_UserId->w('=',SysFram::GetLoginID())]);
        if(Fram::IsPost())
        {
            $up=new \Model\Bank();
            $up->getPost();
            $up->_BankName->SetChanged();
            $up->_BankNum->SetChanged();
            $up->_UserName->SetChanged();
            $up->State(1);

            if($m)
            {
                $up->Id($m->Id());
                $up->AddTime(Fram::Date());
                $up->Update();
            }
            else
            {
                $up->Id(-1);
                $up->UserId(SysFram::GetLoginID());
                $up->Insert();
            }
            die(Pub\Js::Alert('操作成功'));
        }
        
        
        if(!$m)
            $m=new \Model\Bank();
        $this->display_layout('bank',['m'=>$m]);
    }
    
    
    
    
    public function TixianAction()
    {
        $UID=SysFram::GetLoginID();
        $m = new \Model\User();
         
        $MoneyLimit=Bll\User::MoneyLimit($UID);
         
        if(Fram::IsPost())
        {
            $row=\Bll\User::Row($UID);
            $tp=1;
            
            $m=new \Model\CaiWu();
            $m->Money(Fram::GetValue('MONEY'));
    
            //$UserPayPass = Fram::GetFormValue($F, 'PAY_PASS');
    
            //if(!$UserPayPass || !$row || !Bll_User::IsPayPass($UserPayPass, $row['PAY_PASS']))
            //    die("parent.window.ExtAlert('支付密码错误。')");
            if(!$m->Money() || !is_numeric($m->Money()) || $m->Money()<=0)
                die("parent.window.ExtAlert('提现金额不正确，请重新输入。')");
            if($m->Money()>$row['MONEY'])
                die("parent.window.ExtAlert('提现金额不能大于用户余额。')");
            if (floor($m->Money())!=$m->Money())
                die("parent.window.ExtAlert('提现金额必须是整数。')");
            if($row['MONEY']<100 || $m->Money()<100)
                die("parent.window.ExtAlert('提现金额小于100元，不能提现')");
            if(bcmod($m->Money(), '100')!=0)
                die("parent.window.ExtAlert('提现金额必须是100的倍数。')");
            //if(Bll_Role::Role_Id_User($row['ROLE_ID'])){
            //    if(bcsub($row['MONEY'],$m->Money())<$MoneyLimit)
            //        die("parent.window.ExtAlert('提现后余额小于{$MoneyLimit}，不能提现')");
            //}

            $Bank=new Model\Bank();
            $Bank=Bll\Bank::Model(null,[$Bank->_UserId->w('=',$UID)]);
            if(1==1)
            {
                //if(!Bll_User::CheckShenFen())
                //    die("parent.window.ExtAlert('未通过实名认证。')");
                //if(!Bll_User::CheckBank())
                //    die("parent.window.ExtAlert('银行卡未认证。')");
                if(!$Bank || !Fram::CheckNum($Bank->Id()))
                    die("parent.window.ExtAlert('用户未绑定银行卡。')");
            }
    
            $cai_wu=new \Model\CaiWu();
            if( Bll\CaiWu::Column(null,'count(1)',[$cai_wu->_UserId->w('=',$UID),$cai_wu->_ModuleId->w_and('=',Bll\M::Ti_Xian()),$cai_wu->_State->w_and('=',0)] )>0 )//"USER_ID={$UID} and MODULE_ID=".Bll_M::Ti_Xian()." and STATE=0"
            {
                die("parent.window.ExtAlert('有未处理完的提现申请。')");
            }
    
            $ShouXuFei=0;
    
            $m->UserId($UID);
            $m->ActUserId($UID);
            $m->ActTime(Fram::Date());
            $m->ModuleId(Bll\M::Ti_Xian());
            $m->Mess('申请提现:'.$m->Money());
            $m->IsLock(1);
            $m->State(0);
    
            $user=new Model\User();
            $user=Bll\User::Model($UID);
    
            /**
            if(Bll_Role::Role_Id_User($user->RoleId())){
                if(bcsub($row['MONEY'],("{$m->Money()}" + "$ShouXuFei" ),2) <$MoneyLimit)
                    die("parent.window.ExtAlert('提现后余额小于{$MoneyLimit}，不能提现')");
            }
            if(Bll_Role::Role_Id_Shop(SysFram::getLoginRoleID())){//2016-06-01
                $ShouXuFei=0;
                $m->Fee1(0);
                $m->Fee20(0);
            }
            **/
            $r=true;
            $Conn=Fram::GetConn(true);
            //$Tran=$Conn->beginTransaction();
    
            if(1==2)
            {
                
            }
            else
            {
                $m->Money($m->Money()*-1);
                $m->MoneyTrue(abs($m->Money()));
                $c=Bll\CaiWu::Insert($m,$Conn);
                $r = $r && $c;
            }
    
    
            $User=new Model\User();
    
            //$ShouXuFei=bcadd("{$m->Fee20()}"*"0.21" + "{$m->Fee1()}"*"0.01", 0,2);
            //if(Fram::CheckNum($ShouXuFei))
            //    $r = $r && Bll_User::UpdateMoney($UID, $ShouXuFei*-1,$Conn,$User->_Money->FieldName.'>='.$ShouXuFei,0,"提现:{$m->Money()}手续费扣:{$ShouXuFei}",Bll_M::Ti_Xian_Shou_Xu_Fei());
            if($r)
            {
                $m->Money($m->Money()*-1);//插入caiwu表后，恢复正数
                if(Bll\User::Billing_Do_Money($UID, $m->Money()*-1,"提现".$m->Money().",订单号：".$c,$Conn,false,$m->ModuleId(),true,true,null,$c) )
                {
                    $Conn->commit();
                    //Bll\User::UpdateLockMoney($UID);
                    $mess='申请提现成功';
                    die("DoView();document.getElementById('ejsvformid1').reset();parent.window.ExtAlert('".$mess."。');");
                }
                else
                {
                    $Conn->rollback();
                    die("parent.window.ExtAlert('申请提现失败。')");
                }
            }
            else
            {
                $Conn->rollback();
                die("parent.window.ExtAlert('申请提现失败。')");
            }
    
    
        }
    
    
        //列表
        $act=Fram::GetValue("act");
        if(isset($act))
        {
            switch ($act)
            {
                case "List":
                    $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
    
                    $m=new \Model\CaiWu();
                    $_where = [$m->_UserId->w('=',$UID),$m->_ModuleId->w_and('=',Bll\M::Ti_Xian())];//'USER_ID='.$UID.' and MODULE_ID='.Bll\M::Ti_Xian();
                    $rs=\Bll\CaiWu::GetList($PageNum,$PageSize,$_where,$total);
                    echo Ext::GetJsonStr($rs,$total);
                    exit();
                    break;
                     
                     
            }
        }
    
        $C = "ID,USER_ID,MONEY,STATE,ACT_TIME,MESS,FEE_1,FEE_20,MONEY_TRUE";
        $F = "时间,,ACT_TIME;提现金额,,MONEY,,-1,,DealMoney,,right;应打款金额,,MONEY_TRUE,,-1,,-1,,right;说明,,MESS;状态,,STATE,,-1,,TiXianState";
        $T =  '';
        $Bar = "";
        $GridHtml = Ext::GridStr(-1,"/users/money/tixian/", "", "", "ID", "提现",$C,$F ,$T,$Bar,0.98,-195);
        $row=Bll\User::Row($UID);
        $Tixian=Bll\CaiWu::Column('sum(MONEY)', "USER_ID=".SysFram::GetLoginID()." and MODULE_ID=1");
        $YI=Bll\CaiWu::Column('sum(MONEY)', "USER_ID=".SysFram::GetLoginID()." and MODULE_ID=1 and STATE=2");
        $BH=Bll\CaiWu::Column('sum(MONEY)', "USER_ID=".SysFram::GetLoginID()." and MODULE_ID=1 and STATE=3");
        
        $this->display_layout('ti-xian',['m'=>$m,'GridHtml'=>$GridHtml,'Tixian'=>$Tixian]);
    }
    /**
    public function actionLog()
    {
        $UID=SysFram::GetLoginID();
         
        $act=Fram::GetValue("act");
        if(isset($act))
        {
            switch ($act)
            {
                case "List":
                    $PageNum=0;$start=0;$PageSize=0;$total=0;
                    Ext::InitPageSize(&$PageNum, &$start, &$PageSize, &$PageNum);
                    $_where = 'USER_ID='.$UID.' and '.Bll_MoneyLog::WhereMoney();
                     
                    $MODULE_ID=Fram::GetNumValue('search_type',0);
                    if($MODULE_ID)$_where.=" AND MODULE_ID = '".$MODULE_ID."'";
                     
                    $st=Fram::GetValue('st');
                    $ed=Fram::GetValue('ed');
                    $mess=Fram::GetValue('mess');
                    if($mess)$_where.=" AND MESS LIKE '%".$mess."%'";
                     
                    if($st && $ed)
                    {
                        $_where.= " and (ACT_TIME>='{$st} 0:0:0' and ACT_TIME<='{$ed} 23:59:59')";
                    }
    
                    $rs=Bll_MoneyLog::GetList($PageNum,$PageSize,$_where,&$total,"*",'ID desc');
                    echo Ext::GetJsonStr($rs,$total);
                    exit();
                    break;
    
    
            }
        }
    
        $C = "ID,CAI_WU_ID,USER_ID,MONEY,RIGHT_MONEY,STATE,ACT_TIME,MESS";
        if(SysFram::getLoginRoleID()==1){
            $F = "时间,,ACT_TIME;金额,,MONEY,,-1,,FormatMoney,,right;,,RIGHT_MONEY,,-1,,RightMoneyShow,,right;说明,,MESS";
        }else{
            $F = "时间,,ACT_TIME;金额,,MONEY,,-1,,FormatMoney,,right;说明,,MESS";
        }
         
        $T =  '';
        $Bar = "";
        $GridHtml = Ext::GridStr(-1,"/user/money/log", "", "", "ID", "财务日志",$C,$F ,$T,$Bar,0.98);
    
    
        
        $this->display('log',array('GridHtml'=>$GridHtml));
    }
    
    //log_index的子列表
    public function actionLog2()
    {
         
        $UID=SysFram::GetLoginID();
         
        $act=Fram::GetValue("act");
         
        $TYPE=Fram::GetNumValue('type',1);
        $type_array = array(
            '1' =>array(1001,1002,1003),  //商城
            '2' =>array(9904,9903,9960),  //超市
            '3' =>array(5,1000),  //实体店
        );
        $All_type = array();
        if(!empty($type_array[$TYPE]))
        {
            $All_type = $type_array[$TYPE];
        }
         
        if(isset($act))
        {
            switch ($act)
            {
                case "List":
                    $PageNum=0;$start=0;$PageSize=0;$total=0;
                    Ext::InitPageSize(&$PageNum, &$start, &$PageSize, &$PageNum);
                    $_where = 'USER_ID='.$UID.' and '.Bll_MoneyLog::WhereMoney();
                     
                    if(!empty($All_type))
                    {
                        $_where.=" AND MODULE_ID in (".implode(',', $All_type).")";
    
                    }
                     
                     
                    $MODULE_ID=Fram::GetNumValue('search_type',0);
                    if($MODULE_ID)$_where.=" AND MODULE_ID = '".$MODULE_ID."'";
                     
                    $st=Fram::GetValue('st');
                    $ed=Fram::GetValue('ed');
                    $mess=Fram::GetValue('mess');
                    if($mess)$_where.=" AND MESS LIKE '%".$mess."%'";
                     
                    $sum = 'no_show';
                    if($st && $ed)
                    {
                         
                        if((strtotime($ed)-strtotime($st))/24/3600>35)
                        {
                            echo 'alert("时间跨度不不能大于35天!");';
                            die();
                        }
                        $_where.= " and (ACT_TIME>='{$st} 0:0:0' and ACT_TIME<='{$ed} 23:59:59')";
                         
                        $sum_row = Date::GetRow("select sum(MONEY) as all_money from money_log where ".$_where);
                        if($sum_row['all_money'])
                        {
                            $sum = $sum_row['all_money'];
                        }
                         
                    }
    
                    $rs=Bll_MoneyLog::GetList($PageNum,$PageSize,$_where,&$total,"*",'ID desc');
                    echo Ext::GetJsonStr($rs,$total);
                    if($sum!='no_show')
                    {
                         
                        echo '$("#sum_show").html("总金额:'.$sum.'")';
                    }
                     
                    exit();
                    break;
    
    
            }
        }
    
        $C = "ID,CAI_WU_ID,USER_ID,MONEY,RIGHT_MONEY,STATE,ACT_TIME,MESS";
        if(SysFram::getLoginRoleID()==1){
            $F = "时间,,ACT_TIME;金额,,MONEY,,-1,,FormatMoney,,right;,,RIGHT_MONEY,,-1,,RightMoneyShow,,right;说明,,MESS";
        }else{
            $F = "时间,,ACT_TIME;金额,,MONEY,,-1,,FormatMoney,,right;说明,,MESS";
        }
         
        $T =  '';
        $Bar = "";
        $GridHtml = Ext::GridStr(-1,"/user/money/log2?type=".$TYPE, "", "", "ID", "财务日志",$C,$F ,$T,$Bar,0.98,"SearchDiv");
    
    
        
        $this->display('log2',array('GridHtml'=>$GridHtml,'All_type'=>$All_type,));
    }
    
    public function actionShouxufei()
    {
    
        $data=array('error'=>0,'msg'=>'');
        $UID=SysFram::GetLoginID();
        $Money=Fram::GetValue('MONEY');
        $m=new Model_CaiWu();
        $m->Money($Money);
        if($Money<100)
        {
            $data=array('error'=>1,'msg'=>"提现金额小于100,不能提现");
            echo json_encode($data);
        }
        if(bcmod($m->Money(), '100'))
        {
            $data=array('error'=>1,'msg'=>"提现金额必须是100的倍数。");
            echo json_encode($data);
        }
        	
        $user=new Model_User();
        $user=Bll_User::GetModel($UID);
    
        $FanLi=$user->MoneyFanLi();
        if(!$FanLi)$FanLi=0;
        $TiXian20=$user->MoneyTiXian20();
        if(!$TiXian20)$TiXian20=0;
        if($TiXian20 >= $FanLi)
        {
            $m->Fee20(0);
            $m->Fee1($m->Money());
            $m->MoneyTrue( Fram::BcAdd($m->Money(), 0,2) );
    
            $ShouXuFei= bcmul($m->Money(),"0.01",2);
        }
        else
        {
            $m->Fee20( $FanLi-$TiXian20 );
            if($m->Money()<$m->Fee20() )
                $m->Fee20($m->Money());
            $m->Fee1($m->Money()-$m->Fee20());
    
            $ShouXuFei= bcmul($m->Fee20(),"0.21",2);
            $ShouXuFei= Fram::BcAdd($ShouXuFei,bcmul($m->Fee1(),"0.01",2),2);
    
    
            $m->MoneyTrue( Fram::BcAdd($m->Money(), 0,2) );
        }
        if(Bll_Role::Role_Id_Shop(SysFram::getLoginRoleID())){//2016-06-01
            $ShouXuFei=0;
            $m->Fee1(0);
            $m->Fee20(0);
        }
    
        $data=array('error'=>0,'msg'=>$ShouXuFei);
    
        	
        echo json_encode($data);
    }
    public function actionShop_ren2()
    {
        $UID=SysFram::GetLoginID();
        //$user=Bll_User::GetSingleRow('ID='.$UID,"*");
        $u=Bll_User::GetSingleRow('','*',$UID);
        $m=new User();$User=new Model_User();$User=Dal_User::GetModel(Bll_User::GetCurrentShopID());
    
        if(Yii::app()->request->isPostRequest)
        {
            $F='User';
            $m=new Model_User();
            $l=new Model_UserLog();
            $m->Id(Bll_User::GetCurrentShopID());
            if($User->CheckUser()!=1)
            {
                $m->Name(Fram::GetFormValue($F, 'NAME'));
                if(Bll_Role::Role_Id_User($User->RoleId()))
                    $m->IdCard(Fram::GetFormValue($F, 'ID_CARD'));
            }
            $m->IdCard(Fram::GetFormValue($F, 'ID_CARD'));
            if(!$m->IdCard())
                die("parent.window.ExtAlert('请输入证件号')");
             
            else  $m->Name(Fram::GetFormValue($F, 'NAME'));
            $m->MobileNum(Fram::GetFormValue($F, 'MOBILE_NUM'));
            if(!is_numeric($m->MobileNum()) || strlen($m->MobileNum())!=11)
                die("parent.window.ExtAlert('请输入正确的手机号码')");
             
    
            $m->Address(Fram::GetFormValue($F, 'ADDRESS'));
            if(!$m->Address())
                die("parent.window.ExtAlert('请输入地址')");
            $m->CheckUser(0);
            $m->IdCardType(3);
             
             
             
             
             
            if(Bll_Role::Role_Id_Shop(SysFram::getLoginRoleID()))
            {
                $info=new Model_UserInfo();
                $info->UserId(Bll_User::GetCurrentShopID());
        	       // $info->ShopPic(Fram::GetFormValue($F, 'SHOP_PIC'));
                $info->YingYeZhiZhao(Fram::GetFormValue($F, 'YING_YE_ZHI_ZHAO'));
                $Count=Bll_UserInfo::GetScalar('count(1)', "USER_ID=".Bll_User::GetCurrentShopID());
                $Result=null;
                if($Count==0)
                    $Result=Bll_UserInfo::Insert($info);
                else
                    $Result=Bll_UserInfo::Update($info);
                 
    
            }
            $l->State(0);
            $l->UserId($UID);
            $l->ActTime(Fram::Date());
            $l->ModuleId(999);
            $Clog=Bll_UserLog::GetScalar('count(1)', "USER_ID=".$UID." and STATE=0 AND MODULE_ID=999");
            //$Result=null;
            if($Clog==0){
                $in=Bll_UserLog::Insert($l);
            }else{
                //	$in=null;
                die( "ExtAlert('您已提交认证审核');");
            }
    
             
    
            if($in && Bll_User::Update($m))
            {
                echo "parent.window.ExtAlert('提交成功');";
            }
            else
            {
                echo "parent.window.ExtAlert('提交失败');";
            }
             
             
            exit();
        }
         
         
        $Info=new Model_UserInfo();$info=Bll_UserInfo::GetModel(Bll_User::GetCurrentShopID());
        $m->NAME=$User->Name();
        $m->ID_CARD=$User->IdCard();
        $m->CARD_NUM=$User->CardNum();
        $m->MOBILE_NUM=$User->MobileNum();
        $m->ADDRESS=$User->Address();
    
        $m->YING_YE_ZHI_ZHAO=$info->YingYeZhiZhao();
    
    
        $TuiJianRen=$User->RecommendId();
        if($TuiJianRen && $TuiJianRen>0)
        {
            $TuiJianRen=Bll_User::GetNameByID($TuiJianRen);
        }
        else
        {
            $TuiJianRen='';
        }
         
         
        
        $this->display('shop_ren2',array('m'=>$m,'TuiJianRen'=>$TuiJianRen,'u'=>$User,'user'=>$u));
    
    }
    public  function  actionShop_ren()
    {
        $UID=SysFram::GetLoginID();
        //$user=Bll_User::GetSingleRow('ID='.$UID,"*");
        $u=Bll_User::GetSingleRow('','*',$UID);
        $m=new User();$User=new Model_User();$User=Dal_User::GetModel(Bll_User::GetCurrentShopID());
    
        if(Yii::app()->request->isPostRequest)
        {
            $F='User';
            $m=new Model_User();
            $l=new Model_UserLog();
            $m->Id(Bll_User::GetCurrentShopID());
            if($User->CheckUser()!=1)
            {
                $m->Name(Fram::GetFormValue($F, 'NAME'));
                if(Bll_Role::Role_Id_User($User->RoleId()))
                    $m->IdCard(Fram::GetFormValue($F, 'ID_CARD'));
            }
            $m->IdCard(Fram::GetFormValue($F, 'ID_CARD'));
            if(!$m->IdCard())
                die("parent.window.ExtAlert('请输入证件号')");
             
            else  $m->Name(Fram::GetFormValue($F, 'NAME'));
            $m->MobileNum(Fram::GetFormValue($F, 'MOBILE_NUM'));
            if(!is_numeric($m->MobileNum()) || strlen($m->MobileNum())!=11)
                die("parent.window.ExtAlert('请输入正确的手机号码')");
             
    
            $m->Address(Fram::GetFormValue($F, 'ADDRESS'));
            if(!$m->Address())
                die("parent.window.ExtAlert('请输入地址')");
            $m->CheckUser(0);
            $m->IdCardType(3);
             
             
             
             
             
            if(Bll_Role::Role_Id_Shop(SysFram::getLoginRoleID()))
            {
                $info=new Model_UserInfo();
                $info->UserId(Bll_User::GetCurrentShopID());
        	       // $info->ShopPic(Fram::GetFormValue($F, 'SHOP_PIC'));
                $info->YingYeZhiZhao(Fram::GetFormValue($F, 'YING_YE_ZHI_ZHAO'));
                $Count=Bll_UserInfo::GetScalar('count(1)', "USER_ID=".Bll_User::GetCurrentShopID());
                $Result=null;
                if($Count==0)
                    $Result=Bll_UserInfo::Insert($info);
                else
                    $Result=Bll_UserInfo::Update($info);
                 
    
            }
            $l->State(0);
            $l->UserId($UID);
            $l->ActTime(Fram::Date());
            $l->ModuleId(999);
            $Clog=Bll_UserLog::GetScalar('count(1)', "USER_ID=".$UID." and STATE=0 AND MODULE_ID=999");
            //$Result=null;
            if($Clog==0){
                $in=Bll_UserLog::Insert($l);
            }else{
                //	$in=null;
                die( "ExtAlert('您已提交认证审核');");
            }
    
             
    
            if($in && Bll_User::Update($m))
            {
                echo "parent.window.ExtAlert('提交成功');";
            }
            else
            {
                echo "parent.window.ExtAlert('提交失败');";
            }
             
             
            exit();
        }
         
         
        $Info=new Model_UserInfo();$info=Bll_UserInfo::GetModel(Bll_User::GetCurrentShopID());
        $m->NAME=$User->Name();
        $m->ID_CARD=$User->IdCard();
        $m->CARD_NUM=$User->CardNum();
        $m->MOBILE_NUM=$User->MobileNum();
        $m->ADDRESS=$User->Address();
    
        $m->YING_YE_ZHI_ZHAO=$info->YingYeZhiZhao();
    
    
        $TuiJianRen=$User->RecommendId();
        if($TuiJianRen && $TuiJianRen>0)
        {
            $TuiJianRen=Bll_User::GetNameByID($TuiJianRen);
        }
        else
        {
            $TuiJianRen='';
        }
        $info=Bll_UserInfo::GetSingleRow($UID);
        $total=0;
        //$PageSize=500;
        $_where='MODULE_ID=999  and STATE=-1 and USER_ID='.$UID;
        $rs=Bll_UserLog::GetList(1,1,$_where,$total,"*",'ID desc');
        // echo $rs[0]['MESS'];
         
        
        $this->display('shop_ren',array('m'=>$m,'TuiJianRen'=>$TuiJianRen,'info'=>$info,'user'=>$u,'mess'=>$rs[0]['MESS']));
    }
	**/
}
