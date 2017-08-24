<?php
use Pub\SysFram;
use Pub\Fram;

class YunhuatongController extends \Base\ControllerAdmin
{
    public function IndexAction()
    {
        SysFram::CheckAdminLogin();
        $this->display_layout('view');
    }
    
   
}