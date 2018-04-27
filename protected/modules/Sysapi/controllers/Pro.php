<?php
Use \Pub\Fram;
Use \Pub\SysFram;

class ProController extends \Base\Api
{
    public function Index_proAction()
    {
        $r=[];$t=0;
        $m_pro=new \Model\Pro();
        $ProSort=Fram::GetValue('prosort','');
        $IndexViewSort=($ProSort && $ProSort!='')?explode(',', $ProSort):[348,683,354,352,311];
        $r[]=['name'=>'热门产品','id'=>'0','list'=>Bll\Pro::GetList(1,10,[$m_pro->_State->w('=',1)],$t,'ID,NAME,NAME2,PIC,PRICE',$m_pro->_ViewCount->k.' desc')];
        $i=1;
        foreach($IndexViewSort as $key => $value)
        {
            $name=Bll\MallSort::Column($value,'NAME');
            $rows=Bll\Pro::GetList(1,4,[$m_pro->_SortParentId->w('=',$value),$m_pro->_State->w_and('=',1)],$t,'ID,NAME,NAME2,PIC,PRICE');
            if($name && $rows)
            {
                $r[]=['id'=>$value,'name'=>$name,'list'=>$rows];
            }
            $i++;
            if($i>20){break;}
        }
        
        echo parent::ToJson($r);
    }
    
    public function DetailAction()
    {
        $m_protype=new Model\ProType();
        $m_yunfeidetail=new Model\ProYunFeiDetail();
        $m_china=new Model\China();
         
        $id = Fram::GetNumValue('id',0);
        if($id<=0)
            die(parent::ToJson([],1,'无此产品'));
        $data = array();
        $data['PRO'] = Bll\Pro::Row($id,NULL,'ID,NAME,NAME2,PIC,SORT_PARENT_ID,SORT_ID,SORT_ID3,WU_LIU_ID,PRICE,HUI_DIAN,POINT');
        if(!$data['PRO'])
            die(parent::ToJson([],1,'无此产品'));
        
        $data['BIG_SORT'] = Bll\MallSort::Row($data['PRO']['SORT_PARENT_ID']);
        $data['SORT'] = Bll\MallSort::Row($data['PRO']['SORT_ID']);
        $Desc = Bll\ProMess::Row($id);
        $data['PICS']=[];
        if($Desc && is_array($Desc))
        {
            $data['PRO']['MESS']=str_replace('"/upload/', '"http://shop.chuanhaisoft.com/upload/', $Desc['MESS']);
            if($Desc['PIC1'] && strlen($Desc['PIC1'])>3)$data['PICS'][]=$Desc['PIC1'];
            if($Desc['PIC2'] && strlen($Desc['PIC2'])>3)$data['PICS'][]=$Desc['PIC2'];
            if($Desc['PIC3'] && strlen($Desc['PIC3'])>3)$data['PICS'][]=$Desc['PIC3'];
            if($Desc['PIC4'] && strlen($Desc['PIC4'])>3)$data['PICS'][]=$Desc['PIC4'];
            if($Desc['PIC5'] && strlen($Desc['PIC5'])>3)$data['PICS'][]=$Desc['PIC5'];
        }
        if($data['PICS']==[] && $data['PRO']['PIC'])$data['PICS'][]=$data['PRO']['PIC'];
        $total = 0;
        $data['TYPE'] = Bll\ProType::GetList(1,2000,[$m_protype->_ProId->w('=',$id)],$total,"*");
        
        
        //$data['PRO']['shopinfo'] = \Bll\User::Row($data['PRO']['USER_ID']);
        //$data['PRO']['shopinfo']['SHOP_PIC']='';
        //$data['PRO']['shopinfo']['id'] = $data['PRO']['USER_ID'];
        
        // print_r($data['PRO']['contact']);
        $DoID=Fram::CheckNum($data['PRO']['SORT_ID3'])?$data['PRO']['SORT_ID3']:$data['PRO']['SORT_ID'];
        if(Fram::CheckNum($DoID))
            $data['BREAD_CRUMBS'] = $this->mallBreadCrumbs(Bll\MallSort::Row($DoID));
        $data['YUN_FEI'][0] = Bll\ProYunFei::Row($data['PRO']['WU_LIU_ID'],null,'NAME,PRICE,PRICE_COUNT,PRICE_NEXT,NEXT_COUNT,BAO_YOU_COUNT');
        $yunfei_detail = Bll\ProYunFeiDetail::GetList(1,2000,[$m_yunfeidetail->_YunFeiId->w('=',$data['PRO']['WU_LIU_ID'])],$total,"AREA_ID,PRICE,PRICE_COUNT,PRICE_NEXT,NEXT_COUNT,BAO_YOU_COUNT");
        foreach ($yunfei_detail as $key => $value) {
            $data['YUN_FEI'][$value['AREA_ID']] = $value;
            unset($data['YUN_FEI'][$value['AREA_ID']]['AREA_ID']);
        }
        $data['SHENG'] = Bll\China::GetList(1,2000,[$m_china->_Pid->w('=',0)],$total,"*");
        $data['GUIGE'] = $guige = array();
        
        $w[] = $m_protype->_ProId->w('=',$id);
        $rs = Bll\ProType::GetList(1, 500,$w);
        if(is_array($rs))
        {
            for ($i=1; $i<=5; $i++)
            {
                foreach ($rs as $v)
                {
                    if(\Pub\Fram::CheckNum($v["GUI_GE_$i"]))
                    {
                        if(!isset($guige["GUI_GE_$i"]) || !in_array($v["GUI_GE_$i"], $guige["GUI_GE_$i"]))
                            $guige["GUI_GE_$i"][] = $v["GUI_GE_$i"];
                    }
                }
            }
        }
        
        if (!empty($guige))
        {
            foreach ($guige as $k=>$v)
            {
                $row = Bll\MallGuiGe::Row($v[0]);
                $data['GUIGE'][$k] = Bll\MallGuiGe::Row($row['PARENT_ID']);
                foreach ($v as $sk=>$sv)
                {
                    $data['GUIGE'][$k]['SUB'][$sk] = Bll\MallGuiGe::Row($sv);
                }
            }
        }

        //$m_pro=new \Model\Pro();
        //$data['role'] = Bll\Pro::GetList(1,10,[$m_pro->_State->w('=',1)]);
        
        die(parent::ToJson($data));
    }
    
    public function SortAction()
    {
        $r=[];$t=0;
        $m=new \Model\MallSort();
        $Sort=Bll\MallSort::GetList(1,100,[$m->_ParentId->w('=',0),$m->_State->w_and('=',1)],$t,'ID,NAME',"ORDER_NUM,ID");
        
        foreach($Sort as $key => $value)
        {
            $name=$value['NAME'];
            $rows=Bll\MallSort::GetList(1,100,[$m->_ParentId->w('=',$value['ID']),$m->_State->w_and('=',1)],$t,'ID,NAME,"images/changyong1.png" as PIC',"ORDER_NUM,ID");
            if($name && $rows)
            {
                $r[]=['ID'=>$value['ID'],'NAME'=>$name,'list'=>$rows];
            }
        }
    
        echo parent::ToJson($r);
    }
    
	public function ListAction()
	{

	    $pagesize = 20;
	    $total = 0;
	    $page = Fram::GetNumValue('page',1);
	    if($page<=0){$page=1;}
	    
	    $mallsort_id = Fram::GetNumValue('sort_id',0);
	    $paixu = Fram::GetNumValue('paixu',0);
	    $role = Fram::GetNumValue('role','');
	    $type = Fram::GetNumValue('type_id','');
	    $point = Fram::GetNumValue('point','');
	    $minprice = Fram::GetNumValue('minprice','');
	    $maxprice = Fram::GetNumValue('maxprice','');
	    $keyword = Fram::GetValue('keyword','');
	    $hover = 'pro';
	    $order_arr = array(
	        1 =>'PRICE DESC,ID DESC',
	        2 =>'PRICE ASC,ID DESC',
	        3 =>'XIAO_LIANG DESC,ID DESC',
	        4 =>'VIEW_COUNT DESC,ID DESC',
	    );
	    
	    $sort = 'PRO_LEVEL_NUM ASC,ID DESC';
	    if(!empty($order_arr[$paixu])){
	        $sort = $order_arr[$paixu];
	    }
	    
	    $data = array();
	    
	    if($mallsort_id){
	        $data['mallsort'] = Bll\MallSort::Row($mallsort_id);
	        $data['mallBreadCrumbs'] = $this->mallBreadCrumbs(Bll\MallSort::Row($mallsort_id));
	    }else{
	        $data['mallBreadCrumbs'] = $data['mallsort'] = array(
	            'ID' 	=>0,
	            'NAME' 	=>'全部分类',
	            'PARENT_ID' =>'0',
	        );
	    }
	    
	    $m=new Model\Pro();
	    
	    // $pro_where = '';
	    $data['city_id'] = Fram::GetNumValue('city_id');
	    $data['city_name'] = '';//Pub\Position::GetCity();
	    
	    $data['user_id'] = Fram::GetNumValue('user_id');
	    if ($data['user_id'])
	    {
	        //$pro_where[]=$m->_UserId->w_and('=',$data['user_id']);
	    }
	    if($mallsort_id)
	    {
	        if($data['mallsort']['PARENT_ID']){
	            $mallsort_parent = Bll\MallSort::Row($data['mallsort']['PARENT_ID']);
	            if ($mallsort_parent['PARENT_ID']) {
	                $pro_where[] = $m->_SortId3->w_and('=',$mallsort_id);
	            } else {
	                $pro_where[] = $m->_SortId->w_and('=',$mallsort_id);
	            }
	        }else{
	            $pro_where[] = $m->_SortParentId->w_and('=',$mallsort_id);
	        }
	    }
	    
	    $searchParams = array();
	    if ($role) {
	        $hover = 'role';
	        $searchParams[] = "role=$role";
	        $pro_where[] = $m->_RoleId->w_and('=',$role);
	    }
	    if(Fram::CheckNum($type))
	    {
	        //积分商城
	        if($type==2)
	        {
	            $hover = 'point';
	            $pro_where[] = $m->_HuiDian->w_and('>=',5);
	        }
	    }
	    if ($minprice) {
	        $searchParams[] = "minprice=$minprice";
	        $pro_where[] = $m->_Price->w_and('>',$minprice);
	    }
	    if ($maxprice) {
	        $searchParams[] = "maxprice=$maxprice";
	        $pro_where[] = $m->_Price->w_and('<',$maxprice);
	    }
	    if ($keyword) {
	        $searchParams[] = "keyword=$keyword";
	        $pro_where[] = $m->_Name->w_and('like',"%$keyword%");
	    }
	    
	    $pro_where[] = $m->_State->w_and('=',1);
	    
	    $data['searchParams'] = empty($searchParams) ? '' : '?'.implode('&', $searchParams);
	    //print_r($pro_where);
	    $data['PRO'] = Bll\Pro::GetList($page,$pagesize,$pro_where,$total,"ID,NAME,NAME2,PIC,PRICE",$sort);
	    //print_r("-$page-$pagesize---------");print_r($pro_where);echo $sort;
	    
	    $data['total'] = $total;
	    $data['paixu'] = $paixu;
	    $data['role'] = $role;
	    $data['type'] = $type;
	    $data['minprice'] = $minprice;
	    $data['maxprice'] = $maxprice;
	    $data['keyword'] = $keyword;
	    $data['sort_id'] = $mallsort_id;
	    $data['page'] = $page;
	    $data['pagesize'] = $pagesize;
	    $data['allpage'] = ceil($total/$pagesize);
	    $data['hover'] = $hover;
	    //$this->display('list',$data);

	    echo parent::ToJson($data);
	}
	
	
	private function mallBreadCrumbs($row)
	{
	    if ($row['PARENT_ID']) {
	        $data = Bll\MallSort::Row($row['PARENT_ID']);
	        $data['SUB'] = $row;
	        $res = $this->mallBreadCrumbs($data);
	    } else {
	        $res = $row;
	    }
	    return $res;
	}
	
}