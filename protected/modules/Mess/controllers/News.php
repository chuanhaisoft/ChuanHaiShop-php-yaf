<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class NewsController extends yaf\Controller_Abstract
{
	public function ListAction()
	{
	    SysFram::CheckPagePower(9);
	    $SortID=Fram::GetNumValue('sortid',-1);
	    $act=Fram::GetValue("act");$UID=SysFram::GetLoginID();
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                $PageNum=0;$start=0;$PageSize=0;$total=0;
	                Ext::InitPageSize($PageNum, $start, $PageSize);
	                 
	                $_where = ['SORT_ID=?',[$SortID]];
	                 
	                $rs=Bll\News::GetList($PageNum,$PageSize,$_where,$total,"*",'ID desc');
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	            case "Del":
	                $ids=Fram::GetValue("IDS","");
	                if($ids != "")
	                {
	                    $ids=explode(',', $ids);
	                    Bll\News::DelRows($ids);
	                    Bll\NewsInfo::DelRows($ids);
	                }
	                exit();
	                break;
	                 
	        }
	    }
	     
	    $C = "ID,TITLE,PIC1,ADD_TIME,COLOR,URL";
	    $F = "名称,,TITLE;添加时间,,ADD_TIME;附件,,PIC1,,-1,,PicAhref";
	    $T = "操作::编  辑@@page@@EditAddress@@'ID='@@0.7@@0.9";
	    $Bar = ($SortID<100000)?"添 加,,/css/js/ext/images/pen.gif,,ActAdd(AddAddress,0.7,0.9),,#FF0000;删 除,,/css/js/ext/images/delete.gif,,ActDel();":'';
	    $GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html?sortid={$SortID}", 'ID', '',$C,$F ,$T,$Bar,1);
	    //"/user/news/list.html?sortid={$SortID}"
	    $this->display('list',array('GridHtml'=>$GridHtml));
	}
	
    public function AddAction()
	{
	    SysFram::CheckAdminLogin();
	    $UID=SysFram::GetLoginID();
	    $news=new Model\News();
	    $SortID=Fram::GetNumValue('sortid',-1);
	    if(Fram::IsPost())
	    {
	        $m=new Model\News();
	        //$m->getPost($_POST);
	        $m->SortId($SortID);
	        $m->Title(Fram::GetValue('TITLE'));
	        if(!$m->Title())
	            die("parent.window.ExtAlert('信息不完整')");
	        $m->Url(Fram::GetValue('URL'));
	        $m->Color(Fram::GetValue('COLOR'));
	        $m->Pic1(Fram::GetValue('PIC1'));
	        $m->AddTime(Fram::Date());
	        $m->State(1);
	        
	        $Conn=\Pub\Fram::GetConn(true);$Do=true;
	        if($m->ValidateModel())
	        {
	            $ID=$m->Insert($Conn);
	            if($ID)
	            {
	                $m_info=new \Model\NewsInfo();
	                $m_info->NewsId($ID);
	                $m_info->Mess($_POST['content']);
	                $ID = $ID && $m_info->Insert($Conn);
	                if($ID)
	                {
	                    $Do=true;
	                    $Conn->commit();
	                }
	                else
	                    $Do=false;
	            }
	            else
	                $Do=false;
	        }
	        else
	            $Do=false;
	        
	        if($Do)
	        {
	            echo "document.getElementById('chuan_hai_form1').reset();";
	            echo Pub\Js::ParentDoView(true);
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

	    $this->display('add',array('m'=>$news,'info'=>'介绍'));
	}
	
	public function EditAction()
	{
	    SysFram::CheckAdminLogin();
	    $ID=Fram::GetNumValue('ID',-1);
	    if(!$ID || !is_numeric($ID))
	        die("ID错误！");
	    
	    $UID=SysFram::GetLoginID();
	    $news=Bll\News::Model($ID);//$news=new Model\News();
	    $news_info=Bll\NewsInfo::Model($ID);
	    if(Fram::IsPost())
	    {
	        $m=new Model\News();
	        $m->Id($ID);
	        //$m->getPost($_POST);
	        //$m->SortId($SortID);
	        $m->Title(Fram::GetValue('TITLE'));
	        if(!$m->Title())
	            die("parent.window.ExtAlert('信息不完整')");
	        $m->Url(Fram::GetValue('URL'));
	        $m->Color(Fram::GetValue('COLOR'));
	        $m->Pic1(Fram::GetValue('PIC1'));
	        $m->EditTime(Fram::Date());
	        $m->State(1);
	        
	        $Conn=\Pub\Fram::GetConn(true);$Do=true;
	        if($m->ValidateModel())
	        {
	            $r=$m->Update(null,$Conn);
	            if($r)
	            {
	                $m_info=new \Model\NewsInfo();
	                $m_info->NewsId($ID);
	                $m_info->EditTime(Fram::Date());
	                $m_info->Mess(isset($_POST['content'])?$_POST['content']:'');
	                $r = $r && $m_info->Update(null,$Conn,false);
	                if($r)
	                {
	                    $Do=true;
	                    $Conn->commit();
	                }
	                else
	                    $Do=false;
	            }
	            else
	                $Do=false;
	        }
	        else
	            $Do=false;
	        
	        if($Do)
	        {
	            echo Pub\Js::ParentDoView(true);
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

	    $this->display('add',array('m'=>$news,'info'=>$news_info?$news_info->Mess():''));
	}
	
}
