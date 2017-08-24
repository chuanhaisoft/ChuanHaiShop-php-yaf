<?php
namespace Pub;

class Cart
{
	//添加购物车
	public static function AddCart($pro_id,$type_id,$qty = 1)
	{
		$key = (int)$pro_id . ':';
		if ($type_id) 
		{
			$key .= $type_id;
		}
		if ((int)$qty && ((int)$qty > 0)) 
		{
			if (!isset($_COOKIE['cart'][$key])) 
			{
				Fram::SetCookies("cart[$key]", (int)$qty, 3600*24*365);
			} else 
			{
				Fram::SetCookies("cart[$key]", $_COOKIE['cart'][$key]+(int)$qty, 3600*24*365);
			}
		}

	}
	public static function GetCartPro()
	{
		$keys = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : array();

		$cart_pro = array();
		$type_m = new \Model\ProType();
		foreach ($keys as $key => $num)
		{
			$pro = explode(':', $key);
			$pro_id = intval($pro[0]);
			$type_w = [$type_m->_ProId->w('=',$pro_id)];
			foreach (explode('-', $pro[1]) as $k => $v)
			{
			    $t='_GuiGe'.($k+1);
				$type_w[] = $type_m->$t->w_and('=',$v);
			}

			$pro_info = \Bll\Pro::Row($pro_id);
			$pro_info['type'] = \Bll\ProType::Row(null,$type_w);
			if (!$pro_info['type']) $pro_info['type'] = [];
            if(isset($pro_info['type']['PRICE']))
                $pro_info['PRICE']=$pro_info['type']['PRICE'];
			$pro_info['num'] = $num;
			$pro_info['cart_key'] = $key;

			$cart_pro[] = $pro_info;

		}

		return $cart_pro;

	}

	public static function Update($key, $qty) 
	{
		if ((int)$qty && ((int)$qty > 0)) {
			Fram::SetCookies("cart[$key]", (int)$qty, 3600*24*365);
		} else {
			$this->remove($key);
		}

	}

	public static function Remove($key) 
	{
		if (isset($_COOKIE['cart'][$key])) {
	      	Fram::SetCookies("cart[$key]","");
		}
	}
	public static function ItemNums() 
	{
		$num = 0;
		if(isset($_COOKIE['cart'])){
			$num = count($_COOKIE['cart']);
		}

		return $num;
	}
}