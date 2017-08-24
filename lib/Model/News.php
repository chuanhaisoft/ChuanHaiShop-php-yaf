<?php 
namespace Model;
use \Pub\M;

class News extends \Pub\ModelBase
{
	public $_Id;
	public $_Title;
	public $_SortId;
	public $_Sort2Id;
	public $_Mess;
	public $_Pic1;
	public $_Pic2;
	public $_Pic3;
	public $_Color;
	public $_Url;
	public $_AddTime;
	public $_State;
	public $_EditTime;

    //--can edit code start--
	public function Rules()
	{
	    return [
	        [['TITLE'],'required','msg'=>'请填写标题!']
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
	   $this->_Title = new M('TITLE','','string');
	   $this->_SortId = new M('SORT_ID','','int');
	   $this->_Sort2Id = new M('SORT2_ID','','int');
	   $this->_Mess = new M('MESS','','string');
	   $this->_Pic1 = new M('PIC1','','string');
	   $this->_Pic2 = new M('PIC2','','string');
	   $this->_Pic3 = new M('PIC3','','string');
	   $this->_Color = new M('COLOR','','string');
	   $this->_Url = new M('URL','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_State = new M('STATE','','int');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Title($v=null){if(isset($v)){$this->_Title->Set($v);}else{return $this->_Title->v;}}
	public function SortId($v=null){if(isset($v)){$this->_SortId->Set($v);}else{return $this->_SortId->v;}}
	public function Sort2Id($v=null){if(isset($v)){$this->_Sort2Id->Set($v);}else{return $this->_Sort2Id->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function Pic1($v=null){if(isset($v)){$this->_Pic1->Set($v);}else{return $this->_Pic1->v;}}
	public function Pic2($v=null){if(isset($v)){$this->_Pic2->Set($v);}else{return $this->_Pic2->v;}}
	public function Pic3($v=null){if(isset($v)){$this->_Pic3->Set($v);}else{return $this->_Pic3->v;}}
	public function Color($v=null){if(isset($v)){$this->_Color->Set($v);}else{return $this->_Color->v;}}
	public function Url($v=null){if(isset($v)){$this->_Url->Set($v);}else{return $this->_Url->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\News::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\News::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','TITLE'=>'e3f822db3baf1508e99d2a83a23b6fc610b0f4f1',
                'SORT_ID'=>'7b1921ba0a697f95ec81d625b3f5661e3fec69f3','SORT2_ID'=>'03404eb18864e744237181342a6570dfa7b89ceb',
                'MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce','PIC1'=>'fc40215c7ee97400aac57ddfac11fe0f5c2cf6f4',
                'PIC2'=>'567e5441bd5774f61dfa5ca5c74e88d5f822d975','PIC3'=>'d1058c73ee69908f98d69fb994145571b40ed607',
                'COLOR'=>'cfa070c4b3101bf31d6f0cfbad969bc1d648ab8b','URL'=>'b459db3fd2c092ed08b2311144832455d6d6b757',
                'ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066',
                'EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}