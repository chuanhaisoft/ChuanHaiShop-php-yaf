<?php
namespace Pub;
class Yaf
{
    public static function ViewDisplayView($ViewName,$View,$Para=null,$IsRootPath=false)
    {
        if($IsRootPath)
            $View->display($ViewName.'.php',$Para);
        else
            $View->display(APP_PATH.'/views/'.strtolower(\Yaf\Dispatcher::getInstance()->getRequest()->getControllerName()).'/'.$ViewName.'.php',$Para);
    }
    
    public function display_layout($ViewName,$Para=null,$layout='layout')
    {
        $layout.='.php';
        $s=\Yaf\Registry::get('chuan_hai_pub_view');
        if(!$s)
        {
            $s=new \Yaf\View\Simple(APP_PATH.'/views/');
            \Yaf\Registry::set('chuan_hai_pub_view',$s);
        }
        $str=$s->render(APP_PATH.'/views/'.strtolower(\Yaf\Dispatcher::getInstance()->getRequest()->getControllerName()).'/'.$ViewName.'.php',$Para);
        $s->display($layout,['html'=>$str]);
    }
    
    public static function display($ViewName,$Para=null,$IsRootPath=true)
    {
        $s=\Yaf\Registry::get('chuan_hai_pub_view');
        if(!$s)
        {
            $s=new \Yaf\View\Simple(APP_PATH.'/views/');
            \Yaf\Registry::set('chuan_hai_pub_view',$s);
        }
        if(gettype($IsRootPath)=='string')
        {
            $str=$s->render(APP_PATH.'/'.$IsRootPath.'/'.$ViewName.'.php',$Para);
        }
        else 
        {
            if($IsRootPath===false)
                $str=$s->render(APP_PATH.'/views/'.strtolower(\Yaf\Dispatcher::getInstance()->getRequest()->getControllerName()).'/'.$ViewName.'.php',$Para);
            if($IsRootPath===true)
                $str=$s->render(APP_PATH.'/views/'.$ViewName.'.php',$Para);
        }

        echo $str;
    }
}
