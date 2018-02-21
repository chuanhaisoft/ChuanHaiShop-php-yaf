<?php
define('APP_PATH', __DIR__.'/protected');
$app = new \Yaf\Application(APP_PATH . "/config/application.ini");
$app->getDispatcher()->catchException(false);
$app->bootstrap()->run();