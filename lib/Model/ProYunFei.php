<?php 
namespace Model;
use \Pub\M;

class ProYunFei extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_Name;
	public $_Price;
	public $_PriceCount;
	public $_PriceNext;
	public $_NextCount;
	public $_Sheng;
	public $_Shi;
	public $_Qu;
	public $_Xian;
	public $_BaoYouCount;
	public $_EditTime;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['PRICE','PRICE_COUNT','PRICE_NEXT','NEXT_COUNT','BAO_YOU_COUNT','NAME'],'required'],
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
	   $this->_Name = new M('NAME','','string');
	   $this->_Price = new M('PRICE','','decimal');
	   $this->_PriceCount = new M('PRICE_COUNT','','int');
	   $this->_PriceNext = new M('PRICE_NEXT','','decimal');
	   $this->_NextCount = new M('NEXT_COUNT','','int');
	   $this->_Sheng = new M('SHENG','','int');
	   $this->_Shi = new M('SHI','','int');
	   $this->_Qu = new M('QU','','int');
	   $this->_Xian = new M('XIAN','','int');
	   $this->_BaoYouCount = new M('BAO_YOU_COUNT','','int');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function Price($v=null){if(isset($v)){$this->_Price->Set($v);}else{return $this->_Price->v;}}
	public function PriceCount($v=null){if(isset($v)){$this->_PriceCount->Set($v);}else{return $this->_PriceCount->v;}}
	public function PriceNext($v=null){if(isset($v)){$this->_PriceNext->Set($v);}else{return $this->_PriceNext->v;}}
	public function NextCount($v=null){if(isset($v)){$this->_NextCount->Set($v);}else{return $this->_NextCount->v;}}
	public function Sheng($v=null){if(isset($v)){$this->_Sheng->Set($v);}else{return $this->_Sheng->v;}}
	public function Shi($v=null){if(isset($v)){$this->_Shi->Set($v);}else{return $this->_Shi->v;}}
	public function Qu($v=null){if(isset($v)){$this->_Qu->Set($v);}else{return $this->_Qu->v;}}
	public function Xian($v=null){if(isset($v)){$this->_Xian->Set($v);}else{return $this->_Xian->v;}}
	public function BaoYouCount($v=null){if(isset($v)){$this->_BaoYouCount->Set($v);}else{return $this->_BaoYouCount->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\ProYunFei::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\ProYunFei::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2','PRICE'=>'6e72f93a1bc6a739c71d899e61aa90747ff7b10a',
                'PRICE_COUNT'=>'a3a051e2d085f4149ffa58ffd0818d98a95e1857','PRICE_NEXT'=>'e636c740d6d21848339190e131bc968381162ce7',
                'NEXT_COUNT'=>'cc1c65dc50097d49d4a75db9bc34c151e7af8a3a','SHENG'=>'701eaee81fdbf49f4e8743b53a68faf3c24bb0f6',
                'SHI'=>'898294e09e4c1f47f704fb76a6936aea988fc73b','QU'=>'6e5a5ce129455591c5d25d21ac92468522021fa4',
                'XIAN'=>'436c22d5220deba5ccf8f24d355827cf591fe0db','BAO_YOU_COUNT'=>'f643697e997c87871b651824ada67efdc601b9cf',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}