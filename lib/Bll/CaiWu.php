<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class CaiWu
{

    //--user code start--
    public static  function Update_Chong_State($ID,$JinEr=null)
    {
        if(!$ID || !is_numeric($ID))
            return false;
         
        $r=true;
         
        $m=new \Model\CaiWu();$m=\Bll\CaiWu::Model($ID);
         
        if($m->State()==2)
            return true;
         
        $Conn=\Pub\Fram::GetConn(true);
         
    	$w='';
	    if($JinEr && is_numeric($JinEr) && $JinEr>0)
	    {
	        $w=",MONEY='{$JinEr}'";
	        $m->Money($JinEr);
	    }
         
        $time=Fram::Date();
        if(1==2){}
        else
        {
            switch($m->ModuleId())
            {
                case \Bll\M::Mall_Yuer_Bu_Zu():
                    if($JinEr>=$m->Money() && Fram::CheckNum($m->MessId()))
                    {
                        $mallorder=\Bll\OrderMall::Model($m->MessId());if(!$mallorder)$mallorder=new \Model\OrderMall();
                        //"(MONEY>='{$mallorder->PayMoney()}' and HUI_DIAN>='{$mallorder->PayHuiDian()}')",'-'.$mallorder->PayHuiDian()
                        $r = $r && \Bll\User::Billing_Do_Money($m->UserId(), '-'.$mallorder->PayMoney(),"商城订单充值({$ID})成功,金额{$JinEr},另商城订单{$m->MessId()}完成扣款",$Conn,false,\Bll\M::Mall(),true,true,$m->MessId(),$ID);
                        if($mallorder->PayHuiDian()>0)
                        {
                            $r = $r && \Bll\User::Billing_Do_Point($m->UserId(), '-'.$mallorder->PayHuiDian(),"商城订单充值({$ID})成功,金额{$JinEr},另商城订单{$m->MessId()}完成扣积分",$Conn,false,\Bll\M::Mall(),true,true,$m->MessId(),$ID);
                        }
                        $mallorder=new \Model\OrderMall();
                        $mallorder->Id($m->MessId());
                        $mallorder->PayTime(Fram::Date());
                        $mallorder->PayChongZhiOrderNum($ID);
                        $mallorder->State(1);
                        $r = $r && \Bll\OrderMall::Update($mallorder,"(STATE='0.1' or STATE='-1.1')",$Conn);
                        $r = $r && \Bll\OrderMall::OrderDetailFenPei($mallorder->Id(),$Conn);
                        $r = $r && \Pub\Data::RunCommend("update order_mall_detail set STATE2='0' where ORDER_ID='".$m->MessId()."'",$Conn);
                    }
                    else
                    {
                        $r = $r && \Bll\User::Billing_Do_Money($m->UserId(), $m->Money(),"商城订单({$m->MessId()})充值({$ID})成功，加款:".$m->Money(),$Conn,null,\Bll\M::Chong_Zhi(),true,true,$m->MessId(),$ID);
                    }
                    break;
                //default:
                //    $r = $r && \Bll\User::Billing_Do_MessageCount($m->UserId(), $m->Money(),"充值成功，兑枫叶:".$m->Money().'个',$Conn,false,\Bll\M::Chong_Zhi());
                //    $r = $r && \Bll\User::DealMoneyPayTotal($m->UserId(), $m->Money(), $Conn);
            }
             
        }
         
        $r = $r && \Pub\Data::RunCommend("update cai_wu set STATE=2,DO_TIME='{$time}'$w where ID='{$ID}' and STATE=0",$Conn);
        if($r)
        {
            $Conn->commit();Fram::CloseConn($Conn);
            return true;
        }
        else
        {
            $Conn->rollback();Fram::CloseConn($Conn);
            return false;
        }
         
         
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\CaiWu::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=false)
	{
		return \Dal\CaiWu::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\CaiWu::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\CaiWu::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\CaiWu::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\CaiWu::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\CaiWu::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\CaiWu::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\CaiWu::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\CaiWu::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\CaiWu::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}