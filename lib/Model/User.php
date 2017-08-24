<?php 
namespace Model;
use \Pub\M;

class User extends \Pub\ModelBase
{
	public $_Id;
	public $_LoginName;
	public $_LoginPass;
	public $_LoginType;
	public $_RoleId;
	public $_UserGrade;
	public $_CardNum;
	public $_Name;
	public $_MobileNum;
	public $_PayPass;
	public $_Money;
	public $_MoneyLock;
	public $_AddTime;
	public $_Address;
	public $_Email;
	public $_CheckUser;
	public $_CheckMobile;
	public $_CheckEmail;
	public $_CheckBank;
	public $_CheckBase;
	public $_LastLoginTime;
	public $_LastLoginIp;
	public $_RecommendId;
	public $_TalkTime;
	public $_BigArea;
	public $_Province;
	public $_City;
	public $_Area;
	public $_Street;
	public $_PartnerRate;
	public $_Point;
	public $_IdCardType;
	public $_IdCard;
	public $_Bank;
	public $_MapX;
	public $_MapY;
	public $_Channelid;
	public $_Birthday;
	public $_Sex;
	public $_RegSource;
	public $_State;
	public $_ParentId;
	public $_AddUserId;
	public $_FuZeRenId;
	public $_Qq;
	public $_MessageCount;
	public $_EditTime;
	public $_WeiXin;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['LOGIN_NAME'],'required','msg'=>'请填写登录名!'],
	        [['NAME'],'required','msg'=>'请填写名称!'],
	        [['MONEY'],'number','msg'=>'请填写正确的金额!'],
	        
	        [['LOGIN_NAME','LOGIN_PASS'],'required','on'=>'reg'],
	        [['LOGIN_NAME'],['digits'=>true,'min'=>10000000000,'maxlength'=>11,'minlength'=>11],'msg'=>'请填写正确的手机号码!','on'=>'reg'],
	        [['LOGIN_PASS'],['equalTo'=>'CITY'],'msg'=>'2次密码输入不一致!','on'=>'reg'],
	        [['LOGIN_PASS'],['minlength'=>6,'maxlength'=>18],'msg'=>'请输入6-18位的密码!','on'=>'reg'],
	        [['AREA'],'required','msg'=>'请输入手机验证码!','on'=>'reg'],
	        [['ADDRESS'],'required','msg'=>'请输入图形验证码!','on'=>'reg'],
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
	   $this->_LoginName = new M('LOGIN_NAME','','string');
	   $this->_LoginPass = new M('LOGIN_PASS','','string');
	   $this->_LoginType = new M('LOGIN_TYPE','','int');
	   $this->_RoleId = new M('ROLE_ID','','int');
	   $this->_UserGrade = new M('USER_GRADE','','int');
	   $this->_CardNum = new M('CARD_NUM','','int');
	   $this->_Name = new M('NAME','','string');
	   $this->_MobileNum = new M('MOBILE_NUM','','int');
	   $this->_PayPass = new M('PAY_PASS','','string');
	   $this->_Money = new M('MONEY','','decimal');
	   $this->_MoneyLock = new M('MONEY_LOCK','','decimal');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_Address = new M('ADDRESS','','string');
	   $this->_Email = new M('EMAIL','','string');
	   $this->_CheckUser = new M('CHECK_USER','','int');
	   $this->_CheckMobile = new M('CHECK_MOBILE','','int');
	   $this->_CheckEmail = new M('CHECK_EMAIL','','int');
	   $this->_CheckBank = new M('CHECK_BANK','','int');
	   $this->_CheckBase = new M('CHECK_BASE','','int');
	   $this->_LastLoginTime = new M('LAST_LOGIN_TIME','','DateTime');
	   $this->_LastLoginIp = new M('LAST_LOGIN_IP','','string');
	   $this->_RecommendId = new M('RECOMMEND_ID','','int');
	   $this->_TalkTime = new M('TALK_TIME','','int');
	   $this->_BigArea = new M('BIG_AREA','','int');
	   $this->_Province = new M('PROVINCE','','int');
	   $this->_City = new M('CITY','','int');
	   $this->_Area = new M('AREA','','int');
	   $this->_Street = new M('STREET','','int');
	   $this->_PartnerRate = new M('PARTNER_RATE','','decimal');
	   $this->_Point = new M('POINT','','decimal');
	   $this->_IdCardType = new M('ID_CARD_TYPE','','int');
	   $this->_IdCard = new M('ID_CARD','','string');
	   $this->_Bank = new M('BANK','','int');
	   $this->_MapX = new M('MAP_X','','decimal');
	   $this->_MapY = new M('MAP_Y','','decimal');
	   $this->_Channelid = new M('CHANNELID','','string');
	   $this->_Birthday = new M('BIRTHDAY','','DateTime');
	   $this->_Sex = new M('SEX','','int');
	   $this->_RegSource = new M('REG_SOURCE','','int');
	   $this->_State = new M('STATE','','int');
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_AddUserId = new M('ADD_USER_ID','','int');
	   $this->_FuZeRenId = new M('FU_ZE_REN_ID','','int');
	   $this->_Qq = new M('QQ','','string');
	   $this->_MessageCount = new M('MESSAGE_COUNT','','int');
	   $this->_EditTime = new M('EDIT_TIME','','string');
	   $this->_WeiXin = new M('WEI_XIN','','string');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function LoginName($v=null){if(isset($v)){$this->_LoginName->Set($v);}else{return $this->_LoginName->v;}}
	public function LoginPass($v=null){if(isset($v)){$this->_LoginPass->Set($v);}else{return $this->_LoginPass->v;}}
	public function LoginType($v=null){if(isset($v)){$this->_LoginType->Set($v);}else{return $this->_LoginType->v;}}
	public function RoleId($v=null){if(isset($v)){$this->_RoleId->Set($v);}else{return $this->_RoleId->v;}}
	public function UserGrade($v=null){if(isset($v)){$this->_UserGrade->Set($v);}else{return $this->_UserGrade->v;}}
	public function CardNum($v=null){if(isset($v)){$this->_CardNum->Set($v);}else{return $this->_CardNum->v;}}
	public function Name($v=null){if(isset($v)){$this->_Name->Set($v);}else{return $this->_Name->v;}}
	public function MobileNum($v=null){if(isset($v)){$this->_MobileNum->Set($v);}else{return $this->_MobileNum->v;}}
	public function PayPass($v=null){if(isset($v)){$this->_PayPass->Set($v);}else{return $this->_PayPass->v;}}
	public function Money($v=null){if(isset($v)){$this->_Money->Set($v);}else{return $this->_Money->v;}}
	public function MoneyLock($v=null){if(isset($v)){$this->_MoneyLock->Set($v);}else{return $this->_MoneyLock->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function Address($v=null){if(isset($v)){$this->_Address->Set($v);}else{return $this->_Address->v;}}
	public function Email($v=null){if(isset($v)){$this->_Email->Set($v);}else{return $this->_Email->v;}}
	public function CheckUser($v=null){if(isset($v)){$this->_CheckUser->Set($v);}else{return $this->_CheckUser->v;}}
	public function CheckMobile($v=null){if(isset($v)){$this->_CheckMobile->Set($v);}else{return $this->_CheckMobile->v;}}
	public function CheckEmail($v=null){if(isset($v)){$this->_CheckEmail->Set($v);}else{return $this->_CheckEmail->v;}}
	public function CheckBank($v=null){if(isset($v)){$this->_CheckBank->Set($v);}else{return $this->_CheckBank->v;}}
	public function CheckBase($v=null){if(isset($v)){$this->_CheckBase->Set($v);}else{return $this->_CheckBase->v;}}
	public function LastLoginTime($v=null){if(isset($v)){$this->_LastLoginTime->Set($v);}else{return $this->_LastLoginTime->v;}}
	public function LastLoginIp($v=null){if(isset($v)){$this->_LastLoginIp->Set($v);}else{return $this->_LastLoginIp->v;}}
	public function RecommendId($v=null){if(isset($v)){$this->_RecommendId->Set($v);}else{return $this->_RecommendId->v;}}
	public function TalkTime($v=null){if(isset($v)){$this->_TalkTime->Set($v);}else{return $this->_TalkTime->v;}}
	public function BigArea($v=null){if(isset($v)){$this->_BigArea->Set($v);}else{return $this->_BigArea->v;}}
	public function Province($v=null){if(isset($v)){$this->_Province->Set($v);}else{return $this->_Province->v;}}
	public function City($v=null){if(isset($v)){$this->_City->Set($v);}else{return $this->_City->v;}}
	public function Area($v=null){if(isset($v)){$this->_Area->Set($v);}else{return $this->_Area->v;}}
	public function Street($v=null){if(isset($v)){$this->_Street->Set($v);}else{return $this->_Street->v;}}
	public function PartnerRate($v=null){if(isset($v)){$this->_PartnerRate->Set($v);}else{return $this->_PartnerRate->v;}}
	public function Point($v=null){if(isset($v)){$this->_Point->Set($v);}else{return $this->_Point->v;}}
	public function IdCardType($v=null){if(isset($v)){$this->_IdCardType->Set($v);}else{return $this->_IdCardType->v;}}
	public function IdCard($v=null){if(isset($v)){$this->_IdCard->Set($v);}else{return $this->_IdCard->v;}}
	public function Bank($v=null){if(isset($v)){$this->_Bank->Set($v);}else{return $this->_Bank->v;}}
	public function MapX($v=null){if(isset($v)){$this->_MapX->Set($v);}else{return $this->_MapX->v;}}
	public function MapY($v=null){if(isset($v)){$this->_MapY->Set($v);}else{return $this->_MapY->v;}}
	public function Channelid($v=null){if(isset($v)){$this->_Channelid->Set($v);}else{return $this->_Channelid->v;}}
	public function Birthday($v=null){if(isset($v)){$this->_Birthday->Set($v);}else{return $this->_Birthday->v;}}
	public function Sex($v=null){if(isset($v)){$this->_Sex->Set($v);}else{return $this->_Sex->v;}}
	public function RegSource($v=null){if(isset($v)){$this->_RegSource->Set($v);}else{return $this->_RegSource->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function AddUserId($v=null){if(isset($v)){$this->_AddUserId->Set($v);}else{return $this->_AddUserId->v;}}
	public function FuZeRenId($v=null){if(isset($v)){$this->_FuZeRenId->Set($v);}else{return $this->_FuZeRenId->v;}}
	public function Qq($v=null){if(isset($v)){$this->_Qq->Set($v);}else{return $this->_Qq->v;}}
	public function MessageCount($v=null){if(isset($v)){$this->_MessageCount->Set($v);}else{return $this->_MessageCount->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}
	public function WeiXin($v=null){if(isset($v)){$this->_WeiXin->Set($v);}else{return $this->_WeiXin->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\User::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\User::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','LOGIN_NAME'=>'60a082ef312c875d847b4d0dbbec94502739ec08',
                'LOGIN_PASS'=>'c6fa8b0b03881ff0650cd58a4a4b97738d52cb7a','LOGIN_TYPE'=>'fe3f09345d144761f69a10aca39a635362661e79',
                'ROLE_ID'=>'40c8221de27b9a748c103091ced93e100faf6157','USER_GRADE'=>'3c083419e944455d31f50c493055ae416175e86c',
                'CARD_NUM'=>'9b3775b3a46ab6a8124ec5cdd2e6d65d50f2145c','NAME'=>'4b0856331f00bd0596730f35d0e472b734e499e2',
                'MOBILE_NUM'=>'acf4f6fbf1b1c058a5ed462acb535a14a5bca7a7','PAY_PASS'=>'0a6215d6b5ece21fe790cf6642b6fdbba0f7d061',
                'MONEY'=>'1dd26d915746a47c1b10ba6f51f47b1701484884','MONEY_LOCK'=>'cbcfcf18d56da15f31f643288d83b18a61d75d3d',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1','ADDRESS'=>'532946b37bc609e07cc7765490c6f571516d0cf2',
                'EMAIL'=>'ad11f65eef0b4a6580407bf4ce5f9efa3caecb0f','CHECK_USER'=>'b223418400a820c63397bc76b594b8924bf406f7',
                'CHECK_MOBILE'=>'dfbc1245ef57672651fddf8c07e7d855b731a54f','CHECK_EMAIL'=>'b2d066a51889fbe65c6e3e3ea85eb3037b95eda2',
                'CHECK_BANK'=>'f82fef28a8db91f3bdc868d94aad96031033838c','CHECK_BASE'=>'ba9aa4ba8742d2c056f7bcf9d50153f543dd3d46',
                'LAST_LOGIN_TIME'=>'2ce7e356b0cc40218fa5740d3938b9f7e296a7ad','LAST_LOGIN_IP'=>'0b4369cfeaaf7402de01f0839c81df95ed820e21',
                'RECOMMEND_ID'=>'4f421d4368a0ceeeabe482e4226661689bad272d','TALK_TIME'=>'9f5a2a4f48f6819fb629b9ba3d1a705b2b232ee6',
                'BIG_AREA'=>'8dafbc90b066334365eb8edac9ca9b6eaaabbae6','PROVINCE'=>'75c4a94a12dbc5c1cdf093e340410e7abfa2096f',
                'CITY'=>'c412eceed9ff149f8bc419ff7fbf8c3307d24da5','AREA'=>'5c1e4f3b0c1277c47660a3f25f532a0094713b85',
                'STREET'=>'be0d9dbcaaa7340636cde7dae83c423968e227e5','PARTNER_RATE'=>'1941aa9fa2f8b05e746ca16addf03e690a627eec',
                'POINT'=>'2f06dad6250432fd7408da2ef7cda02ff89ae199','ID_CARD_TYPE'=>'c077175dfa2f228c29549b479b52e9ae11638e38',
                'ID_CARD'=>'2d4be2ad799df4c58abfbd69c226cdb62cf16eec','BANK'=>'7f4914c0179868661f8f600dbd5c51f5b36dbb7c',
                'MAP_X'=>'f36720a99f98ce53b6f41de30de918b8a73fa5dd','MAP_Y'=>'db3e3f74747367279ae456e177cf254bf0537539',
                'CHANNELID'=>'de9e8f2e0dc0792d1fdfea2ffcf0655a90bc8a00','BIRTHDAY'=>'5a1b22621761a3f96db4c2e2cac5e277e44ca24d',
                'SEX'=>'28cbf3404b9303288368971bad611e2af158f8b7','REG_SOURCE'=>'a300054ce02e6ed5f50212fa867307909d22e9b4',
                'STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066','PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c',
                'ADD_USER_ID'=>'6c45d715dcc3fc427fc814a932bb3715419da627','FU_ZE_REN_ID'=>'9ba99ae5e30761eeeef7e77a90cfec417fc96a89',
                'QQ'=>'a6593abfd1b1a08e5cd74df9eb566700ee5b5a56','MESSAGE_COUNT'=>'e94720f7869f574d66a51559b4875fa5d386cb2b',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a','WEI_XIN'=>'ad2f60a456e41de721ad27dd7c3f21eec349d7f7'];
    }
}