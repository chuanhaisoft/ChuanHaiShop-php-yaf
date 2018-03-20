<?php
use Pub\SysFram;
use Pub\Fram;
use Pub\Cart;
use Model\ProYunFeiDetail;

class CartController extends \Base\Common
{
	public function IndexAction()
	{
		$data = array();
		if(!SysFram::CheckAdminLogin(false))
		{
		    die(Pub\Js::Alert('会员未登录，请先登录',true).Pub\Js::LocationHref('/',true));
		}
		$data['UserId'] = SysFram::GetLoginID();
		$m = new Model\ShoppingAddress();
		$w[] = $m->_UserId->w('=',$data['UserId']);
		$data['addresses'] = Bll\ShoppingAddress::GetList(1,100,$w);
		$w[] = $m->_Isdefault->w_and('=',1);
		foreach ($data['addresses'] as $value) {
			if ($value['ISDEFAULT'] == 1) {
				$data['default_address'] = $value;
			}
		}
		// 直辖市
		$mc = new Model\China();
		$w = [$mc->_Pid->w_and('=','0')];
		$w[] = $mc->_Name->w_and('like','%市');
		$data['zhixia'] = Bll\China::GetList(1,1000,$w);
		$data['total'] = array('countprice'=>0,'yun_fei'=>0,'mprice'=>0,'cashprice'=>0,'hui_dian'=>0,'point'=>0);
		$id = Fram::GetNumValue('id',0);
		if ($id) 
		{
			$pro = Bll\Pro::Row($id);
			// $data['all_pro']['type'] = ;
			for ($i=1; $i < 6; $i++) 
			{
				$guige[$i] = Fram::GetNumValue('GUI_GE_'.$i,0);
			}
			$m = new Model\ProType();
			$w = [$m->_ProId->w('=',$id)];
			$w[] = $m->_GuiGe1->w_and('=',$guige[1]);
			$w[] = $m->_GuiGe2->w_and('=',$guige[2]);
			$w[] = $m->_GuiGe3->w_and('=',$guige[3]);
			$w[] = $m->_GuiGe4->w_and('=',$guige[4]);
			$w[] = $m->_GuiGe5->w_and('=',$guige[5]);
			$pro['type'] = Bll\ProType::Row(null,$w);
			$pro['num'] = Fram::GetNumValue('num',1);
			$data['all_pro'][] = $pro;
		} else {
			$data['all_pro'] = Cart::GetCartPro();
		}
		foreach ($data['all_pro'] as $k=>$v)
		{
			$data['total']['countprice']+= $v['type']['PRICE'] * $v['num'];
			$data['total']['hui_dian']	+= $v['type']['HUI_DIAN']* $v['num'];
			$data['total']['mprice']	+= $v['type']['CAN_USE_YU_E']* $v['num'];
			$data['total']['point']		+= $v['type']['POINT'];
			if(isset($data['default_address']))
			{
			    $yunfei=Bll\ProYunFei::GetYunFei($v['WU_LIU_ID'], $v['num'], $data['default_address']['SHENG']);
			    
			    $data['all_pro'][$k]['YUN_FEI'] = $yunfei;
			    $data['total']['yun_fei']	+= $yunfei;
			}

		}
		$data['total']['totalprice'] = $data['total']['countprice'] + $data['total']['yun_fei'];
		//支付余额
		$user_money=Bll\User::GetUserMoney($data['UserId']);
		$data['total']['mprice']=$user_money>$data['total']['mprice']?$data['total']['mprice']:$user_money;
		
		$data['total']['cashprice']=$data['total']['totalprice']-$data['total']['mprice']-$data['total']['hui_dian'];
		$this->display('index',$data);
	}
	// 购物车数据
	public function DataAction()
	{
	    $data=null;
		foreach (Cart::GetCartPro() as $key => $value) 
		{//print_r($value);
			foreach ($value as $skey => $svalue) 
			{
				if ($skey == 'PIC') 
				{
					$value[$skey] = Pub\SysPara::Img_Url($svalue);
				}
				$value['url'] = Pub\SysPara::Pro_Detail_Url(array('id'=>$value['ID']));
			}
			$value['PIC'] = Pub\Fram::GetSuoLue($value['PIC']);
			$data[$key] = $value;
		}
		echo json_encode($data);
	}

	//添加到购物车
	public function AddAction()
	{
		$Pro_id = Fram::GetNumValue('pro_id',0);
		$Type_id = Fram::GetValue('type_id',0);
		$Num = Fram::GetNumValue('num',1);

		if(!$Pro_id&&!$Num)
		{
			die(json_encode(array('status'=>0,'msg'=>'参数错误!')));
		}

		Cart::Addcart($Pro_id,$Type_id,$Num);

		die(json_encode(array('status'=>1,'msg'=>'添加成功!')));

	}
	//删除
	public function DeleteAction()
	{
		$key = Fram::GetValue('key',0);
		foreach (explode('_',$key) as $k => $v) {
			Cart::Remove($v);
		}
		if (Fram::IsPost()) {
			echo json_encode(array('error'=>'0','mess'=>'删除成功'));
        } else {
			$this->redirect(Pub\SysPara::site_url('cart.html'));
		}
	}
	//在线支付
	public function PayAction()
	{
		$User_id = SysFram::GetLoginID(false);
		if (!Fram::CheckNum($User_id)) 
		{
			die(json_encode(['error'=>'1', 'mess'=>'请登录！']));
		}
		$Shopping_address_id = Fram::GetNumValue('address_id',0);
		if(!isset($_POST['data']))
		    die(json_encode(['error'=>'1', 'mess'=>'无订购产品！']));
		foreach (isset($_POST['data'])?$_POST['data']:null as $k=>$pro) 
		{
			$Order_pros[$k]['pro_id'] = ($pro['id']);
			$Order_pros[$k]['pro_type_id'] = ($pro['typeid']);
			$Order_pros[$k]['pro_count'] = ($pro['count']);
			$Order_pros[$k]['mess'] = isset($pro['mess'])?$pro['mess']:'';
		}
		//file_put_contents("./error.txt", var_export($Shopping_address_id, true));
		//$Order_pros = json_encode($Order_pros);
		$res=\Bll\OrderMall::Order_add($User_id, $Order_pros, $Shopping_address_id);
		//{"error":0,"order_id":"1747263","next_url":"\/mall\/order.html?id=1747263"}
		if($res && $res['error'] == 0)
		{
			$keys = isset($_COOKIE['cart']) ? Fram::GetCookies('cart') : [];
			foreach ($keys as $key=>$num)
			{
				Cart::Remove($key);
			}
		}
		die(json_encode($res));
	}
	public function TotalAction()
	{
		$data['address_id'] = Fram::GetNumValue('address_id');
		$address = Bll\ShoppingAddress::Row($data['address_id'],'SHENG');
		$area_id = $address['SHENG'];
		$data['pros'] = isset($_POST['pros']) ? $_POST['pros'] : [];
		$data['total'] = array('countprice'=>0,'yun_fei'=>0,'mprice'=>0,'cashprice'=>0,'hui_dian'=>0,'point'=>0);
		foreach ($data['pros'] as $k=>$pro) 
		{
			$pro['id']		= $pro['id'];
			$pro['typeid']	= $pro['typeid'];
			$pro['count'] 	= $pro['count'];
			$pro_row = Bll\Pro::Row($pro['id']);
			$type_row = Bll\ProType::Row($pro['typeid']);
			if (empty($type_row)) {
				$type_row = $pro_row;
			}
			if ($type_row['KU_CUN'] < $pro['count']) {
				die(json_encode(array(
					'error'=> 1,
					'mess' => '"'.$pro_row['NAME'].'"库存不足，剩余'.$type_row['KU_CUN']
				)));
			}
			$pro['price'] 	= $type_row['PRICE'];
			$pro['countprice'] 	=  Pub\Number::Cheng($type_row['PRICE'], $pro['count']);
			$pro['hui_dian']= $type_row['HUI_DIAN'];
			$pro['mprice']	= $type_row['CAN_USE_YU_E'];
			$pro['point'] 	= $type_row['POINT'];
			
			
			
			$yunfei=Bll\ProYunFei::GetYunFei($pro_row['WU_LIU_ID'], $pro['count'], $area_id);
			$pro['yun_fei'] = $yunfei;
			$data['total']['countprice']= Pub\Number::Jia($data['total']['countprice'],$pro['countprice']);
			$data['total']['yun_fei'] 	= Pub\Number::Jia($data['total']['yun_fei'],$pro['yun_fei']);
			$data['total']['hui_dian'] 	= Pub\Number::Jia($data['total']['hui_dian'], \Pub\Number::Cheng($pro['hui_dian'], $pro['count']) );
			$data['total']['mprice'] 	= Pub\Number::Jia($data['total']['mprice'], \Pub\Number::Cheng($pro['mprice'], $pro['count']) );
			$data['total']['point'] 	= Pub\Number::Jia($data['total']['point'],$pro['point']);
			$data['pros'][$k] = $pro;
		}
		$data['total']['totalprice'] = Pub\Number::Jia($data['total']['countprice'], $data['total']['yun_fei']);
		//$user=Api::UserInfo(Fram::GetSession("SysAdminID"));
		//$user=json_decode($user, true);
		$UserMoney=Bll\User::GetUserMoney(SysFram::GetLoginID());
		$data['total']['mprice']=$UserMoney>$data['total']['mprice']?$data['total']['mprice']:$UserMoney;
		
		$data['total']['cashprice']=\Pub\Number::Jian($data['total']['totalprice'], $data['total']['mprice']);
		$data['total']['cashprice']=\Pub\Number::Jian($data['total']['cashprice'], $data['total']['hui_dian']);
		echo json_encode($data);
	}
	

	
}
?>
