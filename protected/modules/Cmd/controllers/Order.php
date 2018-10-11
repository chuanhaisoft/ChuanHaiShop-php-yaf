<?php
use Pub\SysFram;
use Pub\Fram;
use Pub\Number;
class OrderController extends \Base\ControllerCmd 
{
    public function DoAction()
    {
         while(true)
         {
             //已发货的超过15天自动收货
             self::ChaoQi_UserShouHuo();
             
             //3天后的订单自动取消
             $CurrTime=Fram::Data_Add_Day(-3);
             
             $order=new Model\OrderMall();
             $order->State(-1);
             Bll\OrderMall::UpdateWhere($order, [$order->_State->w('=',0),$order->_AddTime->w_and('<',$CurrTime)]);
             
             $order=new Model\OrderMall();
             $order->State(-1.1);
             Bll\OrderMall::UpdateWhere($order, [$order->_State->w('=',0.1),$order->_AddTime->w_and('<',$CurrTime)]);
             
             //7天未发货退款
             self::ChaoQi_TuiKuan();
             
             //退货申请3天未处理自动同意
             //self::ChaoQi_TongYiTuiHuo();
             
             //商家同意退货，会员3天不发货，则订单状态修改为用户已收货
             //self::ChaoQi_UserFaHuo();
             
             //退货发货15天未收货自动收货
             self::ChaoQi_MaiJiaShouHuo();
             
             //商家同意退货，会员发货后，x天商家自动收货
             //$CurrTime=Fram::Data_Add_Day(-3);
             
             
             
             sleep(30*60);
         }
    }
    
    function ChaoQi_UserShouHuo()
    {
        $CurrTime=Fram::Data_Add_Fen(2);
        $_total=0;
        $up=new Model\OrderMallDetail();
        $AllMallDetails = \Bll\OrderMallDetail::GetList(1, 1000,[$up->_State2->w('=',1),$up->_EndShouHuoTime->w_and('<',$CurrTime)],$_total,'*','ID asc');
        while ($AllMallDetails)
        {
            foreach ($AllMallDetails as $v)
            {
                 
                $up=new Model\OrderMallDetail();
                $up->Id($v['ID']);
    
                $Conn=Fram::GetConn(true);
                $r=true;
                $up->State2(2);
                $up->ShouHuoTime(Pub\Fram::Date());

                $r = $up->Update([$up->_State2->w('=',1)],$Conn);
                if(Fram::CheckNum($v[$up->_Point->k]))
                {
                    $r= $r && Bll\User::Billing_Do_Point($v[$up->_UserId->k], $v[$up->_Point->k], "商城订单".$v['ID'].'分配积分',$Conn,true,Bll\M::Mall(),true,true,$v['ID']);
                }

                if($r && $Conn->commit()){
                    Fram::CloseConn($Conn);
                }else{
                    $Conn->rollback();Fram::CloseConn($Conn);
                }
    
    
            }
            $AllMallDetails = \Bll\OrderMallDetail::GetList(1, 1000,[$up->_State2->w('=',1),$up->_EndShouHuoTime->w_and('<',$CurrTime)],$_total,'*','ID asc');
        }
         
    
    
    }
    
     
     //商家同意退货，会员3天不发货，则订单状态修改为用户已收货
     function ChaoQi_UserFaHuo()
     {
         $CurrTime=Fram::Data_Add_Day(-3);
         $_total=0;
         $up=new Model\OrderMallDetail();
         $AllMallDetails = \Bll\OrderMallDetail::GetList(1, 1000,[$up->_State2->w('=',2.6),$up->_State26Time->w_and('<',$CurrTime)],$_total,'*','ID asc');
         while ($AllMallDetails)
         {
             foreach ($AllMallDetails as $v)
             {
             
                 $up=new Model\OrderMallDetail();
                 $up->Id($v['ID']);

                 if(1==1)
                 {
                     $Conn=Fram::GetConn(true);
                     $r=true;
                      
                     $up->State2(2);
                     $up->TuiShouhuoTime(Fram::Date());

                     $r = Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.6)],$Conn);
                      
                     if($r && $Conn->commit()){
                         Fram::CloseConn($Conn);
                     }else{
                         $Conn->rollback();Fram::CloseConn($Conn);
                     }
                      
                 }
                  
             }
             $AllMallDetails = \Bll\OrderMallDetail::GetList(1, 1000,[$up->_State2->w('=',2.6),$up->_State26Time->w_and('<',$CurrTime)],$_total,'*','ID asc');
         }
         
          
          
     }
     
     //7天未发货退款
     function ChaoQi_TuiKuan()
     {
         //7天后的订单自动退款
         $CurrTime=Fram::Data_Add_Day(-7);
         $_total=0;
         $AllMallDetails = Bll\OrderMallDetail::GetListLeftOrderMall(1, 1000,"b.STATE='1' and a.STATE2='0' and b.PAY_TIME<'{$CurrTime}'",$_total,'a.*,b.STATE,b.PAY_TIME','ID asc');
         
         foreach ($AllMallDetails as $v)
         {
             if(empty($v['KUAI_DI_DAN_HAO'])&&empty($v['FA_HUO_TIME']))
             {
                 $up=new Model\OrderMallDetail();
                 $up->Id($v['ID']);
                 $up->State2(-1.2);
                 $Conn=Fram::GetConn(true);
                 $r=true;
                  
                 //退款
                 $r = $r && Bll\OrderMallDetail::Tui_Kuan($v['ID'],$Conn);
                 $r = $r && Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',0)],$Conn);
                 
                 if($r && $Conn->commit()){
                     Fram::CloseConn($Conn);
                 }else{
                     $Conn->rollback();Fram::CloseConn($Conn);
                 }
                 
             }             
            
         }
         
         
     }
     //退货申请3天未处理自动同意
     function ChaoQi_TongYiTuiHuo()
     {
         
         $CurrTime=Fram::Data_Add_Day(-3);
         $_total=0;
         $AllMallDetails = Bll\OrderMallDetail::GetListLeftOrderMall(1, 1000," a.STATE2='2.5' and a.TUI_TIME<'{$CurrTime}'",$_total,'a.*,b.STATE,b.PAY_TIME','ID asc');
         
         foreach ($AllMallDetails as $v)
         {
             
             $up=new Model\OrderMallDetail();
             $up->Id($v['ID']);
            
            //如果卖家没发货直接退款            
            if(!$v['KUAI_DI_DAN_HAO']&&!$v['FA_HUO_TIME'])
            {
                $Conn=Fram::GetConn(true);
                $r=true;
                
                $up->State2(4);
                //退款
                $r = $r && Bll\OrderMallDetail::Tui_Kuan($v['ID'],$Conn);
                $r = $r && Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.5)],$Conn);
                
                if($r && $Conn->commit()){
                    Fram::CloseConn($Conn);
                }else{
                    $Conn->rollback();Fram::CloseConn($Conn);
                }               
            
            }
            else
            {
                
                $up->State2(2.6);
                $up->State26Time(Fram::Date());
                Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.5)]);
                
            }
            
         }         
         
     }
     //退货发货15天未收货自动收货
     function ChaoQi_MaiJiaShouHuo()
     {
         $CurrTime = Fram::Data_Add_Fen(2);
         $_total=0;
         
         $AllMallDetails = Bll\OrderMallDetail::GetListLeftOrderMall(1, 1000,"a.STATE2='2.8' and a.END_TUI_SHOUHUO_TIME<'{$CurrTime}'",$_total,'a.*,b.STATE,b.PAY_TIME','ID asc');
         
         foreach ($AllMallDetails as $v)
         {
             
             //更新状态
            $up=new Model\OrderMallDetail();
            $up->Id($v['ID']);
            $up->State2(4);
            $up->TuiShouhuoTime(Fram::Date());
            
            $Conn=Fram::GetConn(true);
            $r=true;
            
            
            //退款
            $r = $r && Bll\OrderMallDetail::Tui_Kuan($v['ID'],$Conn);
            $r = $r && Bll\OrderMallDetail::Update($up,[$up->_State2->w('=',2.8)],$Conn);
            
            if($r){
                $Conn->commit();Fram::CloseConn($Conn);
            }else{
                $Conn->rollback();Fram::CloseConn($Conn);
            }
            
         }         
         
     }
    
    
    
}