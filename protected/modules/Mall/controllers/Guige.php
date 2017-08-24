<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class GuigeController extends \Base\ControllerAdmin
{	
	public function ListAction()
	{
	    SysFram::CheckPagePower(401);
	    $act=Fram::GetValue("act");$UID=SysFram::GetLoginID();
	    $ID=Fram::GetNumValue('ID',-1);
	    
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    $USER_ID = 0;
	    if(Bll\Role::Role_Id_Shop($RoleID)){
	        $USER_ID = $UID;
	    }
	    
	    $m=new \Model\MallGuiGe();
	    
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
	                if($ID>0)
	                    $_where = [$m->_ParentId->w('=',$ID)];
	                else
	                    $_where = [$m->_ParentId->w('=',0)];
	                
	                //if(Bll\Role::Role_Id_Shop($RoleID)|| $RoleID==105){
	                //    $_where .= ' AND (  USER_ID='.$UID.')';//USER_ID=0 or
	                //}
	                
	                $rs=Bll\MallGuiGe::GetList($PageNum,$PageSize,$_where,$total,"*",'ID desc');
	                
	                
	                
	                
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	            case "Del":
	                    $id=Fram::GetValue("DelId","");
	                    
	                    if($id != "")
	                    {
	                        $sub_rows = Bll\MallGuiGe::Row(null,[$m->_ParentId->w('=',$id)]);
	                        if($sub_rows)
	                        {
	                            die('该规格有下级规格,不能被删除!');
	                        }
	                        
	                        $m_protype=new \Model\ProType();
	                        $where_array = array(
	                        	$m_protype->_GuiGe1->w('=',$id),
	                            $m_protype->_GuiGe2->w_or('=',$id),
	                            $m_protype->_GuiGe3->w_or('=',$id),
	                            $m_protype->_GuiGe4->w_or('=',$id),
	                            $m_protype->_GuiGe5->w_or('=',$id)
	                        );
	                        
	                        
	                        $used = Bll\ProType::Row(null,$where_array);
	                        if($used)
	                        {
	                            die('该规格已被使用 ,不能被删除!');
	                        }
	                        
	                       
	                        if(Bll\Role::Role_Id_Shop($RoleID))
	                        {
	                            $r = Bll\MallGuiGe::DelWhere([$m->_Id->w('=',$id),$m->_UserId->w_and('=',$UID)]);
	                        }else{
	                            $r = Bll\MallGuiGe::DelWhere([$m->_Id->w('=',$id)]);
	                        }
	                       
	                    }else{
	                        die('参数错误!');
	                    }
	                    
	                    if($r)
	                    {
	                        die('删除成功!');
	                    }else
	                    {
	                        die('删除失败!');
	                    }
	                    exit();
	                    break;
	    
	        }
	    }
	    
	    $UrlPath=Fram::CurrentPath();
	    $C = "ID,NAME,SORT_NAME,USER_ID";
	    $F = "类别名称,,NAME;编辑,,USER_ID,,-1,,CheckEditBtn";

	    if(!Fram::CheckNum($ID)){	        
	        $T = " ".($ID<0?"操作::二级信息管理@@page@@'{$UrlPath}/list.html'@@'ID='@@0.9@@0.95":'');
	    }else{
	        $T = '';
	    }
	    
	    $Bar = "添加分类,,/css/js/ext/images/pen.gif,,GridAdd(AddAddress),,#FF0000;";
	    $GridHtml = Ext::GridStr(-1,$UrlPath."/list.html?ID=".$ID, $UrlPath."/edit.html", $UrlPath."/add.html?ID=".$ID, "ID", "名",$C,$F ,$T,$Bar,1,0,1,200);
	    
	    $this->display('list',['GridHtml'=>$GridHtml,'LOGIN_USER_ID'=>$USER_ID]);
	}
	
	public function AddAction()
	{
	    SysFram::CheckPagePower(401);
	    $UID=SysFram::GetLoginID();
	    $news=new \Model\MallGuiGe();
	    $ID=Fram::GetNumValue('ID',-1);
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	     
	    if(Fram::IsPost())
	    {
	        
	        $m=new Model\MallGuiGe();
	        $m->Id(-1);
	        
	        if(Bll\Role::Role_Id_Shop($RoleID)){
	           $m->UserId($UID);
	        }else{
	            $m->UserId(0);
	        }
 	        if($ID<=0)
 	        {
     	        $ids=Fram::GetValue('mall_sort_select_ids');
     	        $ids=explode(',', $ids);
     	        if(is_array($ids))
     	        {
     	            if(isset($ids[1]))
     	              $m->SortId($ids[1]);
     	            if(isset($ids[0]))
     	              $m->SortIdParent($ids[0]);
     	        }
 	        }
	        
	        if($ID>0)
	            $m->ParentId($ID);
	        else
	           $m->ParentId(0);
	        $m->Name(Fram::GetValue('NAME'));
	        if(!$m->Name())
	            die("parent.window.ExtAlert('信息不完整')");
	       
	        if(Bll\MallGuiGe::Insert($m))
	        {
	            echo("parent.window.ExtAlert('操作成功！');");
	             
	        }
	        else
	            echo("parent.window.ExtAlert('操作失败！');");
	        
	        echo Pub\Js::ParentDoView(false);
	        exit();
	    }
	    
	
	    $this->display_layout('edit',array('m'=>$news,'IsViewSort'=>($ID>0)?false:true,'SortValue'=>null));
	}
	
	public function EditAction()
	{
	    SysFram::CheckPagePower(401);
	    $UID=SysFram::GetLoginID();
	    
	    $ID=Fram::GetNumValue('ID',-1);
	    
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    if(!$ID || !is_numeric($ID))
	        die("ID错误！");
	     
	    if(Fram::IsPost())
	    {
	        $m=new Model\MallGuiGe();
	        $m->Id($ID);
	        /**
	        $Old=Bll\MallGuiGe::Model($ID);
            if($Old->ParentId()==0)
            {
                $ids=Fram::GetValue('mall_sort_select_ids');
                $ids=explode(',', $ids);
                if(is_array($ids))
                {
     	            if(isset($ids[1]))
     	              $m->SortId($ids[1]);
     	            if(isset($ids[0]))
     	              $m->SortIdParent($ids[0]);
                }
            }
	        **/
	        $m->Name(Fram::GetValue('NAME'));
	        if(!$m->Name())
	            die("parent.window.ExtAlert('信息不完整')");
	        
	        if(Bll\Role::Role_Id_Shop($RoleID)){
	            $r_up = Bll\MallGuiGe::Update($m,[$m->_UserId->w('=',$UID)]);
	        }else{
	            $r_up = Bll\MallGuiGe::Update($m);
	        }
	       
	        if($r_up)
	        {
	            echo("parent.window.ExtAlert('操作成功！');");
	             
	        }
	        else
	            echo("parent.window.ExtAlert('操作失败！');");
	        
	        echo Pub\Js::ParentDoView(false);
	        exit();
	    }
	
	    $m=Bll\MallGuiGe::Model($ID);
	    $this->display_layout('edit',array('m'=>$m,'SortValue'=>$m->SortIdParent().','.$m->SortId(),'IsViewSort'=>($m->ParentId()>0)?false:true));
	}

}
