<?php 
namespace Model;
use \Pub\M;

class Pub extends \Pub\ModelBase
{
	public $_PubId;
	public $_PubName;
	public $_PubValue;
	public $_AddTime;
	public $_IsEdit;
	public $_Type;
	public $_GroupId;

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
	   $this->_PubId = new M('PUB_ID','','int');
       $this->_PubId->AutoKey=true;
	   $this->_PubName = new M('PUB_NAME','','string');
	   $this->_PubValue = new M('PUB_VALUE','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_IsEdit = new M('IS_EDIT','','int');
	   $this->_Type = new M('TYPE','','int');
	   $this->_GroupId = new M('GROUP_ID','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function PubId($v=null){if(isset($v)){$this->_PubId->Set($v);}else{return $this->_PubId->v;}}
	public function PubName($v=null){if(isset($v)){$this->_PubName->Set($v);}else{return $this->_PubName->v;}}
	public function PubValue($v=null){if(isset($v)){$this->_PubValue->Set($v);}else{return $this->_PubValue->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function IsEdit($v=null){if(isset($v)){$this->_IsEdit->Set($v);}else{return $this->_IsEdit->v;}}
	public function Type($v=null){if(isset($v)){$this->_Type->Set($v);}else{return $this->_Type->v;}}
	public function GroupId($v=null){if(isset($v)){$this->_GroupId->Set($v);}else{return $this->_GroupId->v;}}

    public function Get_Key_Name(){return 'PUB_ID';}
    public function Insert($Conn=null){return \Bll\Pub::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\Pub::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['PUB_ID'=>'0b5b30c1e1a86d9a6e2126bd1ed8168c78603373','PUB_NAME'=>'b9b5008ad8b40c7c350f2f3c2c4e950e8f1115f7',
                'PUB_VALUE'=>'6dfbd862ac159a1b7d68c4b8113c9581722fb5b5','ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1',
                'IS_EDIT'=>'67a8e3a8566555119a5b7db3109f5d1c28e0bdfe','TYPE'=>'5a657d858ffef8637c70d32f17174a5d263db0d1',
                'GROUP_ID'=>'4c514c3230ea79d79f03e22cb7fca1350ccc5453'];
    }
}