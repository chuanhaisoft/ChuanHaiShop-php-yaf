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
                case \Bll\M::Chong_Zhi():
                    $r = $r && \Bll\User::Billing_Do_MessageCount($m->UserId(), $m->Money(),"充值成功，兑枫叶:".$m->Money().'个',$Conn,false,\Bll\M::Chong_Zhi());
                    $r = $r && \Bll\User::DealMoneyPayTotal($m->UserId(), $m->Money(), $Conn);
                    break;
                case \Bll\M::Chong_Zhi_Month():
                    if($m->Mess2()==1)
                    {
                        $up=new \Model\TravelDuanZu();
                        $up->Id($m->MessId());
                        $up->AdType(2);
                        $up->AdState(1);
                        $up->AdStartTime(Fram::Date());
                        $up->AdEndTime(Fram::Data_Add_Day(30));
                        $r = $r && $up->Update(null,null,true);
                        $Mess="充值{$JinEr}消费于短租信息{$m->Mess()}包月费用";
                    }
                    if($m->Mess2()==2)
                    {
                        $up=new \Model\XiuXian();
                        $up->Id($m->MessId());
                        $up->AdType(2);
                        $up->AdState(1);
                        $up->AdStartTime(Fram::Date());
                        $up->AdEndTime(Fram::Data_Add_Day(30));
                        $r = $r && $up->Update(null,null,true);
                        $Mess="充值{$JinEr}消费于休闲信息{$m->Mess()}包月费用";
                    }
                    if($m->Mess2()==3)
                    {
                        $up=new \Model\TravelGongLue();
                        $up->Id($m->MessId());
                        $up->AdType(2);
                        $up->AdState(1);
                        $up->AdStartTime(Fram::Date());
                        $up->AdEndTime(Fram::Data_Add_Day(30));
                        $r = $r && $up->Update(null,null,true);
                        $Mess="充值{$JinEr}消费于景点信息{$m->Mess()}包月费用";
                    }
                    $r = $r && \Bll\MoneyLog::DoLog($m->UserId(), $JinEr,$Mess,\Bll\M::Chong_Zhi_Month(),$Conn,0,0,$m->MessId(),$ID,0);
                    break;
                default:
                    $r = $r && \Bll\User::Billing_Do_MessageCount($m->UserId(), $m->Money(),"充值成功，兑枫叶:".$m->Money().'个',$Conn,false,\Bll\M::Chong_Zhi());
                    $r = $r && \Bll\User::DealMoneyPayTotal($m->UserId(), $m->Money(), $Conn);
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