<?php 
namespace Model;
use \Pub\M;

class Log extends \Pub\ModelBase
{
	public $_LogId;
	public $_EventName;
	public $_UserIp;
	public $_EventType;
	public $_OperateId;
	public $_EventPage;
	public $_EventTime;
	public $_HostName;
	public $_HostPass;
	public $_Domain;
	public $_HostId;
	public $_State;
	public $_DealTime;
	public $_FenZhong;
	public $_BeiZhu;
	public $_UserId2;
	public $_Seconds;

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
	   $this->_LogId = new M('LOG_ID','','int');
       $this->_LogId->AutoKey=true;
	   $this->_EventName = new M('EVENT_NAME','','string');
	   $this->_UserIp = new M('USER_IP','','string');
	   $this->_EventType = new M('EVENT_TYPE','','string');
	   $this->_OperateId = new M('OPERATE_ID','','int');
	   $this->_EventPage = new M('EVENT_PAGE','','string');
	   $this->_EventTime = new M('EVENT_TIME','','DateTime');
	   $this->_HostName = new M('HOST_NAME','','string');
	   $this->_HostPass = new M('HOST_PASS','','string');
	   $this->_Domain = new M('DOMAIN','','string');
	   $this->_HostId = new M('HOST_ID','','int');
	   $this->_State = new M('STATE','','int');
	   $this->_DealTime = new M('DEAL_TIME','','DateTime');
	   $this->_FenZhong = new M('FEN_ZHONG','','int');
	   $this->_BeiZhu = new M('BEI_ZHU','','string');
	   $this->_UserId2 = new M('USER_ID2','','int');
	   $this->_Seconds = new M('SECONDS','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function LogId($v=null){if(isset($v)){$this->_LogId->Set($v);}else{return $this->_LogId->v;}}
	public function EventName($v=null){if(isset($v)){$this->_EventName->Set($v);}else{return $this->_EventName->v;}}
	public function UserIp($v=null){if(isset($v)){$this->_UserIp->Set($v);}else{return $this->_UserIp->v;}}
	public function EventType($v=null){if(isset($v)){$this->_EventType->Set($v);}else{return $this->_EventType->v;}}
	public function OperateId($v=null){if(isset($v)){$this->_OperateId->Set($v);}else{return $this->_OperateId->v;}}
	public function EventPage($v=null){if(isset($v)){$this->_EventPage->Set($v);}else{return $this->_EventPage->v;}}
	public function EventTime($v=null){if(isset($v)){$this->_EventTime->Set($v);}else{return $this->_EventTime->v;}}
	public function HostName($v=null){if(isset($v)){$this->_HostName->Set($v);}else{return $this->_HostName->v;}}
	public function HostPass($v=null){if(isset($v)){$this->_HostPass->Set($v);}else{return $this->_HostPass->v;}}
	public function Domain($v=null){if(isset($v)){$this->_Domain->Set($v);}else{return $this->_Domain->v;}}
	public function HostId($v=null){if(isset($v)){$this->_HostId->Set($v);}else{return $this->_HostId->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function DealTime($v=null){if(isset($v)){$this->_DealTime->Set($v);}else{return $this->_DealTime->v;}}
	public function FenZhong($v=null){if(isset($v)){$this->_FenZhong->Set($v);}else{return $this->_FenZhong->v;}}
	public function BeiZhu($v=null){if(isset($v)){$this->_BeiZhu->Set($v);}else{return $this->_BeiZhu->v;}}
	public function UserId2($v=null){if(isset($v)){$this->_UserId2->Set($v);}else{return $this->_UserId2->v;}}
	public function Seconds($v=null){if(isset($v)){$this->_Seconds->Set($v);}else{return $this->_Seconds->v;}}

    public function Get_Key_Name(){return 'LOG_ID';}
    public function Insert($Conn=null){return \Bll\Log::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\Log::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['LOG_ID'=>'31cf39892117364427449fd2d6d0369e4431577c','EVENT_NAME'=>'de47a330aa306a0eff8f7f9e234f3174aed0fca9',
                'USER_IP'=>'2fc9f34ba5f6750bf06c3a35bb8ef56ff62492c5','EVENT_TYPE'=>'23e9d273f27b880eed6200058eae91a16f362b5f',
                'OPERATE_ID'=>'8a989f3e9d3db35ef10128c42ca82d69d2cfb3a3','EVENT_PAGE'=>'0b4f40434c12029e74015d3e752f287df35cf86f',
                'EVENT_TIME'=>'5944448e0605d74f2a24d05244f999ebed3d3517','HOST_NAME'=>'c080789919e7f9859020ea32e8dec469dbd82109',
                'HOST_PASS'=>'f3b7a0302ae1254667eacd0cb62efe82213a697e','DOMAIN'=>'127444e7d1685d68e7e87ba2b6970035339f9361',
                'HOST_ID'=>'59fe2a0d3dc6fbddd2ed8092ecde6faad3ee043c','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'DEAL_TIME'=>'1c6f1410418aa6d683ce8a3a2b8d1c5b9b1dffe3','FEN_ZHONG'=>'596035bfc993aeb54ec490392bae103e34720458',
                'BEI_ZHU'=>'b061a2bc48e4849df811c5e27ca1e68bff08459e','USER_ID2'=>'53f73e08e6a676b0d9d3677d89f7b29993041e22',
                'SECONDS'=>'c57d643541e25d108a96355a21ca987c7c44e740'];
    }
}