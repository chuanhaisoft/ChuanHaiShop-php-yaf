<?php
namespace Pub;
class SysPara
{
	const IfMyCat=false;//是否使用mysql中间件
	const PicDomain='/';
	const SiteName='川海商城';
	const Version='1.5';
	
	
	
	public static function Pro_List_Url($SortID=0,$Page=1,$PaiXu=0,$UserID=0,$RoleID=0,$TypeID=0)
	{
	    if(is_array($Page))return '/xxxx.html';
	    $url_data['sort_id']=$SortID;
	    $url_data['paixu']=$PaiXu;
	    $url_data['user_id']=$UserID;
	    $url_data['role_id']=$RoleID;
	    $url_data['type_id']=$TypeID;
	    $url_data['page']=$Page;
	
	    $url_str = 'pro_list/';
	    foreach ($url_data as $key => $v)
	    {
	        $url_str .= ($url_str=='pro_list/')?$v:'_'.$v;
	    }
	    $url_str .='.html';
	    return self::site_url($url_str);
	}
	
	public static function Pro_Detail_Url($data=array())
	{
	    if(!is_array($data))
	        $data=['id'=>$data];
	    $url_data = array(
	        'id' =>0,
	    );
	
	    $url_str = 'pro_detail/';
	    foreach ($url_data as $key => $v)
	    {
	        if(isset($data[$key]))
	        {
	            $v = $data[$key];
	        }
	        $url_str .=$v;
	    }
	
	    $url_str .='.html';
	    return self::site_url($url_str);
	}

	public static function site_url($path='')
	{
	    return '/'.$path;
	}
	//img_url
	public static function Img_Url($img_path='')
	{
	    if(!$img_path){
	        $img_path = 'upload/mallpro.jpg';
	    }
	    return self::PicDomain.$img_path;
	}
}
