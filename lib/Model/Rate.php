<?php 
namespace Model;
use \Pub\M;

class Rate extends \Pub\ModelBase
{
	public $_Id;
	public $_RoleId;
	public $_YeWuId;
	public $_Price;
	public $_Step;
	public $_LineId;
	public $_Line2Id;

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
	   $this->_RoleId = new M('ROLE_ID','','int');
	   $this->_YeWuId = new M('YE_WU_ID','','int');
	   $this->_Price = new M('PRICE','','decimal');
	   $this->_Step = new M('STEP','','int');
	   $this->_LineId = new M('LINE_ID','','int');
	   $this->_Line2Id = new M('LINE2_ID','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function RoleId($v=null){if(isset($v)){$this->_RoleId->Set($v);}else{return $this->_RoleId->v;}}
	public function YeWuId($v=null){if(isset($v)){$this->_YeWuId->Set($v);}else{return $this->_YeWuId->v;}}
	public function Price($v=null){if(isset($v)){$this->_Price->Set($v);}else{return $this->_Price->v;}}
	public function Step($v=null){if(isset($v)){$this->_Step->Set($v);}else{return $this->_Step->v;}}
	public function LineId($v=null){if(isset($v)){$this->_LineId->Set($v);}else{return $this->_LineId->v;}}
	public function Line2Id($v=null){if(isset($v)){$this->_Line2Id->Set($v);}else{return $this->_Line2Id->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Rate::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\Rate::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','ROLE_ID'=>'40c8221de27b9a748c103091ced93e100faf6157',
                'YE_WU_ID'=>'7a9efb0c71fe84d1c767b63fffc7b82428eb7c99','PRICE'=>'6e72f93a1bc6a739c71d899e61aa90747ff7b10a',
                'STEP'=>'1844b51e92abd3b238943bbe8c54939dd6a611f1','LINE_ID'=>'7569d23092f7851488e7fac0226df84d4cde2aa8',
                'LINE2_ID'=>'ec7098995d919695e63984f14f6285742971d135'];
    }
}