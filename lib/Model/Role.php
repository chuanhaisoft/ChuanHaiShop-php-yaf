<?php 
namespace Model;
use \Pub\M;

class Role extends \Pub\ModelBase
{
	public $_RoleId;
	public $_ParentId;
	public $_RoleName;
	public $_PowerList;
	public $_CreteTime;
	public $_Url;

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
	   $this->_RoleId = new M('ROLE_ID','','int');
       $this->_RoleId->AutoKey=true;
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_RoleName = new M('ROLE_NAME','','string');
	   $this->_PowerList = new M('POWER_LIST','','string');
	   $this->_CreteTime = new M('CRETE_TIME','','DateTime');
	   $this->_Url = new M('URL','','string');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function RoleId($v=null){if(isset($v)){$this->_RoleId->Set($v);}else{return $this->_RoleId->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function RoleName($v=null){if(isset($v)){$this->_RoleName->Set($v);}else{return $this->_RoleName->v;}}
	public function PowerList($v=null){if(isset($v)){$this->_PowerList->Set($v);}else{return $this->_PowerList->v;}}
	public function CreteTime($v=null){if(isset($v)){$this->_CreteTime->Set($v);}else{return $this->_CreteTime->v;}}
	public function Url($v=null){if(isset($v)){$this->_Url->Set($v);}else{return $this->_Url->v;}}

    public function Get_Key_Name(){return 'ROLE_ID';}
    public function Insert($Conn=null){return \Bll\Role::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\Role::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['ROLE_ID'=>'40c8221de27b9a748c103091ced93e100faf6157','PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c',
                'ROLE_NAME'=>'eb892d6305e58d350e820c3e03f79a37fbb087fd','POWER_LIST'=>'96744add1c9fb0bb9a77efd67fc52b6fc825c0f8',
                'CRETE_TIME'=>'8b6568aeb9feeb49f487a6099d82e7a2e1a66043','URL'=>'b459db3fd2c092ed08b2311144832455d6d6b757'];
    }
}