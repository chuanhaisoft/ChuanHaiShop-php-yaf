<?php 
namespace Model;
use \Pub\M;

class OrderMall extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_MoneyAll;
	public $_MoneyAllPro;
	public $_MoneyAllYunFei;
	public $_AddTime;
	public $_State;
	public $_OrderNum;
	public $_AllHuiDian;
	public $_ShoppingAddressId;
	public $_Sheng;
	public $_Shi;
	public $_Qu;
	public $_Xian;
	public $_Address;
	public $_AddrPersonName;
	public $_AddrPersonTel;
	public $_PayHuiDian;
	public $_PayMoney;
	public $_PayChongMoney;
	public $_PayTime;
	public $_PayMoneyAll;
	public $_PayChongZhiOrderNum;
	public $_EditTime;

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
	   $this->_UserId = new M('USER_ID','','int');
	   $this->_MoneyAll = new M('MONEY_ALL','','decimal');
	   $this->_MoneyAllPro = new M('MONEY_ALL_PRO','','decimal');
	   $this->_MoneyAllYunFei = new M('MONEY_ALL_YUN_FEI','','decimal');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_State = new M('STATE','','decimal');
	   $this->_OrderNum = new M('ORDER_NUM','','int');
	   $this->_AllHuiDian = new M('ALL_HUI_DIAN','','decimal');
	   $this->_ShoppingAddressId = new M('SHOPPING_ADDRESS_ID','','int');
	   $this->_Sheng = new M('SHENG','','int');
	   $this->_Shi = new M('SHI','','int');
	   $this->_Qu = new M('QU','','int');
	   $this->_Xian = new M('XIAN','','int');
	   $this->_Address = new M('ADDRESS','','string');
	   $this->_AddrPersonName = new M('ADDR_PERSON_NAME','','string');
	   $this->_AddrPersonTel = new M('ADDR_PERSON_TEL','','string');
	   $this->_PayHuiDian = new M('PAY_HUI_DIAN','','decimal');
	   $this->_PayMoney = new M('PAY_MONEY','','decimal');
	   $this->_PayChongMoney = new M('PAY_CHONG_MONEY','','decimal');
	   $this->_PayTime = new M('PAY_TIME','','DateTime');
	   $this->_PayMoneyAll = new M('PAY_MONEY_ALL','','decimal');
	   $this->_PayChongZhiOrderNum = new M('PAY_CHONG_ZHI_ORDER_NUM','','int');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function MoneyAll($v=null){if(isset($v)){$this->_MoneyAll->Set($v);}else{return $this->_MoneyAll->v;}}
	public function MoneyAllPro($v=null){if(isset($v)){$this->_MoneyAllPro->Set($v);}else{return $this->_MoneyAllPro->v;}}
	public function MoneyAllYunFei($v=null){if(isset($v)){$this->_MoneyAllYunFei->Set($v);}else{return $this->_MoneyAllYunFei->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function OrderNum($v=null){if(isset($v)){$this->_OrderNum->Set($v);}else{return $this->_OrderNum->v;}}
	public function AllHuiDian($v=null){if(isset($v)){$this->_AllHuiDian->Set($v);}else{return $this->_AllHuiDian->v;}}
	public function ShoppingAddressId($v=null){if(isset($v)){$this->_ShoppingAddressId->Set($v);}else{return $this->_ShoppingAddressId->v;}}
	public function Sheng($v=null){if(isset($v)){$this->_Sheng->Set($v);}else{return $this->_Sheng->v;}}
	public function Shi($v=null){if(isset($v)){$this->_Shi->Set($v);}else{return $this->_Shi->v;}}
	public function Qu($v=null){if(isset($v)){$this->_Qu->Set($v);}else{return $this->_Qu->v;}}
	public function Xian($v=null){if(isset($v)){$this->_Xian->Set($v);}else{return $this->_Xian->v;}}
	public function Address($v=null){if(isset($v)){$this->_Address->Set($v);}else{return $this->_Address->v;}}
	public function AddrPersonName($v=null){if(isset($v)){$this->_AddrPersonName->Set($v);}else{return $this->_AddrPersonName->v;}}
	public function AddrPersonTel($v=null){if(isset($v)){$this->_AddrPersonTel->Set($v);}else{return $this->_AddrPersonTel->v;}}
	public function PayHuiDian($v=null){if(isset($v)){$this->_PayHuiDian->Set($v);}else{return $this->_PayHuiDian->v;}}
	public function PayMoney($v=null){if(isset($v)){$this->_PayMoney->Set($v);}else{return $this->_PayMoney->v;}}
	public function PayChongMoney($v=null){if(isset($v)){$this->_PayChongMoney->Set($v);}else{return $this->_PayChongMoney->v;}}
	public function PayTime($v=null){if(isset($v)){$this->_PayTime->Set($v);}else{return $this->_PayTime->v;}}
	public function PayMoneyAll($v=null){if(isset($v)){$this->_PayMoneyAll->Set($v);}else{return $this->_PayMoneyAll->v;}}
	public function PayChongZhiOrderNum($v=null){if(isset($v)){$this->_PayChongZhiOrderNum->Set($v);}else{return $this->_PayChongZhiOrderNum->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\OrderMall::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\OrderMall::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'MONEY_ALL'=>'dbbf1c99befafcdefb1704fc82f03a0effa3b819','MONEY_ALL_PRO'=>'90881554973e6411ec15432e7e0b6f69400a9dd8',
                'MONEY_ALL_YUN_FEI'=>'e981d0bbfa08a8e4ee35461a038894e051ede98e','ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1',
                'STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066','ORDER_NUM'=>'7c2f8c027c035ae9fd4c3e73099e8f5ba29ebb0b',
                'ALL_HUI_DIAN'=>'b02ef16ab454e874ccd1554c59e751a2a6d65bd3','SHOPPING_ADDRESS_ID'=>'a962cfc56664fc76557cfbe6e5362b3b58dfa2a0',
                'SHENG'=>'701eaee81fdbf49f4e8743b53a68faf3c24bb0f6','SHI'=>'898294e09e4c1f47f704fb76a6936aea988fc73b',
                'QU'=>'6e5a5ce129455591c5d25d21ac92468522021fa4','XIAN'=>'436c22d5220deba5ccf8f24d355827cf591fe0db',
                'ADDRESS'=>'532946b37bc609e07cc7765490c6f571516d0cf2','ADDR_PERSON_NAME'=>'67e628feef63b03e0824b8a63e32ca021988413a',
                'ADDR_PERSON_TEL'=>'4a02e2d8998539bc99e59e82fff665166225300d','PAY_HUI_DIAN'=>'452c5ded1d61c2badfa01318144cc1e9b1399605',
                'PAY_MONEY'=>'6b4cfdb496e4b508f6c0e393dcb6692e5b98f065','PAY_CHONG_MONEY'=>'1d5f39df4b739f1b45b13e1eca703c3e094a1579',
                'PAY_TIME'=>'4bf28e063a64afc77a7c07332825da2684867dda','PAY_MONEY_ALL'=>'d29c16b587a8aedc61391573d0ab468139acb804',
                'PAY_CHONG_ZHI_ORDER_NUM'=>'2cdb2e22b6fa9f42332806cff438d37dfbe8f630','EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}