<?php 
namespace Model;
use \Pub\M;

class Discuss extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_ModuleId;
	public $_MessId;
	public $_Mess;
	public $_SendTime;
	public $_State;
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
	   $this->_ModuleId = new M('MODULE_ID','','int');
	   $this->_MessId = new M('MESS_ID','','int');
	   $this->_Mess = new M('MESS','','string');
	   $this->_SendTime = new M('SEND_TIME','','DateTime');
	   $this->_State = new M('STATE','','int');
	   $this->_Point = new M('POINT','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function ModuleId($v=null){if(isset($v)){$this->_ModuleId->Set($v);}else{return $this->_ModuleId->v;}}
	public function MessId($v=null){if(isset($v)){$this->_MessId->Set($v);}else{return $this->_MessId->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function SendTime($v=null){if(isset($v)){$this->_SendTime->Set($v);}else{return $this->_SendTime->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Discuss::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\Discuss::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'MODULE_ID'=>'b4759051a9b5fff2aeb9cc6b8d30e061a739fe95','MESS_ID'=>'32f0fa38223b0b37ae9c19d9205c559b3381ffc7',
                'MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce','SEND_TIME'=>'66852d0df88c91734e146afc9b1276cd8a5d6f8f',
                'STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066','POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199'];
    }
}