<?php 
namespace Model;
use \Pub\M;

class ProType extends \Pub\ModelBase
{
	public $_Id;
	public $_ProId;
	public $_Name;
	public $_Pic;
	public $_KuCun;
	public $_Price;
	public $_HuiDian;
	public $_Point;
	public $_GuiGeJson;
	public $_GuiGe1;
	public $_GuiGe2;
	public $_GuiGe3;
	public $_GuiGe4;
	public $_GuiGe5;
	public $_PriceCost;
	public $_CanUseYuE;
	public $_EditTime;

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
	   $this->_ProId = new M('PRO_ID','','int');
	   $this->_Name = new M('NAME','','string');
	   $this->_Pic = new M('PIC','','string');
	   $this->_KuCun = new M('KU_CUN','','int');
	   $this->_Price = new M('PRICE','','decimal');
	   $this->_HuiDian = new M('HUI_DIAN','','decimal');
	   $this->_Point = new M('POINT','','decimal');
	   $this->_GuiGeJson = new M('GUI_GE_JSON','','string');
	   $this->_GuiGe1 = new M('GUI_GE_1','','int');
	   $this->_GuiGe2 = new M('GUI_GE_2','','int');
	   $this->_GuiGe3 = new M('GUI_GE_3','','int');
	   $this->_GuiGe4 = new M('GUI_GE_4','','int');
	   $this->_GuiGe5 = new M('GUI_GE_5','','int');
	   $this->_PriceCost = new M('PRICE_COST','','decimal');
	   $this->_CanUseYuE = new M('CAN_USE_YU_E','','decimal');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function ProId($v=null){if(isset($v)){$this->_ProId->Set($v);}else{return $this->_ProId->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function Pic($v=null){if(isset($v)){$this->_Pic->Set($v);}else{return $this->_Pic->v;}}
	public function KuCun($v=null){if(isset($v)){$this->_KuCun->Set($v);}else{return $this->_KuCun->v;}}
	public function Price($v=null){if(isset($v)){$this->_Price->Set($v);}else{return $this->_Price->v;}}
	public function HuiDian($v=null){if(isset($v)){$this->_HuiDian->Set($v);}else{return $this->_HuiDian->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}
	public function GuiGeJson($v=null){if(isset($v)){$this->_GuiGeJson->Set($v);}else{return $this->_GuiGeJson->v;}}
	public function GuiGe1($v=null){if(isset($v)){$this->_GuiGe1->Set($v);}else{return $this->_GuiGe1->v;}}
	public function GuiGe2($v=null){if(isset($v)){$this->_GuiGe2->Set($v);}else{return $this->_GuiGe2->v;}}
	public function GuiGe3($v=null){if(isset($v)){$this->_GuiGe3->Set($v);}else{return $this->_GuiGe3->v;}}
	public function GuiGe4($v=null){if(isset($v)){$this->_GuiGe4->Set($v);}else{return $this->_GuiGe4->v;}}
	public function GuiGe5($v=null){if(isset($v)){$this->_GuiGe5->Set($v);}else{return $this->_GuiGe5->v;}}
	public function PriceCost($v=null){if(isset($v)){$this->_PriceCost->Set($v);}else{return $this->_PriceCost->v;}}
	public function CanUseYuE($v=null){if(isset($v)){$this->_CanUseYuE->Set($v);}else{return $this->_CanUseYuE->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\ProType::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\ProType::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','PRO_ID'=>'057c5e70889f440c4bda1545148801f4fa749515',
                'NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2','PIC'=>'3f93621666c16a185ebdf70412bee333d2f3a266',
                'KU_CUN'=>'ba24238d8d6810418bb4a556f90bb885c77cb62c','PRICE'=>'6e72f93a1bc6a739c71d899e61aa90747ff7b10a',
                'HUI_DIAN'=>'cd399801c67d4f0272e402b90b929c016ba61a52','POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199',
                'GUI_GE_JSON'=>'ecd89f0dfc152122575c7384060e91f033c07cee','GUI_GE_1'=>'7943fcc5ed6920eb9fdca9e5a1d118c3410b35b0',
                'GUI_GE_2'=>'45fe39d5395bd7d98720e95c2658f438e645f9ed','GUI_GE_3'=>'d6d30aa98e7ebc31c17032413ab0995b0b2af8bb',
                'GUI_GE_4'=>'a3fa961d5d08d37d1e59af38d08bff460c4046e3','GUI_GE_5'=>'42fb3a631013d3ccb2492f95256110439b00294f',
                'PRICE_COST'=>'1b628e71d2ee4d16a455948ef4609efa02d42927','CAN_USE_YU_E'=>'8257ca3ffb691fe4353f403e817952e424d80215',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}