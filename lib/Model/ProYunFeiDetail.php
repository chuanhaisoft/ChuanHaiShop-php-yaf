<?php 
namespace Model;
use \Pub\M;

class ProYunFeiDetail extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_YunFeiId;
	public $_AreaId;
	public $_Price;
	public $_PriceCount;
	public $_PriceNext;
	public $_NextCount;
	public $_BaoYouCount;
	public $_EditTime;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['PRICE','PRICE_COUNT','PRICE_NEXT','NEXT_COUNT','BAO_YOU_COUNT'],'required'],
	        [['PRICE','PRICE_NEXT'],'number','msg'=>'请填写正确的数字!'],
	        [['PRICE_COUNT','NEXT_COUNT'],'digits'],
	        [['BAO_YOU_COUNT'],'number','max'=>9999999,'min'=>1]
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
	   $this->_YunFeiId = new M('YUN_FEI_ID','','int');
	   $this->_AreaId = new M('AREA_ID','','int');
	   $this->_Price = new M('PRICE','','decimal');
	   $this->_PriceCount = new M('PRICE_COUNT','','int');
	   $this->_PriceNext = new M('PRICE_NEXT','','decimal');
	   $this->_NextCount = new M('NEXT_COUNT','','int');
	   $this->_BaoYouCount = new M('BAO_YOU_COUNT','','int');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function YunFeiId($v=null){if(isset($v)){$this->_YunFeiId->Set($v);}else{return $this->_YunFeiId->v;}}
	public function AreaId($v=null){if(isset($v)){$this->_AreaId->Set($v);}else{return $this->_AreaId->v;}}
	public function Price($v=null){if(isset($v)){$this->_Price->Set($v);}else{return $this->_Price->v;}}
	public function PriceCount($v=null){if(isset($v)){$this->_PriceCount->Set($v);}else{return $this->_PriceCount->v;}}
	public function PriceNext($v=null){if(isset($v)){$this->_PriceNext->Set($v);}else{return $this->_PriceNext->v;}}
	public function NextCount($v=null){if(isset($v)){$this->_NextCount->Set($v);}else{return $this->_NextCount->v;}}
	public function BaoYouCount($v=null){if(isset($v)){$this->_BaoYouCount->Set($v);}else{return $this->_BaoYouCount->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\ProYunFeiDetail::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\ProYunFeiDetail::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'YUN_FEI_ID'=>'0945a334da51e8e2893c2b70f0043e30de50e720','AREA_ID'=>'948f67a9e4adb176585bc1b7dd38cc19111b9d51',
                'PRICE'=>'6e72f93a1bc6a739c71d899e61aa90747ff7b10a','PRICE_COUNT'=>'a3a051e2d085f4149ffa58ffd0818d98a95e1857',
                'PRICE_NEXT'=>'e636c740d6d21848339190e131bc968381162ce7','NEXT_COUNT'=>'cc1c65dc50097d49d4a75db9bc34c151e7af8a3a',
                'BAO_YOU_COUNT'=>'f643697e997c87871b651824ada67efdc601b9cf','EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}