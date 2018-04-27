<?php
namespace Base;
class Api extends \yaf\Controller_Abstract 
{
    public function init() 
    {
        self::HeadInit();
    }
    
    public static function HeadInit()
    {
        header('content-type:application:json;charset=utf8');
        $from = @$_SERVER['HTTP_REFERER'];
        if(!$from)$from=@$_SERVER['HTTP_ORIGIN'];
        if($from) {
            $arr = parse_url($from);
            $Host=$arr['host'];//SERVER_PORT
            if(isset($arr['port']) && $arr['port']!='80' )
            {
                $Host.=':'.$arr['port'];
            }
            $allowDomain = $arr['scheme'] . "://" . $Host;
            header("Access-Control-Allow-Origin: " . $allowDomain);
        }
        
        //header("Access-Control-Allow-Methods: POST,OPTIONS,GET");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Headers: Authorization,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Max-Age: 86400');
        //header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
        //print_r($_SERVER);
        if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']=='authorization')die('1');
    }
    
    public static function ToJson($data,$error=0,$mess='')
    {
        return json_encode(['error'=>$error,'mess'=>$mess,'data'=>$data]);
    }
    
    public static function CheckApiUser()
    {
        $ID=\Pub\Fram::GetNumValue('api_user');
        $UserPass=\Pub\Fram::GetValue('key');
        if(!$ID || !is_numeric($ID) || !$UserPass)
            die(self::ToJson([],1,'用户名或密码错误。'));

        $m = \Bll\User::Model($ID);
        if($m)
        {
            $Arr=$_POST;
            //print_r($Arr);
            $Sign = $_POST['key'];
            $Arr2=array();
            foreach ($Arr as $key => $value)
            {
                if($key != 'key' && $key != 'sys')
                {
                    if(is_array($value))
                    {
                        foreach ($value as $k2 => $v2)
                        {
                            if(is_array($v2))
                            {
                                foreach ($v2 as $k3 => $v3)
                                {
                                    array_push($Arr2,"{$key}[{$k2}][{$k3}]".'='.$v3);
                                }
                            }
                            else
                                array_push($Arr2,"{$key}[{$k2}]".'='.$v2);
                        }
                    }
                    else
                        array_push($Arr2,$key.'='.$value);
                }
            }
            sort($Arr2);
            //循环组串加密
            $Str='';$i=0;
            $Str=implode("&", $Arr2);
            $Str=md5($Str.md5($m->LoginPass()));
            if($Sign != $Str)
            {
                die(self::ToJson([],1,'用户名或签名错误!!!'));
            }
            $Mess = true;
        }
        else
        {
            die(self::ToJson([],1,'用户名或密码错误。'));
        }
    }
}