<?php 
namespace Model;
use \Pub\M;

class OrderMallDetail extends \Pub\ModelBase
{
	public $_Id;
	public $_OrderId;
	public $_UserId;
	public $_ShopId;
	public $_ProId;
	public $_ProTypeId;
	public $_MoneyPro;
	public $_MoneyYunFei;
	public $_ProCount;
	public $_HuiDianPro;
	public $_HuiDianUsed;
	public $_ProName;
	public $_ProTypeName;
	public $_State2;
	public $_KuaiDiGongSi;
	public $_KuaiDiDanHao;
	public $_FaHuoTime;
	public $_ShouHuoTime;
	public $_PayMoney;
	public $_PayHuiDian;
	public $_WillDoTime;
	public $_WillDoMonth;
	public $_DoTime;
	public $_FeedBack;
	public $_RecommondPerson;
	public $_ShopRecommond;
	public $_SheQu;
	public $_QuXian;
	public $_FenGongSi;
	public $_ShiChangBu;
	public $_RecommondQuXian;
	public $_CaiWu;
	public $_ShengYu;
	public $_IdRecommondPerson;
	public $_IdShopRecommond;
	public $_IdSheQu;
	public $_IdQuXian;
	public $_IdFenGongSi;
	public $_IdShiChangBu;
	public $_IdRecommondQuXian;
	public $_IdCaiWu;
	public $_DoState;
	public $_Point;
	public $_EndShouHuoTime;
	public $_TuiTime;
	public $_TuiReason;
	public $_EndTuiTime;
	public $_TuiFahuoTime;
	public $_EndTuiFahuoTime;
	public $_TuiShouhuoTime;
	public $_EndTuiShouhuoTime;
	public $_TuiKuaidi;
	public $_TuiKuaidiDanhao;
	public $_IsPingJia;
	public $_ShopRoleId;
	public $_Mess;
	public $_ShopRate;
	public $_TypePoint;
	public $_ShopSetYunFei;
	public $_State26Time;
	public $_GongYingShangId;
	public $_ChengBenPrice;
	public $_UsedMoneyAll;
	public $_UsedYuE;
	public $_UsedBank;
	public $_CanUseYuE;
	public $_EditTime;
	public $_AddTime;

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
	   $this->_OrderId = new M('ORDER_ID','','int');
	   $this->_UserId = new M('USER_ID','','int');
	   $this->_ShopId = new M('SHOP_ID','','int');
	   $this->_ProId = new M('PRO_ID','','int');
	   $this->_ProTypeId = new M('PRO_TYPE_ID','','int');
	   $this->_MoneyPro = new M('MONEY_PRO','','decimal');
	   $this->_MoneyYunFei = new M('MONEY_YUN_FEI','','decimal');
	   $this->_ProCount = new M('PRO_COUNT','','int');
	   $this->_HuiDianPro = new M('HUI_DIAN_PRO','','decimal');
	   $this->_HuiDianUsed = new M('HUI_DIAN_USED','','decimal');
	   $this->_ProName = new M('PRO_NAME','','string');
	   $this->_ProTypeName = new M('PRO_TYPE_NAME','','string');
	   $this->_State2 = new M('STATE2','','decimal');
	   $this->_KuaiDiGongSi = new M('KUAI_DI_GONG_SI','','int');
	   $this->_KuaiDiDanHao = new M('KUAI_DI_DAN_HAO','','string');
	   $this->_FaHuoTime = new M('FA_HUO_TIME','','DateTime');
	   $this->_ShouHuoTime = new M('SHOU_HUO_TIME','','DateTime');
	   $this->_PayMoney = new M('PAY_MONEY','','decimal');
	   $this->_PayHuiDian = new M('PAY_HUI_DIAN','','decimal');
	   $this->_WillDoTime = new M('WILL_DO_TIME','','DateTime');
	   $this->_WillDoMonth = new M('WILL_DO_MONTH','','DateTime');
	   $this->_DoTime = new M('DO_TIME','','DateTime');
	   $this->_FeedBack = new M('FEED_BACK','','decimal');
	   $this->_RecommondPerson = new M('RECOMMOND_PERSON','','decimal');
	   $this->_ShopRecommond = new M('SHOP_RECOMMOND','','decimal');
	   $this->_SheQu = new M('SHE_QU','','decimal');
	   $this->_QuXian = new M('QU_XIAN','','decimal');
	   $this->_FenGongSi = new M('FEN_GONG_SI','','decimal');
	   $this->_ShiChangBu = new M('SHI_CHANG_BU','','decimal');
	   $this->_RecommondQuXian = new M('RECOMMOND_QU_XIAN','','decimal');
	   $this->_CaiWu = new M('CAI_WU','','decimal');
	   $this->_ShengYu = new M('SHENG_YU','','decimal');
	   $this->_IdRecommondPerson = new M('ID_RECOMMOND_PERSON','','int');
	   $this->_IdShopRecommond = new M('ID_SHOP_RECOMMOND','','int');
	   $this->_IdSheQu = new M('ID_SHE_QU','','int');
	   $this->_IdQuXian = new M('ID_QU_XIAN','','int');
	   $this->_IdFenGongSi = new M('ID_FEN_GONG_SI','','int');
	   $this->_IdShiChangBu = new M('ID_SHI_CHANG_BU','','int');
	   $this->_IdRecommondQuXian = new M('ID_RECOMMOND_QU_XIAN','','int');
	   $this->_IdCaiWu = new M('ID_CAI_WU','','int');
	   $this->_DoState = new M('DO_STATE','','int');
	   $this->_Point = new M('POINT','','decimal');
	   $this->_EndShouHuoTime = new M('END_SHOU_HUO_TIME','','DateTime');
	   $this->_TuiTime = new M('TUI_TIME','','DateTime');
	   $this->_TuiReason = new M('TUI_REASON','','int');
	   $this->_EndTuiTime = new M('END_TUI_TIME','','DateTime');
	   $this->_TuiFahuoTime = new M('TUI_FAHUO_TIME','','DateTime');
	   $this->_EndTuiFahuoTime = new M('END_TUI_FAHUO_TIME','','DateTime');
	   $this->_TuiShouhuoTime = new M('TUI_SHOUHUO_TIME','','DateTime');
	   $this->_EndTuiShouhuoTime = new M('END_TUI_SHOUHUO_TIME','','DateTime');
	   $this->_TuiKuaidi = new M('TUI_KUAIDI','','int');
	   $this->_TuiKuaidiDanhao = new M('TUI_KUAIDI_DANHAO','','string');
	   $this->_IsPingJia = new M('IS_PING_JIA','','int');
	   $this->_ShopRoleId = new M('SHOP_ROLE_ID','','int');
	   $this->_Mess = new M('MESS','','string');
	   $this->_ShopRate = new M('SHOP_RATE','','decimal');
	   $this->_TypePoint = new M('TYPE_POINT','','decimal');
	   $this->_ShopSetYunFei = new M('SHOP_SET_YUN_FEI','','decimal');
	   $this->_State26Time = new M('STATE26_TIME','','DateTime');
	   $this->_GongYingShangId = new M('GONG_YING_SHANG_ID','','int');
	   $this->_ChengBenPrice = new M('CHENG_BEN_PRICE','','decimal');
	   $this->_UsedMoneyAll = new M('USED_MONEY_ALL','','decimal');
	   $this->_UsedYuE = new M('USED_YU_E','','decimal');
	   $this->_UsedBank = new M('USED_BANK','','decimal');
	   $this->_CanUseYuE = new M('CAN_USE_YU_E','','decimal');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function OrderId($v=null){if(isset($v)){$this->_OrderId->Set($v);}else{return $this->_OrderId->v;}}
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function ShopId($v=null){if(isset($v)){$this->_ShopId->Set($v);}else{return $this->_ShopId->v;}}
	public function ProId($v=null){if(isset($v)){$this->_ProId->Set($v);}else{return $this->_ProId->v;}}
	public function ProTypeId($v=null){if(isset($v)){$this->_ProTypeId->Set($v);}else{return $this->_ProTypeId->v;}}
	public function MoneyPro($v=null){if(isset($v)){$this->_MoneyPro->Set($v);}else{return $this->_MoneyPro->v;}}
	public function MoneyYunFei($v=null){if(isset($v)){$this->_MoneyYunFei->Set($v);}else{return $this->_MoneyYunFei->v;}}
	public function ProCount($v=null){if(isset($v)){$this->_ProCount->Set($v);}else{return $this->_ProCount->v;}}
	public function HuiDianPro($v=null){if(isset($v)){$this->_HuiDianPro->Set($v);}else{return $this->_HuiDianPro->v;}}
	public function HuiDianUsed($v=null){if(isset($v)){$this->_HuiDianUsed->Set($v);}else{return $this->_HuiDianUsed->v;}}
	public function ProName($v=null){if(isset($v)){$this->_ProName->Set($v);}else{return $this->_ProName->v;}}
	public function ProTypeName($v=null){if(isset($v)){$this->_ProTypeName->Set($v);}else{return $this->_ProTypeName->v;}}
	public function State2($v=null){if(isset($v)){$this->_State2->Set($v);}else{return $this->_State2->v;}}
	public function KuaiDiGongSi($v=null){if(isset($v)){$this->_KuaiDiGongSi->Set($v);}else{return $this->_KuaiDiGongSi->v;}}
	public function KuaiDiDanHao($v=null){if(isset($v)){$this->_KuaiDiDanHao->Set($v);}else{return $this->_KuaiDiDanHao->v;}}
	public function FaHuoTime($v=null){if(isset($v)){$this->_FaHuoTime->Set($v);}else{return $this->_FaHuoTime->v;}}
	public function ShouHuoTime($v=null){if(isset($v)){$this->_ShouHuoTime->Set($v);}else{return $this->_ShouHuoTime->v;}}
	public function PayMoney($v=null){if(isset($v)){$this->_PayMoney->Set($v);}else{return $this->_PayMoney->v;}}
	public function PayHuiDian($v=null){if(isset($v)){$this->_PayHuiDian->Set($v);}else{return $this->_PayHuiDian->v;}}
	public function WillDoTime($v=null){if(isset($v)){$this->_WillDoTime->Set($v);}else{return $this->_WillDoTime->v;}}
	public function WillDoMonth($v=null){if(isset($v)){$this->_WillDoMonth->Set($v);}else{return $this->_WillDoMonth->v;}}
	public function DoTime($v=null){if(isset($v)){$this->_DoTime->Set($v);}else{return $this->_DoTime->v;}}
	public function FeedBack($v=null){if(isset($v)){$this->_FeedBack->Set($v);}else{return $this->_FeedBack->v;}}
	public function RecommondPerson($v=null){if(isset($v)){$this->_RecommondPerson->Set($v);}else{return $this->_RecommondPerson->v;}}
	public function ShopRecommond($v=null){if(isset($v)){$this->_ShopRecommond->Set($v);}else{return $this->_ShopRecommond->v;}}
	public function SheQu($v=null){if(isset($v)){$this->_SheQu->Set($v);}else{return $this->_SheQu->v;}}
	public function QuXian($v=null){if(isset($v)){$this->_QuXian->Set($v);}else{return $this->_QuXian->v;}}
	public function FenGongSi($v=null){if(isset($v)){$this->_FenGongSi->Set($v);}else{return $this->_FenGongSi->v;}}
	public function ShiChangBu($v=null){if(isset($v)){$this->_ShiChangBu->Set($v);}else{return $this->_ShiChangBu->v;}}
	public function RecommondQuXian($v=null){if(isset($v)){$this->_RecommondQuXian->Set($v);}else{return $this->_RecommondQuXian->v;}}
	public function CaiWu($v=null){if(isset($v)){$this->_CaiWu->Set($v);}else{return $this->_CaiWu->v;}}
	public function ShengYu($v=null){if(isset($v)){$this->_ShengYu->Set($v);}else{return $this->_ShengYu->v;}}
	public function IdRecommondPerson($v=null){if(isset($v)){$this->_IdRecommondPerson->Set($v);}else{return $this->_IdRecommondPerson->v;}}
	public function IdShopRecommond($v=null){if(isset($v)){$this->_IdShopRecommond->Set($v);}else{return $this->_IdShopRecommond->v;}}
	public function IdSheQu($v=null){if(isset($v)){$this->_IdSheQu->Set($v);}else{return $this->_IdSheQu->v;}}
	public function IdQuXian($v=null){if(isset($v)){$this->_IdQuXian->Set($v);}else{return $this->_IdQuXian->v;}}
	public function IdFenGongSi($v=null){if(isset($v)){$this->_IdFenGongSi->Set($v);}else{return $this->_IdFenGongSi->v;}}
	public function IdShiChangBu($v=null){if(isset($v)){$this->_IdShiChangBu->Set($v);}else{return $this->_IdShiChangBu->v;}}
	public function IdRecommondQuXian($v=null){if(isset($v)){$this->_IdRecommondQuXian->Set($v);}else{return $this->_IdRecommondQuXian->v;}}
	public function IdCaiWu($v=null){if(isset($v)){$this->_IdCaiWu->Set($v);}else{return $this->_IdCaiWu->v;}}
	public function DoState($v=null){if(isset($v)){$this->_DoState->Set($v);}else{return $this->_DoState->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}
	public function EndShouHuoTime($v=null){if(isset($v)){$this->_EndShouHuoTime->Set($v);}else{return $this->_EndShouHuoTime->v;}}
	public function TuiTime($v=null){if(isset($v)){$this->_TuiTime->Set($v);}else{return $this->_TuiTime->v;}}
	public function TuiReason($v=null){if(isset($v)){$this->_TuiReason->Set($v);}else{return $this->_TuiReason->v;}}
	public function EndTuiTime($v=null){if(isset($v)){$this->_EndTuiTime->Set($v);}else{return $this->_EndTuiTime->v;}}
	public function TuiFahuoTime($v=null){if(isset($v)){$this->_TuiFahuoTime->Set($v);}else{return $this->_TuiFahuoTime->v;}}
	public function EndTuiFahuoTime($v=null){if(isset($v)){$this->_EndTuiFahuoTime->Set($v);}else{return $this->_EndTuiFahuoTime->v;}}
	public function TuiShouhuoTime($v=null){if(isset($v)){$this->_TuiShouhuoTime->Set($v);}else{return $this->_TuiShouhuoTime->v;}}
	public function EndTuiShouhuoTime($v=null){if(isset($v)){$this->_EndTuiShouhuoTime->Set($v);}else{return $this->_EndTuiShouhuoTime->v;}}
	public function TuiKuaidi($v=null){if(isset($v)){$this->_TuiKuaidi->Set($v);}else{return $this->_TuiKuaidi->v;}}
	public function TuiKuaidiDanhao($v=null){if(isset($v)){$this->_TuiKuaidiDanhao->Set($v);}else{return $this->_TuiKuaidiDanhao->v;}}
	public function IsPingJia($v=null){if(isset($v)){$this->_IsPingJia->Set($v);}else{return $this->_IsPingJia->v;}}
	public function ShopRoleId($v=null){if(isset($v)){$this->_ShopRoleId->Set($v);}else{return $this->_ShopRoleId->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function ShopRate($v=null){if(isset($v)){$this->_ShopRate->Set($v);}else{return $this->_ShopRate->v;}}
	public function TypePoint($v=null){if(isset($v)){$this->_TypePoint->Set($v);}else{return $this->_TypePoint->v;}}
	public function ShopSetYunFei($v=null){if(isset($v)){$this->_ShopSetYunFei->Set($v);}else{return $this->_ShopSetYunFei->v;}}
	public function State26Time($v=null){if(isset($v)){$this->_State26Time->Set($v);}else{return $this->_State26Time->v;}}
	public function GongYingShangId($v=null){if(isset($v)){$this->_GongYingShangId->Set($v);}else{return $this->_GongYingShangId->v;}}
	public function ChengBenPrice($v=null){if(isset($v)){$this->_ChengBenPrice->Set($v);}else{return $this->_ChengBenPrice->v;}}
	public function UsedMoneyAll($v=null){if(isset($v)){$this->_UsedMoneyAll->Set($v);}else{return $this->_UsedMoneyAll->v;}}
	public function UsedYuE($v=null){if(isset($v)){$this->_UsedYuE->Set($v);}else{return $this->_UsedYuE->v;}}
	public function UsedBank($v=null){if(isset($v)){$this->_UsedBank->Set($v);}else{return $this->_UsedBank->v;}}
	public function CanUseYuE($v=null){if(isset($v)){$this->_CanUseYuE->Set($v);}else{return $this->_CanUseYuE->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\OrderMallDetail::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\OrderMallDetail::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','ORDER_ID'=>'3448852f03115e9bf198c9bb6e06def1b9a9c4fc',
                'USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf','SHOP_ID'=>'5cbc05352ba688473dae46a2895c8b35c4e0c47c',
                'PRO_ID'=>'057c5e70889f440c4bda1545148801f4fa749515','PRO_TYPE_ID'=>'3bd4d0954c4d894726b49d2f7b8ad1e2797bb37c',
                'MONEY_PRO'=>'818f6b3f89b1faaa2e561c75c4c205602e834c15','MONEY_YUN_FEI'=>'64287bc1449357c24000cadcd74f68413f4f2bee',
                'PRO_COUNT'=>'257fe67f1086afbd40e70e9f831a7e1b704afabe','HUI_DIAN_PRO'=>'f8155b697cb53a68a27276a4ca272c53b15d969e',
                'HUI_DIAN_USED'=>'dbba0c37184ffcf8c5a0a56e0de5e546bc2ef6cd','PRO_NAME'=>'0061c9b5ea3ad8ad3164340b77439abf102409d8',
                'PRO_TYPE_NAME'=>'2d00044a9dc253b3da5be32bfc3477c389793f4e','STATE2'=>'ac1d595027ea378354007a1e88dc56117389faf5',
                'KUAI_DI_GONG_SI'=>'95c878270490c21232673e3dfd9efdef6682bb1d','KUAI_DI_DAN_HAO'=>'aab5b05d0b260d92ae924c8301c64ace047ba0ff',
                'FA_HUO_TIME'=>'dacf9cdb12e583374d2bdd72a797ca67a7b9026c','SHOU_HUO_TIME'=>'a27a7f573d7b7862500c9baacc40c23f847070f5',
                'PAY_MONEY'=>'6b4cfdb496e4b508f6c0e393dcb6692e5b98f065','PAY_HUI_DIAN'=>'452c5ded1d61c2badfa01318144cc1e9b1399605',
                'WILL_DO_TIME'=>'f90cfad4f3485ec24ab2a56b6f3c3c4febc5f028','WILL_DO_MONTH'=>'0a841c2fc234d46a73bb26a1addbae8648cd08bc',
                'DO_TIME'=>'10c1d7f61a35a3447e86420b4bea88005a59b661','FEED_BACK'=>'d6c9a77f20bbf3c097176521d28fd9b7e968f4fc',
                'RECOMMOND_PERSON'=>'c800f5b0e63e402613883e5cfaec8859913207fb','SHOP_RECOMMOND'=>'1237bf6567c230848506e719862de8ac7b1b3ba9',
                'SHE_QU'=>'9cb201295493bbfa3a25a9715de92689758aaea1','QU_XIAN'=>'bcde925378ca63a3a845d9781c7b78bdc331cd9f',
                'FEN_GONG_SI'=>'77f635e2c281d23ada88c8f495317662fa11d330','SHI_CHANG_BU'=>'58d003c8d2a1c5a837e69b0a327307fbe284f49d',
                'RECOMMOND_QU_XIAN'=>'02571106765d55608a01b8e651ec3f154442cddd','CAI_WU'=>'34897985d6d5f856d86076f78ebf9320393c1836',
                'SHENG_YU'=>'dd1f26df20e9a1e6bb790b16e4c2c97042e66bba','ID_RECOMMOND_PERSON'=>'0c855e45b867fc0fc436298fb4e1301f3605ba18',
                'ID_SHOP_RECOMMOND'=>'f0813b851655a2748819f456d6d5461d9b9ac56c','ID_SHE_QU'=>'fda4ffb89cc23f2dc718be671f7b1d2995e1f810',
                'ID_QU_XIAN'=>'a2668d9772049dd15e701920fe9c25d7472fb363','ID_FEN_GONG_SI'=>'e64a47306a547f5ef1a61fef07e33256c87d1107',
                'ID_SHI_CHANG_BU'=>'fa7c7158e6e974e5ef66e871a28b7511a719b461','ID_RECOMMOND_QU_XIAN'=>'95dc440dc0d3905114b8c63f72e1c4cea7948a29',
                'ID_CAI_WU'=>'a2c9459eb7e929e103a12a455c0945346b7f9f1e','DO_STATE'=>'9a39962b110927c28a5e03e224b729847560c76a',
                'POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199','END_SHOU_HUO_TIME'=>'cac463d4eb18c4e0864d7f83029d035e9ee19d36',
                'TUI_TIME'=>'457d693b685370569451ac0f72921d4cf8ad6613','TUI_REASON'=>'078d535e9f651eabbecb982b570d317ad6852bb6',
                'END_TUI_TIME'=>'76a0cd58dd2d5a1582532691a4cba44df957343c','TUI_FAHUO_TIME'=>'29fb59851c0e609d44add8dd5aede6da01b057fd',
                'END_TUI_FAHUO_TIME'=>'3f818ed738e00cd0cc418b1bde1725749ec7af45','TUI_SHOUHUO_TIME'=>'28580a61f6fb921addd739bea717201c9e045d4a',
                'END_TUI_SHOUHUO_TIME'=>'d981b1f58b45a4e546e77ee9eb7ed6592b9445e1','TUI_KUAIDI'=>'18dc3f33ec1717feb42fff487c2013034fe998c2',
                'TUI_KUAIDI_DANHAO'=>'3189fad86b778719b9e6dcfdb7e0d29fc9781877','IS_PING_JIA'=>'df96628dfa9b46460760dedb1d6c4ecede32dc68',
                'SHOP_ROLE_ID'=>'a58a6d675fdf7a623f5bd3ba2e910a6cc8d10bf1','MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce',
                'SHOP_RATE'=>'3c53dfc68cef8c3231dc22bd6ad62fb891e4f81d','TYPE_POINT'=>'9553253aa86e58d8b28ded3e75762f73cabe4887',
                'SHOP_SET_YUN_FEI'=>'e7f4b411fc5c11c99fbc1da948af06e5bb9534f0','STATE26_TIME'=>'b84ba151cb47f0989acce1b7c8f5e859287c22ec',
                'GONG_YING_SHANG_ID'=>'0678093a2fc13b31938ef47d206e40e56bac363f','CHENG_BEN_PRICE'=>'a89cdc9c277ad0184bdfa31820cb00fb0d45ddc5',
                'USED_MONEY_ALL'=>'d0cf1b7e6f6512c857ec014589bf20f1658d9187','USED_YU_E'=>'6efe6a2844a6e6764974dae8a0b50b60c17ad66a',
                'USED_BANK'=>'902891885ba67115a99f58741e3d154720a1d3a9','CAN_USE_YU_E'=>'8257ca3ffb691fe4353f403e817952e424d80215',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a','ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1'];
    }
}