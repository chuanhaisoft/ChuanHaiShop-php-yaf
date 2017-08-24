<?php
namespace Base;

class ControllerAdmin extends \yaf\Controller_Abstract 
{
    public function init() 
    {
        \Pub\SysFram::CheckAdminLogin(true);
    }
    
    public function display_layout($ViewName,$Para=null,$layout='layout')
    {
        $layout.='.php';
        $str=$this->render($ViewName,$Para);
        $s=\Yaf\Registry::get('chuan_hai_pub_view');
        if(!$s)
        {
            $s=new \Yaf\View\Simple(APP_PATH.'/views/');
            \Yaf\Registry::set('chuan_hai_pub_view',$s);
        }
        $s->display($layout,['html'=>$str]);
    }
}