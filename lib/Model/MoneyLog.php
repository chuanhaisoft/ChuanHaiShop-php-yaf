<?php 
namespace Model;
use \Pub\M;

class MoneyLog extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_Money;
	public $_State;
	public $_ActTime;
	public $_Mess;
	public $_ModuleId;
	public $_CaiWuId;
	public $_ActUserId;
	public $_LeftMoney;
	public $_RightMoney;
	public $_RoleId;
	public $_Point;
	public $_TalkTime;
	public $_MessId;
	public $_MessageCount;
	public $_DoState;
	public $_Shi;
	public $_DoMessageCount;

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
	   $this->_Money = new M('MONEY','','decimal');
	   $this->_State = new M('STATE','','int');
	   $this->_ActTime = new M('ACT_TIME','','DateTime');
	   $this->_Mess = new M('MESS','','string');
	   $this->_ModuleId = new M('MODULE_ID','','int');
	   $this->_CaiWuId = new M('CAI_WU_ID','','int');
	   $this->_ActUserId = new M('ACT_USER_ID','','int');
	   $this->_LeftMoney = new M('LEFT_MONEY','','decimal');
	   $this->_RightMoney = new M('RIGHT_MONEY','','decimal');
	   $this->_RoleId = new M('ROLE_ID','','int');
	   $this->_Point = new M('POINT','','decimal');
	   $this->_TalkTime = new M('TALK_TIME','','int');
	   $this->_MessId = new M('MESS_ID','','int');
	   $this->_MessageCount = new M('MESSAGE_COUNT','','int');
	   $this->_DoState = new M('DO_STATE','','int');
	   $this->_Shi = new M('SHI','','int');
	   $this->_DoMessageCount = new M('DO_MESSAGE_COUNT','','int');
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
	public function CaiWuId($v=null){if(isset($v)){$this->_CaiWuId->Set($v);}else{return $this->_CaiWuId->v;}}
	public function ActUserId($v=null){if(isset($v)){$this->_ActUserId->Set($v);}else{return $this->_ActUserId->v;}}
	public function LeftMoney($v=null){if(isset($v)){$this->_LeftMoney->Set($v);}else{return $this->_LeftMoney->v;}}
	public function RightMoney($v=null){if(isset($v)){$this->_RightMoney->Set($v);}else{return $this->_RightMoney->v;}}
	public function RoleId($v=null){if(isset($v)){$this->_RoleId->Set($v);}else{return $this->_RoleId->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}
	public function TalkTime($v=null){if(isset($v)){$this->_TalkTime->Set($v);}else{return $this->_TalkTime->v;}}
	public function MessId($v=null){if(isset($v)){$this->_MessId->Set($v);}else{return $this->_MessId->v;}}
	public function MessageCount($v=null){if(isset($v)){$this->_MessageCount->Set($v);}else{return $this->_MessageCount->v;}}
	public function DoState($v=null){if(isset($v)){$this->_DoState->Set($v);}else{return $this->_DoState->v;}}
	public function Shi($v=null){if(isset($v)){$this->_Shi->Set($v);}else{return $this->_Shi->v;}}
	public function DoMessageCount($v=null){if(isset($v)){$this->_DoMessageCount->Set($v);}else{return $this->_DoMessageCount->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\MoneyLog::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\MoneyLog::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'MONEY'=>'1dd26d915746a47c1b10ba6f51f47b1701484884','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'ACT_TIME'=>'294bb803ac3208483114f4d7085183d4acf010fa','MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce',
                'MODULE_ID'=>'b4759051a9b5fff2aeb9cc6b8d30e061a739fe95','CAI_WU_ID'=>'0849c1848ed4f0667ccbc2a030253f5ff17aef84',
                'ACT_USER_ID'=>'5facb046afebfe913fa1c2ef2922e8c0d7d35439','LEFT_MONEY'=>'e5e2a60048ac7fcde183ff99f53f2465f1ea3410',
                'RIGHT_MONEY'=>'d2d3a0109c6353c921dd95eb0ac40089d236b191','ROLE_ID'=>'40c8221de27b9a748c103091ced93e100faf6157',
                'POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199','TALK_TIME'=>'9f5a2a4f48f6819fb629b9ba3d1a705b2b232ee6',
                'MESS_ID'=>'32f0fa38223b0b37ae9c19d9205c559b3381ffc7','MESSAGE_COUNT'=>'e94720f7869f574d66a51559b4875fa5d386cb2b',
                'DO_STATE'=>'9a39962b110927c28a5e03e224b729847560c76a','SHI'=>'898294e09e4c1f47f704fb76a6936aea988fc73b',
                'DO_MESSAGE_COUNT'=>'2fd0762512f2c79eeebe40e4fe2304753a96d43c'];
    }
}