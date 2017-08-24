<?php 
namespace Model;
use \Pub\M;

class Pro extends \Pub\ModelBase
{
	public $_Id;
	public $_UserId;
	public $_Name;
	public $_Name2;
	public $_SortId3;
	public $_SortId;
	public $_SortParentId;
	public $_Price;
	public $_PriceShop;
	public $_ShiChangPrice;
	public $_HuiDian;
	public $_HuiDianShop;
	public $_Pic;
	public $_State;
	public $_AddTime;
	public $_EditTime;
	public $_WuLiuId;
	public $_Point;
	public $_PointFree;
	public $_ViewCount;
	public $_XiaoLiang;
	public $_RoleId;
	public $_ProLevelNum;
	public $_ShopName;
	public $_GuiGeJson;
	public $_HaoPingShu;
	public $_ChaPingShu;
	public $_BeiZhu;
	public $_Sheng;
	public $_Shi;
	public $_Qu;
	public $_Xian;
	public $_JingPoint;
	public $_JingEndTime;
	public $_JingDoPoint;
	public $_GongYingShangId;
	public $_CangKuId;
	public $_JingDoPoint2;
	public $_HuidianDui;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['NAME'],'required'],
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
	   $this->_Name2 = new M('NAME2','','string');
	   $this->_SortId3 = new M('SORT_ID3','','int');
	   $this->_SortId = new M('SORT_ID','','int');
	   $this->_SortParentId = new M('SORT_PARENT_ID','','int');
	   $this->_Price = new M('PRICE','','decimal');
	   $this->_PriceShop = new M('PRICE_SHOP','','decimal');
	   $this->_ShiChangPrice = new M('SHI_CHANG_PRICE','','decimal');
	   $this->_HuiDian = new M('HUI_DIAN','','decimal');
	   $this->_HuiDianShop = new M('HUI_DIAN_SHOP','','decimal');
	   $this->_Pic = new M('PIC','','string');
	   $this->_State = new M('STATE','','decimal');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   $this->_WuLiuId = new M('WU_LIU_ID','','int');
	   $this->_Point = new M('POINT','','decimal');
	   $this->_PointFree = new M('POINT_FREE','','decimal');
	   $this->_ViewCount = new M('VIEW_COUNT','','int');
	   $this->_XiaoLiang = new M('XIAO_LIANG','','int');
	   $this->_RoleId = new M('ROLE_ID','','int');
	   $this->_ProLevelNum = new M('PRO_LEVEL_NUM','','int');
	   $this->_ShopName = new M('SHOP_NAME','','string');
	   $this->_GuiGeJson = new M('GUI_GE_JSON','','string');
	   $this->_HaoPingShu = new M('HAO_PING_SHU','','int');
	   $this->_ChaPingShu = new M('CHA_PING_SHU','','int');
	   $this->_BeiZhu = new M('BEI_ZHU','','string');
	   $this->_Sheng = new M('SHENG','','int');
	   $this->_Shi = new M('SHI','','int');
	   $this->_Qu = new M('QU','','int');
	   $this->_Xian = new M('XIAN','','int');
	   $this->_JingPoint = new M('JING_POINT','','int');
	   $this->_JingEndTime = new M('JING_END_TIME','','DateTime');
	   $this->_JingDoPoint = new M('JING_DO_POINT','','int');
	   $this->_GongYingShangId = new M('GONG_YING_SHANG_ID','','int');
	   $this->_CangKuId = new M('CANG_KU_ID','','int');
	   $this->_JingDoPoint2 = new M('JING_DO_POINT2','','int');
	   $this->_HuidianDui = new M('HUIDIAN_DUI','','decimal');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function Name2($v=null){if(isset($v)){$this->_Name2->Set($v);}else{return $this->_Name2->v;}}
	public function SortId3($v=null){if(isset($v)){$this->_SortId3->Set($v);}else{return $this->_SortId3->v;}}
	public function SortId($v=null){if(isset($v)){$this->_SortId->Set($v);}else{return $this->_SortId->v;}}
	public function SortParentId($v=null){if(isset($v)){$this->_SortParentId->Set($v);}else{return $this->_SortParentId->v;}}
	public function Price($v=null){if(isset($v)){$this->_Price->Set($v);}else{return $this->_Price->v;}}
	public function PriceShop($v=null){if(isset($v)){$this->_PriceShop->Set($v);}else{return $this->_PriceShop->v;}}
	public function ShiChangPrice($v=null){if(isset($v)){$this->_ShiChangPrice->Set($v);}else{return $this->_ShiChangPrice->v;}}
	public function HuiDian($v=null){if(isset($v)){$this->_HuiDian->Set($v);}else{return $this->_HuiDian->v;}}
	public function HuiDianShop($v=null){if(isset($v)){$this->_HuiDianShop->Set($v);}else{return $this->_HuiDianShop->v;}}
	public function Pic($v=null){if(isset($v)){$this->_Pic->Set($v);}else{return $this->_Pic->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}
	public function WuLiuId($v=null){if(isset($v)){$this->_WuLiuId->Set($v);}else{return $this->_WuLiuId->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}
	public function PointFree($v=null){if(isset($v)){$this->_PointFree->Set($v);}else{return $this->_PointFree->v;}}
	public function ViewCount($v=null){if(isset($v)){$this->_ViewCount->Set($v);}else{return $this->_ViewCount->v;}}
	public function XiaoLiang($v=null){if(isset($v)){$this->_XiaoLiang->Set($v);}else{return $this->_XiaoLiang->v;}}
	public function RoleId($v=null){if(isset($v)){$this->_RoleId->Set($v);}else{return $this->_RoleId->v;}}
	public function ProLevelNum($v=null){if(isset($v)){$this->_ProLevelNum->Set($v);}else{return $this->_ProLevelNum->v;}}
	public function ShopName($v=null){if(isset($v)){$this->_ShopName->Set($v);}else{return $this->_ShopName->v;}}
	public function GuiGeJson($v=null){if(isset($v)){$this->_GuiGeJson->Set($v);}else{return $this->_GuiGeJson->v;}}
	public function HaoPingShu($v=null){if(isset($v)){$this->_HaoPingShu->Set($v);}else{return $this->_HaoPingShu->v;}}
	public function ChaPingShu($v=null){if(isset($v)){$this->_ChaPingShu->Set($v);}else{return $this->_ChaPingShu->v;}}
	public function BeiZhu($v=null){if(isset($v)){$this->_BeiZhu->Set($v);}else{return $this->_BeiZhu->v;}}
	public function Sheng($v=null){if(isset($v)){$this->_Sheng->Set($v);}else{return $this->_Sheng->v;}}
	public function Shi($v=null){if(isset($v)){$this->_Shi->Set($v);}else{return $this->_Shi->v;}}
	public function Qu($v=null){if(isset($v)){$this->_Qu->Set($v);}else{return $this->_Qu->v;}}
	public function Xian($v=null){if(isset($v)){$this->_Xian->Set($v);}else{return $this->_Xian->v;}}
	public function JingPoint($v=null){if(isset($v)){$this->_JingPoint->Set($v);}else{return $this->_JingPoint->v;}}
	public function JingEndTime($v=null){if(isset($v)){$this->_JingEndTime->Set($v);}else{return $this->_JingEndTime->v;}}
	public function JingDoPoint($v=null){if(isset($v)){$this->_JingDoPoint->Set($v);}else{return $this->_JingDoPoint->v;}}
	public function GongYingShangId($v=null){if(isset($v)){$this->_GongYingShangId->Set($v);}else{return $this->_GongYingShangId->v;}}
	public function CangKuId($v=null){if(isset($v)){$this->_CangKuId->Set($v);}else{return $this->_CangKuId->v;}}
	public function JingDoPoint2($v=null){if(isset($v)){$this->_JingDoPoint2->Set($v);}else{return $this->_JingDoPoint2->v;}}
	public function HuidianDui($v=null){if(isset($v)){$this->_HuidianDui->Set($v);}else{return $this->_HuidianDui->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\Pro::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\Pro::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf',
                'NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2','NAME2'=>'508c7afc4a02ebf82278840faeb84b8e54482047',
                'SORT_ID3'=>'1b8c76455b16f78c3c1be9c4c50213214669fd85','SORT_ID'=>'7b1921ba0a697f95ec81d625b3f5661e3fec69f3',
                'SORT_PARENT_ID'=>'6df0337010619f511fc3b8f16aa9d8dcd118e7f6','PRICE'=>'6e72f93a1bc6a739c71d899e61aa90747ff7b10a',
                'PRICE_SHOP'=>'dbe68857b45c3a3c49bddbdd3237b7c700806088','SHI_CHANG_PRICE'=>'273da0e7aba44c8857bf8bed1d16adbd8df9d83d',
                'HUI_DIAN'=>'cd399801c67d4f0272e402b90b929c016ba61a52','HUI_DIAN_SHOP'=>'ddcea76b3e94e491eb8ed036ffc88464455d4107',
                'PIC'=>'3f93621666c16a185ebdf70412bee333d2f3a266','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1','EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a',
                'WU_LIU_ID'=>'ef36c7f55ef0cced35b27217aa98fe024e4d26bb','POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199',
                'POINT_FREE'=>'5cfae94c250ad627904cde308546c4c6fe1f3821','VIEW_COUNT'=>'e768be12030ae6d9d0a920d6cf6bfde56c517cc9',
                'XIAO_LIANG'=>'0344ed3a3a1ab4287b7d33ab800ff4d0a5acbbbd','ROLE_ID'=>'40c8221de27b9a748c103091ced93e100faf6157',
                'PRO_LEVEL_NUM'=>'e74f42a3f27504e27599407f61a5a23593f5da1a','SHOP_NAME'=>'31af4e92738910664bd4d7776af869e511e8fc61',
                'GUI_GE_JSON'=>'ecd89f0dfc152122575c7384060e91f033c07cee','HAO_PING_SHU'=>'adc1ea748f385f1996ff3fb996115f7563c50452',
                'CHA_PING_SHU'=>'5a5c3fce2e88f0739cc5fe8e8239685ef8166705','BEI_ZHU'=>'b061a2bc48e4849df811c5e27ca1e68bff08459e',
                'SHENG'=>'701eaee81fdbf49f4e8743b53a68faf3c24bb0f6','SHI'=>'898294e09e4c1f47f704fb76a6936aea988fc73b',
                'QU'=>'6e5a5ce129455591c5d25d21ac92468522021fa4','XIAN'=>'436c22d5220deba5ccf8f24d355827cf591fe0db',
                'JING_POINT'=>'5d1a0ab9701b8e4f73fb4072bf4758eb106b1d49','JING_END_TIME'=>'83c463bfe2f02fd3b2013d00380b6bf10396f95d',
                'JING_DO_POINT'=>'11a8b6bad3b0c4afc6f34809509162f94191f3cf','GONG_YING_SHANG_ID'=>'0678093a2fc13b31938ef47d206e40e56bac363f',
                'CANG_KU_ID'=>'953b2b6bc6df13989c536c1f742fade58f5ef1dc','JING_DO_POINT2'=>'badcb26bcc83aa3b12d6e6d4880193f403c60cdb',
                'HUIDIAN_DUI'=>'a95381132eb059cf819f15f59a30a36fcc91ee5d'];
    }
}