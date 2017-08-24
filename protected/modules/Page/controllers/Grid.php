<?php
use \Pub\SysFram;
use \Pub\Fram;
use \Pub\Ext;
use \Pub\Data;

class GridController extends yaf\Controller_Abstract
{
	public function ListAction()
	{
		SysFram::CheckAdminLogin();
		
		$PageID=Fram::GetNumValue('pageid');
		if(!$PageID || $PageID<=0)
		    die('无pageid');
		$m=Bll\PageAuto::Model($PageID);
		if(!$m)
		    die('无page');
		
		if($m->RoleIds() && strpos(",".$m->RoleIds().",", ','.SysFram::getLoginRoleID().',')===FALSE)
		    die('用户角色无权访问');
		
		$GridHtml= Ext::GridStr($PageID,$m->UrlList(), $m->UrlEdit(), $m->UrlAdd(), $m->TableKeyField(), $m->Title(),$m->Fields(), $m->FieldsList(),$m->RowEndToolFields(),$m->FooterToolFields(),1,'SearchDiv');
		$this->display('grid',array('GridHtml'=>$GridHtml));

	}
	
	public function DataAction()
	{
	    $PageID=Fram::GetNumValue('pageid');
	    if(!$PageID || $PageID<=0)
	        exit();
	    
	    SysFram::CheckAdminLogin();
	    $act=Fram::GetValue("act");
	    
	    $row=Bll\PageAuto::Row($PageID);
	    if($row['ROLE_IDS'] && strpos(",{$row['ROLE_IDS']},", ','.SysFram::getLoginRoleID().',')===FALSE)
	       die('用户角色无权访问');
	
	    if(isset($act))
	    {
	        switch ($act)
	        {
	            case "List":
	                
	                $PageNum=0;
	                $start=Fram::GetValue("start",0);
	                $PageSize=Fram::GetNumValue('limit',19);
	                if($PageSize<=0 || $PageSize>100)$PageSize=19;
	                if($start>0 && is_numeric($start))
	                {
	                    $PageNum = ceil($start/$PageSize);
	                    if($PageNum <0)
	                    {
	                        $PageNum = 0;
	                    }
	                }
	                $PageNum++;
	                $total=0;
	                $_where = '1=1';
	                
	                $Arr=explode(";", $row['FIELDS_LIST']);
	                $Fields=$row['TABLE_KEY_FIELD'];
	                for($i=0;$i<count($Arr);$i++)
	                {
	                    $Arr2=explode(",,", $Arr[$i]);
	                    $Fields.=','.$Arr2[1];
	                }
	                
	                if(strlen($row['SQL_WHERE'])>1)
	                {
	                    $row['SQL_WHERE']= ' where '.$row['SQL_WHERE'];
	                    $rs=Data::Rows("select {$Fields} from {$row['TABLE_NAME']} {$row['SQL_WHERE']} ".($row['LIST_ORDER_BY']?' order by '.$row['LIST_ORDER_BY']:'')." limit {$start},{$PageSize}");
	                    $total=Data::Column("select count(1) from {$row['TABLE_NAME']} {$row['SQL_WHERE']}");
	                }
	                else 
	                {
	                    $rs=Data::Rows("select {$Fields} from {$row['TABLE_NAME']} ".($row['LIST_ORDER_BY']?' order by '.$row['LIST_ORDER_BY']:'')." limit {$start},{$PageSize}");
	                    $total=Data::Column("select count(1) from {$row['TABLE_NAME']} ");//where $_where
	                }
	                echo Ext::GetJsonStr($rs,$total);
	                exit();
	                break;
	        }
	    }
	}
}