<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Number;

class OrderMall
{

    //--user code start--
    //下单
    public static function Order_add($UserID,$OrderPros,$Shopping_Address_ID)
    {
        if(!Fram::CheckNum($UserID))
            return ['error'=>1,'mess'=>'无此用户'];

        //$OrderPros=$_POST['order_pros'];
        //$OrderPros=json_decode($OrderPros,true);
        if(!$OrderPros || !is_array($OrderPros) || count($OrderPros)<=0)
            return ['error'=>1,'mess'=>'无产品数据'];
        if(count($OrderPros)>50)
            return ['error'=>1,'mess'=>'订单产品过多，请分批结算'];

        $m_address=new \Model\ShoppingAddress();
        $Shopping_Address=\Bll\ShoppingAddress::Model($Shopping_Address_ID,[$m_address->_UserId->w('=',$UserID)]);
        if(!$Shopping_Address || !$Shopping_Address->Sheng() || !Fram::CheckNum($Shopping_Address->Sheng()))
            return ['error'=>1,'mess'=>'无此收货地址或收货地址数据缺失'];
         
         
        for($i=0;$i<count($OrderPros);$i++)
        {
            $row=$OrderPros[$i];
            if(!Fram::CheckNum($row["pro_id"]))
                return ['error'=>1,'mess'=>'pro_id数据错误'];
            if(!Fram::CheckNum($row["pro_type_id"]))
                return ['error'=>1,'mess'=>'pro_type_id数据错误'];
            if(!Fram::CheckNum($row["pro_count"]))
                return ['error'=>1,'mess'=>'pro_count数据错误'];
             
            $protype=\Bll\ProType::Model($row["pro_type_id"]);
            if(!$protype)
                return ['error'=>1,'mess'=>'无此产品类型'];
            if($protype->ProId()!=$row["pro_id"])
                return ['error'=>1,'mess'=>$row["pro_id"].'产品与类型不匹配'];
             
            $pro2=\Bll\Pro::Model($protype->ProId());
            if(!$pro2 || !Fram::CheckNum($pro2->UserId()))
                return ['error'=>1,'mess'=>$row["pro_id"].'产品信息有误'];
            if($pro2->State()!=1)
                return ['error'=>1,'mess'=>$pro2->Name().'产品已下架,不能购买'];
             
            $OrderPros[$i]['SHOP_ID']=$pro2->UserId();
            $OrderPros[$i]['GONG_YING_SHANG_ID'] = $pro2->GongYingShangId();
            $OrderPros[$i]['CHENG_BEN_PRICE'] = $protype->PriceCost();
             
            //if(!Fram::CheckNum($protype->CanUseYuE(),true))
            //    $protype->CanUseYuE(0);
            //$OrderPros[$i]['CAN_USE_YU_E']=$protype->CanUseYuE();
        }
         
        //添加订单
        $Conn=\Pub\Fram::GetConn(true);
        $r=true;

        $Order=new \Model\OrderMall();
        $Order->UserId($UserID);
        $Order->Sheng($Shopping_Address->Sheng());
        $Order->ShoppingAddressId($Shopping_Address_ID);
        $Order->State(0);
        $Order->AddTime(Fram::Date());
         
        $OrderID=$Order->Insert($Conn);
        if(!$OrderID || !Fram::CheckNum($OrderID))
        {
            Fram::CloseConn($Conn);
            return ['error'=>1,'mess'=>'下单失败'];
        }
         
    
        for($i=0;$i<count($OrderPros);$i++)
        {
            $row=$OrderPros[$i];
            $detail=new \Model\OrderMallDetail();
            $detail->OrderId($OrderID);
            $detail->UserId($UserID);
            $detail->ProId($row["pro_id"]);
            $detail->ShopId($row["SHOP_ID"]);
            $detail->ProTypeId($row["pro_type_id"]);
            $detail->ProCount($row["pro_count"]);
            $detail->Mess(Fram::StrCheck($row['mess']));
            if (!Fram::CheckNum($row["GONG_YING_SHANG_ID"]))
                $row["GONG_YING_SHANG_ID"] = 0;
            $detail->GongYingShangId($row["GONG_YING_SHANG_ID"]);
            $detail->ChengBenPrice($row["CHENG_BEN_PRICE"]);
    
            $detail->ShopRoleId(\Bll\User::GetRoleByID($row["SHOP_ID"]));
            //$detail->ShopRate(\Bll\User::GetShopRate($row["SHOP_ID"]));
            $detail->TypePoint(\Bll\ProType::Column($row['pro_type_id'],'POINT'));
            $detail->CanUseYuE(-1);//$row["CAN_USE_YU_E"]
            $detail->AddTime($Order->AddTime());
             
            $r = $r && $detail->Insert($Conn);
        }
         
        $OrderCheck=\Bll\OrderMall::OrderCheck($OrderID,$Conn);
        if(is_array($OrderCheck) && $OrderCheck['error']==1)
        {
            $r=false;
            return $OrderCheck;
        }
        else
            $r = $r && $OrderCheck;
         
        if($r && $Conn->commit())
        {
            Fram::CloseConn($Conn);
            return ['error'=>0,'order_id'=>$OrderID,'next_url'=>'/mall/order/pay.html?id='.$OrderID];
        }
        else
        {
            $Conn->rollback();Fram::CloseConn($Conn);
            return ['error'=>1,'mess'=>'下单失败'];
        }
         
    }
    
    
    //更新订单内产品 价格，积分
    public static function OrderDetailFenPei($OrderID,$Conn=null)
    {
        $Order=\Bll\OrderMall::Model($OrderID,null,$Conn);
         
        $All_Money=$Order->MoneyAllPro();
        $All_HuiDian=$Order->PayHuiDian();
        $Payed_YuE=$Order->PayMoney();
        $Payed_Bank=$Order->PayChongMoney();
        $t=0;$r=true;
        $OrderPros=\Bll\OrderMallDetail::GetList(1, 500,["ORDER_ID= ?",[$OrderID]],$t,'','ID asc',$Conn);
        for($i=0;$i<count($OrderPros);$i++)
        {
            $row=$OrderPros[$i];
            $Detail=new \Model\OrderMallDetail();
            $Detail->Id($row["ID"]);
            $Detail->PayHuiDian(self::MaxDeal($All_HuiDian, \Pub\Number::Cheng($row['HUI_DIAN_PRO'], $row['PRO_COUNT'])));
            $Detail->HuiDianUsed($Detail->PayHuiDian());
            $t=\Pub\Number::Cheng($row['MONEY_PRO'],$row['PRO_COUNT']);
            $t=\Pub\Number::Jia($t,$row['MONEY_YUN_FEI']);
            $t=\Pub\Number::Jian($t,$Detail->PayHuiDian());
            $Detail->PayMoney($t);
            //更新销量
            $pro=new \Model\Pro();
            $pro->Id($row['PRO_ID']);
            $pro->XiaoLiang(['+',$row['PRO_COUNT']]);
            $r = $r && $pro->Update(null,$Conn);
            
            //积分计算
            $p=0;
            $Point_PayMoney=\Pub\Number::Jian($Detail->PayMoney(), $row['MONEY_YUN_FEI']);
            $fen=$row['TYPE_POINT'];
            $fen=\Pub\Number::Cheng($fen, $row['PRO_COUNT']);
             
            if($Detail->PayHuiDian()>0  && $Point_PayMoney>0)
            {
                $p=Number::Cheng($Point_PayMoney, $fen);
                $p=Number::Chu($p, Number::Jia($Detail->PayHuiDian(), $Point_PayMoney));
            }
            else
            {
                $p=$fen;
            }
            $Detail->Point($p);
             
            //if($Order->UserId()==5005153)
            //余额，充值 额度分配
            $IsDo=true;
            //1.全部来自余额
            if($IsDo && $Payed_YuE >0  && Number::XiaoYu_DengYu($Detail->PayMoney(), $Payed_YuE))
            {
                $Detail->UsedYuE($Detail->PayMoney());
                $Detail->UsedBank(0);
                 
                $Payed_YuE=Number::Jian($Payed_YuE, $Detail->UsedYuE());
                $IsDo=false;
            }
            //2.一部分余额，一部分bank
            if($IsDo && $Payed_YuE >0  && Number::XiaoYu($Payed_YuE,$Detail->PayMoney()))
            {
                $Detail->UsedYuE($Payed_YuE);
                $Detail->UsedBank(Number::Jian($Detail->PayMoney(), $Payed_YuE));
                 
                $Payed_YuE=0;
                $Payed_Bank=Number::Jian($Payed_Bank, $Detail->UsedBank());
                $IsDo=false;
            }
            //3.全部bank
            if($IsDo && $Payed_YuE <=0)
            {
                $Detail->UsedYuE(0);
                $Detail->UsedBank($Detail->PayMoney());
    
                $Payed_YuE=0;
                $Payed_Bank=Number::Jian($Payed_Bank, $Detail->PayMoney());
                $IsDo=false;
            }
             
            $r = $r && \Bll\OrderMallDetail::Update($Detail,null,$Conn);
        }
         
        if($r)
            return true;
        else
            return false;
    }
    
    public static function MaxDeal(&$All,$Item)
    {
        $p=0;
        if($All<=0)
            return 0;
        if($All>=$Item)
        {
            $p=$Item;
            $All=\Pub\Number::Jian($All, $p);
        }
        else
        {
            $p=$All;
            $All=\Pub\Number::Jian($All, $p);
        }
         
        return $p;
    }
    
    public static function OrderCheck($OrderID,$Conn=null)
    {
        $Order=\Bll\OrderMall::Model($OrderID,null,$Conn);
        if(!$Order)
            return ['error'=>1,'mess'=>'无此订单'];
        
        if($Order->EditTime() && Fram::Time1_Time2_Cha($Order->EditTime())<2)
            return true;

        $Shopping_Address=\Bll\ShoppingAddress::Model($Order->ShoppingAddressId());
        if(!$Shopping_Address || !$Shopping_Address->Sheng() || !Fram::CheckNum($Shopping_Address->Sheng()))
            return ['error'=>1,'mess'=>'无此收货地址或收货地址数据缺失'];
        
        $All_Money=0;
        $All_HuiDian=0;
        $All_YunFei=0;
        $t=0;$r=true;
        
        $Detail=new \Model\OrderMallDetail();
        $OrderPros=\Bll\OrderMallDetail::GetList(1, 200,[$Detail->_OrderId->w('=',$OrderID)],$t,'','ID asc',$Conn);
        for($i=0;$i<count($OrderPros);$i++)
        {
            $row=$OrderPros[$i];
            $Detail=new \Model\OrderMallDetail();
            $Detail->Id($row[$Detail->_Id->k]);
    
            $pro=\Bll\Pro::Model($row[$Detail->_ProId->k]);
            if(!$pro)
                return ['error'=>1,'mess'=>'无此产品'];
            $Detail->ProName($pro->Name());
    
            $proType=\Bll\ProType::Model($row[$Detail->_ProTypeId->k]);
            if(!$proType)
                return ['error'=>1,'mess'=>'无此产品类型'];
            $Detail->ProTypeName($proType->Name());
    
            $Detail->MoneyPro($proType->Price());
            //if(Fram::CheckNum($pro->RoleId()))
            //   $Detail->ShopRoleId($pro->RoleId());
            $Detail->HuiDianPro($proType->HuiDian());
            if(!Fram::CheckNum($row[$Detail->_ShopSetYunFei->k],true))
            {
                $Detail->MoneyYunFei(\Bll\OrderMall::GetYunFei($pro->WuLiuId(),$row[$Detail->_ProCount->k],$Order->Sheng()));
            }
            else
            {
                $Detail->MoneyYunFei($row[$Detail->_ShopSetYunFei->k]);
            }
            $Detail->ShopRoleId(\Bll\User::GetRoleByID($row[$Detail->_ShopId->k]));
    
            $All_Money = Number::Jia($All_Money, Number::Cheng($Detail->MoneyPro(), $row[$Detail->_ProCount->k]));
            $All_HuiDian = Number::Jia($All_HuiDian, Number::Cheng($Detail->HuiDianPro(), $row[$Detail->_ProCount->k]));
            $All_YunFei = Number::Jia($All_YunFei,$Detail->MoneyYunFei());
    
            $r = $r && $Detail->Update(null,$Conn);

        }
        //更新订单
        $OrderUpdate=new \Model\OrderMall();
         
        if(Fram::CheckNum($Shopping_Address->Shi()))
            $OrderUpdate->Shi($Shopping_Address->Shi());
        if(Fram::CheckNum($Shopping_Address->Qu()))
            $OrderUpdate->Qu($Shopping_Address->Qu());
        if(Fram::CheckNum($Shopping_Address->Xian()))
            $OrderUpdate->Xian($Shopping_Address->Xian());
        $OrderUpdate->Address(Fram::StrCheck($Shopping_Address->Address()));
        $OrderUpdate->AddrPersonName($Shopping_Address->UserName());
        $OrderUpdate->AddrPersonTel($Shopping_Address->UserTel());
         
        //更新订单金额
        $OrderUpdate->Id($Order->Id());
        $OrderUpdate->MoneyAllPro($All_Money);
        $OrderUpdate->MoneyAllYunFei($All_YunFei);
        $OrderUpdate->MoneyAll(Number::Jia($All_Money, $All_YunFei));
        $OrderUpdate->AllHuiDian($All_HuiDian);
        $r = $r && \Bll\OrderMall::Update($OrderUpdate,null,$Conn);

        if($r)
            return true;
        else
            return ['error'=>1,'mess'=>'操作失败'];
    }
    
    //运费计算
    public static function ShoppingAddress($OrderID)
    {
        $Adress="";
        $m=\Bll\OrderMall::Model($OrderID);
        if(Fram::CheckNum($m->Sheng()))
            $Adress.=\Bll\China::Column($m->Sheng(),'NAME');
        if(Fram::CheckNum($m->Shi()))
            $Adress.=\Bll\China::Column($m->Shi(),'NAME');
        if(Fram::CheckNum($m->Qu()))
            $Adress.=\Bll\China::Column($m->Qu(),'NAME');
        if(Fram::CheckNum($m->Xian()))
            $Adress.=\Bll\China::Column($m->Xian(),'NAME');
         
    
        return "{$Adress} {$m->Address()}";
    
    }
    
    public static function GetYunFei($YunFeiID,$ProCount,$Sheng)
    {
        return \Bll\ProYunFei::GetYunFei($YunFeiID, $ProCount, $Sheng);
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\OrderMall::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\OrderMall::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function UpdateWhere($m,$Whare,$Conn=null,$_IfRowCount=true)
	{
	    return \Dal\OrderMall::UpdateWhere($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\OrderMall::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\OrderMall::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\OrderMall::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\OrderMall::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\OrderMall::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\OrderMall::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\OrderMall::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\OrderMall::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\OrderMall::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}