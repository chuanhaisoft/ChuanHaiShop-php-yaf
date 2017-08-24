<?php
namespace Pub;

class Position
{
    public static function GetIP()
    {
        $cip = '';
        if(!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif(!empty($_SERVER["REMOTE_ADDR"]))
        {
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        if ($cip == '127.0.0.1') $cip = '27.210.215.186';
        return $cip;
    }
    public static function GetData($url)
    {
        //$data = Api::SendUrl(array(), $url);
        //$data = json_decode($data, true);
        return '---';
    }
    public static function GetCity()
    {
        Fram::SetCookies('city', '');
        $city = Fram::GetCookies('city');
        if (!$city) {
            $loc = self::Location();
            $city = $loc['city'];
            Fram::SetCookies('city', $city, 24*3600);
        }
        $city = str_replace('市', '', $city);
        return $city;
    }
    public static function Location($ip = '')
    {
        /**
        if (!$ip) {
            $ip = self::GetIP();
        }
        $url = 'http://api.map.baidu.com/location/ip?ip='.$ip.'&ak=41fbf475a494392bf49c7f51566d4a8a&coor=bd09ll';
        $loc = self::GetData($url);
        if ($loc['status'] == 0) {
            $data['city'] = $loc['content']['address_detail']['city'];
            $data['x'] = $loc['content']['point']['x'];
            $data['y'] = $loc['content']['point']['y'];
        } else {
            $data['city'] = '北京市';
            $data['x'] = 116.403874;
            $data['y'] = 39.914889;
        }
        return $data;
        **/
        return '-----';
    }
    public static function HighLocation($ip = '')
    {
        if (!$ip) {
            $ip = self::GetIP();
        }
        $url = 'http://api.map.baidu.com/highacciploc/v1?qcip='.$ip.'&qterm=pc&ak=41fbf475a494392bf49c7f51566d4a8a&coord=bd09ll&extensions=1';
        $loc = self::GetData($url);
        if ($loc['result']['error'] == 161) {
            $data['city'] = $loc['content']['address_component']['city'];
            $data['x'] = $loc['content']['location']['lng'];
            $data['y'] = $loc['content']['location']['lat'];
        } else {
            $data = self::Location($ip);
        }
        return $data;
    }
}
