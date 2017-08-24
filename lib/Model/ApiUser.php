<?php 
namespace Model;
use \Pub\M;

class ApiUser extends \Pub\ModelBase
{
	public $_Id;
	public $_Name;
	public $_Pass;
	public $_Powers;
	public $_AddTime;
	public $_State;
	public $_Mess;
	public $_UserId;
	public $_ShopAreaId;
	public $_ApiServerIp;
	public $_Domain;
	public $_HuiBoBillingUrl;

    //--can edit code start--
	public function Rules()
	{
	    return [];
	}
	public function NameIfPass()
	{
	    return false;
	}
	//--can edit code start--
	
    //--user code start--

	//--user code end--

	function __construct($RuleName=null)
	{
	   $this->_Id = new M('ID','','int');
       $this->_Id->AutoKey=true;
	   $this->_Name = new M('NAME','','int');
	   $this->_Pass = new M('PASS','','string');
	   $this->_Powers = new M('POWERS','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_State = new M('STATE','','int');
	   $this->_Mess = new M('MESS','','string');
	   $this->_UserId = new M('USER_ID','','int');
	   $this->_ShopAreaId = new M('SHOP_AREA_ID','','int');
	   $this->_ApiServerIp = new M('API_SERVER_IP','','string');
	   $this->_Domain = new M('DOMAIN','','string');
	   $this->_HuiBoBillingUrl = new M('HUI_BO_BILLING_URL','','string');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function Pass($v=null){if(isset($v)){$this->_Pass->Set($v);}else{return $this->_Pass->v;}}
	public function Powers($v=null){if(isset($v)){$this->_Powers->Set($v);}else{return $this->_Powers->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function ShopAreaId($v=null){if(isset($v)){$this->_ShopAreaId->Set($v);}else{return $this->_ShopAreaId->v;}}
	public function ApiServerIp($v=null){if(isset($v)){$this->_ApiServerIp->Set($v);}else{return $this->_ApiServerIp->v;}}
	public function Domain($v=null){if(isset($v)){$this->_Domain->Set($v);}else{return $this->_Domain->v;}}
	public function HuiBoBillingUrl($v=null){if(isset($v)){$this->_HuiBoBillingUrl->Set($v);}else{return $this->_HuiBoBillingUrl->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\ApiUser::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\ApiUser::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2',
                'PASS'=>'641a2e47b41103e4b61150ec369a8540017adbb1','POWERS'=>'2100f13d2106e0cb41a8d753fa4f449aa3b28dc3',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'SHOP_AREA_ID'=>'fac33ebf52b6330b218667019d5c4293ef782187','API_SERVER_IP'=>'4337c1716319d208ffedd941f2715abbe925ad4b',
                'DOMAIN'=>'127444e7d1685d68e7e87ba2b6970035339f9361','HUI_BO_BILLING_URL'=>'17f830175dee18cf1d7c27aba7ed3830184d93d6'];
    }
}