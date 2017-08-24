<?php
use Pub\SysFram;
use Pub\Fram;
use Pub\Html;

class PayController extends yaf\Controller_Abstract
{
    
    public function NotifyAction()
    {
        require_once APP_PATH.'/../m/weixin/example/notify.php';
    }
    
    public function ScanAction()
    {
        $this->display('scan');
    }
    
    public function MoneyAction()
    {
        if(Fram::IsPost())
        {
            $UID=SysFram::GetLoginID();
            
            $Money=Fram::GetNumValue('MONEY');
            if(Fram::CheckNum($Money))
            {
                $m=new Model\CaiWu();
                $m->ModuleId(Bll\M::Chong_Zhi());
                $m->State(0);
                $m->Money($Money);
                $m->Mess('充值');
                $m->MoneyCanEdit(0);
                $m->UserId($UID);
                $DoID=$m->Insert();
                die(Pub\Js::LocationHref('/pay/js.html?id='.$DoID.'&abc=1',true));
            }
        }
        $this->display('pay-money');
    }
    
    
   
}