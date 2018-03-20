<?php

class IndexController extends yaf\Controller_Abstract 
{
    public function IndexAction()
    {
        $t=isset($_GET['log'])?$_GET['log']:null;
        if($t)
        {
            \Pub\Data::Insert("insert into log2(mess)values(?)",[$t]);
        }
    }
}