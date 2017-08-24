<?php 
namespace Model;
use \Pub\M;

class PageAuto extends \Pub\ModelBase
{
	public $_Id;
	public $_RoleIds;
	public $_ParentId;
	public $_Type;
	public $_TableName;
	public $_TableKeyField;
	public $_SqlWhere;
	public $_AddTime;
	public $_Fields;
	public $_FieldsList;
	public $_FieldsEdit;
	public $_FieldsAdd;
	public $_PageSize;
	public $_Js;
	public $_Title;
	public $_UrlList;
	public $_UrlEdit;
	public $_UrlAdd;
	public $_RowEndToolFields;
	public $_FooterToolFields;
	public $_ListOrderBy;
	public $_State;

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
	   $this->_RoleIds = new M('ROLE_IDS','','string');
	   $this->_ParentId = new M('PARENT_ID','','int');
	   $this->_Type = new M('TYPE','','int');
	   $this->_TableName = new M('TABLE_NAME','','string');
	   $this->_TableKeyField = new M('TABLE_KEY_FIELD','','string');
	   $this->_SqlWhere = new M('SQL_WHERE','','string');
	   $this->_AddTime = new M('ADD_TIME','','DateTime');
	   $this->_Fields = new M('FIELDS','','string');
	   $this->_FieldsList = new M('FIELDS_LIST','','string');
	   $this->_FieldsEdit = new M('FIELDS_EDIT','','string');
	   $this->_FieldsAdd = new M('FIELDS_ADD','','string');
	   $this->_PageSize = new M('PAGE_SIZE','','int');
	   $this->_Js = new M('JS','','string');
	   $this->_Title = new M('TITLE','','string');
	   $this->_UrlList = new M('URL_LIST','','string');
	   $this->_UrlEdit = new M('URL_EDIT','','string');
	   $this->_UrlAdd = new M('URL_ADD','','string');
	   $this->_RowEndToolFields = new M('ROW_END_TOOL_FIELDS','','string');
	   $this->_FooterToolFields = new M('FOOTER_TOOL_FIELDS','','string');
	   $this->_ListOrderBy = new M('LIST_ORDER_BY','','string');
	   $this->_State = new M('STATE','','int');
	   if($RuleName!=null)
	       $this->__RuleName=$RuleName;
	}
	//设置
	public function Id($v=null){if(isset($v)){$this->_Id->Set($v);}else{return $this->_Id->v;}}
	public function RoleIds($v=null){if(isset($v)){$this->_RoleIds->Set($v);}else{return $this->_RoleIds->v;}}
	public function ParentId($v=null){if(isset($v)){$this->_ParentId->Set($v);}else{return $this->_ParentId->v;}}
	public function Type($v=null){if(isset($v)){$this->_Type->Set($v);}else{return $this->_Type->v;}}
	public function TableName($v=null){if(isset($v)){$this->_TableName->Set($v);}else{return $this->_TableName->v;}}
	public function TableKeyField($v=null){if(isset($v)){$this->_TableKeyField->Set($v);}else{return $this->_TableKeyField->v;}}
	public function SqlWhere($v=null){if(isset($v)){$this->_SqlWhere->Set($v);}else{return $this->_SqlWhere->v;}}
	public function AddTime($v=null){if(isset($v)){$this->_AddTime->Set($v);}else{return $this->_AddTime->v;}}
	public function Fields($v=null){if(isset($v)){$this->_Fields->Set($v);}else{return $this->_Fields->v;}}
	public function FieldsList($v=null){if(isset($v)){$this->_FieldsList->Set($v);}else{return $this->_FieldsList->v;}}
	public function FieldsEdit($v=null){if(isset($v)){$this->_FieldsEdit->Set($v);}else{return $this->_FieldsEdit->v;}}
	public function FieldsAdd($v=null){if(isset($v)){$this->_FieldsAdd->Set($v);}else{return $this->_FieldsAdd->v;}}
	public function PageSize($v=null){if(isset($v)){$this->_PageSize->Set($v);}else{return $this->_PageSize->v;}}
	public function Js($v=null){if(isset($v)){$this->_Js->Set($v);}else{return $this->_Js->v;}}
	public function Title($v=null){if(isset($v)){$this->_Title->Set($v);}else{return $this->_Title->v;}}
	public function UrlList($v=null){if(isset($v)){$this->_UrlList->Set($v);}else{return $this->_UrlList->v;}}
	public function UrlEdit($v=null){if(isset($v)){$this->_UrlEdit->Set($v);}else{return $this->_UrlEdit->v;}}
	public function UrlAdd($v=null){if(isset($v)){$this->_UrlAdd->Set($v);}else{return $this->_UrlAdd->v;}}
	public function RowEndToolFields($v=null){if(isset($v)){$this->_RowEndToolFields->Set($v);}else{return $this->_RowEndToolFields->v;}}
	public function FooterToolFields($v=null){if(isset($v)){$this->_FooterToolFields->Set($v);}else{return $this->_FooterToolFields->v;}}
	public function ListOrderBy($v=null){if(isset($v)){$this->_ListOrderBy->Set($v);}else{return $this->_ListOrderBy->v;}}
	public function State($v=null){if(isset($v)){$this->_State->Set($v);}else{return $this->_State->v;}}

    public function Get_Key_Name(){return 'ID';}
    public function Insert($Conn=null){return \Bll\PageAuto::Insert($this,$Conn);}
    public function Update($Whare='',$Conn=null,$_IfRowCount=false){return \Bll\PageAuto::Update($this,$Whare,$Conn,$_IfRowCount);}

    public function FieldPassedName()
    {
        return ['ID'=>'d5e3420486684207b0d17f30118bb693a57e4dde','ROLE_IDS'=>'e19584f93d37402955cf8a75b76e5c37eb5b9b43',
                'PARENT_ID'=>'0db196b861158d0717be0326eec209927b5d927c','TYPE'=>'5a657d858ffef8637c70d32f17174a5d263db0d1',
                'TABLE_NAME'=>'51bbfdf57eed456957e42359b191271616178ee9','TABLE_KEY_FIELD'=>'96447654bc6ef3d5868cb7760b0789111db21f96',
                'SQL_WHERE'=>'d38c29c6f2fb8043628cb3acd843692549694732','ADD_TIME'=>'2ad33e383cd99e67f25824bac01d8e73c631afa1',
                'FIELDS'=>'f8bfbaaeb6b77bee3998d2819006d16d7beb4780','FIELDS_LIST'=>'f647f0c90687d36abbfe943a8c79f6455eaa13e6',
                'FIELDS_EDIT'=>'0ad2f1f4a84cc0a47199e5238b97ee72ffc41c60','FIELDS_ADD'=>'1f69bb3f8056a8960679c3410a89a43208e5272f',
                'PAGE_SIZE'=>'474f4121ebba339d305ea77d2164f947bfba193a','JS'=>'95a309093b44436ec8f32bea45b8fb1287c26169',
                'TITLE'=>'e3f822db3baf1508e99d2a83a23b6fc610b0f4f1','URL_LIST'=>'ba837e9ddb74020f3308d7db6f80541efbb1a68f',
                'URL_EDIT'=>'411a8ea0729ee562cc7bf5b055d0430bb1f4482a','URL_ADD'=>'8c5c166df7fde70383c2736e26c29052f7bdec3d',
                'ROW_END_TOOL_FIELDS'=>'8535a89bf369b7d31c2f1f90e257e636a4e2b360','FOOTER_TOOL_FIELDS'=>'497034e6e373a2ba1b71f316e73cac2167cb6185',
                'LIST_ORDER_BY'=>'71f3eaa2f4ba0e1713e7da10b8c5d2ad314599c5','STATE'=>'cf276f2f6f0c01b264c58f1939a21aaf92bea066'];
    }
}