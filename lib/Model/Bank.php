<?php 
namespace Model;
use \Pub\M;

class Bank extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_BankName;
	public $_BankNum;
	public $_AddTime;
	public $_State;
	public $_UserName;
	public $_IdCard;
	public $_MobileNum;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['BANK_NAME','BANK_NUM','USER_NAME'],'required','msg'=>'不能为空!'],
	        [['BANK_NUM'],'number','msg'=>'请输入正确的银行卡号!']
	    ];
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
	   $this->_BankName = new M('BANK_NAME','','string');
	   $this->_BankNum = new M('BANK_NUM','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_State = new M('STATE','','int');
	   $this->_UserName = new M('USER_NAME','','string');
	   $this->_IdCard = new M('ID_CARD','','string');
	   $this->_MobileNum = new M('MOBILE_NUM','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function BankName($v=null){if(isset($v)){$this->_BankName->Set($v);}else{return $this->_BankName->v;}}
	public function BankNum($v=null){if(isset($v)){$this->_BankNum->Set($v);}else{return $this->_BankNum->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function UserName($v=null){if(isset($v)){$this->_UserName->Set($v);}else{return $this->_UserName->v;}}
	public function IdCard($v=null){if(isset($v)){$this->_IdCard->Set($v);}else{return $this->_IdCard->v;}}
	public function MobileNum($v=null){if(isset($v)){$this->_MobileNum->Set($v);}else{return $this->_MobileNum->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Bank::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\Bank::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'BANK_NAME'=>'4c6cdb7aae5f848d4b79d46e03a22a9a8f7c0283','BANK_NUM'=>'f8dc56cab197fbe77c1b7d7fd9defe49bffa9d11',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'USER_NAME'=>'672b82c27fce60987f3ee3412651d602d8687f40','ID_CARD'=>'2d4be2ad799df4c58abfbd69c226cdb62cf16eec',
                'MOBILE_NUM'=>'acf4f6fbf1b1c058a5ed462acb535a14a5bca7a7'];
    }
}