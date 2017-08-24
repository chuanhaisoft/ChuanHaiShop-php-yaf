<?php 
namespace Model;
use \Pub\M;

class ProMess extends \Pub\ModelBase
{
	public $_Id;
	public $_Mess;
	public $_Pic1;
	public $_Pic2;
	public $_Pic3;
	public $_Pic4;
	public $_Pic5;
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
	   $this->_Mess = new M('MESS','','string');
	   $this->_Pic1 = new M('PIC1','','string');
	   $this->_Pic2 = new M('PIC2','','string');
	   $this->_Pic3 = new M('PIC3','','string');
	   $this->_Pic4 = new M('PIC4','','string');
	   $this->_Pic5 = new M('PIC5','','string');
	   $this->_EditTime = new M('EDIT_TIME','','DateTime');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function Mess($v=null){if(isset($v)){$this->_Mess->Set($v);}else{return $this->_Mess->v;}}
	public function Pic1($v=null){if(isset($v)){$this->_Pic1->Set($v);}else{return $this->_Pic1->v;}}
	public function Pic2($v=null){if(isset($v)){$this->_Pic2->Set($v);}else{return $this->_Pic2->v;}}
	public function Pic3($v=null){if(isset($v)){$this->_Pic3->Set($v);}else{return $this->_Pic3->v;}}
	public function Pic4($v=null){if(isset($v)){$this->_Pic4->Set($v);}else{return $this->_Pic4->v;}}
	public function Pic5($v=null){if(isset($v)){$this->_Pic5->Set($v);}else{return $this->_Pic5->v;}}
	public function EditTime($v=null){if(isset($v)){$this->_EditTime->Set($v);}else{return $this->_EditTime->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\ProMess::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=true){return \Bll\ProMess::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','MESS'=>'11ea2fc55092b570d7f9f3424bf87c7244b56cce',
                'PIC1'=>'fc40215c7ee97400aac57ddfac11fe0f5c2cf6f4','PIC2'=>'567e5441bd5774f61dfa5ca5c74e88d5f822d975',
                'PIC3'=>'d1058c73ee69908f98d69fb994145571b40ed607','PIC4'=>'7caabff2731c9b8db00bfc3c3ef7a1b7c35fa629',
                'PIC5'=>'8cb58cd775a0fcaf6ed0e4c870a1e3fbd4216d91','EDIT_TIME'=>'5ccc63f13fce297b73a6073609d3199a95f1194a'];
    }
}