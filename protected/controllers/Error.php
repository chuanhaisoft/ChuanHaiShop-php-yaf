<?php
use Yaf\Registry;
use Yaf\Controller_Abstract as Controller;
use \Exception as E;

class ErrorController extends Controller {

    public function errorAction(E $exception ) {
        if( Registry::get('config')->environment != 'pro' ) {
            echo '<pre>';
            print_r($exception);
        }
        Yaf\Dispatcher::getInstance()->autoRender(false);
        switch ($exception->getCode()) {
            case YAF\ERR\NOTFOUND\MODULE:
            case YAF\ERR\NOTFOUND\CONTROLLER:
            case YAF\ERR\NOTFOUND\ACTION:
            case YAF\ERR\NOTFOUND\VIEW:
            case 404:
                header("Content-type: text/html; charset=utf-8");
                header("status: 404 Not Found");
                $this->display("404");
                break;
            default :
                header("Content-type: text/html; charset=utf-8");
                header("status: 500 Internal Server Error");
                if( Registry::get('config')->environment == 'pro' ) {
                    $this->display("500");
                }else{
                    echo $exception->getMessage();
                }
                break;
        }

    }
}  
