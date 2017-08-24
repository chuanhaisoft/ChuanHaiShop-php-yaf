<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class DiaoboController extends \Base\ControllerAdmin
{
	public function IndexAction()
	{
	    SysFram::CheckPagePower(369);
	
	    $this->display('index',array('admin_user'=>''));
	}
	
	public function MoneyAction()
	{
	    SysFram::CheckPagePower(310);$UID=SysFram::GetLoginID();
	    $user=new \Model\User();
	    $moneylog=new \Model\MoneyLog();
	    //列表
	    $act=Fram::GetValue("act");
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
	
	                $_where = [$moneylog->_ModuleId->w('=',Bll\M::Diao_Bo_Money())];
	                $rs=Bll\MoneyLog::GetList($PageNum,$PageSize,$_where,$total,"*",'ID desc');
	                Bll\User::SetRowsUserName($rs,'USER_ID');
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	                 
	                 
	        }
	    }
	
	    $C = "ID,POINT,MONEY,MESS,ACT_TIME,USER_ID_NAME";
	    $F = "用户,,USER_ID_NAME;金额,,MONEY;说明,,MESS;时间,,ACT_TIME";
	    $T =  '';
	    $Bar = "";
	    $GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), "", "", "ID", "",$C,$F ,$T,$Bar,1,-210);
	     
	     
	     
	
	    if(\Pub\Fram::IsPost())
	    {
	        $r=true;
	         
	        $Point = Fram::GetValue( 'MONEY');
	        $Mess= Fram::GetValue('MESS','');
	        if(!$Mess)
	            $Mess="金额调拨";

	        $PersonID=Fram::GetValue( 'LOGIN_NAME');
	        $PersonID=Bll\User::GetIdByLoginName($PersonID);
	        if(!$PersonID || !is_numeric($PersonID))
	            die("parent.window.ExtAlert('无效用户，请重新输入。')");
	        
	        if(!$Point || !is_numeric($Point))
	            die("parent.window.ExtAlert('金额错误，请重新输入。')");
	       
	        if($Point<0){
	        	$mm=Bll\User::GetUserMoney($PersonID);
	        	if(abs($Point)>$mm)
	        		die("parent.window.ExtAlert('金额错误，请重新输入。')");
	        }
	        
	         
	        $Conn=\Pub\Fram::GetConn(true);
	
	        $r = Bll\User::Billing_Do_Money($PersonID, $Point, $Mess, $Conn,true,Bll\M::Diao_Bo_Money(),true,true);
	        if($r)
	        {
	            $Conn->commit();
	            echo("parent.window.ExtAlert('操作成功！');DoView();");
	            echo Pub\Js::FormResert();
	
	        }
	        else
	        {
	            $Conn->rollback();
	            echo("parent.window.ExtAlert('操作失败！');");
	        }
	        Fram::CloseConn($Conn);
	        echo Pub\Js::ParentDoView(true);
	        exit();
	    }
	
	    //$m=Bll\User::Model($UID);
	
	    $this->display_layout('money',array('m'=>$user,'GridHtml'=>$GridHtml));
	}
	
	public function PointAction()
	{
	    SysFram::CheckPagePower(369);$UID=SysFram::GetLoginID();
	    $user=new Model\User();
	    $moneylog=new Model\MoneyLog();
	    //列表
	    $act=Fram::GetValue("act");
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
	
	                $_where =[$moneylog->_ModuleId->w('=',Bll\M::Diao_Bo_Point())];
	                $rs=Bll\MoneyLog::GetList($PageNum,$PageSize,$_where,$total,"*",'ID desc');
	                Bll\User::SetRowsUserName($rs,'USER_ID');
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	                 
	                 
	        }
	    }
	
	    $C = "ID,POINT,MONEY,MESS,ACT_TIME,USER_ID_NAME";
	    $F = "用户,,USER_ID_NAME;惠点,,POINT;说明,,MESS;时间,,ACT_TIME";
	    $T =  '';
	    $Bar = "";
	    $GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), "", "", "ID", "",$C,$F ,$T,$Bar,1,-220);
	     
	     
	     
	
	    if(\Pub\Fram::IsPost())
	    {
	        $r=true;
	         
	        $Point = Fram::GetValue('POINT');
	        
	        $PersonID=Fram::GetValue( 'LOGIN_NAME');
	        $PersonID=Bll\User::GetIdByLoginName($PersonID);
	        if(!$PersonID || !is_numeric($PersonID))
	            die("parent.window.ExtAlert('无效用户，请重新输入。')");
	         
	        if(!$Point || !is_numeric($Point))
	            die("parent.window.ExtAlert('积分数错误，请重新输入。')");
	        $Mess= Fram::GetValue('MESS','')."积分调拨";
	         
	        $Conn=\Pub\Fram::GetConn(true);
	       
	        $r = Bll\User::Billing_Do_Point($PersonID, $Point, $Mess, $Conn,true,Bll\M::Diao_Bo_Point(),true,true);
	        
	         
	        if($r)
	        {
	            $Conn->commit();
	            echo("parent.window.ExtAlert('操作成功！');DoView();");
	            echo Pub\Js::FormResert();
	
	        }
	        else
	        {
	            $Conn->rollback();
	            echo("parent.window.ExtAlert('操作失败！');");
	        }
	        Fram::CloseConn($Conn);
	        echo Pub\Js::ParentDoView(true);
	        exit();
	    }
	
	    //$m=Bll\User::Model($UID);
	
	    $this->display_layout('point',array('m'=>$user,'GridHtml'=>$GridHtml));
	}
	
	
	

	
	
	
	
	
	
	
}