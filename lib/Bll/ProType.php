<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;
use Pub\Number;

class ProType
{

    //--user code start--
    
    //暂无用
    public static function ProTypes($ProID)
    {
        $r=null;
        $m=new \Model\ProType();
        $w[] = $m->_ProId->w('=',$ProID);
        
        $rs = \Bll\ProType::GetList(1, 500,$w);
        if(is_array($rs))
        {
            for($i=1; $i<=5; $i++)
            {
                foreach($rs as $v)
                {
                    if(\Pub\Fram::CheckNum($v["GUI_GE_$i"])) 
                    {
                        $r[] = $v["GUI_GE_$i"];
                    }
                }
            }
        }
        return $r;
    }
    
    public static function InsertUpdateType($ProID,&$Mess,$Conn=null,$AddUserRoleID=-1,$AddUserID=-1)
    {
        $r=true;
        $Count=0;
        $ProNums=Fram::GetValue('xing_hao_nums','');
        $HUI_DIAN = 0;
        $PRO_PIRCE = 0;
        $PRO_POINT = 0;
        $price_row = 0;
         
        //规格
        $GuiGeStr=Fram::GetValue('gui_ge_value','');
        $gui_ge = array();
        if($GuiGeStr){
            $gui_ge_tmp = explode(',', $GuiGeStr);
            foreach ($gui_ge_tmp as $gv){
                if ($gv) {
                    $gui_ge_val_tmp = explode(':', $gv);
                    if(isset($gui_ge_val_tmp[0])&&isset($gui_ge_val_tmp[1])){
                        $index = explode('_', $gui_ge_val_tmp[0]);
                        $ge_value = explode('_', $gui_ge_val_tmp[1]);
                        if(isset($index[0])&&$index[0]){
                            foreach ($ge_value as $vv){
                                if($vv){
                                    $gui_ge[$index[0]][] = $vv;
                                }
                            }
                        }
                    }
                }
            }
        }
         
        //判断是否有重复规格
        $gui_ge_check_tmp = array();
        foreach($gui_ge as $v){
            $check_tmp_index = '';
            foreach ($v as $v2){
                $check_tmp_index .= $v2."_";
            }
             
            if(isset($gui_ge_check_tmp[$check_tmp_index])){
                die("parent.window.ExtAlert('有重复规格，请重新输入。');");
            }
             
            $gui_ge_check_tmp[$check_tmp_index] = 1;
        }
         
         
        if($ProNums && strlen($ProNums)>0)
        {
            $ProNums=explode(',', $ProNums);
            for($i=0;$i<count($ProNums);$i++)
            {
                $j=$ProNums[$i];
                if(is_numeric($j))
                {
                    if($HUI_DIAN==0||$HUI_DIAN>Fram::GetNumValue("{$j}_hui_dian",0)){
                        $HUI_DIAN = Fram::GetNumValue("{$j}_hui_dian",0);
                    }
                    if($PRO_PIRCE==0||$PRO_PIRCE>Fram::GetNumValue("{$j}_price",0)){
                        $PRO_PIRCE = Fram::GetNumValue("{$j}_price",0);
                    }
                    if($PRO_POINT==0||$PRO_POINT>Fram::GetNumValue("{$j}_point",0)){
                        $PRO_POINT = Fram::GetNumValue("{$j}_point",0);
                    }
                     
                    $_m_type=new \Model\ProType();
                    $_m_type->ProId($ProID);
                    $_m_type->Name(Fram::GetValue("{$j}_xing_hao",''));
                    $_m_type->Pic(Fram::GetValue("{$j}_pic",''));
                    $DbID=Fram::GetNumValue("{$j}_xing_hao_db_key",0);
    
                    $_m_type->Price(Fram::GetNumValue("{$j}_price",0));
                    if(Fram::GetNumValue("{$j}_price",0)>0){
                        $price_row ++;
                    }
                    $_m_type->PriceCost(Fram::GetNumValue("{$j}_cost",0));
                    $_m_type->CanUseYuE(-1);//Fram::GetNumValue("{$j}_can_use_yu_e",0)
                    $_m_type->KuCun(Fram::GetNumValue("{$j}_ku_cun",0));
                    $_m_type->HuiDian(Fram::GetNumValue("{$j}_hui_dian",0));
                     
                    $TypeName=$_m_type->Name();
                    if(!Fram::CheckNum($_m_type->Price()))
                        die("parent.window.ExtAlert('{$TypeName}:售价输入错误，请重新输入。');");
                    if($_m_type->PriceCost() > $_m_type->Price())
                        die("parent.window.ExtAlert('{$TypeName}:供应商价格不可高于售价，请重新输入。');");
                    if(!is_numeric($_m_type->CanUseYuE()) || $_m_type->CanUseYuE()<-1)
                        die("parent.window.ExtAlert('{$TypeName}:余额额度错误，请重新输入。');");
                    if($_m_type->CanUseYuE() > $_m_type->Price())
                        die("parent.window.ExtAlert('{$TypeName}:余额额度不可高于售价，请重新输入。');");
                    if(!Fram::CheckNum($_m_type->KuCun()) || !is_numeric($_m_type->HuiDian())  || $_m_type->HuiDian()<0)
                        die("parent.window.ExtAlert('{$TypeName}:库存输入错误，请重新输入。');");
                    if(!is_numeric($_m_type->HuiDian())  || $_m_type->HuiDian()<0)
                        die("parent.window.ExtAlert('{$TypeName}:惠点输入错误，请重新输入。');");
                    if(Number::DaYu($_m_type->HuiDian(), $_m_type->Price()))
                        die("parent.window.ExtAlert('{$TypeName}:惠点抵扣不能大于价格，请重新输入。');");
                     
                    $GuiGes=Fram::GetValue('gui_ge_s');
                    $GuiGes=explode(',', $GuiGes);
                     
                    if(!is_array($GuiGes) || count($GuiGes)<1)
                        die("parent.window.ExtAlert('无规格信息');");
                     
                     
                    //编辑时候清空
                    $_m_type->GuiGe1(0);
                    $_m_type->GuiGe2(0);
                    $_m_type->GuiGe3(0);
                    $_m_type->GuiGe4(0);
                    $_m_type->GuiGe5(0);
                    $_m_type->GuiGeJson('');
                    $_m_type->Name('');
    
                     
                    for($p=0;$p<count($GuiGes);$p++){
                        $_m_type->GuiGe1(Fram::GetNumValue("{$j}_{$GuiGes[$p]}_gui_ge",0));
                        if(!is_numeric($_m_type->GuiGe1()) || $_m_type->GuiGe1()<0)
                            die("parent.window.ExtAlert('所选规格1主键错误');");
                        $_m_type->GuiGe2(Fram::GetNumValue("{$j}_{$GuiGes[$p]}_gui_ge",0));
                        if(!is_numeric($_m_type->GuiGe2()) || $_m_type->GuiGe2()<0)
                            die("parent.window.ExtAlert('所选规格2主键错误');");
                        $_m_type->GuiGe3(Fram::GetNumValue("{$j}_{$GuiGes[$p]}_gui_ge",0));
                        if(!is_numeric($_m_type->GuiGe3()) || $_m_type->GuiGe3()<0)
                            die("parent.window.ExtAlert('所选规格3主键错误');");
                        $_m_type->GuiGe4(Fram::GetNumValue("{$j}_{$GuiGes[$p]}_gui_ge",0));
                        if(!is_numeric($_m_type->GuiGe4()) || $_m_type->GuiGe4()<0)
                            die("parent.window.ExtAlert('所选规格4主键错误');");
                        $_m_type->GuiGe5(Fram::GetNumValue("{$j}_{$GuiGes[$p]}_gui_ge",0));
                        if(!is_numeric($_m_type->GuiGe5()) || $_m_type->GuiGe5()<0)
                            die("parent.window.ExtAlert('所选规格5主键错误');");
                    }
                     
                    if(isset($gui_ge[$j]))
                    {
                        $where = null;$m_guige=new \Model\MallGuiGe();//   implode(',',$gui_ge[$j]);//
                        for($k=0;$k<count($gui_ge[$j]);$k++)
                        {
                            $where[]=($k==0?$m_guige->_Id->w('=',$gui_ge[$j][$k]):$m_guige->_Id->w_or('=',$gui_ge[$j][$k]));
                        }
                        $t = 0;
                        $guiGes=\Bll\MallGuiGe::GetList(1, 100,$where,$t,'',"PARENT_ID asc");
                        $guige_json = array();
                        $guige_name = '';
                        foreach($guiGes as $key => $v){
                            $guige_name .=$v['NAME'].',';
                            $guige_json[$v['PARENT_ID']] = $v['ID'];
                            if($key==0){
                                $_m_type->GuiGe1($v['ID']);
                            }
                            if($key==1){
                                $_m_type->GuiGe2($v['ID']);
                            }
                            if($key==2){
                                $_m_type->GuiGe3($v['ID']);
                            }
                            if($key==3){
                                $_m_type->GuiGe4($v['ID']);
                            }
                            if($key==4){
                                $_m_type->GuiGe5($v['ID']);
                            }
                        }
                         
                        $_m_type->Name($guige_name);
                        $_m_type->GuiGeJson(json_encode($guige_json));
                    }
                     
                    //计算惠点(C类)
                    if(is_numeric($DbID) && $DbID>0)
                    {
                        $model_pro=\Bll\Pro::Model($ProID);
                        $_m_type->Point(\Pub\Number::Cheng($_m_type->Price(), \Bll\User::GetShopRate($model_pro->UserId()) ));
                    }
                    else
                    {
                        $_m_type->Point(\Pub\Number::Cheng($_m_type->Price(), \Bll\User::GetShopRate(SysFram::GetLoginID()) ));
                    }
                     
                    //A类商家自定义产品积分
                    if($AddUserRoleID==81)
                    {
                        $_m_type->Point(Fram::GetNumValue("{$j}_point",0));
                        if(!is_numeric($_m_type->Point()) || $_m_type->Point()<0)
                            die("parent.window.ExtAlert('{$TypeName}:积分输入错误，请重新输入。');");
                    }
                    $_m_type->Point($PRO_POINT);
                    if(1==1)//$_m_type->Name() && strlen($_m_type->Name())>0
                    {
                        if(!is_numeric($_m_type->KuCun()))
                            $Mess.=",库存错误，请输入数字格式";
                        else
                        {
                            if(is_numeric($DbID) && $DbID>0)
                            {
                                $_m_type->Id($DbID);
                                Fram::SetChanged($_m_type->_ProId,false);
                                $r=$r && \Bll\ProType::Update($_m_type,[$_m_type->_ProId->w('=',$ProID)],$Conn);
                            }
                            else
                                $r=$r && \Bll\ProType::Insert($_m_type,$Conn);
                            $Count++;
                        }
                    }
                }
            }
            if($Count==0)
            {
                $Mess="请输入至少一个型号信息。";
                $r=false;
            }
        }
        else
        {
            $r=false;
            $Mess="请输入至少一个型号信息.";
        }
         
        if(!$gui_ge&&$price_row>1){
            $r=false;
            $Mess="没有选择规格 ,只能有一行有效行.";
        }
         
        //更新pro表huidian
        $m_pro = new \Model\Pro();
        $m_pro->HuiDian($HUI_DIAN);
        $m_pro->Price($PRO_PIRCE);
        $m_pro->Point($PRO_POINT);
         
        $m_pro->Id($ProID);
        $r=$r && \Bll\Pro::Update($m_pro,null,$Conn,false);
    
         
        $DelRowsID=Fram::GetValue('DelRows','');
        if($DelRowsID && strlen($DelRowsID)>0)
        {
            $DelRowsID=explode(',', $DelRowsID);
            for($i=0;$i<count($DelRowsID);$i++)
            {
                if(Fram::CheckNum($DelRowsID[$i]))
                {
                    $m_del=new \Model\ProType();
                    $r= $r && \Bll\ProType::DelWhere([$m_del->_Id->w('=',$DelRowsID[$i]),$m_del->_ProId->w_and('=',$ProID)],$Conn);
                }
            }
        }
         
        return $r;
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\ProType::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\ProType::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\ProType::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\ProType::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\ProType::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\ProType::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\ProType::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\ProType::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\ProType::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\ProType::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\ProType::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}