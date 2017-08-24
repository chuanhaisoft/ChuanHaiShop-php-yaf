<?php 
namespace Model;
use \Pub\M;

class CaiWu extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_Money;
	public $_State;
	public $_ActTime;
	public $_Mess;
	public $_ModuleId;
	public $_ActUserId;
	public $_IsLock;
	public $_ToUser;
	public $_MessId;
	public $_RoleId;
	public $_MoneyTrue;
	public $_Fee1;
	public $_Fee20;
	public $_DoTime;
	public $_Mess2;
	public $_MoneyCanEdit;

    //--can edit code start--
	public function Rules()
	{//,'on'=>['login','dologin']
	    return [
	        [['EVENT_TIME'],'required','msg' => '请填写此项！'],
	        [['EVENT_TIME'],'date'],
	        [[$this->_HostId->k],'number','min'=>100],
	        [[$this->_LockTime->k],['equalTo'=>'EVENT_TIME']],
	        [[$this->_BeiZhu->k],'required']
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
	   $this->_Money = new M('MONEY','','decimal');
	   $this->_State = new M('STATE','','int');
	   $this->_ActTime = new M('ACT_TIME','','DateTime');
	   $this->_Mess = new M('MESS','','string');
	   $this->_ModuleId = new M('MODULE_ID','','int');
	   $this->_ActUserId = new M('ACT_USER_ID','','int');
	   $this->_IsLock = new M('IS_LOCK','','int');
	   $this->_ToUser = new M('TO_USER','','int');
	   $this->_MessId = new M('MESS_ID','','int');
	   $this->_RoleId = new M('ROLE_ID','','int');
	   $this->_MoneyTrue = new M('MONEY_TRUE','','decimal');
	   $this->_Fee1 = new M('FEE_1','','decimal');
	   $this->_Fee20 = new M('FEE_20','','decimal');
	   $this->_DoTime = new M('DO_TIME','','DateTime');
	   $this->_Mess2 = new M('MESS2','','string');
	   $this->_MoneyCanEdit = new M('MONEY_CAN_EDIT','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function Money($v=null){if(isset($v)){$this->_Money->Set($v);}else{return $this->_Money->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function ActTime($v=null){if(isset($v)){$this->_ActTime->Set($v);}else{return $this->_ActTime->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function ModuleId($v=null){if(isset($v)){$this->_ModuleId->Set($v);}else{return $this->_ModuleId->v;}}
	public function ActUserId($v=null){if(isset($v)){$this->_ActUserId->Set($v);}else{return $this->_ActUserId->v;}}
	public function IsLock($v=null){if(isset($v)){$this->_IsLock->Set($v);}else{return $this->_IsLock->v;}}
	public function ToUser($v=null){if(isset($v)){$this->_ToUser->Set($v);}else{return $this->_ToUser->v;}}
	public function MessId($v=null){if(isset($v)){$this->_MessId->Set($v);}else{return $this->_MessId->v;}}
	public function RoleId($v=null){if(isset($v)){$this->_RoleId->Set($v);}else{return $this->_RoleId->v;}}
	public function MoneyTrue($v=null){if(isset($v)){$this->_MoneyTrue->Set($v);}else{return $this->_MoneyTrue->v;}}
	public function Fee1($v=null){if(isset($v)){$this->_Fee1->Set($v);}else{return $this->_Fee1->v;}}
	public function Fee20($v=null){if(isset($v)){$this->_Fee20->Set($v);}else{return $this->_Fee20->v;}}
	public function DoTime($v=null){if(isset($v)){$this->_DoTime->Set($v);}else{return $this->_DoTime->v;}}
	public function Mess2($v=null){if(isset($v)){$this->_Mess2->Set($v);}else{return $this->_Mess2->v;}}
	public function MoneyCanEdit($v=null){if(isset($v)){$this->_MoneyCanEdit->Set($v);}else{return $this->_MoneyCanEdit->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\CaiWu::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\CaiWu::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'MONEY'=>'1dd26d915746a47c1b10ba6f51f47b1701484884','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'ACT_TIME'=>'294bb803ac3208483114f4d7085183d4acf010fa','MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce',
                'MODULE_ID'=>'b4759051a9b5fff2aeb9cc6b8d30e061a739fe95','ACT_USER_ID'=>'5facb046afebfe913fa1c2ef2922e8c0d7d35439',
                'IS_LOCK'=>'00f5ffabb4e3312d925941bf218b4aaef4548e3f','TO_USER'=>'bb83602992bd3f2637ae660a2280132700bed08e',
                'MESS_ID'=>'32f0fa38223b0b37ae9c19d9205c559b3381ffc7','ROLE_ID'=>'40c8221de27b9a748c103091ced93e100faf6157',
                'MONEY_TRUE'=>'eea22d56b9a6b0cf83cee87aee3c80b65463b1b4','FEE_1'=>'a6e39b11b8a5c72e1856bc26dbc6ae10d35b32a2',
                'FEE_20'=>'3fad5affb5eb4172c45c980e3dc4b4fbacdaf1a3','DO_TIME'=>'10c1d7f61a35a3447e86420b4bea88005a59b661',
                'MESS2'=>'4ca277cb68cf8148aa99e7c5c7a7debc6f3b5532','MONEY_CAN_EDIT'=>'65352cf1fd44dfd7e05104da5e6634402cadb506'];
    }
}