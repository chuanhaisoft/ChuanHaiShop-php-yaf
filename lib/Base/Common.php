<?php
namespace Base;
class Common extends \yaf\Controller_Abstract 
{
    public function init() 
    {
        
    }
    
    public function display_layout($ViewName,$Para=null,$layout='layout_shop')
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