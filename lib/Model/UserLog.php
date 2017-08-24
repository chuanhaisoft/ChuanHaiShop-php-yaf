<?php 
namespace Model;
use \Pub\M;

class UserLog extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_ActTime;
	public $_ModuleId;
	public $_State;
	public $_ActIp;
	public $_Mess;
	public $_ActId;
	public $_Money;
	public $_Point;

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
	   $this->_ActTime = new M('ACT_TIME','','DateTime');
	   $this->_ModuleId = new M('MODULE_ID','','int');
	   $this->_State = new M('STATE','','int');
	   $this->_ActIp = new M('ACT_IP','','string');
	   $this->_Mess = new M('MESS','','string');
	   $this->_ActId = new M('ACT_ID','','int');
	   $this->_Money = new M('MONEY','','decimal');
	   $this->_Point = new M('POINT','','decimal');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function ActTime($v=null){if(isset($v)){$this->_ActTime->Set($v);}else{return $this->_ActTime->v;}}
	public function ModuleId($v=null){if(isset($v)){$this->_ModuleId->Set($v);}else{return $this->_ModuleId->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function ActIp($v=null){if(isset($v)){$this->_ActIp->Set($v);}else{return $this->_ActIp->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function ActId($v=null){if(isset($v)){$this->_ActId->Set($v);}else{return $this->_ActId->v;}}
	public function Money($v=null){if(isset($v)){$this->_Money->Set($v);}else{return $this->_Money->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\UserLog::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\UserLog::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'ACT_TIME'=>'294bb803ac3208483114f4d7085183d4acf010fa','MODULE_ID'=>'b4759051a9b5fff2aeb9cc6b8d30e061a739fe95',
                'STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066','ACT_IP'=>'2f14b6026328a179d321dc9ad89994ae2b85c4e8',
                'MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce','ACT_ID'=>'cdaafdb34083b7ffd624a35a727da61783241d9b',
                'MONEY'=>'1dd26d915746a47c1b10ba6f51f47b1701484884','POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199'];
    }
}