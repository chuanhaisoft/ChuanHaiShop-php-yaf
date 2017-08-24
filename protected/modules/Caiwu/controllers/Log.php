<?php
use Pub\SysFram;
use Pub\Fram;

class LogController extends yaf\Controller_Abstract
{
	public function ListAction()
	{
	    SysFram::CheckPagePower(374);$UID=SysFram::GetLoginID();
	    
	    $act=Fram::GetValue("act");
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Pub\Ext::InitPageSize($PageNum, $start, $PageSize);
	
	                $StartTime=Fram::GetValue('starttime');
	                $EndTime=Fram::GetValue('endtime');
	                 
	                $_where = '1=1';
	                if(SysFram::getLoginRoleID()!=1 && SysFram::getLoginRoleID()!=75)
	                    $_where="USER_ID='{$UID}'";

	                         if($StartTime && $EndTime)
	                         {
	                             $_where.= " and (a.ACT_TIME>='{$StartTime} 0:0:0' and a.ACT_TIME<='{$EndTime} 23:59:59')";
	                         }
	                         	
	                         $Name=Fram::GetValue('name','');
	                         //if($Name!='')
	                         //    $_where .= " and b.NAME like '{$Name}%'";
	                

	                $rs=Bll\MoneyLog::GetList($PageNum,$PageSize,$_where,$total,"*",'ID desc');
	                \Bll\User::SetRowsUserName($rs);
	                
	                echo Pub\Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	                 
	                 
	        }
	    }
	
	    $C = "ID,USER_ID_NAME,MONEY,STATE,ACT_TIME,MESS,NAME,CARD_NUM,POINT,TALK_TIME,LEFT_MONEY,RIGHT_MONEY,MESSAGE_COUNT";
	    $F = ('用户,,USER_ID_NAME;')."操作前余额,,LEFT_MONEY,,-1,,-1,,right;金额,,MONEY,,-1,,FormatMoney,,right;操作后余额,,RIGHT_MONEY,,-1,,-1,,right;积分,,POINT,,-1,,FormatMoney,,right;说明,,MESS;发生时间,,ACT_TIME";
	    $T =  '';
	    $Bar = "";
	    $GridHtml = Pub\Ext::GridStr(-1,Fram::CurrentUrl(), "", "", "ID", "日志",$C,$F ,$T,$Bar,1,'SearchDiv');

	    $this->display('log',array('GridHtml'=>$GridHtml));
	}
	
}
