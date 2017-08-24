<?php 
namespace Model;
use \Pub\M;

class Message extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_FromId;
	public $_Mess;
	public $_AddTime;
	public $_ReadTime;
	public $_State;

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
	   $this->_FromId = new M('FROM_ID','','int');
	   $this->_Mess = new M('MESS','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_ReadTime = new M('READ_TIME','','DateTime');
	   $this->_State = new M('STATE','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function FromId($v=null){if(isset($v)){$this->_FromId->Set($v);}else{return $this->_FromId->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function ReadTime($v=null){if(isset($v)){$this->_ReadTime->Set($v);}else{return $this->_ReadTime->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Message::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\Message::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'FROM_ID'=>'50cfe617e1e596fc02276b14982c45d54ad2fc5a','MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1','READ_TIME'=>'b1e406b5197cf25b70d5a5f3f659fcc27d60f205',
                'STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066'];
    }
}