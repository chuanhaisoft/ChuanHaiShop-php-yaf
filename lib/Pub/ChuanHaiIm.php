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
        self::SetCookies('chuanhaisoft_im_user',base64_encode(json_encode($UserData)),$_Expire==null?5*24*3600:$_Expire);
    }
    
    public static function SetKeFu($UserName,$UserPic,$WelcomeMess=null)
    {
        $Len=15;
        $UserId=self::GetIp();
        if(strlen($UserId)>8)
            $UserId=substr($UserId, 0,8);

        if(strlen($UserId)<$Len)
            $UserId="{$UserId}".self::RandStr($Len-strlen($UserId));
        
        if(!isset($_COOKIE['chuanhaisoft_im_user']) || !$_COOKIE['chuanhaisoft_im_user'] || strlen($_COOKIE['chuanhaisoft_im_user'])<=5 )
        {
            $UserData=array('userid'=>"{$UserId}",'domainid'=>self::DomainID().'','name'=>"{$UserName}",'pic'=>"{$UserPic}");
            if($WelcomeMess && $WelcomeMess!='')
                $UserData['welcome_mess']=$WelcomeMess;
            
            $UserData['key']=self::ApiSign($UserData,self::Key());
            self::SetCookies('chuanhaisoft_im_user',base64_encode(json_encode($UserData)),10*365*24*3600);
        }
    }
    
    private static function RandStr($len=6,$format='NUMBER')
    {
        $chars='0123456789';
        $password="";
        while(strlen($password)<$len)
            $password.=substr($chars,(mt_rand()%strlen($chars)),1);
        return $password;
    }
    
    private static function GetIp()
    {
        $ip=empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR'];
        if(is_numeric(strpos($ip, ',')))
        {
            $ip=explode(',', $ip);
            $ip=trim($ip[0]);
        }
        return self::findNum($ip);
    }
    
    private static function findNum($str='')
    {
        $str=trim($str);
        if(empty($str)){return '';}
        $temp=array('1','2','3','4','5','6','7','8','9','0');
        $result='';
        for($i=0;$i<strlen($str);$i++){
            if(in_array($str[$i],$temp)){
                $result.=$str[$i];
            }
        }
        return $result;
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
