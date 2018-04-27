<?php
Use \Pub\Fram;
Use \Pub\SysFram;

class OrderController extends \Base\Api
{
    public function AddAction()
    {
        parent::CheckApiUser();
        
        $User_id = Fram::GetNumValue('api_user',-1);

		$Shopping_address_id = Fram::GetNumValue('address_id',0);
		if(!isset($_POST['data']))
		    die(parent::ToJson([],1,'无订购产品！'));
		foreach (isset($_POST['data'])?$_POST['data']:null as $k=>$pro) 
		{
			$Order_pros[$k]['pro_id'] = ($pro['id']);
			$Order_pros[$k]['pro_type_id'] = ($pro['typeid']);
			$Order_pros[$k]['pro_count'] = ($pro['count']);
			$Order_pros[$k]['mess'] = isset($pro['mess'])?$pro['mess']:'';
		}
		//file_put_contents("./error.txt", var_export($Shopping_address_id, true));
		//$Order_pros = json_encode($Order_pros);
		$res=\Bll\OrderMall::Order_add($User_id, $Order_pros, $Shopping_address_id);
		//{"error":0,"order_id":"1747263","next_url":"\/mall\/order.html?id=1747263"}

        echo parent::ToJson(['order_id'=>$res['order_id'],'order'=>\Bll\OrderMall::Row($res['order_id'],null,'ID as id,MONEY_ALL as rmb,ALL_HUI_DIAN as point'),'next_url'=>$res['next_url']]);//
    }
    
    public function Order_countAction()
    {
        parent::CheckApiUser();
    
        $User_id = Fram::GetNumValue('api_user',-1);
    
        $Time=\Pub\Fram::Data_Add_Day(-10);
        $data['not_pay_count'] = \Bll\OrderMallDetail::Column(null,'count(1)',"USER_ID='{$User_id}' and ADD_TIME>='{$Time}' and STATE2=-1");
        $data['not_recived_count'] = \Bll\OrderMallDetail::Column(null,'count(1)',"USER_ID='{$User_id}' and ADD_TIME>='{$Time}' and STATE2=1");
    
        echo parent::ToJson($data);
    }
    
    public function PayAction()
    {
        parent::CheckApiUser();
        $User_id = Fram::GetNumValue('api_user',-1);
    
        $ID=Fram::GetNumValue('id',0);
	    if(!Fram::CheckNum($ID))
	        die(parent::ToJson([],1,'无此订单！'));
	    
	    $m=Bll\OrderMall::Model($ID);
	    

	    if(!$m || $m->UserId()!=$User_id)
	        die(parent::ToJson([],1,'无此订单！'));
	    
	    if($m->State()==-1 || (time()-strtotime($m->AddTime()))>3.5*24*3600)
	        die(parent::ToJson([],1,'此订单下单时间太久,已被取消!'));
	    
	    if($m->State()!=0 && $m->State()!=0.1 )
	        die(parent::ToJson([],1,'此订单已经操作过。'));
	    
	    //处理订单
	    if(\Pub\Fram::IsPost())
	    {
	        self::DealOrder($ID,$m);
	    }
	    
	    $Conn=Fram::GetConn(true);
	    $OrderCheck=Bll\OrderMall::OrderCheck($ID,$Conn);
	    if($OrderCheck===true && $Conn->commit())
	    {
	        Fram::CloseConn($Conn);
	    }
	    else
	    {
	        $Conn->rollback();Fram::CloseConn($Conn);
	        if(is_array($OrderCheck))
	            die(parent::ToJson([],$OrderCheck['error'],$OrderCheck['mess']));
	        else
	            die(parent::ToJson([],1,'订单处理失败'));
	    }
	    

	    die(parent::ToJson([],0,''));
    }
    
    public static function DealOrder($OrderID,$m)
    {
        if(false)$m=new Model\OrderMall();
         
        $m_form=new Model\OrderMall();
        $m_form->getPost();
    
        $m_user=Bll\User::Model($m->UserId());
        if(!$m_user)
            die(parent::ToJson([],1,'无此用户。'));
        if($m_user->State()!=1)
            die(parent::ToJson([],1,'会员状态不正常'));
         
        if(!Fram::CheckNum($m_form->PayMoney(),true))
            die(parent::ToJson([],1,'输入的支付金额错误。'));
        if(!Fram::CheckNum($m_form->PayHuiDian(),true))
            die(parent::ToJson([],1,'输入的支付积分错误。'));
         
        if($m_user->Money()<$m_form->PayMoney())
            die(parent::ToJson([],1,'输入的支付金额不能大于用户余额。'));
        if($m_user->Point()<$m_form->PayHuiDian())
            die(parent::ToJson([],1,'输入的支付积分不能大于用户积分。'));
    
    
        if($m_form->PayMoney()>$m->MoneyAll())
            die(parent::ToJson([],1,'输入的支付金额不能大于订单余额。'));
        if($m_form->PayHuiDian()>$m->AllHuiDian())
            die(parent::ToJson([],1,'输入的支付积分不能大于订单积分。'));
         
        if($m_form->PayChongMoney()<0)
            $m_form->PayChongMoney(0);
         
        $AllPay=Pub\Number::Jia($m_form->PayMoney(), $m_form->PayHuiDian(),$m_form->PayChongMoney());
        if($m->MoneyAll()>0)
        {
            if(((string)floatval($AllPay)) != ((string)floatval($m->MoneyAll())))
                die(parent::ToJson([],1,'金额+积分不等于订单金额'));
        }
         
        $Conn=Fram::GetConn(true);
        $r=true;
         
         
        $up=new Model\OrderMall();
        $up->Id($m->Id());
        if($m_form->PayChongMoney()==0)
        {
            $up->State(1);
            $up->PayTime(Fram::Date());
             
            $up_detail=new \Model\OrderMallDetail();
            $up_detail->State2(0);
             
            $r = $r && Bll\OrderMallDetail::UpdateWhere($up_detail, [$up_detail->_OrderId->w('=',$m->Id())],$Conn);
        }
        else
            $up->State(0.1);
        $up->PayHuiDian($m_form->PayHuiDian());
        $up->PayMoney($m_form->PayMoney());
        $up->PayChongMoney($m_form->PayChongMoney());
         
         
        $r = $r && Bll\OrderMall::Update($up,[$up->_State->w('=',0),$up->_State->w_or('=',0.1)],$Conn);
        if($m_form->PayChongMoney()==0)
        {
            if($up->PayMoney()>0)
                $r = $r && Bll\User::Billing_Do_Money($m->UserId(), '-'.$up->PayMoney(), "商城订单编号{$m->Id()}扣款", $Conn,false,Bll\M::Mall(),true,true,$m->Id());
            if($up->PayHuiDian()>0)
                $r = $r && Bll\User::Billing_Do_Point($m->UserId(), '-'.$up->PayHuiDian(), "商城订单编号{$m->Id()}扣积分", $Conn,false,Bll\M::Mall(),true,true,$m->Id());
            $r = $r && Bll\OrderMall::OrderDetailFenPei($m->Id(),$Conn);
        }
         
        if($m_form->PayChongMoney()>0)
        {
            if($Conn->commit())
            {
                Fram::CloseConn($Conn);
                die(parent::ToJson(['state'=>'ChongZhi','id'=>$m->Id()]));
            }
            else
                Fram::CloseConn($Conn);
        }
        else
        {
            if($r && $Conn->commit())
            {
                Fram::CloseConn($Conn);
                die(parent::ToJson(['state'=>'ok']));//die("alert('支付完成。');parent.location.href='/order/list.html';");
                 
            }
            else
            {
                $Conn->rollback();Fram::CloseConn($Conn);
                die(parent::ToJson([],1,'操作失败。'));
            }
        }
         
         
        exit();
    }
    
    public function ListAction()
    {
        parent::CheckApiUser();
    
        $UID = Fram::GetNumValue('api_user',-1);
        $pagesize = 20;
        $total = 0;
        $page = Fram::GetNumValue('page',1);if($page<=0){$page=1;}
        $StatePay=Fram::GetNumValue('state_pay',-1);
    
        $m=new \Model\OrderMall();$md=new \Model\OrderMallDetail();
        $w=[$m->_UserId->w('=',$UID)];
        if($StatePay==1 || $StatePay==0)
        {
            array_push($w, $m->_State->w_and('=',$StatePay)); 
        }
        
        $Order=\Bll\OrderMall::GetList($page, $pagesize,$w,$total,'ID,STATE,PAY_MONEY_ALL,PAY_MONEY,PAY_HUI_DIAN,PAY_CHONG_MONEY,MONEY_ALL_YUN_FEI,MONEY_ALL,MONEY_ALL,ALL_HUI_DIAN,ADD_TIME','ID desc');
        $t2=0;$f='ID,ORDER_ID,PRO_ID,MONEY_PRO,MONEY_YUN_FEI,PRO_COUNT,HUI_DIAN_PRO,HUI_DIAN_USED,PRO_NAME,PRO_TYPE_NAME,STATE2,KUAI_DI_GONG_SI,KUAI_DI_DAN_HAO,SHOU_HUO_TIME,PAY_MONEY,PAY_HUI_DIAN,USED_MONEY_ALL,USED_YU_E,USED_BANK';
        for($i=0;$i<count($Order);$i++)
        {
            //3天内未支付订单可支付
            $Order[$i]['STATE_PAY_BUTTON']=(($Order[$i]['STATE']==0 || $Order[$i]['STATE']==0.1) && Fram::Time_Cha($Order[$i]['ADD_TIME'])<=3)?'1':'0';
            
            $Order[$i]['LIST']=\Bll\OrderMallDetail::GetList(1, 100,[$md->_OrderId->w('=',$Order[$i]['ID'])],$t2,$f,'ID asc');
            $KuaiDi=\Bll\ProYunFei::GetData_yun_fei();
            for($j=0;$j<count($Order[$i]['LIST']);$j++)
            {
                $Order[$i]['LIST'][$j]['PRO_PIC']=\Bll\Pro::Column($Order[$i]['LIST'][$j]['PRO_ID'],'PIC');
                $Order[$i]['LIST'][$j]['STATE_FA_HUO_BUTTON']=($Order[$i]['LIST'][$j]['STATE2']==1)?'1':'0';
                $Order[$i]['LIST'][$j]['KUAI_DI_GONG_SI_NAME']=($Order[$i]['LIST'][$j]['KUAI_DI_GONG_SI'] && Fram::CheckNum($Order[$i]['LIST'][$j]['KUAI_DI_GONG_SI']))?$KuaiDi[$Order[$i]['LIST'][$j]['KUAI_DI_GONG_SI']]["name"]:'';
            }
        }
        
        
        echo parent::ToJson(['ORDER'=>$Order,'page'=>$page,'allpage'=>ceil($total/$pagesize)]);
    }
    
    public function Shou_huoAction()
    {
        parent::CheckApiUser();
    
        $OrderDetailID=Fram::GetNumValue('id',-1);
        if(!Fram::CheckNum($OrderDetailID))
            die(parent::ToJson([],1,'主键缺失！'));
        $UID=Fram::GetNumValue('api_user',-1);
         
        $OrderDetail=\Bll\OrderMallDetail::Model($OrderDetailID);
         
        $State2 = $OrderDetail->State2();
        $ShouHuoTime = $OrderDetail->ShouHuoTime();
         
        if(!Fram::CheckNum($OrderDetail->Id()))
            die(parent::ToJson([],1,'主键缺失2！'));
        if($OrderDetail->UserId()!=$UID)
            die(parent::ToJson([],1,'无权访问！'));
        
        $order=Bll\OrderMall::Model($OrderDetail->OrderId());
        $pay_time = $order->PayTime();
         

        if($order->State()!=1)
            die(parent::ToJson([],1,'该订单未支付！'));
    
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
            die(parent::ToJson(['state'=>'ok']));
        }
        else
        {
            $Conn->rollBack();
            \Pub\Fram::CloseConn($Conn);
            die(parent::ToJson([],1,'操作失败!'));
        }
        
    }
	
}