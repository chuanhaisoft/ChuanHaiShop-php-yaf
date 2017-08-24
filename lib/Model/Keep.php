<?php 
namespace Model;
use \Pub\M;

class Keep extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_ModuleId;
	public $_MessId;
	public $_AddTime;

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
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function ModuleId($v=null){if(isset($v)){$this->_ModuleId->Set($v);}else{return $this->_ModuleId->v;}}
	public function MessId($v=null){if(isset($v)){$this->_MessId->Set($v);}else{return $this->_MessId->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Keep::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\Keep::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'MODULE_ID'=>'b4759051a9b5fff2aeb9cc6b8d30e061a739fe95','MESS_ID'=>'32f0fa38223b0b37ae9c19d9205c559b3381ffc7',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1'];
    }
}