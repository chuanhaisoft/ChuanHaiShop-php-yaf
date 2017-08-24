<?php 
namespace Model;
use \Pub\M;

class NewsInfo extends \Pub\ModelBase
{
	public $_NewsId;
	public $_Mess;
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
	   $this->_NewsId = new M('NEWS_ID','','int');
       $this->_NewsId->AutoKey=true;
	   $this->_Mess = new M('MESS','','string');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function NewsId($v=null){if(isset($v)){$this->_NewsId->Set($v);}else{return $this->_NewsId->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'NEWS_ID';}
    public function Insert($Conn=null){return \Bll\NewsInfo::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\NewsInfo::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['NEWS_ID'=>'a06769e55b806afbf17d6bd7519a36eb3c61a9cb','MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}