<?php
namespace Base;
class ControllerCmd extends \yaf\Controller_Abstract 
{
    public function init() 
    {
        \Pub\Fram::Check_Cli();
    }
}