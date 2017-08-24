<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class SortController extends yaf\Controller_Abstract
{
	public function ListAction()
	{
	  
	    SysFram::CheckPagePower(439);
	    $SortBig=Fram::GetNumValue('sort_big',-1);
	    $act=Fram::GetValue("act");$UID=SysFram::GetLoginID();
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
	                 
	                $_where = ['SORT_BIG=?',[$SortBig]];
	                
	                $rs= Bll\Sort::GetList($PageNum,$PageSize,$_where,$total,"*",'ID desc');
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	            case "Del":
	                $ids=Fram::GetValue("IDS","");
	                if($ids != "")
	                {
	                    $ids=explode(',', $ids);
	                    Bll\Sort::DelRows($ids);
	                }
	                exit();
	                break;
	                 
	        }
	    }
	     
	    $C = "ID,TITLE";
	    $F = "名称,,TITLE";
	    $T = "操作::编  辑@@selfpage@@EditAddress@@'ID='@@0.7@@0.9";
	    $Bar = (1)?"添 加,,/css/js/ext/images/pen.gif,,ActAdd2(AddAddress,0.7,0.9),,#FF0000;删 除,,/css/js/ext/images/delete.gif,,ActDel();":'';
	    $GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html?sort_big={$SortBig}", 'ID', '',$C,$F ,$T,$Bar,1);
	    //"/user/news/list.html?sortid={$SortID}"
	    $this->display('list',array('GridHtml'=>$GridHtml));
	}
	
    public function AddAction()
	{
	    SysFram::CheckPagePower(439);$UID=SysFram::GetLoginID();
	    $news=new Model\Sort();
	    $SortBig=Fram::GetNumValue('sort_big',-1);
	    if(Fram::IsPost())
	    {
	        $m=new Model\Sort();
	        
	        
	        $m->Id(-1);
	        $m->Title(Fram::GetValue('TITLE'));
	        $m->SortBig($SortBig);
	        $m->State(1);
	        if(!$m->Title())
	            die("parent.window.ExtAlert('信息不完整')");
	        
	        
	        $Conn=\Pub\Fram::GetConn(true);$Do=true;
	        if($m->ValidateModel())
	        {
	           
	            $ID=$m->Insert($Conn);
	            if($ID)
	            {
	                $Do=true;
	                
	            }
	            else
	                $Do=false;
	        }
	        else
	            $Do=false;
	        
	        if($Do)
	        {
	            $Conn->commit();
	            echo "document.getElementById('chuan_hai_form1').reset();";
	            echo Pub\Js::ParentDoView();
	            echo "parent.window.ExtAlert('操作成功！');";
	        }
	        else
	        {
	            $Conn->rollBack();
	            echo "parent.window.ExtAlert('操作失败！');";
	        }
	        \Pub\Fram::CloseConn($Conn);
	        exit();
	    }

	    $this->display('add',array('m'=>$news));
	}
	
	public function EditAction()
	{
	    $ID=Fram::GetNumValue('ID',-1);
	    if(!$ID || !is_numeric($ID))
	        die("ID错误！");
	    
	    SysFram::CheckPagePower(439);$UID=SysFram::GetLoginID();
	    $news=Bll\Sort::Model($ID);//$news=new Model\SortBig();
	    if(Fram::IsPost())
	    {
	        $m=new Model\Sort();
	        $m->Id($ID);
	        
	        $m->Title(Fram::GetValue('TITLE'));
	        $m->State(1);
	        if(!$m->Title())
	            die("parent.window.ExtAlert('信息不完整')");
	        
	        $Conn=\Pub\Fram::GetConn(true);$Do=true;
	        if($m->ValidateModel())
	        {
	            $r=$m->Update(null,$Conn);
	            if($r)
	            {
	                $Do=true;
	            }
	            else
	                $Do=false;
	        }
	        else
	            $Do=false;
	        
	        if($Do)
	        {
	            $Conn->commit();
	            echo Pub\Js::ParentDoView();
	            echo "parent.window.ExtAlert('操作成功！');";
	        }
	        else
	        {
	            $Conn->rollBack();
	            echo "parent.window.ExtAlert('操作失败！');";
	        }
	        \Pub\Fram::CloseConn($Conn);
	        exit();
	    }

	    $this->display('add',array('m'=>$news));
	}
	
}
