<?php 
namespace Model;
use \Pub\M;

class UserInfo extends \Pub\ModelBase
{
	public $_UserId;
	public $_UserPic;
	public $_ShopPic;
	public $_YingYeZhiZhao;
	public $_Sort1;
	public $_Sort2;
	public $_IdCardPic;
	public $_FuJian;
	public $_CurrentLoginId;
	public $_CheckTeam;
	public $_ShopYaJin;
	public $_CheckPm;
	public $_QjUrl;
	public $_StateJiHuo;
	public $_JiHuoTime;
	public $_CheckYg;
	public $_TuiQianShenQingTime;
	public $_TuiQianFinishedTime;
	public $_ChuZhiKaMoney;
	public $_ChuZhiKaMoneyXiaoFei;
	public $_ShopYaJinCaiwu;
	public $_ShopYaJinShichang;
	public $_ShopYaJinQuxian;
	public $_ShopYaJinAll;
	public $_TypeList;
	public $_IsGongYingShang;
	public $_IdCardPicB;
	public $_BankCardA;
	public $_BankCardB;
	public $_ExpDate;
	public $_TeamId;
	public $_TuiYaJinOrderId;
	public $_ShenQingShangHu;
	public $_Token;

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
	   $this->_UserId = new M('USER_ID','','int');
       $this->_UserId->AutoKey=true;
	   $this->_UserPic = new M('USER_PIC','','string');
	   $this->_ShopPic = new M('SHOP_PIC','','string');
	   $this->_YingYeZhiZhao = new M('YING_YE_ZHI_ZHAO','','string');
	   $this->_Sort1 = new M('SORT1','','int');
	   $this->_Sort2 = new M('SORT2','','int');
	   $this->_IdCardPic = new M('ID_CARD_PIC','','string');
	   $this->_FuJian = new M('FU_JIAN','','string');
	   $this->_CurrentLoginId = new M('CURRENT_LOGIN_ID','','int');
	   $this->_CheckTeam = new M('CHECK_TEAM','','int');
	   $this->_ShopYaJin = new M('SHOP_YA_JIN','','string');
	   $this->_CheckPm = new M('CHECK_PM','','int');
	   $this->_QjUrl = new M('QJ_URL','','string');
	   $this->_StateJiHuo = new M('STATE_JI_HUO','','int');
	   $this->_JiHuoTime = new M('JI_HUO_TIME','','DateTime');
	   $this->_CheckYg = new M('CHECK_YG','','int');
	   $this->_TuiQianShenQingTime = new M('TUI_QIAN_SHEN_QING_TIME','','DateTime');
	   $this->_TuiQianFinishedTime = new M('TUI_QIAN_FINISHED_TIME','','DateTime');
	   $this->_ChuZhiKaMoney = new M('CHU_ZHI_KA_MONEY','','decimal');
	   $this->_ChuZhiKaMoneyXiaoFei = new M('CHU_ZHI_KA_MONEY_XIAO_FEI','','decimal');
	   $this->_ShopYaJinCaiwu = new M('SHOP_YA_JIN_CAIWU','','decimal');
	   $this->_ShopYaJinShichang = new M('SHOP_YA_JIN_SHICHANG','','decimal');
	   $this->_ShopYaJinQuxian = new M('SHOP_YA_JIN_QUXIAN','','decimal');
	   $this->_ShopYaJinAll = new M('SHOP_YA_JIN_ALL','','decimal');
	   $this->_TypeList = new M('TYPE_LIST','','string');
	   $this->_IsGongYingShang = new M('IS_GONG_YING_SHANG','','int');
	   $this->_IdCardPicB = new M('ID_CARD_PIC_B','','string');
	   $this->_BankCardA = new M('BANK_CARD_A','','string');
	   $this->_BankCardB = new M('BANK_CARD_B','','string');
	   $this->_ExpDate = new M('EXP_DATE','','DateTime');
	   $this->_TeamId = new M('TEAM_ID','','int');
	   $this->_TuiYaJinOrderId = new M('TUI_YA_JIN_ORDER_ID','','int');
	   $this->_ShenQingShangHu = new M('SHEN_QING_SHANG_HU','','int');
	   $this->_Token = new M('TOKEN','','string');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function UserId($v=null){if(isset($v)){$this->_UserId->Set($v);}else{return $this->_UserId->v;}}
	public function UserPic($v=null){if(isset($v)){$this->_UserPic->Set($v);}else{return $this->_UserPic->v;}}
	public function ShopPic($v=null){if(isset($v)){$this->_ShopPic->Set($v);}else{return $this->_ShopPic->v;}}
	public function YingYeZhiZhao($v=null){if(isset($v)){$this->_YingYeZhiZhao->Set($v);}else{return $this->_YingYeZhiZhao->v;}}
	public function Sort1($v=null){if(isset($v)){$this->_Sort1->Set($v);}else{return $this->_Sort1->v;}}
	public function Sort2($v=null){if(isset($v)){$this->_Sort2->Set($v);}else{return $this->_Sort2->v;}}
	public function IdCardPic($v=null){if(isset($v)){$this->_IdCardPic->Set($v);}else{return $this->_IdCardPic->v;}}
	public function FuJian($v=null){if(isset($v)){$this->_FuJian->Set($v);}else{return $this->_FuJian->v;}}
	public function CurrentLoginId($v=null){if(isset($v)){$this->_CurrentLoginId->Set($v);}else{return $this->_CurrentLoginId->v;}}
	public function CheckTeam($v=null){if(isset($v)){$this->_CheckTeam->Set($v);}else{return $this->_CheckTeam->v;}}
	public function ShopYaJin($v=null){if(isset($v)){$this->_ShopYaJin->Set($v);}else{return $this->_ShopYaJin->v;}}
	public function CheckPm($v=null){if(isset($v)){$this->_CheckPm->Set($v);}else{return $this->_CheckPm->v;}}
	public function QjUrl($v=null){if(isset($v)){$this->_QjUrl->Set($v);}else{return $this->_QjUrl->v;}}
	public function StateJiHuo($v=null){if(isset($v)){$this->_StateJiHuo->Set($v);}else{return $this->_StateJiHuo->v;}}
	public function JiHuoTime($v=null){if(isset($v)){$this->_JiHuoTime->Set($v);}else{return $this->_JiHuoTime->v;}}
	public function CheckYg($v=null){if(isset($v)){$this->_CheckYg->Set($v);}else{return $this->_CheckYg->v;}}
	public function TuiQianShenQingTime($v=null){if(isset($v)){$this->_TuiQianShenQingTime->Set($v);}else{return $this->_TuiQianShenQingTime->v;}}
	public function TuiQianFinishedTime($v=null){if(isset($v)){$this->_TuiQianFinishedTime->Set($v);}else{return $this->_TuiQianFinishedTime->v;}}
	public function ChuZhiKaMoney($v=null){if(isset($v)){$this->_ChuZhiKaMoney->Set($v);}else{return $this->_ChuZhiKaMoney->v;}}
	public function ChuZhiKaMoneyXiaoFei($v=null){if(isset($v)){$this->_ChuZhiKaMoneyXiaoFei->Set($v);}else{return $this->_ChuZhiKaMoneyXiaoFei->v;}}
	public function ShopYaJinCaiwu($v=null){if(isset($v)){$this->_ShopYaJinCaiwu->Set($v);}else{return $this->_ShopYaJinCaiwu->v;}}
	public function ShopYaJinShichang($v=null){if(isset($v)){$this->_ShopYaJinShichang->Set($v);}else{return $this->_ShopYaJinShichang->v;}}
	public function ShopYaJinQuxian($v=null){if(isset($v)){$this->_ShopYaJinQuxian->Set($v);}else{return $this->_ShopYaJinQuxian->v;}}
	public function ShopYaJinAll($v=null){if(isset($v)){$this->_ShopYaJinAll->Set($v);}else{return $this->_ShopYaJinAll->v;}}
	public function TypeList($v=null){if(isset($v)){$this->_TypeList->Set($v);}else{return $this->_TypeList->v;}}
	public function IsGongYingShang($v=null){if(isset($v)){$this->_IsGongYingShang->Set($v);}else{return $this->_IsGongYingShang->v;}}
	public function IdCardPicB($v=null){if(isset($v)){$this->_IdCardPicB->Set($v);}else{return $this->_IdCardPicB->v;}}
	public function BankCardA($v=null){if(isset($v)){$this->_BankCardA->Set($v);}else{return $this->_BankCardA->v;}}
	public function BankCardB($v=null){if(isset($v)){$this->_BankCardB->Set($v);}else{return $this->_BankCardB->v;}}
	public function ExpDate($v=null){if(isset($v)){$this->_ExpDate->Set($v);}else{return $this->_ExpDate->v;}}
	public function TeamId($v=null){if(isset($v)){$this->_TeamId->Set($v);}else{return $this->_TeamId->v;}}
	public function TuiYaJinOrderId($v=null){if(isset($v)){$this->_TuiYaJinOrderId->Set($v);}else{return $this->_TuiYaJinOrderId->v;}}
	public function ShenQingShangHu($v=null){if(isset($v)){$this->_ShenQingShangHu->Set($v);}else{return $this->_ShenQingShangHu->v;}}
	public function Token($v=null){if(isset($v)){$this->_Token->Set($v);}else{return $this->_Token->v;}}

    public function Get_Key_Name(){return 'USER_ID';}
    public function Insert($Conn=null){return \Bll\UserInfo::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\UserInfo::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['USER_ID'=>'758b8227839b37bdb15458c9af0fd12b6c43dfbf','USER_PIC'=>'35d5447d91b2de4c639e138b48ead859726658d1',
                'SHOP_PIC'=>'5636652ce6056c507f14432c66d584297f3b10ae','YING_YE_ZHI_ZHAO'=>'c3f20042b8b410c7c21abb517540e8f820df75a9',
                'SORT1'=>'17cca60c4f63fad6dd72271493c9c8dba94cf8e6','SORT2'=>'ead17e6b63b8d046720b09dfacb6341b54c7cf5b',
                'ID_CARD_PIC'=>'6183aa5f4e1bab7b713145c87707ad4161aa0f6b','FU_JIAN'=>'27d781d06e38c173b6f0196128111f204c23dd29',
                'CURRENT_LOGIN_ID'=>'ede2d8c568f4becf7739e4d5cec81e5a7d5d60ed','CHECK_TEAM'=>'21f26f583fed7666287ac3baa9cfd229f7c8582b',
                'SHOP_YA_JIN'=>'fa833e5295914c00cf12e5fa3a1fcc7fc21c9c9d','CHECK_PM'=>'92f5015af3789175df07fef697bc0e23ff9aeb62',
                'QJ_URL'=>'020b505650641095e58439c8575bb98f9d83d615','STATE_JI_HUO'=>'152955a5b8712e1b2341a83ab97479bd1c080cc9',
                'JI_HUO_TIME'=>'00d26449ff1db2ccc72c8c9b3bdf4ed15619a1a6','CHECK_YG'=>'faf7e75c292bd9f3d9da588e13790932c721fabd',
                'TUI_QIAN_SHEN_QING_TIME'=>'c525ba179e118decb0e5fdf5a46a104ca3f3204d','TUI_QIAN_FINISHED_TIME'=>'1bcb3c04f937630928aee44593eebefe076d2a86',
                'CHU_ZHI_KA_MONEY'=>'220be6924750c756f0bef519b8ac2ab9f7d9bee3','CHU_ZHI_KA_MONEY_XIAO_FEI'=>'36e8dc21bc21192e7cfa5b49995e0d05a5437ce3',
                'SHOP_YA_JIN_CAIWU'=>'3acf12bae8ff4badf3082aeb9a35f95af8d18d9a','SHOP_YA_JIN_SHICHANG'=>'ff9eb64d3778c8af3f35747ff92b74345e895a6a',
                'SHOP_YA_JIN_QUXIAN'=>'0c6e4229cce47e5b88c09f9e2d81faa1e792c08e','SHOP_YA_JIN_ALL'=>'e91c7c65687a43e394c6fb2c04a598923f7ab5bb',
                'TYPE_LIST'=>'9dc1928245ab6d902e6cd61da95b2fd8cac4020f','IS_GONG_YING_SHANG'=>'3e011c1c51ee9043705f2819bc39af2ee8351e15',
                'ID_CARD_PIC_B'=>'b3dc18e88ed3d3fc51f6d0618578c269ef5e159d','BANK_CARD_A'=>'692cd51f2b9caf5d13671b3d5ea285d8a946d500',
                'BANK_CARD_B'=>'43dd0990b37b20cd52593f631c86ba3f4d747c64','EXP_DATE'=>'b2c87125015a051ed6b0900099fea38511715245',
                'TEAM_ID'=>'617089d1903ed13a74dfbdf3a2335bf01a73dbe9','TUI_YA_JIN_ORDER_ID'=>'d4b502baf29ec00feee8c99ebf66f2c5455d33a6',
                'SHEN_QING_SHANG_HU'=>'bebacc5ca5acddff86d7aa2acc9fcd1a8802981f','TOKEN'=>'06c5849bc62fd018a1a18696d944445a78ffd588'];
    }
}