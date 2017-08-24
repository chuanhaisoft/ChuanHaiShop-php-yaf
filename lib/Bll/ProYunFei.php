<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class ProYunFei
{

    //--user code start--
    //运费计算
    public static function GetYunFei($YunFeiID,$ProCount,$Sheng)
    {
        //基准运费
        $m=\Bll\ProYunFei::Model($YunFeiID);
        $m_detail=new \Model\ProYunFeiDetail();
        if(!Fram::CheckNum($m->Id()))
            die(json_encode(array('error'=>1,'mess'=>'产品无运费模板')));
    
        //省份运费
        $YunFeiSheng=\Bll\ProYunFeiDetail::Column(null,'count(1)', [$m_detail->_YunFeiId->w('=',$YunFeiID),$m_detail->_AreaId->w_and('=',$Sheng)]);
        if($YunFeiSheng && $YunFeiSheng>0)
        {
            $m2=\Bll\ProYunFeiDetail::Model(null,[$m_detail->_YunFeiId->w('=',$YunFeiID),$m_detail->_AreaId->w_and('=',$Sheng)]);
            if(!$m2 || !Fram::CheckNum($m2->Id()))
                die(json_encode(array('error'=>1,'mess'=>'产品省份运费模板错误')));
            $m=$m2;
        }
    
        $YunFei=0;
        $i=0;
        if(Fram::CheckNum($m->BaoYouCount()) && $ProCount>=$m->BaoYouCount())
        {
            $YunFei=0;
        }
        else
        {
            while($ProCount>0)
            {
                $i++;
                if($i==1)
                {
                    $YunFei=$YunFei + $m->Price();
                    $ProCount=$ProCount - $m->PriceCount();
                }
                else
                {
                    $YunFei=$YunFei + $m->PriceNext();
                    $ProCount=$ProCount - $m->NextCount();
                }
                 
            }
        }
    
        return $YunFei;
    
    }
    
    public static function GetData_yun_fei($ProUserID=0)
    {
        $ReturnArr=array();
        $User1=array();
        array_push($User1, array('ID'=>1,'NAME'=>'圆通快递'));
        array_push($User1, array('ID'=>20,'NAME'=>'韵达快递'));
        array_push($User1, array('ID'=>30,'NAME'=>'申通快递'));
        array_push($User1, array('ID'=>40,'NAME'=>'顺丰快递'));
        array_push($User1, array('ID'=>50,'NAME'=>'百世汇通'));
        array_push($User1, array('ID'=>60,'NAME'=>'快捷速递'));
        array_push($User1, array('ID'=>70,'NAME'=>'全峰快递'));
        array_push($User1, array('ID'=>80,'NAME'=>'中通快递'));
        array_push($User1, array('ID'=>90,'NAME'=>'天天快递'));
        array_push($User1, array('ID'=>91,'NAME'=>'优速快递'));
        array_push($User1, array('ID'=>10,'NAME'=>'宅急送'));
        array_push($User1, array('ID'=>100,'NAME'=>'邮政快递'));
        array_push($User1, array('ID'=>101,'NAME'=>'德邦快递'));
        array_push($User1, array('ID'=>130,'NAME'=>'其他'));
         
         
         
        for($i1=0;$i1<count($User1);$i1++)
        {
            $row1=$User1[$i1];
            $ReturnArr[$row1['ID']]=array();
            $ReturnArr[$row1['ID']]["name"]=$row1['NAME'];
            $ReturnArr[$row1['ID']]["cell"]=array();
        	    
        }
         
        return $ReturnArr;
    }
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
		return \Dal\ProYunFei::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\ProYunFei::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\ProYunFei::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\ProYunFei::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\ProYunFei::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\ProYunFei::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\ProYunFei::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\ProYunFei::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\ProYunFei::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\ProYunFei::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\ProYunFei::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}