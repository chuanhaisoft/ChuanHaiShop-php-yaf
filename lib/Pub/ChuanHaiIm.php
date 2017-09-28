<?php
namespace Pub;
//川海im，http://www.yunhuatong.com ,qq:276556803
class ChuanHaiIm
{
    //正式上线请将测试版的domain，key 替换为 正式版
    private static function DomainID()
    {
        return "80026";
    }
    
    private static function Key()
    {
        return "K^X7LF976VMAmDb*1#ZMpfvnyjDV4c";
    }
    
    public static function Set($UserId,$UserName,$UserPic,$_Expire=null)
    {
        $UserData=array('userid'=>"{$UserId}",'domainid'=>self::DomainID().'','name'=>"{$UserName}",'pic'=>"{$UserPic}");
        $UserData['key']=self::ApiSign($UserData,self::Key());
        self::SetCookies('chuanhaisoft_im_user',base64_encode(json_encode($UserData)),$_Expire==null?365*24*3600:$_Expire);
    }
    
    private static function SetCookies($_CookieName,$_Value,$_Expire=0)
    {
        //date_default_timezone_set('Asia/Shanghai');
        if($_Expire>0)
            $_Expire=strtotime(date("Y-m-d H:i:s"))+$_Expire;
        setcookie($_CookieName,$_Value,$_Expire,"/");//time()+3600*
    }
    private static function ApiSign($Arr,$Key)
    {
        $Arr2=array();
        foreach ($Arr as $key => $value)
        {
            array_push($Arr2,$key.'='.$value);
        }
        sort($Arr2);
        $Str='';
        $Str=implode("&", $Arr2);
        $Str=md5($Str.$Key);
    
        return $Str;
    }
}
