<?php
if (substr(php_sapi_name(), 0, 3) !== 'cli')
{
    die("This Programe can only be run in CLI mode");
}

define('APP_PATH', __DIR__.'/protected');
$app = new \Yaf\Application(APP_PATH . "/config/application.ini");
$app->bootstrap()->getDispatcher()->dispatch(new \Yaf\Request\Simple());
