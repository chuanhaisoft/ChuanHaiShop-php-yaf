<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class OrdershopController extends \Base\ControllerAdmin
{
	public function DetailListAction()
	{
	    SysFram::CheckPagePower('339,367');
	    $act=Fram::GetValue("act");
		$UID=SysFram::GetLoginID();
		$RoleID=SysFram::getLoginRoleID();
		
		$order=new \Model\OrderMall();
		$detail=new \Model\OrderMallDetail();
		$user=new \Model\User();
		/**
		if(Bll\Role::Role_Id_User($RoleID)||Bll_Role::Role_Id_Shop($RoleID)||Bll_Role::Role_Id_Service($RoleID))
		{
		    die('
		          <script language="javascript" type="text/javascript">
                        window.location.href="/mall/order_shop/Order_detail_list_new.html";
                  </script>');
		}
		**/
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                \Pub\Ext::InitPageSize($PageNum, $start, $PageSize);

	                $_where=null;
	                if(Bll\Role::Role_Id_Shop($RoleID))
	                   $_where=[$detail->_ShopId->w_and('=',$UID,'','','a')];
	                if(Bll\Role::Role_Id_User($RoleID))
	                    $_where=[$detail->_UserId->w_and('=',$UID,'','','a')];
	                $num=Fram::GetNumValue('num');
	                if($num>0)
	                    $_where[]=$detail->_OrderId->w_and('=',$num,'','','a');
	                
	                $id=Fram::GetNumValue('id');
	                if($id>0)
	                    $_where[]=$detail->_Id->w_and('=',$id,'','','a');
	                
	                //$shop_role_id=Fram::GetNumValue('shop_role_id');
	                //if($shop_role_id>0)$_where.=' AND a.SHOP_ROLE_ID='.$shop_role_id;
	                $name=Fram::GetValue('name');
	                if($name)
	                    $_where[]=$detail->_ProName->w_and('like',"%{$name}%",'','','a');
	                
	                $snum=Fram::GetNumValue('snum');
	                if($snum>0)
	                {
	                	$SD=Bll\User::Column(null,'ID', [$user->_LoginName->w('=',$snum)]);
	                	if($SD>0)
	                	    $_where[]=$detail->_ShopId->w_and('=',$SD,'','','a');//$_where.=" AND (a.SHOP_ID='$SD' OR a.GONG_YING_SHANG_ID='$SD') ";
	
	                }
	                $hnum=Fram::GetNumValue('hnum');
	                if($hnum>0)
	                {
	                	$HN=Bll\User::Column(null,'ID', [$user->_LoginName->w('=',$hnum)]);
	                	if($HN>0)
	                	    $_where[]=$detail->_UserId->w_and('=',$HN,'','','a');//$_where.=" AND a.USER_ID=".$HN;
	                }
	                
	                $st=Fram::GetValue('st');
	                $ed=Fram::GetValue('ed');
	                $zt=Fram::GetNumValue('zt');
	                $ft=Fram::GetNumValue('ft');
	                if($zt && $zt>0)
	                {
	                	if($zt==1)
	                		$_where[]=$order->_State->w_and('=',0,'','','b');//$_where.=" and b.STATE=0";
	                	if($zt==2)
	                		$_where[]=$order->_State->w_and('=',1,'','','b');//$_where.=" and b.STATE=1";
	                
	                }
	                if($ft && $ft>0)
	                {
	                    if($ft==3.7){
	                        $_where[]=$detail->_State2->w_and('=',\Pub\Number::Jia($ft, 1),'','','a');//$_where.=" and a.STATE2=".($ft-1);
	                    }else{
	                        $_where[]=$detail->_State2->w_and('=',intval($ft)-1,'','','a');//$_where.=" and a.STATE2=".(intval($ft)-1);
	                    }
	                	
	                
	                }
	                if($st && $ed)
	                {
	                	$_where[]=$order->_AddTime->w_and('>=',"{$st} 0:0:0",'','','b');
	                	$_where[]=$order->_AddTime->w_and('<=',"{$ed} 23:59:59",'','','b');
	                	//$_where.= " and (b.ADD_TIME>='{$st} 0:0:0' and b.ADD_TIME<='{$ed} 23:59:59')";
	                }
	                
	                $rs=Bll\OrderMallDetail::GetListLeftOrderMall($PageNum,$PageSize,$_where,$total,"");
	                \Bll\User::SetRowsUserName($rs,'USER_ID',true);
					\Bll\User::SetRowsUserName($rs,'SHOP_ID');
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	         case "Del":
	         	if($RoleID!=1)die('无权操作');
	         	else{
	         		$ids=Fram::GetValue("IDS","");
	         		if($ids != "")
	         		{
	         			$mArr=array('error'=>0,'mess'=>'');
	         			if($ids != "")
	         			{
	         				$arr=explode(',', $ids);
	         				for($i=0;$i<count($arr);$i++)
	         				{
	         					$st=Bll\OrderMall::Column($arr[$i],'STATE');
	         					if($st==0||$st==-1){
	         						if(Bll\OrderMall::Del($arr[$i])){
	         							Bll\OrderMallDetail::DelWhere([$detail->_ProId->w('=',$arr[$i])]);
	         						}
	         					}
	         				}
	         			}
	         		}
	         		exit();
	         	}
	         	break;
	         	
	                
	              
	        }
	    }
	    
	    $C = "ID,ORDER_ID,USER_ID,SHOP_ID,PRO_ID,PRO_TYPE_ID,MONEY_PRO,MONEY_YUN_FEI,PRO_COUNT,HUI_DIAN_PRO,HUI_DIAN_USED,PRO_NAME,PRO_TYPE_NAME,STATE2,STATE,CARD_NUM,USER_ID_NAME,SHOP_ID_NAME,ADD_TIME,PAY_MONEY,PAY_HUI_DIAN,DO_TIME";
	    $F = "订单号,,ID,,-1,,Fa_Huo_Fun;编号,,ORDER_ID;产品,,PRO_NAME,,-1,,Fa_Huo_Fun;买方,,USER_ID_NAME;商家,,SHOP_ID_NAME;产品价格,,MONEY_PRO,,-1,,-1,,right;数量,,PRO_COUNT;产品运费,,MONEY_YUN_FEI,,-1,,-1,,right;实付金额,,PAY_MONEY,,-1,,-1,,right;实付惠点,,PAY_HUI_DIAN,,-1,,-1,,right;订单时间,,ADD_TIME,,150;支付状态,,STATE,,-1,,Mall_Order_State;收货状态,,STATE2,,-1,,Mall_Huo_State";//类型,,ROLE_ID,,-1,,RoleName;
	    //$F.=";详细,,ID,,-1,,OpenOrder";
	    //if(SysFram::getLoginRoleID()==1||SysFram::getLoginRoleID()==101||SysFram::getLoginRoleID()==85)
	    //	$F.=";,,STATE,,-1,,DelOrder";

	    $T =  '';//"操作::结单@@page@@EditAddress@@'ID='@@500@@300;;;";//操作::编 辑@@page@@EditAddress@@'ID=';;添 加@@page@@AddAddress;;关 闭@@page@@'/call/calllog/list/';;;
	    $Bar = (Bll\Role::Role_Id_Shop($RoleID) || $RoleID==1)?"发 货,,/css/js/ext/images/pen.gif,,Fa_Huo(),,#FF0000":'';
	    //$Bar.=$RoleID==1?'删除订单,,/css/js/ext/images/delete.gif,,ActDel();':'';
	    $GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html", "ID", "",$C,$F ,$T,$Bar,1,'SearchDiv');
	    $this->display('list',array('GridHtml'=>$GridHtml));
	}
	
	public function FaHuoAction()
	{
	    SysFram::CheckPagePower('339,367');
	    
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    if($RoleID!=1 && $RoleID!=100)
	        die('角色无权限');
	    
	    
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    
	    
	    
	    $end_shou_huo_time = $OrderDetail->EndShouHuoTime();
	    $TuiReason = $OrderDetail->TuiReason();
	     
	    $show_delay_shou_huo = 0;
	    $shou_huo_time = $OrderDetail->ShouHuoTime();
	    if($shou_huo_time&&$end_shou_huo_time&&floor((strtotime($end_shou_huo_time)-time())/86400)<=3&&floor((strtotime($end_shou_huo_time)-strtotime($shou_huo_time))/86400)<=24){
	        $show_delay_shou_huo = 1;
	    }
	    
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    if($OrderDetail->ShopId()!=$UID && $RoleID!=1)
	        die('无权访问');
	    
	    $State2 = $OrderDetail->State2();
	    
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	    
	    if(Fram::IsPost())
	    {
	        if($order->State()!=1)
	            die("parent.window.ExtAlert('该订单未支付。');");
	        
	        $KuaiDiGongSi=Fram::GetNumValue('kuai_di_gong_si_select_ids');
	        if(!Fram::CheckNum($KuaiDiGongSi))
	            die("parent.window.ExtAlert('请选择快递公司。');");
	        $DanHao=Fram::GetValue('dan_hao','');
	        if($DanHao=='' || strlen($DanHao)<2)
	            die("parent.window.ExtAlert('请输入正确的物流单号。');");
	        
	        //更新状态
	        $up=new Model\OrderMallDetail();
	        $up->Id($OrderDetailID);
	        if($OrderDetail->State2()==0)
	        {
	            $up->State2(1);
	            $up->FaHuoTime(Fram::Date());
	            $up->EndShouHuoTime(Fram::Data_Add_Day(10,$up->FaHuoTime()));
	        }
	        $up->KuaiDiGongSi($KuaiDiGongSi);
	        $up->KuaiDiDanHao($DanHao);
	        if(Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',0),$up->_State2->w_or('=',1)]))
	        {
	            if($OrderDetail->State2()==0)
	               Bll\OrderMallDetail::KuCun_Jian($OrderDetailID);
	            die("parent.window.ExtAlert('操作成功。');");
	        }
	        else 
	        {
	            die("parent.window.ExtAlert('操作失败。');");
	        }
	        
	    }
	    
	    
	    $this->display_layout('fahuo',['m'=>$OrderDetail,'order'=>$order,'show_delay_shou_huo'=>$show_delay_shou_huo,'State2'=>$State2,'TuiReason'=>$TuiReason]);
	    
	}
	
	//修改运费
	public function Change_yunfeiAction()
	{
	  
// 	    SysFram::CheckPagePower('339,367');
	    
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    
	    $OrderDetail=Bll_OrderMallDetail::GetModel($OrderDetailID);
	    
	    if($UID!=$OrderDetail->ShopId())
	        die('角色无权限');
	    
	    $ORDER_ID = $OrderDetail->OrderId();
	    
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	   
	    
	    $State2 = $OrderDetail->State2();
	    
	    if($State2!=-1){
	        die("只有未支付的订单才能修改!");
	    }
	    
	    $order=Bll_OrderMall::GetModel($OrderDetail->OrderId());
	    
	    if(Yii::app()->request->isPostRequest)
	    {
	        
	        $new_yunfei=Fram::GetNumValue('new_yunfei',-1);
	        if($new_yunfei<0)
	            die("alert('运费格式不正确。');");
	       
	        
	        //更新状态
	        $up=new Model_OrderMallDetail();
	        $up->Id($OrderDetailID);
	        
	        $up->MoneyYunFei($new_yunfei);
	        $up->ShopSetYunFei($new_yunfei);
	        
	        $r=true;
	        $Conn=Date::GetConnection();
	        $Tran=$Conn->beginTransaction();
	        $r = $r &&  Bll_OrderMallDetail::Update($up,$Conn,"STATE2='-1'");
	        $r = $r &&  Bll_OrderMall::OrderCheck($ORDER_ID,$Conn);
	         
	        if($r)
	        {
	            $Tran->commit();Fram::CloseConn($Conn);
	            die("alert('操作成功。');");
	        }
	        else
	        {
	            $Tran->rollback();Fram::CloseConn($Conn);
	            die("alert('操作失败。');");
	        }
	        
	        
	    }
	    
	    
	    $this->layout="ext";
	    $this->render('change_yunfei',array('m'=>$OrderDetail,'order'=>$order));
	    
	}
	
	public function ShouHuoAction()
	{
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	   
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    
	    $State2 = $OrderDetail->State2();
	    $ShouHuoTime = $OrderDetail->ShouHuoTime();
	    
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    if($OrderDetail->UserId()!=$UID && $RoleID!=1)
	        die('无权访问');
	     
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	    $pay_time = $order->PayTime();
	    
	    $show_tui = 0;
	    //支付3天后未发货 可以退货
	    if(($OrderDetail->State2()==0&&$order->State()==1&&floor((time()-strtotime($pay_time))/86400)>=0)||($OrderDetail->State2()==2&&floor((time()-strtotime($ShouHuoTime))/86400)<=7)){
	        $show_tui = 1;
	    }
	    
	    
	    if(\Pub\Fram::IsPost())
	    {
	        if($order->State()!=1)
	            die("parent.layer.alert('该订单未支付。');");
	         
	        //更新状态
	        $up=new Model\OrderMallDetail();
	        $up->Id($OrderDetailID);
	        $up->State2(2);
	        $up->ShouHuoTime(Fram::Date());
	        
	        $Conn=\Pub\Fram::GetConn(true);
	        $r=Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',1)],$Conn);
	        if(Fram::CheckNum($OrderDetail->Point()))
	        {
	            $r = $r && Bll\User::Billing_Do_Point($OrderDetail->UserId(), $OrderDetail->Point(), "商城订单".$OrderDetail->Id().'分配积分',$Conn,true,Bll\M::Mall(),true,true,$OrderDetail->Id());
	        }

	        if($r && $Conn->commit())
	        {
	            \Pub\Fram::CloseConn($Conn);
	            die("parent.layer.alert('收货成功。');".Pub\Js::WindowReLoad());
	        }
	        else
	        {
	            $Conn->rollBack();
	            \Pub\Fram::CloseConn($Conn);
	            die("parent.layer.alert('收货失败。');");
	        }
	         
	    }
	     
	    $this->display_layout('shouhuo',array('m'=>$OrderDetail,'order'=>$order,'State2'=>$State2,'show_tui'=>$show_tui));
	     
	}
	
	
	public function TuiHuoAction()
	{
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    $TuiReason=Fram::GetNumValue('tui_reason',1);
	   
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    
	    
	    $ShouHuoTime = $OrderDetail->ShouHuoTime();
	    $State2 = $OrderDetail->State2();
	    
	    if(floor((strtotime(Pub\Fram::Date())-strtotime($ShouHuoTime))/86400)>=7)
	    {
	        die('收货超过7天不能再进行退货处理!');
	    }
	    
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    if($OrderDetail->UserId()!=$UID && $RoleID!=1)
	        die('无权访问');
	     
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	    $pay_time = $order->PayTime();
	    //支付3天后未发货 可以退货
	    //if($OrderDetail->State2()==0&&$order->State()==1&&floor((time()-strtotime($pay_time))/86400)<3){
	    //    die('支付3天后才能申请退货!');
	    //}
	     
        //更新状态
        $up=new Model\OrderMallDetail();
        $up->Id($OrderDetailID);
        $up->State2(2.5);
        $up->TuiTime(Fram::Date());
        $up->TuiReason($TuiReason);
        $up->EndTuiTime(Fram::Data_Add_Day(3));
        

        if(Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',1),$up->_State2->w_or('=',2),$up->_State2->w_or('=',0)])){
            die("申请成功!");
        }else{
            die("申请失败!");
        }
	         
	}
	public function Tui_Huo_Fa_HuoAction()
	{
	    SysFram::CheckPagePower('339,367');
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    $TuiKuaidiDanhao=Fram::GetValue('TUI_KUAIDI_DANHAO');
	    $TuiKuaidi=Fram::GetNumValue('TUI_KUAIDI');
	   
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    if(!Fram::CheckNum($TuiKuaidi))
	        die('请选择使用的快递');
	    if(!$TuiKuaidiDanhao)
	        die('快递单号不能为空');
	   
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    
	    
	    $ShouHuoTime = $OrderDetail->ShouHuoTime();
	    $State2 = $OrderDetail->State2();
	    
	    
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    if($OrderDetail->UserId()!=$UID && $RoleID!=1)
	        die('无权访问');
	     
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	     
        //更新状态
        $up=new Model\OrderMallDetail();
        $up->Id($OrderDetailID);
        $up->State2(2.8);
        $up->TuiFahuoTime(Fram::Date());
        $up->TuiKuaidi($TuiKuaidi);
        $up->TuiKuaidiDanhao($TuiKuaidiDanhao);
        $up->EndTuiShouhuoTime(Fram::Data_Add_Day(10));
        

        if(Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.6)])){
            die("发货成功!");
        }else{
            die("发货失败!");
        }
	         
	}
	public function Xie_Tiao_Wan_ChengAction()
	{
	    SysFram::CheckPagePower('339,367');
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    $XieTiaoValue = Fram::GetNumValue('xie_tiao_value',1);
	   
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	   
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    if($RoleID!=1)
	        die('无权访问');
	     
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	     
        //更新状态
        $up=new Model\OrderMallDetail();
        $up->Id($OrderDetailID);
        
        if($XieTiaoValue==1)
        {
            if($OrderDetail->KuaiDiGongSi())
            {
                $up->State2(1);
            }else
            {
                $up->State2(0);
            } 
        }
        elseif($XieTiaoValue==2)
        {
            
            $Conn=Fram::GetConn(true);
            $r=true;
            
            $up->State2(4);
            //退款
            $r = $r && Bll\OrderMallDetail::Tui_Kuan($OrderDetailID,$Conn);
            $r = $r && Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.7)],$Conn);
             
            if($r && $Conn->commit())
            {
                Fram::CloseConn($Conn);
                die("操作成功!");
            }
            else
            {
                $Conn->rollback();Fram::CloseConn($Conn);
                die("操作失败!");
            }
            
        }
        elseif($XieTiaoValue==3)
        {
            $up->State2(2);
        }
       
        
        if(Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.7)])){
            die("操作成功!");
        }else{
            die("操作失败!");
        }
	         
	}
	public function Delay_Shou_HuoAction()
	{
	    SysFram::CheckPagePower('339,367');
	    
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	     
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    if($OrderDetail->UserId()!=$UID && $RoleID!=1)
	        die('无权访问');
	    
	    $end_shou_huo_time = $OrderDetail->EndShouHuoTime();
	    $shou_huo_time = $OrderDetail->ShouHuoTime();
	    
	    if(!$end_shou_huo_time||!$shou_huo_time){
	        die('暂时不能延期!');
	    }
	    if(floor((strtotime($end_shou_huo_time)-time())/86400)>=3){
	        die('暂时不能延期!');
	    }
	    
	    if(floor((strtotime($end_shou_huo_time)-strtotime($shou_huo_time))/86400)>=24){
	        die('最多延期15天!');
	    }
	    
	    $shou_huo_time = date('Y-m-d H:i:s',strtotime($end_shou_huo_time)+5*24*60*60);
	    
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	    
        //更新状态
        $up=new Model\OrderMallDetail();
        $up->Id($OrderDetailID);
        $up->EndShouHuoTime($shou_huo_time);
    
       
        if(Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',1)]))
        {
            die("延期收货成功");
        }
        else
        {
            die("延期收货失败");
        }
	         
	    
	     
	}
	public function Chuli_tui_huoAction()
	{
	    SysFram::CheckPagePower('339,367');
	    
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    $tongyi=Fram::GetNumValue('tongyi',1);
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	     
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    if($RoleID!=1 && $OrderDetail->ShopId()!=$UID)
	        die('角色无权限');
	    
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	    
        //更新状态
        $up=new Model\OrderMallDetail();
        $up->Id($OrderDetailID);
        if($tongyi==1){
            $up->State2(2.6);
            $up->State26Time(Fram::Date());
            //如果卖家没发货直接退款
            
            if(!$OrderDetail->KuaiDiDanHao()&&!$OrderDetail->FaHuoTime()){
                $Conn=\Pub\Fram::GetConn(true);
                $r=true;
                
                $up->State2(4);
                //退款
                $r = $r && Bll\OrderMallDetail::Tui_Kuan($OrderDetailID,$Conn);
                $r = $r && Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.5)],$Conn);
                 
                if($r && $Conn->commit()){
                    Fram::CloseConn($Conn);
                    die("处理成功!");
                }else{
                    $Conn->rollback();Fram::CloseConn($Conn);
                    die("处理失败!");
                }
            
            }
            
        }else{
            $up->State2(2.7);
        }
       
        if(\Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.5)])){
            die("处理成功!");
        }else{
            die("处理失败!");
        }
	         
	    
	     
	}
	public function Tui_Huo_Shou_HuoAction()
	{
	    SysFram::CheckPagePower('339,367');
	    
	     
	    $OrderDetailID=Fram::GetNumValue('ID',-1);
	    if(!Fram::CheckNum($OrderDetailID))
	        die('主键缺失');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	     
	    $OrderDetail=Bll\OrderMallDetail::Model($OrderDetailID);
	    if(!Fram::CheckNum($OrderDetail->Id()))
	        die('主键缺失2');
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    if($RoleID!=1 && $OrderDetail->UserId()!=$UID)
	        die('角色无权限');
	    
	    $order=Bll\OrderMall::Model($OrderDetail->OrderId());
	    
        //更新状态
        $up=new Model\OrderMallDetail();
        $up->Id($OrderDetailID);
        $up->State2(4);
        $up->TuiShouhuoTime(Fram::Date());
        
        $Conn=\Pub\Fram::GetConn(true);
        $r=true;
        
        
        //退款
        $r = $r && Bll\OrderMallDetail::Tui_Kuan($OrderDetailID,$Conn);
        $r = $r && Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.8)],$Conn);
       
        if($r && $Conn->commit()){
            Fram::CloseConn($Conn);
            die("收货成功!");
        }else{
            $Conn->rollback();Fram::CloseConn($Conn);
            die("收货失败!");
        }
	     
	}
	
	
	
	
	
}