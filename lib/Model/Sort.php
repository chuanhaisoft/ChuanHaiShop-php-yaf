<?php 
namespace Model;
use \Pub\M;

class Sort extends \Pub\ModelBase
{
	public $_Id;
	public $_Title;
	public $_ParentId;
	public $_State;
	public $_SortBig;

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
	   $this->_Title = new M('TITLE','','string');
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_State = new M('STATE','','int');
	   $this->_SortBig = new M('SORT_BIG','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Title($v=null){if(isset($v)){$this->_Title->Set($v);}else{return $this->_Title->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function SortBig($v=null){if(isset($v)){$this->_SortBig->Set($v);}else{return $this->_SortBig->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Sort::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\Sort::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','TITLE'=>'e3f822db3baf1508e99d2a83a23b6fc610b0f4f1',
                'PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'SORT_BIG'=>'e11e8e310c448d8b62014af6f87b77784ebe1dea'];
    }
}