<?php 
namespace Model;
use \Pub\M;

class China extends \Pub\ModelBase
{
	public $_Id;
	public $_Name;
	public $_Pid;

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
	   $this->_Name = new M('NAME','','string');
	   $this->_Pid = new M('PID','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function Pid($v=null){if(isset($v)){$this->_Pid->Set($v);}else{return $this->_Pid->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\China::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\China::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2',
                'PID'=>'097a9ea86a794990320cfa86b56bfa5c487f29d7'];
    }
}