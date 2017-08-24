<?php 
namespace Model;
use \Pub\M;

class MallAttr extends \Pub\ModelBase
{
	public $_Id;
	public $_ParentId;
	public $_Name;
	public $_SortId;
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
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_Name = new M('NAME','','string');
	   $this->_SortId = new M('SORT_ID','','int');
	   $this->_State = new M('STATE','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function SortId($v=null){if(isset($v)){$this->_SortId->Set($v);}else{return $this->_SortId->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\MallAttr::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\MallAttr::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c',
                'NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2','SORT_ID'=>'7b1921ba0a697f95ec81d625b3f5661e3fec69f3',
                'STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066'];
    }
}