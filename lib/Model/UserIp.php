<?php 
namespace Model;
use \Pub\M;

class UserIp extends \Pub\ModelBase
{
	public $_Id;
	public $_Ip;
	public $_Userid;
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
	   $this->_Id = new M('id','','int');
       $this->_Id->AutoKey=true;
	   $this->_Ip = new M('ip','','string');
	   $this->_Userid = new M('userid','','int');
	   $this->_State = new M('state','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Ip($v=null){if(isset($v)){$this->_Ip->Set($v);}else{return $this->_Ip->v;}}
	public function Userid($v=null){if(isset($v)){$this->_Userid->Set($v);}else{return $this->_Userid->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}

    public function Get_Key_Name(){return 'id';}
    public function Insert($Conn=null){return \Bll\UserIp::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\UserIp::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['id'=>'f3e513d3c361759dd641609335552287cb7a7915','ip'=>'ab437a5e62dfd671974ca73c62ce837195aaf39c',
                'userid'=>'d548f87466102c44e8556af80deec21b95379251','state'=>'3d87ef4bb8c5b36ee4aefd0398787872953cddce'];
    }
}