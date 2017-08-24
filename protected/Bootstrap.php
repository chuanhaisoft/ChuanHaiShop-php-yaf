<?php
use \Yaf\Dispatcher;

date_default_timezone_set("Asia/Shanghai");
class Bootstrap extends Yaf\Bootstrap_Abstract
{
    
    public function _initVendor(Yaf\Dispatcher $dispatcher)
    {
        //require(APP_PATH . '/vendor/Autoloader.php');
        //\Bootstrap\Autoloader::instance()->addRoot(APP_PATH . '/')->init();
    }
    
    public function _initConfig(Yaf\Dispatcher $dispatcher)
    {
        Yaf\Registry::set('config', Yaf\Application::app()->getConfig());
        Yaf\Dispatcher::getInstance()->autoRender(FALSE);
        /**
        $app = (array)new \Config\App();
        $config = Yaf\Application::app()->getConfig();
        $config = new Yaf\Config\Simple($config->toArray(), false);
        foreach ($app as $key => $val) {
            $config->set($key, $val);
        }
        Yaf\Registry::set("config", $config);
        $router = $dispatcher::getInstance()->getRouter();
        $router->addConfig(Yaf\Registry::get("config")->routes);
        **/
        //$this->getView()->display('index/index.html');
    }
    
    public function _initDb()
    {

        //Db::getInstance()->initConfig(\Yaf\Application::app()->getConfig()->get('application')->get('database'));
    }

    public function _initPlugin(Dispatcher $dispatcher) 
    {

        $dispatcher->registerPlugin(new SystemPlugin());
    }

    public function _initRoute()
    {
        $router = Yaf\Dispatcher::getInstance()->getRouter();
        $route = new \Yaf\Route\Regex('/\/pro_detail\/([0-9]+)\//',['controller' => 'pro','action' => 'detail'],[1=>'id']);
        $router->addRoute('pro_detail', $route);
        $route = new \Yaf\Route\Regex('/\/pro_list\/([0-9]+)_([0-9]+)_([0-9]+)_([0-9]+)_([0-9]+)_([0-9]+)\//',['controller' => 'pro','action' => 'list'],[1=>'sort_id',2=>'paixu',3=>'user_id',4=>'role_id',5=>'type_id',6=>'page']);
        $router->addRoute('pro_list', $route);
        //$route = new \Yaf\Route\Regex('chuanhai',['module'=>'chuanhai','controller' =>'index','action' =>'login']);
        //$router->addRoute('chuanhai', $route);
             //$router->addConfig(Yaf_Registry::get("config")->routes);
    }
}