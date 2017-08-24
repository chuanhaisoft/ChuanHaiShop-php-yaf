<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class User
{

    //--user code start--
    public static function GetShopRate($ID)
    {
        $m=new \Model\User();
        return \Dal\User::Column('PARTNER_RATE',[$m->_Id->w('=',$ID)]);
    }
    
    public static function UserCount($RoleID=72,$ZhouQi='all',$CheckBase=null,$CheckMobile=null,$CheckEmail=null)
    {
        $w=null;$m=new \Model\User();
        $w[]=$m->_RoleId->w_and('=',$RoleID);
        
        if(is_array($ZhouQi))
        {
            $moth=$ZhouQi;
            $w[]=$m->_AddTime->w_and('>=',$moth[0]);
            $w[]=$m->_AddTime->w_and('<=',$moth[1].' 24:59:59');
        }
        else 
        {
            if($ZhouQi=='month')
            {
                $moth=Fram::Month_Current_Next();
                $w[]=$m->_AddTime->w_and('>=',$moth[0]);
                $w[]=$m->_AddTime->w_and('<',$moth[1]);
            }
        }
        if($CheckBase)
        {
            $w[]=$m->_CheckBase->w_and('=',1);
        }
        if($CheckMobile)
        {
            $w[]=$m->_CheckMobile->w_and('=',1);
        }
        if($CheckEmail)
        {
            $w[]=$m->_CheckEmail->w_and('=',1);
        }
         
        $r=\Bll\User::Column(null,'count(1)',$w);
         
        return $r ;
    }
    
    
    
    
    
    
    
    public static function PayMoneyCount($RoleID=72,$ZhouQi='all')
    {
        $w=null;$m=new \Model\CaiWu();
        
        if(is_array($ZhouQi))
        {
            $moth=$ZhouQi;
            $w[]=$m->_ActTime->w_and('>=',$moth[0]);
            $w[]=$m->_ActTime->w_and('<=',$moth[1].' 24:59:59');
        }
        if($ZhouQi=='month')
        {
            $moth=Fram::Month_Current_Next();
            $w[]=$m->_ActTime->w_and('>=',$moth[0]);
            $w[]=$m->_ActTime->w_and('<',$moth[1]);
        }
        
        $w[]=$m->_State->w_and('=',1);
    
        $w[]=$m->_Id->KuoHao_Left();
        $w[]=$m->_ModuleId->w('=',3);
        $w[]=$m->_ModuleId->w_or('=',7001);
        $w[]=$m->_Id->KuoHao_Right();
    
        if(Fram::CheckNum($RoleID))
            $w[]=$m->_RoleId->w_and('=',$RoleID);
    
        
        $r=\Bll\CaiWu::Column(null,'sum(MONEY)',$w);
        if(!$r)
            $r=0;
        
        return abs($r) ;
    }
    
   
    
    public static function SetRowsUserName(&$Rows,$F='USER_ID')
    {
        for($i=0;$i<count($Rows);$i++)
        {
            if($Rows[$i][$F])
            {
                $row=\Bll\User::Row($Rows[$i][$F],null,'NAME,LOGIN_NAME');
    
                $Rows[$i][$F.'_NAME']='';
                $Rows[$i][$F.'_NAME']=$row['NAME'];
    
            }
            else
            {
                $Rows[$i][$F.'_NAME']='';
            }
    
        }
        return $Rows;
    }
    
    public static function ViewMessCheckBase()
    {
        $ID=\Pub\SysFram::GetLoginID();
        $u=\Bll\User::Model($ID);
        if($u->CheckBase()!=1)
        {
            die(\Pub\Js::AlertLocation('请填写基本信息后，查看联系方式','/user/info.html'));
        }
    }
    
    
    
    public static function MoneyLimit()
    {
        return 100;
    }
    
    public static function OpenID_To_UserID($OpenID)
    {
        $r=null;
        $u=new \Model\User();
        $u=\Bll\User::Model(null,[$u->_LoginName->w('=',$OpenID)]);
        if($u)
        {
            $r=$u->Id();
        }
        
        return $r;
    }
    
    public static function WeiXinUserCheck($OpenID,$UserInfo,$NickName)
    {
        if(!$OpenID)
            return;
        $u=new \Model\User();
        $u->LoginName($OpenID);
        $u2=\Bll\User::Model(null,[$u->_LoginName->w('=',$OpenID)]);
        if(!$u2)
        {
            $u->RoleId(72);
            $u->AddTime(\Pub\Fram::Date());
            $u->Name($NickName);
            $do=$u->Insert();
            if($do)
            {
                self::UpdateTopPic($do, $UserInfo);
            }
        }
        else 
        {
            $u->Id($u2->Id());
            $u->Name($NickName);
            $do=$u->Update();
            if($do)
            {
                self::UpdateTopPic($u2->Id(), $UserInfo);
            }
        }
        \Pub\SysFram::CheckAdminUser($OpenID, '',false);
    }
    
    private static function UpdateTopPic($ID,$UserInfo)
    {
        $u=new \Model\UserInfo();
        $u->UserId($ID);
        $u->UserPic($UserInfo['headimgurl']);
        $u2=\Bll\UserInfo::Model($ID);
        if(!$u2)
        {
            $u->Insert();
        }
        else
        {
            $u->Update();
        }
    }
    
    public static function UserPic($ID,$DefaultPic='/images/logo.png')
    {
        $r='';
        $uinfo=\Bll\UserInfo::Model($ID);
            if($uinfo)
            {
                $r=$uinfo->UserPic();
                if(!strstr($r, '://') && strlen($r)>1)
                {
                    $r=\Pub\SysPara::PicDomain.$r;
                }
            }
        if(!$r || $r=='')
        {
            $r=$DefaultPic;
        }
        return $r;
    }
    
    public static function GetPowers($UserID,$Conn=null)
    {
        return self::Column($UserID,'POWERS',null,$Conn);
    }
    
    public static function GetUserMoney($UserID,$Conn=null)
    {
        return self::Column($UserID,'MONEY',null,$Conn);
    }
    
    
    public static function DealMoneyPayTotal($UserID,$Money,$Conn)
    {
        $m=new \Model\User();
        $m->Id($UserID);
        $m->Money([$Money>0?'+':'-',abs($Money)]);
        return $m->Update(null,$Conn);
    }
    
    public static function Billing_Do_Point($UserID,$DoValue,$Mess,$Conn=null,$IsChaoZhi=false,$ModuleID=-1,$DoLog=true,$ForUpdate=true,$MessID=-1,$CaiWuID=-1,$Shi=null)
    {
        $IsComment=false;
        $r=true;
        if($Conn==null)
        {
            $Conn=Fram::GetConn();
            $Conn->beginTransaction();
            $IsComment=true;
        }
         
        $m=new \Model\User();
        $m->Id($UserID);
        $m->Point([Fram::CheckNum($DoValue)?'+':'-',abs($DoValue)]);
        if($ForUpdate)
            $r =  $r && self::ForUpdate($UserID, $Conn);
        $r = $r && self::Update($m,(!$IsChaoZhi && $DoValue<0)?([$m->_Point->w('>=',abs($DoValue))]):null,$Conn);
        if($DoLog)
            $r = $r && \Bll\MoneyLog::DoLog($UserID, 0,$Mess,$ModuleID,$Conn,$DoValue,0,$MessID,$CaiWuID,0,null,null,$Shi);
         
        if($IsComment)
        {
            if($r && $Conn->commit())
            {
                Fram::CloseConn($Conn);
                return true;
            }
            else
            {
                $Conn->rollback();Fram::CloseConn($Conn);
                return false;
            }
        }
        else
            return $r;
    }
    
    public static function Billing_Do_Money($UserID,$DoMoney,$Mess,$Conn,$IsChaoZhi=false,$ModuleID=-1,$DoLog=true,$ForUpdate=true,$MessID=-1,$CaiWuID=-1,$MoneyLeft=null)
    {
        $IsComment=false;
        $r=true;
        if($Conn==null)
        {
            $Conn=\Pub\Fram::GetConn();
            $Tran=$Conn->beginTransaction();
            $IsComment=true;
        }
         
        $m=new \Model\User();
        $m->Id($UserID);
        $m->Money(array(Fram::CheckNum($DoMoney)?'+':'-',abs($DoMoney)));
        if($ForUpdate)
            $r =  $r && self::ForUpdate($UserID, $Conn);
        if(!is_numeric($MoneyLeft))
            $MoneyLeft=self::GetUserMoney($UserID, $Conn);
        $r = $r && self::Update($m,(!$IsChaoZhi && $DoMoney<0)?([$m->_Money->w('>=',abs($DoMoney))]):null,$Conn);
        $NewMoney=self::Column($UserID,$m->_Money->k,null,$Conn);
        if($DoLog)
            $r = $r && \Bll\MoneyLog::DoLog($UserID, $DoMoney,$Mess,$ModuleID,$Conn,0,0,$MessID,$CaiWuID,null,$MoneyLeft,$NewMoney);
         
        if($IsComment)
        {
            if($r && $Conn->commit())
            {
                Fram::CloseConn($Conn);
                return true;
            }
            else
            {
                $Conn->rollback();Fram::CloseConn($Conn);
                return false;
            }
        }
        else
            return $r;
    }
    
    
    
    public static function GetRoleByID($UserID,$Conn=null)
    {
        return self::Column($UserID,'ROLE_ID',null,$Conn);
    }
    
    public static function GetNameByID($UserID)
    {
        $name='';
        $m=self::Model($UserID);
        if($m)
        {
            if($m->Name())
            {
                $name=$m->Name();
            }
            else
            {
                $name=$m->LoginName();
            }
        }
        return $name;
    }
    
    public static function GetLoginNameByID($UserID)
    {
        $name='';
        $m=self::Model($UserID);
        if($m)
        {
            $name=$m->LoginName();
        }
        return $name;
    }
    
    public static function GetIdByLoginName($Name)
    {
        $ID=null;
        $m=self::Model(-1,["LOGIN_NAME=?",[$Name]]);
        if($m)
        {
            $ID=$m->Id();
        }
        return $ID;
    }
    
    public static function GetCardNumById($UserID)
    {
        $name='';
        $m=self::Model($UserID);
        if($m)
        {
            if($m->CardNum())
            {
                $name=$m->CardNum();
            }
            else
            {
                $name=$m->LoginName();
            }
        }
        return $name;
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
	    if(false)$m=new \Model\User();
	    $m->AddTime(\Pub\Fram::Date());
	    if(!$m->_Point->Changed)
	       $m->Point(\Bll\Pub::Value(71));
	    if(!$m->_Money->Changed)
	       $m->Money(\Bll\Pub::Value(73));
	    
		return \Dal\User::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(Fram::Date());
		return \Dal\User::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\User::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\User::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\User::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\User::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\User::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\User::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\User::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\User::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\User::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}