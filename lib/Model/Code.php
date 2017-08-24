<?php 
namespace Model;
use \Pub\M;

class Code extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_Type;
	public $_Mobile;
	public $_Code;
	public $_Shijian;
	public $_Status;
	public $_ModuleId;

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
	   $this->_Type = new M('TYPE','','int');
	   $this->_Mobile = new M('MOBILE','','int');
	   $this->_Code = new M('CODE','','string');
	   $this->_Shijian = new M('SHIJIAN','','DateTime');
	   $this->_Status = new M('STATUS','','int');
	   $this->_ModuleId = new M('MODULE_ID','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function Type($v=null){if(isset($v)){$this->_Type->Set($v);}else{return $this->_Type->v;}}
	public function Mobile($v=null){if(isset($v)){$this->_Mobile->Set($v);}else{return $this->_Mobile->v;}}
	public function Code($v=null){if(isset($v)){$this->_Code->Set($v);}else{return $this->_Code->v;}}
	public function Shijian($v=null){if(isset($v)){$this->_Shijian->Set($v);}else{return $this->_Shijian->v;}}
	public function Status($v=null){if(isset($v)){$this->_Status->Set($v);}else{return $this->_Status->v;}}
	public function ModuleId($v=null){if(isset($v)){$this->_ModuleId->Set($v);}else{return $this->_ModuleId->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Code::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\Code::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'TYPE'=>'5a657d858ffef8637c70d32f17174a5d263db0d1','MOBILE'=>'dee848cd1bf2b3efd1add9a2c9b36aa822d85df1',
                'CODE'=>'5a4bbf4e3b43ff9e9c284021d4fd09af83599c50','SHIJIAN'=>'93c752bd9dcce7b4d60d8590ba11455089b14af7',
                'STATUS'=>'1d07b5e25d897a94b5e5085ba3dd49609c67cbc5','MODULE_ID'=>'b4759051a9b5fff2aeb9cc6b8d30e061a739fe95'];
    }
}