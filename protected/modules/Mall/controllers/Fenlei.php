<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class FenleiController extends \Base\ControllerAdmin
{	
	public function ListAction()
	{
	    SysFram::CheckPagePower(390);
	    $act=Fram::GetValue("act");$UID=SysFram::GetLoginID();
	    $ID=Fram::GetNumValue('ID',-1);
	    
	    $m=new \Model\MallSort();
	    
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
	                $rs=Bll\MallSort::GetList($PageNum,$PageSize,$_where,$total,"*",'ORDER_NUM asc,ID asc');
	                $level = Bll\MallSort::GetLevel($ID);
	                
	                foreach ($rs as $key => $v){
	                    $rs[$key]['LEVEL'] = $level;
	                }
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	            case "Del":
	                    $ids=Fram::GetValue("IDS","");
	                    $CanDel=true;
	                    if($ids != "")
	                    {
	                        $ids=explode(',', $ids);
	                        for($i=0;$i<count($ids);$i++)
	                        {
	                            if($CanDel)
	                            {
	                                $t=\Bll\MallSort::Column(null,'count(1)',[$m->_ParentId->w('=',$ids[$i])]);
	                                if(\Pub\Fram::CheckNum($t))
	                                    $CanDel=false;
	                                else 
	                                    break;
	                            }
	                        }
	                        if(!$CanDel)
	                            die("有子分类不能删除");
	                        
	                        Bll\MallSort::DelRows($ids);
	                    }
	                    exit();
	                    break;
	    
	        }
	    }
	    //Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html"
	    
	   
	    $UrlPath=Fram::CurrentPath();
	    $C = "ID,NAME,LEVEL,ORDER_NUM";
	    $F = "排序,,ORDER_NUM;类别名称,,NAME;下级分类,,LEVEL,,-1,,CheckSub";
	    $T = "操作::编  辑@@selfpage@@EditAddress@@'ID='@@500@@250".($ID>=0&&0?";;二级分类管理@@page@@'{$UrlPath}/list.html'@@'ID='@@0.9@@0.95":'');
	    $Bar = "添加分类,,/css/js/ext/images/pen.gif,,GridAdd(AddAddress),,#FF0000;删除分类,,/css/js/ext/images/delete.gif,,ActDel();";//更新Js数据缓存,,/css/js/ext/images/pen.gif,,UpdateJs();
	    $GridHtml = Ext::GridStr(-1,$UrlPath."/list.html?ID=".$ID, $UrlPath."/edit.html", $UrlPath."/add.html?ID=".$ID, "ID", "名",$C,$F ,$T,$Bar,1,0,1,200);
	    $level = 1;
	    $this->display('list',array('GridHtml'=>$GridHtml));
	}
	
	public function AddAction()
	{
	    SysFram::CheckPagePower(390);$UID=SysFram::GetLoginID();
	    $news=new Model\MallSort();
	    $ID=Fram::GetNumValue('ID',-1);
	     
	    if(\Pub\Fram::IsPost())
	    {
	        $m=new Model\MallSort();
	        $m->Id(-1);
	        if($ID>0)
	            $m->ParentId($ID);
	        else
	           $m->ParentId(0);
	        $m->Name(Fram::GetValue('NAME'));
	        if(!$m->Name())
	            die("parent.window.ExtAlert('信息不完整')");
	        $mall_id = Bll\MallSort::Insert($m);
	        
	        $ORDER_NUM = Fram::GetValue('ORDER_NUM');
	        
	        if(!$ORDER_NUM){
	            $ORDER_NUM = $mall_id*10;
	        }
	        
	        $m=new Model\MallSort();
	        $m->Id($mall_id);
	        $m->OrderNum($ORDER_NUM);
	        Bll\MallSort::Update($m);
	        
	        if($mall_id)
	        {
	            echo("parent.window.ExtAlert('操作成功！');");
	             
	        }
	        else
	            echo("parent.window.ExtAlert('操作失败！');");
	        
	        echo \Pub\Js::ParentDoView(false);
	        exit();
	    }
	    
	
	    $this->display_layout('edit',array('m'=>$news));
	}
	
	public function EditAction()
	{
	    
	    SysFram::CheckPagePower(390);$UID=SysFram::GetLoginID();
	    $ID=Fram::GetNumValue('ID',-1);
	    if(!$ID || !is_numeric($ID))
	        die("ID错误！");
	     
	    if(\Pub\Fram::IsPost())
	    {
	        $m=new Model\MallSort();
	        $m->Id($ID);
	        $m->Name(Fram::GetValue('NAME'));
	        $m->OrderNum(Fram::GetValue('ORDER_NUM'));
	        if(!$m->Name())
	            die("parent.window.ExtAlert('信息不完整')");
	       
	        if(Bll\MallSort::Update($m))
	        {
	            echo("parent.window.ExtAlert('操作成功！');");
	             
	        }
	        else
	            echo("parent.window.ExtAlert('操作失败！');");
	        
	        echo \Pub\Js::ParentDoView(false);
	        exit();
	    }
	   
	    $m=Bll\MallSort::Model($ID);
	    $this->display_layout('edit',array('m'=>$m));
	}

}
