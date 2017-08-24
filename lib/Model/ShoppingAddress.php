<?php 
namespace Model;
use \Pub\M;

class ShoppingAddress extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_Sheng;
	public $_Shi;
	public $_Qu;
	public $_Xian;
	public $_Address;
	public $_UserName;
	public $_UserTel;
	public $_AddTime;
	public $_ShengName;
	public $_ShiName;
	public $_QuName;
	public $_YouBian;
	public $_Isdefault;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['ADDRESS','USER_NAME','USER_TEL','YOU_BIAN'],'required','msg'=>'不能为空!']
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
	   $this->_UserId = new M('USER_ID','','int');
	   $this->_Sheng = new M('SHENG','','int');
	   $this->_Shi = new M('SHI','','int');
	   $this->_Qu = new M('QU','','int');
	   $this->_Xian = new M('XIAN','','int');
	   $this->_Address = new M('ADDRESS','','string');
	   $this->_UserName = new M('USER_NAME','','string');
	   $this->_UserTel = new M('USER_TEL','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_ShengName = new M('SHENG_NAME','','string');
	   $this->_ShiName = new M('SHI_NAME','','string');
	   $this->_QuName = new M('QU_NAME','','string');
	   $this->_YouBian = new M('YOU_BIAN','','string');
	   $this->_Isdefault = new M('ISDEFAULT','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function Sheng($v=null){if(isset($v)){$this->_Sheng->Set($v);}else{return $this->_Sheng->v;}}
	public function Shi($v=null){if(isset($v)){$this->_Shi->Set($v);}else{return $this->_Shi->v;}}
	public function Qu($v=null){if(isset($v)){$this->_Qu->Set($v);}else{return $this->_Qu->v;}}
	public function Xian($v=null){if(isset($v)){$this->_Xian->Set($v);}else{return $this->_Xian->v;}}
	public function Address($v=null){if(isset($v)){$this->_Address->Set($v);}else{return $this->_Address->v;}}
	public function UserName($v=null){if(isset($v)){$this->_UserName->Set($v);}else{return $this->_UserName->v;}}
	public function UserTel($v=null){if(isset($v)){$this->_UserTel->Set($v);}else{return $this->_UserTel->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function ShengName($v=null){if(isset($v)){$this->_ShengName->Set($v);}else{return $this->_ShengName->v;}}
	public function ShiName($v=null){if(isset($v)){$this->_ShiName->Set($v);}else{return $this->_ShiName->v;}}
	public function QuName($v=null){if(isset($v)){$this->_QuName->Set($v);}else{return $this->_QuName->v;}}
	public function YouBian($v=null){if(isset($v)){$this->_YouBian->Set($v);}else{return $this->_YouBian->v;}}
	public function Isdefault($v=null){if(isset($v)){$this->_Isdefault->Set($v);}else{return $this->_Isdefault->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\ShoppingAddress::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\ShoppingAddress::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'SHENG'=>'701eaee81fdbf49f4e8743b53a68faf3c24bb0f6','SHI'=>'898294e09e4c1f47f704fb76a6936aea988fc73b',
                'QU'=>'6e5a5ce129455591c5d25d21ac92468522021fa4','XIAN'=>'436c22d5220deba5ccf8f24d355827cf591fe0db',
                'ADDRESS'=>'532946b37bc609e07cc7765490c6f571516d0cf2','USER_NAME'=>'672b82c27fce60987f3ee3412651d602d8687f40',
                'USER_TEL'=>'209b0914ca110834bf8c3fa6461ea781b88c7b5f','ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1',
                'SHENG_NAME'=>'0472f7c7bc70dcf96764d4cde37d389c4005e863','SHI_NAME'=>'67811a46b5ef87a6a1262bfb6a8fa98c7c803f16',
                'QU_NAME'=>'d99f87899cded082205ea8648a83fee90a58643b','YOU_BIAN'=>'58cdc77283fd69651d16833510ea27860d9a2c7c',
                'ISDEFAULT'=>'f44ed27d8f36970bde3591d0b3c02272db4b29ef'];
    }
}