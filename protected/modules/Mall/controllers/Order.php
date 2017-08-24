<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Number;

class OrderController extends \Base\ControllerAdmin
{   
	public function PayAction()
	{
	    $ID=Fram::GetNumValue('id',0);
	    if(!Fram::CheckNum($ID))
	        die('无此订单');
	    
	    $m=Bll\OrderMall::Model($ID);
	    

	    if(!$m || $m->UserId()!=\Pub\SysFram::GetLoginID())
	        die('无此订单');
	    
	    if($m->State()==-1 || (time()-strtotime($m->AddTime()))>3.5*24*3600)
	        die("此订单下单时间太久,已被取消!");
	    
	    if($m->State()!=0 && $m->State()!=0.1 )
	        die("alert('此订单已经操作过。');");
	    
	    //处理订单
	    if(\Pub\Fram::IsPost())
	    {
	        $this->DealOrder($ID,$m);
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
	            die(json_encode($OrderCheck));
	        else
	            die('订单处理失败');
	    }
	    

	    $this->display('pay',array('m'=>$m));
	}
	
	function DealOrder($OrderID,$m)
	{
	    if(false)$m=new Model\OrderMall();
	    
	    $m_form=new Model\OrderMall();
	    $m_form->getPost();

	    $m_user=Bll\User::Model($m->UserId());
	    if(!$m_user)
	        die("alert('无此用户。');");
	    if($m_user->State()!=1)
	        die("alert('会员状态不正常');");
	    
	    if(!Fram::CheckNum($m_form->PayMoney(),true))
	        die("alert('输入的支付金额错误。');");
	    if(!Fram::CheckNum($m_form->PayHuiDian(),true))
	        die("alert('输入的支付积分错误。');");
	    
	    if($m_user->Money()<$m_form->PayMoney())
	        die("alert('输入的支付金额不能大于用户余额。');");
	    if($m_user->Point()<$m_form->PayHuiDian())
	        die("alert('输入的支付积分不能大于用户积分。');");


	    if($m_form->PayMoney()>$m->MoneyAll())
	        die("alert('输入的支付金额不能大于订单余额。');");
	    if($m_form->PayHuiDian()>$m->AllHuiDian())
	        die("alert('输入的支付积分不能大于订单积分。');");
	    
	    if($m_form->PayChongMoney()<0)
	        $m_form->PayChongMoney(0);
	    
	    $AllPay=Pub\Number::Jia($m_form->PayMoney(), $m_form->PayHuiDian(),$m_form->PayChongMoney());
	    if($m->MoneyAll()>0)
	    {
	        if(((string)floatval($AllPay)) != ((string)floatval($m->MoneyAll())))
	            die("alert('金额+惠点不等于订单金额');");
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
	            die("ChongZhi(".$m->Id().");");
	        }
	        else 
	            Fram::CloseConn($Conn);
	    }
	    else 
	    {
	        if($r && $Conn->commit())
	        {
	            Fram::CloseConn($Conn);
	            die("alert('支付完成。');parent.location.href='/order/list.html';");
	        
	        }
	        else
	        {
	            $Conn->rollback();Fram::CloseConn($Conn);
	            die("alert('操作失败。');");
	        }
	    }
	    
	    
	    exit();
	}
	
	//余额不足充值
	public function Caiwutoorderaction()
	{
	    $OrderMailID=Fram::GetNumValue('id',0);
	    //$UserID=Fram::GetNumValue('userid');
	    //$Money=Fram::GetNumValue('money');
	    $Type=Fram::GetNumValue('type',1);
	    if(!Fram::CheckNum($OrderMailID))
	        die("信息错误");
	    
	    $order_mall=Bll\OrderMall::Model($OrderMailID);
	    if(!$order_mall)
	        die("订单错误");
	    if($order_mall->UserId()!=\Pub\SysFram::GetLoginID())
	        die("订单所属错误");

	    $m=new Model\CaiWu();
	    $m->ModuleId(Bll\M::Mall_Yuer_Bu_Zu());
	    $m->UserId($order_mall->UserId());
	    $m->ActUserId($order_mall->UserId());
	    $m->Mess("订单{$OrderMailID}金额不足充值");
	    $m->MessId($OrderMailID);
	    $m->Money($order_mall->PayChongMoney());
	    $m->ActTime(Fram::Date());
	    $m->State(0);
	     
	    $ID=Bll\CaiWu::Insert($m);
	    if($ID && is_numeric($ID))
	    {
	        if($Type==1)
	            $PageAddress="/pay/scan.html?id={$ID}";

	        echo Pub\Js::ScriptHead();
	        echo Pub\Js::LocationHref($PageAddress);
	        echo Pub\Js::ScriptEnd();
	    }
	    else
	    {
	        echo "入库失败";
	    }
	     
	}
	
}
