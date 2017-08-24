<?php
class IndexController extends yaf\Controller_Abstract 
{
    public function IndexAction()
    {
        $_REQUEST['r']=456;
        //print_r($_REQUEST);
       // print_r(\Yaf\Dispatcher::getInstance()->getRequest());
       echo Bll\China::Ip_To_CityID();die('-');
       //echo "<br/>";
       $rs=Pub\Data::Rows("select * from log limit 1");
       print_r($rs);
       
       $this->display('index',array("content"=>"Love_999_999"));
    }
}