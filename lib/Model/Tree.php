<?php 
namespace Model;
use \Pub\M;

class Tree extends \Pub\ModelBase
{
	public $_TreeId;
	public $_TreeName;
	public $_ParentNum;
	public $_NodeType;
	public $_TreeGrade;
	public $_TreePic1;
	public $_TreePic2;
	public $_TreeUrl;
	public $_TreeState;
	public $_OrderNum;
	public $_InIframe;
	public $_TreeType;

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
	   $this->_TreeId = new M('TREE_ID','','int');
       $this->_TreeId->AutoKey=true;
	   $this->_TreeName = new M('TREE_NAME','','string');
	   $this->_ParentNum = new M('PARENT_NUM','','int');
	   $this->_NodeType = new M('NODE_TYPE','','int');
	   $this->_TreeGrade = new M('TREE_GRADE','','int');
	   $this->_TreePic1 = new M('TREE_PIC1','','string');
	   $this->_TreePic2 = new M('TREE_PIC2','','string');
	   $this->_TreeUrl = new M('TREE_URL','','string');
	   $this->_TreeState = new M('TREE_STATE','','int');
	   $this->_OrderNum = new M('ORDER_NUM','','int');
	   $this->_InIframe = new M('IN_IFRAME','','int');
	   $this->_TreeType = new M('TREE_TYPE','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function TreeId($v=null){if(isset($v)){$this->_TreeId->Set($v);}else{return $this->_TreeId->v;}}
	public function TreeName($v=null){if(isset($v)){$this->_TreeName->Set($v);}else{return $this->_TreeName->v;}}
	public function ParentNum($v=null){if(isset($v)){$this->_ParentNum->Set($v);}else{return $this->_ParentNum->v;}}
	public function NodeType($v=null){if(isset($v)){$this->_NodeType->Set($v);}else{return $this->_NodeType->v;}}
	public function TreeGrade($v=null){if(isset($v)){$this->_TreeGrade->Set($v);}else{return $this->_TreeGrade->v;}}
	public function TreePic1($v=null){if(isset($v)){$this->_TreePic1->Set($v);}else{return $this->_TreePic1->v;}}
	public function TreePic2($v=null){if(isset($v)){$this->_TreePic2->Set($v);}else{return $this->_TreePic2->v;}}
	public function TreeUrl($v=null){if(isset($v)){$this->_TreeUrl->Set($v);}else{return $this->_TreeUrl->v;}}
	public function TreeState($v=null){if(isset($v)){$this->_TreeState->Set($v);}else{return $this->_TreeState->v;}}
	public function OrderNum($v=null){if(isset($v)){$this->_OrderNum->Set($v);}else{return $this->_OrderNum->v;}}
	public function InIframe($v=null){if(isset($v)){$this->_InIframe->Set($v);}else{return $this->_InIframe->v;}}
	public function TreeType($v=null){if(isset($v)){$this->_TreeType->Set($v);}else{return $this->_TreeType->v;}}

    public function Get_Key_Name(){return 'TREE_ID';}
    public function Insert($Conn=null){return \Bll\Tree::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null){return \Bll\Tree::Update($this,$Whare,$Conn);}

    public function FieldPassedName()
    {
        return ['TREE_ID'=>'2264c90f047d0dad0ed8bc5fdd246468a38e93e7','TREE_NAME'=>'44879ba1cfb55d1f331fcbc6ec033e9e14e475f9',
                'PARENT_NUM'=>'d7ec3279b44edb194586aba7f5097a796fffba07','NODE_TYPE'=>'075c71410b82c7874f6bee16ce729a3bc5c4ab12',
                'TREE_GRADE'=>'e010e86da6f362d8dceaa532194a5df92e686aaa','TREE_PIC1'=>'9eed5adecbe1e588dec4d8103e9f9912972104e3',
                'TREE_PIC2'=>'1a31c506e0b5ad746fc7ce76709a6280ace76e9f','TREE_URL'=>'bbc030b4911ea288064f0b0dec07f8ac955ce7d3',
                'TREE_STATE'=>'fbd951c18178ba19fd37bec03cd357ddeaa63198','ORDER_NUM'=>'7c2f8c027c035ae9fd4c3e73099e8f5ba29ebb0b',
                'IN_IFRAME'=>'474c0e050069a229ab4586fd9d155d81d9c266d7','TREE_TYPE'=>'9677b83d0feed50534c6275641a562354c534ea9'];
    }
}