<?php
use Pub\SysFram;
use Pub\Fram;

class ProController extends \Base\Common
{
	//首页
	public function IndexAction()
	{
	    $total=0;
	    $m_pro=new \Model\Pro();
		$pro_list2 = Bll\Pro::GetList(1,12,[$m_pro->_State->w('=',1)],$total);
		$data['pro_list'] = $pro_list2;//array_merge($pro_list1, $pro_list2);
		
        $data['role'] = Bll\Pro::GetList(1,5,[$m_pro->_State->w('=',1)]);
		$data['point'] = Bll\Pro::GetList(1,2,[$m_pro->_HuiDian->w('>',5),$m_pro->_State->w_and('=',1)]);
		$data['user_id'] = SysFram::GetLoginID(false);
		$data['order_count'] = [];
		$data['order_count']['5']=0;$data['order_count']['2']=0;
		if(SysFram::CheckAdminLogin(false))
		{
		    $data['order_count']['5'] = \Bll\OrderMallDetail::TongJi('1',Pub\SysFram::GetLoginID());
		    $data['order_count']['2'] = \Bll\OrderMallDetail::TongJi('-1',Pub\SysFram::GetLoginID(),Pub\Fram::Data_Add_Day(-7));
		}
		$data['ad']=\Bll\News::SortNews(10);
		$data['IndexViewSort']=[348,683,725,352];
		
		//即时通讯im
		Pub\ChuanHaiIm::Set('71' , '川海软件-A', 'http://www.chuanhaisoft.com/images/default_top.jpg');

		$this->display('index',$data);
	}
	
	public function DetailAction()
	{
	    $m_protype=new Model\ProType();
	    $m_yunfeidetail=new Model\ProYunFeiDetail();
	    $m_china=new Model\China();
	    
		$id = Fram::GetNumValue('id',0);
		$data = array();
		$data['pro'] = Bll\Pro::Row($id);
		if(!$data['pro'])
		    die('页面缺失');
		
		$data['pro']['big_sort'] = Bll\MallSort::Row($data['pro']['SORT_PARENT_ID']);
		$data['pro']['sort'] = Bll\MallSort::Row($data['pro']['SORT_ID']);
		$data['pro']['desc'] = Bll\ProMess::Row($id);
		$total = 0;
		$data['pro']['type'] = Bll\ProType::GetList(1,2000,[$m_protype->_ProId->w('=',$id)],$total,"*");
		
		
		$data['pro']['shopinfo'] = \Bll\User::Row($data['pro']['USER_ID']);
		$data['pro']['shopinfo']['SHOP_PIC']='';
		$data['pro']['shopinfo']['id'] = $data['pro']['USER_ID'];
		
		// print_r($data['pro']['contact']);
		$DoID=Fram::CheckNum($data['pro']['SORT_ID3'])?$data['pro']['SORT_ID3']:$data['pro']['SORT_ID'];
		if(Fram::CheckNum($DoID))
		  $data['mallBreadCrumbs'] = $this->mallBreadCrumbs(Bll\MallSort::Row($DoID));
		$data['yunfei'][0] = Bll\ProYunFei::Row($data['pro']['WU_LIU_ID'],null,'PRICE,PRICE_COUNT,PRICE_NEXT,NEXT_COUNT,BAO_YOU_COUNT');
		$yunfei_detail = Bll\ProYunFeiDetail::GetList(1,2000,[$m_yunfeidetail->_YunFeiId->w('=',$data['pro']['WU_LIU_ID'])],$total,"AREA_ID,PRICE,PRICE_COUNT,PRICE_NEXT,NEXT_COUNT,BAO_YOU_COUNT");
		foreach ($yunfei_detail as $key => $value) {
			$data['yunfei'][$value['AREA_ID']] = $value;
			unset($data['yunfei'][$value['AREA_ID']]['AREA_ID']);
		}
		$data['sheng'] = Bll\China::GetList(1,2000,[$m_china->_Pid->w('=',0)],$total,"*");
		$data['guige'] = $guige = array();

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
				$data['guige'][$k] = Bll\MallGuiGe::Row($row['PARENT_ID']);
				foreach ($v as $sk=>$sv) 
				{
					$data['guige'][$k]['SUB'][$sk] = Bll\MallGuiGe::Row($sv);
				}
			}
		}
		/**
		$m = new \Model\ProPingJia();
		$w = $m->_ProId->WhereField('=',$id);
		
		$data['pingjia'] = Bll_ProPingJia::GetList(1,2000,$w,$total,"*","ID DESC");
		$data['pingjia_count'] = count($data['pingjia']);
		$pingfen = Bll_ProPingJia::GetSingleRow($w,"SUM(`PING_FEN`) as sum");
		$pingfen = $pingfen['sum'];
		$pingfen = $data['pingjia_count'] == 0 ? 5 : ($pingfen/$data['pingjia_count']);
		$data['pingjia_pingfen'] = sprintf("%.2f",$pingfen);
		$data['hotpros'] = Bll_Pro::GetList(1,5,"STATE = '1' AND ROLE_ID = '81' and SORT_PARENT_ID=".$data['pro']['SORT_PARENT_ID'],$total,"*","VIEW_COUNT DESC");
		$data['city_name'] = '';
		if ($data['pro']['SHI']) {
			$city = Bll_China::GetSingleRow('','ID,NAME',$data['pro']['SHI']);
			$data['city_name'] = $city['NAME'];
		}
		**/
		$data['UserId'] = SysFram::GetLoginID(false);
		$this->display('detail',$data);
	}
	//分类
	public function ListAction()
	{
		$page = Fram::GetNumValue('page',1);
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


		$pagesize = 50;
		$total = 0;


		$m=new Model\Pro();
		
		// $pro_where = '';
		$data['city_id'] = Fram::GetNumValue('city_id');
		$data['city_name'] = '';//Pub\Position::GetCity();

		$data['user_id'] = Fram::GetNumValue('user_id');
		if ($data['user_id']) 
		{
			$pro_where[]=$m->_UserId->w_and('=',$data['user_id']);
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
		$data['pro'] = Bll\Pro::GetList($page,$pagesize,$pro_where,$total,"*",$sort);
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
		$this->display('list',$data);
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
?>
