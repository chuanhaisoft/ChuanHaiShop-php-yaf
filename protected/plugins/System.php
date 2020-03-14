<?php
class SystemPlugin extends Yaf\Plugin_Abstract
{
    public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
        $str=strtolower($request->getRequestUri());
        if(!isset($str) || $str=='')
            $str='/';
        if(substr($str,1,9)=='index.php')
            $str='/';
        if($str=='/')
            $_SERVER['QUERY_STRING']='';
        ////if(Yaf\Registry::get('config')->application->url_suffix)
        ////$str=str_replace('.html', '/', $str);
        if(substr($str, -1)!='/' && substr($str, -4)!='.html' && substr($str, -4)!='.shtml')
            $str.='/';

        if($str=='/chuanhai/' || $str=='/chuanhai/index.php/')//
            $str='/chuanhai/index/login/';

        if(stripos($str,'.shtml'))
        {
            $str=str_replace('.shtml', '', $str);
            $str=str_replace('-', '/index/', $str);
        }
        else 
        {
            $str=str_replace('.html', '', $str);
            $str=str_replace('-', '/', $str);
        }
        if(!isset($_SERVER['QUERY_STRING']))
            $_SERVER['QUERY_STRING']='';
        $str=str_replace('_..', '', $str);
        $request->setRequestUri($str.($_SERVER['QUERY_STRING']?'?'.$_SERVER['QUERY_STRING']:''));
    }
    /**
    public function routerShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) 
    {print_r($request);
        //$uri=$request->getRequestUri();
        //$uri=substr($uri, 1);print_r($request->controller);
        //$request->controller=$uri;
    }
    **/
}