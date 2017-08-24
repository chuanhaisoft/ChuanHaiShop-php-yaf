<?php 
namespace Model;
use \Pub\M;

class SortBig extends \Pub\ModelBase
{
	public $_Id;
	public $_Title;

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
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Title($v=null){if(isset($v)){$this->_Title->Set($v);}else{return $this->_Title->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\SortBig::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\SortBig::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','TITLE'=>'e3f822db3baf1508e99d2a83a23b6fc610b0f4f1'];
    }
}