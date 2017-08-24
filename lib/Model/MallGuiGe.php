<?php 
namespace Model;
use \Pub\M;

class MallGuiGe extends \Pub\ModelBase
{
	public $_Id;
	public $_ParentId;
	public $_Name;
	public $_SortId;
	public $_SortIdParent;
	public $_State;
	public $_UserId;
	public $_EditTime;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['NAME'],'required','msg'=>'不能为空!']
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
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_Name = new M('NAME','','string');
	   $this->_SortId = new M('SORT_ID','','int');
	   $this->_SortIdParent = new M('SORT_ID_PARENT','','int');
	   $this->_State = new M('STATE','','int');
	   $this->_UserId = new M('USER_ID','','int');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function SortId($v=null){if(isset($v)){$this->_SortId->Set($v);}else{return $this->_SortId->v;}}
	public function SortIdParent($v=null){if(isset($v)){$this->_SortIdParent->Set($v);}else{return $this->_SortIdParent->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\MallGuiGe::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\MallGuiGe::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c',
                'NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2','SORT_ID'=>'7b1921ba0a697f95ec81d625b3f5661e3fec69f3',
                'SORT_ID_PARENT'=>'770de03b05b7d4889cc051c76b4da171ecff2ac6','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf','EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}