<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class OrderMallDetail
{

    //--user code start--
    public static function KuCun_Jian($DetailID,$Conn=null)
    {
        $m=\Bll\OrderMallDetail::Model($DetailID,null,$Conn);
        if(!Fram::CheckNum($m->Id()))
            return false;
         
        return \Pub\Data::Execute("update pro_type set KU_CUN=KU_CUN- ? where ID= ?",[$m->ProCount(),$m->ProTypeId()],$Conn);
    }
    
    public static function TongJi($State2,$UerID='ChuanHaiNull',$Time='ChuanHaiNull')
    {
        if($UerID=='ChuanHaiNull')
            $UerID=\Pub\SysFram::GetLoginID();
        
        $m=new \Model\OrderMallDetail();
        $w=null;
        $w[]=$m->_UserId->w('=',$UerID);
        $w[]=$m->_State2->w_and('=',$State2);
        if($Time!='ChuanHaiNull')
            $w[]=$m->_AddTime->w_and('>=',$Time);
         
        return \Bll\OrderMallDetail::Column(null,'count(1)',$w);
    }

    public static function Tui_Kuan($DetailID,$Conn=null)
    {
        $OrderDetail = \Bll\OrderMallDetail::Model($DetailID,null,$Conn);
         
        if(!$OrderDetail) return false;
         
        if(!Fram::CheckNum($OrderDetail->Id()))
            return false;
         
        $PayPoint = $OrderDetail->PayHuiDian();
        $UsedYuE = $OrderDetail->UsedYuE();
        $UsedBank = $OrderDetail->UsedBank();
        $Tui_Money=\Pub\Number::Jia($UsedYuE, $UsedBank);
         
        $r = true;
         
        if(Fram::CheckNum($Tui_Money))
        {
            $mes = '商城订单'.$DetailID.' 退款:'.$Tui_Money;
            $r = $r && \Bll\User::Billing_Do_Money($OrderDetail->UserId(),$Tui_Money,$mes,$Conn,true,\Bll\M::Mall());
        }
         
        if(Fram::CheckNum($PayPoint))
        {
            $mes = '商城订单'.$DetailID.' 退积分:'.$PayPoint;
            $r = $r && \Bll\User::Billing_Do_Point($OrderDetail->UserId(),$PayPoint,$mes,$Conn,true,\Bll\M::Mall());
        }

        return $r ;
         
    }

    public static function GetListLeftOrderMall($_PageNum,$_PageSize,$_Where=null,&$_RecordCount=0,$_Fields='',$_OrderBy='',$Conn=null)
    {
        $_PageNum--;
		$_PageSize=intval($_PageSize);
		if(!Fram::IsNotEmpty($_Fields))
		{
			$_Fields = " a.*,b.STATE,b.ADD_TIME ";
		}
		$_Fields=SysFram::SqlCheck($_Fields);
		if(!is_array($_Where) && Fram::IsNotEmpty($_Where))
		{
			//$_Where="where {$_Where}";
		}
		
		if(!$_OrderBy)
		    $_OrderBy='a.ORDER_ID desc,a.ID asc';
		
		if(Fram::IsNotEmpty($_OrderBy))
		{
		    $_OrderBy=SysFram::SqlCheck($_OrderBy);
			$_OrderBy="order by {$_OrderBy}";
		}
		if(!is_array($_Where))
		{
		    $_Where=[$_Where,null];
		}
		if(is_array($_Where))
		{
		    $_Where=Fram::ToPdoArr($_Where);
		    if(Fram::IsNotEmpty($_Where[0]))
		      $_Where[0]="where {$_Where[0]}";
		    $_RecordCount=\Pub\Data::Execute_Column("select count(1) from order_mall_detail a left join order_mall b on a.ORDER_ID=b.ID $_Where[0]",$_Where[1],$Conn);
			$Sql="select $_Fields from order_mall_detail a left join order_mall b on a.ORDER_ID=b.ID {$_Where[0]} {$_OrderBy} limit ".$_PageNum*$_PageSize.",{$_PageSize}";
			return \Pub\Data::Execute_FetchAll($Sql,$_Where[1],$Conn);
		}
		
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\OrderMallDetail::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\OrderMallDetail::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function UpdateWhere($m,$Whare,$Conn=null,$_IfRowCount=true)
	{
	    return \Dal\OrderMallDetail::UpdateWhere($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\OrderMallDetail::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\OrderMallDetail::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\OrderMallDetail::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\OrderMallDetail::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\OrderMallDetail::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\OrderMallDetail::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\OrderMallDetail::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\OrderMallDetail::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\OrderMallDetail::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}