<?php 
namespace Model;
use \Pub\M;

class MallSort extends \Pub\ModelBase
{
	public $_Id;
	public $_Name;
	public $_ParentId;
	public $_State;
	public $_TabsShow;
	public $_OrderNum;
	public $_EditTime;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['NAME'],'required','msg'=>'不能为空!'],
	        [['ORDER_NUM'],'digits']
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
	   $this->_Name = new M('NAME','','string');
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_State = new M('STATE','','int');
	   $this->_TabsShow = new M('TABS_SHOW','','int');
	   $this->_OrderNum = new M('ORDER_NUM','','int');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function TabsShow($v=null){if(isset($v)){$this->_TabsShow->Set($v);}else{return $this->_TabsShow->v;}}
	public function OrderNum($v=null){if(isset($v)){$this->_OrderNum->Set($v);}else{return $this->_OrderNum->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\MallSort::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\MallSort::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2',
                'PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'TABS_SHOW'=>'63a89b0e22c43926777dc7058781a52840f97872','ORDER_NUM'=>'7c2f8c027c035ae9fd4c3e73099e8f5ba29ebb0b',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}